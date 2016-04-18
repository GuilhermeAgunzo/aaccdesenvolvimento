<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unidade extends CI_Controller
{

    public function index()
    {
        $this->load->view('unidade/verificacao-cadastro');

    }

    public function novo()
    {
            if($this->validaFormulario()) {
                $unidade = array(
                    "cd_cpsouza" => $this->input->post("codigo"),
                    "nm_unidade" => $this->input->post("nome"),
                    "UF_estado" => $this->input->post("uf"),
                    "nm_cidade" => $this->input->post("cidade"),
                    "nm_bairro" => $this->input->post("bairro"),
                    "nm_endereco" => $this->input->post("endereco"),
                    "cd_num_endereco" => $this->input->post("numero"),
                    "nm_complemento_endereco" => $this->input->post("complemento"),
                    "cd_cep_endereco" => $this->input->post("cep"),
                    "cd_telefone" => $this->input->post("telefone"),
                    "id_user_adm_cadastrou" => "1"
                );

                $this->load->model("unidade_model");
                $this->unidade_model->salva($unidade);
                $this->session->set_flashdata("success", "Cadastro efetuado com sucesso!");
                $this->load->view('unidade/verificacao-cadastro');
            }else{
                $this->load->view('unidade/formulario_cadastro');
            }
    }

    public function altera()
    {
        if($this->validaFormulario()) {
            $unidade = array(
                "cd_cpsouza" => $this->input->post("codigo"),
                "nm_unidade" => $this->input->post("nome"),
                "UF_estado" => $this->input->post("uf"),
                "nm_cidade" => $this->input->post("cidade"),
                "nm_bairro" => $this->input->post("bairro"),
                "nm_endereco" => $this->input->post("endereco"),
                "cd_num_endereco" => $this->input->post("numero"),
                "nm_complemento_endereco" => $this->input->post("complemento"),
                "cd_cep_endereco" => $this->input->post("cep"),
                "cd_telefone" => $this->input->post("telefone"),
                "status_ativo" => $this->input->post("status"),
                "id_user_adm_cadastrou" => "1"
            );

            if($unidade['status_ativo'] == '0'){
                array_push($unidade['dt_cadastro'],$this->buscaDataAtual());
                array_push($unidade['id_user_adm_desativou'],"1");
            }
            $this->load->model("unidade_model");
            $this->unidade_model->altera($unidade);
            $this->session->set_flashdata("success", "Alteração efetuada com sucesso!");
            redirect('/');
        }else{
            $this->load->view('unidade/formulario_alteracao');
        }
    }

    public function buscaDataAtual(){
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i');
        return $date;
    }

    public function verificaCadastro()
    {
        if ($this->validaVerificacao()) {
            $codigoCPS = $this->input->post("codigo");
            $this->load->model("unidade_model");
            if ($this->unidade_model->verifica($codigoCPS)) {
                $this->session->set_flashdata("danger", "Unidade já cadastrada!");
                redirect('/');
            } else {
                $this->load->view('unidade/formulario_cadastro');

            }
        } else {
            //redirect('unidade/verificacao-cadastro');
            $this->load->view('unidade/verificacao-cadastro');
        }
    }
    public function buscaCadastroAlteracao()
    {
        if ($this->validaVerificacao()) {
            $codigoCPS = $this->input->post("codigo");
            $this->load->model("unidade_model");
            $unidade = $this->unidade_model->verifica($codigoCPS);
            if ($unidade) {
                $dados = array("unidade" => $unidade);
                $this->load->view('unidade/formulario_alteracao', $dados);
            } else if(empty($unidade)){
                $this->session->set_flashdata("danger", "Unidade não encontrada!");
                $this->load->view('unidade/verificacao-alteracao');
            }
        } else {
            //redirect('unidade/verificacao-cadastro');
            $this->load->view('unidade/verificacao-alteracao');
        }
    }

    public function validaVerificacao()
    {
        //valida formulario
        $this->load->library("form_validation");
        $this->form_validation->set_rules("codigo", "codigo", "trim|required|min_length[3]|max_length[5]",
            array(
                'required' => 'Você precisa preencher o campo %s.',
                'max_length[5]' => 'Insira no maximo 5 digitos.'
            )
        );
        return  $this->form_validation->run();
    }

    public function validaFormulario(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("codigo", "codigo", "trim|required|min_length[3]|max_length[5]");//adiciona regra de validação
        $this->form_validation->set_rules("nome", "nome", "trim|required|min_length[1]|max_length[50]");//adiciona regra de validação
        $this->form_validation->set_rules("cidade", "cidade", "trim|required|min_length[3]|max_length[50]");//adiciona regra de validação
        $this->form_validation->set_rules("bairro", "bairro", "trim|required|min_length[5]|max_length[50]");//adiciona regra de validação
        $this->form_validation->set_rules("endereco", "endereco", "trim|required|min_length[5]|max_length[50]");//adiciona regra de validação
        $this->form_validation->set_rules("numero", "numero", "trim|required|min_length[1]|max_length[8]");//adiciona regra de validação
        $this->form_validation->set_rules("cep", "cep", "trim|required|min_length[8]|max_length[8]");//adiciona regra de validação
        $this->form_validation->set_rules("telefone", "telefone", "trim|required|min_length[8]|max_length[15]");//adiciona regra de validação
       // $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>"."</p>");
        return $this->form_validation->run();//roda regra

    }
}
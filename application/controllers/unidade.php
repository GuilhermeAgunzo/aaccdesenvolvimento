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
                    "cd_complemento_endereco" => $this->input->post("complemento"),
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
        $unidade = array(
            "cd_cpsouza" => $this->input->post("codigo"),
            "nm_unidade" => $this->input->post("nome"),
            "UF_estado" => $this->input->post("uf"),
            "nm_cidade" => $this->input->post("cidade"),
            "nm_bairro" => $this->input->post("bairro"),
            "nm_endereco" => $this->input->post("endereco"),
            "cd_num_endereco" => $this->input->post("numero"),
            "cd_complemento_endereco" => $this->input->post("complemento"),
            "cd_cep_endereco" => $this->input->post("cep"),
            "cd_telefone" => $this->input->post("telefone"),
            "id_user_adm_cadastrou" => "1"
        );

        $this->load->model("unidade_model");
        $this->unidade_model->altera($unidade);
        $this->session->set_flashdata("success", "Alteração efetuada com sucesso!");
        redirect('/');
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
    public function verificaAlteracao()
    {
        if ($this->validaVerificacao()) {
            $codigoCPS = $this->input->post("codigo");
            $this->load->model("unidade_model");
            if ($this->unidade_model->verifica($codigoCPS)) {
                $this->load->view('unidade/formulario_alteracao');
            } else {
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
        $this->form_validation->set_rules("codigo", "codigo", "trim|required|min_length[5]",
            array(
                'required' => 'Você precisa preencher o campo %s.',
                'min_length[5]' => 'Insira somente 10 digitos.'
            )
        );
        return  $this->form_validation->run();
    }

    public function validaFormulario(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("codigo", "codigo", "trim|required|min_length[5]");//adiciona regra de validação
        $this->form_validation->set_rules("nome", "nome", "trim|required|min_length[15]");//adiciona regra de validação
        $this->form_validation->set_rules("cidade", "cidade", "trim|required|min_length[3]");//adiciona regra de validação
        $this->form_validation->set_rules("bairro", "bairro", "trim|required|min_length[5]");//adiciona regra de validação
        $this->form_validation->set_rules("endereco", "endereco", "trim|required|min_length[30]");//adiciona regra de validação
        $this->form_validation->set_rules("numero", "numero", "trim|required|min_length[1]");//adiciona regra de validação
        $this->form_validation->set_rules("cep", "cep", "trim|required|min_length[8]");//adiciona regra de validação
        $this->form_validation->set_rules("telefone", "telefone", "trim|required|min_length[8]");//adiciona regra de validação
       // $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>"."</p>");
        return $this->form_validation->run();//roda regra

    }
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller
{
    public function index(){
       $this->load->model("aluno_model");
        $retornoTurmas =  $this->aluno_model->buscaTurmas();
       $turmas = array("tb_turma" => $retornoTurmas);

        $this->load->model("unidade_model");
        $retornoUnidades =  $this->unidade_model->buscaUnidades();
        $unidades = array("tb_unidade" => $retornoUnidades);

        $this->load->view('aluno/formulario_cadastro', array_merge($turmas, $unidades));

    }
    public function novo(){
        $aluno = array(
            "cd_mat_aluno" => $this->input->post("matricula"),
            "nm_aluno" => $this->input->post("nome"),
            "cd_tel_celular" => $this->input->post("celular"),
            "cd_tel_residencial" => $this->input->post("telefone"),
            "nm_email" => $this->input->post("email"),
            "nm_turno" => $this->input->post("turno"),
            "id_user_adm_cadastrou" => "1",
            "id_user_adm_desativou" => "0",
            "id_turma" => $this->input->post("id_turma"),
            "id_unidade" => $this->input->post("id_unidade")
        );

        $this->load->model("aluno_model");
        $this->aluno_model->salva($aluno);
        $this->session->set_flashdata("success", "Cadastro efetuado com sucesso!");
        redirect('/');
    }

    public function altera(){
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
        $this->unidade_model->altera($unidade,$id);
        $this->session->set_flashdata("success", "Alteração efetuada com sucesso!");
        redirect('/');
    }

}
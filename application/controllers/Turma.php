<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Turma extends CI_Controller{

    /*   Métodos que somente chamam views   */

    public function cadastrar_turma(){
        autoriza(2);
        $this->load->template_admin("turma/cadastrar_turma");
    }

    public function alterar_turma(){
        autoriza(2);
        $this->load->template_admin("turma/alterar_turma");
    }

    public function pesquisar_turma(){
        autoriza(2);
        $this->load->template_admin("turma/pesquisar_turma");
    }

    /*   Metodos principais   */

    public function cadastrarTurma(){
        autoriza(2);
        $usuarioLogado = $this->session->userdata("usuario_logado");


        if($this->_validaForm(true)){

            $turma = array(
                "cd_mat_turma" => $this->input->post("cd_mat_turma"),
                "id_unidade" => $this->input->post("unidade"),
                "nm_turno" => $this->input->post("turno"),
                "aa_ingresso" => $this->input->post("ano"),
                "dt_semestre" => $this->input->post("semestre"),
                "qt_ciclo" => $this->input->post("ciclo"),
                "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
                "dt_cadastro" => mdate("%Y-%m-%d %H:%i:%s", time()),
            );

            $this->load->model("turma_model");
            $this->turma_model->cadastrarTurma($turma);

            $this->session->set_flashdata("success", "Cadastro efetuado com sucesso");
            redirect("/turma/cadastrar_turma");

        }else{
            $this->session->set_flashdata("danger", "Erro ao cadastrar");
        }


        $this->load->template_admin("turma/cadastrar_turma");

    }

    /*  Métodos auxiliares  */

    /**
     * @param $unidade
     * @return mixed - retorna true caso tudo esteja correto
     */
    public function _validaForm($unidade){

        $this->load->library("form_validation");

        $mensagem = array();

        if($unidade){
            $this->form_validation->set_rules("unidade", "unidade", "required|is_natural", $mensagem);
        }

        $this->form_validation->set_rules("cd_mat_turma", "cd_mat_turma", "required|is_natural|is_unique[tb_turma.cd_mat_turma]", $mensagem);
        $this->form_validation->set_rules("turno", "turno", "required", $mensagem);
        $this->form_validation->set_rules("ano", "ano", "required|is_natural|greater_than[1968]|exact_length[4]", $mensagem);
        $this->form_validation->set_rules("semestre", "semestre", "required|is_natural", $mensagem);
        $this->form_validation->set_rules("ciclo", "ciclo", "required", $mensagem);
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        return $this->form_validation->run();

    }

}

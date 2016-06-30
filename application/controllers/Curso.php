<?php defined('BASEPATH') OR exit('No direct script access allowed');

class curso extends CI_Controller
{
    public function index(){

        $this->load->template_admin("curso/cadastro_curso.php");

    }

    public function cadastro_curso(){

        $this->load->template_admin("curso/cadastro_curso.php");

    }

    public function cadastrarCurso(){

        if($this->_validaFormulario()) {

            $usuarioLogado = $this->session->userdata("usuario_logado");

            $curso = array(
                "nm_curso" => $this->input->post("nm_curso"),
                "nm_abreviacao" => $this->input->post("nm_abreviacao"),
                "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
                "dt_cadastro" => mdate("%Y-%m-%d %H:%i:%s", time())
            );

            $this->load->model("curso_model");
            $this-> curso_model->salva($curso);

            $this->session->set_flashdata("success", "Cadastro efetuado com sucesso!");
            redirect('/curso/cadastro_curso');
        }
        $this->load->template_admin("curso/cadastro_curso");
    }

    public function _validaFormulario(){
        $this->load->library("form_validation");

        $mensagem = array(
            'is_unique' => 'Já existe um curso cadastrado com esta abreviação.'
        );
        
        $this->form_validation->set_rules("nm_abreviacao", "nm_abreviacao", "required|max_length[10]|is_unique[tb_curso.nm_abreviacao]", $mensagem);
        $this->form_validation->set_rules("nm_curso", "nm_curso", "required|max_length[70]");

        $this->form_validation->set_error_delimiters('<p class="alert-danger">', '</p>');

        return $this->form_validation->run();//roda regra
    }

}
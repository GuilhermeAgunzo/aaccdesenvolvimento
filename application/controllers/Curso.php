<?php defined('BASEPATH') OR exit('No direct script access allowed');

class curso extends CI_Controller
{
    public function index(){
        autoriza(2);
        $this->load->template_admin("curso/cadastro_curso.php");
    }

    public function cadastro_curso(){
        autoriza(2);
        $this->load->model("unidade_model");
        $unidades = $this->unidade_model->dropDownUnidade();
        $dados = array("unidades" => $unidades);
        $this->load->template_admin("curso/cadastro_curso.php",$dados);
    }

    public function cadastrarCurso(){
        autoriza(2);
        if($this->_validaFormulario()) {

            $usuarioLogado = $this->session->userdata("usuario_logado");
            $curso = array(
                "id_unidade" => $this->input->post("Unidade"),
                "nm_curso" => $this->input->post("nome_curso"),
                "nm_abreviacao" => $this->input->post("abreviacao_curso"),
                "nm_coordenador_curso" => $this->input->post("nome_coordenador"),
                "cd_cpf_coordenador_curso" => $this->input->post("cpf_coordenador"),
                "qt_horas_aacc" => $this->input->post("qtd_horas_aacc"),
                "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
                "dt_cadastro" => mdate("%Y-%m-%d %H:%i:%s", time())
            );

            $this->load->model("curso_model");
            $this-> curso_model->salva($curso);

            $this->session->set_flashdata("success", "Cadastro efetuado com sucesso!");
            redirect('/curso/cadastro_curso');
        }else{
            redirect("/curso/cadastro_curso");
        }
            $this->load->template_admin("curso/cadastro_curso");
    }

    public function buscaCursosByUnidade(){
        $this->load->model("curso_model");


        $cursos = $this->curso_model->dropDownCursoByUnidade();

        $option = "<option value=''>---</option>";
        foreach($cursos->result() as $linha) {
            $option .= "<option value='$linha->id_curso'>$linha->nm_abreviacao</option>";
        }

        echo $option;
    }

    public function _validaFormulario(){
        $this->load->library("form_validation");

        $mensagem = array(
            'is_unique' => 'Já existe um curso cadastrado com esta abreviação.'
        );
        
        $this->form_validation->set_rules("abreviacao_curso", "abreviacao_curso", "required|max_length[10]|is_unique[tb_curso.nm_abreviacao]", $mensagem);
        $this->form_validation->set_rules("nome_curso", "nome_curso", "required|max_length[70]");
        $this->form_validation->set_rules("nome_coordenador", "nome_coordenador", "required|max_length[100]");
        $this->form_validation->set_rules("cpf_coordenador", "cpf_coordenador", "required|max_length[50]|numeric");
        $this->form_validation->set_rules("qtd_horas_aacc", "qtd_horas_aacc", "required|numeric");
        $this->form_validation->set_error_delimiters('<p class="alert-danger">', '</p>');
        return $this->form_validation->run();//roda regra
    }

}
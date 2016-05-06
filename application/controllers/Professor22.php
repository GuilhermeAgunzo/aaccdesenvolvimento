<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Professor extends CI_Controller{

    public function index(){
        autoriza(2);
        $this->load->template_admin("professor/tutorial_professor.php");
    }

    public function cadastro_professor(){
        autoriza(2);
        $this->load->template_admin("professor/cadastrar_professor.php");

    }

    public function pesquisar_professor(){
        autoriza(2);
        $this->load->template_admin("professor/pesquisar_professor.php");
    }

    public function alterar_professor(){
        autoriza(2);
        $this->load->template_admin("professor/alterar_professor.php");
    }

    public function desativar_cadastro_professor(){
        autoriza(2);
        $this->load->template_admin("professor/desativar_professor.php");
    }

    public function cadastro_aviso(){
        autoriza(2);
        $this->load->template_admin("professor/cadastro_avisos.php");
    }

    public function anexo_documento_comprobatorio(){
        autoriza(2);
        $this->load->template_admin("professor/anexo_documento_comprobatorio.php");
    }

    public function relatorio_protocolo_entregas(){
        autoriza(2);
        $this->load->template_admin("professor/relatorio_protocolo_entregas.php");
    }

    public function tutorial_professor(){
        autoriza(2);
        $this->load->template_admin("professor/tutorial_professor.php");
    }

    public function cadastroProfessor(){
        autoriza(2);
        $this->load->helper("date");
        $this->load->model("professor_model");
        $this->load->library('usuario');

        $data_entrada = implode("-", array_reverse(explode("/", $this->input->post("data_entrada"))));
        $data_saida = implode("-", array_reverse(explode("/", $this->input->post("data_saida"))));
        $email = $this->input->post("email");

        if($data_saida == ""){
            $data_saida = null;
        }


        $usuarioLogado = $this->session->userdata("usuario_logado");

        $id_usuario = $this->usuario->cadastrarUsuario($email,2);

        $professor = array(
            "nm_professor" => $this->input->post("nome"),
            "nm_email" => $email,
            "cd_tel_residencial" => $this->input->post("telefone"),
            "cd_tel_celular" => $this->input->post("celular"),
            "dt_entrada" => $data_entrada,
            "dt_saida" => $data_saida,
            "dt_cadastro" => mdate("%Y-%m-%d %H:%i:%s", time()),
            "status_ativo" => 1,
            "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
            "id_usuario" => $id_usuario
        );



        if($this->professor_model->salvaCadastro($professor)){
            $this->session->set_flashdata("cadastrado", "Cadastrado efetuado com sucesso.");
            redirect('/professor/cadastro_professor');
        }
        else{
            $this->session->set_flashdata("naoCadastrado", "O cadastro não foi efetuado. Tente novamente mais tarde.");
            redirect('/professor/cadastro_professor');
        }
    }

    public function pesquisaProfessor(){
        autoriza(2);
        $id = $this->input->post("cd_professor");
        $this->load->model("professor_model");
        $professor = $this->professor_model->buscaProfessor($id);
        $dados = array("professor" => $professor);

        if($professor){
            $this->session->set_flashdata("foiBuscar", "Cadastro localizado");
        }else{
            $this->session->set_flashdata("naoFoiBuscar", "Cadastro  não localizado. Verifique os dados ou Tente novamente mais tarde");
            redirect("/professor/pesquisar_professor");
        }

        $this->load->template_admin("professor/pesquisar_professor.php", $dados);
    }

    public function alteraProfessor(){
        autoriza(2);

        $this->load->model("professor_model");

        $id_professor = $this->input->post("cd_professor");
        $data_entrada = implode("-", array_reverse(explode("/", $this->input->post("data_entrada"))));
        $data_saida = implode("-", array_reverse(explode("/", $this->input->post("data_saida"))));
        $email = $this->input->post("email");

        if($data_saida == "")
            $data_saida = null;

        $professor = array(
            "nm_professor" => $this->input->post("nome"),
            "nm_email" => $email,
            "cd_tel_residencial" => $this->input->post("telefone"),
            "cd_tel_celular" => $this->input->post("celular"),
            "dt_entrada" => $data_entrada,
            "dt_saida" => $data_saida
        );

        if($this->professor_model->alteraProfessor($id_professor,$professor)){
            $this->session->set_flashdata("alterado", "Alteração efetuada com sucesso.");
            redirect('/professor/alterar_professor');
        }
        else{
            $this->session->set_flashdata("naoAlterado", "O cadastro  não foi alterado. Tente novamente mais tarde.");
            redirect('/professor/alterar_professor');
        }

    }

    public function desativaProfessor(){
        autoriza(2);
        $this->load->helper("date");
        $this->load->model("professor_model");

        $id_professor = $this->input->post("cd_professor");
        $usuarioLogado = $this->session->userdata("usuario_logado");

        $professor = array(
            "dt_desativado" => mdate("%Y-%m-%d %H:%i:%s", time()),
            "status_ativo" => 0,
            "id_user_adm_desativou" => $usuarioLogado
        );

        if($this->professor_model->desativaProfessor($id_professor,$professor)){
            $this->session->set_flashdata("desativou","Operação efetuada com sucesso");
            redirect("/professor/desativar_cadastro_professor");
        }else{
            $this->session->set_flashdata("naoDesativou", "A desativação do cadastro não foi efetuada. Tente novamente mais tarde");
            redirect("/professor/desativar_cadastro_professor");
        }

    }

    public function buscaDesativaProfessor(){
        autoriza(2);

        $this->load->library("form_validation");
        $this->form_validation->set_rules("cd_professor","cd_professor","required");

        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

        $this->form_validation->run();


        $id = $this->input->post("cd_professor");
        $this->load->model("professor_model");
        $professor = $this->professor_model->buscaProfessor($id);
        $dados = array("professor" => $professor);
        $this->load->template_admin("professor/desativar_professor", $dados);

    }

    public function buscaAlteraProfessor(){
        autoriza(2);

        $this->load->library("form_validation");
        $this->form_validation->set_rules("cd_professor","cd_professor","required");

        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

        $this->form_validation->run();


        $id = $this->input->post("cd_professor");
        $this->load->model("professor_model");
        $professor = $this->professor_model->buscaProfessor($id);
        $dados = array("professor" => $professor);
        $this->load->template_admin("professor/alterar_professor", $dados);

    }
}

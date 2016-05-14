<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Aluno extends CI_Controller{

    /*    MÉTODOS QUE CHAMAM SOMENTE VIEWS    */

    public function cadastro_aluno(){
        autoriza(2);
        $this->load->template_admin("aluno/cadastroAluno");
    }

    public function alterar_aluno(){
        autoriza(2);
        $this->load->template_admin("aluno/alterar_aluno");
    }

    public function pesquisar_aluno(){
        autoriza(2);
        $this->load->template_admin("aluno/pesquisar_aluno");
    }

    public function desativar_cadastro(){
        autoriza(2);
        $this->load->template_admin("aluno/desativar_aluno");
    }


    /*  METODOS PRINCIPAIS    */

    public function cadastrarAluno(){
        autoriza(2);

        $this->load->model("aluno_model");
        $this->load->library("usuariolb");

        $email = $this->input->post("email");

        if($this->_emailCadastrado($email)){

            if($this->_validaFormulario()){

                $id_usuario = $this->usuariolb->cadastrarUsuario($email,1);

                if($id_usuario > 0){

                    $usuarioLogado = $this->session->userdata("usuario_logado");

                    $aluno = array(
                        "cd_mat_aluno" => $this->input->post("matricula"),
                        "nm_aluno" => $this->input->post("nome"),
                        "nm_email" => $this->input->post("email"),
                        "id_turma" => $this->input->post("turma"),
                        "id_usuario" => $id_usuario,
                        "dt_cadastro" => mdate("%Y-%m-%d %H:%i:%s", time()),
                        "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
                        "cd_tel_celular" => $this->input->post("celular"),
                        "cd_tel_residencial" => $this->input->post("telefone"),
                    );

                    $this->aluno_model->cadastrarAluno($aluno);
                    $this->session->set_flashdata("success", "Cadastro efetuado com sucesso!");
                    redirect('/aluno/cadastro_aluno');

                }else{
                    $this->session->set_flashdata("danger", "Email já cadastrado com outro usuário.");
                    $this->load->template_admin("aluno/cadastroAluno");
                }

            }

        }else{
            $this->session->set_flashdata("danger", "Email já foi cadastrado por outro aluno.");
        }

        $this->load->template_admin("aluno/cadastroAluno");

    }

    public function alterarAluno(){
        autoriza(2);
        $this->load->model("aluno_model");
        $this->load->library("usuariolb");


        $usuarioLogado = $this->session->userdata("usuario_logado");
        $aluno = array(
            "cd_mat_aluno" => $this->input->post("matricula"),
            "nm_aluno" => $this->input->post("nome"),
            "nm_email" => $this->input->post("email"),
            "id_turma" => $this->input->post("turma"),
            "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
            "dt_cadastro" => mdate("%Y-%m-%d %H:%i:%s", time()),
            "cd_tel_celular" => $this->input->post("celular"),
            "cd_tel_residencial" => $this->input->post("telefone"),
        );

        $dados = array(
            "aluno" => $aluno,
            "id_aluno" => $this->input->post("id_aluno"),
        );

        if($this->_validaFormulario()){

            $this->aluno_model->alterarAluno($dados);
            $this->session->set_flashdata("success", "Alteração efetuada com sucesso!");

        }

        $this->load->template_admin("aluno/alterar_aluno", $dados);

    }

    public function buscarAlteraAluno(){
        autoriza(2);
        $this->load->library("form_validation");

        $this->form_validation->set_rules("matricula", "matricula", "required|numeric",
            array(
                'required' => 'Você precisa preencher a matricula.',
                'numeric' => 'A matricula deve conter somente números.'
            )
        );

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        $sucesso = $this->form_validation->run();

        if($sucesso){

            $matricula = $this->input->post("matricula");
            $this->load->model("aluno_model");
            $aluno = $this->aluno_model->buscarAluno($matricula);


            $dados = array(
                "aluno" => $aluno,
                "id_aluno" => $aluno['id_aluno']
            );


            $this->load->template_admin("aluno/alterar_aluno", $dados);

        }

    }

    public function pesquisarAluno(){
        autoriza(2);
        $matricula = $this->input->post("matricula");

        $this->load->model("aluno_model");
        $aluno = $this->aluno_model->buscarAluno($matricula);
        $dados = array("aluno" => $aluno);

        if($aluno){
            $this->load->template_admin("aluno/pesquisar_aluno.php", $dados);
        }else{
            $this->session->set_flashdata("danger", "Cadastro  não foi localizado. Verifique os dados ou tente novamente mais tarde");
            redirect("/aluno/pesquisar_aluno");
        }

    }

    public function desativarAluno(){

        $this->load->library("form_validation");

            $this->form_validation->set_rules("matricula", "matricula", "required|numeric",
                array(
                    'required' => 'Você precisa preencher %s.',
                    'numeric' => 'A matricula deve conter somente números.'
                )
            );

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        if($this->form_validation->run()){

            $this->load->model("aluno_model");
            $this->load->library('usuariolb');
            $usuarioLogado = $this->session->userdata("usuario_logado");

            $matricula = $this->input->post("matricula");

            $aluno = $this->aluno_model->buscarAluno($matricula);
            $id_usuario = $aluno["id_usuario"];

            $this->usuariolb->alterarUsuario($id_usuario,0);

            $aluno = array(
                "dt_desativado" => mdate("%Y-%m-%d %H:%i:%s", time()),
                "status_ativo" => 0,
                "id_user_adm_desativou" => $usuarioLogado['id_usuario']
            );

            $this->aluno_model->desativarAluno($matricula,$aluno);

            $this->session->set_flashdata("success", "Aluno desativado com sucesso.");
        }else{
            $this->session->set_flashdata("danger", "Erro na matricula.");
        }

        redirect("/aluno/desativar_cadastro");

    }


    /*  MÉTODOS AUXILIARES  */

    public function _validaFormulario(){

        $this->load->library("form_validation");

        $this->form_validation->set_rules("email", "email", "required|valid_email",
            array(
                'required' => 'Você precisa preencher %s.',
                'valid_email' => 'Você precisa preencher um email válido.'
            )
        );

        $this->form_validation->set_rules("matricula", "matricula", "required|numeric",
            array(
                'required' => 'Você precisa preencher %s.',
                'numeric' => 'A matricula deve conter somente números.'
            )
        );

        $this->form_validation->set_rules("nome", "nome", "required",
            array(
                'required' => 'Você precisa preencher %s.',
                'alpha_numeric' => 'O nome não deve conter caracteres especiais.'
            )
        );

        $this->form_validation->set_rules("turma", "turma", "required|numeric",
            array(
                'required' => 'Você precisa preencher %s.',
                'numeric' => 'Selecione uma turma válida.'
            )
        );

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        return $this->form_validation->run();

    }

    public function _emailCadastrado($email){
        $this->load->model("aluno_model");

        $sucesso = $this->aluno_model->emailCadastrado($email);
        if ($sucesso){
            return FALSE;
        }else{
            return TRUE;
        }

    }

}
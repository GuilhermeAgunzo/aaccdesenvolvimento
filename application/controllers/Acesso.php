<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acesso extends CI_Controller{

    public function index(){

        $usuarioLogado = $this->session->userdata("usuario_logado");

        //Adicionada variável de sessão
        $_SESSION['acesso'] = $usuarioLogado['cd_nivel'];


        if( $usuarioLogado['cd_nivel'] == 1 ){
            redirect('/temporario/aluno');
        }elseif( $usuarioLogado['cd_nivel'] == 2 ){
            redirect('/temporario/administrador');
        }else{
            $this->load->model("aviso_model");
            $avisos = $this->aviso_model->pesquisarAvisoValido(mdate("%Y-%m-%d", time()));

            $dados = [
                'avisos' => $avisos
            ];
            $this->load->view("login/index.php", $dados);
        }
    }

    public function login(){

        $this->load->library("form_validation");
        $this->form_validation->set_rules("email", "email", "required|valid_email",
            array(
                'required' => 'Você precisa preencher %s.',
                'valid_email' => 'Você precisa preencher um email válido.'
            )
        );
        $this->form_validation->set_rules("senha", "senha", "required|min_length[6]",
            array(
                'required' => 'Você precisa preencher %s.',
                'min_length' => 'A senha necessita ao menos 6 caracteres'
            )
        );

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        $sucesso = $this->form_validation->run();

        if($sucesso){

            $email = $this->input->post("email");
            $senha = md5($this->input->post("senha"));

            $this->load->model("acesso_model");
            $usuario = $this->acesso_model->concedeLogin($email, $senha);

            if($usuario){

                //criando session para logar
                $this->session->set_userdata("usuario_logado", $usuario);

                $this->session->set_flashdata("success", "Logado com sucesso!");


                //passando varios paramestros
                //$this->session->set_userdata(array("usuario_logado" => $usuario));


                $dados = array("mensagem" => "Logado com sucesso");

            }else{
                $this->session->unset_userdata("usuario_logado");
                $this->session->set_flashdata("danger", "Usuário ou senha inválida");
            }


            $usuarioLogado = $this->session->userdata("usuario_logado");

            //Adicionada variável de sessão
            $_SESSION['acesso'] = $usuarioLogado['cd_nivel'];


            if( $usuarioLogado['cd_nivel'] == 1 ){
                redirect('/temporario/aluno');
            }elseif( $usuarioLogado['cd_nivel'] == 2 ){
                redirect('/temporario/administrador');
            }else{
                redirect('/');
            }
        }

        else {
            $this->session->unset_userdata("usuario_logado");
            $this->session->set_flashdata("danger", "Usuário ou senha inválida");
            redirect('/');
        }


        $this->load->view("acesso/index.php");
    }

    public function logout(){
        $this->session->unset_userdata('usuario_logado');
        $this->session->set_flashdata("success", "Deslogado com sucesso!");

        redirect('/');

    }

}
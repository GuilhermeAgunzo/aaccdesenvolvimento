<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller{

    /*  PRIMEIRO METODOS QUE CHAMAM SOMENTE VIEWS   */

    public function configuracaoaluno(){
        //chama metodo de "autentifica_helper" com nível de acesso 1 (aluno)
        autoriza(1);
        $this->load->template_usuario_aluno("configuracaoAluno/configuracaoAluno.php");
    }

    public function configuracaoadm(){
        //chama metodo de "autentifica_helper" com nível de acesso 1 (aluno)
        autoriza(2);
        $this->load->template_admin("configuracaoAluno/configuracaoAluno.php");
    }

    public function recuperarsenha(){
        $this->load->view("senha/envio_senha_email");
    }


    /*  METODOS PRINCIPAIS    */

    /**
     * @param $id_usuario
     */
    public function buscarUsuario($id_usuario = null){
        //chama metodo de "autentifica_helper" com nível de acesso 2 (professor)
        autoriza(2);

        if(!isset($id_usuario)){
            $id_usuario = 1;
        }

        $this->load->model("usuario_model");
        $usuario = $this->usuario_model->buscaUsuario($id_usuario);

        $dados = array(
            'usuario' => $usuario,
        );
        $this->load->template("usuario/exibeusuario", $dados);
    }


    public function pesquisarUsuario(){
        //chama metodo de "autentifica_helper" com nível de acesso 2 (professor)
        autoriza(2);

        $this->load->library("form_validation");

        $this->form_validation->set_rules("email", "email", "required|valid_email|min_length[6]|max_length[70]|callback__emailNaoCadastrado",
            array(
                'required' => 'Você precisa preencher %s.',
                'valid_email' => 'Você precisa preencher um email válido.'
            )
        );

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        $sucesso = $this->form_validation->run();

        if($sucesso){
            $email = $this->input->post("email");

            $this->load->model("usuario_model");
            $usuario = $this->usuario_model->pesquisarUsuario($email);

            $dados = array(
                'usuario' => $usuario,
            );
            $this->load->template("usuario/exibeusuario", $dados);
        }else{
            $this->load->template("usuario/formulariopesquisa.php");
        }


    }


    /**
     * @param $id_usuario
     * @return bool
     */
    public function _desativarUsuario($email){
        //chama metodo de "autentifica_helper" com nível de acesso 2 (professor)
        autoriza(2);
        $this->load->model("usuario_model");
        $this->usuario_model->desativarUsuario($email);
        return true;
    }

    /*  Metodos que recebem de formuario e já fazem a alteração */

    public function alterarSenha(){
        //chama metodo de "autentifica_helper" com nível de acesso 1 (aluno)
        autoriza(1);

        $this->load->helper(array('date'));

        $this->load->library("form_validation");
        $this->form_validation->set_rules("senha", "senha", "required|min_length[6]|max_length[14]",
            array(
                'required' => 'Você precisa preencher %s.',
                'min_length' => 'A senha necessita ao menos 6 caracteres',
                'max_length' => 'A senha não pode ultrapassar 14 caracteres'
            )
        );
        $this->form_validation->set_rules("confirmasenha", "confirmasenha", "required|matches[senha]",
            array(
                'required' => 'Você precisa preencher %s.',
                'matches' => 'As senhas devem ser iguais.'
            )
        );
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        //pega infos de usuario na essesion
        $usuarioLogado = $this->session->userdata("usuario_logado");

        $sucesso = $this->form_validation->run();

        if($sucesso) {

            $senha = $this->input->post("senha");
            //$confirmaSenha = $this->input->post("confirmasenha");

            $horaAtual = date('Y-m-d H:i:s');

            $usuario = array(
                "nm_senha" => md5($senha),
                "dt_cadastro" => $horaAtual,
                "cd_status_validacao" => "1"
            );

            $this->load->model("usuario_model");
            $this->usuario_model->alterarUsuario($usuario, $usuarioLogado['id_usuario']);

            $this->session->set_flashdata("success", "Atualizado com sucesso!");


            if( $usuarioLogado['cd_nivel'] == 1 ){
                redirect('/usuario/configuracaoaluno');
            }elseif( $usuarioLogado['cd_nivel'] == 2 ){
                redirect('/usuario/configuracaoadm');
            }else{
                redirect('/');
            }

        }else{
            $this->session->set_flashdata("danger", "Não foi possível realizar a alteração.");
        }

        if( $usuarioLogado['cd_nivel'] == 1 ){
            $this->load->template_usuario_aluno("configuracaoAluno/configuracaoAluno.php");
        }elseif( $usuarioLogado['cd_nivel'] == 2 ){
            $this->load->template_admin("configuracaoAluno/configuracaoAluno.php");
        }else{
            redirect('/');
        }

    }

    public function resetarSenha(){

        $this->load->library("form_validation");

        $this->form_validation->set_rules("email", "email", "required|valid_email|callback__emailNaoCadastrado",
            array(
                'required' => 'Você precisa preencher %s.',
                'valid_email' => 'Você precisa preencher um email válido.'
            )
        );

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        $sucesso = $this->form_validation->run();

        if($sucesso){
            $email = $this->input->post("email");
            $emailExiste = $this->emailCadastrado($email);

            if($emailExiste){
                $this->session->set_flashdata("danger", "Email não cadastrado.");
                redirect('/usuario/resetSenhaForm');
            }else{

                $senha = $this->_gerarSenha();
                $mensagem = "Sua nova senha é: {$senha}";
                $titulo = "Nova senha AACC";

                //tirar comentario
                $this->_enviarEmail($email, $mensagem, $titulo);

                $usuario = array(
                    "nm_senha" => md5($senha)
                );

                $this->load->model("usuario_model");
                $this->usuario_model->alterarEmail($usuario, $email);


                $this->session->set_flashdata("success", "Em alguns instantes você receberá uma nova senha em {$email}");
                redirect('/');

            }

        }

        $this->load->view("senha/envio_senha_email");
    }


    /*  METODOS AUXILIARES  */

    public function _gerarSenha(){
        $this->load->helper('string');
        return random_string('numeric', 8);
    }


    /**
     * @param $email
     * @param $mensagem
     * @param $titulo
     * @return bool
     */
    public function _enviarEmail($email, $mensagem, $titulo){
        $de = 'noreply@cjaacc.96.lt';                    //CAPTURA O VALOR DA CAIXA DE TEXTO 'E-mail Remetente'
        $para = $email;                                  //CAPTURA O VALOR DA CAIXA DE TEXTO 'E-mail de Destino'
        $msg = $mensagem;                                //CAPTURA O VALOR DA CAIXA DE TEXTO 'Mensagem'
        $this->load->library('email');                   //CARREGA A CLASSE EMAIL DENTRO DA LIBRARY DO FRAMEWORK
        $this->email->from($de, 'AACC');                 //ESPECIFICA O FROM(REMETENTE) DA MENSAGEM DENTRO DA CLASSE
        $this->email->to($para);                         //ESPECIFICA O DESTINATÁRIO DA MENSAGEM DENTRO DA CLASSE
        $this->email->subject($titulo);                  //ESPECIFICA O ASSUNTO DA MENSAGEM DENTRO DA CLASSE
        $this->email->message($msg);	                 //ESPECIFICA O TEXTO DA MENSAGEM DENTRO DA CLASSE
        $this->email->send();                            //AÇÃO QUE ENVIA O E-MAIL COM OS PARÂMETROS DEFINIDOS ANTERIORMENTE

        return true;
    }


    /**
     * @param $email
     * @return bool
     * Retorna true caso não existe este email cadastrado em tb_usuario - para ser usado em callback
     */
    public function emailCadastrado($email){
        $this->load->model("usuario_model");
        if ( $this->usuario_model->emailCadastrado($email) ){
            $this->form_validation->set_message('emailCadastrado', 'Email já cadastrado.');
            return FALSE;
        }else{
            return TRUE;
        }

    }


    /**
     * @param $email
     * @return bool
     */
    public function _emailNaoCadastrado($email){
        $this->load->model("usuario_model");
        $sucesso = $this->usuario_model->emailCadastrado($email);
        if ($sucesso){
            return TRUE;
        }else{
            $this->form_validation->set_message('_emailNaoCadastrado', 'Email não cadastrado.');
            return FALSE;
        }

    }

    public function _retornaIdUsuario($email){
        $this->load->model("usuario_model");
        $usuario = $this->usuario_model->pesquisarUsuario($email);
        return $usuario['id_usuario'];
    }

}
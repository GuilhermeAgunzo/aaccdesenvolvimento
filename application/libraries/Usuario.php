<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario
{


    public function cadastrarUsuario($email, $nivelAcesso){

        $ci = get_instance();


        //chama metodo de "autentifica_helper" com nível de acesso 2 (professor)
        //autoriza(2);
        $senha = $this->gerarSenha();
        $sucesso = $this->emailCadastrado($email);

        if($sucesso) {

            $usuario = array(
                "cd_nivel" => $nivelAcesso,
                "nm_email" => $email,
                "nm_senha" => md5($senha),
            );

            $mensagem = "Sua senha de acesso ao AACC é: {$senha}";
            $titulo = "Senha AACC";
            $this->enviarEmail($email, $mensagem, $titulo);

            $ci->load->model("usuario_model");
            $ci->usuario_model->cadastrarUsuario($usuario);

            $id_usuario = $this->retornaIdUsuario($email);


        }else{

            $id_usuario = 0;


        }

        return $id_usuario;


    }




    public function retornaIdUsuario($email){

        $ci = get_instance();
        $ci->load->model("usuario_model");
        $usuario = $ci->usuario_model->pesquisarUsuario($email);
        return $usuario['id_usuario'];
    }

    public function gerarSenha(){

        $ci = get_instance();

        $ci->load->helper('string');
        return random_string('numeric', 8);
    }

    public function emailCadastrado($email){

        $ci = get_instance();

        $ci->load->model("usuario_model");
        if ( $ci->usuario_model->emailCadastrado($email) ){
            return FALSE;
        }else{
            return TRUE;
        }

    }

    /**
     * @param $email
     * @param $mensagem
     * @param $titulo
     * @return bool
     */
    public function enviarEmail($email, $mensagem, $titulo){
        $ci = get_instance();
        $de = 'noreply@cjaacc.96.lt';                    //CAPTURA O VALOR DA CAIXA DE TEXTO 'E-mail Remetente'
        $para = $email;                                  //CAPTURA O VALOR DA CAIXA DE TEXTO 'E-mail de Destino'
        $msg = $mensagem;                                //CAPTURA O VALOR DA CAIXA DE TEXTO 'Mensagem'
        $ci->load->library('email');                   //CARREGA A CLASSE EMAIL DENTRO DA LIBRARY DO FRAMEWORK
        $ci->email->from($de, 'AACC');                 //ESPECIFICA O FROM(REMETENTE) DA MENSAGEM DENTRO DA CLASSE
        $ci->email->to($para);                         //ESPECIFICA O DESTINATÁRIO DA MENSAGEM DENTRO DA CLASSE
        $ci->email->subject($titulo);                  //ESPECIFICA O ASSUNTO DA MENSAGEM DENTRO DA CLASSE
        $ci->email->message($msg);	                 //ESPECIFICA O TEXTO DA MENSAGEM DENTRO DA CLASSE
        $ci->email->send();                            //AÇÃO QUE ENVIA O E-MAIL COM OS PARÂMETROS DEFINIDOS ANTERIORMENTE

        return true;
    }

}
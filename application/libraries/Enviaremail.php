<?php

/**
 * Created by PhpStorm.
 * User: caiol
 * Date: 06/05/2016
 * Time: 14:04
 */
class Enviaremail
{
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
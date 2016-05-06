<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @param $nivelAcesso
 * @return mixed
 */
function autoriza($nivelAcesso, $primeiroAcessoLiberado = null){
    //CI = CodeIgniter
    $ci = get_instance();
    $urlAtual = uri_string();

    if( empty($primeiroAcessoLiberado) ){
        $primeiroAcessoLiberado = false;
    }

    if( !isset($nivelAcesso) ){
        $nivelAcesso = 1;
    }

    $usuarioLogado = $ci->session->userdata("usuario_logado");

    $ci->load->model('acesso_model');
    $usuarioBD = $ci->acesso_model->dadosLogado($usuarioLogado['id_usuario']);


    //verifica se a sessão de login está ativa
    if( !$usuarioLogado ) {
        $ci->session->set_flashdata("danger", "Você precisa estar logado.");
        redirect("/");

        //verifica se o usuário está ativo no BD
    }elseif( $usuarioBD['status_ativo'] == 0 ) {
        $ci->session->set_flashdata("danger", "Seu usuário foi desativado.");
        redirect("/");


        //verifica se o usuário já trocou a senha temporária
    }elseif( ( $usuarioBD['cd_status_validacao'] == 0) && !( $urlAtual == "usuario/configuracaoaluno" || $urlAtual == "usuario/configuracaoadm" || $urlAtual == "usuario/alterarSenha" ) ){

        $ci->session->set_flashdata("danger", "Você precisa alterar sua senha no primeiro acesso.");

        if($usuarioBD['cd_nivel'] == 2){
            redirect("/usuario/configuracaoadm");
        }else{
            redirect("/usuario/configuracaoaluno");
        }



        //verifica se o usuário tem nível de acesso para entrar na tela
    }elseif( $usuarioBD['cd_nivel'] >= $nivelAcesso ){
        return $usuarioLogado;
    }else{
        $ci->session->set_flashdata("danger", "Você não tem permissão para acessar esta página.");
        redirect("/");
    }

}
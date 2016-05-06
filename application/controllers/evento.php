<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Evento extends CI_Controller
{
    public function index()
    {

        $this->load->template_admin('evento/cadastrar_evento.php');
    }

    public function cadastrar_evento(){

        $this->load->template_admin("evento/cadastrar_evento.php");

    }

    public function pesquisar_evento(){

        $this->load->template_admin("evento/pesquisar_evento.php");

    }

    public function alterar_evento(){

        $this->load->template_admin("evento/alterar_evento.php");

    }


}
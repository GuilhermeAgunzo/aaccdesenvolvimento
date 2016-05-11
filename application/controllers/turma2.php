<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Turma extends CI_Controller
{
    public function index()
    {

        $this->load->template_admin('turma/cadastrar_turma.php');
    }

    public function cadastrar_turma(){

        $this->load->template_admin("turma/cadastrar_turma.php");

    }

    public function pesquisar_turma(){

        $this->load->template_admin("turma/pesquisar_turma.php");

    }

    public function alterar_turma(){

        $this->load->template_admin("turma/alterar_turma.php");

    }


}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class curso extends CI_Controller
{
    public function index(){

        $this->load->template_admin("curso/cadastro_curso.php");

    }

    public function cadastro_curso(){

        $this->load->template_admin("curso/cadastro_curso.php");

    }
}
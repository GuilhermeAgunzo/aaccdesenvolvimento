<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Indeferimento extends CI_Controller
{

    public function cadastrar_indeferimento(){

        $this->load->template_admin("indeferimento/cadastrar_indeferimento.php");
    }


    public function pesquisar_indeferimento(){

        $this->load->template_admin("indeferimento/pesquisar_indeferimento.php");

    }

    public function alterar_indeferimento(){

        $this->load->template_admin("indeferimento/alterar_indeferimento.php");

    }


}
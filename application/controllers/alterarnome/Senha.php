<?php if (! defined('BASEPATH')) exit('No direct script acess allowed');

class senha extends CI_Controller{

    public function index(){

        $this->load->view("senha/envio_senha_email.php");
    }

    public function recadastroDeSenha(){

        $this->load->view("senha/recadastroDeSenha.php");
    }


}
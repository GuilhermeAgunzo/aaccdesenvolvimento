<?php if (! defined('BASEPATH')) exit('No direct script acess allowed');

class aviso extends CI_Controller{

    /**
     *
     */
    public function index(){
        $this->load->template_admin("aviso/cadastrar_aviso.php");
    }

    public function cadastrar_aviso(){

        $this->load->template_admin("aviso/cadastrar_aviso.php");
    }
    public function pesquisar_aviso(){

        $this->load->template_admin("aviso/pesquisar_aviso.php");
    }
    public function alterar_aviso(){

        $this->load->template_admin("aviso/alterar_aviso.php");
    }
}
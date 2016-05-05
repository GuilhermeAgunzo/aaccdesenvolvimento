<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader{

    public function template_usuario_aluno($nome, $dados = array()){
        $this->view("cabecalho_usuario_aluno.php");
        $this->view($nome, $dados);
        $this->view("rodape_usuario_aluno.php");
    }


    public function template_admin($nome, $dados = array()){
        $this->view("cabecalho_admin.php");
        $this->view($nome, $dados);
        $this->view("rodape_admin.php");
    }


}
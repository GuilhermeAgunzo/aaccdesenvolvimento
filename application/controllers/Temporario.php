<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Temporario extends CI_Controller{

    public function administrador(){
        autoriza(2);
        $this->load->template_admin("administrador/index.php");
    }

    public function aluno(){
        autoriza(1);
        $this->load->template_usuario_aluno("usuario_aluno/pagina_inicial_usuario_aluno.php");
    }

}


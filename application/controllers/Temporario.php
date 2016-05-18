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

    public function teste(){

        echo "Data dataPtBrParaMysql: ". dataPtBrParaMysql("10/05/2016");
        echo "<br> <br>";
        echo "Data dataMysqlParaPtBr: ". dataMysqlParaPtBr('2016-05-17');

    }

}


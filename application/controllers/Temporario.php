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


    public function listarUnidade(){
        autoriza(2);
        $this->load->model("unidade_model");
        $dropDownUnidade = $this->unidade_model->dropDownUnidade();

        echo "<pre>";
        print_r($dropDownUnidade);
        echo "</pre>";

    }

    public function listarTurma(){
        autoriza(2);
        $this->load->model("turma_model");
        $dropDownTurma = $this->turma_model->dropDownTurma();

        echo "<pre>";
        print_r($dropDownTurma);
        echo "</pre>";

    }


}


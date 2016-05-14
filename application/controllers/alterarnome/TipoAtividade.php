<?php defined('BASEPATH') OR exit('No direct script access allowed');


class tipoAtividade extends CI_Controller
{

    public function cadastrar_tipoAtividade(){

        $this->load->template_admin("tipoAtividade/cadastrar_tipoAtividade.php");
    }


    public function pesquisar_tipoAtividade(){

        $this->load->template_admin("tipoAtividade/pesquisar_tipoAtividade.php");

    }

    public function alterar_tipoAtividade(){

        $this->load->template_admin("tipoAtividade/alterar_tipoAtividade.php");

    }


}
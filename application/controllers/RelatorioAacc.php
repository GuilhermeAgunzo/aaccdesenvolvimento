<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RelatorioAacc extends CI_Controller{

    public function index(){
        $this->load->template_admin("aluno/validacao_relatorio_aluno");
    }


    public function validacao_relatorio_aluno(){

        $this->load->template_admin("aluno/validacao_relatorio_aluno");

    }


}

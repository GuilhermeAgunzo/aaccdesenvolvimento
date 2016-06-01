<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RelatorioEvento extends CI_Controller{

    public function index(){
        autoriza(2);
        $this->load->template_admin("aluno/relatorio_evento");
    }

    public function buscar(){
        autoriza(2);

        $this->load->model("evento_model");
        $this->load->library("form_validation");

        $this->form_validation->set_rules("dtEvento","dtEvento","required",
            array(
                'required' => "Você precisa preencher a Data de inicio do evento"
            ));
        $this->form_validation->set_rules("dtFinalEvento","dtFinalEvento","required",
            array(
                'required' => "Você precisa preencher a Data Final do evento"
            ));

        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

        $this->form_validation->run();


        $dataInicial = dataPtBrParaMysql($this->input->post("dtEvento"));
        $dataFinal = dataPtBrParaMysql($this->input->post("dtFinalEvento"));

        $eventos = $this->evento_model->buscaEventosEntreDatas($dataInicial,$dataFinal);
        if($eventos != null){

            $dados = array("eventos" => $eventos);
            $this->load->template_admin("aluno/relatorio_evento.php",$dados);
        }else{
            $this->session->set_flashdata("danger", "Não há eventos no período informado");
            redirect('RelatorioEvento/');
        }
    }

}

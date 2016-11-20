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
        $data_inicio = $this->input->post("dtEvento");
        $data_final = $this->input->post("dtFinalEvento");

        $dataInicial = dataPtBrParaMysql($data_inicio);
        $dataFinal = dataPtBrParaMysql($data_final);

        if ($this->_periodoValido($dataInicial, $dataFinal)) {
            $eventos = $this->evento_model->buscaEventosEntreDatas($dataInicial, $dataFinal);
            if ($eventos != null) {

                $dados = array("eventos" => $eventos,
                    "data_inicio" => $data_inicio,
                    "data_final" => $data_final);
                $this->load->template_admin("aluno/relatorio_evento.php", $dados);
            } else {
                $this->session->set_flashdata("danger", "Não há eventos no período informado");
                redirect('RelatorioEvento/');
            }
        }
        else
        {
            $this->session->set_flashdata("danger", "A data do término do evento não pode ser anterior a data do início");
            redirect('RelatorioEvento/');
        }
    }

    public function pdf(){
        autoriza(2);

        $data_inicio = $this->input->post("data_inicio");
        $data_final = $this->input->post("data_final");

        $this->load->helper('pdf_helper');

        $this->load->model("evento_model");
        $this->load->model("unidade_model");

        $dataInicial = dataPtBrParaMysql($data_inicio);
        $dataFinal = dataPtBrParaMysql($data_final);
        $eventos = $this->evento_model->buscaEventosEntreDatas($dataInicial, $dataFinal);

        $titulo = "Relatório de Eventos";
        $arquivo = "relatorio-de-eventos";

        $data = array(
            'titulo' => $titulo,
            'eventos'=> $eventos,
            'arquivo' => $arquivo,
        );

        $this->load->view('aluno/relatorio_pdf_evento', $data);


    }

    public function _periodoValido($dt_inicio, $dt_vencimento){
        if($dt_inicio <= $dt_vencimento)
            return true;
        else
            return false;
    }

}
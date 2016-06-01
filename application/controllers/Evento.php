<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Evento extends CI_Controller
{
    public function index()
    {

        $this->load->template_admin('evento/cadastrar_evento.php');
    }

    public function cadastrar_evento(){

        $this->load->template_admin("evento/cadastrar_evento.php");

    }

    public function pesquisar_evento(){
        
        $this->load->template_admin("evento/pesquisar_evento.php");

    }

    public function alterar_evento(){

        $this->load->template_admin("evento/alterar_evento.php");

    }

    public function cadastroEvento(){
        autoriza(2);

        $this->load->helper("date");
        $this->load->library("form_validation");
        $this->load->model("evento_model");

        $this->form_validation->set_rules("nmEvento","nmEvento","required",
            array(
                'required' => "Você precisa preencher o Nome do Evento"
            ));
        $this->form_validation->set_rules("nmLocalEvento","nmLocalEvento","required",
            array(
                'required' => "Você precisa preencher o Local do Evento"
            ));
        $this->form_validation->set_rules("dtEvento","dtEvento","required",
            array(
                'required' => "Você precisa preencher a Data de inicio do evento"
            ));
        $this->form_validation->set_rules("dtFinalEvento","dtFinalEvento","required",
            array(
                'required' => "Você precisa preencher a Data Final do evento"
            ));
        $this->form_validation->set_rules("hrEvento","hrEvento","required",
            array(
                'required' => "Você precisa preencher o Horário do evento"
            ));
        $this->form_validation->set_rules("qtHorasEvento","qtHorasEvento","required",
            array(
                'required' => "Você precisa preencher a Duração do evento"
            ));
        $this->form_validation->set_rules("dsEvento","dsEvento","required",
            array(
                'required' => "Você precisa preencher a Descrição do evento"
            ));
        $this->form_validation->set_rules("nmResponsavelEvento","nmResponsavelEvento","required",
            array(
                'required' => "Você precisa preencher o Responsável pelo evento"
            ));

        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

        $this->form_validation->run();

        $horaAtual = date('Y-m-d H:i:s');
        $usuarioLogado = $this->session->userdata("usuario_logado");

        $evento = array(
            "nm_evento" => $this->input->post("nmEvento"),
            "local_evento" => $this->input->post("nmLocalEvento"),
            "dt_inicio_evento" => dataPtBrParaMysql($this->input->post("dtEvento")),
            "dt_final_evento" => dataPtBrParaMysql($this->input->post("dtFinalEvento")),
            "hr_evento" => $this->input->post("hrEvento"),
            "qt_horas_evento" => $this->input->post("qtHorasEvento"),
            "ds_evento" => $this->input->post("dsEvento"),
            "nm_responsavel_evento" => $this->input->post("nmResponsavelEvento"),
            "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
            "dt_cadastro" => $horaAtual,
            "status_ativo" => 1
        );
        if($this->evento_model->salvaCadastro($evento)){
            $this->session->set_flashdata("success", "Cadastro efetuado com sucesso.");
            redirect('/evento/cadastrar_evento');
        }else{
            $this->session->set_flashdata("danger", "O cadastro não foi efetuado. Tente novamente mais tarde.");
            redirect('/evento/cadastrar_evento');
        }
    }

    public function pesquisaEventos(){
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
            $this->load->template_admin("evento/pesquisar_evento.php",$dados);
        }else{
            $this->session->set_flashdata("danger", "Não há eventos no período informado");
            redirect('evento/pesquisar_evento');
        }
    }
    public function pesquisaAlteraEventos(){
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
            $this->load->template_admin("evento/alterar_evento.php",$dados);
        }else{
            $this->session->set_flashdata("danger", "Não há eventos no período informado");
            redirect('evento/alterar_evento');
        }
    }

    public function pesquisaEventoId($id){
        autoriza(2);
        $this->load->model("evento_model");

        $linhaEvento = $this->evento_model->buscaEventoPorId($id);
        $dados = array("linhaEvento" => $linhaEvento);

        $this->load->template_admin("evento/alterar_evento.php",$dados);
    }
    public function alteraEvento(){
        autoriza(2);
        $this->load->model("evento_model");
        $this->load->library("form_validation");


        $this->form_validation->set_rules("nmEvento","nmEvento","required",
            array(
                'required' => "Você precisa preencher o Nome do Evento"
            ));
        $this->form_validation->set_rules("nmLocalEvento","nmLocalEvento","required",
            array(
                'required' => "Você precisa preencher o Local do Evento"
            ));
        $this->form_validation->set_rules("dtEvento","dtEvento","required",
            array(
                'required' => "Você precisa preencher a Data de inicio do evento"
            ));
        $this->form_validation->set_rules("dtFinalEvento","dtFinalEvento","required",
            array(
                'required' => "Você precisa preencher a Data Final do evento"
            ));
        $this->form_validation->set_rules("hrEvento","hrEvento","required",
            array(
                'required' => "Você precisa preencher o Horário do evento"
            ));
        $this->form_validation->set_rules("qtHorasEvento","qtHorasEvento","required",
            array(
                'required' => "Você precisa preencher a Duração do evento"
            ));
        $this->form_validation->set_rules("dsEvento","dsEvento","required",
            array(
                'required' => "Você precisa preencher a Descrição do evento"
            ));
        $this->form_validation->set_rules("nmResponsavelEvento","nmResponsavelEvento","required",
            array(
                'required' => "Você precisa preencher o Responsável pelo evento"
            ));

        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

        $this->form_validation->run();

        $eventoId = $this->input->post("eventoId");
        $dataInicial = dataPtBrParaMysql($this->input->post("dtEvento"));
        $dataFinal = dataPtBrParaMysql($this->input->post("dtFinalEvento"));
        $horaEvento = $this->input->post("hrEvento");
        $usuarioLogado = $this->session->userdata("usuario_logado");
        $horaAtual = date('Y-m-d H:i:s');

        $evento = array(
          "nm_evento" => $this->input->post("nmEvento"),
          "local_evento" => $this->input->post("nmLocalEvento"),
          "dt_inicio_evento" => $dataInicial,
          "dt_final_evento" => $dataFinal,
          "hr_evento" => $horaEvento,
          "qt_horas_evento" => $this->input->post("qtHorasEvento"),
          "ds_evento" => $this->input->post("dsEvento"),
          "nm_responsavel_evento" => $this->input->post("nmResponsavelEvento"),
          "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
          "dt_cadastro" => $horaAtual
        );
        
        if($this->evento_model->alteraEvento($eventoId,$evento)){
            $this->session->set_flashdata("success", "Alteração Efetuada com Sucesso.");
            redirect('evento/alterar_evento');
        }else{
            $this->session->set_flashdata("danger", "O cadastro de evento não foi alterado. Por favor, tente novamente mais tarde.");
            redirect('evento/alterar_evento');
        }
    }

}
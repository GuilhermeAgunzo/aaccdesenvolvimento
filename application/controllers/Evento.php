<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Evento extends CI_Controller
{
    public function index()
    {
        autoriza(2);

        $this->load->template_admin('evento/cadastrar_evento.php');
    }

    public function cadastrar_evento(){

        autoriza(2);

        $this->load->model("TipoAtividade_model");
        $atividades = $this->TipoAtividade_model->dropDownAtividade();
        $dadosAtividade = array("atividades" => $atividades);

        $this->load->model("unidade_model");
        $unidades = $this->unidade_model->dropDownUnidade();
        $dadosUnidade = array("unidades" => $unidades);

        $this->load->template_admin("evento/cadastrar_evento.php", $dadosAtividade + $dadosUnidade);
    }

    public function pesquisar_evento(){
        autoriza(2);

        $this->load->model("unidade_model");
        $unidades = $this->unidade_model->dropDownUnidade();

        $dados = array("unidades" => $unidades);
        $this->load->template_admin("evento/pesquisar_evento.php",$dados);

    }

    public function alterar_evento(){
        autoriza(2);

        $this->load->model("unidade_model");
        $unidades = $this->unidade_model->dropDownUnidade();

        $dados = array("unidades" => $unidades);
        $this->load->template_admin("evento/alterar_evento.php", $dados);

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
        $this->form_validation->set_rules("Unidade","Unidade","required",
            array(
                'required' => "Você precisa escolher a Unidade do evento"
            ));

        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

        $this->form_validation->run();

        $horaAtual = date('Y-m-d H:i:s');
        $usuarioLogado = $this->session->userdata("usuario_logado");

        $evento = array(
            "id_tipo_atividade" => $this->input->post("Atividade"),
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
            "status_ativo" => 1,
            "id_unidade" => $this->input->post("Unidade")
        );

        if($this->_periodoValido($evento['dt_inicio_evento'], $evento['dt_final_evento']))
        {
            if($this->evento_model->salvaCadastro($evento)){
                $this->session->set_flashdata("success", "Cadastro efetuado com sucesso.");
                redirect('/evento/cadastrar_evento');
            }else{
                $this->session->set_flashdata("danger", "O cadastro não foi efetuado. Tente novamente mais tarde.");
                redirect('/evento/cadastrar_evento');
            }
        }
        else{
            $this->session->set_flashdata("danger", "A data do término do evento não pode ser anterior a data do início");
            redirect('/evento/cadastrar_evento');
        }
    }

    public function pesquisaEventos()
    {
        autoriza(2);

        $idUnidade = $this->input->post("Unidade");
        $opcao = $this->input->post("opcao");

        $this->load->model("evento_model");
        $this->load->model("unidade_model");
        $eventos = $this->evento_model->buscaEventosUnidade($idUnidade);
        $unidades = $this->unidade_model->buscaUnidades();
        $unidade = $this->unidade_model->buscarUnidadeId($idUnidade);
        $dados = array("eventos" => $eventos,"unidades"=>$unidades, "unidade" => $unidade);

        $this->load->template_admin("evento/pesquisar_evento.php",$dados);
    }

    public function pesquisaAlteraEventos(){
        autoriza(2);

        $idUnidade = $this->input->post("Unidade");
        $opcao = $this->input->post("opcao");

        $this->load->model("evento_model");
        $this->load->model("unidade_model");
        $eventos = $this->evento_model->buscaEventosUnidade($idUnidade);
        $unidades = $this->unidade_model->buscaUnidades();
        $unidade = $this->unidade_model->buscarUnidadeId($idUnidade);
        $dados = array("eventos" => $eventos,"unidades"=>$unidades, "unidade" => $unidade);

        if ($eventos != null) {
            $dados = array("eventos" => $eventos);
            $this->load->template_admin("evento/alterar_evento.php", $dados);
        }
        else {
            $this->session->set_flashdata("danger", "Não há eventos na unidade informada");
            redirect('evento/alterar_evento');
        }
    }

    public function pesquisaEventoId($id){
        autoriza(2);
        $this->load->model("evento_model");
        $this->load->model("TipoAtividade_model");

        $atividades = $this->TipoAtividade_model->dropDownAtividade();
        $linhaEvento = $this->evento_model->buscaEventoPorId($id);
        $dados = array("linhaEvento" => $linhaEvento, "atividades" => $atividades);

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

        $eventoId = $this->input->post("eventoId");
        $dataInicial = dataPtBrParaMysql($this->input->post("dtEvento"));
        $dataFinal = dataPtBrParaMysql($this->input->post("dtFinalEvento"));
        $horaEvento = $this->input->post("hrEvento");
        $usuarioLogado = $this->session->userdata("usuario_logado");
        $horaAtual = date('Y-m-d H:i:s');

        $evento = array(
            "id_tipo_atividade" => $this->input->post("Atividade"),
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

        if ($this->_periodoValido($dataInicial, $dataFinal)) {
            if ($this->evento_model->alteraEvento($eventoId, $evento)) {
                $this->session->set_flashdata("success", "Alteração Efetuada com Sucesso.");
                redirect('evento/alterar_evento');
            } else {
                $this->session->set_flashdata("danger", "O cadastro de evento não foi alterado. Por favor, tente novamente mais tarde.");
                redirect('evento/alterar_evento');
            }
        }
        else{
            $this->session->set_flashdata("danger", "A data do término do evento não pode ser anterior a data do início");
            redirect('evento/pesquisaEventoId/'.$eventoId);
        }
    }

    public function _periodoValido($dt_inicio, $dt_vencimento){
        if($dt_inicio <= $dt_vencimento)
            return true;
        else
            return false;
    }

    public function pesquisarEventoData(){
        autoriza(2);

        if($this->_validaFormulario(true)){
            $dataInicial = dataPtBrParaMysql($this->input->post("dtEvento"));
            $dataFinal = dataPtBrParaMysql($this->input->post("dtFinalEvento"));

            if ($dataInicial <= $dataFinal){
                $this->load->model("Evento_model");
                $eventos = $this->Evento_model->buscaEventosEntreDatas($dataInicial,$dataFinal);

                $dados = array(
                    'eventos' => $eventos,
                );

                $this->load->template_admin("evento/pesquisar_evento", $dados);

            }else{
                $this->session->set_flashdata("danger", "Você deve escolher um período válido.");
                $this->load->template_admin("evento/pesquisar_evento");
            }

        }else{
            $this->session->set_flashdata("danger", "Você deve escolher as datas.");
            $this->load->template_admin("evento/pesquisar_evento");
        }
    }

    public function _validaFormulario(){
        $this->load->library("form_validation");

        $this->form_validation->set_rules("dtEvento", "dtEvento", "required", array());
        $this->form_validation->set_rules("dtFinalEvento", "dtFinalEvento", "required", array());

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        return $this->form_validation->run();
    }


}
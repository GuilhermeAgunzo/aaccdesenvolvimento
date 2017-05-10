<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RelatorioAacc extends CI_Controller{

    public function index(){
        $this->load->template_admin("aluno/validacao_relatorio_aluno");
    }


    public function validacao_relatorio_aluno(){

        $this->load->template_admin("aluno/validacao_relatorio_aluno");

    }

    public function validarRelatorio(){
        autoriza(2);

            $this->load->model("unidade_model");
            $unidade = $this->unidade_model->buscarUnidades();
            $dados = array("unidade" => $unidade);

        $this->load->template_admin("aluno/validacao_relatorio_aluno",$dados);
    }

    public function pesquisaTurmasUnidade()
    {
        autoriza(2);
        $unidade = $this->input->post("Unidade");
        if ($unidade != null) {

            $this->load->model("turma_model");
            $this->load->model("unidade_model");
            $turmas = $this->turma_model->buscarTurmasUnidade($unidade);
            $unidade = $this->unidade_model->buscarUnidadeId($unidade);

            $dados = array("turmas" => $turmas, "unidade" => $unidade);
        }else{
            $this->session->set_flashdata("danger", "Selecione uma Unidade.");
            redirect('/aluno/pesquisar_aluno');
        }
        $this->load->template_admin("aluno/pesquisar_aluno.php",$dados);
    }

    public function pesquisarAluno($cd_mat_turma){
        autoriza(2);
        $this->load->model("aluno_model");
        $this->load->model("turma_model");
        $this->load->model("unidade_model");
        $turma = $this->turma_model->buscarTurma($cd_mat_turma);
        $idturma = $turma["id_turma"];
        $alunos = $this->aluno_model->buscaAlunosInTurmas($idturma);
        $unidade = $this->unidade_model->buscarUnidadeId($turma["id_unidade"]);

        $dados = array("alunos" => $alunos, "turma" => $turma, "unidade" => $unidade);
        $this->load->template_admin("aluno/pesquisar_aluno.php",$dados);
    }

    /*  RELATORIO    */
    public function buscarRelatorio(){
        autoriza(2);

        $this->load->model("unidade_model");
        $dropDownUnidade = $this->unidade_model->dropDownUnidade();

        $dados = array(
            'dropDownUnidade' => $dropDownUnidade
        );

        $this->load->template_admin("aluno/validacao_relatorio_aluno", $dados);

    }



    /**
     * @param $id_unidade
     */
    public function curso($id_unidade){
        // autoriza(2);
        $this->load->model("curso_model");

        $dropDownCurso = $this->curso_model->dropDownCursoUnidade($id_unidade);

        $dados = array("dropDownCurso" => $dropDownCurso);

        $this->load->view("aluno/dropdown_curso", $dados);

    }

    /**
     * @param $id_unidade
     */
    public function turma($id_unidade){
        autoriza(2);
        $this->load->model("turma_model");
        $dropDownTurma = $this->turma_model->dropDownTurmaUnidade($id_unidade);
        $dados = array("dropDownTurma" => $dropDownTurma);

        $this->load->view("aluno/dropdown_turma", $dados);

    }

    /**
     * @param  $id_curso
     */
    public function turma2($id_curso = null){
        // autoriza(2);
        if($id_curso != "---" && $id_curso != null && $id_curso != ""){
            $this->load->model("turma_model");
            $dropDownTurma = $this->turma_model->dropDownTurmaCurso($id_curso);
            $dados = array("dropDownTurma" => $dropDownTurma);
            $this->id_turma_global = $dados;
            $this->load->view("aluno/dropdown_turma_valid", $dados);
        }
        

    }

    /**
     * @param $id_turma
     */
    public function alunos($id_turma){
        autoriza(2);
        $this->load->model("aluno_model");
        $this->load->model("turma_model");
        $alunos = $this->aluno_model->buscaAlunosInTurmas($id_turma);
        $dados = array(
            "alunos" => $alunos,
            "id_turma" => $id_turma,
        );
        $this->load->view("aluno/lista_alunos", $dados);
    }

    /**
     * @param null $id_turma
     */
    public function pdf($id_turma = null){
        autoriza(2);

        if($id_turma == null || $id_turma == 0){
            $this->session->set_flashdata("danger", "VocÃª deve selecionar uma turma vÃ¡lida.");
            redirect('/aluno/buscar');
        }else{

            $this->load->helper('pdf_helper');

            $this->load->model("aluno_model");
            $this->load->model("turma_model");
            $alunos = $this->aluno_model->buscaAlunosInTurmas($id_turma);
            $turma = $this->turma_model->buscarTurmaId($id_turma);

            $titulo = "RelatÃ³rio de alunos da turma de {$turma['aa_ingresso']} - {$turma['dt_semestre']}Âº Sem - {$turma['nm_turno']}";
            $arquivo = "relatorio-de-alunos-da-turma-de-{$turma['aa_ingresso']}-{$turma['dt_semestre']}Sem-{$turma['nm_turno']}";

            $data = array(
                'titulo' => $titulo,
                'turma' => $turma,
                'alunos'=> $alunos,
                'arquivo' => $arquivo,
            );

            $this->load->view('aluno/relatorio_pdf', $data);
        }

    }


    /**
     * @param null $id_turma
     */
    public function imprimir($id_turma = null){
        autoriza(2);

        if($id_turma == null || $id_turma == 0){
            $this->session->set_flashdata("danger", "VocÃª deve selecionar uma turma vÃ¡lida.");
            redirect('/aluno/buscar');
        }else{


            $this->load->model("aluno_model");
            $this->load->model("turma_model");
            $alunos = $this->aluno_model->buscaAlunosInTurmas($id_turma);
            $turma = $this->turma_model->buscarTurmaId($id_turma);

            $titulo = "RelatÃ³rio de alunos da turma de {$turma['aa_ingresso']} - {$turma['dt_semestre']}Âº Sem - {$turma['nm_turno']}";
            $arquivo = "relatorio-de-alunos-da-turma-de-{$turma['aa_ingresso']}-{$turma['dt_semestre']}Sem-{$turma['nm_turno']}";

            $data = array(
                'titulo' => $titulo,
                'turma' => $turma,
                'alunos'=> $alunos,
                'arquivo' => $arquivo,
            );

            $this->load->view('aluno/imprimir', $data);
        }

    }


    /**
     * @param $id_turma
     */
    public function statusDeclaracao($id_turma = null){
        autoriza(2);

        if(isset($id_turma) && $id_turma != "---" && $id_turma != null && $id_turma != ""){
            $this->load->model("declaracao_model");
            $alunosTodos = $this->declaracao_model->dropDownStatusDeclaracao($id_turma);
            $dados = array(
                "alunosTodos" => $alunosTodos,
                "id_turma" => $id_turma,
            );
            $this->load->view("aluno/dropdown_status_declaracao.php", $dados);
        }
        
    }

    /**
     * @param
     */
    public function alunos2(){
        autoriza(2);

        $id_unidade = $this->input->post("id_unidade");
        $id_curso = $this->input->post("id_curso");
        $id_turma = $this->input->post("id_turma");
        $statusDeclaracao = $this->input->post("id_statusDeclaracao");

        // CARREGANDO MODELS
        $this->load->model("unidade_model");
        $this->load->model("curso_model");
        $this->load->model("turma_model");

        // BUSCA INFORMAÇÕES DO BANCO PARA COMPOR O CABEÇALHO
        $unidade = $this->unidade_model->buscarUnidadeId($id_unidade);
        $curso = $this->curso_model->buscaCurso($id_curso);
        $turma = $this->turma_model->buscarTurmaId($id_turma);

        // VERIFICA SE UM STATUS FOI SELECIONADO
        if ($statusDeclaracao != null && $statusDeclaracao != 0) {
            $this->load->model("aluno_model");
            $alunos = $this->aluno_model->buscaAlunosStatusDeclaracao($statusDeclaracao,$id_turma);
            $dados = array(
                "unidade" => $unidade,
                "curso" => $curso,
                "turma" => $turma,
                "alunos" => $alunos,
                "statusDeclaracao" => $statusDeclaracao
            );
        }else{
            $this->session->set_flashdata("danger", "Selecione um Status.");
            $this->load->view("aluno/dropdown_status_declaracao.php");
            //redirect('/aluno/dropdown_status_declaracao.php');
        }
        $this->load->template_admin("aluno/lista_declaracao_alunos",$dados);

    }


    public function lista_declaracao_alunos_selecionados($id_unidade,$id_curso,$id_turma,$id_aluno,$statusDeclaracao){
        autoriza(2);

        // CARREGANDO MODELS
        $this->load->model("declaracao_model");
        $this->load->model("tipoAtividade_model");
        $this->load->model("evento_model");
        $this->load->model("unidade_model");
        $this->load->model("curso_model");
        $this->load->model("turma_model");
        $this->load->model("aluno_model");

        // BUSCA INFORMAÇÕES DO BANCO PARA COMPOR O CABEÇALHO
        $unidade = $this->unidade_model->buscarUnidadeId($id_unidade);
        $curso = $this->curso_model->buscaCurso($id_curso);
        $turma = $this->turma_model->buscarTurmaId($id_turma);
        $aluno = $this->aluno_model->buscarAlunoId($id_aluno);

        $declaracoes = $this->declaracao_model->buscaDeclaracaoIdAluno($id_aluno);
        $tiposAtividade = array();
        foreach ($declaracoes as $declaracao){
            $tipoAtividade = $this->tipoAtividade_model->buscarTipoAtividade($declaracao['id_tipo_atividade']);
            $tiposAtividade[$declaracao['id_tipo_atividade']] = $tipoAtividade['nm_tipo_atividade'];
            if($declaracao['id_evento'] != null){
                $evento = $this->evento_model->buscaEventoPorId($declaracao['id_evento']);
                $eventos[$declaracao['id_evento']] = $evento['nm_evento'];
                $qtdHorasEventos[$declaracao['id_evento']] = $evento['qt_horas_evento'];
                $datasEventos[$declaracao['id_evento']] = $evento['dt_inicio_evento'];
            }
        }
        $dados = array(
            "unidade" => $unidade,
            "curso" => $curso,
            "turma" => $turma,
            "aluno" => $aluno,
            "statusDeclaracao" => $statusDeclaracao,
            "declaracoes" => $declaracoes,
            "tiposAtividade" => $tiposAtividade,
            "eventos" => $eventos,
            "qtdHorasEventos" => $qtdHorasEventos,
            "datasEventos" => $datasEventos
        );
        $this->load->template_admin("aluno/lista_declaracao_alunos_selecionados", $dados);
    }
    public function exibeDeclaracaoCompleta($id_declaracao){
        autoriza(2);

        $this->load->model("unidade_model");
        $this->load->model("curso_model");
        $this->load->model("turma_model");
        $this->load->model("aluno_model");
        $this->load->model("declaracao_model");
        
        $declaracaoCompleta = $this->declaracao_model->buscaDeclaracaoCompleta($id_declaracao);
        $motivoIdIndeferimento = $this->declaracao_model->buscaIdMotivoIndeferimento();
        $motivoNomeIndeferimento = $this->declaracao_model->buscaNomeMotivoIndeferimento();
        
        $aluno = $this->aluno_model->buscarAlunoId($declaracaoCompleta['id_aluno']);
        $turma = $this->turma_model->buscarTurmaId($aluno['id_turma']);
        $curso = $this->curso_model->buscaCurso($turma['id_curso']);
        $unidade = $this->unidade_model->buscarUnidadeId($turma['id_unidade']);

        // Verifica se o evento é externo através do preechimento da coluna nm_evento_externo
        // Essa coluna deve estar preenchida, se e somente se o evento não for interno da unidade
        if($declaracaoCompleta['nm_evento_externo'] == null || $declaracaoCompleta['nm_evento_externo'] == ''){
        
            $this->load->model('evento_model');
            $evento = $this->evento_model->buscaEventoPorId($declaracaoCompleta['id_evento']);

            $dados = array(
                "declaracaoCompleta" => $declaracaoCompleta,
                "evento" => $evento,
                "motivoIdIndeferimento" => $motivoIdIndeferimento,
                "motivoNomeIndeferimento" => $motivoNomeIndeferimento,
                "aluno" => $aluno,
                "turma" => $turma,
                "curso" => $curso,
                "unidade" => $unidade
            );
        
        }else{
        
            $dados = array(
            "declaracaoCompleta" => $declaracaoCompleta,
            "motivoIdIndeferimento" => $motivoIdIndeferimento,
            "motivoNomeIndeferimento" => $motivoNomeIndeferimento,
            "aluno" => $aluno,
            "turma" => $turma,
            "curso" => $curso,
            "unidade" => $unidade
            );
        
        }
        
        $this->load->template_admin("aluno/exibe_declaracao_completa", $dados);
    }

    public function validarRelatorioAacc(){
        autoriza(2);
        $this->load->helper("date");
        $this->load->model("declaracao_model");
        $this->load->model("TotalDeHoras_model");
        $this->load->library('usuariolb');
        $this->load->library("form_validation");

        $id_unidade = $this->input->post("unidade");
        $id_curso = $this->input->post("curso");
        $id_turma = $this->input->post("turma");
        $status_declaracao = $this->input->post("status_declaracao");



        $usuarioLogado = $this->session->userdata("usuario_logado");
            $dt_aprovacao = dataPtBrParaMysql($this->input->post("dt_aprovacao"));
            $observacao = $this->input->post("observacao");
            $statusDeclaracao = $this->input->post("aprovacao");
            $id_motivoInd = $this->input->post("id_motivoInd");
            $totalHorasAprovada = $this->input->post("totalHorasAprovada");
            $id_aluno = $this->input->post("id_aluno");
            $id_declaracao = $this->input->post("id_declaracao");
            $id_tipoAtividade = $this->input->post("id_tipo_atividade");
            if ($observacao == "") {$observacao = null;}
            if ($statusDeclaracao == 2) {
                $id_motivoInd = null;
            }else{
                {$totalHorasAprovada = null;
                }
            }
        $this->form_validation->set_rules("dt_aprovacao", "dt_aprovacao", "required",
            array(
                'required' => "VocÃª precisa preencher a Data da AprovaÃ§Ã£o"
            ));
        $this->form_validation->set_rules("totalHorasAprovada", "totalHorasAprovada", "required",
            array(
                'required' => "VocÃª precisa preencher a Quantidade de Horas Aprovada"
            ));

        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
        $this->form_validation->run();

            $declaracaoValidada = array(
                "st_declaracao" => $statusDeclaracao,
                "qt_horas_aprovadas" => $totalHorasAprovada,
                "ds_observacao" => $observacao,
                "dt_aprovacao_doc" => $dt_aprovacao,
                "dt_cadastro" => mdate("%Y-%m-%d %H:%i:%s", time()),
                "id_declaracao" => $id_declaracao,
                "id_professor" => $usuarioLogado['id_usuario'],
                "id_motivo_indeferimento" => $id_motivoInd,
                "id_aluno" => $id_aluno,
                "id_tipo_atividade" => $id_tipoAtividade,
            );
        $status = $this->input->post("aprovacao");
        $this->declaracao_model->salvaDeclaracaoValidada($declaracaoValidada);
        $this->declaracao_model->validaDeclaracao($status,$id_declaracao);
        $this->TotalDeHoras_model->somaHoras($id_aluno,$id_tipoAtividade);
        $this->session->set_flashdata("success", "Validação Efetuada com Sucesso!");

        $this->lista_declaracao_alunos_selecionados($id_unidade,$id_curso,$id_turma,$id_aluno,$status_declaracao);


    }


}

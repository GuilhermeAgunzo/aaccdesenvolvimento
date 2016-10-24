<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RelatorioAacc extends CI_Controller{

    public function index(){
        $this->load->template_admin("aluno/validacao_relatorio_aluno");
    }


    public function validacao_relatorio_aluno(){

        $this->load->template_admin("aluno/validacao_relatorio_aluno");

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

        $this->load->template_admin("aluno/relatorio_aluno", $dados);

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
            $this->session->set_flashdata("danger", "Você deve selecionar uma turma válida.");
            redirect('/aluno/buscar');
        }else{

            $this->load->helper('pdf_helper');

            $this->load->model("aluno_model");
            $this->load->model("turma_model");
            $alunos = $this->aluno_model->buscaAlunosInTurmas($id_turma);
            $turma = $this->turma_model->buscarTurmaId($id_turma);

            $titulo = "Relatório de alunos da turma de {$turma['aa_ingresso']} - {$turma['dt_semestre']}º Sem - {$turma['nm_turno']}";
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
            $this->session->set_flashdata("danger", "Você deve selecionar uma turma válida.");
            redirect('/aluno/buscar');
        }else{


            $this->load->model("aluno_model");
            $this->load->model("turma_model");
            $alunos = $this->aluno_model->buscaAlunosInTurmas($id_turma);
            $turma = $this->turma_model->buscarTurmaId($id_turma);

            $titulo = "Relatório de alunos da turma de {$turma['aa_ingresso']} - {$turma['dt_semestre']}º Sem - {$turma['nm_turno']}";
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



}

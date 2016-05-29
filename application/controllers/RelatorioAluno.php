<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RelatorioAluno extends CI_Controller{

    public function index(){
        autoriza(2);
        redirect('/RelatorioAluno/buscar');
    }

    public function buscar(){
        autoriza(2);

        $this->load->model("unidade_model");
        $dropDownUnidade = $this->unidade_model->dropDownUnidade();

        $dados = array(
            'dropDownUnidade' => $dropDownUnidade
        );

        $this->load->template_admin("relatorioAluno/relatorio_aluno", $dados);

    }

    /**
     * @param $id_unidade
     */
    public function turma($id_unidade){
        autoriza(2);
        $this->load->model("turma_model");
        $dropDownTurma = $this->turma_model->dropDownTurmaUnidade($id_unidade);
        $dados = array("dropDownTurma" => $dropDownTurma);

        $this->load->view("relatorioAluno/dropdown_turma", $dados);

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
        $this->load->view("relatorioAluno/lista_alunos", $dados);
    }

    /**
     * @param null $id_turma
     */
    public function pdf($id_turma = null){
        autoriza(2);

        if($id_turma == null || $id_turma == 0){
            $this->session->set_flashdata("danger", "Você deve selecionar uma turma válida.");
            redirect('/RelatorioAluno/buscar');
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

        $this->load->view('relatorioAluno/relatorio_pdf', $data);
        }

    }




}

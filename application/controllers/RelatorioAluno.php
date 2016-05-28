<?php

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

    public function turma($id_unidade){
        autoriza(2);
        $this->load->model("turma_model");
        $dropDownTurma = $this->turma_model->dropDownTurmaUnidade($id_unidade);
        $dados = array("dropDownTurma" => $dropDownTurma);

        $this->load->view("relatorioAluno/dropdown_turma", $dados);

    }

    public function alunos($id_turma){
        autoriza(2);
        $this->load->model("aluno_model");
        $this->load->model("turma_model");
        $this->load->model("unidade_model");
        $alunos = $this->aluno_model->buscaAlunosInTurmas($id_turma);
        $dados = array("alunos" => $alunos);
        $this->load->view("relatorioAluno/lista_alunos", $dados);
    }

}

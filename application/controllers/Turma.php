<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Turma extends CI_Controller{

    /*   Métodos que somente chamam views   */

    public function cadastrar_turma(){
        autoriza(2);

        $this->load->model("unidade_model");
        $dropDownUnidade = $this->unidade_model->dropDownUnidade();

        $dados = array(
            'dropDownUnidade' => $dropDownUnidade
        );

        $this->load->template_admin("turma/cadastrar_turma", $dados);
    }

    public function alterar_turma(){
        autoriza(2);
        $this->load->template_admin("turma/alterar_turma");
    }

    public function pesquisar_turma(){
        autoriza(2);
        $this->load->model("unidade_model");
        $unidades = $this->unidade_model->dropDownUnidade();

        $dados = array("unidades" => $unidades);
        $this->load->template_admin("turma/pesquisar_turma",$dados);
    }

    /*   Metodos principais   */

    public function cadastrarTurma(){
        autoriza(2);
        $usuarioLogado = $this->session->userdata("usuario_logado");

        $dados = array();

        if($this->_validaForm(true)){

            $turma = array(
                "cd_mat_turma" => $this->input->post("cd_mat_turma"),
                "id_unidade" => $this->input->post("unidade"),
                "nm_turno" => $this->input->post("turno"),
                "aa_ingresso" => $this->input->post("ano"),
                "dt_semestre" => $this->input->post("semestre"),
                "nm_modalidade" => $this->input->post("modalidade"),
                "qt_ciclo" => $this->input->post("ciclo"),
                "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
                "dt_cadastro" => mdate("%Y-%m-%d %H:%i:%s", time()),
            );

            $this->load->model("turma_model");
            $this->turma_model->cadastrarTurma($turma);

            $this->session->set_flashdata("success", "Cadastro efetuado com sucesso");
            redirect("/turma/cadastrar_turma");

        }else{
            $this->session->set_flashdata("danger", "Erro ao cadastrar");
        }

        $this->load->model("unidade_model");
        $dropDownUnidade = $this->unidade_model->dropDownUnidade();

        $dados = array(
            'dropDownUnidade' => $dropDownUnidade
        );

        $this->load->template_admin("turma/cadastrar_turma", $dados);
    }

    public function alterarTurma(){
        autoriza(2);
        $usuarioLogado = $this->session->userdata("usuario_logado");

        $this->output->enable_profiler(TRUE);

        $turma = array(
            "id_turma" => $this->input->post("id_turma"),
            "cd_mat_turma" => $this->input->post("cd_mat_turma"),
            "nm_turno" => $this->input->post("turno"),
            "aa_ingresso" => $this->input->post("ano"),
            "dt_semestre" => $this->input->post("semestre"),
            "nm_modalidade" => $this->input->post("modalidade"),
            "qt_ciclo" => $this->input->post("ciclo"),
            "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
            "dt_cadastro" => mdate("%Y-%m-%d %H:%i:%s", time()),
        );

        if($this->_validaForm(false)){

            $this->load->model("turma_model");
            $this->turma_model->alteraTurma($turma);

            $this->session->set_flashdata("success", "Alteração efetuada com sucesso");
            redirect("/turma/alterar_turma");
            $this->load->template_admin("turma/alterar_turma");

        }else{
            $this->session->set_flashdata("danger", "Erro ao alterar. Verifique os dados");
            $dados = array("turma" => $turma, "erro" => "Erro");
        }

        $dados = array("turma" => $turma, "erro" => "Erro");
        $this->load->template_admin("turma/alterar_turma", $dados);
    }

    public function buscarAlterarTurma(){
        autoriza(2);
        $this->load->library("form_validation");

        $this->form_validation->set_rules("cd_mat_turma", "cd_mat_turma", "required|is_natural",
            array(
                'required' => 'Você precisa preencher o código da turma.',
                'is_natural' => 'O código deve conter somente números.'
            )
        );

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        $dados = array();

        if($this->form_validation->run()){

            $cd_mat_turma = $this->input->post("cd_mat_turma");

            $this->load->model("turma_model");
            $turma = $this->turma_model->buscarTurma($cd_mat_turma);

            $this->load->model("unidade_model");
            $dropDownUnidade = $this->unidade_model->dropDownUnidade();

            if($turma!=null){
            $dados = array("turma" => $turma,"dropDownUnidade" => $dropDownUnidade, "id_turma" => $turma['id_turma']);
            }else{
                $this->session->set_flashdata("danger", "Turma não encotrada. Verifique os dados");
                redirect('/turma/alterar_turma');
            }
        }
        $this->load->template_admin("turma/alterar_turma", $dados);
    }

    public function pesquisarTurma($cd_mat_turma){
        autoriza(2);
        $this->load->model("turma_model");
        $this->load->model("unidade_model");

        $turma = $this->turma_model->buscarTurma($cd_mat_turma);
        $unidade = $this->unidade_model->buscarUnidadeId($turma["id_unidade"]);
        $dados = array("turma" => $turma, "unidade" => $unidade);

        if($turma){
            $this->load->template_admin("turma/pesquisar_turma.php", $dados);
        }else{
            $this->session->set_flashdata("danger", "Turma  não foi localizada. Verifique os dados ou tente novamente mais tarde");
            redirect("/turma/pesquisar_turma");
        }
    }
    public function pesquisarTurmaInUnidade(){
        autoriza(2);
        $idUnidade = $this->input->post("Unidade");

        $this->load->model("turma_model");
        $this->load->model("unidade_model");

        $unidade = $this->unidade_model->buscarUnidadeId($idUnidade);
        $turmas = $this->turma_model->buscarTurmasUnidade($idUnidade);
        $dados = array("turmas" => $turmas, "unidade" => $unidade);

        if ($turmas) {
            $this->load->template_admin("turma/pesquisar_turma.php", $dados);
        } else {
            $this->session->set_flashdata("danger", "Não há Turmas cadastradas nessa Unidade.");
            redirect("/turma/pesquisar_turma");
        }

    }

        /*  Métodos auxiliares  */

    /**
     * @param $unidade
     * @return mixed - retorna true caso tudo esteja correto
     */
    public function _validaForm($cadastrar){

        $this->load->library("form_validation");

        $mensagem = array(
            "is_unique" => "Já existe uma turma cadastrada com este código"
        );

        if($cadastrar){
            $this->form_validation->set_rules("unidade", "unidade", "required|is_natural", $mensagem);
            $this->form_validation->set_rules("cd_mat_turma", "cd_mat_turma", "required|is_natural|is_unique[tb_turma.cd_mat_turma]", $mensagem);
        }else{
            $this->form_validation->set_rules("cd_mat_turma", "cd_mat_turma", "required|is_natural", $mensagem);
        }

        //$this->form_validation->set_rules("turno", "turno", "required", $mensagem);
        $this->form_validation->set_rules("ano", "ano", "required|is_natural|greater_than[1968]|exact_length[4]", $mensagem);
        $this->form_validation->set_rules("semestre", "semestre", "required|is_natural", $mensagem);
        $this->form_validation->set_rules("ciclo", "ciclo", "required", $mensagem);
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        return $this->form_validation->run();

    }

}

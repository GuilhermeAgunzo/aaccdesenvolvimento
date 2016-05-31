<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Aluno extends CI_Controller{

    /*    MÉTODOS QUE CHAMAM SOMENTE VIEWS    */

    public function cadastro_aluno(){
        autoriza(2);

        $unidade = $this->input->post("Unidade");

        $this->load->model("unidade_model");
        $this->load->model("turma_model");
        $unidades = $this->unidade_model->dropDownUnidade();

        if($unidade!=null){
            $turmasUnidade = $this->turma_model->dropDownTurmaUnidade($unidade);
            $dados = array("unidades" => $unidades, "unidade" => $unidade, "turmasUnidade" => $turmasUnidade);
        }else {
            $dados = array("unidades" => $unidades);
        }
        $this->load->template_admin("aluno/cadastroAluno", $dados);
    }

    public function alterar_aluno(){
        autoriza(2);
        $this->load->template_admin("aluno/alterar_aluno");
    }

    public function pesquisar_aluno(){
        autoriza(2);
        $this->load->model("unidade_model");
        $unidades = $this->unidade_model->dropDownUnidade();

        $dados = array("unidades" => $unidades);
        $this->load->template_admin("aluno/pesquisar_aluno.php", $dados);
    }

    public function desativar_cadastro(){
        autoriza(2);
        $this->load->template_admin("aluno/desativar_aluno");
    }


    /*  METODOS PRINCIPAIS    */

    public function cadastrarAluno(){
        autoriza(2);


        $this->load->model("aluno_model");
        $this->load->library("usuariolb");

        $email = $this->input->post("email");
        $matricula = $this->input->post("matricula");

        if($this->_validaFormulario($email, $matricula)){

            $id_usuario = $this->usuariolb->cadastrarUsuario($email,1);

            if($id_usuario > 0){

                $usuarioLogado = $this->session->userdata("usuario_logado");

                $aluno = array(
                    "cd_mat_aluno" => $this->input->post("matricula"),
                    "nm_aluno" => $this->input->post("nome"),
                    "nm_email" => $this->input->post("email"),
                    "id_turma" => $this->input->post("turma"),
                    "id_usuario" => $id_usuario,
                    "dt_cadastro" => mdate("%Y-%m-%d %H:%i:%s", time()),
                    "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
                    "cd_tel_celular" => $this->input->post("celular"),
                    "cd_tel_residencial" => $this->input->post("telefone"),
                );

                $this->aluno_model->cadastrarAluno($aluno);
                $this->session->set_flashdata("success", "Cadastro efetuado com sucesso!");
                redirect('/aluno/cadastro_aluno');

            }else{
                $this->session->set_flashdata("danger", "O cadastro não foi efetuado. Tente novamente mais tarde.");
                redirect('/aluno/cadastro_aluno');
            }
        }

        $unidade = $this->input->post("unidade");
        $this->load->model("unidade_model");
        $this->load->model("turma_model");

        $turmasUnidade = $this->turma_model->dropDownTurmaUnidade($unidade);
        $unidades = $this->unidade_model->dropDownUnidade();

        $dados = array('unidade' => $unidade, 'unidades' => $unidades, 'turmasUnidade' => $turmasUnidade);

        $this->load->template_admin("aluno/cadastroAluno", $dados);
    }

    public function alterarAluno(){
        autoriza(2);
        $this->load->model("aluno_model");
        $this->load->library("usuariolb");

        $usuarioLogado = $this->session->userdata("usuario_logado");
        $aluno = array(
            "cd_mat_aluno" => $this->input->post("matricula"),
            "nm_aluno" => $this->input->post("nome"),
            "nm_email" => $this->input->post("email"),
            "id_turma" => $this->input->post("turma"),
            "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
            "dt_cadastro" => mdate("%Y-%m-%d %H:%i:%s", time()),
            "cd_tel_celular" => $this->input->post("celular"),
            "cd_tel_residencial" => $this->input->post("telefone"),
        );

        $id_aluno = $this->input->post("id_aluno");

        $this->load->model("turma_model");
        $turma = $this->turma_model->buscarTurmaId($aluno['id_turma']);
        $dropDownTurma = $this->turma_model->dropDownTurmaUnidade($turma['id_unidade']);

        $dados = array("aluno" => $aluno, "id_aluno" => $id_aluno, 'dropDownTurma' => $dropDownTurma);
        $alunoBD = $this->aluno_model->buscarAlunoId($id_aluno);

        $emailUnique = false;
        $matriculaUnique = false;

        if($aluno['nm_email'] != $alunoBD['nm_email']){
            $emailUnique = true;
        }

        if($aluno['cd_mat_aluno'] != $alunoBD['cd_mat_aluno']){
            $matriculaUnique = true;
        }

        if($this->_validaFormulario($emailUnique, $matriculaUnique)){
            $this->aluno_model->alterarAluno($dados);
            $this->session->set_flashdata("success", "Alteração efetuada com sucesso!");
            redirect('/aluno/alterar_aluno');
        }

        $this->load->template_admin("aluno/alterar_aluno", $dados);
    }

    public function buscarAlteraAluno()
    {
        autoriza(2);
        $this->load->library("form_validation");
        $this->form_validation->set_rules("matricula", "matricula", "required|is_natural|exact_length[13]",
            array(
                'required' => 'Você precisa preencher a matricula.',
                'is_natural' => 'A matricula deve conter somente números.'
            )
        );
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        $sucesso = $this->form_validation->run();

        if ($sucesso) {
            $matricula = $this->input->post("matricula");

            $this->load->model("aluno_model");
            $aluno = $this->aluno_model->buscarAluno($matricula);
            if ($aluno != null) {
                if($aluno['status_ativo']!=1){
                    $this->session->set_flashdata("danger", "Esse Aluno esta desativado.");

                }
                $this->load->model("turma_model");
                $turma = $this->turma_model->buscarTurmaId($aluno['id_turma']);
                $dropDownTurma = $this->turma_model->dropDownTurmaUnidade($turma['id_unidade']);

                $dados = array("aluno" => $aluno, "id_aluno" => $aluno['id_aluno'], 'dropDownTurma' => $dropDownTurma);
                $this->load->template_admin("aluno/alterar_aluno", $dados);

            } else {
                $this->session->set_flashdata("danger", "Aluno não encontrado, Verifique os dados.");
                redirect('/aluno/alterar_aluno');
            }
        } else {
            $this->session->set_flashdata("danger", "Erro ao alterar aluno, Verifique os dados.");
            redirect('/aluno/alterar_aluno');
        }
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

    public function pesquisaNomeAluno(){
        autoriza(2);
        $termo = $this->input->post("nm_aluno");
        $cd_mat_turma = $this->input->post("turma");

        $this->load->model("aluno_model");
        $this->load->model("turma_model");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("nm_aluno","nm_aluno","required",
            array(
                'required' => "Você precisa preencher o nome do aluno"
            ));
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
        $this->form_validation->run();

        $turma = $this->turma_model->buscarTurma($cd_mat_turma);
        $alunos = $this->aluno_model->buscaNomeAluno($termo,$turma["id_turma"]);


        if(!$alunos){
            $this->session->set_flashdata("danger", "Aluno  não foi localizado. Verifique os dados ou tente novamente mais tarde");
            $alunos = $this->aluno_model->buscaAlunosInTurmas($turma["id_turma"]);

        }
        $dados = array("alunos" => $alunos, "turma" => $turma, "termo" => $termo);
        $this->load->template_admin("aluno/pesquisar_aluno.php", $dados);

    }

    public function desativarAluno(){

        $this->load->library("form_validation");

            $this->form_validation->set_rules("matricula", "matricula", "required|numeric",
                array(
                    'required' => 'Você precisa preencher %s.',
                    'numeric' => 'A matricula deve conter somente números.'
                )
            );

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        if($this->form_validation->run()){

            $this->load->model("aluno_model");
            $this->load->library('usuariolb');
            $usuarioLogado = $this->session->userdata("usuario_logado");

            $matricula = $this->input->post("matricula");

            $aluno = $this->aluno_model->buscarAluno($matricula);
            $id_usuario = $aluno["id_usuario"];

            $this->usuariolb->alterarUsuario($id_usuario,0);

            $aluno = array(
                "dt_desativado" => mdate("%Y-%m-%d %H:%i:%s", time()),
                "status_ativo" => 0,
                "id_user_adm_desativou" => $usuarioLogado['id_usuario']
            );

            $this->aluno_model->desativarAluno($matricula,$aluno);

            $this->session->set_flashdata("success", "Aluno desativado com sucesso.");
        }else{
            $this->session->set_flashdata("danger", "Erro na matricula.");
        }

        redirect("/aluno/desativar_cadastro");

    }

    public function buscaDesativarAluno(){
        autoriza(2);

        $this->load->library("form_validation");
        $this->form_validation->set_rules("matricula","matricula","required|is_natural|exact_length[13]",
            array(
                'is_natural' => "A matricula deve conter apenas números"
            ));

        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

        if($this->form_validation->run()){

            $matricula = $this->input->post("matricula");
            $this->load->model("aluno_model");
            $aluno = $this->aluno_model->buscarAluno($matricula);

            $this->load->model("turma_model");

            if ($aluno != null) {
                if($aluno['status_ativo']!=1){
                    $this->session->set_flashdata("danger", "Esse Aluno está desativado.");
                    redirect('/aluno/desativar_cadastro');
                }

                $turma = $this->turma_model->buscarTurmaId($aluno['id_turma']);
                $dropDownTurma = $this->turma_model->dropDownTurmaUnidade($turma['id_unidade']);

                $dados = array("aluno" => $aluno, "dropDownTurma" => $dropDownTurma);
                $this->load->template_admin("aluno/desativar_aluno", $dados);

            }else{
                $this->session->set_flashdata("danger", "Aluno não encontrado, Verifique os dados.");
                redirect('/aluno/desativar_cadastro');
            }
        }else{
            $this->session->set_flashdata("danger", "Aluno não encontrado, Verifique os dados.");
            redirect('/aluno/desativar_cadastro');
        }
    }

    /*  MÉTODOS AUXILIARES  */

    public function _validaFormulario($emailUnique, $matriculaUnique){

        $this->load->library("form_validation");

        $mensagem = array(
            'required' => 'Você precisa preencher %s.',
            'is_natural' => 'A matricula deve conter somente números.',
            'is_unique' => 'Já existe um aluno cadastrado com esta matricula.'
        );

        $mensagemEmail = array(
            'valid_email' => 'Você precisa preencher um email válido.',
            'is_unique' => 'Já existe um usuário cadastrado com este email.'
        );

        if($emailUnique){
            $this->form_validation->set_rules("email", "email", "required|valid_email|is_unique[tb_usuario.nm_email]", $mensagemEmail);
        }else{
            $this->form_validation->set_rules("email", "email", "required|valid_email", $mensagemEmail);
        }

        if($matriculaUnique){
            $this->form_validation->set_rules("matricula", "matricula", "required|is_natural|exact_length[13]|is_unique[tb_aluno.cd_mat_aluno]", $mensagem);
        }else{
            $this->form_validation->set_rules("matricula", "matricula", "required|is_natural|exact_length[13]", $mensagem);
        }

        $this->form_validation->set_rules("nome", "nome", "required", $mensagem);

        $this->form_validation->set_rules("turma", "turma", "required|is_natural",
            array(
                'is_natural' => 'Selecione uma turma válida.'
            )
        );

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        return $this->form_validation->run();

    }

    public function _emailCadastrado($email){
        $this->load->model("aluno_model");

        $sucesso = $this->aluno_model->emailCadastrado($email);
        if ($sucesso){
            return FALSE;
        }else{
            return TRUE;
        }

    }
}
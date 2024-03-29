<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Professor extends CI_Controller{

    public function index(){
        autoriza(2);
        $this->load->template_admin("professor/tutorial_professor.php");
    }

    public function cadastro_professor(){
        autoriza(2);
        $this->load->model("unidade_model");
        $unidades = $this->unidade_model->dropDownUnidade();
        $dados = array("unidades" => $unidades);
        $this->load->template_admin("professor/cadastrar_professor.php",$dados);
    }

    public function pesquisar_professor(){
        autoriza(2);

        $this->load->model("unidade_model");
        $unidades = $this->unidade_model->dropDownUnidade();

        $dados = array("unidades" => $unidades);
        $this->load->template_admin("professor/pesquisar_professor.php",$dados);

    }

    public function alterar_professor(){
        autoriza(2);
        $this->load->model("unidade_model");
        $unidades = $this->unidade_model->dropDownUnidade();

        $dados = array("unidades" => $unidades);
        $this->load->template_admin("professor/alterar_professor.php", $dados);
    }

    public function desativar_cadastro_professor(){
        autoriza(2);
        $this->load->model("unidade_model");
        $unidades = $this->unidade_model->dropDownUnidade();

        $dados = array("unidades" => $unidades);
        $this->load->template_admin("professor/desativar_professor.php",$dados);
    }

    public function cadastro_aviso(){
        autoriza(2);
        $this->load->template_admin("professor/cadastro_avisos.php");
    }

    public function anexo_documento_comprobatorio(){
        autoriza(2);
        $this->load->template_admin("professor/anexo_documento_comprobatorio.php");
    }

    public function relatorio_protocolo_entregas(){
        autoriza(2);
        $this->load->template_admin("professor/relatorio_protocolo_entregas.php");
    }

    public function tutorial_professor(){
        autoriza(2);
        $this->load->template_admin("professor/tutorial_professor.php");
    }

    public function cadastroProfessor()
    {
        autoriza(2);
        $this->load->helper("date");
        $this->load->model("professor_model");
        $this->load->library('usuariolb');

        $email = $this->input->post("email");

        if ($this->_validaFormulario($email)){

            $data_entrada = dataPtBrParaMysql($this->input->post("data_entrada"));
            $data_saida = dataPtBrParaMysql($this->input->post("data_saida"));
            $telefone = $this->input->post("telefone");
            $celular = $this->input->post("celular");

            if ($telefone == "") {$telefone = null;}
            if ($celular == "") {$celular = null;}
            if ($data_saida == "") {$data_saida = null;}

            $usuarioLogado = $this->session->userdata("usuario_logado");

            if($data_saida != null){
                if ($this->_periodoValido($data_entrada, $data_saida)) {
                    $id_usuario = $this->usuariolb->cadastrarUsuario($email, 2);

                    $professor = array(
                        "nm_professor" => $this->input->post("nome"),
                        "nm_email" => $email,
                        "cd_tel_residencial" => $telefone,
                        "cd_tel_celular" => $celular,
                        "dt_entrada" => $data_entrada,
                        "id_unidade" => $this->input->post("Unidade"),
                        "id_curso" => $this->input->post("cursos"),
                        "dt_saida" => $data_saida,
                        "status_ativo" => 1,
                        "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
                        "id_usuario" => $id_usuario
                    );


                    $this->professor_model->salvaCadastro($professor);
                    $this->session->set_flashdata("success", "Cadastrado efetuado com sucesso.");
                    redirect('/professor/cadastro_professor');
                }
                else
                {
                    $this->session->set_flashdata("danger", "A data do término do evento não pode ser anterior a data do início");
                    redirect('/professor/cadastro_professor');
                }

            }else{
                $id_usuario = $this->usuariolb->cadastrarUsuario($email, 2);

                $professor = array(
                    "nm_professor" => $this->input->post("nome"),
                    "nm_email" => $email,
                    "cd_tel_residencial" => $telefone,
                    "cd_tel_celular" => $celular,
                    "dt_entrada" => $data_entrada,
                    "id_unidade" => $this->input->post("Unidade"),
                    "id_curso" => $this->input->post("cursos"),
                    "dt_saida" => $data_saida,
                    "status_ativo" => 1,
                    "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
                    "id_usuario" => $id_usuario
                );


                $this->professor_model->salvaCadastro($professor);
                $this->session->set_flashdata("success", "Cadastrado efetuado com sucesso.");
                redirect('/professor/cadastro_professor');

            }
        }

        $this->load->model("unidade_model");
        $unidades = $this->unidade_model->dropDownUnidade();
        $unidade = $this->input->post("Unidade");

        $dados = array('unidade' => $unidade, 'unidades' => $unidades);

        $this->load->template_admin("professor/cadastrar_professor", $dados);
    }

    public function pesquisaProfessores(){
        autoriza(2);

        $cursos = array();

        $idUnidade = $this->input->post("Unidade");

        $opcao = $this->input->post("opcao");
        $this->load->model("professor_model");
        $this->load->model("unidade_model");
        $this->load->model("curso_model");
        $professores = $this->professor_model->buscaProfessoresUnidade($idUnidade);
        $unidades = $this->unidade_model->buscaUnidades();
        $unidade = $this->unidade_model->buscarUnidadeId($idUnidade);

        foreach ($professores as $professor){
            $curso = $this->curso_model->buscaCurso($professor['id_curso']);
            $cursos[$professor['id_curso']] = $curso['nm_abreviacao'];
        }
        array_unique($cursos);
        $dados = array("professores" => $professores,"unidades"=>$unidades, "unidade" => $unidade, "cursos" => $cursos);

        if($opcao=='Pesquisar'){
            $this->load->template_admin("professor/pesquisar_professor.php",$dados);
        }elseif($opcao=='Alterar'){
            $this->load->template_admin("professor/alterar_professor.php",$dados);
        }elseif($opcao=='Desativar'){
            $this->load->template_admin("professor/desativar_professor.php",$dados);
        }
    }

    public function pesquisaNomeProfessor(){
        autoriza(2);
        $termo = $this->input->post("nm_professor");
        $idUnidade = $this->input->post("idUnidade");
        $opcao = $this->input->post("opcao");

        $this->load->model("professor_model");
        $this->load->model("unidade_model");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("nm_professor", "nm_professor", "required",
            array(
                'required' => "Você precisa preencher o nome do professor"
            ));

        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
        $this->form_validation->run();

        $professores = $this->professor_model->buscaNomeProfessor($termo, $idUnidade);
        $unidade = $this->unidade_model->buscarUnidadeId($idUnidade);

        if (!$professores){
            $this->session->set_flashdata("danger", "Professor não foi localizado. Verifique os dados ou tente novamente mais tarde");
            $professores = $this->professor_model->buscaProfessoresUnidade($idUnidade);
        }
        $dados = array("professores" => $professores, "unidade" => $unidade, "termo" => $termo);

        if($opcao=='Pesquisar'){
            $this->load->template_admin("professor/pesquisar_professor.php",$dados);
        }elseif($opcao=='Alterar'){
            $this->load->template_admin("professor/alterar_professor.php",$dados);
        }elseif($opcao=="Desativar"){
            $this->load->template_admin("professor/desativar_professor.php",$dados);
        }
    }

    public function alteraProfessor(){
        autoriza(2);
        $this->load->model("professor_model");
        $this->load->library("usuariolb");

        $id_professor = $this->input->post("cd_professor");
        $data_entrada = dataPtBrParaMysql($this->input->post("data_entrada"));
        $data_saida = dataPtBrParaMysql($this->input->post("data_saida"));
        $email = $this->input->post("email");
        $telefone = $this->input->post("telefone");
        $celular = $this->input->post("celular");
        $professor = $this->professor_model->buscaProfessor($id_professor);

        $id_usuario = $professor["id_usuario"];

        $this->usuariolb->alterarUsuario($id_usuario,1,$email);
        if($telefone == ""){
            $telefone = null;
        }
        if($celular == ""){
            $celular = null;
        }

        if($data_saida == ""){
            $data_saida = null;
        }

        $professor = array(
            "nm_professor" => $this->input->post("nome"),
            "nm_email" => $email,
            "id_unidade" => $this->input->post("Unidade"),
            "id_curso" => $this->input->post("cursos"),
            "cd_tel_residencial" => $telefone,
            "cd_tel_celular" => $celular,
            "dt_entrada" => $data_entrada,
            "dt_saida" => $data_saida
        );
        if($data_saida != null){
            if ($this->_periodoValido($data_entrada, $data_saida)) {
                if ($this->_validaFormulario(false)) {
                    if ($this->professor_model->alteraProfessor($id_professor, $professor)) {
                        $this->session->set_flashdata("success", "Alteração efetuada com sucesso.");
                        redirect('/professor/alterar_professor');
                    } else {
                        $this->session->set_flashdata("danger", "A alteração não foi efetuada. Tente novamente mais tarde.");
                        redirect('/professor/alterar_professor');
                    }
                } else {
                    $this->load->model("unidade_model");
                    $unidades = $this->unidade_model->dropDownUnidade();
                    $professor['id_professor'] = $id_professor;

                    $dados = array("professor" => $professor, "unidades" => $unidades);
                    $this->load->template_admin("professor/alterar_professor", $dados);
                }
            }
            else{
                $this->session->set_flashdata("danger", "A data do término do evento não pode ser anterior a data do início");
                redirect('/professor/buscaAlteraProfessor/'.$id_professor);
            }
        } else{
            if ($this->_validaFormulario(false)) {
                if ($this->professor_model->alteraProfessor($id_professor, $professor)) {
                    $this->session->set_flashdata("success", "Alteração efetuada com sucesso.");
                    redirect('/professor/alterar_professor');
                } else {
                    $this->session->set_flashdata("danger", "A alteração não foi efetuada. Tente novamente mais tarde.");
                    redirect('/professor/alterar_professor');
                }
            } else {
                $this->load->model("unidade_model");
                $unidades = $this->unidade_model->dropDownUnidade();
                $professor['id_professor'] = $id_professor;

                $dados = array("professor" => $professor, "unidades" => $unidades);
                $this->load->template_admin("professor/alterar_professor", $dados);
            }
        }
    }

    public function desativaProfessor(){
        autoriza(2);
        $this->load->helper("date");
        $this->load->model("professor_model");
        $this->load->library('usuariolb');

        $id_professor = $this->input->post("cd_professor");
        $usuarioLogado = $this->session->userdata("usuario_logado");

        $professor = $this->professor_model->buscaProfessor($id_professor);
        $id_usuario = $professor["id_usuario"];

        $this->usuariolb->alterarUsuario($id_usuario,0);

        $professor = array(
            "dt_desativado" => mdate("%Y-%m-%d %H:%i:%s", time()),
            "status_ativo" => 0,
            "id_user_adm_desativou" => $usuarioLogado['id_usuario']
        );

        if($this->professor_model->desativaProfessor($id_professor,$professor)){
            $this->session->set_flashdata("success","Operação efetuada com sucesso");
            redirect("/professor/desativar_cadastro_professor");
        }else{
            $this->session->set_flashdata("danger", "A desativação do cadastro não foi efetuada. Tente novamente mais tarde");
            redirect("/professor/desativar_cadastro_professor");
        }
    }

    public function buscaDesativaProfessor($id_professor){
        autoriza(2);

        $this->load->library("form_validation");
        $this->form_validation->set_rules("cd_professor","cd_professor","required|numeric",
            array(
                'required' => "Você precisa preencher Código de Professor",
                'numeric' => "O código deve conter apenas números"
            ));

        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

        $this->form_validation->run();

        $this->load->model("professor_model");
        $this->load->model("unidade_model");

        $professor = $this->professor_model->buscaProfessor($id_professor);
        $unidades = $this->unidade_model->dropDownUnidade();

        if($professor!=null){
            if($professor['status_ativo']!=1){
                $this->session->set_flashdata("danger", "Esse Professor está Desativado.");
                redirect('/professor/desativar_cadastro_professor');
            }
            $dados = array("professor" => $professor, "unidades" => $unidades);
            $this->load->template_admin("professor/desativar_professor", $dados);
        }else {
            $this->session->set_flashdata("danger", "Professor não encontrado. Verifique os dados.");
            redirect('/professor/desativar_cadastro_professor');
        }
    }

    public function buscaAlteraProfessor($id_professor){
        autoriza(2);
        $this->load->model("professor_model");
        $this->load->model("unidade_model");

        $professor = $this->professor_model->buscaProfessor($id_professor);

        $unidades = $this->unidade_model->dropDownUnidade();

        if($professor!=null){
            if($professor['status_ativo']!=1){
                $this->session->set_flashdata("danger", "Esse Professor está Desativado.");
            }
            $dados = array("professor" => $professor, "unidades" => $unidades);
            $this->load->template_admin("professor/alterar_professor", $dados);
        }else{
            $this->session->set_flashdata("danger", "Professor não encontrado. Verifique os dados.");
            redirect('/professor/alterar_professor');
        }
    }

    /**
     * @param $emailUnique
     * @return mixed
     */
    public function _validaFormulario($emailUnique){

        $this->load->library("form_validation");

        $mensagemEmail = array(
            'valid_email' => 'Você precisa preencher um email válido.',
            'is_unique' => 'Já existe um usuário cadastrado com este email.'
        );

        if($emailUnique){
            $this->form_validation->set_rules("email", "email", "required|valid_email|is_unique[tb_usuario.nm_email]", $mensagemEmail);
        }else{
            $this->form_validation->set_rules("email", "email", "required|valid_email", $mensagemEmail);
        }

        $this->form_validation->set_rules("Unidade", "Unidade", "required", "required = 'Você deve selecionar %s.'");

        $this->form_validation->set_rules("nome", "nome", "required", "required = 'Você precisa preencher %s.'");

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        return $this->form_validation->run();

    }

    public function _periodoValido($dt_inicio, $dt_vencimento){
        if($dt_inicio <= $dt_vencimento)
            return true;
        else
            return false;
    }
}


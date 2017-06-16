<?php
class Declaracao extends CI_Controller{
    /*  Metodos que apenas chamam views    */
    public function cadastra_declaracao(){
        autoriza(1);
        //pegando dados do usuario
        $usuarioLogado = $this->session->userdata("usuario_logado");

        $this->load->model("Aluno_model");
        $aluno = $this->Aluno_model->buscarAlunoUsuario($usuarioLogado['id_usuario']);
        //buscando tipos de atividade
        $this->load->model("TipoAtividade_model");
        $atividades = $this->TipoAtividade_model->dropDownAtividade();
        $tipoAtividade = array("atividades" => $atividades);
        //buscando eventos internos
        $this->load->model("Evento_model");
        $evento = $this->Evento_model->buscaEventoDcl();

        //Buscando professor AACC do curso
        $this->load->model("Professor_model");
        $professor = $this->Professor_model->buscaProfessorCurso($aluno['id_aluno']);

        //Buscando turma do aluno
        $this->load->model("Turma_model");
        $turma = $this->Turma_model->buscarTurmaId($aluno['id_turma']);

        //montando matriz de informações que aparecerão na view cadastro_view
        $dados = array("tipoAtividade" => $tipoAtividade,"eventos" => $evento, "aluno" => $aluno, "professor" => $professor, "turma" => $turma);
        //carregando view e enviando os dados
        $this->load->template_usuario_aluno("declaracao/cadastrar_declaracao", $dados);
    }
    public function visualiza_declaracao(){
        autoriza(1);
        $usuarioLogado = $this->session->userdata("usuario_logado");

        //Buscando aluno pelo id do usuario logado
        $this->load->model("Aluno_model");
        $aluno = $this->Aluno_model->buscarAlunoUsuario($usuarioLogado['id_usuario']);

        //Buscando todas as declarações do usuario atual
        $this->load->model("Declaracao_model");
        $declaracoes = $this->Declaracao_model->getDeclaracoes($aluno['id_aluno']);

        //buscando dados do usuario
        $usuario = $this->Declaracao_model->getUsuario($usuarioLogado['id_usuario']);
        $dadosUsuario = array("dadosUsuario" => $usuario);

        //Buscando horas por tipo de atividade
        $this->load->model("TotalDeHoras_model");
        $horasTipoAtividade = $this->TotalDeHoras_model->buscaHorasTipoAtividade($aluno['id_aluno']);

        //Buscando quantidade de horas exigidas por cada curso referente ao aluno logado
        $this->load->model("Curso_model");
        $horasNecessarias= $this->Curso_model->buscaHorasCurso($aluno['id_aluno']);

        //montando matriz de informações que aparecerão na view cadastro_view
        $dados = array("dadosUsuario" => $dadosUsuario, "declaracoes" => $declaracoes, "aluno" => $aluno, "horas" => $horasTipoAtividade, "horasNecessarias" => $horasNecessarias);

        //carregando view e enviando os dados
        $this->load->template_usuario_aluno("declaracao/pesquisar_declaracao", $dados);
    }
    public function visualizarDetalhes(){

        autoriza(1);
        $usuarioLogado = $this->session->userdata("usuario_logado");
        $id_declaracao = $this->input->post("id_dec");


        //carregando as models
        $this->load->model("Declaracao_model");
        $this->load->model("TipoAtividade_model");
        $this->load->model("Evento_model");
        $this->load->model("Aluno_model");
        $this->load->model("Professor_model");
        $this->load->model("Indeferimento_model");
        //Buscando aluno pelo id do usuario logado
        $aluno = $this->Aluno_model->buscarAlunoUsuario($usuarioLogado['id_usuario']);

        //Buscando professor AACC do curso
        $professor = $this->Professor_model->buscaProfessorCurso($aluno['id_aluno']);

        //buscando dados do usuario
        $usuario = $this->Declaracao_model->getUsuario($usuarioLogado['id_usuario']);
        $dadosUsuario = array("dadosUsuario" => $usuario);
        //buscando detalhes da declaracao por id
        $declaracao = $this->Declaracao_model->buscaDeclaracaoCompleta($id_declaracao);
        //buscando evento pelo id da declaraca
        $evento = $this->Evento_model->buscaEventoIdDeclaracao($id_declaracao);
        //buscar nome do tipo de atividade
        $tipoAtividade = $this->TipoAtividade_model->buscarTipoAtividade($declaracao['id_tipo_atividade']);
        $tipoAtividade = $tipoAtividade['nm_tipo_atividade'];

        // Informações de controle
        $ctrl_dec = $this->Declaracao_model->buscaInfoControleDec($id_declaracao);
        $motivoIndeferimento = null;
        if($ctrl_dec[0]['id_motivo_indeferimento'] != null){
            $motivoIndeferimento = $this->Indeferimento_model->buscaMotivo($ctrl_dec[0]['id_motivo_indeferimento']);
        }

        //montando matriz de informações que aparecerão na view cadastro_view
        $dados = array("dadosUsuario" => $dadosUsuario,
                        "declaracao" => $declaracao,
                        "tipoAtividade" => $tipoAtividade,
                        "evento" => $evento,
                        "professor" => $professor,
                        "ctrlDeclaracao" => $ctrl_dec,
                        "motivo" => $motivoIndeferimento);
        //carregando view e enviando os dados
        $this->load->template_usuario_aluno("declaracao/detalhes_declaracao", $dados);
    }
    //Metodos com operações em Banco de Dados
    public function cadastrar_declaracao(){

        $anexo = $_FILES['anexo'];
        $this->load->model("Aluno_model");
        $usuarioLogado = $this->session->userdata("usuario_logado");
        $aluno = $this->Aluno_model-> buscarAlunoUsuario($usuarioLogado['id_usuario']);
        if($this->input->post("evento") == "1"){
            //if($this->validaExterno()){
            $declaracao = array(
                "id_tipo_atividade" => $this->input->post("atividade"),
                "dt_evento_externo" => $this->input->post("data"),
                "qt_horas_atividade" => $this->input->post("txtQuantidadeHoras"),
                "local_evento_externo" => $this->input->post("txtLocalEvento"),
                "nm_evento_externo" => $this->input->post("txtNomeEvento"),
                "ds_evento_externo" => $this->input->post("txtDescricaoEvento"),
                "resumo_atividade" => $this->input->post("resumo"),
                "arquivo_declaracao" => $anexo['name'],
                "status_declaracao" => 1,
                "dt_declaracao" => mdate("%Y-%m-%d %H:%i:%s", time()),
                "id_aluno" => $aluno['id_aluno'],
                "id_turma" => $aluno['id_turma']);
        }else if($this->input->post("evento") == "0"){
            if($this->validaInterno()){
                $usuarioLogado = $this->session->userdata("usuario_logado");
                $declaracao = array(
                    "id_tipo_atividade" => $this->input->post("atividade"),
                    "id_evento" => $this->input->post("eventoInterno"),
                    "resumo_atividade" => $this->input->post("resumo"),
                    "arquivo_declaracao" => $anexo['name'],
                    "status_declaracao" => 1,
                    "dt_declaracao" => mdate("%Y-%m-%d %H:%i:%s", time()),
                    "id_aluno" => $aluno['id_aluno'],
                    "id_turma" => $aluno['id_turma']);
            }else{
                // redirect("/declaracao/cadastra_declaracao");
            }
        }
        $this->load->model("Declaracao_model");
        $lastId = $this->Declaracao_model->cadastrar_declaracao($declaracao);
        if($lastId){
            //Efetuar upload
            $id_declaracao = $lastId;
            $this->load->model("Aluno_model");
            $usuarioLogado = $this->session->userdata("usuario_logado");
            $id = $usuarioLogado['id_usuario'];
            $aluno = $this->Aluno_model->buscarAlunoUsuario($id);
            $unidade = $this->Aluno_model->buscaUnidadeAlunoId($id);
            $filename = $this->anexarArquivo($anexo,$aluno,$unidade,$id_declaracao);
            if(isset($filename)){
                $this->session->set_flashdata("success", "Cadastro de declaração efetuado com Sucesso.");
                redirect("/declaracao/cadastra_declaracao");
            }
        }else{
            $this->session->set_flashdata("danger", "Não foi possivel efetuar o cadastro. Por favor, tente novamente mais tarde.");
            redirect("/declaracao/cadastra_declaracao");
        }
        //redirect("/declaracao/cadastra_declaracao");
    }
    public function anexarArquivo($anexo, $aluno, $unidade, $id_declaracao){

        $filename = explode('.', $anexo['name']);
        $path = './uploads/' . $unidade['cd_cpsouza'].'_'.$unidade['nm_unidade'].'/'.$aluno['cd_mat_aluno'];

        if (!is_dir($path)) {
            mkdir($path, 0777,true);
        }

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'pdf|jpg|png';
        $config['file_name'] = $aluno['cd_mat_aluno'] . "_" . $id_declaracao. "." . $filename[count($filename) - 1];

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('anexo')) {
            $data = $this->upload->data();
            return $data['file_name'];
        }else{
            return false;
        }
    }

    public function imprimirDeclaracao($declaracaoId){
        $this->load->model('Declaracao_model');
        $this->load->model('Aluno_model');
        $this->load->model('Turma_model');
        $this->load->model('Professor_model');
        $this->load->model('Curso_model');
        $this->load->model('TipoAtividade_model');
        $this->load->model('Evento_model');

        $declaracao = $this->Declaracao_model->buscaDeclaracaoCompleta($declaracaoId);
        $ctrl_dec = $this->Declaracao_model->buscaDetalhesValidacao($declaracaoId);
        $aluno = $this->Aluno_model->buscarAlunoId($declaracao['id_aluno']);
        $professor = $this->Professor_model->buscaProfessor($ctrl_dec[0]['id_professor']);
        $turma = $this->Turma_model->buscarTurmaId($aluno['id_turma']);
        $curso = $this->Curso_model->buscaCurso($turma['id_curso']);
        $tipoAtividade = $this->TipoAtividade_model->buscarTipoAtividade($declaracao['id_tipo_atividade']);

        if($declaracao['id_evento'] != null){
            $evento = $this->Evento_model->buscaEventoPorId($declaracao['id_evento']);

            $dados = array(
                "declaracao"=> $declaracao,
                "ctrl_dec" => $ctrl_dec,
                "aluno" => $aluno,
                "professor" => $professor,
                "turma" => $turma,
                "curso" => $curso,
                "tipoAtividade" => $tipoAtividade,
                "evento" => $evento
            );
        }else{
            $dados = array(
                "declaracao"=> $declaracao,
                "ctrl_dec" => $ctrl_dec,
                "aluno" => $aluno,
                "professor" => $professor,
                "turma" => $turma,
                "curso" => $curso,
                "tipoAtividade" => $tipoAtividade
            );
        }

        $this->load->view('declaracao/imprimir_declaracao',$dados);
    }
    //Metodos de validação
    public function validaExterno(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("atividade","atividade","required",
            array(
                'required' => "Você precisa escolher o Tipo de Atividade"
            ));
        $this->form_validation->set_rules("data","data","required",
            array(
                'required' => "Você precisa escolher a Data"
            ));
        $this->form_validation->set_rules("txtQuantidadeHoras","txtQuantidadeHoras","required",
            array(
                'required' => "Você precisa especificar a Quantidade de Horas"
            ));
        $this->form_validation->set_rules("txtLocalEvento","txtLocalEvento","required",
            array(
                'required' => "Você precisa preencher o Local evento"
            ));
        $this->form_validation->set_rules("txtNomeEvento","txtNomeEvento","required",
            array(
                'required' => "Você precisa preencher o Nome do evento"
            ));
        $this->form_validation->set_rules("txtDescricaoEvento","txtDescricaoEvento","required",
            array(
                'required' => "Você precisa preencher a Descrição do evento"
            ));
        $this->form_validation->set_rules("dsEvento","dsEvento","required",
            array(
                'required' => "Você precisa preencher a Descrição do evento"
            ));
        $this->form_validation->set_rules("resumo","resumo","required",
            array(
                'required' => "Você precisa preencher o Resumo do evento"
            ));
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
        return $this->form_validation->run();
    }
    public function validaInterno(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("atividade","atividade","required",
            array(
                'required' => "Você precisa escolher o Tipo de Atividade"
            ));
        $this->form_validation->set_rules("resumo","resumo","required",
            array(
                'required' => "Você precisa preencher o Resumo do evento"
            ));
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
        return $this->form_validation->run();
    }
}
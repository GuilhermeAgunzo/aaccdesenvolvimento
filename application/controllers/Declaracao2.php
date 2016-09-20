    <?php
    class Declaracao extends CI_Controller{

        /*  Metodos que apenas chamam views    */
        public function cadastra_declaracao(){
            autoriza(1);

            $usuarioLogado = $this->session->userdata("usuario_logado");
            $this->load->model("Declaracao_model");
            $usuario = $this->Declaracao_model->getUsuario($usuarioLogado['id_usuario']);
            $dadosUsuario = array("dadosUsuario" => $usuario);

                $this->load->model("TipoAtividade_model");
                $atividades = $this->TipoAtividade_model->dropDownAtividade();
                $tipoAtividade = array("atividades" => $atividades);

                $this->load->model("Evento_model");
                $evento = $this->Evento_model->buscaEventoDcl();

                foreach($evento as $e){
                    if($e['dt_final_evento'] <= time()-(24*3600)){
                            $dropdownEvento[$e['id_evento']]= $e['nm_evento'].' ('.$e['dt_final_evento'].' / '.$e['hr_evento'].' /'.$e['nm_responsavel_evento'].' )';
                    }
                }

                $dados = array("tipoAtividade" => $tipoAtividade,"eventos" => $evento,"dropdownEvento" => $dropdownEvento, "dadosUsuario" => $dadosUsuario);
            $this->load->template_usuario_aluno("declaracao/cadastrar_declaracao_view", $dados);
        }

        public function altera_declaracao(){
            autoriza(1);
            $status = $this->input->post("status"); 
                if($status == "Pendente"){
                    $id = $this->input->post("id_declaracao");
                    $this->load->model("Declaracao_model");
                    $resultado = $this->Declaracao_model->getDeclaracaoId($id);
                    $declaracao = array("declaracao" => $resultado);
                    $this->load->template_usuario_aluno("declaracao/alterar_declaracao_view",$declaracao);
                }
            
        }
        public function visualiza_declaracao(){
            autoriza(1);
            $usuarioLogado = $this->session->userdata("usuario_logado");
            $this->load->model("Declaracao_model");
            $dados = $this->Declaracao_model->getDeclaracoes($usuarioLogado['id_usuario']);
            $declaracao = array("declaracoes" => $dados);
            $this->load->template_usuario_aluno("declaracao/visualizar_declaracao_view",$declaracao);
        }
        public function desativa_declaracao(){
            autoriza(1);
            $this->load->template_usuario_aluno("declaracao/desativar_declaracao_view");
        }

        //Metodos com operações em Banco de Dados
        public function cadastrar_declaracao()
        {
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

            $anexo = $this->input->post('userfile');
            print_r($anexo);

            if($this->input->post("evento") == "1"){
                $usuarioLogado = $this->session->userdata("usuario_logado");
                        $declaracao = array(
                        "id_tipo_atividade" => $this->input->post("atividade"),
                        "dt_evento_externo" => $this->input->post("data"),
                        "qt_horas_atividade" => $this->input->post("txtQuantidadeHoras"),
                        "local_evento_externo" => $this->input->post("txtLocalEvento"),
                        "nm_evento_externo" => $this->input->post("txtNomeEvento"),
                        "ds_evento_externo" => $this->input->post("txtDescricaoEvento"),
                        "resumo_atividade" => $this->input->post("resumo"),
                       // "arquivo_declaracao" => $data['img'],
                        "status_declaracao" => 0,
                        "dt_declaracao" => mdate("%Y-%m-%d %H:%i:%s", time()),
                        "id_usuario" => $usuarioLogado['id_usuario']);
            }else{
                $usuarioLogado = $this->session->userdata("usuario_logado");
                        $declaracao = array(
                        "id_tipo_atividade" => $this->input->post("atividade"),
                        "id_evento" => $this->input->post("eventoInterno"),
                        "resumo_atividade" => $this->input->post("resumo"),
                       // "arquivo_declaracao" => $data['img'],
                        "status_declaracao" => 0,
                        "dt_declaracao" => mdate("%Y-%m-%d %H:%i:%s", time()),
                        "id_usuario" => $usuarioLogado['id_usuario']);
            }

                $this->load->model("Declaracao_model");
                $lastId = $this->Declaracao_model->cadastrar_declaracao($declaracao);
                if($lastId){

                    //tras dados do aluno
                    $this->load->model("Aluno_model");
                    $usuarioLogado = $this->session->userdata("usuario_logado");
                    $id = $usuarioLogado['id_usuario'];
                    $aluno = $this->Aluno_model->buscarAlunoId($id);
                    $unidade = $this->Aluno_model->buscaUnidadeAlunoId($id);
                    $id_declaracao = $lastId;
                    print_r($aluno);


                        /*
                        $config['upload_path'] = './upload/';
                        $config['allowed_types']= 'jpg|jpeg|png';
                        $config['overwrite'] = TRUE;
                        $this->load->library('upload',$config);

                        $this->session->set_flashdata("success", "Cadastro de declaração efetuado com Sucesso.");

                        if ( ! $this->upload->do_upload('userfile')){
                            $error = array('error' => $this->upload->display_errors());
                            $this->session->set_flashdata("danger", "Não foi possivel carregar a imagem.");
                            print_r($error);
                        }else{
                            $file_data = $this->upload->data();
                            $data['img'] = base_url().'./upload/'.$file_data['file_name'];
                        }
                        */
                        
                            //redirect("http://localhost/aaccdesenvolvimento/index.php/declaracao/cadastra_declaracao");
            }else{
                $this->session->set_flashdata("danger", "Não foi possivel efetuar o cadastro. Por favor, tente novamente mais tarde.");
                $this->load->template_usuario_aluno("declaracao/cadastrar_declaracao_view");
                //redirect("http://localhost/aaccdesenvolvimento/index.php/declaracao/cadastra_declaracao");
            }
        
            }
        
        public function carregaEventoInterno()
        {
            $idEvento =  $this->input->post('nome');
            $this->load->model("Evento_model");
            $ventos = $this->Evento_model->buscaEventoPorId($idEvento);
           

        }
        public function anexarArquivo($anexo, $aluno, $unidade, $id_declaracao){
    
            $filename = explode('.', $anexo['name']);
            $path = './uploads/' . $unidade['cd_cpsouza'].'_'.$unidade['nm_unidade'].'/'.$aluno['cd_mat_aluno'];
    
            if (!is_dir($path)) {
                mkdir($path, 0777, $recursive = true);
            }
    
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'pdf|jpg|png|doc|docx';
            $config['file_name'] = $aluno['cd_mat_aluno'] . "_" . $id_declaracao. "." . $filename[count($filename) - 1];
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('anexo')) {
                $data = $this->upload->data();
                return $data['file_name'];
            }else{
                return false;
            }
        }

    }
        <?php
        class Declaracao extends CI_Controller{

            /*  Metodos que apenas chamam views    */
            public function cadastra_declaracao(){
                autoriza(1);
                //pegando dados do usuario
                $usuarioLogado = $this->session->userdata("usuario_logado");
                $this->load->model("Declaracao_model");
                $usuario = $this->Declaracao_model->getUsuario($usuarioLogado['id_usuario']);
                $dadosUsuario = array("dadosUsuario" => $usuario);

                //buscando tipos de atividade
                $this->load->model("TipoAtividade_model");
                $atividades = $this->TipoAtividade_model->dropDownAtividade();
                $tipoAtividade = array("atividades" => $atividades);

                //buscando eventos internos
                $this->load->model("Evento_model");
                $evento = $this->Evento_model->buscaEventoDcl();

                //montando matriz de informações que aparecerão na view cadastro_view
                $dados = array("tipoAtividade" => $tipoAtividade,"eventos" => $evento, "dadosUsuario" => $dadosUsuario);
                //carregando view e enviando os dados
                $this->load->template_usuario_aluno("declaracao/cadastrar_declaracao_view", $dados);
            }
             public function visualiza_declaracao(){
                autoriza(1);
                $usuarioLogado = $this->session->userdata("usuario_logado");
                $this->load->model("Declaracao_model");
                $dados = $this->Declaracao_model->getDeclaracoes($usuarioLogado['id_usuario']);
                $declaracao = array("declaracoes" => $dados);
                $this->load->template_usuario_aluno("declaracao/visualizar_declaracao_view",$declaracao);
               }

            //Metodos com operações em Banco de Dados
            public function cadastrar_declaracao(){
            
                $anexo = $_FILES['anexo'];
                echo "<pre>";
                var_dump($anexo);
                echo "</pre>";

                    if($this->input->post("evento") == "1"){
                        //if($this->validaExterno()){
                            $usuarioLogado = $this->session->userdata("usuario_logado");
                            $declaracao = array(
                            "id_tipo_atividade" => $this->input->post("atividade"),
                            "dt_evento_externo" => $this->input->post("data"),
                            "qt_horas_atividade" => $this->input->post("txtQuantidadeHoras"),
                            "local_evento_externo" => $this->input->post("txtLocalEvento"),
                            "nm_evento_externo" => $this->input->post("txtNomeEvento"),
                            "ds_evento_externo" => $this->input->post("txtDescricaoEvento"),
                            "resumo_atividade" => $this->input->post("resumo"),
                            "arquivo_declaracao" => $anexo['name'],
                            "status_declaracao" => 0,
                            "dt_declaracao" => mdate("%Y-%m-%d %H:%i:%s", time()),
                            "id_usuario" => $usuarioLogado['id_usuario']);
                       // }else{
                         //    redirect("/declaracao/cadastra_declaracao");
                       // }
                }else if($this->input->post("evento") == "0"){
                    if($this->validaInterno()){
                    $usuarioLogado = $this->session->userdata("usuario_logado");
                            $declaracao = array(
                            "id_tipo_atividade" => $this->input->post("atividade"),
                            "id_evento" => $this->input->post("eventoInterno"),
                            "resumo_atividade" => $this->input->post("resumo"),
                            "arquivo_declaracao" => $anexo['name'],
                            "status_declaracao" => 0,
                            "dt_declaracao" => mdate("%Y-%m-%d %H:%i:%s", time()),
                            "id_usuario" => $usuarioLogado['id_usuario']);
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
                           // redirect("/declaracao/cadastra_declaracao");
                        }
                    }else{
                        $this->session->set_flashdata("danger", "Não foi possivel efetuar o cadastro. Por favor, tente novamente mais tarde.");
                      //  redirect("/declaracao/cadastra_declaracao");
                    }
                //redirect("/declaracao/cadastra_declaracao");
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
            //Retorno Ajax
            public function carregarCampos(){
                /*
                $tipoEveno =  $this->input->post('tipoEvento');
                if($tipoEveno == '1'){
                   echo "<script type='javascript'>alert('Ajax externo');";
                }else{
                   echo "<script type='javascript'>alert('Ajax Interno');";
                }
                */
                echo "Ok";
                 echo "<script type='javascript'>alert('Funcionou');";
            }
        }
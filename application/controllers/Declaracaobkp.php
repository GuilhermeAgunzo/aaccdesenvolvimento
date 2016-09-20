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
        $this->load->template_usuario_aluno("declaracao/alterar_declaracao_view");
    }
     public function visualiza_declaracao(){
        autoriza(1);
        
        $this->load->model("Declaracao_model");
        $dados = $this->Declaracao_model->getDeclaracoes();
        $declaracao = array("declaracoes" => $dados);
        $this->load->template_usuario_aluno("declaracao/visualizar_declaracao_view",$declaracao);
    }
    public function desativa_declaracao(){
        autoriza(1);
        $this->load->template_usuario_aluno("declaracao/desativar_declaracao_view");
    }

    //Eventos com operações em Banco de Dados
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
        
        //Email será usado para criar pasta emailUsuario/datahora
        $email = $this->input->post("txtEmail");

        $config['upload_path'] = './upload/';
        $config['allowed_types']= 'jpg|jpeg|png';
        $config['overwrite'] = TRUE;
        $this->load->library('upload',$config);

        if ( ! $this->upload->do_upload('userfile')){
            $error = array('error' => $this->upload->display_errors());
             $this->session->set_flashdata("danger", "Não foi possivel carregar a imagem.");
             print_r($error);
        }else{
            $file_data = $this->upload->data();
            $data['img'] = base_url().'./upload/'.$file_data['file_name'];
        }
         $usuarioLogado = $this->session->userdata("usuario_logado");
        if($this->input->post("evento") == "0" ){
                $declaracao = array(
                "id_evento" => $this->input->post("eventoInterno"),
                "id_tipo_atividade" => $this->input->post("atividade"),
                 "resumo_atividade" => $this->input->post("resumo"),
                 "arquivo_declaracao" => isset($upload) ? $upload : "",
                 "status_declaracao" => 0,
                 "dt_declaracao" => mdate("%Y-%m-%d %H:%i:%s", time()),
                 "id_usuario" => $usuarioLogado['id_usuario']);
        }else{
                    $declaracao = array(
                    "id_tipo_atividade" => $this->input->post("atividade"),
                    "dt_evento_externo" => $this->input->post("data"),
                    "qt_horas_atividade" => $this->input->post("txtQuantidadeHoras"),
                    "local_evento_externo" => $this->input->post("txtLocalEvento"),
                    "nm_evento_externo" => $this->input->post("txtNomeEvento"),
                    "ds_evento_externo" => $this->input->post("txtDescricaoEvento"),
                    "resumo_atividade" => $this->input->post("resumo"),
                    "arquivo_declaracao" => isset($upload) ? $upload : "",
                    "status_declaracao" => 0,
                    "dt_declaracao" => mdate("%Y-%m-%d %H:%i:%s", time()),
                    "id_usuario" => $usuarioLogado['id_usuario']);
        }

            $this->load->model("Declaracao_model");
            if($this->Declaracao_model->cadastrar_declaracao($declaracao)){
            $this->session->set_flashdata("success", "Cadastro de declaração efetuado com Sucesso.");
            //$this->load->template_usuario_aluno("declaracao/cadastrar_declaracao_view");
            redirect("http://localhost/aaccdesenvolvimento/index.php/declaracao/cadastra_declaracao");
        }else{
            $this->session->set_flashdata("danger", "Não foi possivel efetuar o cadastro. Por favor, tente novamente mais tarde.");
            $this->load->template_usuario_aluno("declaracao/cadastrar_declaracao_view");
            redirect("http://localhost/aaccdesenvolvimento/index.php/declaracao/cadastra_declaracao");
        }
        }
       
    
    public function carregaEventoInterno()
    {
        $idEvento =  $this->input->post('nome');
        $this->load->model("Evento_model");
        $ventos = $this->Evento_model->buscaEventoPorId($idEvento);

        echo "<div id='dadosExternos'>";
            echo "<div class='form-group'>";
                echo form_label("Data do Evento", "dataEvento", array("class" => "col-sm-2 control-label"));
                echo "<div class='col-sm-4'>";
                echo form_input(array("name" => "data", "id" => "data" ,"class" => "form-control", "type" => "date", "required" => "required","value" => set_value("data", $eventos['dt_final_evento'])));
                echo form_error("data");
            echo "</div>";
            echo "</div>";

            /*
            echo "<div class='form-group'>";
            echo form_label("Horário de inicio atividade", "horarioAtividade", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-4'>";
            echo form_input(array("name" => "horarioAtividade", "id" => "horarioAtividade" ,"class" => "form-control", "maxlength" => "12", "type" => "time","required"));
            echo "</div>";
            echo "</div>";
            */

            echo "<div class='form-group'>";
            echo form_label("Local do Evento", "localEvento", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-4'>";
            echo form_input(array("name" => "txtLocalEvento", "id" => "txtLocalEvento" ,"class" => "form-control","required" => "required","value" => set_value("txtLocalEvento", "Teste AJAx ...")));
            echo form_error("local");
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Descrição do Evento", "descricaoEvento", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-4'>";
            echo form_input(array("name" => "txtDescricaoEvento", "id" => "txtDescricaoEvento" ,"class" => "form-control", "required" => "required","value" => set_value("txtDescricaoEvento", $eventos['ds_evento'])));
            echo form_error("txtDescricaoEvento");
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Quantidade de Horas", "quantidadeHoras", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-4'>";
            echo form_input(array("name" => "txtQuantidadeHoras", "id" => "txtQuantidadeHoras" ,"class" => "form-control", "maxlength" => "4" ,"type" => "number",  "min" => "1", "required" => "required","value" => set_value("txtQuantidadeHoras", $eventos['qt_horas_evento'])));
            echo form_error("txtQuantidadeHoras");
            echo "</div>";
            echo "</div>";

            echo "</div>";

    }

}
<?php

class Unidade extends CI_Controller{

    /*  Metodos que apenas chamam views    */
    public function cadastrar_unidade(){
        autoriza(2);
        $this->load->template_admin("unidade/cadastrar_unidade");
    }

    public function pesquisar_unidade(){
        autoriza(2);
        $this->load->template_admin("unidade/pesquisar_unidade");
    }

    public function alterar_unidade(){
        autoriza(2);
        $this->load->template_admin("unidade/alterar_unidade");
    }


    /*  Metodos principais  */

    public function cadastrarUnidade(){
        autoriza(2);

        if($this->_validaFormulario(true)) {

            $usuarioLogado = $this->session->userdata("usuario_logado");

            $unidade = array(
                "cd_cpsouza" => $this->input->post("cd_cpsouza"),
                "nm_unidade" => $this->input->post("nm_unidade"),
                "UF_estado" => $this->input->post("uf"),
                "nm_cidade" => $this->input->post("cidade"),
                "nm_bairro" => $this->input->post("bairro"),
                "nm_endereco" => $this->input->post("endereco"),
                "cd_num_endereco" => $this->input->post("numero"),
                "nm_complemento_endereco" => $this->input->post("complemento"),
                "cd_cep_endereco" => $this->input->post("cep"),
                "cd_telefone" => $this->input->post("telefone"),
                "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
                "dt_cadastro" => mdate("%Y-%m-%d %H:%i:%s", time())
            );



            $this->load->model("unidade_model");

            $this->unidade_model->salva($unidade);



            $this->session->set_flashdata("success", "Cadastro efetuado com sucesso!");

            //$this->load->template_admin("unidade/cadastrar_unidade");
            redirect('/unidade/cadastrar_unidade');
        }else{
            $this->session->set_flashdata("danger", "Erro ao cadastrar!");
            $this->load->template_admin("unidade/cadastrar_unidade");
        }
    }

    public function alteraUnidade(){
        autoriza(2);

        if($this->_validaFormulario(false)) {
            $usuarioLogado = $this->session->userdata("usuario_logado");
            $unidade = array(
                "id_unidade" => $this->input->post("id_unidade"),
                "cd_cpsouza" => $this->input->post("cd_cpsouza"),
                "nm_unidade" => $this->input->post("nm_unidade"),
                "UF_estado" => $this->input->post("uf"),
                "nm_cidade" => $this->input->post("cidade"),
                "nm_bairro" => $this->input->post("bairro"),
                "nm_endereco" => $this->input->post("endereco"),
                "cd_num_endereco" => $this->input->post("numero"),
                "nm_complemento_endereco" => $this->input->post("complemento"),
                "cd_cep_endereco" => $this->input->post("cep"),
                "cd_telefone" => $this->input->post("telefone"),
                "status_ativo" => $this->input->post("status"),
                "id_user_adm_cadastrou" => $usuarioLogado['id_usuario']
            );

            if($unidade['status_ativo'] == '0'){
                array_push($unidade['dt_cadastro'],mdate("%Y-%m-%d %H:%i:%s", time()));
                array_push($unidade['id_user_adm_desativou'],"1");
            }
            $this->load->model("unidade_model");
            $this->unidade_model->altera($unidade);
            $this->session->set_flashdata("success", "Alteração efetuada com sucesso!");

            //redirect('/unidade/alterar_unidade');

            $this->load->template_admin("unidade/alterar_unidade");
        }else{
            $this->session->set_flashdata("danger", "Erro ao alterar!");

            $id_unidade = $this->input->post("id_unidade");
            $this->load->model("unidade_model");
            $unidade = $this->unidade_model->buscarUnidade($id_unidade);

            $dados = array("unidade" => $unidade,"id_unidade" => $this->input->post("id_unidade"), "erro" => "Errado");
            $this->load->template_admin("unidade/alterar_unidade", $dados);
        }
    }

    public function buscarAlteraUnidade(){
        autoriza(2);

        $this->load->library("form_validation");
        $this->form_validation->set_rules("cd_cpsouza", "cd_cpsouza", "required|is_natural",
            array(
                'required' => 'Você precisa preencher o código do CPS.',
                'is_natural' => 'O código deve conter somente números.'
            )
        );

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        if($this->form_validation->run()){

            $cd_cpsouza = $this->input->post("cd_cpsouza");
            $this->load->model("unidade_model");
            $unidade = $this->unidade_model->buscarUnidade($cd_cpsouza);

            if($unidade!=null) {
                $dados = array("unidade" => $unidade, "id_unidade" => $unidade['id_unidade']);
                $this->load->template_admin("unidade/alterar_unidade", $dados);
            }else{
                $this->session->set_flashdata("danger", "Unidade não Encontrada. Verifique os dados.");
                redirect('/unidade/alterar_unidade');
            }
        }
    }

    public function pesquisarUnidade(){
        autoriza(2);
        $cd_cpsouza = $this->input->post("cd_cpsouza");

        $this->load->model("unidade_model");
        $unidade = $this->unidade_model->buscarUnidade($cd_cpsouza);
        $dados = array("unidade" => $unidade);

        if($unidade){
            $this->load->template_admin("unidade/pesquisar_unidade.php", $dados);
        }else{
            $this->session->set_flashdata("danger", "Unidade não Encontrada. Verifique os dados.");
            redirect("/unidade/pesquisar_unidade");
        }
    }


    /*  Metodos auxiliares  */

    public function _validaFormulario($cd_cpsouza_unique){
        $this->load->library("form_validation");

        $mensagem = array(
            'is_unique' => 'Já existe uma unidade cadastrada com este código.'
        );
        if($cd_cpsouza_unique){
            $this->form_validation->set_rules("cd_cpsouza", "cd_cpsouza", "required|min_length[1]|max_length[5]|is_unique[tb_unidade.cd_cpsouza]", $mensagem);
        }else{
            $this->form_validation->set_rules("cd_cpsouza", "cd_cpsouza", "required|min_length[1]|max_length[5]");
        }

        $this->form_validation->set_rules("nm_unidade", "nm_unidade", "required|min_length[1]|max_length[50]");
        $this->form_validation->set_rules("cidade", "cidade", "required|min_length[3]|max_length[50]");
        $this->form_validation->set_rules("bairro", "bairro", "required|min_length[5]|max_length[50]");
        $this->form_validation->set_rules("complemento", "complemento", "min_length[5]|max_length[50]");
        $this->form_validation->set_rules("endereco", "endereco", "required|min_length[5]|max_length[50]");
        $this->form_validation->set_rules("numero", "numero", "required|min_length[1]|max_length[8]");
        $this->form_validation->set_rules("cep", "cep", "required|min_length[1]|max_length[9]");
        $this->form_validation->set_rules("telefone", "telefone", "min_length[14]|max_length[15]");
        $this->form_validation->set_rules("uf", "uf", "required|min_length[2]|max_length[2]");
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        return $this->form_validation->run();//roda regra
    }
}
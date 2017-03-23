<?php defined('BASEPATH') OR exit('No direct script access allowed');


class tipoAtividade extends CI_Controller{

    public function index(){
        autoriza(2);
        redirect('/tipoAtividade/cadastrar_tipoAtividade');
    }

    public function cadastrar_tipoAtividade(){
        autoriza(2);
        $this->load->template_admin("tipoAtividade/cadastrar_tipoAtividade");
    }

    public function pesquisar_tipoAtividade(){
        autoriza(2);

        $this->load->model("TipoAtividade_model");
        $tiposAtividades = $this->TipoAtividade_model->pesquisarTipoAtividade();
        $this->load->template_admin("tipoAtividade/pesquisar_tipoAtividade", array('tiposAtividades' => $tiposAtividades));
    }

    public function alterar_tipoAtividade(){
        autoriza(2);

        $this->load->model("TipoAtividade_model");
        $tiposAtividades = $this->TipoAtividade_model->pesquisarTipoAtividade();
        $dados = array(
            'tiposAtividades' => $tiposAtividades,
            'id_tipo_atividade' => true
        );
        $this->load->template_admin("tipoAtividade/pesquisar_tipoAtividade", $dados);

    }

    public function cadastrarTipoAtividade(){
        autoriza(2);

        if($this->_validaFormulario(false)){
            $this->load->model("TipoAtividade_model");
            $usuarioLogado = $this->session->userdata("usuario_logado");

            $tipoAtividade = array(
                'nm_tipo_atividade' => $this->input->post("txt_nm_tipo_atividade"),
                'qt_estimada_horas_atividade' => $this->input->post("qtEstimadaHoras"),
                'id_user_adm_cadastrou' => $usuarioLogado['id_usuario'],
                'dt_cadastro' => mdate("%Y-%m-%d %H:%i:%s", time()),
            );

            $this->TipoAtividade_model->cadastrarTipoAtividade($tipoAtividade);

            $this->session->set_flashdata("success", "Cadastro efetuado com sucesso.");
            redirect('/tipoAtividade/cadastrar_tipoAtividade');

        }else{
            $this->session->set_flashdata("danger", "O cadastro não foi efetuado.");
            $this->load->template_admin("tipoAtividade/cadastrar_tipoAtividade");
        }
    }



    public function alterarTipoAtividade($id){
        autoriza(2);

        if(isset($id)){

            $this->load->model("TipoAtividade_model");
            $tipoAtividade = $this->TipoAtividade_model->buscarTipoAtividade($id);

            if($tipoAtividade != null){
                $dados = array('tipoAtividade' => $tipoAtividade);
                $this->load->template_admin("tipoAtividade/alterar_tipoAtividade", $dados);
            }else{
                $this->session->set_flashdata("danger", "Você precisa escolher um Tipo de Atividade válido para alterar.");
                redirect('/tipoAtividade/alterar_tipoAtividade');
            }

        }else{
            $this->session->set_flashdata("danger", "Você precisa escolher um Tipo de Atividade para alterar.");
            redirect('/tipoAtividade/alterar_tipoAtividade');
        }

    }


    public function salvarAlterarTipoAtividade(){

        $usuarioLogado = $this->session->userdata("usuario_logado");

        $tipoAtividade = array(
            'id_tipo_atividade' => $this->input->post("txt_id_tipo_atividade"),
            'nm_tipo_atividade' => $this->input->post("txt_nm_tipo_atividade"),
            'qt_estimada_horas_atividade' => $this->input->post("qtEstimadaHoras"),
            'id_user_adm_cadastrou' => $usuarioLogado['id_usuario'],
            'dt_cadastro' => mdate("%Y-%m-%d %H:%i:%s", time()),
        );

        $dados = array('tipoAtividade' => $tipoAtividade);

        if($this->_validaFormulario(true)){
            $this->load->model("TipoAtividade_model");
            if ($this->TipoAtividade_model->alterarTipoAtividade($tipoAtividade)){
                $this->session->set_flashdata("success", "Alteração efetuada com sucesso.");
                $this->load->template_admin("tipoAtividade/alterar_tipoAtividade", $dados);
            }else{
                $this->session->set_flashdata("danger", "O Tipo de Atividade não foi alterado.");
                $this->load->template_admin("tipoAtividade/alterar_tipoAtividade", $dados);
            }
        }else{
            $this->session->set_flashdata("danger", "Preencha os campos corretamente.");
            $this->load->template_admin("tipoAtividade/alterar_tipoAtividade", $dados);
        }
    }


    /**
     * @param null $alterar
     * @return mixed
     */
    public function _validaFormulario($alterar = null){

        $this->load->library("form_validation");

        if($alterar != null || $alterar != false)
            $this->form_validation->set_rules("txt_id_tipo_atividade", "txt_id_tipo_atividade", "required", array());

        $this->form_validation->set_rules("txt_nm_tipo_atividade", "txt_nm_tipo_atividade", "required|max_length[100]", array());

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        return $this->form_validation->run();
    }


}
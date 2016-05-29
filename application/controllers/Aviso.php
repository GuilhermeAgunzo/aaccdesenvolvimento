<?php if (! defined('BASEPATH')) exit('No direct script acess allowed');

class Aviso extends CI_Controller{

    /*  Metodos que apenas chamam views    */
    public function index(){
        autoriza(2);
        redirect('/aviso/cadastrar_aviso');
    }

    public function cadastrar_aviso(){
        autoriza(2);
        $this->load->template_admin("aviso/cadastrar_aviso");
    }

    public function pesquisar_aviso(){
        autoriza(2);
        $this->load->template_admin("aviso/pesquisar_aviso");
    }

    public function alterar_aviso(){
        autoriza(2);
        $this->load->template_admin("aviso/busca_alterar_aviso");
    }

    /*  Metodos principais  */
    public function cadastrarAviso(){
        autoriza(2);

        if($this->_validaFormulario()){
            $usuarioLogado = $this->session->userdata("usuario_logado");
            $this->load->model("aviso_model");

            $aviso = array(
                "nm_aviso" => $this->input->post("nm_aviso"),
                "ds_aviso" => $this->input->post("ds_aviso"),
                "dt_inicial_aviso"=> dataPtBrParaMysql($this->input->post("dt_inicio")),
                "dt_vencimento_aviso" => dataPtBrParaMysql($this->input->post("dt_vencimento")),
                "status_ativo" => 1,
                "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
                "dt_cadastro" => mdate("%Y-%m-%d %H:%i:%s", time())
            );

            if($this->_periodoValido($aviso['dt_inicial_aviso'], $aviso['dt_vencimento_aviso'])){
                $this->aviso_model->cadastrarAviso($aviso);
                $this->session->set_flashdata("success", "Cadastro efetuado com sucesso.");
                redirect('/aviso/cadastrar_aviso');
            }else{
                $this->session->set_flashdata("danger", "A data de vencimento não pode ser anterior ao início.");
                $this->load->template_admin("aviso/cadastrar_aviso");
            }


        }

        $this->session->set_flashdata("danger", "O cadastro não foi efetuado.");

        $this->load->template_admin("aviso/cadastrar_aviso");

    }

    public function pesquisarAviso(){
        autoriza(2);

        if($this->_validaFormulario(true)){

            $dataInicial = dataPtBrParaMysql($this->input->post("dt_inicio"));
            $dataVencimento = dataPtBrParaMysql($this->input->post("dt_vencimento"));
            $this->load->model("aviso_model");
            $avisos = $this->aviso_model->pesquisarAviso($dataInicial, $dataVencimento);

            $dados = array(
                'avisos' => $avisos,
            );

            $this->load->template_admin("aviso/pesquisar_aviso", $dados);

        }else{
            $this->session->set_flashdata("danger", "Você deve escolher as datas.");
            $this->load->template_admin("aviso/pesquisar_aviso");
        }
    }


    public function buscaAlterarAviso(){
        autoriza(2);

        if($this->_validaFormulario(true)){


            $dataInicial = dataPtBrParaMysql($this->input->post("dt_inicio"));
            $dataVencimento = dataPtBrParaMysql($this->input->post("dt_vencimento"));
            $this->load->model("aviso_model");
            $avisos = $this->aviso_model->pesquisarAviso($dataInicial, $dataVencimento);

            $dados = array(
                'avisos' => $avisos,
            );

            $this->load->template_admin("aviso/busca_alterar_aviso", $dados);

        }else{
            $this->session->set_flashdata("danger", "Você deve escolher as datas.");
            $this->load->template_admin("aviso/busca_alterar_aviso");
        }
    }


    /**
     * @param $id - id_aviso de tb_aviso
     */

    public function alterarAviso($id){
        autoriza(2);

        if(isset($id)){

            $this->load->model("aviso_model");
            $aviso = $this->aviso_model->buscarAviso($id);

            if($aviso != null){

                $aviso['dt_inicial_aviso'] = dataMysqlParaPtBr($aviso['dt_inicial_aviso']);
                $aviso['dt_vencimento_aviso'] = dataMysqlParaPtBr($aviso['dt_vencimento_aviso']);
                $dados = array(
                    'aviso' => $aviso,
                );


                $this->load->template_admin("aviso/alterar_aviso", $dados);
            }else{
                $this->session->set_flashdata("danger", "Você precisa escolher um aviso válido para alterar.");
                redirect('/aviso/alterar_aviso');
            }

        }else{
            $this->session->set_flashdata("danger", "Você precisa escolher um aviso para alterar.");
            redirect('/aviso/alterar_aviso');
        }

    }

    public function salvarAlterarAviso(){

        $usuarioLogado = $this->session->userdata("usuario_logado");
        $aviso = array(
            "id_aviso" => $this->input->post("id_aviso"),
            "nm_aviso" => $this->input->post("nm_aviso"),
            "ds_aviso" => $this->input->post("ds_aviso"),
            "dt_inicial_aviso"=> dataPtBrParaMysql($this->input->post("dt_inicio")),
            "dt_vencimento_aviso" => dataPtBrParaMysql($this->input->post("dt_vencimento")),
            "status_ativo" => 1,
            "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
            "dt_cadastro" => mdate("%Y-%m-%d %H:%i:%s", time())
        );
        $dados = array('aviso' => $aviso);


        if($this->_validaFormulario(false, true)){

            if($this->_periodoValido($aviso['dt_inicial_aviso'], $aviso['dt_vencimento_aviso'])){
                $this->load->model("aviso_model");
                $this->aviso_model->alterarAviso($aviso);

                $this->session->set_flashdata("success", "Alteração efetuada com sucesso.");
                $this->load->template_admin("aviso/alterar_aviso", $dados);
            }else{
                $this->session->set_flashdata("danger", "A data de vencimento não pode ser anterior ao início.");
                $this->load->template_admin("aviso/alterar_aviso", $dados);
            }


        }else{


            $this->session->set_flashdata("danger", "O cadastro de aviso não foi alterado.");
            $this->load->template_admin("aviso/alterar_aviso", $dados);
        }

    }



    /*  MÉTODOS AUXILIARES  */


    /**
     * @param null $pesquisa
     * @param null $alterar
     * @return mixed
     */
    public function _validaFormulario($pesquisa = null, $alterar = null){
        $this->load->library("form_validation");

        if($alterar != null){
            $this->form_validation->set_rules("id_aviso", "id_aviso", "required", array());
        }

        if($pesquisa == null || $pesquisa == false){
            $this->form_validation->set_rules("nm_aviso", "nm_aviso", "required|max_length[100]", array());
            $this->form_validation->set_rules("ds_aviso", "ds_aviso", "required|max_length[500]", array());
        }

        $this->form_validation->set_rules("dt_inicio", "dt_inicio", "required", array());
        $this->form_validation->set_rules("dt_vencimento", "dt_vencimento", "required", array());

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        return $this->form_validation->run();
    }


    /**
     * @param $dt_inicio
     * @param $dt_vencimento
     * @return bool
     */
    public function _periodoValido($dt_inicio, $dt_vencimento){
        if($dt_inicio <= $dt_vencimento)
            return true;
        else
            return false;
    }


}
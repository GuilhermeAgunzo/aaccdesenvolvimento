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
        $this->load->template_admin("aviso/alterar_aviso");
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
                "cd_usuario_cadastrou" => $usuarioLogado['id_usuario'],
                "dt_cadastro" => mdate("%Y-%m-%d %H:%i:%s", time())
            );


            echo dataPtBrParaMysql($this->input->post("dt_inicio"));
            echo dataPtBrParaMysql($this->input->post("dt_vencimento"));

            $this->aviso_model->cadastrarAviso($aviso);
            $this->session->set_flashdata("success", "Cadastrado efetuado com sucesso.");

            redirect('/aviso/cadastrar_aviso');
        }

        $this->session->set_flashdata("danger", "O cadastro não foi efetuado.");

        $this->load->template_admin("aviso/cadastrar_aviso");

    }

    public function pesquisarAviso(){
        autoriza(2);
        $this->output->enable_profiler(TRUE);

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


    /*  MÉTODOS AUXILIARES  */
    public function _validaFormulario($pesquisa = null){
        $this->load->library("form_validation");

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        if($pesquisa == null){
            $this->form_validation->set_rules("nm_aviso", "nm_aviso", "required|max_length[100]", array());
            $this->form_validation->set_rules("ds_aviso", "ds_aviso", "required|max_length[500]", array());
        }

        $this->form_validation->set_rules("dt_inicio", "dt_inicio", "required", array());
        $this->form_validation->set_rules("dt_vencimento", "dt_vencimento", "required", array());

        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

        return $this->form_validation->run();
    }


}
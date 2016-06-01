<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Indeferimento extends CI_Controller
{

    public function cadastrar_indeferimento(){

        $this->load->template_admin("indeferimento/cadastrar_indeferimento.php");
    }


    public function pesquisar_indeferimento(){

        $this->load->model("Indeferimento_model");

        $motivos = $this->Indeferimento_model->buscaMotivos();
        $dados = array("motivos" => $motivos);

        $this->load->template_admin("indeferimento/pesquisar_indeferimento.php", $dados);

    }

    public function alterar_indeferimento(){
        $this->load->model("Indeferimento_model");

        $motivos = $this->Indeferimento_model->dropDownMotivo();
        $dados = array("motivos" => $motivos);

        $this->load->template_admin("indeferimento/alterar_indeferimento.php",$dados);

    }

    public function cadastraMotivo(){
        
        $this->load->model("Indeferimento_model");

        $horaAtual = date('Y-m-d H:i:s');
        $usuarioLogado = $this->session->userdata("usuario_logado");

        $motivo = array(
            "nm_motivo" => $this->input->post("motivoInd"),
            "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
            "dt_cadastro" => $horaAtual
        );

        if($this->Indeferimento_model->salvaCadastro($motivo)){
            $this->session->set_flashdata("success", "Cadastro efetuado com sucesso.");
            redirect('indeferimento/cadastrar_indeferimento');
        }else{
            $this->session->set_flashdata("danger", "O cadastro não foi efetuado. Tente novamente mais tarde.");
            redirect('indeferimento/cadastrar_indeferimento');
        }
    }

    public function alteraIndeferimento(){

        $this->load->model("Indeferimento_model");

        $idMotivo = $this->input->post("Motivo");

        $motivo = array(
            "nm_motivo" => $this->input->post("motivoInd")
        );

        if($this->Indeferimento_model->alteraMotivo($idMotivo,$motivo)){
            $this->session->set_flashdata("success", "Motivo alterado com sucesso");
            redirect('indeferimento/alterar_indeferimento');
        }else{
            $this->session->set_flashdata("danger","O Motivo de Indeferimento não foi alterado. Por favor, tente novamente mais tarde.");
            redirect('indeferimento/alterar_indeferimento');
        }

    }


}
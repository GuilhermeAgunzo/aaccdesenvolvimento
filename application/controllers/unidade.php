<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unidade extends CI_Controller
{

    public function index(){
        $this->load->view('unidade/formulario_cadastro');

    }

        public function novo(){
            //arrumar esta parte que pega data e hora atual
            date_default_timezone_set('America/Sao_Paulo');
            $date = date('Y-m-d H:i');
            $unidade = array(
            "cd_cpsouza" => $this->input->post("codigo"),
            "nm_unidade" => $this->input->post("nome"),
            "UF_estado" => $this->input->post("uf"),
                "nm_cidade" => $this->input->post("cidade"),
                "nm_bairro" => $this->input->post("bairro"),
                "nm_endereco" => $this->input->post("endereco"),
                "cd_num_endereco" => $this->input->post("numero"),
                "cd_complemento_endereco" => $this->input->post("complemento"),
                "cd_cep_endereco" => $this->input->post("cep"),
                "cd_telefone" => $this->input->post("telefone"),
                "id_user_adm_cadastrou" => "1"
            );

            $this->load->model("unidade_model");
            $this->unidade_model->salva($unidade);
            $this->session->set_flashdata("success", "Unidade salva com sucesso");
            redirect('/');
        }

}
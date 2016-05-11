<?php

class Unidade_model extends CI_Model{

    public function salva($unidade)
    {
        $this->db->insert("tb_unidade", $unidade);// (tabela do banco,array recebido)
    }

    public function altera($unidade){
        $this->db->where('cd_cpsouza', $unidade['cd_cpsouza']);
        $this->db->update('tb_unidade', $unidade);
    }



    public function buscarUnidade($cd_cpsouza)
    {
        $this->db->where("cd_cpsouza", $cd_cpsouza);
        return $this->db->get("tb_unidade")->row_array();
    }


    public function buscaUnidades(){
        return $this->db->get("tb_unidade")->result_array();
    }

    public function verifica($codigoCPS){
        $result  = $this->db->get_where('tb_unidade',array('cd_cpsouza'=> $codigoCPS))->row_array();
        if(count($result) > 0) {
            return $result;
        }else {
            return false;
        }
    }
}
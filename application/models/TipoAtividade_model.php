<?php

class TipoAtividade_model extends CI_Model{

    public function cadastrarTipoAtividade($tipoAtividade){
        $this->db->insert("tb_tipos_atividade", $tipoAtividade);
    }

    public function pesquisarTipoAtividade(){
        $this->db->order_by("nm_tipo_atividade", "asc");
        return $this->db->get("tb_tipos_atividade")->result_array();
    }

    public function buscarTipoAtividade($id_tipo_atividade){
        $this->db->where("id_tipo_atividade", $id_tipo_atividade);
        return $this->db->get("tb_tipos_atividade")->row_array();
    }

    public function alterarTipoAtividade($tipoAtividade){
        $this->db->where('id_tipo_atividade', $tipoAtividade['id_tipo_atividade']);
        $this->db->update('tb_tipos_atividade', $tipoAtividade);
    }
}
<?php
class Indeferimento_model extends CI_Model{
    public function salvaCadastro($motivo){
        return $this->db->insert("tb_motivos_indeferimento", $motivo);
    }

    public function buscaMotivos(){
        $this->db->select("*");
        $this->db->order_by("nm_motivo");

        return $this->db->get("tb_motivos_indeferimento")->result_array();
    }

    public function alteraMotivo($idMotivo,$motivo){
        $this->db->where("id_motivo",$idMotivo);
        $this->db->update("tb_motivos_indeferimento", $motivo);
        
        return $this->db->get("tb_motivos_indeferimento")->row_array();
    }

    public function dropDownMotivo(){
        $result = $this->db->query("select nm_motivo as motivo, id_motivo from tb_motivos_indeferimento ORDER BY nm_motivo;");
        $retorno = array();
        if($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {
                $retorno[$row['id_motivo']] = $row['motivo'];
            }
        }
        return $retorno;
    }
}
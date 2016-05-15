<?php
class Professor_model extends CI_Model{

    public function salvaCadastro($professor){
        return $this->db->insert("tb_professor",$professor);

    }

    public function buscaProfessor($id){

        return $this->db->get_where("tb_professor", array(
            "id_professor" => $id
        ))->row_array();

    }

    public function alteraProfessor($id_professor,$professor){
        $this->db->where("id_professor", $id_professor);
        return $this->db->update("tb_professor", $professor);
    }

    public function desativaProfessor($id_professor,$professor){
        $this->db->where("id_professor",$id_professor);
        return $this->db->update("tb_professor",$professor);
    }
}
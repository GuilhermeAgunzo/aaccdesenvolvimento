<?php
class Professor_model extends CI_Model{
    public function salvaCadastro($professor){
        return $this->db->insert("tb_professor",$professor);

    }
    public function buscaProfessoresUnidade($idUnidade){
        //$this->db->select("*");
        $this->db->order_by('status_ativo desc');
        return $this->db->get_where("tb_professor",array(
            "id_unidade" => $idUnidade
        ))->result_array();

    }

    public function buscaProfessor($id){
        return $this->db->get_where("tb_professor", array(
            "id_professor" => $id
        ))->row_array();

    }

    public function buscaNomeProfessor($termo,$idUnidade){
        $this->db->select("*");
        $this->db->order_by('status_ativo desc');
        $this->db->where("id_unidade",$idUnidade);
        $this->db->like("nm_professor",$termo);
        return $this->db->get("tb_professor")->result_array();

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
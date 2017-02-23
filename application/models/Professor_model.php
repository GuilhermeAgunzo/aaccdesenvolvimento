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
    public function buscaProfessorCurso($idAluno){
        return $this->db->query("SELECT * FROM tb_professor p, tb_curso c, tb_turma t, tb_aluno a WHERE p.id_curso = c.id_curso and c.id_curso = t.id_curso and t.id_turma = a.id_turma and a.id_aluno = $idAluno")->row_array();
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
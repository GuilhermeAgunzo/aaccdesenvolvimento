<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turma_model extends CI_Model{

    public function cadastrarTurma($turma){
        return $this->db->insert("tb_turma",$turma);
    }

    public function buscarTurma($cd_mat_turma)
    {
        $this->db->where("cd_mat_turma", $cd_mat_turma);
        return $this->db->get("tb_turma")->row_array();
    }

    public function alteraTurma($turma){
        $this->db->where('cd_mat_turma', $turma['cd_mat_turma']);
        $this->db->update('tb_turma', $turma);
    }

}
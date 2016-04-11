<?php

class Aluno_model extends CI_Model{

    public function salva($aluno)
    {
        $this->db->insert("tb_aluno", $aluno);// (tabela do banco,array recebido)
    }
    public function altera($unidade){
        $this->db->where('cd_cpsouza', $unidade['cd_cpsouza']);
        $this->db->update('tb_unidade', $unidade);
    }

    public function buscaTurmas(){
        return $this->db->get("tb_turma")->result_array();
        }


}
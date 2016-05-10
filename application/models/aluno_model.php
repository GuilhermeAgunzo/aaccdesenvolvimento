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

    public function verifica($matricula){
        $result  = $this->db->get_where('tb_aluno',array('cd_mat_aluno'=> $matricula))->row_array();
        if(count($result) > 0) {
            return $result;
        }else {
            return false;
        }
    }

    public function emailCadastrado($email){
        $this->db->where('nm_email',$email);
        $query = $this->db->get('tb_aluno');

        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }

    }

}
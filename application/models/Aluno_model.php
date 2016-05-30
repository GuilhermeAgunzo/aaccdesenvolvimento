<?php

class Aluno_model extends CI_Model{

    public function cadastrarAluno($aluno){
        $this->db->insert("tb_aluno", $aluno);
    }

    public function buscarAluno($matricula){
        $this->db->where("cd_mat_aluno", $matricula);
        return $this->db->get("tb_aluno")->row_array();
    }

    public function buscarAlunoId($id_aluno){
        $this->db->where("id_aluno", $id_aluno);
        return $this->db->get("tb_aluno")->row_array();
    }

    public function buscaAlunosInTurmas($id_turma){
        $this->db->select("*");
        $this->db->order_by('nm_aluno asc');
    //  $this->db->where("status_ativo",'1');
        $this->db->where("id_turma",$id_turma);
        return $this->db->get("tb_aluno")->result_array();
    }

    public function buscaNomeAluno($termo,$idTurma){
        $this->db->select("*");
        $this->db->order_by('status_ativo desc');
        $this->db->where("id_turma",$idTurma);
        $this->db->like("nm_aluno",$termo);
        return $this->db->get("tb_aluno")->result_array();
    }

    public function alterarAluno($dados){
        $this->db->where('id_aluno', $dados['id_aluno']);
        $this->db->update('tb_aluno', $dados['aluno']);
    }

    public function desativarAluno($matricula, $aluno){
        $this->db->where("cd_mat_aluno",$matricula);
        return $this->db->update("tb_aluno",$aluno);
    }
    
    //sobrou do adilson
    public function buascaTurmas2(){
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
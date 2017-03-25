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
    public function buscaUnidadeAlunoId($id){
       return $this->db->query("SELECT u.nm_unidade, u.cd_cpsouza from tb_unidade u inner join tb_turma t on t.id_unidade = u.id_unidade inner join tb_aluno a on a.id_turma = t.id_turma where a.id_usuario = $id")->row_array();
    }
     public function buscarAlunoUsuario($id_usuario){
        $this->db->where("id_usuario", $id_usuario);
        return $this->db->get("tb_aluno")->row_array();
    }
    
    public function buscaAlunosStatusDeclaracao($escolhaStatusDeclaracao,$id_turma){
        return $this->db->query("SELECT DISTINCT a.nm_aluno, d.id_aluno from tb_aluno a inner join tb_declaracao d on a.id_aluno = d.id_aluno where d.id_turma = {$id_turma} and d.status_declaracao = {$escolhaStatusDeclaracao}")->result_array();
    }


}

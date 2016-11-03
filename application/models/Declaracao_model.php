<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Declaracao_model extends CI_Model{

    public function getUsuario($id){   
        return  $this->db->query("select a.nm_aluno, a.nm_email, t.dt_semestre from tb_aluno a inner join tb_turma t on a.id_turma = t.id_turma and a.id_usuario = $id")->row_array();
    }
    
    public function cadastrar_declaracao($declaracao){
        $this->db->insert("tb_declaracao",$declaracao);
        return $this->db->insert_id();
    }
    public function getDeclaracoes($id_usuario){
        $this->db->where("id_usuario",$id_usuario);
        return $this->db->get("tb_declaracao")->result_array();
    }
     public function getDeclaracaoId($id_declaracao){
        $this->db->where("id_declaracao",$id_declaracao);
        return $this->db->get("tb_declaracao")->row_array();
     }
    
    public function dropDownStatusDeclaracao($id_turma){
        $this->db->select("*");
        $this->db->order_by('nm_aluno asc');
        //  $this->db->where("status_ativo",'1');
        $this->db->where("id_turma",$id_turma);
        return $this->db->get("tb_aluno")->result_array();
    }

    public function buscaDeclaracaoIdAluno($id_aluno){
        return $this->db->query("SELECT id_declaracao, dt_evento_externo from tb_declaracao where id_aluno = $id_aluno")->result_array();
    }

    public function buscaDeclaracaoCompleta($id_declaracao){
        return $this->db->query("SELECT * from tb_declaracao where id_declaracao = $id_declaracao")->result_array();
    }

    public function buscaNomeMotivoIndeferimento(){
        return $this->db->query("SELECT nm_motivo from  tb_motivos_indeferimento")->result_array();
    }

    public function buscaIdMotivoIndeferimento(){
        return $this->db->query("SELECT id_motivo from  tb_motivos_indeferimento")->result_array();
    }

    public function salvaDeclaracaoValidada($declaracaoValidada){
        return $this->db->insert("tb_ctrl_dec",$declaracaoValidada);
    }

    public function validaDeclaracao($status,$id_declaracao){
        $this->db->where('id_declaracao', $id_declaracao);
        return $this->db->update('tb_declaracao',$status);
    }

}


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
}


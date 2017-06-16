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
    public function getDeclaracoes($id_aluno){
        $this->db->where("id_aluno",$id_aluno);
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
        return $this->db->query("SELECT * from tb_declaracao where id_aluno = $id_aluno")->result_array();
    }
    public function buscaDeclaracoesAprovadas($id_aluno){
        //return $this->db->query("SELECT * from tb_declaracao where status_declaracao = 1 and id_aluno = $id_aluno")->result_array();
        return $this->db->query("SELECT d.dt_declaracao,d.status_declaracao, d.arquivo_declaracao, d.id_declaracao, ctrl.dt_aprovacao_doc from tb_declaracao d, tb_ctrl_dec ctrl where d.id_declaracao = ctrl.id_declaracao and status_declaracao = 1 and d.id_aluno = $id_aluno")->result_array();
    }

    public function buscaDeclaracaoCompleta($id_declaracao){
        return $this->db->query("SELECT * from tb_declaracao where id_declaracao = $id_declaracao")->row_array();
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
        return $this->db->update('tb_declaracao',array('status_declaracao' => $status));
    }

    public function buscaTotaldeHoras($id_aluno){
        return $this->db->query("
          select t.nm_tipo_atividade, sum(d.qt_horas_atividade) as soma_por_atividade 
          from tb_declaracao d, tb_tipos_atividade t 
          where d.id_tipo_atividade = t.id_tipo_atividade and  id_aluno = $id_aluno  and d.status_declaracao = 1
          group by t.nm_tipo_atividade")->result_array();
    }

    public function buscaDetalhesValidacao($id_declaracao){
        return $this->db->query("SELECT * FROM tb_ctrl_dec WHERE id_declaracao = {$id_declaracao}")->result_array();
    }
    public function buscaDeclaracoesByStatus($status){
        if ($status > 0){
            $this->db->where('status_declaracao', $status);
        }
        return $this->db->get("tb_declaracao")->result_array();
    }

    public function buscaInfoControleDec($id_declaracao){
        return $this->db->query("SELECT * FROM tb_ctrl_dec 
                                 WHERE id_declaracao = {$id_declaracao} 
                                 AND id_ctrl_dec = (SELECT MAX(id_ctrl_dec) 
                                                          FROM tb_ctrl_dec 
                                                          WHERE id_declaracao = {$id_declaracao})")->result_array();
    }

}


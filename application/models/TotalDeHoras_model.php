<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TotalDeHoras_model extends CI_Model{

    public function somaHoras($idAluno,$idTipoAtividade){

        $query = $this->db->query("SELECT * FROM tb_total_horas WHERE id_aluno = {$idAluno} AND id_tipo_atividade = {$idTipoAtividade}");

        // Verifica se já há registro do aluno com determinado tipo de atividade
        if($query->num_rows() == 0){
                // Caso não retorne linhas, então é inserido o registro novo
            $this->db->query("INSERT INTO tb_total_horas(total_hora_atividade,id_aluno,id_tipo_atividade)
                              SELECT SUM(ctrl.qt_horas_aprovadas) as total_hora_atividade, ctrl.id_aluno as id_aluno, ctrl.id_tipo_atividade as id_tipo_atividade 
                              FROM tb_ctrl_dec ctrl WHERE ctrl.id_aluno = {$idAluno} AND ctrl.id_tipo_atividade = {$idTipoAtividade};
                              ");
            $this->db->query("UPDATE tb_aluno SET total_geral_hora = (SELECT SUM(t.total_hora_atividade) FROM tb_total_horas t WHERE t.id_aluno = {$idAluno}) WHERE id_aluno = {$idAluno}");
        }else{
                // Caso retorne 1 ou mais linhas, então é feito uma atualização no registro
            $this->db->query("UPDATE tb_total_horas SET total_hora_atividade = (SELECT SUM(ctrl.qt_horas_aprovadas) FROM tb_ctrl_dec ctrl WHERE ctrl.id_aluno = {$idAluno} AND ctrl.id_tipo_atividade = {$idTipoAtividade}) WHERE id_aluno = {$idAluno} AND id_tipo_atividade = {$idTipoAtividade}");

            $this->db->query("UPDATE tb_aluno SET total_geral_hora = (SELECT SUM(t.total_hora_atividade) FROM tb_total_horas t WHERE t.id_aluno = {$idAluno}) WHERE id_aluno = {$idAluno}");
        }

    }

    public function buscaHorasAluno($id_aluno){
        //$query = $this->db->query("SELECT * FROM tb_total_horas WHERE id_aluno = {$id_aluno}");
        $this->db->where('id_aluno',$id_aluno);

        return $this->db->get('tb_total_horas')->result_array();
    }

}
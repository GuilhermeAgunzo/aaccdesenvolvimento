<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turma_model extends CI_Model{

    public function cadastrarTurma($turma){
        return $this->db->insert("tb_turma",$turma);
    }

    public function buscarTurma($cd_mat_turma)    {
        $this->db->where("cd_mat_turma", $cd_mat_turma);
        return $this->db->get("tb_turma")->row_array();
    }

    public function alteraTurma($turma, $id_turma){
        $this->db->where('cd_mat_turma', $turma['cd_mat_turma']);
        $this->db->update('tb_turma', $turma);
    }

    public function dropDownTurma(){

        $result = $this->db->query("select concat(aa_ingresso, ', ',dt_semestre, 'º semestre, ', qt_ciclo, 'º ciclo') as turma, id_turma from tb_turma ORDER BY `tb_turma`.`id_turma` DESC;");

        $retorno = array();
        if($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {
                $retorno[$row['id_turma']] = $row['turma'];
            }
        }

        return $retorno;
    }


}
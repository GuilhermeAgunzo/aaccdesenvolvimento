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

    public function buscarTurmaId($id_turma)    {
        $this->db->where("id_turma", $id_turma);
        return $this->db->get("tb_turma")->row_array();
    }

    /*Buscar turmas por unidade */
    public function buscarTurmasUnidade($id_unidade){
        $this->db->order_by('aa_ingresso desc');
        //$this->db->where("status_ativo", '1');
        $this->db->where("id_unidade", $id_unidade);
        return $this->db->get("tb_turma")->result_array();
    }

    public function alteraTurma($turma){
        $this->db->where('id_turma', $turma['id_turma']);
        $this->db->update('tb_turma', $turma);
    }

    public function dropDownTurma(){
        $result = $this->db->query("select concat(aa_ingresso, ' - ',dt_semestre, 'º sem - ', nm_turno) as turma, id_turma from tb_turma ORDER BY `tb_turma`.`id_turma` DESC;");

        $retorno = array();
        if($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {
                $retorno[$row['id_turma']] = $row['turma'];
            }
        }
        return $retorno;
    }

    public function dropDownTurmaUnidade($unidade){
        $result = $this->db->query("select IF (nm_modalidade='EAD' ,concat(aa_ingresso, ' - ',dt_semestre, 'º sem - ',nm_modalidade),concat(aa_ingresso, ' - ',dt_semestre, 'º sem - ',nm_turno)) as turma, id_turma from tb_turma WHERE id_unidade={$unidade} ORDER BY `tb_turma`.`aa_ingresso` DESC;");

        $retorno = array();
        if($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {

                $retorno[$row['id_turma']] = $row['turma'];
            }
        }
        return $retorno;
    }
}
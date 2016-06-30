<?php

class Curso_model extends CI_Model{

    public function salva($curso){
        $this->db->insert("tb_curso", $curso);
    }

    public function dropDownCurso(){
        $result = $this->db->query("select nm_abreviacao, id_curso from tb_curso ORDER BY id_curso;");
        $retorno = array();
        if($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {
                $retorno[$row['id_curso']] = $row['nm_abreviacao'];
            }
        }
        return $retorno;
    }


}
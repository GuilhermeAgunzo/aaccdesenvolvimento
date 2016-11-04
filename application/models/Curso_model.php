<?php

class Curso_model extends CI_Model{

    public function salva($curso){
        $this->db->insert("tb_curso", $curso);
    }

    public function buscaCurso($id){
        $this->db->where("id_curso",$id);
        return $this->db->get("tb_curso")->row_array();
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

    public function dropDownCursoByUnidade(){

        $id_unidade = $this->input->post("id_unidade");
        $this->db->where("id_unidade", $id_unidade);

        $this->db->order_by("id_curso");

        $consulta = $this->db->get("tb_curso");

        return $consulta;
    }
        /*
    função da validacao_relatorio_aacc, precisa da referencia da tabela de unidade para de curso que tem nessa unidade
*/
    public function dropDownCursoUnidade($unidade){
        $result = $this->db->query("select nm_curso ,id_curso from tb_curso WHERE id_unidade={$unidade} ORDER BY nm_curso;");

        $retorno = array();
        if($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {

                $retorno[$row['id_curso']] = $row['nm_curso'];
            }
        }
        return $retorno;
    }
}

<?php

class Curso_model extends CI_Model{

    public function salvaCurso($curso){
       return $this->db->insert("tb_curso", $curso);
    }
    public function alteraCurso($curso){
        $this->db->where('id_curso', $curso['id_curso']);
       return $this->db->update('tb_curso', $curso);
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

    public function buscaHorasCurso($id_aluno){
        return $this->db->query("SELECT c.qt_horas_aacc 
        from tb_curso c, tb_aluno a, tb_turma t 
        WHERE a.id_turma = t.id_turma 
        and t.id_curso = c.id_curso and a.id_aluno = $id_aluno")->row_array();
    }

    public function buscaCursoByInidade($id_unidade, $id_curso){
        return $this->db->query("select * from tb_curso WHERE id_unidade = {$id_unidade} and id_curso = {$id_curso}")->row_array();
    }

}

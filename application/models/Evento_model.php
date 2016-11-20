<?php
class Evento_model extends CI_Model{
    public function salvaCadastro($evento){
        return $this->db->insert("tb_evento",$evento);
    }

    public function buscaEventosUnidade($idUnidade){
        $this->db->select("*");
        //$this->db->order_by('status_ativo desc');
        return $this->db->get_where("tb_evento",array(
            "id_unidade" => $idUnidade
        ))->result_array();
    }

    public function buscaEventos(){
        $this->db->select("*");
        $this->db->order_by('status_ativo desc');
        return $this->db->get("tb_evento")->result_array();
    }
    public function buscaEventosEntreDatas($dataInicial,$dataFinal){
        $this->db->where("dt_inicio_evento >= ",$dataInicial);
        $this->db->where("dt_final_evento <= ",$dataFinal);
        $this->db->order_by("dt_inicio_evento");
        return $this->db->get("tb_evento")->result_array();
    }
    public function buscaEventoPorId($id){
        $this->db->where("id_evento", $id);
        return $this->db->get("tb_evento")->row_array();
    }
    public function alteraEvento($eventoId,$evento){
        $this->db->where("id_evento", $eventoId);
        return $this->db->update("tb_evento", $evento);
    }
    public function dropDownEvento(){
        $result = $this->db->query("select nm_evento as evento, id_evento from tb_evento ORDER BY nm_evento;");
        $retorno = array();
        if($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {
                $retorno[$row['id_evento']] = $row['evento'];
            }
        }
        return $retorno;
    }

    public function buscaEventoDcl(){

        //pegar data de ontem pra menos
        $result = $this->db->query("select nm_evento as evento, id_evento from tb_evento WHERE dt_final_evento <= CURDATE() - INTERVAL 1 DAY AND CURDATE() ORDER BY nm_evento;");

        $retorno = array();
        if($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {
                $retorno[$row['id_evento']] = $row['evento'];
            }
        }
        return $retorno;

    }
    public function buscaEventoIdDeclaracao($id_declaracao){
        return $this->db->query("SELECT e.id_evento,
            e.id_tipo_atividade,
            e.nm_evento,
            e.local_evento,
            e.dt_inicio_evento,
            e.dt_final_evento,
            e.hr_evento,
            e.qt_horas_evento,
            e.ds_evento,
            e.nm_responsavel_evento,
            e.id_user_adm_cadastrou,
            e.dt_cadastro,
            e.status_ativo,
            e.id_unidade FROM tb_evento e, tb_declaracao d 
            WHERE e.id_evento = d.id_evento and d.id_declaracao = $id_declaracao")->row_array();
    }
}
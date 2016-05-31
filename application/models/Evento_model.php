<?php
class Evento_model extends CI_Model{
    public function salvaCadastro($evento){
            return $this->db->insert("tb_evento",$evento);

    }
    public function buscaEventos(){
        $this->db->select("*");
        $this->db->order_by('status_ativo desc');
        return $this->db->get("tb_evento")->result_array();
    }
    public function buscaEventosEntreDatas($dataInicial,$dataFinal){
        $this->db->where("dt_inicio_evento >= ",$dataInicial);
        $this->db->where("dt_final_evento <= ",$dataFinal);
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
}

<?php

class Aviso_model extends CI_Model{

    public function cadastrarAviso($aviso){
        $this->db->insert("tb_aviso", $aviso);
    }

    public function pesquisarAviso($dataInicial, $dataVencimento){
        $selecionado = " dt_inicial_aviso >= '{$dataInicial}' and dt_vencimento_aviso <= '{$dataVencimento}' order by dt_inicial_aviso";

        $this->db->where($selecionado, null, false);
        return $this->db->get("tb_aviso")->result_array();
    }


}
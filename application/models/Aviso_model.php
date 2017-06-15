<?php if (! defined('BASEPATH')) exit('No direct script acess allowed');

class Aviso_model extends CI_Model{

    public function cadastrarAviso($aviso){
        $this->db->insert("tb_aviso", $aviso);
    }

    public function pesquisarAviso($dataInicial, $dataVencimento){
        $selecionado = " dt_inicial_aviso >= '{$dataInicial}' and dt_vencimento_aviso <= '{$dataVencimento}' order by dt_inicial_aviso ";

        $this->db->where($selecionado, null, false);
        return $this->db->get("tb_aviso")->result_array();
    }

    public function buscarAviso($id_aviso){
        $this->db->where("id_aviso", $id_aviso);
        return $this->db->get("tb_aviso")->row_array();
    }

    public function alterarAviso($aviso){
        $this->db->where('id_aviso', $aviso['id_aviso']);
        $this->db->update('tb_aviso', $aviso);
    }
    public function pesquisarAvisoValido($dataAtual){
        $selecionado = " dt_inicial_aviso = '{$dataAtual}' and dt_vencimento_aviso >= '{$dataAtual}' order by dt_inicial_aviso ";
        $this->db->where($selecionado, null, false);
        return $this->db->get("tb_aviso")->result_array();
    }
}
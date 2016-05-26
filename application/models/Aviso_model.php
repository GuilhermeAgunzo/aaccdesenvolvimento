<?php

class Aviso_model extends CI_Model{

    public function cadastrarAviso($aviso){
        $this->db->insert("tb_aviso", $aviso);
    }

}
<?php

class Unidade_model extends CI_Model{

public function salva($unidade)
{
    $this->db->insert("tb_unidade", $unidade);// (tabela do banco,array recebido)
}
}
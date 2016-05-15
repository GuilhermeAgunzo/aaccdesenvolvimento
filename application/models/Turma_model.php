<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turma_model extends CI_Model{

    public function cadastrarTurma($turma){
        return $this->db->insert("tb_turma",$turma);
    }

}
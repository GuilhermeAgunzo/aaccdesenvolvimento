<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acesso_model extends CI_Model{

    /**
     * @param $email
     * @param $senha
     * @return mixed
     */
    public function concedeLogin($email, $senha){

        //primeiro faz o where, para depois o get (select)
        $this->db->where("nm_email", $email);
        $this->db->where("nm_senha", $senha);
        $usuario = $this->db->get("tb_usuario")->row_array();
        return $usuario;
    }

    /**
     * @param $id_usuario
     * @return mixed
     */
    public function dadosLogado($id_usuario){

        $this->db->where('id_usuario',$id_usuario);
        $usuario = $this->db->get("tb_usuario")->row_array();
        return $usuario;
    }



}


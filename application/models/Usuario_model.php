<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{

    /**
     * @param $usuario
     */
    public function cadastrarUsuario($usuario){
        $this->db->insert("tb_usuario",$usuario);
    }

    /**
     * @param $usuario
     * @param $id_usuario
     * @return bool
     */
    public function alterarUsuario($usuario, $id_usuario){
        $this->db->where('id_usuario', $id_usuario);
        $this->db->update('tb_usuario', $usuario);
    }

    /**
     * @param $usuario
     * @param $nm_email
     * @return bool
     */
    public function alterarEmail($usuario, $nm_email){
        $this->db->where('nm_email', $nm_email);
        return $this->db->update('tb_usuario', $usuario);
    }

    /**
     * @param $id_usuario
     * @return mixed
     */
    public function buscaUsuario($id_usuario){
        $this->db->where("id_usuario", $id_usuario);
        return $this->db->get("tb_usuario")->row_array();
    }

    /**
     * @param $email
     * @return mixed
     */
    public function pesquisarUsuario($email){
        $this->db->where("nm_email", $email);
        return $this->db->get("tb_usuario")->row_array();
    }

    /**
     * @param $id_usuario
     */
    public function desativarUsuario($nm_email){
        $usuario = array('status_ativo' => 0);
        $this->db->where('nm_email', $nm_email);
        $this->db->update('tb_usuario', $usuario);
    }


    /**
     * @param $email
     * @return bool
     */
    public function emailCadastrado($email){
        $this->db->where('nm_email',$email);
        $query = $this->db->get('tb_usuario');

        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }

    }

}

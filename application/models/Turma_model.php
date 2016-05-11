<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class turma_model extends CI_Model {
	public function salva($turma){
		$this->db->insert("tb_turma", $turma);
	}
	public function mat_cadastrado($mat_turma){
		$this->db->where('cd_mat_turma',$mat_turma);
		$query = $this->db->get('tb_turma');
		if ($query->num_rows() > 0){
			return true;
		}else {
			return false;
		}
	}
	public function altera($turma){
		$this->db->where('cd_mat_turma', $turma['cd_mat_turma']);
		$this->db->update('tb_turma', $turma);
	}
	public function pesquisaturma($cd_mat_turma){
		$this->db->where("cd_mat_turma", $cd_mat_turma);
		return $this->db->get("tb_turma")->row_array();
	}
}

?>
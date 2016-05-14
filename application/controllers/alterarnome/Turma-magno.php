<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Turma extends CI_Controller
{
    public function index()
    {
		autoriza(2);
        $this->load->template_admin('turma/cadastrar_turma.php');
    }

    public function cadastrar_turma() {
		autoriza(2);
		$this->load->template_admin ( "turma/cadastrar_turma.php" );
	}
	public function cadastro_turma() {
		autoriza(2);
		$usuarioLogado = $this->session->userdata("usuario_logado");
		$turma = array (
			"cd_mat_turma" => $this->input->post ( "cd_mat_turma" ),
			"aa_ingresso" => $this->input->post ( "ano" ),
			// "nm_curso" =>$this->input->post ("curso"),
			"dt_semestre" => $this->input->post ( "semestre" ),
			"nm_turno" => $this->input->post ( "turno" ),
			"qt_ciclo" => $this->input->post ( "ciclo" ),
			//"nm_metodo_ensino" => $this->input->post ( "metodo_ensino" ), // n�o existe na tabela
			"id_user_adm_cadastrou" => $usuarioLogado ['id_usuario'],
			//"id_user_admin_desativou" => "1",//$admin_desativou,
			"dt_cadastro" => mdate ( "%Y-%m-%d %H:%i:%s", time () ), // n�o existe na view
			//"dt_desativado" => mdate ( "%Y-%m-%d %H:%i:%s" ), // n�o existe na view
			"id_unidade" => $this->input->post ( "unidade" )
		); // n�o existe na view
		$this->load->model ( "Turma_model" );
		$this->Turma_model->salva($turma);
		$this->session->set_flashdata("sucess","Cadastro efetuado com sucesso!");
		$this->load->template_admin ( "turma/cadastrar_turma.php" );
	}

    public function pesquisar_turma(){
		autoriza(2);
    	$this->load->template_admin("turma/pesquisar_turma.php");
    	
    }

    public function alterar_turma(){
		autoriza(2);
    	$this->load->model("Turma_model");
    	$cd_mat_turma = $this->input->post("cd_mat_turma");
    	
    	if($this->valida_turma()){
    		$turma = array (
    				"cd_mat_turma" => $this->input->post ( "cd_mat_turma" ),
    				"aa_ingresso" => $this->input->post ( "ano" ),
    				// "nm_curso" =>$this->input->post ("curso"),
    				"dt_semestre" => $this->input->post ( "semestre" ), // ainda nao existe
    				"nm_turno" => $this->input->post ( "turno" ),
    				"qt_ciclo" => $this->input->post ( "ciclo" ),
    				"nm_metodo_ensino" => $this->input->post ( "metodo_ensino" ), // n�o existe na tabela
    				"id_user_admin_cadastrou" => $this->input->post ( "user_admin_cadastrou" ),
    				"id_user_admin_desativou" => $this->input->post ( "user_admin_desativou" ),
    				"dt_cadastro" => date ( 'Y-m-d H:i:s' ), // n�o existe na view
    				"dt_desativado" => date ( 'Y-m-d H:i:s' ), // n�o existe na view
    				"id_unidade" => $this->input->post ( "unidade" ),
    				"status_ativo" => $this->input->post("status")
    		);
    		if ($turma['status_ativo'] == '0'){
    			array_push($turma ['dt_cadastro'], $this->buscaDataAtual());
    			array_push($turma['id_user_admin_desativou'], '1');
    		}
    		$this->load->model ( "Turma_model" );
    		$this->load->Turma_model->altera( $turma );
    		$this->session->set_flashdata ( "sucess", "Alteração efetuado com sucesso!" );
    		redirect ( '/' );
    	}else {
        	$this->load->template_admin("turma/alterar_turma.php");
    	}
    }
    public function valida_turma(){
		autoriza(2);
    	$this->load->library("form_validation");
    	$this->form_validation->set_rules("mat_turma","mat_turma","required",
    			array(
    					'required' => 'Preenchimento Obrigat�rio'
    			));
    	$this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
    	return  $this->form_validation->run();
    	
    }
    public function mat_turma_existe($matricula){
		autoriza(2);
    	$this->load->model("Turma_model");
    	if($this->turma_model > 0){
    		$this->form_validation->set_message('mat_turma_existe','Matricula da turma j� existe.!');
    		return FALSE;
    	}else {
    		return TRUE;
    	}
    }
	public function buscaDataAtual(){
		autoriza(2);
		date_default_timezone_set('America/Sao Paulo');
		$date= date('Y-m-d H:i');
		return $date;
	}
	public function pesquisa_turma($mat_turma = NULL){
		autoriza(2);
		$this->load->library("form_validation");
		$this->form_validation->set_rules("cd_mat_turma", "cd_mat_turma", "required",
				array(
						'required' =>'Preencha o campo Matricula da Turma %s.'
				)
			);
		$this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
		$sucesso = $this->form_validation->run();
		if($sucesso){
			$cd_mat_turma = $this->input->post("cd_mat_turma");
			$this->load->model("Turma_model");
			$turma = $this->Turma_model->pesquisaturma($cd_mat_turma);
			
			$dados = array(
				'cd_mat_turma' => $cd_mat_turma,
				'turma' => $turma
			);
			$this->load->template_admin("turma/exibeturma", $dados);
		}else {
			$this->load->template_admin("turma/pesquisar_turma");
		}
	}

}
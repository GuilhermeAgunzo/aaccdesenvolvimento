<?php defined('BASEPATH') OR exit('No direct script access allowed');

class administrador extends CI_Controller{

    public function index(){

        $this->load->template_admin("administrador/index.php");

    }

    public function tutorial_professor(){

        $this->load->template_admin("administrador/tutorial_professor.php");
    }


}

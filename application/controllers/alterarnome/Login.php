<?php if (! defined('BASEPATH')) exit('No direct script acess allowed');

class Login extends CI_Controller{

    /**
     *
     */
    public function index(){

        $this->load->helper(array("form"));
        $this->load->helper(array("url"));
        $this->load->view("login/index.php");
    }


}

<?php if (! defined('BASEPATH')) exit('No direct script acess allowed');

class configuracao extends CI_Controller{

    /**
     *
     */
    public function index(){

        $this->load->template_admin("configuracao/configuracao.php");
    }

    public function configuracaoAluno(){

        $this->load->template_usuario_aluno("configuracaoAluno/configuracaoAluno.php");
    }

    public function configuracaoAdmin()
    {

        $this->load->template_admin("configuracaoAdmin/configuracaoAdmin.php");

        if (isset($_POST['formSubmit'])) {
            $formSenha = $_POST['formSenha'];
             if ($formSenha == $senha[1]) {
                 echo "<div class='centralizarForm'>";
                 echo "</br>"."</br>";
                 echo form_input(array("name" => "senha", "id" => "senha" ,"class" => "caixaInput", "maxlength" => "80"));
                 echo form_label("<h6>Entre com a senha </h6>");
                 echo form_input(array("name" => "confirmarSenha", "id" => "confirmarSenha" ,"class" => "caixaInput", "maxlength" => "80"));
                 echo form_label("<h6>Confirmar senha </h6>");

                 echo "</div>";
                }
            }
        }
    }
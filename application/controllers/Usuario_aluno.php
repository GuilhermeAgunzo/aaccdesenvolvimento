<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_aluno extends CI_Controller
{
    public function index()
    {

        $this->load->template_usuario_aluno("usuario_aluno/pagina_inicial_usuario_aluno.php");

    }

    public function perguntas_frequentes()
    {

        $this->load->template_usuario_aluno("usuario_aluno/perguntas_frequentes_aluno.php");

    }

    public function tutorial_aluno()
    {

        $this->load->template_usuario_aluno("usuario_aluno/tutorial_aluno.php");

    }

    public function relatorio_horas()
    {

        $this->load->template_usuario_aluno("usuario_aluno/relatorio_horas_aluno.php");

    }

    public function pesquisa_horas()
    {

        $this->load->template_usuario_aluno("usuario_aluno/pesquisa_horas_concluidas.php");

    }
    public function cadastrar_relatorio()
    {

        $this->load->template_usuario_aluno("usuario_aluno/cadastrar_relatorio.php");

    }
     public function alterar_relatorio()
    {

        $this->load->template_usuario_aluno("usuario_aluno/alterar_relatorio.php");

    }
     public function visualizar_relatorio()
    {

        $this->load->template_usuario_aluno("usuario_aluno/visualizar_relatorio.php");

    }
}
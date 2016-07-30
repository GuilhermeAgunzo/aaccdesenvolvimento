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

    public function anexarArquivo($anexo, $aluno, $unidade, $id_declaracao){

        $filename = explode('.', $anexo['name']);
        $path = './uploads/' . $unidade['cd_cpsouza'].'_'.$unidade['nm_unidade'].'/'.$aluno['cd_mat_aluno'];

        if (!is_dir($path)) {
            mkdir($path, 0777, $recursive = true);
        }

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'pdf|jpg|png|doc|docx';
        $config['file_name'] = $aluno['cd_mat_aluno'] . "_" . $id_declaracao. "." . $filename[count($filename) - 1];

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('anexo')) {
            $data = $this->upload->data();
            return $data['file_name'];
        }else{
            return false;
        }
    }
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class curso extends CI_Controller{

    //Metodos que carregam as views
    public function index(){
        autoriza(2);
        $this->load->template_admin("curso/cadastro_curso.php");
    }

    public function cadastro_curso(){
        autoriza(2);
        $this->load->model("unidade_model");
        $unidades = $this->unidade_model->dropDownUnidade();
        $dados = array("unidades" => $unidades);
        $this->load->template_admin("curso/cadastro_curso.php",$dados);
    }
    public function pesquisa_curso(){
        autoriza(2);
        $this->load->model("unidade_model");
        $unidades = $this->unidade_model->dropDownUnidade();
        $dados = array("unidades" => $unidades);
        $this->load->template_admin("curso/pesquisa_curso",$dados);
    }
    public function altera_curso(){
        autoriza(2);
        $this->load->model("unidade_model");
        $unidades = $this->unidade_model->dropDownUnidade();
        $dados = array("unidades" => $unidades);
        $this->load->template_admin("curso/altera_curso",$dados);
    }

    //Metodos que executam operações DML

    public function cadastrarCurso(){
        autoriza(2);
        $this->load->model("unidade_model");
        $unidades = $this->unidade_model->dropDownUnidade();
        $dados = array("unidades" => $unidades);

        if($this->_validaFormulario()) {

            $usuarioLogado = $this->session->userdata("usuario_logado");
            $curso = array(
                "id_unidade" => $this->input->post("Unidade"),
                "nm_curso" => $this->input->post("nome_curso"),
                "cd_curso" => $this->input->post("codigo_curso"),
                "nm_abreviacao" => $this->input->post("abreviacao_curso"),
                "nm_coordenador_curso" => $this->input->post("nome_coordenador"),
                "cd_cpf_coordenador_curso" => $this->input->post("cpf_coordenador"),
                "qt_horas_aacc" => $this->input->post("qtd_horas_aacc"),
                "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
                "dt_cadastro" => mdate("%Y-%m-%d %H:%i:%s", time())
            );

            $this->load->model("curso_model");
            if($this-> curso_model->salvaCurso($curso)){
                $this->session->set_flashdata("success", "Cadastro efetuado com sucesso!");
                redirect('/curso/cadastro_curso');
            }else{
                $this->session->set_flashdata("danger", "O cadastro não foi efetuado. Tente novamente mais tarde.");
                $this->load->template_admin("curso/cadastro_curso.php",$dados);
            }
        }else{
            $this->cadastro_curso();
        }
    }

    public function alterarCurso(){
        autoriza(2);
        $this->load->model("unidade_model");
        $unidades = $this->unidade_model->dropDownUnidade();
        $dados = array("unidades" => $unidades);

        if($this->_validaFormularioAlteracao()) {

            $usuarioLogado = $this->session->userdata("usuario_logado");
            $curso = array(
                "id_curso" => $this->input->post("id_curso"),
                "nm_curso" => $this->input->post("nome_curso"),
                "cd_curso" => $this->input->post("codigo_curso"),
                "nm_abreviacao" => $this->input->post("abreviacao_curso"),
                "nm_coordenador_curso" => $this->input->post("nome_coordenador"),
                "cd_cpf_coordenador_curso" => $this->input->post("cpf_coordenador"),
                "qt_horas_aacc" => $this->input->post("qtd_horas_aacc"),
                "id_user_adm_cadastrou" => $usuarioLogado['id_usuario'],
                "dt_cadastro" => mdate("%Y-%m-%d %H:%i:%s", time())
            );

            $this->load->model("curso_model");
            if($this-> curso_model->alteraCurso($curso)){
                $this->session->set_flashdata("success", "Alteração Efetuada com Sucesso");
                redirect('/curso/altera_curso');
            }else{
                $this->session->set_flashdata("danger", "A alteração não foi efetuada. Tente novamente mais tarde.");
                $this->load->template_admin("curso/altera_curso2.php",$dados);
            }
        }else{
            $this->buscarDetalhesCursoAlteracao();
            //echo validation_errors();
        }
    }
    //Metodos auxiliares
    public function buscaCursosByUnidade(){
        $this->load->model("curso_model");
        $cursos = $this->curso_model->dropDownCursoByUnidade();
        $option = "<option value=''>---</option>";
        foreach($cursos->result() as $linha) {
            $option .= "<option value='$linha->id_curso'>$linha->nm_abreviacao</option>";
        }
        echo $option;
    }

    public function buscarDetalhesCursoPesquisa(){
        autoriza(2);
        $this->load->model("unidade_model");
        $unidades = $this->unidade_model->dropDownUnidade();

        $id_unidade = $this->input->post("Unidade");
        $id_curso =  $this->input->post("cursos");

        if($id_curso == "" or $id_unidade == ""){
            redirect('/curso/pesquisa_curso');
        }else{
            $this->load->model("curso_model");
            $detalheCurso = $this-> curso_model->buscaCursoByInidade($id_unidade, $id_curso);
            $dados = array("curso" => $detalheCurso,"unidades" => $unidades);
            $this->load->template_admin("curso/pesquisa_curso",$dados);
        }
    }
    public function buscarCursosUnidade(){
        autoriza(2);
        $unidade = $this->input->post("unidade");
        //echo $unidade;
        $this->load->model("curso_model");

        $cursos = $this->curso_model->filtrarCurso($unidade);

        if(!$cursos){
            $this->session->set_flashdata("danger", "Os cursos não foram localizado. Verifique os dados ou tente novamente mais tarde");
        }
        $this->load->model("unidade_model");
        $unid = $this->unidade_model->dropDownUnidade();
        $unidade = $this->unidade_model->buscarUnidadeId($unidade);

        $dados = array("cursos" => $cursos, "termo" => $unidade, "unidades" => $unid);

        $this->load->template_admin("curso/altera_curso",$dados);
    }
    public function buscarAlteraCurso($id_curso){
        autoriza(2);

        $this->load->model("curso_model");
        $curso = $this->curso_model->buscaCurso($id_curso);

        $this->load->model("unidade_model");
        $unidades = $this->unidade_model->dropDownUnidade();
        $unidade = $this->curso_model->buscaUnidadeCurso($curso['id_unidade']);


        if($curso!=null) {
            $dados = array("unidades" => $unidades, "cursoDetalhes" => $curso, "unidade" => $unidade);
            $this->load->template_admin("curso/altera_curso", $dados);
        }else{
            $this->session->set_flashdata("danger", "Curso não Encontrado. Verifique os dados.");
            redirect('/curso/altera_curso');
        }
    }

    //Metodos de validação dos dados enviados pelo formulario
    public function _validaFormulario(){
        $this->load->library("form_validation");
        $mensagem_abreviacao = array(
            'is_unique' => 'Já existe um curso cadastrado com esta abreviação.'
        );
        $mensagem_nome_curso = array(
            'is_unique' => 'Já existe um curso cadastrado com este nome.'
        );
        $mensagem_cpf = array(
            'is_unique' => 'Já existe um coordenador cadastrado com este Cpf.'
        );
        $mensagem_codigo_curso = array(
            'is_unique' => 'Já existe um curso cadastrado com este Código.'
        );
        //$this->form_validation->set_rules('cpf', 'CPF', 'valid_cpf');
        $this->form_validation->set_rules("abreviacao_curso", "Abreviação", "required|max_length[10]", $mensagem_abreviacao);
        $this->form_validation->set_rules("nome_curso", "Nome do curso", "required|max_length[70]", $mensagem_nome_curso);
        $this->form_validation->set_rules("codigo_curso", "Código do curso", "required|max_length[20]|is_unique[tb_curso.cd_curso]", $mensagem_codigo_curso);
        $this->form_validation->set_rules("nome_coordenador", "Nome do coordenador", "required|max_length[100]");
        $this->form_validation->set_rules("cpf_coordenador", "CPF", "max_length[50]|exact_length[14]|valid_cpf|is_unique[tb_curso.cd_cpf_coordenador_curso]", $mensagem_cpf);
        $this->form_validation->set_rules("qtd_horas_aacc", "Quantidade de horas AACC", "required|numeric|is_natural");
        $this->form_validation->set_error_delimiters('<p class=" alert alert-danger">', '</p>');
        return $this->form_validation->run();//roda regra
    }
    public function _validaFormularioAlteracao(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("abreviacao_curso", "Abreviação", "required|max_length[10]");
        $this->form_validation->set_rules("nome_curso", "nome do curso", "required|max_length[70]");
        $this->form_validation->set_rules("codigo_curso", "Código do curso", "required|max_length[20]|numeric|is_natural");
        $this->form_validation->set_rules("nome_coordenador", "nome do coordenador", "required|max_length[100]");
        $this->form_validation->set_rules("cpf_coordenador", "CPF", "required|max_length[50]|exact_length[14]|valid_cpf");
        $this->form_validation->set_rules("qtd_horas_aacc", "Quantidade de horas AACC", "required|numeric|is_natural");
        $this->form_validation->set_error_delimiters('<p class=" alert alert-danger">', '</p>');
        return $this->form_validation->run();//roda regra
    }

}
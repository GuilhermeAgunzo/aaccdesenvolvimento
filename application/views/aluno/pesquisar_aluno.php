<script type="text/javascript">

    var url = "<?= base_url() ?>" + "index.php/Curso/buscaCursosByUnidade";
    function busca_cursos(id_unidade){

        $('#turmas').empty().append('<option selected="selected" value="">---</option>');
        $.post(url, {
            id_unidade : id_unidade
        }, function(data){
            $('#cursos').html(data);
        })
    }

    var urlTurma = "<?= base_url()?>" + "index.php/Turma/buscaTurmasByCurso"
    function busca_turmas(id_curso){
        $.post(urlTurma, {
            id_curso : id_curso
        }, function(data){
            $('#turmas').html(data);
        })
    }
</script>

<?php
echo form_fieldset("<h1>Pesquisa de Aluno</h1>");
//opcçoes de escolher a unidade
if(!isset($turmas) && !isset($alunos)){
    echo form_open('aluno/pesquisarAluno', 'class = form-horizontal');
    echo "<div class='row'>";
    echo form_label("Unidade", "unidade", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-3'>";
    $unidades = array('' =>  "Selecione")+$unidades;
    echo form_dropdown('Unidade', $unidades, "", array("class" => "form-control", "required" => "required", 'onchange' => 'busca_cursos($(this).val())'));
    echo "</div>";
    echo "<div class='col-md-2'>";

    echo "</div>";
    echo "</div>";
    echo "<div class='row'>";
    echo form_label("Curso", "curso", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-3'>";
    echo "<select name='cursos' id='cursos' class='form-control' required='required' onchange='busca_turmas($(this).val())'></select>";
    echo "</div>";
    echo "</div>";
    echo "<div class='row'>";
    echo form_label("Turma", "turma", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-3'>";
    echo "<select name='turmas' id='turmas' class='form-control' required='required'></select>";
    echo "</div>";
    echo "</div>";
    echo "<div class='row'>";
    echo form_label("","", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-3'>";
    echo form_button(array("class" => "btn btn-default", "content" => "Buscar", "type" => "submit"));
    echo "</div>";
    echo "</div>";
    echo form_close();
}
//opcoes de escolher as turmas da unidade escolhida na opcao anterior
if(!isset($alunos) && isset($turmas)) {
    echo anchor("aluno/pesquisar_aluno","Voltar", array("class" => "btn btn-default"));
    echo "<h3>" . $unidade["nm_unidade"] . "</h3>";
    if ($turmas != null) {
        echo "<div class='col-md-3'>";
        echo "<table class='table table-striped'>";
        foreach ($turmas as $turmas) {
            echo "<tr>";
            echo "<td>";
            if ($turmas['nm_turno'] != null) {
                echo anchor("aluno/pesquisarAluno/{$turmas['cd_mat_turma']}", "{$turmas['aa_ingresso']} - {$turmas['dt_semestre']}º Sem - {$turmas['nm_turno']}");
            } else {
                echo anchor("aluno/pesquisarAluno/{$turmas['cd_mat_turma']}", "{$turmas['aa_ingresso']} - {$turmas['dt_semestre']}º Sem - {$turmas['nm_modalidade']}");
            }
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo anchor("aluno/pesquisar_aluno","Voltar", array("class" => "btn btn-default"));
        echo "</div>";
    } else {
        echo "<p class='alert alert-danger'> Nenhuma Turma cadastrada nessa Unidade.</p>";
        echo "</br>";
        echo anchor("aluno/pesquisar_aluno/", "Voltar", 'class = "btn btn-default"');
    }
}
if(isset($alunos)) {
    if ($alunos != null) {
        $atributos = array('class' => 'form-horizontal');
        echo form_open('aluno/pesquisaNomeAluno', $atributos);
        echo form_label("Nome do Aluno", "nm_aluno", array("class" => "col-md-2 control-label"));
        echo "<div class='col-md-4'>";
        echo "<div class='input-group'>";
        if (isset($termo)){echo form_input(array("name" => "nm_aluno", "value" => "{$termo}" ,"required" => "required", "id" => "nm_aluno", "class" => "form-control", "maxlength" => "70"));
        }else{echo form_input(array("name" => "nm_aluno", "required" => "required", "id" => "nm_aluno", "class" => "form-control", "maxlength" => "70"));}
        echo "<span class='input-group-btn'>";
        echo form_button(array("class" => "btn btn-default", "content" => "Buscar", "type" => "submit"));
        echo "</span>";
        echo "</div>";
        echo form_hidden("turma", $turma["cd_mat_turma"]);
        echo form_hidden("unidade",$unidade['id_unidade']);
        echo form_hidden("curso", $curso['id_curso']);
        echo form_close();
        echo "</div>";

        echo "<div class='form-group'>";
        echo "<div class='col-md-2'>";
        echo form_open("aluno/pesquisarAluno/");
        echo form_hidden("turmas", $turma['id_turma']);
        echo form_button(array("class" => "btn btn-default", "content" => "Mostrar Todos", "type" => "submit"));
        echo form_close();
        echo "</div>";

        echo form_open('aluno/pesquisar_aluno', 'class=form-horizontal');
        echo "<div class='col-md-2'>";
        echo form_button(array("class" => "btn btn-default", "content" => "Voltar", "type" => "submit"));
        echo form_hidden("Unidade", $turma["id_unidade"]);
        echo "</div>";
        echo form_close();
        echo "</div>";


        echo "<br/><br/>";
        if($turma['nm_turno']!=null){
            echo "<h3></h3>";
            echo "<h3>Unidade: {$unidade['nm_unidade']} | Curso: {$curso['nm_abreviacao']} | Turma: {$turma['aa_ingresso']} - {$turma['dt_semestre']}º Sem - {$turma['nm_turno']}</h3>";
        }else{
            echo "<h3>Turma: {$turma['aa_ingresso']} - {$turma['dt_semestre']}º Sem - {$turma['nm_modalidade']}</h3>";
        }
        echo "<div class='table-responsive tabela-listagem'>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Matricula</th>";
        echo "<th>Nome</th>";
        echo "<th>Email</th>";
        echo "<th>Telefone</th>";
        echo "<th>Celular</th>";
        echo "<th>Status</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($alunos as $aluno) {
            echo "<tr>";
            echo "<td>" . $aluno["cd_mat_aluno"] . "</td>";
            echo "<td>" . $aluno["nm_aluno"] . "</td>";
            echo "<td>" . $aluno["nm_email"] . "</td>";
            echo "<td>" . $aluno["cd_tel_residencial"] . "</td>";
            echo "<td>" . $aluno["cd_tel_celular"] . "</td>";

            if ($aluno["status_ativo"] != 0) {
                echo "<td>Ativo</td>";
            } else {
                echo "<td>Inativo</td>";
            }
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    }else{
        echo "<p class='alert alert-danger'> Nenhum Aluno cadastrado nessa Turma.</p>";
        echo "</br>";

        echo form_open('aluno/pesquisaTurmasUnidade', 'class=form-horizontal');
        echo "<div class='col-md-2'>";
        echo form_button(array("class" => "btn btn-default", "content" => "Voltar", "type" => "submit"));
        echo form_hidden("Unidade", $turma["id_unidade"]);
        echo "</div>";
        echo form_close();
    }
}
?>
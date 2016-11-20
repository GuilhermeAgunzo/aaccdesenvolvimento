<?php

echo form_fieldset("<h1>Controle de Entrega de Declaração de Aluno</h1>");
if(isset($unidades)){


    echo form_open('aluno/buscaAlunosHorasConcluidas', 'class = form-horizontal');
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

if(isset($curso) && isset($alunos)){

    echo "<h3>Unidade: {$unidade['nm_unidade']} | Curso: {$curso['nm_abreviacao']} | Turma: {$turma['aa_ingresso']} - {$turma['dt_semestre']}º Sem - {$turma['nm_turno']}</h3>";
    echo "<div class='table-responsive tabela-listagem'>";
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th> Nome </th>";
    echo "<th> Quantidade de horas </th>";
    echo "<th></th>";
    echo "</tr>";
    echo "</thead>";

    foreach($alunos as $aluno){
        if($aluno['total_geral_hora'] >= $curso['qt_horas_aacc']){
            $endecoprint = base_url('index.php/aluno/declaracaoFinal/'.$aluno['id_aluno']);
            echo "<tr>";
            echo "<td>".$aluno['nm_aluno']."</td>";
            echo "<td style='text-align: center'>".$aluno['total_geral_hora']."</td>";
            echo "<td>".form_button(array("class" => "btn btn-default", "content" => "Imprimir declaração", "onClick" => "varWindow = window.open ('{$endecoprint}','imprimir','width=1024, height=655, top=10, left=110, scrollbars=no');"))."</td>";
            echo "</tr>";
        }
    }
    echo "</table>";
    echo "</div>";
}

?>
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
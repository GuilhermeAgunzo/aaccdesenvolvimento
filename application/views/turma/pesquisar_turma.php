<script type="text/javascript">
    var url = "<?= base_url() ?>" + "index.php/Curso/buscaCursosByUnidade";
    function busca_cursos(id_unidade){
        $.post(url, {
            id_unidade : id_unidade
        }, function(data){
            $('#cursos').html(data);
        })
    }
</script>

<?php
echo form_fieldset("<h1>Pesquisa de Turma</h1>");

if(!isset($unidade) && isset($unidades)){
    echo form_open('turma/pesquisarTurmaInUnidade', 'class = form-horizontal');
    echo "<div class='row'>";
    echo form_label("Unidade", "unidade", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-3'>";
    //$unidades = array('' =>  "Selecione")+$unidades;
    echo form_dropdown('Unidade', $unidades, "", array("class" => "form-control", 'required' => 'required', 'id' => 'unidade', 'onchange' => 'busca_cursos($(this).val())'));
    echo "</div>";

    echo form_label("Curso", "curso", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-3'>";
    echo "<select name='cursos' id='cursos' class='form-control' required='required'></select>";
    echo "</div>";

    echo "<div class='col-md-2'>";
    echo form_hidden("opcao", 'Pesquisar');
    echo form_button(array("class" => "btn btn-default", "content" => "Pesquisar", "type" => "submit"));
    echo "</div>";
    echo "</div>";
    echo form_close();
}
//opcoes de escolher as turmas da unidade escolhida na opcao anterior
if(isset($turmas)) {
    echo "<h3>" . $unidade["nm_unidade"] . "</h3>";

    if ($turmas != null) {
        echo "<div class='table-responsive'>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Código da Turma</th>";
        echo "<th>Turma</th>";
        echo "<th>Turno/Modalidade</th>";
        echo "</tr>";
        echo "</thead>";
        foreach ($turmas as $turma) {
            echo "<tr>";
            echo "<td class='text-center'>".$turma['cd_mat_turma']."</td>";
            echo "<td>{$turma['aa_ingresso']}/{$turma['dt_semestre']} - {$cursos[$turma['id_curso']]} - {$turma['qt_ciclo']}º Ciclo</td>";
            if($turma['nm_turno']!=null) {
                echo "<td class='text-center'>" . $turma['nm_turno'] . "</td>";
            }else{
                echo "<td class='text-center'>".$turma['nm_modalidade']."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";

        echo "<div class='row'>";
        echo "<div class='col-md-2'>";
        echo anchor("turma/pesquisar_turma/", "Voltar", 'class = "btn btn-default"');
        echo "</div>";
        echo "</div>";
    }else{
        echo "<p class='alert alert-danger'> Nenhuma Turma cadastrada nessa Unidade.</p>";
        echo "<br/>";
        echo anchor("turma/pesquisar_turma/", "Voltar", 'class = "btn btn-default"');
    }
}
?>
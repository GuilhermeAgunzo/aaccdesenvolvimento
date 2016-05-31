<?php
echo form_fieldset("<h1>Pesquisa de Turma</h1>");

if(!isset($unidade) && isset($unidades)){
    echo form_open('turma/pesquisarTurmaInUnidade', 'class = form-horizontal');
    echo "<div class='row'>";
    echo form_label("Unidade", "unidade", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-3'>";
    $unidades = array('' =>  "Selecione")+$unidades;
    echo form_dropdown('Unidade', $unidades, "", array("class" => "form-control", 'required' => 'required'));
    echo "</div>";
    echo "<div class='col-md-2'>";
    echo form_hidden("opcao", 'Pesquisar');
    echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
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
        echo "<th>Matricula da Turma</th>";
        echo "<th>Turma</th>";
        echo "<th>Turno/Modalidade</th>";
        echo "</tr>";
        echo "</thead>";
        foreach ($turmas as $turma) {
            echo "<tr>";
            echo "<td>".$turma['cd_mat_turma']."</td>";
            echo "<td>{$turma['aa_ingresso']}/{$turma['dt_semestre']} - {$turma['qt_ciclo']}º Ciclo</td>";
            if($turma['nm_turno']!=null) {
                echo "<td>" . $turma['nm_turno'] . "</td>";
            }else{
                echo "<td>".$turma['nm_modalidade']."</td>";
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
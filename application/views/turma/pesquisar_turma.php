<?php
echo form_fieldset("<h1>Pesquisa de Turma</h1>");

if(!isset($unidade) && isset($unidades)){
    echo form_open('turma/pesquisarTurmaInUnidade', 'class = form-horizontal');
    echo "<div class='form-group'>";
    echo form_label("Unidade", "unidade", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-3'>";
    echo form_dropdown('Unidade', $unidades, "", array("class" => "form-control"));
    echo "</div>";
    echo "<div class='col-sm-2'>";
    echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
    echo "</div>";
    echo "<div class='col-sm-4'>";
    echo "</div>";
    echo "</div>";
    echo form_close();
}
//opcoes de escolher as turmas da unidade escolhida na opcao anterior
if(isset($turmas)) {
    echo "<h3>" . $unidade["nm_unidade"] . "</h3>";
    echo "<br/>";
    echo anchor("turma/pesquisar_turma/", "Voltar", 'class = "btn btn-default"');
    echo "<br/>";
    echo "<br/>";

    if ($turmas != null) {
        echo "<table class='table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Ano de Ingresso</th>";
        echo "<th>Matricula da Turma</th>";
        echo "<th>Semestre</th>";
        echo "<th>Modalidade</th>";
        echo "<th>Turno</th>";
        echo "<th>Ciclo</th>";
        echo "<th>Status</th>";
        echo "</tr>";
        echo "</thead>";
        foreach ($turmas as $turma) {
            echo "<tr>";
            echo "<td>".$turma['aa_ingresso']."</td>";
            echo "<td>".$turma['cd_mat_turma']."</td>";
            echo "<td>".$turma['dt_semestre']."</td>";
            echo "<td>".$turma['nm_modalidade']."</td>";
            echo "<td>".$turma['nm_turno']."</td>";
            echo "<td>".$turma['qt_ciclo']."</td>";

            if ($turma["status_ativo"] != 0) {
                echo "<td>Ativo</td>";
            } else {
                echo "<td>Inativo</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo "<p class='alert alert-danger'> Nenhuma Turma cadastrada nessa Unidade.</p>";
        echo "<br/>";
        echo anchor("turma/pesquisar_turma/", "Voltar", 'class = "btn btn-default"');
    }
}

?>
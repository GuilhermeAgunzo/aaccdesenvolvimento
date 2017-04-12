<?php

if(isset($alunos)) {
    if ($alunos != null) {

        $textoTurma = "{$turma['aa_ingresso']} - {$turma['dt_semestre']}º sem - {$turma['nm_turno']}";

        echo "<div class='form-group'>";
        echo "<div class='col-sm-12'>";
        echo "<h3>Unidade: {$unidade['nm_unidade']} - Curso: {$curso['nm_curso']}</h3>";
        echo "<h3>Turma: {$textoTurma}</h3>";
        echo "</div>";
        echo "</div>";

        echo "<br/>";

        echo "<div class='table-responsive'> ";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Nome do Aluno</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($alunos as $aluno) {
            echo "<tr>";
            echo "<td>".anchor("relatorioAacc/lista_declaracao_alunos_selecionados/{$unidade['id_unidade']}/{$curso['id_curso']}/{$turma['id_turma']}/{$aluno["id_aluno"]}/{$statusDeclaracao}",$aluno["nm_aluno"], "class = ''")."</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";

    }else{
        echo "<p class='alert alert-danger'>Não Existem Alunos com declarações para status " . $statusDeclaracao ."</p>";
    }
}

?>

<div id="lista_declaracao_alunos_selecionados"></div>



<?php

if(isset($alunos)) {
    if ($alunos != null) {


        echo "<div class='form-group'>";
        echo "<div class='col-sm-offset-2 col-sm-10'>";

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
            echo "<td>".anchor("relatorioAacc/lista_declaracao_alunos_selecionados/{$aluno["id_aluno"]}",$aluno["nm_aluno"], "class = ''")."</td>";
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



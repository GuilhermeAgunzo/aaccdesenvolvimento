<?php

if(isset($declaracoes)) {
    if ($declaracoes != null) {


        echo "<div class='form-group'>";
        echo "<div class='col-sm-offset-2 col-sm-10'>";

        echo "</div>";
        echo "</div>";

        echo "<br/>";

        echo "<div class='table-responsive'> ";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Nome</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($declaracoes as $declaracao) {
            echo "<tr>";
            echo "<td>".anchor("relatorioAacc/exibeDeclaracaoCompleta/{$declaracao["id_declaracao"]}",$declaracao["dt_evento_externo"], "class = ''")."</td>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";

    }else{
        echo "<p class='alert alert-danger'>Este aluno não possui declarações.</p>";
    }
}

echo '<div id="exibe_declaracao_completa"></div>';
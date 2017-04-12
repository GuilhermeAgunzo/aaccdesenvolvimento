<?php

if(isset($declaracoes)) {
    if ($declaracoes != null) {

        $textoTurma = "{$turma['aa_ingresso']} - {$turma['dt_semestre']}º sem - {$turma['nm_turno']}";

        echo "<div class='form-group'>";
        echo "<div class='col-sm-12'>";
        echo "<h3>Unidade: {$unidade['nm_unidade']} - Curso: {$curso['nm_curso']}</h3>";
        echo "<h3>Turma: {$textoTurma}</h3>";
        echo "<h3>Aluno: {$aluno['nm_aluno']}</h3>";
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
            if($declaracao['status_declaracao'] == $statusDeclaracao){

                echo "<tr>";
                    if($declaracao['id_evento'] != null){
                        echo "<td>".anchor("relatorioAacc/exibeDeclaracaoCompleta/{$declaracao["id_declaracao"]}",
                                $tiposAtividade[$declaracao['id_tipo_atividade']]." - ". $eventos[$declaracao['id_evento']].
                                " - ". $localEventos[$declaracao['id_evento']], "class = ''")."</td>";
                    }else{
                        echo "<td>".anchor("relatorioAacc/exibeDeclaracaoCompleta/{$declaracao["id_declaracao"]}",
                                $tiposAtividade[$declaracao['id_tipo_atividade']], "class = ''")."</td>";
                    }

                echo "</tr>";
            }
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";

    }else{
        echo "<p class='alert alert-danger'>Este aluno não possui declarações.</p>";
    }
}

echo '<div id="exibe_declaracao_completa"></div>';
<?php

if(isset($declaracoes)) {
    $qtdDeclaracoes = 0;
    foreach($declaracoes as $declaracao){
        if($declaracao['status_declaracao'] == $statusDeclaracao) {
            $qtdDeclaracoes++;
        }
    }

    if ($qtdDeclaracoes > 0) {

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
        echo "<th>Declarações</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($declaracoes as $declaracao) {
            if($declaracao['status_declaracao'] == $statusDeclaracao){

                echo "<tr>";
                    if($declaracao['id_evento'] != null){
                        echo "<td>".anchor("relatorioAacc/exibeDeclaracaoCompleta/{$declaracao["id_declaracao"]}",
                                dataMysqlParaPtBr($datasEventos[$declaracao['id_evento']]).
                                " - ". $eventos[$declaracao['id_evento']].
                                " - ". $qtdHorasEventos[$declaracao['id_evento']].
                                " - ".dataMysqlParaPtBr($declaracao['dt_declaracao']),
                                "class = ''")."</td>";
                    }else{
                        echo "<td>".anchor("relatorioAacc/exibeDeclaracaoCompleta/{$declaracao["id_declaracao"]}",
                                dataMysqlParaPtBr($declaracao['dt_evento_externo']).
                                " - ". $declaracao['nm_evento_externo'].
                                " - ". $declaracao['qt_horas_atividade'].
                                " - ". dataMysqlParaPtBr($declaracao['dt_declaracao'])
                                , "class = ''")."</td>";
                    }

                echo "</tr>";
            }
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";

    }else{
        $textoStatus = null;

        switch($statusDeclaracao){
            case 1: $textoStatus = "Pendente";break;
            case 2: $textoStatus = "Aprovada";break;
            case 3: $textoStatus = "Não Aprovada";break;
        }
        echo "<p class='alert alert-danger'>Este aluno não possui mais declarações com status {$textoStatus}.</p>";
    }
}

echo '<div id="exibe_declaracao_completa"></div>';
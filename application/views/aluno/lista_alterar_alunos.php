<?php
/**
 * Created by PhpStorm.
 * User: guilh
 * Date: 17/06/2017
 * Time: 17:40
 */

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
        echo "<th>Matricula</th>";
        echo "<th>Nome</th>";
        echo "<th>Email</th>";
        echo "<th>Telefone</th>";
        echo "<th>Celular</th>";
        echo "<th>Status</th>";
        if(isset($alterar)){
            echo "<th></th>";
        }
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
            echo "<td>" . anchor(base_url("index.php/aluno/buscarAlteraAluno/{$aluno['cd_mat_aluno']}"),"Alterar",array("class" => "btn btn-default"));
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";

    }else{
        echo "<p class='alert alert-danger'>Ainda não foi efetuado cadastro de alunos nesta turma.</p>";
    }
}
<?php

if(isset($alunos)) {
    if ($alunos != null) {


        echo "<div class='form-group'>";
        echo "<div class='col-sm-offset-2 col-sm-10'>";
        //echo form_button(array("class" => "btn btn-default", "content" => "Imprimir", "onClick" => "window.print();"));
        echo anchor(base_url('index.php/aluno/pdf/'.$id_turma), ' Baixar em PDF', array('class'=>'btn btn-default', 'id'=>'pdf', 'target'=>'_blank'));
        echo " ";
        $endecoprint = base_url('index.php/aluno/imprimir/'.$id_turma);
        echo form_button(array("class" => "btn btn-default", "content" => "Imprimir", "onClick" => "varWindow = window.open ('{$endecoprint}','imprimir','width=850, height=655, top=10, left=110, scrollbars=no');"));
        //echo anchor(base_url('index.php/relatorioAluno/imprimir/'.$id_turma), ' Imprimir', array('class'=>'btn btn-default', 'id'=>'imprimir', 'target'=>'_blank'));

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
        echo "<th>Horas Aprovadas</th>";
        echo "<th>Horas Não Aprovadas</th>";
        echo "<th>Horas Pendentes</th>";
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
            if($aluno['total_geral_hora'] == 1 || $aluno['total_geral_hora'] == '1'){
                echo "<td>". $aluno['total_geral_hora'] . " hora</td>";
            }else{
                echo "<td>". $aluno['total_geral_hora']. " horas</td>";
            }

            foreach($horas as $hora){
                if($aluno['id_aluno'] == $hora['id_aluno']){
                    if($hora['status_declaracao'] == 3){
                        if($hora['soma'] == 1){
                            echo "<td>". $hora['soma'] ." hora</td>";
                        }else{
                            if($hora['soma'] == null){
                                echo "<td>0 horas</td>";
                            }else{
                                echo "<td>". $hora['soma'] ." horas</td>";
                            }

                        }

                    }
                }
            }

            foreach($horas as $hora){
                if($aluno['id_aluno'] == $hora['id_aluno']){
                    if($hora['status_declaracao'] == 1){
                        if($hora['soma'] == 1){
                            echo "<td>". $hora['soma'] ." hora</td>";
                        }else{
                            echo "<td>". $hora['soma'] ." horas</td>";
                        }

                    }
                }
            }


            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";

    }else{
        echo "<p class='alert alert-danger'>Ainda não foi efetuado cadastro de alunos nesta turma.</p>";
    }
}
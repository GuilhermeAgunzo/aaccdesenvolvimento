            <?php

            echo form_fieldset("<h1>Validação de AACC's</h1>");

            $atributos = array('class' => 'form-horizontal');
            echo form_open('email/send', $atributos);
            echo "<div class='form-group'>";
            echo form_label("Turma", "turma", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-10'>";
            $turma = array('turma' => 'Selecione a turma','turma1' => '1º semestre, 1º Ciclo, ADS, 2012','turma2' => '1º semestre, 2º Ciclo, ADS, 2012', 'turma3' => '1º semestre, 3º Ciclo, ADS, 2012');
            echo form_dropdown('Turma', $turma, array("class" => "form-control"));
            echo "</div>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<div class='col-sm-offset-2 col-sm-10'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
            echo "</div>";
            echo "</div>";
            echo form_close();

            echo "</br>"."</br>"."</br>"."</br>";
            echo "<h3>Lista de Alunos</h3>";
            echo "</br>";
            echo "<table border '1'>";
            echo "<tr>";
            echo "<td>Alyne Alice Vieira</td>";
            echo "<td class='tabelaBotao'>";
            echo form_button(array("class" => "botaoValidacao", "content" => "", "type" => "submit"));
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Karina Lima Datore</td>";
            echo "<td class='tabelaBotao'>";
            echo form_button(array("class" => "botaoValidacao", "content" => "", "type" => "submit"));
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "</table>";
            echo "</div>";
            ?>

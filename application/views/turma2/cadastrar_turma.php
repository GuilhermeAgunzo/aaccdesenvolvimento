            <?php
            echo form_fieldset("<h1>Cadastro da Turma</h1>");


            $atributos = array('class' => 'form-horizontal');
            echo form_open('email/send', $atributos);
            echo "</br>";

            echo "<div class='form-group'>";
            echo "<div class='table'>";
            echo "<table width='150'>";
            echo "<tr>";
            echo "<td>";
            echo form_label("EAD " , "ead", array("class" => ""));
            echo "</td>";
            echo "<td>";
            echo form_checkbox(array("name" => "ead","id" => "ead","value" => "1", "class" => ""),FALSE);
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo form_label("Presencial " , "presencial", array("class" => ""));
            echo "</td>";
            echo "<td>";
            echo form_checkbox(array("name" => "presencial","id" => "presencial","value" => "2", "class" => ""),FALSE);
            echo "</td>";
            echo "</tr>";
            echo "</table>";
            echo "</div>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo form_label("Ano de Ingresso", "ano", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-2'>";
            echo form_input(array("name" => "ano", "id" => "ano" ,"class" => "form-control", "maxlength" => "4"));
            echo "</div>";
            echo "</div>";


            echo "<div class='form-group'>";
            echo form_label("Curso", "curso", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-10'>";
            $curso = array('Selecione','ADS','PQ','GE', 'COMEX');
            echo form_dropdown('curso', $curso, array("class" => "form-control"));
            echo "</div>";
            echo "</div>";


            echo "<div class='form-group'>";
            echo form_label("Turno", "turno", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-10'>";
            $turno = array('Selecione','Manhã','Tarde','Noite');
            echo form_dropdown('turno', $turno, array("class" => "form-control"));
            echo "</div>";
            echo "</div>";


            echo "<div class='form-group'>";
            echo form_label("Ciclo", "ciclo", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-10'>";
            $ciclo = array('Selecione','1º Semestre','2º Semestre','3º Semestre','4º Semestre','5º Semestre','6º Semestre');
            echo form_dropdown('ciclo', $ciclo, array("class" => "form-control"));
            echo "</div>";
            echo "</div>";


            echo "<div class='form-group'>";
            echo "<div class='col-sm-offset-2 col-sm-10'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
            echo "</div>";
            echo "</div>";

            echo form_close();
            ?>


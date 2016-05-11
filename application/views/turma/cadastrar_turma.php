            <?php
            echo form_fieldset("<h1>Cadastro da Turma</h1>");


            $atributos = array('class' => 'form-horizontal');
            echo form_open("turma/cadastro_turma",$atributos);
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
            echo form_label("Unidade", "unidade", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-2'>";
            echo form_input(array("name" => "unidade", "id" => "unidade" ,"class" => "form-control", "maxlength" => "4"));
            echo "</div>";
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo form_label("Código da Turma", "matricula", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-2'>";
            echo form_input(array("name" => "cd_mat_turma", "id" => "cd_mat_turma" ,"class" => "form-control", "maxlength" => "4"));
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
            echo form_label("Semestre","semestre", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-10'>";
            $semestre=array('Selecione','1','2');
            echo form_dropdown('semestre',$semestre, array("class" => "col-sm-2 control-label"));
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
            $ciclo = array('Selecione','1º Ciclo','2º Ciclo','3º Ciclo','4º Ciclo','5º Ciclo','6º Ciclo');
            echo form_dropdown('ciclo', $ciclo, array("class" => "form-control"));
            echo "</div>";
            echo "</div>";
            
            echo "<div class='form-group'>";
            echo form_label("Status", "status", array("class" => "col-sm-2 control-label"));
            echo "<div class='col-sm-10'>";
            $status = array('Selecione','Ativado','Desativado');
            echo form_dropdown('status', $status, array("class" => "form-control"));
            echo "</div>";
            echo "</div>";
            


            echo "<div class='form-group'>";
            echo "<div class='col-sm-offset-2 col-sm-10'>";
            echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
            echo "</div>";
            echo "</div>";

            echo form_close();
            ?>


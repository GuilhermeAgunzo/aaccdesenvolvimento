<?php
echo form_fieldset("<h1>Cadastro de Curso</h1>");

echo form_open('curso/cadastrarCurso', 'class = form-horizontal');

echo "<div class='row'>";
echo form_label("Abreviação do Curso", "nm_abreviacao", array("class" => "col-md-2 control-label"));
echo "<div class='form-group col-md-2'>";
echo form_input(array("name" => "nm_abreviacao", "value" => set_value("nm_abreviacao",""), "id" => "nm_abreviacao" ,"class" => "form-control", "maxlength" => "10"));
echo form_error("nm_abreviacao");
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo form_label("Nome do Curso", "nm_curso", array("class" => "col-md-2 control-label"));
echo "<div class='form-group col-md-4'>";
echo form_input(array("name" => "nm_curso", "value" => set_value("nm_curso",""), "id" => "nm_curso" ,"class" => "form-control", "maxlength" => "70"));
echo form_error("nm_curso");
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo "<div class='form-group'>";
echo "<div class='col-md-offset-2 col-md-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
echo "</div>";
echo "</div>";
echo "</div>";

?>
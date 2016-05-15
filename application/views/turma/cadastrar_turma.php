<?php
echo form_fieldset("<h1>Cadastro da Turma</h1>");


$atributos = array('class' => 'form-horizontal');
echo form_open("turma/cadastrarTurma",$atributos);
echo "</br>";

echo "<div class='form-group'>";
echo form_label("Código da Turma", "matricula", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-2'>";
echo form_input(array("name" => "cd_mat_turma", "value" => set_value("cd_mat_turma",""), "id" => "cd_mat_turma" ,"class" => "form-control", "maxlength" => "5", "required" => "required"));
echo form_error("cd_mat_turma");
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Unidade", "unidade", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-2'>";
echo form_input(array("name" => "unidade", "value" => set_value("unidade",""), "id" => "unidade" ,"class" => "form-control", "maxlength" => "4", "required" => "required"));
echo form_error("unidade");
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Ano de Ingresso", "ano", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-2'>";
echo form_input(array("name" => "ano", "value" => set_value("ano",""), "id" => "ano" ,"class" => "form-control", "maxlength" => "4", "minlength" => "4", "required" => "required", "min" => "1969"));
echo form_error("ano");
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Semestre","semestre", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-10'>";
$semestre=array('' => 'Selecione','1' => '1','2' => '2');
echo form_dropdown('semestre',$semestre, array("class" => "col-sm-2 control-label"));
echo form_error("semestre");
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Turno", "turno", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-10'>";
$turno = array('' => 'Selecione','Manhã' => 'Manhã', 'Tarde' => 'Tarde', 'Noite' => 'Noite');
echo form_dropdown('turno', $turno, array("class" => "form-control"));
echo form_error("turno");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo form_label("Ciclo", "ciclo", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-10'>";
$ciclo = array('' => 'Selecione', '1º Ciclo' => '1º Ciclo', '2º Ciclo' => '2º Ciclo', '3º Ciclo' => '3º Ciclo', '4º Ciclo' => '4º Ciclo', '5º Ciclo' => '5º Ciclo', '6º Ciclo' => '6º Ciclo');
echo form_dropdown('ciclo', $ciclo, array("class" => "form-control"));
echo form_error("ciclo");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
echo "</div>";
echo "</div>";

echo form_close();
?>


<?php

echo form_fieldset("<h1>Relatório de Aluno</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('email/send', $atributos);
echo "<div class='row'>";
echo form_label("Turma", "cd_turma", array("class" => "col-sm-2 control-label"));
echo "<div class='form-group col-sm-10'>";
$turma = array('turma' => 'Selecione a turma','turma1' => '1º semestre, 1º Ciclo, ADS, 2012','turma2' => '1º semestre, 2º Ciclo, ADS, 2012', 'turma3' => '1º semestre, 3º Ciclo, ADS, 2012');
echo form_dropdown('Turma', $turma, array("class" => "form-control"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
echo "</div>";
echo "</div>";




?>

<?php
echo form_fieldset("<h1>Relatório de Eventos</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('email/send', $atributos);
echo "<div class='form-group'>";
echo form_label("Data Inicial", "turma", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-3'>";
echo form_input(array('name' => 'dataInicial', 'id' => 'dataInicial','class' => 'form-control', "maxlength" => "8", "placeholder" => "__/__/____"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Data Final", "turma", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-3'>";
echo form_input(array('name' => 'dataInicial', 'id' => 'dataInicial','class' => 'form-control', "maxlength" => "8", "placeholder" => "__/__/____"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
echo "</div>";
echo "</div>";

?>
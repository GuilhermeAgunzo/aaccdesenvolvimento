<?php
echo form_fieldset("<h1>Pesquisa de Avisos</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('aviso/pesquisarAviso', $atributos);

echo "<div class='form-group'>";
echo form_label("Data Inicial do Aviso", "dt_inicio", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-4'>";
echo form_input(array("name" => "dt_inicio", "value" => set_value("dt_inicio",""),"required" => "required","type" => "text", "id" => "dtInicialAviso" ,"class" => "form-control datepicker", "maxlength" => "10"));
echo form_error("dt_inicio");
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Data Final do Aviso", "dt_vencimento", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-4'>";
echo form_input(array("name" => "dt_vencimento","required" => "required","type" => "date", "id" => "dt_vencimento" ,"class" => "form-control", "maxlength" => "10"));
echo form_error("dt_vencimento");
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Pesquisar", "type" => "submit"));
echo "</div>";
echo "</div>";

echo form_close();
?>


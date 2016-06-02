<?php
echo "</br>";
echo form_fieldset("<h1>Alteração de Avisos</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('aviso/salvarAlterarAviso', $atributos);

echo form_hidden('id_aviso', $aviso['id_aviso']);

echo "<div class='row'>";
echo form_label("Título", "nm_aviso", array("class" => "col-sm-2 control-label"));
echo "<div class='form-group col-sm-6'>";
echo form_input(array("name" => "nm_aviso", "value" => set_value("nm_aviso",$aviso['nm_aviso']), "required" => "required", "id" => "nm_aviso" ,"class" => "form-control", "maxlength" => "100"));
echo form_error("nm_aviso");
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo form_label("Descrição", "ds_aviso", array("class" => "col-sm-2 control-label"));
echo "<div class='form-group col-sm-6'>";
echo form_textarea(array('name' => 'ds_aviso', "value" => set_value("ds_aviso",$aviso['ds_aviso']), "required" => "required", 'id' => 'ds_aviso','class' => 'form-control', 'rows' => 5, "maxlength" => "500"));
echo form_error("ds_aviso");
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo form_label("Data Inicial", "dt_inicio", array("class" => "col-sm-2 control-label"));
echo "<div class='form-group col-sm-2'>";
echo form_input(array("name" => "dt_inicio", "value" => set_value("dt_inicio",$aviso['dt_inicial_aviso']),"required" => "required","type" => "text", "id" => "dtInicialAviso" ,"class" => "form-control datepicker", "maxlength" => "10"));
echo form_error("dt_inicio");
echo "</div>";
echo form_label("Data de Vencimento", "dt_vencimento", array("class" => "col-sm-2 control-label"));
echo "<div class='form-group col-sm-2'>";
echo form_input(array("name" => "dt_vencimento", "value" => set_value("dt_vencimento",$aviso['dt_vencimento_aviso']),"required" => "required","type" => "text", "id" => "dtFinalAviso" ,"class" => "form-control datepicker", "maxlength" => "10"));
echo form_error("dt_vencimento");
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default" , "content" => "Alterar", "type" => "submit"));
echo "</div>";
echo "</div>";
echo "</div>";

echo form_close();
?>



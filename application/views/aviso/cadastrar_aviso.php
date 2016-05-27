<?php
echo "</br>";
echo form_fieldset("<h1>Cadastro de Aviso</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('aviso/cadastrarAviso', $atributos);
echo "<div class='form-group'>";
echo form_label("Título", "nm_aviso", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-10'>";
echo form_input(array("name" => "nm_aviso", "value" => set_value("nm_aviso",""), "required" => "required", "id" => "nm_aviso" ,"class" => "form-control", "maxlength" => "100"));
echo form_error("nm_aviso");
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Descrição", "ds_aviso", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-10'>";
echo form_textarea(array('name' => 'ds_aviso', "value" => set_value("ds_aviso",""), "required" => "required", 'id' => 'ds_aviso','class' => 'form-control', 'rows' => 5, "maxlength" => "500"));
echo form_error("ds_aviso");
echo "</div>";
echo "</div>";

echo "<div class='row'>";

echo "<div class='form-group'>";

echo form_label("Data Inicial", "dt_inicio", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-3'>";
echo form_input(array("name" => "dt_inicio", "value" => set_value("dt_inicio",""),"required" => "required","type" => "text", "id" => "dtInicialAviso" ,"class" => "form-control datepicker", "maxlength" => "10"));
echo form_error("dt_inicio");
echo "</div>";



echo form_label("Data de Vencimento", "dt_vencimento", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-3'>";
echo form_input(array("name" => "dt_vencimento", "value" => set_value("dt_vencimento",""),"required" => "required","type" => "text", "id" => "dtFinalAviso" ,"class" => "form-control datepicker", "maxlength" => "10"));
echo form_error("dt_vencimento");
echo "</div>";
echo "</div>";

echo "</div>";




echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default" , "content" => "Salvar", "type" => "submit"));
echo "</div>";
echo "</div>";

echo form_close();
?>



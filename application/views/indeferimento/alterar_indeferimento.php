<?php
echo form_fieldset("<h1>Alteração do Motivo de Indeferimento</h1>");


$atributos = array('class' => 'form-horizontal');
echo form_open('Indeferimento/alteraIndeferimento', $atributos);

echo "<div class='form-group'>";
echo form_label("Selecione o Motivo do Indeferimento:", "motivoInd", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-10'>";
$motivos = array('' =>  "Selecione")+$motivos;
echo form_dropdown('Motivo', $motivos, "", array("class" => "form-control", "required" => "required"));

echo "</br>";
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Motivo do Indeferimento", "motivoInd", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "motivoInd" , "required" => "required", "id" => "motivoInd" ,"class" => "form-control", "maxlength" => "80"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Alterar", "type" => "submit"));
echo "</div>";
echo "</div>";
echo "<br/>";echo "<br/>";

echo form_close();
?>

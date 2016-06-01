<?php
echo form_fieldset("<h1>Alteração do Motivo de Indeferimento</h1>");


$atributos = array('class' => 'form-horizontal');
if($this->session->flashdata("success"))
    echo "<p class='alert alert-success'>". $this->session->flashdata("success") ."</p>";
if($this->session->flashdata("danger"))
    echo "<p class='alert alert-danger'>". $this->session->flashdata("danger") ."</p>";

echo form_open('Indeferimento/alteraIndeferimento', $atributos);

echo "<div class='form-group'>";
echo form_label("Selecione o Motivo do Indeferimento:", "motivoInd", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
$motivos = array('' =>  "Selecione")+$motivos;
echo form_dropdown('Motivo', $motivos, "", array("class" => "form-control", "required" => "required"));
echo form_error("Motivo");
echo "</br>";
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Motivo do Indeferimento", "motivoInd", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "motivoInd" , "required" => "required", "id" => "motivoInd" ,"class" => "form-control", "maxlength" => "80"));
echo form_error("motivoInd");
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

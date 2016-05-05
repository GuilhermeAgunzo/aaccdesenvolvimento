<?php
echo form_fieldset("<h1>Alteração de Avisos</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('email/send', $atributos);

echo "<div class='form-group'>";
echo form_label("Título", "titulo_aviso", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-10'>";
echo form_input(array("name" => "titulo_aviso", "id" => "titulo_aviso" ,"class" => "form-control", "maxlength" => "80"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Pesquisar", "type" => "submit"));
echo "</div>";
echo "</div>";
echo "</br>";

echo "<div class='form-group'>";
echo form_label("Título", "titulo_aviso", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-10'>";
echo form_input(array("name" => "titulo_aviso", "id" => "titulo_aviso" ,"class" => "form-control", "maxlength" => "80"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Descrição", "descricaoAviso", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-10'>";
echo form_textarea(array('name' => 'descricaoAviso', 'id' => 'descricaoAviso','class' => 'form-control', 'rows' => 3));
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Alterar", "type" => "submit"));
echo "</div>";
echo "</div>";

echo form_close();
?>


<?php
echo form_fieldset("<h1>Pesquisa de Avisos</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('email/send', $atributos);
echo "<div class='form-group'>";
echo form_label("Título", "titulo_aviso", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-10'>";
$nmAviso = array('Nome do Aviso' => 'Selecione o Aviso','aviso1' => 'Aviso 1','aviso2' => 'Aviso 2');
echo form_dropdown('NomedoAviso', $nmAviso, array("class" => "form-control"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Pesquisar", "type" => "submit"));
echo "</div>";
echo "</div>";


echo form_close();
?>


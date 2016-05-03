<?php
echo "</br>";
echo form_fieldset("<h1>Pesquisa de Evento</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('email/send', $atributos);
echo "<div class='form-group'>";
echo form_label("Título do Evento", "tituloDoEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-8'>";
echo form_input(array("name" => "nmEvento", "id" => "nmEvento" ,"class" => "form-control", "maxlength" => "100"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Pesquisar", "type" => "submit"));
echo "</div>";
echo "</div>";
echo form_close();

?>


<?php
echo form_fieldset("<h1>Cadastro de Evento</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('email/send', $atributos);
echo "<div class='form-group'>";
echo form_label("Título do Evento", "tituloDoEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-8'>";
echo form_input(array("name" => "nmEvento","required" => "required", "id" => "nmEvento" ,"class" => "form-control", "maxlength" => "100"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Local do Evento", "localDoEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "nmLocalEvento","required" => "required", "id" => "nmLocalEvento" ,"class" => "form-control", "maxlength" => "80"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Data do Evento", "dataDoEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-3'>";
echo form_input(array("name" => "dtEvento","required" => "required", "id" => "dtEvento" ,"class" => "form-control", "maxlength" => "10"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Hora do Evento", "horaDoEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-3'>";
echo form_input(array("name" => "hrEvento","required" => "required", "id" => "hrEvento" ,"class" => "form-control", "maxlength" => "10"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Duração do Evento", "duracaoDoEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-3'>";
echo form_input(array("name" => "qtHorasEvento", "required" => "required", "id" => "qtHorasEvento" ,"class" => "form-control", "maxlength" => "12"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Descrição", "descricaoEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-10'>";
echo form_textarea(array('name' => 'dsEvento',"required" => "required", 'id' => 'dsEvento','class' => 'form-control', 'rows' => 5, "maxlength" => "500"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Responsável do Evento", "responsavelDoEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-8'>";
echo form_input(array("name" => "nmResponsavelEvento","required" => "required", "id" => "nmResponsavelEvento" ,"class" => "form-control", "maxlength" => "100"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
echo "</div>";
echo "</div>";
echo form_close();

?>


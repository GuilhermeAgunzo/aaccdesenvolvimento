<?php
echo form_fieldset("<h1>Cadastro de Evento</h1>");


$atributos = array('class' => 'form-horizontal');
echo form_open('Evento/cadastroEvento', $atributos);

echo "<div class='form-group'>";
echo form_label("Selecione o Tipo de Atividade:", "atividade", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
$atividades = array('' =>  "Selecione")+$atividades;
echo form_dropdown('Atividade', $atividades, "", array("class" => "form-control", "required" => "required"));
echo "</br>";
echo "</div>";
echo "</div>";


echo "<div class='row'>";
echo form_label("Título do Evento", "tituloDoEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='form-group col-sm-4'>";
echo form_input(array("name" => "nmEvento","required" => "required", "id" => "nmEvento" ,"class" => "form-control", "maxlength" => "100"));
echo form_error("nmEvento");
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo form_label("Local do Evento", "localDoEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='form-group col-sm-4'>";
echo form_input(array("name" => "nmLocalEvento","required" => "required", "id" => "nmLocalEvento" ,"class" => "form-control", "maxlength" => "80"));
echo form_error("nmLocalEvento");
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo form_label("Data do Evento", "dataDoEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='form-group col-sm-2'>";
echo form_input(array("name" => "dtEvento","required" => "required","type" => "text", "id" => "dtEvento" ,"class" => "form-control datepicker", "maxlength" => "10", "placeholder" => "dd/mm/aaaa"));
echo form_error("dtEvento");
echo "</div>";
echo form_label("Data Final do Evento", "dataFinalDoEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='form-group col-sm-2'>";
echo form_input(array("name" => "dtFinalEvento","required" => "required","type" => "text", "id" => "dtFinalEvento" ,"class" => "form-control datepicker", "maxlength" => "10", "placeholder" => "dd/mm/aaaa"));
echo form_error("dtFinalEvento");
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo form_label("Hora do Evento", "horaDoEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='form-group col-sm-1'>";
echo form_input(array("name" => "hrEvento","required" => "required","type" => "time", "id" => "hrEvento" ,"class" => "form-control", "maxlength" => "10"));
echo form_error("hrEvento");
echo "</div>";
echo form_label("Duração do Evento (em horas)", "duracaoDoEvento", array("class" => "col-sm-3 control-label"));
echo "<div class='form-group col-sm-1'>";
echo form_input(array("name" => "qtHorasEvento","required" => "required","type" => "number", "id" => "qtHorasEvento" ,"class" => "form-control", "maxlength" => "3", "min" => "1", "max" => "999"));
echo form_error("qtHorasEvento");
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo form_label("Descrição", "descricaoEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='form-group col-sm-6'>";
echo form_textarea(array('name' => 'dsEvento',"required" => "required", 'id' => 'dsEvento','class' => 'form-control', 'rows' => 5, "maxlength" => "500"));
echo form_error("dsEvento");
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo form_label("Responsável do Evento", "responsavelDoEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='form-group col-sm-3'>";
echo form_input(array("name" => "nmResponsavelEvento","required" => "required", "id" => "nmResponsavelEvento" ,"class" => "form-control", "maxlength" => "100"));
echo form_error("nmResponsavelEvento");
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
echo "</div>";
echo "</div>";
echo "</div>";
echo form_close();

?>


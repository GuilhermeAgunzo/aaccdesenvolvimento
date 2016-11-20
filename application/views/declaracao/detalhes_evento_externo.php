<?php
echo "<div class='form-group col-sm-6'>";
echo form_label("Data do Evento", "data", array("class" => "col-sm-4 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "data", "id" => "data" ,"class" => "form-control"));
echo "</div>";
echo "</div>";

echo "<div class='form-group col-sm-6'>";
echo form_label("Hora do Evento", "hora", array("class" => "col-sm-4 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "hora", "id" => "hora", "type" => "time" ,"class" => "form-control"));
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo form_label("Local do Evento", "local", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-8'>";
echo form_input(array("name" => "local", "id" => "local" ,"class" => "form-control"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Nome do Evento", "nome", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-8'>";
echo form_input(array("name" => "nome", "id" => "nome" ,"class" => "form-control"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Descrição do Evento", "nome", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-10'>";
echo form_input(array("name" => "nome", "id" => "nome" ,"class" => "form-control"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Quantidade horas do Evento", "qtdHoras", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-4'>";
echo form_input(array("name" => "qtdHoras", "id" => "qtdHoras" ,"class" => "form-control"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label('Resumo do Evento','resumo', array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-8'>";
echo form_textarea(array('name' => 'resumo', 'class' => 'form-control', 'id' => 'resumo', 'row' => 2, ));
echo "</div>";
echo "</div>";

echo "</div>";

<?php
echo "<div class='form-group col-sm-6'>";
echo form_label("Data do Evento", "data", array("class" => "col-sm-4 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "data", "id" => "data", "value" => $declaracao['dt_evento_externo'] ,"class" => "form-control", "Disabled" => "Disabled"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Local do Evento", "local", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-8'>";
echo form_input(array("name" => "local", "id" => "local", "value" => $declaracao['local_evento_externo']  ,"class" => "form-control","Disabled" => "Disabled"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Nome do Evento", "nome", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-8'>";
echo form_input(array("name" => "nome", "id" => "nome" , "value" => $declaracao['nm_evento_externo'] ,"class" => "form-control", "Disabled" => "Disabled"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Descrição do Evento", "nome", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-10'>";
echo form_input(array("name" => "nome", "id" => "nome" , "value" => $declaracao['ds_evento_externo'] ,"class" => "form-control", "Disabled" => "Disabled"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Quantidade horas do Evento", "qtdHoras", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-4'>";
echo form_input(array("name" => "qtdHoras", "id" => "qtdHoras" , "value" => $declaracao['qt_horas_atividade'] ,"class" => "form-control", "Disabled" => "Disabled"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label('Resumo do Evento','resumo', array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-8'>";
echo form_textarea(array('name' => 'resumo', 'class' => 'form-control', 'id' => 'resumo', "value" => $declaracao['resumo_atividade'] , 'row' => 2, "Disabled" => "Disabled" ));
echo "</div>";
echo "</div>";

echo "</div>";

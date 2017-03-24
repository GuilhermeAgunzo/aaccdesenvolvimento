<?php

echo "<div class='form-group'>";
echo form_label("Titulo do Evento", "titulo", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-10'>";
echo form_input(array("name" => "titulo", "id" => "titulo" ,"class" => "form-control", "Disabled" => "Disabled", "value" => set_value("titulo", $evento['nm_evento'])));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Hora do Evento", "hora", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-4'>";
echo form_input(array("name" => "hora", "id" => "hora", "type" => "time" ,"class" => "form-control","Disabled" => "Disabled","value" => set_value("titulo", $evento['hr_evento'])));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Descrição do Evento", "desc", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-8'>";
echo form_input(array("name" => "desc", "id" => "desc" ,"class" => "form-control","Disabled" => "Disabled", "value" => set_value("desc", $evento['ds_evento'])));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Responsavel pelo Evento", "responsavel", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-8'>";
echo form_input(array("name" => "responsavel", "id" => "titulo" ,"class" => "form-control","Disabled" => "Disabled", "value" => set_value("responsavel", $evento['nm_responsavel_evento'])));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Duração do Evento", "duracao", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-4'>";
echo form_input(array("name" => "duracao", "id" => "duracao" ,"class" => "form-control","Disabled" => "Disabled",  "value" => set_value("duracao", $evento['qt_horas_evento'])));
echo "</div>";
echo "</div>";
echo "</div>";


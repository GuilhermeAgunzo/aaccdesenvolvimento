<?php
echo form_fieldset("<h1>Cadastro de Tipo de Atividade</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('TipoAtividade/cadastrarTipoAtividade', $atributos);

echo "<div class='form-group'>";
echo form_label("Nome do tipo de Atividade", "txt_nm_tipo_atividade", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array('name' => 'txt_nm_tipo_atividade', "value" => set_value("txt_nm_tipo_atividade",""), 'id' => 'txt_nm_tipo_atividade','class' => 'form-control', "maxlength" => "100"));
echo form_error("txt_nm_tipo_atividade");
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Quantidade estimada de horas", "qtEstimadaHoras", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array('name' => 'qtEstimadaHoras', "value" => set_value("qtEstimadaHoras",""), 'id' => 'qtEstimadaHoras','class' => 'form-control', "maxlength" => "3"));
echo form_error("qtEstimadaHoras");
echo "</div>";
echo "</div>";


echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-6'>";
echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
echo "</div>";
echo "</div>";

echo form_close();

?>

<?php
echo form_fieldset("<h1>Alteração de Tipo de Atividade</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('TipoAtividade/salvarAlterarTipoAtividade', $atributos);

echo form_hidden('txt_id_tipo_atividade', $tipoAtividade['id_tipo_atividade']);

echo "<div class='form-group'>";
echo form_label("Nome do tipo de Atividade", "txt_nm_tipo_atividade", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-10'>";
echo form_input(array('name' => 'txt_nm_tipo_atividade', "value" => set_value("txt_nm_tipo_atividade", $tipoAtividade['nm_tipo_atividade']), 'id' => 'txt_nm_tipo_atividade','class' => 'form-control', "maxlength" => "100"));
echo form_error("txt_nm_tipo_atividade");
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Quantidade estimada de horas", "qtEstimadaHoras", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-10'>";
echo form_input(array('name' => 'qtEstimadaHoras', "value" => set_value("qtEstimadaHoras", $tipoAtividade['qt_estimada_horas_atividade']), 'id' => 'qtEstimadaHoras','class' => 'form-control', "maxlength" => "3"));
echo form_error("qtEstimadaHoras");
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Alterar", "type" => "submit"));
echo "        ";
echo anchor("temporario/administrador","Cancelar", array("class" => "btn btn-default"));
echo "</div>";
echo "</div>";

echo form_close();

?>

<?php
echo form_fieldset("<h1>Pesquisa do Motivo de Indeferimento</h1>");



$atributos = array('class' => 'form-horizontal');
echo form_open('email/send', $atributos);
echo "<div class='form-group'>";
echo form_label("Motivo do Indeferimento", "motivoInd", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-10'>";
$nmMotivoIndeferimento = array('Motivo do Indeferimento' => 'Selecione o Motivo','motivo1' => 'Motivo 1','motivo2' => 'Motivo 2');
echo form_dropdown('MotivoIndeferimento', $nmMotivoIndeferimento, array("class" => "form-control"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Pesquisar", "type" => "submit"));
echo "</div>";
echo "</div>";

echo form_close();
?>

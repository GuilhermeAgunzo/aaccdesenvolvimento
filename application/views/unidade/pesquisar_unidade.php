<?php
echo form_fieldset("<h1>Pesquisa de Unidade</h1>");


$atributos = array('class' => 'form-horizontal');
echo form_open('unidade/pesquisarUnidade', $atributos);
echo "<div class='form-group'>";
echo form_label("Código da Unidade", "cd_cpsouza", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "cd_cpsouza", "id" => "cd_cpsouza" ,"class" => "form-control", "maxlength" => "80"));
echo "</div>";
echo "</div>";
echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
echo "</div>";
echo "</div>";

echo form_close();

if(isset($unidade)){
    echo "<pre>";
    print_r($unidade);
    echo "</pre>";
}

?>
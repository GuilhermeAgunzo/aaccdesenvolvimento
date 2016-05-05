<?php
echo form_fieldset("<h1>Cadastro de Tipo de Atividade</h1>");

    $atributos = array('class' => 'form-horizontal');
    echo form_open('', $atributos);
    echo "<div class='form-group'>";
    echo form_label("Código", "codigo_tipo_atividade", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-4'>";
    $codAtividade = array('-','001','002','003', '004');
    echo form_dropdown('codigo_tipo_atividade', $codAtividade, array("class" => "form-control"));
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo form_label("Descrição", "descricaoAviso", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-10'>";
    echo form_textarea(array('name' => 'descricaoAviso', 'id' => 'descricaoAviso','class' => 'form-control', 'rows' => 3));
    echo "</div>";
    echo "</div>";


    echo "<div class='form-group'>";
    echo "<div class='col-sm-offset-2 col-sm-10'>";
    echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
    echo "</div>";
    echo "</div>";

    echo form_close();

?>

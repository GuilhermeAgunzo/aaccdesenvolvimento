<?php

    $atributos = array('class' => 'form-horizontal');
    echo form_open('professor/cadastroProfessor', $atributos);

    echo "<div class='row'>";
    echo form_label("Unidade", "unidade", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-3'>";
    echo form_dropdown('Unidade', $unidades, "", array("class" => "form-control"));
    echo form_error("Unidade");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Nome Completo", "nomeCompleto", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-3'>";
    echo form_input(array("name" => "nome","required" => "required","value" => set_value("nome", ""), "id" => "nomeCompleto" ,"class" => "form-control", "maxlength" => "70"));
    echo "</div>";
    echo form_label("Email", "email", array("class" => "col-md-1 control-label"));
    echo "<div class='form-group col-md-3'>";
    echo form_input(array("name" => "email", "required" => "required","value" => set_value("email", ""),"type" => "email", "id" => "email" ,"class" => "form-control", "maxlength" => "70"));
    echo form_error("email");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Telefone Residencial", "telefone", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-2'>";
    echo form_input(array("name" => "telefone", "id" => "tel" ,"value" => set_value("telefone", ""),"class" => "form-control phone-mask", "maxlength" => "15"));
    echo "</div>";
    echo form_label("Data de entrada", "data_entrada", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-2'>";
    echo form_input(array("name" => "data_entrada", "type" => "text", "id" => "data_entrada" ,"value" => set_value("data_entrada", ""),"class" => "form-control datepicker", "maxlength" => "10", "placeholder"=>"dd/mm/yyyy"));
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Telefone Celular", "celular", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-2'>";
    echo form_input(array("name" => "celular", "id" => "celular","value" => set_value("celular", ""), "class" => "form-control phone-mask", "maxlength" => "15"));
    echo "</div>";
    echo form_label("Data de saída", "data_saida", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-2'>";
    echo form_input(array("name" => "data_saida", "type" => "text", "id" => "data_saida", "value" => set_value("data_saida", ""),"class" => "form-control datepicker", "maxlength" => "10", "placeholder"=>"dd/mm/yyyy"));
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo "<div class='form-group'>";
    echo "<div class='col-md-offset-2 col-md-10'>";
    echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
    echo "</div>";
    echo "</div>";
    echo "</div>";

    echo form_close();
?>
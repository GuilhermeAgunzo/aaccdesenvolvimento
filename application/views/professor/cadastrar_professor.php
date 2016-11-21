<?php
echo form_fieldset("<h1>Cadastro de Professor</h1>");

    $atributos = array('class' => 'form-horizontal');
    echo form_open('professor/cadastroProfessor', $atributos);

    echo "<div class='row'>";
    echo form_label("Unidade", "unidade", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-3'>";
    $unidades = array('' =>  "Selecione")+$unidades;
    echo form_dropdown('Unidade', $unidades, set_value("Unidade", ""), array("class" => "form-control", 'onchange' => 'busca_cursos($(this).val())'));
    echo form_error("Unidade");
    echo "</div>";
    echo form_label("Curso", "curso", array("class" => "col-md-1 control-label"));
    echo "<div class='form-group col-md-3'>";
    echo "<select name='cursos' id='cursos' class='form-control' required='required' onchange='busca_turmas($(this).val())'></select>";
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Nome Completo", "nomeCompleto", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-3'>";
    echo form_input(array("name" => "nome","value" => set_value("nome", ""), "id" => "nomeCompleto" ,"class" => "form-control", "maxlength" => "70"));
    echo form_error("nome");
    echo "</div>";
    echo form_label("Email", "email", array("class" => "col-md-1 control-label"));
    echo "<div class='form-group col-md-3'>";
    echo form_input(array("name" => "email","value" => set_value("email", ""),"type" => "email", "id" => "email" ,"class" => "form-control", "maxlength" => "70"));
    echo form_error("email");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Telefone Residencial", "telefone", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-2'>";
    echo form_input(array("name" => "telefone", "id" => "tel" ,"value" => set_value("telefone", ""),"class" => "form-control phone-mask", "pattern" => ".{10}|.{11,}", "required title" => "O número de telefone deve conter entre 10 e 11 digitos","maxlength" => "15"));
    echo "</div>";
    echo form_label("Data de entrada", "data_entrada", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-2'>";
    echo form_input(array("name" => "data_entrada", "type" => "text", "id" => "data_entrada" ,"value" => set_value("data_entrada", ""),"class" => "form-control datepicker", "maxlength" => "10", "placeholder"=>"dd/mm/yyyy"));
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Telefone Celular", "celular", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-2'>";
    echo form_input(array("name" => "celular", "id" => "celular","value" => set_value("celular", ""), "class" => "form-control phone-mask", "pattern" => ".{10}|.{11,}", "required title" => "O número de celular deve conter entre 10 e 11 digitos" ,"maxlength" => "15"));
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
    echo "        ";
    echo anchor("temporario/administrador","Cancelar", array("class" => "btn btn-default"));
    echo "</div>";
    echo "</div>";
    echo "</div>";

    echo form_close();
?>
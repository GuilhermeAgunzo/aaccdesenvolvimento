<?php
    echo form_fieldset("<h1>Alteração de Professor</h1>");

    if($this->session->flashdata("alterado")){
        echo "<p class='alert alert-success'>" .$this->session->flashdata("alterado"). "</p>";
    }
    if($this->session->flashdata("naoAlterado")){
        echo "<p class='alert alert-danger'>" .$this->session->flashdata("naoAlterado"). "</p>";
    }

    $atributos = array('class' => 'form-horizontal');
    echo form_open('professor/buscaAlteraProfessor', $atributos);
    echo "<div class='form-group'>";
    echo form_label("Código de Professor", "cd_professor", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-2'>";
    if(!isset($professor)){
        echo form_input(array("name" => "cd_professor", "required" => "required","id" => "cd_professor" ,"class" => "form-control", "maxlength" => "10"));
    }else{
        echo form_input(array("name" => "cd_professor", "required" => "required","id" => "cd_professor" ,"value" => $professor["id_professor"],"class" => "form-control", "maxlength" => "10"));
    }
    echo "</div>";
    echo "<div class='col-sm-2'>";
    echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
    echo "</div>";
    echo "<div class='col-sm-4'>";
    echo "</div>";
    echo "</div>";

    echo form_close();

    if(isset($professor)){
        echo form_open("professor/alteraProfessor",$atributos);
        echo form_input(array("name" => "cd_professor","id" => "cd_professor","type" => "hidden","value" => $professor["id_professor"]));
        echo "</br> </br>";

        echo "<div class='form-group'>";
        echo form_label("Unidade", "unidade", array("class" => "col-sm-2 control-label"));
        echo "<div class='col-sm-3'>";
        echo form_dropdown('Unidade', $unidades,$professor['id_unidade'], array("class" => "form-control"));
        echo "</div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo form_label("Nome Completo", "nomeCompleto", array("class" => "col-sm-2 control-label"));
        echo "<div class='col-sm-3'>";
        echo form_input(array("name" => "nome","required" => "required", "id" => "nomeCompleto" ,"class" => "form-control", "maxlength" => "70", "value" => $professor["nm_professor"]));
        echo "</div>";
        echo form_label("Email", "email", array("class" => "col-sm-1 control-label"));
        echo "<div class='col-sm-3'>";
        echo form_input(array("name" => "email","required" => "required","type" => "email", "id" => "email" ,"class" => "form-control", "maxlength" => "70", "value" => $professor["nm_email"]));
        echo "</div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo form_label("Telefone Residencial", "tel", array("class" => "col-sm-2 control-label"));
        echo "<div class='col-sm-2'>";
        echo form_input(array("name" => "telefone", "id" => "tel" ,"class" => "form-control phone-mask", "maxlength" => "15", "value" => $professor["cd_tel_residencial"]));
        echo "</div>";
        echo form_label("Data de entrada", "data_entrada", array("class" => "col-sm-2 control-label"));
        echo "<div class='col-sm-2'>";
        echo form_input(array("name" => "data_entrada", "type" => "text", "id" => "data_entrada" ,"class" => "form-control datepicker", "maxlength" => "10", "placeholder"=>"dd/mm/yyyy", "value" => dataMysqlParaPtBr($professor["dt_entrada"]) ));
        echo "</div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo form_label("Telefone Celular", "celular", array("class" => "col-sm-2 control-label"));
        echo "<div class='col-sm-2'>";
        echo form_input(array("name" => "celular", "id" => "celular" ,"class" => "form-control phone-mask", "maxlength" => "15", "value" => $professor["cd_tel_celular"]));
        echo "</div>";
        echo form_label("Data de saída", "data_saida", array("class" => "col-sm-2 control-label"));
        echo "<div class='col-sm-2'>";
        echo form_input(array("name" => "data_saida", "type" => "text", "id" => "data_saida" ,"class" => "form-control datepicker", "maxlength" => "10", "placeholder"=>"dd/mm/yyyy", "value" => dataMysqlParaPtBr($professor["dt_saida"]) ));
        echo "</div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "<div class='col-sm-offset-2 col-sm-10'>";
        echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
        echo "</div>";
        echo "</div>";

        echo form_close();
    }
?>


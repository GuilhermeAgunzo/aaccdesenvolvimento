<?php

    echo form_fieldset("<h1>Desativação de Professor</h1>");
    if($this->session->flashdata("desativou")){
        echo "<p class='alert alert-success'>" .$this->session->flashdata("desativou"). "</p>";
    }
    if($this->session->flashdata("naoDesativou")){
        echo "<p class='alert alert-danger'>" .$this->session->flashdata("naoDesativou"). "</p>";
    }

    $atributos = array('class' => 'form-horizontal');
    echo form_open('professor/buscaDesativaProfessor', $atributos);
    echo "<div class='form-group'>";
    echo form_label("Código de Professor", "cd_professor", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-2'>";
    echo form_input(array("name" => "cd_professor", "id" => "cd_professor" ,"class" => "form-control", "maxlength" => "80","value" => set_value("cd_professor", "")));
    echo "</div>";
    echo "<div class='col-sm-2'>";
    echo form_button(array("class" => "btn btn-default", "content" => "Buscar", "type" => "submit"));
    echo "</div>";
    echo "</div>";
    echo form_close();

    if(isset($professor)){
    echo form_open("professor/desativaProfessor", $atributos);
    echo form_input(array("name" => "cd_professor", "id" => "cd_professor", "type" => "hidden", "value" => $professor["id_professor"]));
    echo "</br></br>";
    echo "<div class='form-group'>";
    echo form_label("Unidade", "unidade", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-3'>";
    $unidade = array('unidade' => 'Selecione','unidade1' => 'Fatec Praia Grande','unidade2' => 'Fatec Santos');
    echo form_dropdown('Unidade', $unidades, $professor['id_unidade'] , array("class" => "form-control"));
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo form_label("Nome Completo", "nomeCompleto", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-3'>";
    echo form_input(array("name" => "nome", "id" => "nomeCompleto" ,"class" => "form-control", "maxlength" => "70", "value" => $professor["nm_professor"]));
    echo "</div>";
    echo form_label("Telefone Residencial", "telefone", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-2'>";
    echo form_input(array("name" => "telefone", "id" => "telefone" ,"class" => "form-control", "maxlength" => "15", "value" => $professor["cd_tel_residencial"]));
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo form_label("Email", "email", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-3'>";
    echo form_input(array("name" => "email", "id" => "email" ,"class" => "form-control", "maxlength" => "70", "value" => $professor["nm_email"]));
    echo "</div>";
    echo form_label("Telefone Celular", "celular", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-2'>";
    echo form_input(array("name" => "celular", "id" => "celular" ,"class" => "form-control", "maxlength" => "15", "value" => $professor["cd_tel_celular"]));
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo "<div class='col-sm-offset-2 col-sm-10'>";
    echo form_button(array("class" => "btn btn-danger", "content" => "Desativar", "type" => "submit"));

    echo "</div>";
    echo "</div>";

    echo form_close();
    }
    ?>


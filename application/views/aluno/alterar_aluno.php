<?php

    echo form_fieldset("<h1>Alteração de Aluno</h1>");

    $atributos = array('class' => 'form-horizontal');
    echo form_open('aluno/buscarAlteraAluno', $atributos);
    echo "<div class='form-group'>";
    echo form_label("Número de matrícula", "matricula", array("class" => "col-sm-2 control-label"));
    echo "<div class='col-sm-6'>";
    echo form_input(array("name" => "matricula", "value" => set_value("matricula",""),"required" => "required", "id" => "matricula" ,"class" => "form-control", "maxlength" => "13", "minlength" => "13", "min" => "0"));
    echo form_error("matricula");
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo "<div class='col-sm-offset-2 col-sm-10'>";
    echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
    echo "</div>";
    echo "</div>";

    echo "</br>"."</br>";

    echo form_close();

    if(isset($aluno)) {

        echo form_open("aluno/alteraraluno",$atributos);

        if(isset($id_aluno)){
            echo form_hidden('id_aluno', $id_aluno);
        }

        echo "<div class='form-group'>";
        echo form_label("Número de matrícula", "matricula", array("class" => "col-sm-2 control-label"));
        echo "<div class='col-sm-6'>";
        echo form_input(array("name" => "matricula", "value" => set_value("matricula",$aluno['cd_mat_aluno']),"required" => "required", "id" => "matricula" ,"class" => "form-control", "maxlength" => "13", "minlength" => "13", "min" => "0"));
        echo form_error("matricula");
        echo "</div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo form_label("Nome Completo", "nomeCompleto", array("class" => "col-sm-2 control-label"));
        echo "<div class='col-sm-8'>";
        echo form_input(array("name" => "nome", "value" => set_value("nome",$aluno['nm_aluno']), "required" => "required", "id" => "nomeCompleto", "class" => "form-control", "maxlength" => "100"));
        echo form_error("nome");
        echo "</div>";
        echo "</div>";


        echo "<div class='form-group'>";
        echo form_label("Turma", "turma", array("class" => "col-sm-2 control-label"));
        echo "<div class='col-sm-10'>";
        echo form_dropdown('turma', $dropDownTurma, set_value("turma",$aluno['id_turma']), array("class" => "form-control"));
        echo form_error("turma");
        echo "</div>";
        echo "</div>";


        echo "<div class='form-group'>";
        echo form_label("Email", "email", array("class" => "col-sm-2 control-label"));
        echo "<div class='col-sm-8'>";
        echo form_input(array("name" => "email", "value" => set_value("email",$aluno['nm_email']), "required" => "required", "type" => "email", "id" => "email", "class" => "form-control", "maxlength" => "70"));
        echo form_error("email");
        echo "</div>";
        echo "</div>";


        echo "<div class='form-group'>";
        echo form_label("Telefone Residencial", "telefone", array("class" => "col-sm-2 control-label"));
        echo "<div class='col-sm-6'>";
        echo form_input(array("name" => "telefone", "value" => set_value("telefone",$aluno['cd_tel_residencial']), "id" => "telefone", "class" => "form-control phone-mask", "maxlength" => "20"));
        echo form_error("telefone");
        echo "</div>";
        echo "</div>";


        echo "<div class='form-group'>";
        echo form_label("Telefone Celular", "celular", array("class" => "col-sm-2 control-label"));
        echo "<div class='col-sm-6'>";
        echo form_input(array("name" => "celular", "value" => set_value("celular",$aluno['cd_tel_celular']), "id" => "celular", "class" => "form-control phone-mask", "maxlength" => "20"));
        echo form_error("celular");
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


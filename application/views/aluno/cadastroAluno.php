<?php
	echo form_fieldset("<h1>Cadastro de Aluno</h1>");

	$atributos = array('class' => 'form-horizontal');
	echo form_open('aluno/cadastraraluno', $atributos);
	echo "<div class='form-group'>";
	echo form_label("Número de matrícula", "matricula", array("class" => "col-sm-2 control-label"));
	echo "<div class='col-sm-6'>";
	echo form_input(array("name" => "matricula", "value" => set_value("matricula",""), "required" => "required","type" => "number", "id" => "matricula" ,"class" => "form-control", "maxlength" => "80", "min" => "0"));
	echo form_error("matricula");
	echo "</div>";
	echo "</div>";


	echo "<div class='form-group'>";
	echo form_label("Nome Completo", "nomeCompleto", array("class" => "col-sm-2 control-label"));
	echo "<div class='col-sm-8'>";
	echo form_input(array("name" => "nome", "value" => set_value("nome",""),"required" => "required", "id" => "nomeCompleto" ,"class" => "form-control", "maxlength" => "100"));
	echo "</div>";
	echo "</div>";

	echo "<div class='form-group'>";
	echo form_label("Turma", "turma", array("class" => "col-sm-2 control-label"));
	echo "<div class='col-sm-10'>";
	$turma = array('turma' => 'Selecione a turma','1' => '1º semestre, 1º Ciclo, ADS, 2012','2' => '1º semestre, 2º Ciclo, ADS, 2012', '3' => '1º semestre, 3º Ciclo, ADS, 2012');
	echo form_dropdown('turma', $turma, "", array("class" => "form-control"));
	echo form_error("turma");
	echo "</div>";
	echo "</div>";

	echo "<div class='form-group'>";
	echo form_label("Email", "email", array("class" => "col-sm-2 control-label"));
	echo "<div class='col-sm-8'>";
	echo form_input(array("name" => "email", "value" => set_value("email",""), "id" => "email" ,"class" => "form-control", "maxlength" => "80"));
	echo form_error("email");
	echo "</div>";
	echo "</div>";

	echo "<div class='form-group'>";
	echo form_label("Telefone Residencial", "telefone", array("class" => "col-sm-2 control-label"));
	echo "<div class='col-sm-6'>";
	echo form_input(array("name" => "telefone", "value" => set_value("telefone",""), "id" => "telefone" ,"class" => "form-control", "maxlength" => "80"));
	echo form_error("telefone");
	echo "</div>";
	echo "</div>";

	echo "<div class='form-group'>";
	echo form_label("Telefone Celular", "celular", array("class" => "col-sm-2 control-label"));
	echo "<div class='col-sm-6'>";
	echo form_input(array("name" => "celular", "value" => set_value("celular",""), "id" => "celular" ,"class" => "form-control", "maxlength" => "80"));
	echo form_error("celular");
	echo "</div>";
	echo "</div>";

	echo "<div class='form-group'>";
	echo "<div class='col-sm-offset-2 col-sm-10'>";
	echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
	echo "</div>";
	echo "</div>";
	echo form_close();
?>


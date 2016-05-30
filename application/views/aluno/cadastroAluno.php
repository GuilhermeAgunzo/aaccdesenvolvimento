<?php
	echo form_fieldset("<h1>Cadastro de Aluno</h1>");

	echo form_open('aluno/cadastro_aluno', array('class' => 'form-horizontal', 'id' => 'unidadeform'));
	echo "<div class='row'>";
	echo form_label("Unidade", "unidade", array("class" => "col-md-2 control-label"));
	echo "<div class='form-group col-md-3'>";
	array_unshift($unidades, "Selecione");
	if (!isset($unidade)) {
		echo form_dropdown('Unidade', $unidades, "", array("class" => "form-control", 'id' => 'unidade', 'onchange' => 'autoSubimit()'));
	} else {
		echo form_dropdown('Unidade', $unidades, $unidade, array("class" => "form-control", 'id' => 'unidade', 'onchange' => 'autoSubimit()'));
	}
	echo "</div>";
	echo "<div class='col-md-1'>";
	echo "</div>";
	echo "<div class='form-group col-md-2'>";
	echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
	echo "</div>";
	echo "</div>";
	echo form_close();

	echo "<br/><br/>";
	
	if(isset($unidade)) {
		$atributos = array('class' => 'form-horizontal');
		echo form_open('aluno/cadastraraluno', $atributos);
		echo "<div class='row'>";
		echo form_label("Número de matrícula", "matricula", array("class" => "col-md-2 control-label"));
		echo "<div class='form-group col-md-2'>";
		echo form_input(array("name" => "matricula", "value" => set_value("matricula", ""), "required" => "required", "type" => "text", "id" => "matricula", "class" => "form-control", "maxlength" => "13", "minlength" => "13", "min" => "0"));
		echo form_error("matricula");
		echo "</div>";
		echo "<div class='col-md-1'>";
		echo "</div>";
		echo form_label("Turma", "turma", array("class" => "col-md-2 control-label"));
		echo "<div class='form-group col-md-3'>";
		echo form_dropdown('turma', $turmasUnidade, set_value("turma", ""), array("class" => "form-control", "required" => "required"));
		echo form_hidden("unidade", $unidade);
		echo form_error("turma");
		echo "</div>";
		echo "</div>";

		echo "<div class='row'>";
		echo form_label("Nome Completo", "nomeCompleto", array("class" => "col-md-2 control-label"));
		echo "<div class='form-group col-md-3'>";
		echo form_input(array("name" => "nome", "value" => set_value("nome", ""), "required" => "required", "id" => "nomeCompleto", "class" => "form-control", "maxlength" => "70"));
		echo "</div>";
		echo form_label("Telefone Residencial", "tel", array("class" => "col-md-2 control-label"));
		echo "<div class='form-group col-md-2'>";
		echo form_input(array("name" => "telefone", "value" => set_value("telefone", ""), "id" => "tel", "class" => "form-control phone-mask", "maxlength" => "15"));
		echo form_error("telefone");
		echo "</div>";
		echo "</div>";

		echo "<div class='row'>";
		echo form_label("Email", "email", array("class" => "col-md-2 control-label"));
		echo "<div class='form-group col-md-3'>";
		echo form_input(array("name" => "email", "value" => set_value("email", ""), "id" => "email", "class" => "form-control", "maxlength" => "70"));
		echo form_error("email");
		echo "</div>";
		echo form_label("Telefone Celular", "celular", array("class" => "col-md-2 control-label"));
		echo "<div class='form-group col-md-2'>";
		echo form_input(array("name" => "celular", "value" => set_value("celular", ""), "id" => "celular", "class" => "form-control phone-mask", "maxlength" => "15"));
		echo form_error("celular");
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
	}
?>
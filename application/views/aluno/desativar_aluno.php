<?php
echo form_fieldset("<h1>Desativação de Aluno</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('aluno/buscadesativaraluno', $atributos);
echo "<div class='row '>";
echo form_label("Número de matrícula", "matricula", array("class" => "col-md-2 control-label"));
echo "<div class='form-group col-md-3'>";
echo "<div class='input-group'>";
echo form_input(array("name" => "matricula", "value" => set_value("matricula",""),"required" => "required", "id" => "matricula" ,"class" => "form-control", "maxlength" => "13", "minlength" => "13", "min" => "0"));
echo form_error("matricula");
echo "<span class='input-group-btn'>";
echo form_button(array("class" => "btn btn-default", "content" => "Buscar", "type" => "submit"));
echo "</span>";
echo "</div>";
echo "</div>";
echo "</div>";
echo form_close();

echo "</br></br>";

if(isset($aluno)) {

    echo form_open("aluno/desativaraluno",$atributos);
    echo "<div class='row'>";
    echo form_label("Número de matrícula", "matricula", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-2'>";
    echo form_input(array("name" => "matricula", "value" => set_value("matricula",$aluno['cd_mat_aluno']),"required" => "required", "id" => "matricula" ,"class" => "form-control", "maxlength" => "13", "minlength" => "13", "min" => "0"));
    echo form_error("matricula");
    echo "</div>";
    echo "<div class='col-md-1'>";
    echo "</div>";
    echo form_label("Turma", "turma", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-3'>";
    echo form_dropdown('turma', $dropDownTurma, set_value("turma",$aluno['id_turma']), array("class" => "form-control"));
    echo form_error("turma");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Nome Completo", "nomeCompleto", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-3'>";
    echo form_input(array("name" => "nome", "value" => set_value("nome",$aluno['nm_aluno']), "required" => "required", "id" => "nomeCompleto", "class" => "form-control", "maxlength" => "70"));
    echo form_error("nome");
    echo "</div>";
    echo form_label("Telefone Residencial", "telefone", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-2'>";
    echo form_input(array("name" => "telefone", "value" => set_value("telefone",$aluno['cd_tel_residencial']), "id" => "telefone", "class" => "form-control phone-mask", "maxlength" => "15"));
    echo form_error("telefone");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Email", "email", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-3'>";
    echo form_input(array("name" => "email", "value" => set_value("email",$aluno['nm_email']), "required" => "required", "type" => "email", "id" => "email", "class" => "form-control", "maxlength" => "70"));
    echo form_error("email");
    echo "</div>";
    echo form_label("Telefone Celular", "celular", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-2'>";
    echo form_input(array("name" => "celular", "value" => set_value("celular",$aluno['cd_tel_celular']), "id" => "celular", "class" => "form-control phone-mask", "maxlength" => "150"));
    echo form_error("celular");
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo "<div class='col-md-offset-2 col-md-10'>";
    echo form_button(array("class" => "btn btn-danger", "content" => "Desativar", "type" => "submit"));
    echo "</div>";
    echo "</div>";
    echo form_close();
}
?>
<?php
echo form_fieldset("<h1>Cadastro da Turma</h1>");

echo form_open("turma/cadastrarTurma",'class = form-horizontal');
echo "<div class='row'>";
echo form_label("Unidade", "unidade", array("class" => "col-md-2 control-label"));
echo "<div class='form-group col-md-3'>";
$unidades = array('' =>  "Selecione")+$unidades;
echo form_dropdown('unidade',$unidades, "", array("class" => "form-control"));
echo form_error("unidade");
echo "</div>";
echo form_label("Curso", "curso", array("class" => "col-md-1 control-label"));
echo "<div class='form-group col-md-2'>";
$cursos = array('' =>  "Selecione")+$cursos;
echo form_dropdown('curso',$cursos, "", array("class" => "form-control"));
echo form_error("curso");
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo form_label("Código da Turma", "matricula", array("class" => "col-md-2 control-label"));
echo "<div class='form-group col-md-2'>";
echo form_input(array("name" => "cd_mat_turma", "type" => "number", "value" => set_value("cd_mat_turma",""), "id" => "cd_mat_turma" ,"class" => "form-control", "max" => "9999", "min" => "0", "required" => "required"));
echo form_error("cd_mat_turma");
echo "</div>";
echo form_label("Ano de Ingresso", "ano", array("class" => "col-md-2 control-label"));
echo "<div class='form-group col-md-1'>";
echo form_input(array("name" => "ano", "type" => "number", "value" => set_value("ano",""), "id" => "ano" ,"class" => "form-control", "max" => "2100", "minlength" => "1970", "required" => "required", "min" => "1969"));
echo form_error("ano");
echo "</div>";
echo form_label("Semestre","semestre", array("class" => "col-md-2 control-label"));
echo "<div class='form-group col-md-1'>";
$semestre=array('' => '','1' => '1','2' => '2');
echo form_dropdown('semestre',$semestre, set_value("semestre",""), array("class" => "form-control"));
echo form_error("semestre");
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo form_label("Ciclo", "ciclo", array("class" => "col-md-2 control-label"));
echo "<div class='form-group col-md-2'>";
$ciclo = array('' => 'Selecione', '1º Ciclo' => '1º Ciclo', '2º Ciclo' => '2º Ciclo', '3º Ciclo' => '3º Ciclo', '4º Ciclo' => '4º Ciclo', '5º Ciclo' => '5º Ciclo', '6º Ciclo' => '6º Ciclo');
echo form_dropdown('ciclo', $ciclo, set_value("ciclo",""), array("class" => "form-control"));
echo form_error("ciclo");
echo "</div>";
echo form_label("Modalidade", "modalidade", array("class" => "col-md-2 control-label"));
echo "<div class='form-group col-md-2'>";
$modalidade = array('' => 'Selecione', 'Presencial' => 'Presencial', 'EAD' => 'EAD');
echo form_dropdown('modalidade', $modalidade, set_value("modalidade",""), array("class" => "form-control", "id" =>"modalidade", "onchange" =>'opcaoModalidade()'));
echo form_error("modalidade");
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo form_label("Turno", "turno", array("class" => "col-md-2 control-label"));
echo "<div class='form-group col-md-2'>";
$turno = array('' => '','Manhã' => 'Manhã', 'Tarde' => 'Tarde', 'Noite' => 'Noite');
echo form_dropdown('turno', $turno, set_value("turno",""), array("class" => "form-control", "id" => "turno","onchange" =>'opcaoModalidade()'));
echo form_error("turno");
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo "<div class='col-md-offset-2 col-md-10'>";
echo anchor("temporario/administrador","Cancelar", array("class" => "btn btn-default"));
echo "        ";
echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
echo "</div>";
echo "</div>";

echo form_close();
?>
</div>
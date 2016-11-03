<script type="text/javascript">
	function confirma(){
		return confirm("Confirmar informações e enviar?");
	}

	var url = "<?= base_url() ?>" + "index.php/Curso/buscaCursosByUnidade";
	function busca_cursos(id_unidade){

		$.post(url, {
			id_unidade : id_unidade
		}, function(data){
			$('#cursos').html(data);
		})
	}

	var urlTurma = "<?= base_url()?>" + "index.php/Turma/buscaTurmasByCurso"
	function busca_turmas(id_curso){
		$.post(urlTurma, {
			id_curso : id_curso
		}, function(data){
			$('#turmas').html(data);
		})
	}
</script>

<?php
echo form_fieldset("<h1>Cadastro de Aluno</h1>");

echo form_open('aluno/cadastraraluno', array('class' => 'form-horizontal',"onsubmit" => "return confirma()"));
echo "<div class='row'>";
echo form_label("Unidade", "unidade", array("class" => "col-md-2 control-label"));
echo "<div class='form-group col-md-3'>";
$unidades = array('' =>  "Selecione")+$unidades;
if (!isset($unidade)) {
	echo form_dropdown('Unidade', $unidades, "", array("class" => "form-control", 'id' => 'unidade', 'required' => 'required', 'onchange' => 'busca_cursos($(this).val())'));

} else {
	echo form_dropdown('Unidade', $unidades, $unidade, array("class" => "form-control", 'id' => 'unidade', 'required' => 'required', 'onchange' => 'busca_cursos($(this).val())'));

}
echo "</div>";
echo form_label("Curso", "curso", array("class" => "col-md-2 control-label"));
echo "<div class='form-group col-md-3'>";
/*if(!isset($unidade)){
    echo form_dropdown('Curso', $cursos, "", array("class" => "form-control", 'id' => 'curso', 'required' => 'required'));
}else{
    echo form_dropdown('Curso', $cursos, $curso, array("class" => "form-control", 'id' => 'curso', 'required' => 'required'));
}*/
echo "<select name='cursos' id='cursos' class='form-control' required='required' onchange='busca_turmas($(this).val())'></select>";
echo "</div>";
echo "</div>";

echo "<br/><br/>";

if(!isset($unidade)) {
	$atributos = array('class' => 'form-horizontal');

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
	//echo form_dropdown('turma', "", set_value("turma", ""), array("class" => "form-control", "required" => "required"));
	echo "<select name='turmas' id='turmas' class='form-control' required='required'></select>";
	//echo form_hidden("unidade", $unidade);
	echo form_error("turma");
	echo "</div>";
	echo "</div>";

	echo "<div class='row'>";
	echo form_label("Nome Completo", "nomeCompleto", array("class" => "col-md-2 control-label"));
	echo "<div class='form-group col-md-7'>";
	echo form_input(array("name" => "nome", "value" => set_value("nome", ""), "required" => "required", "id" => "nomeCompleto", "class" => "form-control", "maxlength" => "70"));
	echo "</div>";
	echo "</div>";

	echo "<div class='row'>";
	echo form_label("Email", "email", array("class" => "col-md-2 control-label"));
	echo "<div class='form-group col-md-3'>";
	echo form_input(array("name" => "email", "value" => set_value("email", ""), "id" => "email", "class" => "form-control", "maxlength" => "70"));
	echo form_error("email");
	echo "</div>";

	echo "</div>";
	echo "<div class='row'>";

	echo form_label("Telefone Celular", "celular", array("class" => "col-md-2 control-label"));
	echo "<div class='form-group col-md-2'>";
	echo form_input(array("name" => "celular", "value" => set_value("celular", ""), "id" => "celular", "class" => "form-control phone-mask", "pattern" => ".{10}|.{11,}", "required title" => "O número de celular deve conter entre 10 e 11 digitos" ,"maxlength" => "15"));
	echo form_error("celular");
	echo "</div>";
	echo form_label("Telefone Residencial", "tel", array("class" => "col-md-2 control-label"));
	echo "<div class='form-group col-md-2'>";
	echo form_input(array("name" => "telefone", "value" => set_value("telefone", ""), "id" => "tel", "class" => "form-control phone-mask", "pattern" => ".{10}|.{11,}", "required title" => "O número de telefone deve conter entre 10 e 11 digitos" ,"maxlength" => "15"));
	echo form_error("telefone");
	echo "</div>";
	echo "</div>";
	echo "<div class='row'>";
	echo "<div class='form-group'>";
	echo "<div class='col-md-offset-2 col-md-10'>";
	echo anchor("temporario/administrador","Cancelar", array("class" => "btn btn-default"));
	echo "        ";
	echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
	echo "</div>";
	echo "</div>";
	echo "</div>";
	echo form_close();
}
?>




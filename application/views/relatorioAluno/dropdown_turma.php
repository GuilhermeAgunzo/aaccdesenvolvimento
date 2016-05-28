<?php

if ($dropDownTurma != null) {

echo "<div class='form-group'>";
echo form_label("Turma", "id_turma", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-10'>";
array_unshift($dropDownTurma, "Selecione");
echo form_dropdown('id_turma',$dropDownTurma, "", array("class" => "form-control", "onchange" => "alunos(this.value)"));
echo form_error("id_turma");
echo "</div>";
echo "</div>";

}else{
    echo "<p class='alert alert-danger'>Ainda não foi efetuado cadastro de turmas nesta unidade.</p>";
}

?>



<div id="alunos"></div>


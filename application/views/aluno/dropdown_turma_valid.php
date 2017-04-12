<?php

if ($dropDownTurma != null) {

    echo "<div class='row'>";
    echo form_label("Turma", "id_turma", array("class" => "col-sm-2 control-label"));
    echo "<div class='form-group col-md-3'>";

    echo form_dropdown('id_turma',$dropDownTurma, "", array("class" => "form-control", "onchange" => "statusDeclaracao(this.value)"));
    echo form_error("id_turma");
    echo "</div>";
    echo "</div>";


}else{
    echo "<p class='alert alert-danger'>Ainda não foi efetuado cadastro de turmas neste curso.</p>";
}

?>

<div id="statusDeclaracao"></div>
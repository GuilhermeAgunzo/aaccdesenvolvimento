<?php

if ($dropDownCurso != null) {

    echo "<div class='row'>";
    echo form_label("Curso", "id_curso", array("class" => "col-sm-2 control-label"));
    echo "<div class='form-group col-md-3'>";

    echo form_dropdown('id_curso',$dropDownCurso, "", array("class" => "form-control", "required" => "required","onchange" => "turma2(this.value)"));
    echo form_error("id_curso");
    echo "</div>";
    echo "</div>";

}else{
    echo "<p class='alert alert-danger'>Ainda não foi efetuado cadastro de cursos nesta unidade.</p>";
}

?>

<div id="turma2"></div>






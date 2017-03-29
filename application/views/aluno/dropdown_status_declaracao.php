<?php
//echo form_close();
//echo form_open('relatorioAacc/alunos2', 'class = form-horizontal');

    echo "<div class='row'>";
    echo form_label("Status da Declaração", "id_statusDeclaracao", array("class" => "col-sm-2 control-label"));
    echo "<div class='form-group col-md-3'>";
    $escolhaStatusDeclaracao = array('1' => "Pendentes", '2' => "Aprovadas", '3' => "Não Aprovadas");
    array_unshift($escolhaStatusDeclaracao, "Selecione");
    echo form_dropdown('id_statusDeclaracao', $escolhaStatusDeclaracao, "", array("class" => "form-control" ));
    echo form_error("id_statusDeclaracao");

    echo "</div>";
    echo "</div>";

if(isset($alunosTodos)) {

    foreach ($alunosTodos as $aluno) {
        echo form_hidden("nm_aluno", $aluno["nm_aluno"]);
        echo form_hidden("id_aluno", $aluno["id_aluno"]);
        echo form_hidden("id_turma", $aluno["id_turma"]);
    }
}

echo "<div class='col-md-2'>";
echo form_button(array("class" => "btn btn-default", "content" => "Pesquisar", "type" => "submit" , "onchange" => "alunos2(this.value)"));
echo "</div>";

echo form_close();

?>
<div id="lista_declaracao_alunos"></div>

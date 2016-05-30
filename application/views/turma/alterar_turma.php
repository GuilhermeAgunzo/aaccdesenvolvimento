<?php
echo form_fieldset("<h1>Alteração de Turma</h1>");

if(!isset($unidade) && isset($unidades)){
    echo form_open('turma/pesquisarTurmaInUnidade', 'class = form-horizontal');
    echo "<div class='form-group'>";
    echo form_label("Unidade", "unidade", array("class" => "col-md-2 control-label"));
    echo "<div class='col-md-3'>";
    echo form_dropdown('Unidade', $unidades, "", array("class" => "form-control"));
    echo "</div>";
    echo "<div class='col-md-2'>";
    echo form_hidden("opcao", 'Alterar');
    echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
    echo "</div>";
    echo "<div class='col-md-4'>";
    echo "</div>";
    echo "</div>";
    echo form_close();
}
//opcoes de escolher as turmas da unidade escolhida na opcao anterior
if(isset($turmas)) {
    echo "<h3>" . $unidade["nm_unidade"] . "</h3>";
    echo "<br/>";
    echo anchor("turma/alterar_turma/", "Voltar", 'class = "btn btn-default"');
    echo "<br/>";
    echo "<br/>";

    if ($turmas != null) {
        echo "<div class='table-responsive'>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Matricula da Turma</th>";
        echo "<th>Turma</th>";
        echo "<th>Turno/Modalidade</th>";
        echo "</tr>";
        echo "</thead>";
        foreach ($turmas as $turmas) {
            echo "<tr>";
            echo "<td>".anchor("turma/buscarAlterarTurma/{$turmas['cd_mat_turma']}",$turmas['cd_mat_turma'])."</td>";
            echo "<td>{$turmas['aa_ingresso']}/{$turmas['dt_semestre']} - {$turmas['qt_ciclo']}º Ciclo</td>";
            if($turmas['nm_turno']!=null) {
                echo "<td>" . $turmas['nm_turno'] . "</td>";
            }else{
                echo "<td>".$turmas['nm_modalidade']."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    }else{
        echo "<p class='alert alert-danger'> Nenhuma Turma cadastrada nessa Unidade.</p>";
        echo "<br/>";
        echo anchor("turma/pesquisar_turma/", "Voltar", 'class = "btn btn-default"');
    }
}

//Formulario de alteração de Turma

if(isset($turma) || isset($erro)){
    $atributos = array('class' => 'form-horizontal');
    echo form_open("turma/alterarTurma",$atributos);
    echo form_hidden('id_turma', $turma['id_turma']);
    echo "<div class='row'>";
    echo form_label("Código da Turma", "matricula", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-2'>";
    echo form_input(array("name" => "cd_mat_turma", "type" => "number", "value" => set_value("cd_mat_turma",$turma['cd_mat_turma']), "id" => "cd_mat_turma" ,"class" => "form-control", "max" => "9999", "required" => "required"));
    echo form_error("cd_mat_turma");
    echo "</div>";
    echo form_label("Ano de Ingresso", "ano", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-1'>";
    echo form_input(array("name" => "ano", "type" => "number", "value" => set_value("ano",$turma['aa_ingresso']), "id" => "ano" ,"class" => "form-control", "pattern" => "{4,4}", "required" => "required", "min" => "1970"));
    echo form_error("ano");
    echo "</div>";
    echo form_label("Semestre","semestre", array("class" => "col-md-1 control-label"));
    echo "<div class='form-group col-md-1'>";
    $semestre = array('' => '','1' => '1','2' => '2');
    echo form_dropdown('semestre',$semestre, $turma['dt_semestre'], array("class" => "form-control"));
    echo form_error("semestre");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Ciclo", "ciclo", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-2'>";
    $ciclo = array('' => 'Selecione', '1' => '1º Ciclo', '2' => '2º Ciclo', '3' => '3º Ciclo', '4' => '4º Ciclo', '5' => '5º Ciclo', '6' => '6º Ciclo');
    echo form_dropdown('ciclo', $ciclo, $turma['qt_ciclo'], array("class" => "form-control"));
    echo form_error("ciclo");
    echo "</div>";
    echo form_label("Modalidade", "modalidade", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-2'>";
    $modalidade = array('' => 'Selecione', 'Presencial' => 'Presencial', 'EAD' => 'EAD');
    echo form_dropdown('modalidade', $modalidade, $turma['nm_modalidade'], array("class" => "form-control", "id" => "modalidade", "onchange" => "opcaoModalidade()"));
    echo form_error("modalidade");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Turno", "turno", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-2'>";
    $turno = array('' => 'Selecione','Manhã' => 'Manhã', 'Tarde' => 'Tarde', 'Noite' => 'Noite');
    echo form_dropdown('turno', $turno, $turma['nm_turno'], array("class" => "form-control", "id" => "turno", "required" =>"required", "onchange" => "opcaoModalidade()"));
    echo form_error("turno");
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group'>";
    echo "<div class='col-md-offset-2 col-md-10'>";
    echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
    echo "</div>";
    echo "</div>";

    echo form_close();
}
?>
<?php
echo form_fieldset("<h1>Pesquisa de Evento</h1>");

$atributos = array('class' => 'form-horizontal');



/* Pesquisa por unidade
if(isset($unidades) && !isset($eventos)){
    echo form_open('evento/pesquisaEventos', $atributos);
    echo "<div class='row'>";
    echo form_label("Unidade", "unidade", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-3'>";
    //$unidades = array('' =>  "Selecione")+$unidades;
    echo form_dropdown('Unidade', $unidades, "", array("class" => "form-control", "required" => "required"));
    echo "</div>";
    echo "<div class='col-md-2'>";
    echo form_hidden("opcao", 'Pesquisar');

    echo form_button(array("class" => "btn btn-default", "content" => "Pesquisar", "type" => "submit"));
    echo anchor("temporario/administrador","Cancelar", array("class" => "btn btn-default"));
    echo "</div>";
    echo "</div>";


    echo form_close();
}
*/

echo form_open('evento/pesquisarEventoData', $atributos);

echo "<p> Este período informará todos os  eventos cadastrados neste espaço de tempo. </p> </br> ";

echo "<div class='row'>";
echo form_label("Período Inicial do Evento", "dtEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='form-group col-sm-2'>";
echo form_input(array("name" => "dtEvento", "value" => set_value("dtEvento",""),"required" => "required","type" => "text", "id" => "dtEvento" ,"class" => "form-control datepicker", "maxlength" => "10"));
echo form_error("dtEvento");
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo form_label("Período Final do Evento", "ddtFinalEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='form-group col-sm-2'>";
echo form_input(array("name" => "dtFinalEvento", "value" => set_value("dtFinalEvento",""),"required" => "required","type" => "text", "id" => "dtFinalAviso" ,"class" => "form-control datepicker", "maxlength" => "10"));
echo form_error("dtFinalEvento");
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Pesquisar", "type" => "submit"));
echo "</div>";
echo "</div>";
echo "</div>";

echo form_close();


if($this->session->flashdata("danger")){
    echo "<p class='alert alert-danger'>". $this->session->flashdata("danger") ."</p>";
}


if(isset($eventos)) {
    //echo "<h3>Unidade: {$unidade['nm_unidade']} </h3>";
    if ($eventos != null) {
        echo "<div class='table-responsive'>";
        echo "<table class='table'>";
        echo "<tr>";
        echo "<th> Evento </th>";
        echo "<th> Local </th>";
        echo "<th> Data de inicio </th>";
        echo "<th> Data de termino </th>";
        echo "<th> Horário </th>";
        echo "<th> Duração </th>";
        echo "<th> Descrição </th>";
        echo "<th> Responsável </th>";
        echo "</tr>";

        foreach ($eventos as $evento) {
            echo "<tr>";
            echo "<td>" . $evento['nm_evento'] . "</td>";
            echo "<td>" . $evento['local_evento'] . "</td>";
            echo "<td>" . dataMysqlParaPtBr($evento['dt_inicio_evento']) . "</td>";
            echo "<td>" . dataMysqlParaPtBr($evento['dt_final_evento']) . "</td>";
            echo "<td>" . $evento['hr_evento'] . "</td>";
            if ($evento['qt_horas_evento'] == 1) {
                echo "<td>" . $evento['qt_horas_evento'] . " hora</td>";
            } else {
                echo "<td>" . $evento['qt_horas_evento'] . " horas</td>";
            }
            echo "<td class='texto_descricao'>" . ellipsize($evento['ds_evento'], 45) . "</td>";
            echo "<td>" . $evento['nm_responsavel_evento'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo "<p class='alert alert-danger'> Nenhum evento cadastrado neste período.</p>";
        echo "</br>";
        echo form_open('evento/pesquisaEventos', 'class=form-horizontal');
        echo "<div class='col-md-2'>";
        echo form_close();
        }
    }

echo anchor("evento/pesquisar_evento", "Voltar", array("class" => "btn btn-default"));
        echo "</div>";
?>


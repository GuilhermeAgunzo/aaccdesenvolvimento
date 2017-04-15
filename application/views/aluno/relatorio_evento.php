<?php

echo form_fieldset("<h1> Relatório de Eventos </h1>");

$atributos = array('class' => 'form-horizontal');


//METODO ANTIGO DE BUSCA POR INTERVALO DE DATA

//echo form_open('RelatorioEvento/buscar', $atributos);
//echo "<div class='form-group'>";
//echo form_label("Data Inicial", "dataInicial", array("class" => "col-sm-2 control-label"));
//echo "<div class='col-sm-2'>";
//echo form_input(array('name' => 'dtEvento', 'id' => 'dataInicial',"required" => "required", 'type' => 'text', 'class' => 'form-control datepicker', "maxlength" => "8", "placeholder" => "dd/mm/aaaa"));
//echo form_error("dtEvento");
//echo "</div>";
//echo "</div>";
//
//echo "<div class='form-group'>";
//echo form_label("Data Final", "dataFinal", array("class" => "col-sm-2 control-label"));
//echo "<div class='col-sm-2'>";
//echo form_input(array('name' => 'dtFinalEvento', 'id' => 'dataInicial', "required" => "required", 'type' => 'text', 'class' => 'form-control datepicker', "maxlength" => "8", "placeholder" => "dd/mm/aaaa"));
//echo form_error("dtFinalEvento");
//echo "</div>";
//echo "</div>";
//
//echo "<div class='form-group'>";
//echo "<div class='col-sm-offset-2 col-sm-10'>";
//echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
//echo "</div>";
//echo "</div>";
//echo form_close();


$atributos2 = array('class' => 'form-horizontal', 'Target' => '_blank');

if(isset($unidades) && !isset($eventos)) {
    echo form_open('RelatorioEvento/pesquisaEventos', $atributos);
    echo "<div class='row'>";
    echo form_label("Unidade", "unidade", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-3'>";
    $unidades = array('' => "Selecione") + $unidades;
    echo form_dropdown('Unidade', $unidades, "", array("class" => "form-control", "required" => "required"));
    echo "</div>";
    echo "<div class='col-md-2'>";
    echo form_hidden("opcao", 'Pesquisar');

    echo form_button(array("class" => "btn btn-default", "content" => "Pesquisar", "type" => "submit"));
    echo "</div>";
    echo "</div>";
    echo form_close();
}

if($this->session->flashdata("danger")){
    echo "<p class='alert alert-danger'>". $this->session->flashdata("danger") ."</p>";
}

if(isset($eventos)){
    echo form_fieldset("<h1>" . $nmUnidade . " </h1>");
    echo form_fieldset("<h1>" . $nmEndereco . " - " . $cdNum . "</h1>");
    echo form_open('RelatorioEvento/pdf', $atributos2);
    echo form_hidden("nmUnidade", $nmUnidade);
    echo form_hidden("Unidade", $idUnidade);
    echo form_button(array("class" => "btn btn-default", "content" => "PDF", "type" => "submit"));
    echo form_close();
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

    foreach ($eventos as $evento){
        echo "<tr>";
        echo "<td>". $evento['nm_evento'] . "</td>";
        echo "<td>". $evento['local_evento'] ."</td>";
        echo "<td>". dataMysqlParaPtBr($evento['dt_inicio_evento']) ."</td>";
        echo "<td>". dataMysqlParaPtBr($evento['dt_final_evento']) ."</td>";
        echo "<td>". $evento['hr_evento'] ."</td>";
        if($evento['qt_horas_evento'] == 1){
            echo "<td>". $evento['qt_horas_evento'] ." hora</td>";
        }else{
            echo "<td>". $evento['qt_horas_evento'] ." horas</td>";
        }
        echo "<td class='texto_descricao'>". $evento['ds_evento'] ."</td>";
        echo "<td>". $evento['nm_responsavel_evento'] ."</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}
?>
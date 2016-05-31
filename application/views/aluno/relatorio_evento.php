<?php
echo form_fieldset("<h1>Relatório de Eventos</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('RelatorioEvento/buscar', $atributos);
echo "<div class='form-group'>";
echo form_label("Data Inicial", "dataInicial", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-3'>";
echo form_input(array('name' => 'dtEvento', 'id' => 'dataInicial', 'type' => 'text', 'class' => 'form-control datepicker', "maxlength" => "8", "placeholder" => "dd/mm/aaaa"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Data Final", "dataFinal", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-3'>";
echo form_input(array('name' => 'dtFinalEvento', 'id' => 'dataInicial', 'type' => 'text', 'class' => 'form-control datepicker', "maxlength" => "8", "placeholder" => "dd/mm/aaaa"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
echo "</div>";
echo "</div>";
echo form_close();

if($this->session->flashdata("danger")){
    echo "<p class='alert alert-danger'>". $this->session->flashdata("danger") ."</p>";
}

if(isset($eventos)){
    echo "<table class='table'>";
    echo "<tr>";
    echo "<th> Evento </th>";
    echo "<th> Local </th>";
    echo "<th> Data de inicio </th>";
    echo "<th> Data de termino </th>";
    echo "<th> Horário </th>";
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
        echo "<td>". $evento['ds_evento'] ."</td>";
        echo "<td>". $evento['nm_responsavel_evento'] ."</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
<?php
echo form_fieldset("<h1>Pesquisa de Avisos</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('aviso/pesquisarAviso', $atributos);

echo "<div class='form-group'>";
echo form_label("Data Inicial do Aviso", "dt_inicio", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-4'>";
echo form_input(array("name" => "dt_inicio", "value" => set_value("dt_inicio",""),"required" => "required","type" => "text", "id" => "dtInicialAviso" ,"class" => "form-control datepicker", "maxlength" => "10"));
echo form_error("dt_inicio");
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Data Final do Aviso", "dt_vencimento", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-4'>";
echo form_input(array("name" => "dt_vencimento", "value" => set_value("dt_vencimento",""),"required" => "required","type" => "text", "id" => "dtFinalAviso" ,"class" => "form-control datepicker", "maxlength" => "10"));
echo form_error("dt_vencimento");
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Pesquisar", "type" => "submit"));
echo "</div>";
echo "</div>";

echo form_close();
if(isset($avisos)) {

    if($avisos != null){

    echo "<table class='table-striped'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Título</th>";
    echo "<th>Descrição</th>";
    echo "<th>Data inicial</th>";
    echo "<th>Data vencimento</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($avisos as $aviso) {
        echo "<tr>";
        echo "<td>".$aviso['nm_aviso']."</td>";
        echo "<td>".$aviso['ds_aviso']."</td>";
        echo "<td>".$aviso['dt_inicial_aviso']."</td>";
        echo "<td>".$aviso['dt_vencimento_aviso']."</td>";

    }
    echo "</tbody>";
    echo "</table>";


    }else{
        echo "<p class='alert alert-danger'>Nenhuma aviso foi encontrado neste período.</p>";
    }

}



?>


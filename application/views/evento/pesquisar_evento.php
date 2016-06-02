<?php
echo form_fieldset("<h1>Pesquisa de Evento</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('evento/pesquisaEventos', $atributos);

echo "<div class='row'>";
echo form_label("Data do Evento", "dataDoEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='form-group col-sm-2'>";
echo form_input(array("name" => "dtEvento","required" => "required","type" => "text", "id" => "dtEvento" ,"class" => "form-control datepicker", "maxlength" => "10", "placeholder" => "dd/mm/aaaa"));
echo form_error("dtEvento");
echo "</div>";
echo "</div>";

echo "<div class='row'>";
echo form_label("Data Final do Evento", "dataFinalDoEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='form-group col-sm-2'>";
echo form_input(array("name" => "dtFinalEvento","required" => "required","type" => "text", "id" => "dtFinalEvento" ,"class" => "form-control datepicker", "maxlength" => "10", "placeholder" => "dd/mm/aaaa"));
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
if(isset($eventos)){
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
    echo "</div>";}
?>


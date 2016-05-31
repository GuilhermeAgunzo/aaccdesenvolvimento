<?php
echo form_fieldset("<h1>Pesquisa de Evento</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('evento/pesquisaEventos', $atributos);

echo "<div class='form-group'>";
echo form_label("Data do Evento", "dataDoEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-4'>";
echo form_input(array("name" => "dtEvento","required" => "required","type" => "date", "id" => "dtEvento" ,"class" => "form-control", "maxlength" => "10"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo form_label("Data Final do Evento", "dataFinalDoEvento", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-4'>";
echo form_input(array("name" => "dtFinalEvento","required" => "required","type" => "date", "id" => "dtFinalEvento" ,"class" => "form-control", "maxlength" => "10"));
echo "</div>";
echo "</div>";

echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Pesquisar", "type" => "submit"));
echo "</div>";
echo "</div>";
echo form_close();
if($this->session->flashdata("danger")){
    echo "<p class='alert alert-danger'>". $this->session->flashdata("danger") ."</p>";
}
if(isset($eventos)){
    echo "<table>";
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


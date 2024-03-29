<?php
echo form_fieldset("<h1>Alteração de Evento</h1>");

$atributos = array('class' => 'form-horizontal');

if(isset($unidades) && !isset($eventos)){
    echo form_open('evento/pesquisaAlteraEventos', $atributos);
    echo "<div class='row'>";
    echo form_label("Unidade", "unidade", array("class" => "col-md-2 control-label"));
    echo "<div class='form-group col-md-3'>";
    //$unidades = array('' =>  "Selecione")+$unidades;
    echo form_dropdown('Unidade', $unidades, "", array("class" => "form-control", "required" => "required"));
    echo "</div>";
    echo "<div class='col-md-2'>";
    echo form_hidden("opcao", 'Pesquisar');
    echo form_button(array("class" => "btn btn-default", "content" => "Pesquisar", "type" => "submit"));
    echo "</div>";
    echo "</div>";
    echo form_close();
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
    echo "<th>  </th>";
    echo "</tr>";

    foreach ($eventos as $evento){
        echo "<tr>";
        echo "<td>".  $evento['nm_evento'] . "</td>";
        echo "<td>". $evento['local_evento'] ."</td>";
        echo "<td>". dataMysqlParaPtBr($evento['dt_inicio_evento']) ."</td>";
        echo "<td>". dataMysqlParaPtBr($evento['dt_final_evento']) ."</td>";
        echo "<td>". $evento['hr_evento'] ."</td>";
        if($evento['qt_horas_evento'] == 1){
            echo "<td>". $evento['qt_horas_evento'] ." hora</td>";
        }else{
            echo "<td>". $evento['qt_horas_evento'] ." horas</td>";
        }
        echo "<td class='texto_descricao'>". ellipsize($evento['ds_evento'],45) ."</td>";
        echo "<td>". $evento['nm_responsavel_evento'] ."</td>";

        //Validação da data futura, para permitir alteração no evento
        $data1 = $evento['dt_inicio_evento'];
        $data2 = date('Y-m-d');

        if(strtotime($data1) > strtotime($data2))
        {
            echo "<td>". anchor("evento/pesquisaEventoId/{$evento['id_evento']}","Alterar",array("class" => "btn btn-default btn-alterar btn-xs")) ."</td>";
            echo "</tr>";
        }
        else{
            echo "<td> Expirado </td>";
            echo "</tr>";
        }
    }
    echo "</table>";
    echo "</div>";
}
if(isset($linhaEvento)){
    echo form_open("evento/alteraEvento",$atributos);
    echo form_hidden("eventoId",$linhaEvento['id_evento']);

    echo "<div class='row'>";
    echo form_label("Tipo de Atividade", "tipoDeAtividade", array("class" => "col-sm-2 control-label"));
    echo "<div class='form-group col-sm-4'>";
    echo form_dropdown('Atividade', $atividades, set_value("atividade",$linhaEvento['id_tipo_atividade']), array("class" => "form-control", "required" => "required"));

    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Título do Evento", "tituloDoEvento", array("class" => "col-sm-2 control-label"));
    echo "<div class='form-group col-sm-4'>";
    echo form_input(array("name" => "nmEvento","required" => "required","value" => $linhaEvento['nm_evento'], "id" => "nmEvento" ,"class" => "form-control", "maxlength" => "100"));
    echo form_error("nmEvento");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Local do Evento", "localDoEvento", array("class" => "col-sm-2 control-label"));
    echo "<div class='form-group col-sm-4'>";
    echo form_input(array("name" => "nmLocalEvento","required" => "required","id" => "nmLocalEvento" , "value" => $linhaEvento['local_evento'],"class" => "form-control", "maxlength" => "80"));
    echo form_error("nmLocalEvento");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Data do Evento", "dataDoEvento", array("class" => "col-sm-2 control-label"));
    echo "<div class='form-group col-sm-2'>";
    echo form_input(array("name" => "dtEvento","required" => "required","type" => "text", "id" => "dtEvento" , "value" => dataMysqlParaPtBr($linhaEvento['dt_inicio_evento']),"class" => "form-control datepicker", "maxlength" => "10", "placeholder" => "dd/mm/aaaa"));
    echo form_error("dtEvento");
    echo "</div>";
    echo form_label("Data Final do Evento", "dataFinalDoEvento", array("class" => "col-sm-2 control-label"));
    echo "<div class='form-group col-sm-2'>";
    echo form_input(array("name" => "dtFinalEvento","required" => "required","type" => "text", "id" => "dtFinalEvento" , "value" => dataMysqlParaPtBr($linhaEvento['dt_final_evento']),"class" => "form-control datepicker", "maxlength" => "10", "placeholder" => "dd/mm/aaaa"));
    echo form_error("dtFinalEvento");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Hora do Evento", "horaDoEvento", array("class" => "col-sm-2 control-label"));
    echo "<div class='form-group col-sm-1'>";
    echo form_input(array("name" => "hrEvento","required" => "required","type" => "time", "id" => "hrEvento" , "value" => $linhaEvento['hr_evento'],"class" => "form-control", "maxlength" => "10"));
    echo form_error("hrEvento");
    echo "</div>";
    echo form_label("Duração do Evento (em horas)", "duracaoDoEvento", array("class" => "col-sm-3 control-label"));
    echo "<div class='form-group col-sm-2'>";
    echo form_input(array("name" => "qtHorasEvento","required" => "required","type" => "time", "id" => "qtHorasEvento" , "value" => $linhaEvento['qt_horas_evento'],"class" => "form-control"));
    echo form_error("qtHorasEvento");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Descrição", "descricaoEvento", array("class" => "col-sm-2 control-label"));
    echo "<div class='form-group col-sm-6'>";
    echo form_textarea(array('name' => 'dsEvento',"required" => "required", 'id' => 'dsEvento', "value" => $linhaEvento['ds_evento'],'class' => 'form-control', 'rows' => 3, "maxlength" => "500"));
    echo form_error("dsEvento");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo form_label("Responsável do Evento", "responsavelDoEvento", array("class" => "col-sm-2 control-label"));
    echo "<div class='form-group col-sm-3'>";
    echo form_input(array("name" => "nmResponsavelEvento","required" => "required", "id" => "nmResponsavelEvento" , "value" => $linhaEvento['nm_responsavel_evento'],"class" => "form-control", "maxlength" => "100"));
    echo form_error("nmResponsavelEvento");
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo "<div class='form-group'>";
    echo "<div class='col-sm-offset-2 col-sm-10'>";
    echo form_button(array("class" => "btn btn-default", "content" => "Alterar", "type" => "submit"));
    echo "        ";
    echo anchor("temporario/administrador","Cancelar", array("class" => "btn btn-default"));
    echo "</div>";
    echo "</div>";
    echo "</div>";

    echo form_close();
}
?>

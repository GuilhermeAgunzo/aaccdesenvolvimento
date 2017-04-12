<script src="<?= base_url("js/jquery-1.11.1.min.js")?>"></script>
<script src="<?= base_url("js/scripts.js")?>"></script>
<script src="<?= base_url("text/javascript")?>"></script>
<script>



        $(document).ready(function () {
                $("#motivoIndeferimento").hide();
                $(".radio3").change(function () {
                        if (this.select) {
                                $("#motivoIndeferimento").show();
                                $("#totalHorasAprovada").hide();
                        } else {
                                $("#motivoIndeferimento").hide();
                                $("#totalHorasAprovada").show();
                        }
                });
        });

        $(document).ready(function () {
                $("#totalHorasAprovada").hide();
                $(".radio2").change(function () {
                        if (this.select) {
                                $("#totalHorasAprovada").show();
                                $("#motivoIndeferimento").hide();
                        } else {
                                $("#totalHorasAprovada").hide();
                                $("#motivoIndeferimento").show();
                        }
                });
        });

</script>

<?php

if(isset($declaracaoCompleta)) {
        echo form_fieldset("<h1>Validação de AACCS - Atividades Acadêmicas Cientificas e Culturais.</h1>");
        echo "<div class='table-responsive'> ";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Nome do Evento</th>";
        echo "<th>Qtde de Horas</th>";
        echo "<th>Data do Evento</th>";
        echo "<th>Local do Evento</th>";
        echo "<th>Descrição do Evento</th>";
        echo "<th>Status da Declaração</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

                echo "<tr>";
                echo "<td>" . $declaracaoCompleta['resumo_atividade'] . "</td>";
                echo "<td>" . $declaracaoCompleta['qt_horas_atividade'] . "</td>";
                echo "<td>" . $declaracaoCompleta['dt_evento_externo'] . "</td>";
                echo "<td>" . $declaracaoCompleta['local_evento_externo'] . "</td>";
                echo "<td>" . $declaracaoCompleta['ds_evento_externo'] . "</td>";
                echo form_hidden("id_aluno", $declaracaoCompleta["id_aluno"]);
                echo form_hidden("id_declaracao", $declaracaoCompleta["id_declaracao"]);
                echo form_hidden("id_tipo_atividade", $declaracaoCompleta["id_tipo_atividade"]);
                if ($declaracaoCompleta['status_declaracao'] == 1) {
                        echo "<td>" . 'Pendente' . "</td>";

                }
                echo "</tr>";

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
}
        echo form_open('relatorioAacc/validarRelatorioAacc', array('class' => 'form-horizontal', 'id' => ''));
        echo form_hidden("id_aluno", $declaracaoCompleta["id_aluno"]);
        echo form_hidden("id_declaracao", $declaracaoCompleta["id_declaracao"]);
        echo form_hidden("id_tipo_atividade", $declaracaoCompleta["id_tipo_atividade"]);

        echo "<div class='row'>";
        echo "<div class='form-group' id='aprovacao'>";
        echo form_label("Não Aprovado", "aprovacao", array("class" => "col-sm-2 control-label"));
        echo "<div class='form-group col-md-2'>";
        echo form_radio('aprovacao', '3', @$nchecked, array( "value" => set_value("aprovacao", "3") ,"name" => 'aprovacao', "type" => 'radio', "class" => "radio3"));
        echo "</div>";
        echo form_label("Aprovado", "aprovacao", array("class" => "col-sm-2 control-label"));
        echo "<div class='form-group col-md-2'>";
        echo form_radio('aprovacao', '2', @$nchecked, array("value" => set_value("aprovacao", "2"), "name" => 'aprovacao', "type" => 'radio', "class" => "radio2"));
        echo "</div>";
        echo "</div>";
        echo "</div>";

        echo "<div class='row'>";
        echo "<div class='form-group' id='motivoIndeferimento'>";
        echo form_label("Motivo do Indeferimento", "", array("class" => "col-sm-3 control-label"));
        echo "<div class='form-group col-md-3'>";
        $motivoNomeIndeferimento = array('' =>  "Selecione")+$motivoNomeIndeferimento;
        echo form_dropdown( "motivoIdIndeferimento",$motivoNomeIndeferimento,"", array("name" => "motivoIndeferimento" ,"class" => "form-control", "value" => set_value("motivoIdIndeferimento", "" )));
        echo form_error("id_motivoInd");
        echo "</div>";
        echo "</div>";
        echo "</div>";

        echo "<div class='row'>";
        echo "<div class='form-group' id='totalHorasAprovada'>";
        echo form_label("Total de Horas Aprovadas", "HorasAprovadas", array("class" => "col-sm-3 control-label"));
        echo "<div class='form-group col-md-3'>";
        echo form_input(array("name" => "totalHorasAprovada", "value" => set_value("totalHorasAprovada", ""), "type" => "number", "id" => "totalHorasAprovada", "class" => "form-control", "maxlength" => "3", "minlength" => "1", "min" => "0", "max" => "999"));
        echo form_error("totalHorasAprovada");
        echo "</div>";
        echo "</div>";
        echo "</div>";

        echo "<div class='row'>";
        echo form_label("Data da Aprovação/Não Aprovação", "dt_aprovacao", array("class" => "col-sm-3 control-label"));
        echo "<div class='form-group col-md-3'>";
        echo form_input(array("name" => "dt_aprovacao", "value" => set_value("dt_aprovacao", ""), "required" => "required", "type" => "text", "id" => "dt_aprovacao", "class" => "form-control datepicker", "maxlength" => "10"));
        echo form_error("dt_aprovacao");
        echo "</div>";
        echo "</div>";

        echo "<div class='row'>";
        echo form_label("Observações", "observacao", array("class" => "col-sm-2 control-label"));
        echo "<div class='form-group col-sm-6'>";
        echo form_textarea(array('name' => 'observacao', "value" => set_value("observacao", ""), 'id' => 'observacao', 'class' => 'form-control', 'rows' => 5, "maxlength" => "500"));
        echo form_error("observacao");
        echo "</div>";
        echo "</div>";
        echo "<div class='row'>";
        echo "<div class='form-group col-md-3'>";
        echo form_button(array("class" => "btn btn-default", "content" => "Salvar", "type" => "submit"));
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo form_close();

?>


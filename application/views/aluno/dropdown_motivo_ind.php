<?php

if ($escolhaIdMotivo == 3) {

    echo "<div class='row'>";
    echo form_label("Motivo do Indeferimento", "id_motivoInd", array("class" => "col-sm-2 control-label"));
    echo "<div class='form-group col-md-3'>";
    array_unshift($motivoNomeIndeferimento, "Selecione");
    echo form_dropdown('id_motivoInd',$motivoNomeIndeferimento, "", array("class" => "form-control"));
    echo form_error("id_motivoInd");
    echo "</div>";
    echo "</div>";

}else{
    echo "<p class='alert alert-danger'>Não precisa do Motivo de Indeferimento.</p>";
}








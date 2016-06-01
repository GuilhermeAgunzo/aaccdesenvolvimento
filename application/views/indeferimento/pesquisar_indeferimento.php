<?php
echo form_fieldset("<h1>Pesquisa do Motivo de Indeferimento</h1>");


$atributos = array('class' => 'form-horizontal');
echo form_open('email/send', $atributos);
echo "<div class='form-group'>";
echo "<div class='col-sm-10'>";


echo "<table class='table'>";
if($motivos != null) {

    foreach ($motivos as $motivo) {
        echo "<tr>";
        echo "<td>" . $motivo['nm_motivo'] . "</td>";
        echo "</tr>";
    }
}else{
    echo "<p class='alert alert-danger'>Não há motivos cadastrados no momento</p>";
}
echo "</table>";
echo "</div>";
echo "</div>";
echo form_close();

?>

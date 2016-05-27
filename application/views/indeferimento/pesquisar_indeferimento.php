<?php
echo form_fieldset("<h1>Pesquisa do Motivo de Indeferimento</h1>");


$atributos = array('class' => 'form-horizontal');
echo form_open('email/send', $atributos);
echo "<div class='form-group'>";
echo "<div class='col-sm-10'>";
echo "<table border='1'>";
echo "<tr>";
echo "<td>Motivo do Indeferimento 1</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Motivo do Indeferimento 2</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Motivo do Indeferimento 3</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Motivo do Indeferimento 4</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Motivo do Indeferimento 5</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
echo "</div>";

echo form_close();

?>

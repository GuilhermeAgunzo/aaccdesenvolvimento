<?php
echo form_fieldset("<h1>Pesquisa de Turma</h1>");


$atributos = array('class' => 'form-horizontal');
echo form_open("turma/pesquisarTurma", $atributos);
echo "<div class='form-group'>";
echo form_label("Código da Turma", "cd_turma", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "cd_mat_turma", "type" => "number", "value" => set_value("cd_mat_turma",""), "id" => "cd_mat_turma" ,"class" => "form-control", "maxlength" => "80"));
echo "</div>";
echo "</div>";
echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
echo "</div>";
echo "</div>";
echo form_close();


if(isset($turma)){ ?>

    <table>
        <tr>
            <td>Código da Turma</td>
            <td><?= $turma['cd_mat_turma'] ?></td>
        </tr>
        <tr>
            <td>Unidade</td>
            <td><?= $turma['id_unidade'] ?></td>
        </tr>
        <tr>
            <td>Ano de Ingresso</td>
            <td><?= $turma['aa_ingresso'] ?></td>
        </tr>
        <tr>
            <td>Semestre</td>
            <td><?= $turma['dt_semestre'] ?></td>
        </tr>
        <tr>
            <td>Turno</td>
            <td><?= $turma['nm_turno'] ?></td>
        </tr>
        <tr>
            <td>Ciclo</td>
            <td><?= $turma['qt_ciclo'] ?></td>
        </tr>
    </table>





<?php } ?>




<?php

echo form_fieldset("<h1>Pesquisa de Aluno</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('aluno/pesquisaraluno', $atributos);
echo "<div class='form-group'>";
echo form_label("Número de matrícula", "matricula", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-6'>";
echo form_input(array("name" => "matricula", "required" => "required", "id" => "matricula" ,"class" => "form-control", "maxlength" => "80"));
echo "</div>";
echo "</div>";
echo "<div class='form-group'>";
echo "<div class='col-sm-offset-2 col-sm-10'>";
echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
echo "</div>";
echo "</div>";
echo form_close();


if(isset($aluno)){ ?>

    <table>
        <tr>
            <td>Número de matrícula</td>
            <td><?= $aluno['cd_mat_aluno'] ?></td>
        </tr>
        <tr>
            <td>Nome Completo</td>
            <td><?= $aluno['nm_aluno'] ?></td>
        </tr>
        <tr>
            <td>Turma</td>
            <td><?= $aluno['id_turma'] ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= $aluno['nm_email'] ?></td>
        </tr>
        <tr>
            <td>Telefone Residencial</td>
            <td><?php if($aluno['cd_tel_residencial'] != 0) echo $aluno['cd_tel_residencial']; ?></td>
        </tr>
        <tr>
            <td>Telefone Celular</td>
            <td><?php if($aluno['cd_tel_celular'] != 0) echo $aluno['cd_tel_celular']; ?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>

                <?php

                if($aluno['status_ativo'] != 0)
                    echo "Ativo";
                else
                    echo "Desativado";
                ?>
            </td>
        </tr>
    </table>

<?php } ?>

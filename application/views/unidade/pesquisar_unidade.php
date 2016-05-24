<?php
echo form_fieldset("<h1>Pesquisa de Unidade</h1>");

$atributos = array('class' => 'form-horizontal');
echo form_open('unidade/pesquisarUnidade', $atributos);
echo "<div class='form-group'>";
echo form_label("Código da Unidade", "cd_cpsouza", array("class" => "col-sm-2 control-label"));
echo "<div class='col-sm-2'>";
echo form_input(array("name" => "cd_cpsouza", "value" => set_value("cd_cpsouza",""), "id" => "cd_cpsouza" ,"class" => "form-control", "maxlength" => "10"));
echo "</div>";
echo "<div class='col-sm-2'>";
echo form_button(array("class" => "btn btn-default", "content" => "Enviar", "type" => "submit"));
echo "</div>";
echo "</div>";
echo form_close();

if(isset($unidade)){ ?>

    <table class="table-striped table-responsive">
        <tr>
            <td>Nome da Unidade</td>
            <td><?= $unidade['nm_unidade'] ?></td>
        </tr>
        <tr>
            <td>Código da Unidade</td>
            <td><?= $unidade['cd_cpsouza'] ?></td>
        </tr>
        <tr>
            <td>Endereço</td>
            <td><?= $unidade['nm_endereco'] ?></td>
        </tr>
        <tr>
            <td>Número</td>
            <td><?= $unidade['cd_num_endereco'] ?></td>
        </tr>
        <tr>
            <td>Complemento</td>
            <td><?= $unidade['nm_complemento_endereco'] ?></td>
        </tr>
        <tr>
            <td>Bairro</td>
            <td><?= $unidade['nm_bairro'] ?></td>
        </tr>
        <tr>
            <td>CEP</td>
            <td><?= $unidade['cd_cep_endereco'] ?></td>
        </tr>
        <tr>
            <td>Cidade</td>
            <td><?= $unidade['nm_cidade'] ?></td>
        </tr>
        <tr>
            <td>UF</td>
            <td><?= $unidade['UF_estado'] ?></td>
        </tr>
        <tr>
            <td>Telefone da Unidade</td>
            <td><?php echo $unidade['cd_telefone']; ?></td>
        </tr>
    </table>

<?php } ?>
<?php
echo form_fieldset("<h1>Pesquisa de Unidade</h1>");

echo form_open('unidade/pesquisaFiltroUnidade', 'class = form-horizontal');
echo form_label("Pesquisar Unidade", "termo", array("class" => "col-md-2 control-label"));
echo "<div class='col-md-4'>";
echo "<div class='input-group'>";
if (isset($termo)){echo form_input(array("name" => "termo", "value" => "{$termo}" ,"required" => "required", "class" => "form-control", "maxlength" => "70"));
}else{echo form_input(array("name" => "termo", "required" => "required", "class" => "form-control", "maxlength" => "70"));}
echo "<span class='input-group-btn'>";
echo form_button(array("class" => "btn btn-default", "content" => "Pesquisar", "type" => "submit"));
echo "</span>";
echo "</div>";
echo form_hidden("opcao", 'Pesquisar');
echo form_close();
echo "</div>";

echo "<div class='form-group'>";
echo "<div class='col-md-2'>";
echo "<td>". anchor("unidade/pesquisar_unidade/", "Mostrar Todos", 'class = "btn btn-default"')."</td>";
echo "</div>";
echo "</div>";

echo "<br/><br/>";

if(isset($unidades)){ ?>
<div class="table-responsive">
    <table class="table">
    <thead>
        <tr>
            <th>Unidade</th>
            <th>Cidade</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Complemento</th>
            <th>Bairro</th>
            <th>CEP</th>

        </tr>
    </thead>
        <?php
        foreach ($unidades as $unidade) {
            echo "<tr>";
                echo "<td class='texto-esquerda'>{$unidade['cd_cpsouza']} - {$unidade['nm_unidade']}</td>";
                echo "<td class='texto-esquerda' id='cidades'>{$unidade['nm_cidade']}</td>";
                echo "<td>{$unidade['cd_telefone']}</td>";
                echo "<td>{$unidade['nm_endereco']}, {$unidade['cd_num_endereco']}</td>";
                echo "<td>{$unidade['nm_complemento_endereco']}</td>";
                echo "<td>{$unidade['nm_bairro']}</td>";
                echo "<td>{$unidade['cd_cep_endereco']}</td>";

            echo "</tr>";
        }
     ?>
    </table>
</div>
    
<?php } ?>
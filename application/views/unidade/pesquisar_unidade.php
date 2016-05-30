<?php
echo form_fieldset("<h1>Pesquisa de Unidade</h1>");

if(isset($unidades)){ ?>
<div class="table-responsive">
    <table class="table">
    <thead>
        <tr>
            <th>Nome da Unidade</th>
            <th>Código da Unidade</th>
            <th>Endereço</th>
            <th>Complemento</th>
            <th>Bairro</th>
            <th>CEP</th>
            <th>Cidade</th>
            <th>Telefone da Unidade</th>
        </tr>
    </thead>
        <?php
        foreach ($unidades as $unidade) {
            echo "<tr>";
                echo "<td>{$unidade['nm_unidade']}</td>";
                echo "<td>{$unidade['cd_cpsouza']}</td>";
                echo "<td>{$unidade['nm_endereco']}, {$unidade['cd_num_endereco']}</td>";
                echo "<td>{$unidade['nm_complemento_endereco']}</td>";
                echo "<td>{$unidade['nm_bairro']}</td>";
                echo "<td>{$unidade['cd_cep_endereco']}</td>";
                echo "<td>{$unidade['nm_cidade']}</td>";
                echo "<td>{$unidade['cd_telefone']}</td>";
            echo "</tr>";
        }
     ?>
    </table>
</div>
    
<?php } ?>
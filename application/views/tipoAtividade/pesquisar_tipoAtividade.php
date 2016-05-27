
<?= form_fieldset("<h1>Pesquisa de Tipo de Atividade</h1>") ?>
<table class='table-striped'>

    <thead>
        <tr>
            <th>Tipo de Atividade</th>
            <?php if(isset($id_tipo_atividade)) echo "<th></th>"; ?>
        </tr>
    </thead>
    <tbody>

        <?php foreach($tiposAtividades as $tipoAtividade): ?>

            <tr>
                <td><?= $tipoAtividade['nm_tipo_atividade'] ?></td>
                <?php if(isset($id_tipo_atividade)) echo "<td>".anchor("tipoAtividade/alterarTipoAtividade/{$tipoAtividade['id_tipo_atividade']}", "Alterar", 'class = "btn btn-default"')."</td>"; ?>
            </tr>

        <?php endforeach; ?>

    </tbody>

</table>

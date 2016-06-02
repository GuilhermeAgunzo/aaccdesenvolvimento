<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?></title>

    <!-- CSS para Impressão -->
    <link href="<?= base_url("css/imprimir.css")?>" rel="stylesheet" media="print">

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url("css/bootstrap.css")?>" rel='stylesheet' type='text/css' />


</head>
<body>

<div class="container">


<h3 class="text-center"><?= $titulo ?> <button class="btn btn-success" onclick="window.print();">IMPRIMIR</button></h3>



    <table class='table table-responsive table-striped'>
        <thead>
            <tr>
                <td> Matricula</td>
                <td> Nome</td>
                <td> Email</td>
                <td> Telefone</td>
                <td> Celular</td>
                <td> Status</td>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($alunos as $aluno) {
                echo "<tr>";
                echo "<td>" . $aluno["cd_mat_aluno"] . "</td>";
                echo "<td>" . $aluno["nm_aluno"] . "</td>";
                echo "<td>" . $aluno["nm_email"] . "</td>";
                echo "<td>" . $aluno["cd_tel_residencial"] . "</td>";
                echo "<td>" . $aluno["cd_tel_celular"] . "</td>";

                if ($aluno["status_ativo"] != 0) {
                    echo "<td>Ativo</td>";
                } else {
                    echo "<td>Inativo</td>";
                }
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>




</div>



</body>
</html>
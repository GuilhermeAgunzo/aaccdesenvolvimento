<!DOCTYPE html>
<html>
<head lang="pt-br">
    <meta charset="UTF-8">
    <title>Usuário</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<div class="container">

    <?php if(isset($mensagemSucesso)): ?>
        <p class="alert alert-success"><?= $mensagemSucesso ?></p>
    <?php endif; ?>

    <?php if(isset($mensagemErro)): ?>
        <p class="alert alert-danger"><?= $mensagemErro ?></p>
    <?php endif; ?>
                    2016-04-19 00:00:00
    <?php
    $datestring = '%Y-%m-%d %h:%i:%s';
    $time = time();
    echo mdate($datestring, $time);
    ?>
    <br>
    <br>
    <br>
    <br>
    <?= print_r($usuario) ?>



</div>
</body>
</html>


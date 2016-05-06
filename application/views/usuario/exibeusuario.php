<!DOCTYPE html>
<html>
<head lang="pt-br">
    <meta charset="UTF-8">
    <title>Exibe usuário</title>
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
    <pre>


<?php

    print_r($usuario);

?>
    </pre>

</div>
</body>
</html>


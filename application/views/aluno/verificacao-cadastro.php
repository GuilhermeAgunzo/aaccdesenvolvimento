<html lang="pt-br">
<head>
    <link rel="stylesheet" href="<?=base_url("css/bootstrap.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/sb-admin.css")?>">

    <meta charset="utf-8">
</head>
<body>
<div class="container">
    <br>
    <?php if($this->session->flashdata("success")) { ?>
        <p class="alert alert-success text-center"><?= $this->session->flashdata("success") ?></p>
    <?php } ?>
    <?php if($this->session->flashdata("danger")) { ?>
        <p class="alert alert-danger text-center"><?= $this->session->flashdata("danger") ?></p>
    <?php } ?>
    <h1 class="text-center">Cadastro de Aluno</h1>
<?php

//Inicia Formulario
echo form_open("aluno/verificaCadastro");

//Cria um label e um campo de texto
echo form_label("Matricula", "matricula");
echo form_input(array("name" => "matricula",
                      "class" => "form-control",
                      "id" => "matricula",
                      "maxlength" => "13",
                      "minlength" => "13",
                      "required",
                      "type" => "number",
                      "value" => set_value("matricula","")));
echo form_error("matricula");

echo form_button(array("class" => "btn",
                       "content" => "Verificar",
                       "type" => "submit"));

    echo form_close();
?>
</div>
</body>
</html>

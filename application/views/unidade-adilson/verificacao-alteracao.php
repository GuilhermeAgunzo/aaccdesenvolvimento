<html lang="pt-br">
<head>
    <link rel="stylesheet" href="<?=base_url("css/bootstrap2.css")?>">
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
        <h1 class="text-center">Alteração de cadastro de unidade</h1>
        <?php

        //Inicia Formulario
        echo form_open("unidade/buscaCadastroAlteracao");
        echo form_label("Codigo Centro Paula Souza", "codigo");
        echo form_input(array(  "name" => "codigo",
                                "class" => "form-control",
                                "id" => "codigo",
                                "maxlength" => "5",
                                "value" => set_value("codigo","")));
        echo form_error("codigo");

        echo form_button(array( "class" => "btn",
                                "content" => "Buscar",
                                "type" => "submit"));

        echo form_close();
        ?>
    </div>
</body>
</html>

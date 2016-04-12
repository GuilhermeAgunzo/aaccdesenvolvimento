<html lang="pt-br">
<head>
    <link rel="stylesheet" href="<?=base_url("css/bootstrap.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/sb-admin.css")?>">

    <meta charset="utf-8">
</head>
<body>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="admin.html">Projeto AACC</a>
        </div>

        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Nome do Admin<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-user"></i> &nbsp;Perfil</a>
                    </li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-envelope"></i> &nbsp;Avisos</a>
                    </li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-cog"></i> &nbsp;Configurações</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-off"></i> &nbsp;Sair</a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="home.html"><i class="glyphicon glyphicon-home"></i> Início</a>
                </li>
                <li>
                    <a href="<?= base_url("unidade/formulario_cadastro.php") ?>"><i class="glyphicon glyphicon-education"></i> Cadastro Unidade</a>
                </li>
                <li>
                    <a href="turno.html"><i class="glyphicon glyphicon-user"></i> Cadastro de Aluno</a>
                </li>
            </ul>
        </div>
    </nav>
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
        echo form_open("unidade/verifica");

        //Cria um label e um campo de texto
       // $unidades = array_column($tb_unidade,'nm_unidade');
       // $optUnidades = array('unidade' => $unidades);
       // $extra = array("class" => "form-control", "value" => "set_value");

       // echo form_label("Escolha a unidade", "unidade");
       // echo form_dropdown('unidade', $optUnidades, $optUnidades ,$extra);

        echo form_button(array("class" => "btn", "content" => "Verificar", "type" => "submit"));

        echo form_close();
        ?>
    </div>
</body>
</html>

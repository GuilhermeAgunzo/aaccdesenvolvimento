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
            <a class="navbar-brand" href="admin.html">Projeto AACC - teste ka</a>
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
    <br/>
    <?php if($this->session->flashdata("success")) { ?>
        <p class="alert alert-success text-center"><?= $this->session->flashdata("success") ?></p>
    <?php } ?>
    <?php if($this->session->flashdata("danger")) { ?>
        <p class="alert alert-danger text-center"><?= $this->session->flashdata("danger") ?></p>
    <?php } ?>
    <h1 class="text-center">Cadastro de aluno</h1>
    <?php
    //Inicia Formulario
    echo form_open("aluno/novo");
    //Cria um label e um campo numerico
    echo form_label("Numero de Matricula", "matricula");
    echo form_input(array("name" => "matricula", "class" => "form-control", "id" => "matricula","type" => "number", "maxlength" => "255","value" => set_value("matricula"),""));
    echo form_error("matricula");
    echo form_button(array("class" => "btn", "content" => "Pesquisar", "type" => "button"));
    ?>
    <br>
    <?php

    echo form_label("Nome", "nome");
    echo form_input(array("name" => "nome", "class" => "form-control", "id" => "nome", "maxlength" => "255","value" => set_value("nome"),""));
    echo form_error("nome");

    echo form_label("Email", "email");
    echo form_input(array("name" => "email", "class" => "form-control", "id" => "email","type" => "email", "maxlength" => "255","value" => set_value("email"),""));
    echo form_error("email");

    echo form_label("Telefone Residencial", "telefone");
    echo form_input(array("name" => "telefone", "class" => "form-control", "id" => "telefone", "type" => "number","value" => set_value("telefone","")));
    echo form_error("telefone");

    echo form_label("Telefone Celular", "celular");
    echo form_input(array("name" => "celular", "class" => "form-control", "id" => "celular", "type" => "number","value" => set_value("celular","")));
    echo form_error("celular");


    $unidades = array_column($tb_unidade,'nm_unidade');
    $optUnidades = array('unidade' => $unidades);
    $extra = array("class" => "form-control", "value" => "set_value");

    echo form_label("Unidade", "unidade");
    echo form_dropdown('unidade', $optUnidades, $optUnidades ,$extra);


    $turmas = array_column($tb_turma,'id_turma');
    $optTurmas = array('turma' => $turmas);
    $extra = array("class" => "form-control");

    echo form_label("Turma", "turma");
    echo form_dropdown('turma', $optTurmas, $optTurmas,$extra);

    $turno = array("manha" => "Manhã","tarde" => "Tarde","noite" => "Noite");
    $optTurno = array('turno' => $turno);
    $extra = array("class" => "form-control");


    echo form_label("Turno", "turno");
    echo form_dropdown('turno', $optTurno,"Noite",$extra);

    $options = array(
        'small'         => 'Small Shirt',
        'med'           => 'Medium Shirt',
        'large'         => 'Large Shirt',
        'xlarge'        => 'Extra Large Shirt',
    );

    $shirts_on_sale = array('small', 'large');
    echo form_dropdown('shirts', $options, 'large');

    ?>
    <br/>
    <?php
    //Cria um botão submit para enviar os dados
    echo form_button(array("class" => "btn btn-primary", "content" => "Cadastrar", "type" => "submit"));
    //Encerra formulario
    echo form_close();
    ?>
</div>
</body>
</html>
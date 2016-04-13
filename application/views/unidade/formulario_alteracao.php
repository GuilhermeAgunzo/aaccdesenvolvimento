<html lang="pt-br">
<head>
    <link rel="stylesheet" href="<?=base_url("css/bootstrap2.css")?>">
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
    <br/>
    <?php if($this->session->flashdata("success")) { ?>
        <p class="alert alert-success text-center"><?= $this->session->flashdata("success") ?></p>
    <?php } ?>
    <?php if($this->session->flashdata("danger")) { ?>
        <p class="alert alert-danger text-center"><?= $this->session->flashdata("danger") ?></p>
    <?php } ?>
    <h1 class="text-center">Alteração de unidade</h1>
    <?php
    //Inicia Formulario
    echo form_open("unidade/altera");

    //Cria um label e um campo de texto
    echo form_label("Codigo Centro Paula Souza", "codigo");
    echo form_input(array("name" => "codigo", "class" => "form-control", "id" => "codigo", "maxlength" => "50","value" => set_value("codigo","")));
    echo form_error('codigo');
    echo form_button(array("class" => "btn", "content" => "Pesquisar", "type" => "button"));

    ?>
    <br/>
    <?php

    //Cria um label e um campo numerico
    echo form_label("Nome", "nome");
    echo form_input(array("name" => "nome", "class" => "form-control", "id" => "nome", "maxlength" => "255","value" => set_value("nome"),""));
    echo form_error("nome");

    //Dropdown list Estados
    $uf = array("SP"=>"São Paulo","AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", "AP"=>"Amapá","BA"=>"Bahia","CE"=>"Ceará","DF"=>"Distrito Federal","ES"=>"Espírito Santo","GO"=>"Goiás","MA"=>"Maranhão","MT"=>"Mato Grosso","MS"=>"Mato Grosso do Sul","MG"=>"Minas Gerais","PA"=>"Pará","PB"=>"Paraíba","PR"=>"Paraná","PE"=>"Pernambuco","PI"=>"Piauí","RJ"=>"Rio de Janeiro","RN"=>"Rio Grande do Norte","RO"=>"Rondônia","RS"=>"Rio Grande do Sul","RR"=>"Roraima","SC"=>"Santa Catarina","SE"=>"Sergipe","TO"=>"Tocantins");

    $extra = array("class" => "form-control");
    echo form_label("Estado", "uf");
    echo form_dropdown('uf', $uf, 'São Paulo',$extra);

    echo form_label("Cidade", "cidade");
    echo form_input(array("name" => "cidade", "class" => "form-control", "id" => "cidade","value" => set_value("cidade","")));
    echo form_error("cidade");

    echo form_label("Bairro", "bairro");
    echo form_input(array("name" => "bairro", "class" => "form-control", "id" => "bairro","value" => set_value("bairro","")));
    echo form_error("bairro");

    //Cria um label e um textarea
    echo form_label("Endereço", "endereco");
    echo form_input(array("name" => "endereco", "class" => "form-control", "id" => "endereco","value" => set_value("endereco","")));
    echo form_error("endereco");

    echo form_label("Numero", "numero");
    echo form_input(array("name" => "numero", "class" => "form-control", "type" => "number", "id" => "numero","value" => set_value("numero","")));
    echo form_error("numero");

    echo form_label("Complemento", "complemento");
    echo form_input(array("name" => "complemento", "class" => "form-control", "id" => "complemento","value" => set_value("complemento","")));
    echo form_error("complemento");

    echo form_label("CEP", "cep");
    echo form_input(array("name" => "cep", "class" => "form-control", "id" => "cep", "type" => "number","value" => set_value("cep","")));
    echo form_error("cep");

    echo form_label("Telefone", "telefone");
    echo form_input(array("name" => "telefone", "class" => "form-control", "id" => "telefone", "type" => "number","value" => set_value("telefone","")));
    echo form_error("telefone");

    ?>
    <br/>
    <?php
    //Cria um botão submit para enviar os dados
    echo form_button(array("class" => "btn btn-primary", "content" => "Alterar", "type" => "submit"));
    //Encerra formulario
    echo form_close();
    ?>
</div>
</body>
</html>
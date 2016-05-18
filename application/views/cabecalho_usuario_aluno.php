<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <title>Aluno AACC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="AACC Gestão e Controle de Atividades Acadêmico - Científico Cultural" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url("css/bootstrap.css")?>" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="<?= base_url("css/style2.css")?>" rel='stylesheet' type='text/css' />
    <!-- font CSS -->
    <!-- font-awesome icons -->
    <link href="<?= base_url("css/font-awesome.css")?>" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js-->
    <script src="<?= base_url("js/jquery-1.11.1.min.js")?>"></script>
    <script src="<?= base_url("js/modernizr.custom.js")?>"></script>
    <!--webfonts-->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <!--animate-->
    <link href="<?= base_url("css/animate2.css")?>" rel="stylesheet" type="text/css" media="all">
    <script src="<?= base_url("js/wow.min.js")?>"></script>
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->
    <!-- Metis Menu -->
    <script src="<?= base_url("js/metisMenu.min.js")?>"></script>
    <script src="<?= base_url("js/custom.js")?>"></script>
    <link href="<?= base_url("css/custom.css")?>" rel="stylesheet">
    <!--//Metis Menu -->

</head>
<body class="cbp-spmenu-push">
<div class="main-content">
    <!--left-fixed -navigation-->

    <div class=" sidebar" role="navigation">
        <div class="navbar-collapse">
            <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
                <ul class="nav" id="side-menu">
                    <li class="">
                        <a href="#"><i class="fa fa-desktop nav_icon"></i>Tutorial<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <?=anchor(base_url('index.php/usuario_aluno/tutorial_aluno/'), 'Exibir Tutorial do Aluno', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                        </ul>
                        <!-- /nav-second-level -->
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-question-circle nav_icon"></i>Perguntas Frequentes<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <?=anchor(base_url('index.php/usuario_aluno/perguntas_frequentes/'), 'Exibir Perguntas Frequentes', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                        </ul>
                        <!-- /nav-second-level -->
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-search nav_icon"></i>Consulta de Horas<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <?=anchor(base_url('index.php/usuario_aluno/pesquisa_horas/'), 'Pesquisa de Horas Concluídas', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-pencil-square nav_icon"></i>Cadastro de AACC's<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <?=anchor(base_url('index.php/usuario_aluno/cadastrar_relatorio/'), 'Cadastrar Relatório de AACC', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                        </ul>
                        <!-- /nav-second-level -->
                    </li>
                    <!-- /nav-second-level -->
                </ul>
                <!-- //nav-second-level -->

                <div class="clearfix"> </div>
                <!-- //sidebar-collapse -->
            </nav>
        </div>
    </div>

    <!--left-fixed -navigation-->

    <!-- header-starts -->
    <div class="sticky-header header-section ">
        <div class="header-left">
            <!--toggle button start-->
            <button id="showLeftPush"><i class="fa fa-bars"></i></button>
            <!--toggle button end-->
            <!--logo -->
            <div class="logo">
                <a href="#">
                    <h1>AACC</h1>
                    <span>Aluno</span>
                </a>
            </div>
            <!--//logo-->
            <div class="clearfix"> </div>
        </div>
        <div class="header-right">
            <div class="profile_details_left">
                <!--notifications of menu start -->

            </div>
            <!--notification menu end -->
            <div class="profile_details">
                <ul>
                    <li class="dropdown profile_details_drop">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <div class="profile_img">
                                <span class="prfil-img"><img src="<?= base_url("images/a.png")?>" alt=""> </span>
                                <div class="user-name">
                                    <p>Usuário</p>
                                    <span>Aluno</span>
                                </div>
                                <i class="fa fa-angle-down lnr"></i>
                                <i class="fa fa-angle-up lnr"></i>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        <ul class="dropdown-menu drp-mnu">
                            <li>
                                <i class="fa fa-home">
                                    <?=anchor(base_url('index.php/usuario_aluno/index/'), 'Página Inicial', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                                </i>
                            </li>
                            <li>
                                <i class="fa fa-desktop">
                                    <?=anchor(base_url('index.php/usuario_aluno/tutorial_aluno/'), 'Tutorial', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                                </i>
                            </li>
                            <li>
                                <i class="fa fa-cog">
                                    <?=anchor(base_url('index.php/usuario/configuracaoaluno/'), 'Configurações', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                                </i>
                            </li>
                            <li>
                                <i class="fa fa-sign-out">
                                    <?=anchor(base_url('index.php/acesso/logout/'), 'Sair', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                                </i>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- //header-ends -->

    <!-- CONTEUDO DA PAGINA -->
    <div id="page-wrapper">
        <div class="main-page">


            <?php if($this->session->flashdata("success")): ?>
                <p class="alert alert-success mensagemavisohome" id="aviso"><?= $this->session->flashdata("success"); ?></p>
            <?php endif; ?>

            <?php if($this->session->flashdata("danger")): ?>
                <p class="alert alert-danger mensagemavisohome" id="aviso"><?= $this->session->flashdata("danger"); ?></p>
            <?php endif; ?>

            <?php if(isset($mensagemSucesso)): ?>
                <p class="alert alert-success mensagemavisohome" id="aviso"><?= $mensagemSucesso ?></p>
            <?php endif; ?>

            <?php if(isset($mensagemErro)): ?>
                <p class="alert alert-danger mensagemavisohome" id="aviso"><?= $mensagemErro ?></p>
            <?php endif; ?>

            <?php
                unset(
                    $_SESSION['success'],
                    $_SESSION['danger']
                );
            ?>

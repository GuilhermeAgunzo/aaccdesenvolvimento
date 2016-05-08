<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <title>Administrador AACC</title>
    <script type="text/javascript" src="<?= base_url("js/jquery-1.2.6.pack.js")?>"></script><script type="text/javascript" src="<?= base_url("js/jquery.maskedinput-1.1.4.pack.js")?>"></script>
    <script type="text/javascript">$(document).ready(function(){
            $("#cpf").mask("999.999.999-99");
            $("#telefone").mask("(99)9999-99999");
        });
    </script>

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
                        <a href="#"><i class="fa fa-book nav_icon"></i>Cadastro de  Aluno<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <?=anchor(base_url('index.php/aluno/cadastro_aluno'), ' Cadastrar Aluno',array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/aluno/pesquisar_aluno'), ' Pesquisar Aluno',array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/aluno/alterar_aluno'), ' Alterar Aluno', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/aluno/desativar_cadastro'), ' Desativar Aluno', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-book nav_icon"></i>Cadastro de Avisos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <?=anchor(base_url('index.php/aviso/cadastrar_aviso/'), ' Cadastrar Avisos',array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/aviso/pesquisar_aviso/'), ' Pesquisar Avisos', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/aviso/alterar_aviso/'), ' Alterar Avisos',array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-book nav_icon"></i>Cadastro de  Curso<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <?=anchor(base_url('index.php/curso/cadastro_curso'), ' Cadastrar Curso', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-book nav_icon"></i>Cadastro de Evento<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <?=anchor(base_url('index.php/evento/cadastrar_evento'), ' Cadastrar Evento', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/evento/pesquisar_evento'), ' Pesquisar Evento', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/evento/alterar_evento'), ' Alterar Evento',array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-book nav_icon"></i>Cadastro Motivo Indeferimento<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <?=anchor(base_url('index.php/indeferimento/cadastrar_indeferimento'), ' Cadastrar Motivo do Indeferimento', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/indeferimento/pesquisar_indeferimento'), ' Pesquisar Motivo do Indeferimento', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/indeferimento/alterar_indeferimento'), ' Alterar Motivo do Indeferimento', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-book nav_icon"></i>Cadastro de Professor<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <?=anchor(base_url('index.php/professor/cadastro_professor/'), ' Cadastrar Professor', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/professor/pesquisar_professor/'), ' Pesquisar Professor', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/professor/alterar_professor/'), ' Alterar Professor', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/professor/desativar_cadastro_professor/'), ' Desativar Professor', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-book nav_icon"></i>Cadastro de Turma<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <?=anchor(base_url('index.php/turma/cadastrar_turma'), ' Cadastrar Turma', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/turma/pesquisar_turma'), ' Pesquisar Turma', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/turma/alterar_turma'), ' Alterar Turma', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-book nav_icon"></i>Cadastro de Tipo de Atividade<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <?=anchor(base_url('index.php/tipoAtividade/cadastrar_tipoAtividade'), ' Cadastrar Atividade', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/tipoAtividade/pesquisar_tipoAtividade'), ' Pesquisar Atividade', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/tipoAtividade/alterar_tipoAtividade'), ' Alterar Atividade', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-book nav_icon"></i>Cadastro de Unidade<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <?=anchor(base_url('index.php/unidade/cadastrar_unidade'), ' Cadastrar Unidade', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/unidade/pesquisar_unidade'), ' Pesquisar Unidade', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/unidade/alterar_unidade'), ' Alterar Unidade', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-group nav_icon"></i>Assuntos Referentes aos Alunos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <?=anchor(base_url('index.php/aluno/controle_entrega_declaracao_aluno/'), 'Controle de Entrega das Declarações de Alunos', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/aluno/controle_transferencia_aluno/'), 'Controle de Transferência de Alunos', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/aluno/emissao_declaracao/'), 'Emissão de Declaração de Alunos', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/aluno/relatorio_aluno/'), 'Relatório de Alunos', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/aluno/relatorio_evento/'), 'Relatório de Eventos', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/aluno/validacao_relatorio/'), 'Validação de AACCs', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-file-text-o nav_icon"></i>Documentos Secretaria<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <?=anchor(base_url('index.php/professor/relatorio_protocolo_entregas/'), 'Relatório de Protocolo de Entregas', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                            <li>
                                <?=anchor(base_url('index.php/professor/anexo_documento_comprobatorio/'), 'Anexo de Documento Comprobatório', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                            </li>
                        </ul>
                    </li>
                </ul>
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
                    <span>Admin</span>
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
                                    <span>Administrador</span>
                                </div>
                                <i class="fa fa-angle-down lnr"></i>
                                <i class="fa fa-angle-up lnr"></i>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        <ul class="dropdown-menu drp-mnu">
                            <li>
                                <i class="fa fa-cog">
                                    <?=anchor(base_url('index.php/usuario/configuracaoadm'), 'Configurações', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                                </i>
                            </li>
                            <li>
                                <i class="fa fa-user">
                                    <?=anchor(base_url('index.php/usuario/configuracaoadm'), 'Perfil', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
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


            <div class="profile_details">
                <ul>
                    <li class="dropdown profile_details_drop">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <div class="profile_img">
                                <span class="prfil-img"><img src="<?= base_url("images/home.png")?>" alt=""> </span>
                                <div class="user-name">
                                    <p>Início</p>
                                    <span>Administrador</span>
                                </div>
                                <i class="fa fa-angle-down lnr"></i>
                                <i class="fa fa-angle-up lnr"></i>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        <ul class="dropdown-menu drp-mnu">
                            <li>
                                <i class="fa fa-home">
                                    <?=anchor(base_url('index.php/administrador/index/'), 'Página Inicial', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
                                </i>
                            </li>
                            <li>
                                <i class="fa fa-desktop">
                                    <?=anchor(base_url('index.php/administrador/tutorial_professor/'), 'Tutorial', array('class'=>'', 'id'=>'', 'title'=>'')); ?>
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
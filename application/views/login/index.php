<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>AACC - FATEC</title>
    <link  rel="stylesheet"  href="<?= base_url("css/bootstrap.css")?>" type="text/css" media="all" >

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src='<?= base_url("js/jquery.min.js") ?>' ></script>
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href='<?= base_url("css/style.css") ?>' rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!--//fonts-->
    <script type="text/javascript" src='<?= base_url("js/move-top.js") ?>' ></script>
    <script type="text/javascript" src='<?= base_url("js/easing.js") ?> '></script>
</head>
<!--header-->
<body>
<div class="header">
    <div class="container">




        <div class="header-top">

            <div class="top-nav">
                <span class="menu"> </span>
                <ul>
                    <li class="active" ><a href="#" class="scroll">Home<label class="line"> </label></a></li>
                    <li><a href="#about" class="scroll">Login<label class="line"> </label></a></li>
                </ul>
                <!-- script-nav -->
                <script>
                    $("span.menu").click(function(){
                        $(".top-nav ul").slideToggle(500, function(){
                        });
                    });
                </script>
                <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $(".scroll").click(function(event){
                            event.preventDefault();
                            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                        });
                    });
                </script>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="header-matter">
            <h2>Bem-vindo ao portal de Gestão e controle da <span>AACC</span></h2>
            <p>Atividades <span> Acadêmico</span>-Científico-<span>Cultural</span></p>
            <a href="#about" class="scroll" ><img class="scroll" alt="" src= <?= base_url("images/down.png")?>  /></a>
        </div>
    </div>
</div>



<!--content-->
<div class="content">
    <div class="container">

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

        <div class="about" id="about">

            <div class="about-left left-about">

                <small>Acesso ao Sistema</small>
                <h3><span>Login</span> </h3>
                <p></p>

                <!--Formulário de Login-->
                <?php
                echo "</br>";
                $atributos = array('class' => 'form-horizontal');
                echo form_open('acesso/login', $atributos);
                echo "<div class='form-group'>";
                echo form_label("Email ", "email", array("class" => "col-sm-2 control-label"));
                echo "<div class='col-sm-10'>";
                echo form_input(array("name" => "email", "required" => "required","type" => "email", "class" => "form-control", "maxlength" => "80"));
                echo "</div>";
                echo "</div>";

                echo "</br>";

                echo "<div class='form-group'>";
                echo form_label("Senha ", "senha", array("class" => "col-sm-2 control-label"));
                echo "<div class='col-sm-10'>";
                echo form_password(array("name" => "senha", "id" => "senha" ,"required" => "required","type" => "password","class" => "form-control", "maxlength" => "80"));
                echo "</div>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<div class='col-sm-offset-2 col-sm-10'>";
                echo form_button(array("class" => "btn btn-default", "content" => "Entrar", "type" => "submit"));
                echo "</div>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo anchor(base_url('index.php/usuario/recuperarsenha'), 'Esqueci minha senha',array('class'=>'', 'id'=>'', 'title'=>''));
                echo "</div>";

                echo form_close();

                ?>
            </div>
            <div class="about-left">

                <H1>AVISOS</H1>
                <P>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat ultrices arcu vitae molestie.
                    Quisque eget lacus id eros cursus convallis. Sed sit amet mauris sagittis, elementum tellus quis, pretium augue.
                    Nulla sodales quis sem a condimentum. Aenean in facilisis metus. Sed rutrum arcu tempor, pretium mauris et, laoreet
                    ante. Duis aliquet tortor ac dolor auctor porttitor. Integer bibendum elementum odio, in imperdiet felis pretium vel.
                    Pellentesque malesuada id odio vitae posuere. Nulla porttitor urna et neque finibus fermentum. Donec risus massa, imperdiet quis risus sed, facilisis scelerisque metus.</p>

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!---->




    <!--footer-->
    <div class="footer">
        <div class="container">
            <div class="footer-class">
                <p class="footer-grid">&copy; 2016 AACC</p>
                <ul class="social-ic-icons">
                    <li class="facebook"><a href="https://www.facebook.com/centropaulasouza/" target="_blank"><span> </span></a></li>
                    <li class="twitter"><a href="https://twitter.com/paulasouzasp" target="_blank"><span> </span></a></li>
                </ul>
                <div class="clearfix"> </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                /*
                 var defaults = {
                 containerID: 'toTop', // fading element id
                 containerHoverID: 'toTopHover', // fading element hover id
                 scrollSpeed: 1200,
                 easingType: 'linear'
                 };
                 */

                $().UItoTop({ easingType: 'easeOutQuart' });

            });
        </script>
        <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    </div>

</body>
</html>

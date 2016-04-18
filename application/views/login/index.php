<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>AACC</title>
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
            <h2>Bem vindo ao portal de Gestão e controle da <span>AACC</span></h2>
            <p>Atividades <span> Acadêmico</span>-Científico-<span>Cultural</span></p>
            <a href="#about" class="scroll" ><img src="images/down.png" class="scroll" alt="" /></a>
        </div>
    </div>
</div>



<!--content-->
<div class="content">
    <div class="container">
        <div class="about" id="about">

            <div class="about-left left-about">

                <small>Acesso ao Sistema</small>
                <h3><span>Login</span> </h3>
                <p></p>

                <!--Formulário de Login-->
                <?php
                echo form_open("");
                echo form_label("Usuário ", "nome");echo "</br>";
                echo form_input(array("name" => "nome", "id" => "nome" ,"class" => "form-control", "maxlength" => "80"));
                echo "</br>"."</br>";
                echo form_label("Senha ", "senha");echo "</br>";
                echo form_password(array("name" => "senha", "id" => "senha" ,"class" => "form-control", "maxlength" => "80"));echo "</br>"."</br>";
                // Radio Button
                echo form_checkbox(array("name" => "admin","id" => "admin","value" => "1", "class" => ""),FALSE);
                echo form_label("Administrador?", "admin");
                echo "</br>";
                echo "</br>";
                echo form_button(array("class" => "browse", "content" => "Entrar", "type" => "submit"));
                echo "</br>";echo "</br>";

                ?>
                <a href="<?= base_url("#") ?>"><i class=""></i>Esqueceu a senha?</a>
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
                <p class="footer-grid">&copy; 2016 <a href="http://w3layouts.com/" target="_blank">AACC</a> </p>
                <ul class="social-ic-icons">
                    <li class="facebook"><a href="#"><span> </span></a></li>
                    <li class="gmail"><a href="#"><span> </span></a></li>
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

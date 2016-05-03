<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>AACC</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="AACC Gestão e Controle de Atividades Acadêmico - Científico Cultural" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?= base_url("css/style_senha.css")?>" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
</head>
<body>
	<!-- main -->
		<div class="main">
			<div class="main-info2">
				<h3>Recadastro de Senha</h3>
				<div class="in-form">
					<?php
						$atributos = array('class' => 'form-horizontal');
						echo form_open('email/send', $atributos);
						echo "<div class='centralizarForm'>";
						echo form_input(array("name" => "senhaNova", "id" => "recadastroDeSenha" ,"class" => "", "maxlength" => "80", "placeholder" => "Senha nova"));
						echo "<br>"."<br>";
						echo form_input(array("name" => "confirmarSenhaNova", "id" => "recadastroDeSenha" ,"class" => "", "maxlength" => "80", "placeholder" => "Confirmar senha nova"));
						echo "</div>";
						echo form_button(array("class" => "check-sub", "type" => "submit", "content" => "Entrar"));
						echo form_close();
					?>
				</div>
			</div>
			<div class="copy-right">
				<p>Design by <a>AACC</a></p>
			</div>
		</div>
	<!-- //main -->
</body>
</html>
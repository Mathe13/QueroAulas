<!DOCTYPE HTML>
<!--
	Prologue by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
	<?PHP
		require_once '../php/init.php';
		session_start();	
		require_login();
		$user = info($_SESSION['user_id'],"Aluno");
	?>
		<title>Painel do Aluno</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<div id="header">

				<div class="top">

					<!-- Logo -->
					<!-- COLOCAR FOTO DO PERFIL -->
						<div id="logo">
							<span class="image avatar48"><img src="images/avatar.png" alt="" style="background-color: #2F4F4F;" /></span>
							<h1 id="title" style="text-align: left; margin-left: 60px; padding-top: 12px;"><?PHP echo$user['Nome']; ?></h1>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<!--

								Prologue's nav expects links in one of two formats:

								1. Hash link (scrolls to a different section within the page)

								   <li><a href="#foobar" id="foobar-link" class="icon fa-whatever-icon-you-want skel-layers-ignoreHref"><span class="label">Foobar</span></a></li>

								2. Standard link (sends the user to another page/site)

								   <li><a href="http://foobar.tld" id="foobar-link" class="icon fa-whatever-icon-you-want"><span class="label">Foobar</span></a></li>

							-->
							<ul>
								<li><a href="#top" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Voltar</span></a></li>
							</ul>
						</nav>

				</div>

				<div class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="https://twitter.com/" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.facebook.com/" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="https://github.com/" class="icon fa-github"><span class="label">Github</span></a></li>
							<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
							<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
						</ul>

				</div>

			</div>

		<!-- Main -->
			<div id="main">

				<!-- Intro -->
					<section id="top" class="one dark cover">
						<div class="container">
						<h2>Perfil do professor: var_prof</h2>
						</div>
					</section>

				<!-- Portfolio -->
					<section id="portfolio" class="two">
						<div class="container">

						<header>
							<h2 >Matérias que ensina:</h2>
						</header>
							<p>Tabela das materias que o prof ministra aqui</p>
						</div>
					</section>

				<!-- About Me -->
					<section id="about" class="three">
						<div class="container">
						<h2>Minhas Informações</h2>
							<p style="text-align: justify;">&emsp;&emsp;Olá, me chamo var_prof e te ofereço aulas particulares em diversas matérias! Venha comigo e faça a diferença na hora daquela prova, teste e trabalhos escolares! Entre em contato através do formulário abaixo.</p>
						</div> 
					</section>

				<!-- Contact -->
					<section id="contact" class="four">
						<div class="container">

							<header>
							<h3>Interessado? Contate o prof. <?php echo$user['Nome']; ?>:</h3>
							<p>Envie perguntas ou sugestões. Irei responder assim que possível.</p>
							</header>

							<form method="post" action="#">
								<div class="row">
									<div class="6u 12u$(mobile)"><input type="text" name="name" placeholder="Nome" /></div>
									<div class="6u$ 12u$(mobile)"><input type="text" name="email" placeholder="Email" /></div>
									<div class="12u$">
										<textarea name="message" placeholder="Mensagem"></textarea>
									</div>
									<div class="12u$">
										<input type="submit" value="Enviar Mensagem" />
									</div>
								</div>
							</form>

						</div>
					</section>

			</div>

		<!-- Footer -->
			<div id="footer">

				<!-- Copyright -->
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollzer.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script>
			function myFunction() {
				document.getElementById("nome").disabled = false;	
				document.getElementById("email").disabled = false;
				document.getElementById("telefone").disabled = false;
				document.getElementById("curso").disabled = false;
				document.getElementById("instituicao").disabled = false;
				<?php
				echo '
				document.getElementById("nome").value = "'.$user['Nome'].'";
				document.getElementById("telefone").value = "'.$user['Telefone'].'";
				document.getElementById("email").value = "'.$user['Email'].'"	;
				document.getElementById("curso").value = "'.$user['Curso'].'";
				document.getElementById("instituicao").value = "'.$user['Instituicao'].'";				
				';
				?>
			}
</script>

	</body>
</html>
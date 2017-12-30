<!DOCTYPE HTML>
<html>
	<head>
	<?PHP
		require_once '../php/init.php';
		session_start();
		require_login();
		$user = info($_SESSION['user_id'],"Admin");
	?>
		<title>Painel do Administrador</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<style>
			table, td, th { border: 1px solid #000; text-align: left; width: auto; height: 10px;}

			table { border-collapse: collapse; width: 600px;}

			th { padding: 5px; font-weight: bolder; text-align: center;
				 background-color: #000000; color: #FFFFFF;}

			td { padding: 5px; background-color: #E8E8E8; color: #000000; margin-left: 20px; text-align: center;}
		</style>
	</head>
	<body>

		<!-- Header -->
			<div id="header">

				<div class="top">

					<!-- Logo -->
					<!-- COLOCAR FOTO DO PERFIL -->
						<div id="logo">
							<span class="image avatar48"><img src="images/avatar.png" alt="" style="background-color: white;" /></span>
							<h1 id="title"><?PHP echo$user['Nome']; ?></h1>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="#top" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Home</span></a></li>
								<li><a href="#portfolio" id="portfolio-link" class="skel-layers-ignoreHref"><span class="icon fa-th">Adicionar matérias</span></a></li>
								<li><a href="#about" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-user">Reportagens</span></a></li>
								<li><a href="../"><span class="icon fa-envelope">Sair</span></a></li>
							</ul>
						</nav>
				</div>
			</div>

		<!-- Main -->
			<div id="main">

				<!-- Intro -->
					<section id="top" class="one dark cover">
						<div class="container">
						<h2 style="size: 25px; margin-top: -50px; margin-bottom: -40px; font-weight: bold;">Seja bem-vindo!<br>Admin:
						<?PHP echo $user['Nome']; ?></h2>
						</div>
					</section>

				<!-- Portfolio -->
					<section id="portfolio" class="two">
						<div class="container">

						<header>
							<h2>Adicionar novas matérias</h2>
						</header>
							<form name="cad_materia" method="POST" action="cadas_materia.php">
								<input type="text" name="new_materia" size="30"><br>
								<input type="submit" value="Cadastrar">
							</form>
							<br>
						</div>
						<div>
						<header>
						<h2>Todas matérias cadastradas</h2>
						</header>
						<center>
						<?php
						$pdo = db_connect();
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$consulta = $pdo->query("SELECT Id, materia FROM Materias;");
						echo "<table>
						  <tr>
						    <th><center>Id</center></th>
						    <th>Matéria</th>
						    <th>Ação</th>
						  </tr>";
						while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
						   echo "
							<form name='formm' action='../php/exclui_Mat.php' method='POST'>
						   <tr>
						   <td><center>{$linha['Id']}</center></td>
						   <td>{$linha['materia']}</td>
						   <td><button>Deletar</button></td>
						   <input type='hidden' name='id_mat' value='".$linha['Id']."'>
						   </form>
						   </tr>
						    ";
						} echo "</table>";
						?>
						</center>
						</div>
					</section>

				<!-- About Me -->
					<section id="about" class="three">
						<div class="container">

						<h2>Reportagens</h2>
							<!--area reportagens-->
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

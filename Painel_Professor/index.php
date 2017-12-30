<!DOCTYPE HTML>

<html>
	<head>
	<?php
		require_once '../php/init.php';
		session_start();
		require_login();
		$user = info($_SESSION['user_id'],"Professor");
	?>
		<title>Painel do Professor</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<style>
			table, td, th { border: 1px solid #000; text-align: left; width: auto; height: 10px;}

			table { border-collapse: collapse; width: 600px;}

			th { padding: 5px; font-weight: bolder; text-align: center;
				 background-color: #000000; color: #FFFFFF; font-family: Tahoma;}

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
							<span class="image avatar48"><img src="images/avatar2.png" alt="" style="background-color: white;" /></span>
							<h3 id="title" style="text-align: left; margin-left: 60px;"><?PHP echo$user['Nome']; ?></h3>
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
								<li><a href="#top" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Home</span></a></li>
								<li><a href="#portfolio" id="portfolio-link" class="skel-layers-ignoreHref"><span class="icon fa-th">Gerenciar Matérias</span></a></li>
								<li><a href="#hora" id="hora-link" class="skel-layers-ignoreHref"><span class="icon fa-th">Gerenciar Horarios</span></a></li>
								<li><a href="#about" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-user">Editar Conta</span></a></li>
								<li><a href="#contact" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-envelope">Contate-nos</span></a></li>
								<li><a href="../"><span class="icon fa-envelope">Sair</span></a></li>
							</ul>
						</nav>

				</div>

				<div class="bottom">

					<!-- Social Icons -->
					<!--
						<ul class="icons">
							<li><a href="https://twitter.com/" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.facebook.com/" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="https://github.com/" class="icon fa-github"><span class="label">Github</span></a></li>
							<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
							<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
						</ul>
					-->
				</div>

			</div>

		<!-- Main -->
			<div id="main">

				<!-- Intro -->
					<section id="top" class="one dark cover">
						<div class="container">
						<h2>Bem-vindo Professor!</h2>
						</div>
					</section>

<!-- Portfolio -->
					<section id="portfolio" class="two">
						<div class="container">
							<center><h2>Gerenciador Matérias</h2></center>
							<?php
						$pdo = db_connect();
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$consulta = $pdo->query("SELECT Id, materia FROM Materias;");
						echo "<form name='addm' method='POST' action='../php/addM.php'>
						<select name='materia' width='20'>";
						while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
						    echo "
						    <center><option>{$linha['materia']}</option></center>
						    ";
						} echo '</select>
						<br>

						valor: <input type="text" name="Valor" id="Valor" placeholder="Digite o valor da Hora/Aula 00,00" required/>


						<input type="submit" value="Adicionar">
						<input type="hidden" name="id_prof" value="'.$user['ID'].'">
						</form>';

						?>

						<center>
						<?php
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$consulta = $pdo->query("SELECT Id_Mat,Valor FROM Prof_X_Mat WHERE Id_Prof='".$user['ID']."';");

						echo "<br><table>
						  <tr>
						  <center>
						    <th>Matérias</th>
								<th>Valor Hora/aula</th>
						    <th>Ação</th>
						  </tr>";
						while ($ids = $consulta->fetch(PDO::FETCH_ASSOC)) {//ids contem a id da materia
							//echo $ids['Id_Mat'];id da materia
							$consultaM = $pdo->query("SELECT materia FROM Materias WHERE Id ='".$ids['Id_Mat']."';");
							$linha = $consultaM->fetch(PDO::FETCH_ASSOC);
						    echo "
						    <tr>
						    <form name='apagamateria' method='POST' action='../php/exclui_MatProf.php'>
						    <td>{$linha['materia']}</td>
								<td>{$ids['Valor']}</td>
						    <input type='hidden' name='id_mat' value='".$ids['Id_Mat']."'>
						    <input type='hidden' name='id_prof' value='".$user['ID']."'>
						    <td><button>Deletar</button></td>
							</form>
						    </center>
						    </tr>
						    ";
						} echo "</table>";
						?>
						</center>
						</div>


					</section>
				<!--
					essa section serve pra gerenciar os horarios

			-->
			<!-- Portfolio -->
								<section id="hora" class="none">
									<div class="container">
										<center><h2>Gerenciador de Horarios</h2></center>
							<?php

									$PDO = db_connect();
									$sql = "SELECT * FROM Horario WHERE id_prof = :id_prof";
									$stmt = $PDO->query($sql);
									$stmt = $PDO->prepare($sql);//prepara script
									$stmt->bindParam(':id_prof', $user['ID']);
									$stmt->execute();
									echo "<center>";
									while ($result_horarios = $stmt->fetch(PDO::FETCH_ASSOC)) {
										$disponivel;
										if($result_horarios['disponivel']==1){
											$disponivel="disponivel";
										}else {
											$disponivel="indisponivel";
										}
										echo "<table>";
										echo "<form name='apaga_horario' method='POST' action='../php/apaga_horario.php'>";
										echo '<td>'.$result_horarios['dia_inicio'].'</td>';//dia de inicio
										echo '<td>'.$result_horarios['hora_inicio'].'</td>';//hora de inicio
										echo '<td>'.$result_horarios['dia_fim'].'</td>';//dia que termina
										echo '<td>'.$result_horarios['hora_fim'].'</td>';//hora que termina
										echo '<td>'.$disponivel.'</td>';

										echo'<input type="hidden" name="Id" value="'.$result_horarios['id_horario'].'"/>';


										echo '<td><input type="submit" value="Apagar" name="apaga"></td>';
										//campos hidden passado para a escolha
											echo "</form>";
											echo "</table>";
											echo "</center>";

									}
								echo "
								<form name='add hora' method='POST' action='../php/add_hora.php'>

									<h3>Adicionar novo horario</h3>
									<center>

									<table align='center'>
									<tr>

											<td>
													Horario de inicio:
											</td>
											<td>
											<select name='dia_inicio' required id='dia_inicio'>
												<option value='segunda' selected>Segunda</option>
												<option value='terca' >Terça</option>
												<option value='quarta'>Quarta</option>
												<option value='quinta'>Quinta</option>
												<option value='sexta'>Sexta</option>
												<option value='sabado'>Sabado</option>
												<option value='domingo'>Domingo</option>
											</select>
											</td>
											<td>
												<input type='time' name='hora_inicio' id=hora required/>
											</td>
											</tr>
											<tr>

											<td>
													Horario de termino:
											</td>
											<td>
											<select name='dia_fim' required id='dia_fim'>
												<option value='segunda' selected>Segunda</option>
												<option value='terca' >Terça</option>
												<option value='quarta'>Quarta</option>
												<option value='quinta'>Quinta</option>
												<option value='sexta'>Sexta</option>
												<option value='sabado'>Sabado</option>
												<option value='domingo'>Domingo</option>
											</select>
											</td>
											<td>

												<input type='time' name='hora_fim' id=hora required/>
											</td>
											</tr>

									</table>
										<input type='hidden' name='id_prof' value='".$user['ID']."' />
										<input type='submit' value='Adicionar horario' />
									</center>





									</form>";


									?>
									<!--<center>
										Dia/hora de inicio : <input type='datetime-local' name='data_inicio'>
										<br />
										Dia/hora de termino : <input type='datetime-local' name='data_fim'>
									</center>-->

									</div>
								</section>

				<!-- About Me -->
					<section id="about" class="three">
						<div class="container">

						<h2>Minhas Informações</h2>

							<form action="../php/atualizar_Prof.php" method="POST">

								<?PHP


									echo '
									<th>Usuário: <input type="text" class="perfil" name="nome" id="nome" size="20"  placeholder="'.$user['Nome'].'" required disabled="true"  /></th>
									E-mail: <input type="email" class="perfil" name="email" id="email" size="20"  placeholder="'.$user['Email'].'" required disabled="true" />
									Formação: <input type="text"   class="perfil" name="formacao" id="formacao"size="20"  placeholder="'.$user['Formacao'].'" required disabled="true" />
		 							Instituiçao: <input type="text" class="perfil"  name="instituicao" id="instituicao" size="20"  placeholder="'.$user['Instituicao'].'" required disabled="true" />
									Telefone: <input type="text"   class="perfil" name="telefone" id="telefone" size="20"  placeholder="'.$user['Telefone'].'" maxlenght="15" required disabled="true" /><br>
									<input type="hidden" name="id" value="'.$user['ID'].'"/>
			      				';?>
									<input type="submit" value="Salvar" style="padding-bottom: 20px;padding-left: 80px;padding-right: 80px;padding-top: 20px; font-size: 82%;font:inherit;">
									<button type="button" onclick="myFunction()" style="padding-bottom: 20px;padding-left: 80px;padding-right: 80px;padding-top: 20px; font-size: 82%;font:inherit;">Editar</button>

							</form>

						</div>

					</section>

				<!-- Contact -->
					<section id="contact" class="four">
						<div class="container">

							<header>
								<h2>Contate-nos</h2>
							</header>

							<p>Envie perguntas ou sugestões. Iremos responder assim que possível.</p>

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
				document.getElementById("formacao").disabled = false;
				document.getElementById("instituicao").disabled = false;
				<?php
				echo '
				document.getElementById("nome").value = "'.$user['Nome'].'";
				document.getElementById("telefone").value = "'.$user['Telefone'].'";
				document.getElementById("email").value = "'.$user['Email'].'"	;
				document.getElementById("formacao").value = "'.$user['Formacao'].'";
				document.getElementById("instituicao").value = "'.$user['Instituicao'].'";
				';
				?>
			}

</script>

	</body>
</html>

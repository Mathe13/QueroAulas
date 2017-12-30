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
								<li><a href="#top" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Home</span></a></li>
								<li><a href="#portfolio" id="portfolio-link" class="skel-layers-ignoreHref"><span class="icon fa-th">Buscar Professores</span></a></li>
								<li><a href="#about" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-user">Editar Conta</span></a></li>
								<li><a href="#contact" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-envelope">Contate-nos</span></a></li>
								<li><a href="../"><span class="icon fa-envelope">Sair</span></a></li>
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
						<h2>Bem Vindo ao Portal do Aluno</h2>
						</div>
					</section>

				<!-- Portfolio -->
					<section id="portfolio" class="two">
						<div class="container">

						<header>
							<h2 >Procurar Matéria</h2>
						</header>

							<form name="buscar" id="buscar" method="POST" action="index.php#portfolio">
								<div id="divBusca" style="margin-left: 32%">
									<input type="text" style="padding-top: 0px;color: white;margin-top: 4px;margin-left: 4px;" id="txtBusca" name="txtBusca" placeholder="Digite a matéria a ser procurada"/>


									<a href="javascript:document.getElementById('buscar').submit();">
										<img src="images/ic_search_white_48dp_1x.png" style="padding-top: 3px;padding-bottom: 0px;margin-left: 5%" alt="Submit" width="25" height="25" >
									</a>
									<!--<button>teste</button>-->
								</div>
							</form>
						</div>
						<div id="tabela-prof">

						  <tr>
						  <form name='escolhe_prof' method='POST' action='index.php'>

								<?php
								$PDO = db_connect();//conecta no baco
								if($_POST) {
									$materia = $_POST['txtBusca'];
									if($materia!=""){
										$Dados_prof = array('Nome' => '','Id' =>'','valor'=>'' );//vai passar valores para o escolhe-prof

								$sql="SELECT * FROM Materias WHERE materia like :materia";
								$stmt = $PDO->prepare($sql);//prepara script
								$stmt->bindParam(':materia', $materia);
								$stmt->execute();
								//$result_id_mat = $stmt->fetchAll(PDO::FETCH_ASSOC);//contem a id das materias q parecem com a digitada
								//if(count($result_id_mat)<=0){

								echo '
								<center>
								<br><table align="center">
									<tr>

										<th><td>
											Nome
										</td></th>

										<th><td>
											Leciona
										</td></th>

										<th><td>
											R$ Hora Aula
										</td></th>

										<th><td>
											Ver horarios
										</td></th>


									</tr>

								';//cabeçalho da tabela-fim
								//}else{
									//while($result_id_mat!=NULL){
									while ($result_id_mat = $stmt->fetch(PDO::FETCH_ASSOC)) {
										//echo $result_id_mat['Id'];
										$sql="SELECT Id_Prof,Valor FROM Prof_X_Mat WHERE Id_Mat like :Id_Mat";
										$stmt = $PDO->prepare($sql);//prepara script
										$stmt->bindParam(':Id_Mat', $result_id_mat['Id']);
										echo'<input type="hidden" name="id_mat" value="'.$result_id_mat['Id'].'"/>';
										$stmt->execute();
										//if(count($result_id_mat)<=0){
										//	echo'<SCRIPT Language="javascript">
											//alert("me desculpe,mas não achamos nada relevante :(");
											//location.href="../index.html#services";
											//</SCRIPT>';
										//}
										while ($result_id_Prof = $stmt->fetch(PDO::FETCH_ASSOC)) {//pegou id do professor
											//echo $result_id_Prof['Id_Prof'];
											$sql="SELECT Nome FROM Professor WHERE ID like :Id_Prof";
											$stmt = $PDO->prepare($sql);//prepara script
											$stmt->bindParam(':Id_Prof', $result_id_Prof['Id_Prof']);
											$stmt->execute();
											while ($result_Nome_Prof = $stmt->fetch(PDO::FETCH_ASSOC)) {


												echo '<th><td>'.$result_Nome_Prof['Nome'].'</td></th>';//nome do professor
												echo '<th><td>'.$materia.'</td></th>';//leciona
												echo '<th><td>'.$result_id_Prof['Valor'].'</td></th>';
												echo '<th><td><input type="submit" value="Selecionar" name="selecionou"></td></th>';

												echo "<center>";
												//campos hidden passado para a escolha

												echo'<input type="hidden" name="Nome" value="'.$result_Nome_Prof['Nome'].'"/>';
												echo'<input type="hidden" name="id_prof" value="'.$result_id_Prof['Id_Prof'].'"/>';
												echo'<input type="hidden" name="Valor" value="'.$result_id_Prof['Valor'].'"/>';

												echo'<input type="hidden" name="id_mat" value="'.$result_id_mat['Id'].'"/>';
												echo'<input type="hidden" name="materia" value="'.$materia.'"/>';


											}
										}
									}//fim buscas no banco

							}
						}//fim


								 ?>
						</form>
						</tr>
					</table>
						</div>
						<?php
							echo '<div name="Dados_prof">';
							echo '<form name="selecionando" id="selecionando" method="POST" action="../php/pedir_aula.php">
								';
								/*essa tabela tá meio bugada*/
								if ($_POST["Nome"] != ""){
									echo'<h2>Dados do Professor</h2>';
									echo'<center>';
									echo "<table align='center'>
										<tr>
											<th><td>Nome</td></th>
											<th><td>Leciona</td></th>
											<th><td>R$ Hora Aula</td></th>
											</tr><br />
											<th>
												<td>
												".$_POST['Nome']."
												</td>
											</th>

											<th>
												<td>
													".$_POST['materia']."
												</td>
											</th>
											<th>
												<td>
													".$_POST['Valor']."
													</td>
											</th>

										</tr>
										</table>
										<h2>Horarios Disponiveis</h2>";

										$PDO = db_connect();
										$sql = "SELECT * FROM Horario WHERE id_prof = :id_prof";
										$stmt = $PDO->query($sql);
										$stmt = $PDO->prepare($sql);//prepara script
										$stmt->bindParam(':id_prof', $_POST['id_prof']);
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

											echo "<form name='pede_aula' method='POST' action='../php/pedir_aula.php'>";
											echo '<td>'.$result_horarios['dia_inicio'].'</td>';//dia de inicio
											echo '<td>'.$result_horarios['hora_inicio'].'</td>';//hora de inicio
											echo '<td>'.$result_horarios['dia_fim'].'</td>';//dia que termina
											echo '<td>'.$result_horarios['hora_fim'].'</td>';//hora que termina
											echo '<td>'.$disponivel.'</td>';

											echo'<input type="hidden" name="id_horario" value="'.$result_horarios['id_horario'].'"/>';
											echo'<input type="hidden" name="id_aluno" value="'.$user['ID'].'"/>';

											echo'<input type="hidden" name="id_mat" value="'.$_POST['id_mat'].'"/>';


											echo '<td><input type="submit" value="solicitar" name="solicitar"></td>';
											//campos hidden passado para a escolha
												echo "</form>";
												echo "</table>";
												echo "</center>";

								}}

							echo '</form>';


							echo'</div>';
						 ?>

					</section>

				<!-- About Me -->
					<section id="about" class="three">
						<div class="container">

						<h2>Minhas Informações</h2>




							<form action="../php/atualizar_Aluno.php" method="POST">

								<?PHP


									echo '

									<th>Usuário: <input type="text" class="perfil" name="nome" id="nome" size="20"  placeholder="'.$user['Nome'].'" required disabled="true"  /></th>
									E-mail: <input type="email" class="perfil" name="email" id="email" size="20"  placeholder="'.$user['Email'].'" required disabled="true" />
									curso: <input type="text"   class="perfil" name="curso" id="curso"size="20"  placeholder="'.$user['Curso'].'" required disabled="true" />
		 							Instituiçao: <input type="text" class="perfil"  name="instituicao" id="instituicao" size="20"  placeholder="'.$user['Instituicao'].'" required disabled="true" />
									Telefone: <input type="text"   class="perfil" name="telefone" id="telefone" size="20"  placeholder="'.$user['Telefone'].'" maxlenght="15" required disabled="true" />	<br>
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

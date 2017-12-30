<?php
	require_once 'init.php';
	//session_start();
	if($_POST) {
		$id_hora=$_POST['id_horario'];
    $id_aluno=$_POST['id_aluno'];
  //  $id_prof=$_POST['id_prof'];
    $id_mat=$_POST['id_mat'];
	}else {
		echo'<SCRIPT Language="javascript">
		alert("Erro nos dados de cadastro. Tente novamente");
		location.href="../Painel_Aluno/index.php";
		</SCRIPT>';
	}


	// insere no banco
    $PDO = db_connect();	//função definida em functions.php
    $sql1 ="SELECT id_prof FROM Horario WHERE id_horario = :id_hora";
    $stmt1 = $PDO->prepare($sql1);//prepara script
    $stmt1->bindParam(':id_hora', $id_hora);
    $stmt1->execute();
    $id_prof = $stmt1->fetchAll(PDO::FETCH_ASSOC);



		$sql = "INSERT INTO solicitacao(id_aluno, id_professor, id_materia, id_horario)
		VALUES(:id_aluno, :id_professor, :id_materia, :id_horario)";//SCRIPT SQL
		$stmt = $PDO->prepare($sql);//prepara script
		$stmt->bindParam(':id_aluno', $id_aluno);//liga os parametros nas nossas variaveis
		$stmt->bindParam(':id_professor', $id_prof);
		$stmt->bindParam(':id_materia', $id_mat);
		$stmt->bindParam(':id_horario', $id_hora);


		//echo $tipo;


		if ($stmt->execute()){
			echo'<SCRIPT Language="javascript">
			alert("Pedido enviado");
			location.href="../Painel_Aluno/index.php";
			</SCRIPT>';
		}
		else{
    		//echo "Erro ao cadastrar";//echo escreve a msg na tela,uso aqui pra ver se funcionou na versao final ele deve ser retirado
    		//print_r($stmt->errorInfo());

			echo'<SCRIPT Language="javascript">
			alert("Falha. contate o admin");
			location.href="../Painel_Aluno/index.php";
			</SCRIPT>';

		}


?>

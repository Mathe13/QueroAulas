<?php
	require_once 'init.php';
	//session_start();
	if($_POST) {
    $dia_inicio=$_POST['dia_inicio'];
    $dia_fim=$_POST['dia_fim'];
    $hora_inicio=$_POST['hora_inicio'];
    $hora_fim=$_POST['hora_fim'];
    $id=$_POST['id_prof'];
    $disponivel=1;
	}else {
		echo'<SCRIPT Language="javascript">
		alert("Erro nos dados de cadastro. Tente novamente");
		location.href="../Painel_Professor/index.php";
		</SCRIPT>';
	}


	// insere no banco
    $PDO = db_connect();	//função definida em functions.php
		$sql = "INSERT INTO Horario(disponivel, hora_inicio, hora_fim, dia_inicio, dia_fim, id_prof)
		VALUES(:disponivel, :hora_inicio, :hora_fim, :dia_inicio, :dia_fim	, :id_prof)";//SCRIPT SQL
		$stmt = $PDO->prepare($sql);//prepara script
		$stmt->bindParam(':disponivel', $disponivel);//liga os parametros nas nossas variaveis
		$stmt->bindParam(':hora_inicio', $hora_inicio);
		$stmt->bindParam(':hora_fim', $hora_fim);
		$stmt->bindParam(':dia_inicio', $dia_inicio);
		$stmt->bindParam(':dia_fim', $dia_fim);
		$stmt->bindParam(':id_prof',$id);

    echo $disponivel;
    echo $hora_inicio;
    echo $hora_fim;
    echo $dia_inicio;
    echo $dia_fim;
    echo $id;
		//echo $tipo;


		if ($stmt->execute()){
			echo'<SCRIPT Language="javascript">
			alert("horario cadastrado");
			location.href="../Painel_Professor/index.php";
			</SCRIPT>';
		}
		else{
    		//echo "Erro ao cadastrar";//echo escreve a msg na tela,uso aqui pra ver se funcionou na versao final ele deve ser retirado
    		//print_r($stmt->errorInfo());

			echo'<SCRIPT Language="javascript">
			alert("Falha. contate o admin");
			location.href="../Painel_Professor/index.php";
			</SCRIPT>';

		}


?>

<?php
	require_once 'init.php';
	//session_start();
	if($_POST) {

		$Id = $_POST['Id'];

	}else {
		echo'<SCRIPT Language="javascript">
		alert("Erro nos dados. Tente novamente");
		location.href="../Painel_Professor/index.php";
		</SCRIPT>';
	}


		$PDO=db_connect();
		$sql = "DELETE FROM Horario WHERE id_horario = :Id";//SCRIPT SQL
		$stmt = $PDO->prepare($sql);//prepara script
		$stmt->bindParam(':Id', $Id);

		//echo $tipo;


		if ($stmt->execute()){
			echo'<SCRIPT Language="javascript">
			alert("Removida com sucesso.");
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

<?php
	require_once 'init.php';
	//session_start();
	if($_POST) {
		$Id_Prof = $_POST['id_prof'];
		$Id_Mat = $_POST['id_mat'];
	
	}else {
		echo'<SCRIPT Language="javascript">
		alert("Erro nos dados. Tente novamente");
		location.href="../index.html";
		</SCRIPT>';	
	}
	
	
		$PDO=db_connect();
		$sql = "DELETE FROM Prof_X_Mat WHERE Id_Prof = :Id_Prof AND 	Id_Mat = :Id_Mat";//SCRIPT SQL
		$stmt = $PDO->prepare($sql);//prepara script
		$stmt->bindParam(':Id_Prof', $Id_Prof);//liga os parametros nas nossas variaveis
		$stmt->bindParam(':Id_Mat', $Id_Mat);

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
<?php
	require_once 'init.php';
	//session_start();
	if($_POST) {
		$materia = $_POST['materia'];
		$Id_Prof = $_POST['id_prof'];
		$valor =$_POST['Valor'];

		$valor=ajustar_float($valor);


	}else {
		echo'<SCRIPT Language="javascript">
		alert("Erro nos dados de cadastro. Tente novamente");
		location.href="../index.html";
		</SCRIPT>';
	}
	//echo $senha;

	//primeiro pegar o nome da materia
	$PDO = db_connect();	//função definida em functions.php
	$sql="SELECT Id FROM Materias WHERE materia = :materia";
	$stmt = $PDO->prepare($sql);//prepara script
	$stmt->bindParam(':materia', $materia);
	$stmt->execute();
	$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
	if (count($res) > 0){//significa q tem pegou o nome
		$res = $res[0];
		$Id_Mat=$res['Id'];//id_mat agr tem a id da materia


	//cadastra relação prof_X_MAT
		$sql = "INSERT INTO Prof_X_Mat(Id_Prof, Id_Mat, Valor)
		VALUES(:Id_Prof, :Id_Mat, :Valor)";//SCRIPT SQL
		$stmt = $PDO->prepare($sql);//prepara script
		$stmt->bindParam(':Id_Prof', $Id_Prof);//liga os parametros nas nossas variaveis
		$stmt->bindParam(':Id_Mat', $Id_Mat);
		$stmt->bindParam(':Valor',$valor);
		//echo $tipo;


		if ($stmt->execute()){
			echo'<SCRIPT Language="javascript">
			alert("Adicionada");
			location.href="../Painel_Professor/index.php";
			</SCRIPT>';
		}
		else{

			echo'<SCRIPT Language="javascript">
			alert("Matéria já adicionada!");
			location.href="../Painel_Professor/index.php";
			</SCRIPT>';

		}

	//echo $id_Mat;
	}else{
		echo'<SCRIPT Language="javascript">
		alert("Erro,contate o admin");
		location.href="../index.html#services";
		</SCRIPT>';
	}

?>

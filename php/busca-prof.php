<?php
	require_once 'init.php';
	//$array_id_prof=array();
	$nome_prof = array();
  if($_POST) {
    $materia = $_POST['txtBusca'];

  $PDO = db_connect();//conecta no baco
  $sql="SELECT * FROM Materias WHERE materia like :materia";
  $stmt = $PDO->prepare($sql);//prepara script
	$stmt->bindParam(':materia', $materia);
	$stmt->execute();
  //$result_id_mat = $stmt->fetchAll(PDO::FETCH_ASSOC);//contem a id das materias q parecem com a digitada
  //if(count($result_id_mat)<=0){

  //}else{
		//while($result_id_mat!=NULL){
		while ($result_id_mat = $stmt->fetch(PDO::FETCH_ASSOC)) {
			//echo $result_id_mat['Id'];
			$sql="SELECT Id_Prof FROM Prof_X_Mat WHERE Id_Mat like :Id_Mat";
			$stmt = $PDO->prepare($sql);//prepara script
			$stmt->bindParam(':Id_Mat', $result_id_mat['Id']);
			$stmt->execute();

			while ($result_id_Prof = $stmt->fetch(PDO::FETCH_ASSOC)) {//pegou id do professor
				//echo $result_id_Prof['Id_Prof'];
				$sql="SELECT Nome FROM Professor WHERE ID like :Id_Prof";
				$stmt = $PDO->prepare($sql);//prepara script
				$stmt->bindParam(':Id_Prof', $result_id_Prof['Id_Prof']);
				$stmt->execute();
				while ($result_Nome_Prof = $stmt->fetch(PDO::FETCH_ASSOC)) {
					//echo $result_Nome_Prof['Nome'];
					array_push($nome_prof,$result_Nome_Prof['Nome']);

				}
			}
		}//fim buscas no banco
}else{
	echo'<SCRIPT Language="javascript">
	alert("me desculpe,mas não achamos nada relevante :(");
	location.href="../index.html#services";
	</SCRIPT>';
}

  ?>

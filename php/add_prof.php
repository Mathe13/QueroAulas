<?php
	require_once 'init.php';
	//session_start();
	
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = make_hash($_POST['senha']);
	$formacao = $_POST['formacao'];
	$instituicao = $_POST['instituicao'];
	$telefone = $_POST['telefone'];
	echo $senha;

	//primeiro verificar se o email ainda não foi cadastrado
	$PDO = db_connect();	//função definida em functions.php
	$sql="SELECT * FROM Aluno WHERE Email = :Email 
	UNIOM SELECT * FROM Professor WHERE Email = :Email";
	$stmt = $PDO->prepare($sql);//prepara script
	$stmt->bindParam(':Email', $email);
	$stmt->execute();
	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
	if (count($users) > 0){
		echo'<SCRIPT Language="javascript">
		alert("Email já cadastrado. Tente fazer login");
		location.href="../index.html#services";
		</SCRIPT>';
	}else{//se nao tiver sido cadastrado pode seguir em frente
	// insere no banco

		
	
		// insere no banco
		$PDO = db_connect();	//função definida em functions.php
		$sql = "INSERT INTO Professor(Nome, Email, Senha, Formacao, Instituicao, Telefone) 
		VALUES(:Nome, :Email, :Senha, :formacao, :Instituicao, :telefone)";//SCRIPT SQL
		$stmt = $PDO->prepare($sql);//prepara script
		$stmt->bindParam(':Nome', $nome);//liga os parametros as nossas variaveis
		$stmt->bindParam(':Email', $email);
		$stmt->bindParam(':Senha', $senha);
		$stmt->bindParam(':formacao', $formacao);
		$stmt->bindParam(':Instituicao', $instituicao);
		$stmt->bindParam('telefone',$telefone);
		//echo $tipo;
	

		if ($stmt->execute()){
			echo'<SCRIPT Language="javascript">
			alert("Cadastro Realizado. Faça login");
			location.href="../index.php";
			</SCRIPT>';
		}
		else{
    		//echo "Erro ao cadastrar";//echo escreve a msg na tela,uso aqui pra ver se funcionou na versao final ele deve ser retirado
    		//print_r($stmt->errorInfo());
	
			echo'<SCRIPT Language="javascript">
			alert("Falha no cadastro. contate o admin");
			location.href="../index.php";
			</SCRIPT>';	
	
		}  
			
}
?>
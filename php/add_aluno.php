<?php
	require_once 'init.php';
	//session_start();
	if($_POST) {
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senha = make_hash($_POST['senha']);
		$curso = $_POST['curso'];
		$telefone = $_POST['telefone'];
		$instituicao = $_POST['instituicao'];
	}else {
		echo'<SCRIPT Language="javascript">
		alert("Erro nos dados de cadastro. Tente novamente");
		location.href="../index.php";
		</SCRIPT>';
	}
	//echo $senha;

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

		$sql = "INSERT INTO Aluno(Nome, Email, Senha, Curso, Instituicao, 	Telefone)
		VALUES(:Nome, :Email, :Senha, :Curso, :Instituicao, :Telefone)";//SCRIPT SQL
		$stmt = $PDO->prepare($sql);//prepara script
		$stmt->bindParam(':Nome', $nome);//liga os parametros nas nossas variaveis
		$stmt->bindParam(':Email', $email);
		$stmt->bindParam(':Senha', $senha);
		$stmt->bindParam(':Curso', $curso);
		$stmt->bindParam(':Instituicao', $instituicao);
		$stmt->bindParam(':Telefone',$telefone);
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

<?php
	require 'init.php';
	
	//pegar variaveis
	if($_POST){
		$email = $_POST['email']; 
		$senha = $_POST['senha'];	
	}else {
		echo'<SCRIPT Language="javascript">
		alert("Erro nos dados de login. Tente novamente");
		location.href="../index.php";
		</SCRIPT>';	
	}
	
	//crip senha
	$senha = make_hash($senha);
	//	echo $senha;

	//tenta logar como aluno
 	$user =	Login ($email,$senha,"Aluno");
 	if($user != null) {
		session_start();
		$_SESSION['logged_in'] = true;
		$_SESSION['user_id'] = $user['ID'];
		$_SESSION['user_name'] = $user['Nome'];
		$_SESSION['user_email'] = $user['email'];	
		
 
		header('Location: '.'../Painel_Aluno/');//se logou manda pro index aluno 
	 }else {//senao tenta logar como professor
 		$user =	Login ($email,$senha,"Professor");
 		if($user != null) {
			session_start();
			$_SESSION['logged_in'] = true;
			$_SESSION['user_id'] = $user['ID'];
			$_SESSION['user_name'] = $user['Nome'];
			$_SESSION['user_email'] = $user['email'];
			
			header('Location: '.'../Painel_Professor/index.php');//se logou manda pro index prof

	 }else {//senao tenta logar como professor
 		$user =	Login ($email,$senha,"Admin");
 		if($user != null) {
			session_start();
			$_SESSION['logged_in'] = true;
			$_SESSION['user_id'] = $user['ID'];
			$_SESSION['user_name'] = $user['Nome'];
			$_SESSION['user_email'] = $user['email'];
			
			header('Location: '.'../Painel_Adm/index.php');//se logou manda pro index admin
						
			
 	
	 	}else {//se não logou como aluno nem como professor
 			//criar um alert de email errado e mandar pro login denovo
 			echo'<SCRIPT Language="javascript">
			alert("Email ou Senha inválidos. Tente novamente");
			location.href="../index.php";
			</SCRIPT>';
 		}
 	}
 }
?>
<?php
  //este script carrega funções uteis para todo o projeto
/**
 * Conecta com o MySQL usando PDO
 */
function db_connect()
{
    $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
  	//esses dados estao definino em init.php
    return $PDO;
}


/**
 * Converte datas entre os padrões ISO e brasileiro
 * Fonte: http://rberaldo.com.br/php-conversao-de-datas-formato-brasileiro-e-formato-iso/
 */
function dateConvert($date)
{
    if ( ! strstr( $date, '/' ) )
    {
        // $date está no formato ISO (yyyy-mm-dd) e deve ser convertida
        // para dd/mm/yyyy
        sscanf($date, '%d-%d-%d', $y, $m, $d);
        return sprintf('%02d/%02d/%04d', $d, $m, $y);
    }
    else
    {
        // $date está no formato brasileiro e deve ser convertida para ISO
        sscanf($date, '%d/%d/%d', $d, $m, $y);
        return sprintf('%04d-%02d-%02d', $y, $m, $d);
    }

    return false;
}


/**
 * Calcula a idade a partir da data de nascimento
 *
 * Sobre a classe DateTime: http://rberaldo.com.br/php-usando-a-classe-nativa-datetime/
 */
function calculateAge($birthdate)
{
    $now = new DateTime();
    $diff = $now->diff(new DateTime($birthdate));

    return $diff->y;
}

/**
 * Cria o hash da senha, usando sha512 e whirlpool
 */
function make_hash($str)
{
   //$cripto_senha = hash('sha512', $str);
   return hash('whirlpool',hash('sha512', $str));
   //usa password hash
   //return password_hash($password, PASSWORD_DEFAULT, ['cost' => 14]);
   // se usar pass_has usar return password_verify($password, $hash); pra verificar Xd
}


/**
 * Verifica se o usuário está logado
 */
function isLoggedIn()
{
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    {
        return false;
    }

    return true;
}

function Login ($email,$senha,$tabela) {
	$PDO = db_connect();

	$sql = "SELECT ID, Nome,email FROM ".$tabela." WHERE Email = :email AND Senha = :password";
	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':password', $senha);

	$stmt->execute();

	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if (count($users) <= 0){
    return null;//não achou nada
    exit;
	}else{
		$user = $users[0];
		return $user; 	//retornar primeiro resultado
	}

}
function info($id,$tabela) {
		$PDO = db_connect();

	$sql = "SELECT * FROM ".$tabela." WHERE ID = :Id";
	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':Id', $id);

	$stmt->execute();

	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if (count($users) <= 0){
    return null;//não achou nada
    exit;
	}else{
		$user = $users[0];
		return $user; 	//retornar primeiro resultado
	}
	}
	function logout(){
		If (isset($_SESSION)){
		session_destroy();
	}
	}

	function require_login() {
		if(!isset($_SESSION['user_id'])){
   		echo'<SCRIPT Language="javascript">
			alert("É necessario login para visualizar este conteudo");
			location.href="../index.php#services";
			</SCRIPT>';
		}
	}
  //não funficona
  function ajustar_float($numero){
      $valor = number_format($numero, 2, '.', ',');
      return $valor;

  }

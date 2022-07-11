<?php 

require_once("../conexao.php"); 



$nome = $_POST['nome_usu'];

$user = $_POST['user_usu'];

$email = $_POST['email_usu'];

$email = $_POST['email_usu'];

$senha = $_POST['senha_usu'];


$id = $_POST['id_usu'];


if ($senha == "") {

	$query = $pdo->query("SELECT * FROM usuarios where id = '$id' ");

        $res = $query->fetchAll(PDO::FETCH_ASSOC);

        $senha = $res[0]['senha'];

}



if($nome == ""){

	echo 'O nome é Obrigatório!';

	exit();

}



if($user == ""){

	echo 'O Nome de Usuário é Obrigatório!';

	exit();

}



if($email == ""){

	echo 'O email é Obrigatório!';

	exit();

}








$res2 = $pdo->prepare("UPDATE usuarios SET nome = :nome, user = :user, email = :email, senha = :senha WHERE id = '$id'");	

$res2->bindValue(":nome", $nome);

$res2->bindValue(":user", $user);

$res2->bindValue(":email", $email);

$res2->bindValue(":senha", $senha);

$res2->execute();



echo 'Salvo com Sucesso!';



?>
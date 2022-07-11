<?php 

require_once("../../conexao.php"); 



$user = $_POST['user'];

$painel = 'painel-adm';

$senha = $_POST['senha'];


$ativo = 'on';

 

@$antigo2 = @$_POST['antigo2'];

$id = $_POST['txtid2'];






if($user == ""){

	echo 'O nome de Usuário é Obrigatório!';

	exit();

}




//VERIFICA SE JÁ EXISTE UM USUARIO COM O MESMO NOME NO BANCO

if ($user != "" && $id == "") {
	
	$query = $pdo->query("SELECT * FROM usuarios WHERE user = '$user';");

	$res = $query->fetchAll(PDO::FETCH_ASSOC);

	$total_reg = @count($res);

	if ($total_reg > 0) {
		
		echo 'O nome de Usuário não está disponivel!';

		exit();
	}

}


if ($user != "" && $id != "") {
	
	$query = $pdo->query("SELECT * FROM usuarios WHERE user = '$user' AND id != '$id';");

	$res = $query->fetchAll(PDO::FETCH_ASSOC);

	$total_reg = @count($res);

	if ($total_reg > 0) {
		
		echo 'O nome de Usuário não está disponivel!';

		exit();
	}

}



if($id == ""){

	$res = $pdo->prepare("INSERT INTO usuarios SET  senha = '$senha', user = '$user', painel = '$painel', ativo = '$ativo';");



}else{

	$res = $pdo->prepare("UPDATE usuarios SET user = '$user', painel = '$painel', ativo = '$ativo'  where id = '$id'");

	

}



$res->execute();



echo 'Salvo com Sucesso!';



?>
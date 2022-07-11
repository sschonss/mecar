<?php 

require_once("../../conexao.php"); 



$id = $_POST['id'];




$query = $pdo->query("SELECT * FROM usuarios where perfil = '" . $id . "' ");

$res = $query->fetchAll(PDO::FETCH_ASSOC);

$result = @count($res);


if ($result > 0) {
	
	echo 'Não é possível excluír este perfil no momento, pois existem usuários vínculados a ele!';

	exit();

}






$pdo->query("DELETE FROM perfil WHERE id = '$id'");



echo 'Excluído com Sucesso!';



?>
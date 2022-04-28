<?php

require_once("conexao.php");

@session_start();

$user = $_POST['user'];

$password = $_POST['password'];

$query = $pdo->prepare("SELECT * FROM user WHERE user = '$user' AND password = '$password';");

$query->execute();

//LOGADO

$res = $query->fetchAll(PDO::FETCH_ASSOC);

$total_reg = @count($res);

if ($total_reg > 0) {


    $_SESSION['user'] = $res[0]['user'];
}

header("Location: src/index.php", 1);

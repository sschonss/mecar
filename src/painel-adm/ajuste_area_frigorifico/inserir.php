<?php

require_once("../../conexao.php");



$camara_01_min = $_POST['camara_01_min'];
$camara_01_max = $_POST['camara_01_max'];
$camara_01_habilita = $_POST['camara_01_habilita'];

$camara_02_min = $_POST['camara_02_min'];
$camara_02_max = $_POST['camara_02_max'];
$camara_02_habilita = $_POST['camara_02_habilita'];


$camara_03_min = $_POST['camara_03_min'];
$camara_03_max = $_POST['camara_03_max'];
$camara_03_habilita = $_POST['camara_03_habilita'];


$camara_04_min = $_POST['camara_04_min'];
$camara_04_max = $_POST['camara_04_max'];
$camara_04_habilita = $_POST['camara_04_habilita'];


$tunel_estatico_min = $_POST['tunel_estatico_min'];
$tunel_estatico_max = $_POST['tunel_estatico_max'];
$tunel_estatico_habilita = $_POST['tunel_estatico_habilita'];


$tunel_continuo_min = $_POST['tunel_continuo_min'];
$tunel_continuo_max = $_POST['tunel_continuo_max'];
$tunel_continuo_habilita = $_POST['tunel_continuo_habilita'];

$embalagem_secundaria_01_min = $_POST['embalagem_secundaria_01_min'];
$embalagem_secundaria_01_max = $_POST['embalagem_secundaria_01_max'];
$embalagem_secundaria_01_habilita = $_POST['embalagem_secundaria_01_habilita'];

$embalagem_secundaria_02_min = $_POST['embalagem_secundaria_02_min'];
$embalagem_secundaria_02_max = $_POST['embalagem_secundaria_02_max'];
$embalagem_secundaria_02_habilita = $_POST['embalagem_secundaria_02_habilita'];

$expedicao_min = $_POST['expedicao_min'];
$expedicao_max = $_POST['expedicao_max'];
$expedicao_habilita = $_POST['expedicao_habilita'];

$paletizacao_min = $_POST['paletizacao_min'];
$paletizacao_max = $_POST['paletizacao_max'];
$paletizacao_habilita = $_POST['paletizacao_habilita'];


$res = $pdo->prepare("UPDATE ajuste_area_frigorifico 
                SET camara_01_min = :camara_01_min,
                    camara_01_max = :camara_01_max,
                    camara_01_habilita = :camara_01_habilita,
                    camara_02_min = :camara_02_min,
                    camara_02_max = :camara_02_max,
                    camara_02_habilita = :camara_02_habilita,
                    camara_03_min = :camara_03_min,
                    camara_03_max = :camara_03_max,
                    camara_03_habilita = :camara_03_habilita,
                    camara_04_min = :camara_04_min,
                    camara_04_max = :camara_04_max,
                    camara_04_habilita = :camara_04_habilita,
                    tunel_estatico_min = :tunel_estatico_min,
                    tunel_estatico_max = :tunel_estatico_max,
                    tunel_estatico_habilita = :tunel_estatico_habilita,
                    tunel_continuo_min = :tunel_continuo_min,
                    tunel_continuo_max = :tunel_continuo_max,
                    tunel_continuo_habilita = :tunel_continuo_habilita,
                    embalagem_secundaria_01_min = :embalagem_secundaria_01_min,
                    embalagem_secundaria_01_max = :embalagem_secundaria_01_max,
                    embalagem_secundaria_01_habilita = :embalagem_secundaria_01_habilita,
                    embalagem_secundaria_02_min = :embalagem_secundaria_02_min,
                    embalagem_secundaria_02_max = :embalagem_secundaria_02_max,
                    embalagem_secundaria_02_habilita = :embalagem_secundaria_02_habilita,
                    expedicao_min = :expedicao_min,
                    expedicao_max = :expedicao_max,
                    expedicao_habilita = :expedicao_habilita,
                    paletizacao_min = :paletizacao_min,
                    paletizacao_max = :paletizacao_max,
                    paletizacao_habilita = :paletizacao_habilita;");


$res->bindValue(':camara_01_min', $camara_01_min);
$res->bindValue(':camara_01_max', $camara_01_max);
$res->bindValue(':camara_01_habilita', $camara_01_habilita);

$res->bindValue(':camara_02_min', $camara_02_min);
$res->bindValue(':camara_02_max', $camara_02_max);
$res->bindValue(':camara_02_habilita', $camara_02_habilita);

$res->bindValue(':camara_03_min', $camara_03_min);
$res->bindValue(':camara_03_max', $camara_03_max);
$res->bindValue(':camara_03_habilita', $camara_03_habilita);

$res->bindValue(':camara_04_min', $camara_04_min);
$res->bindValue(':camara_04_max', $camara_04_max);
$res->bindValue(':camara_04_habilita', $camara_04_habilita);

$res->bindValue(':tunel_estatico_min', $tunel_estatico_min);
$res->bindValue(':tunel_estatico_max', $tunel_estatico_max);
$res->bindValue(':tunel_estatico_habilita', $tunel_estatico_habilita);

$res->bindValue(':tunel_continuo_min', $tunel_continuo_min);
$res->bindValue(':tunel_continuo_max', $tunel_continuo_max);
$res->bindValue(':tunel_continuo_habilita', $tunel_continuo_habilita);

$res->bindValue(':embalagem_secundaria_01_min', $embalagem_secundaria_01_min);
$res->bindValue(':embalagem_secundaria_01_max', $embalagem_secundaria_01_max);
$res->bindValue(':embalagem_secundaria_01_habilita', $embalagem_secundaria_01_habilita);

$res->bindValue(':embalagem_secundaria_02_min', $embalagem_secundaria_02_min);
$res->bindValue(':embalagem_secundaria_02_max', $embalagem_secundaria_02_max);
$res->bindValue(':embalagem_secundaria_02_habilita', $embalagem_secundaria_02_habilita);

$res->bindValue(':expedicao_min', $expedicao_min);
$res->bindValue(':expedicao_max', $expedicao_max);
$res->bindValue(':expedicao_habilita', $expedicao_habilita);

$res->bindValue(':paletizacao_min', $paletizacao_min);
$res->bindValue(':paletizacao_max', $paletizacao_max);
$res->bindValue(':paletizacao_habilita', $paletizacao_habilita);


$res->execute();



echo 'Salvo com Sucesso!';

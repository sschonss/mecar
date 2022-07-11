<?php

require_once("../../conexao.php");




$pre_chiller_01_V_min = $_POST['pre_chiller_01_V_min'];
$pre_chiller_01_V_max = $_POST['pre_chiller_01_V_max'];
$pre_chiller_01_V_habilita = $_POST['pre_chiller_01_V_habilita'];

$chiller_01_V_min = $_POST['chiller_01_V_min'];
$chiller_01_V_max = $_POST['chiller_01_V_max'];
$chiller_01_V_habilita = $_POST['chiller_01_V_habilita'];

$pre_chiller_02_N_min = $_POST['pre_chiller_02_N_min'];
$pre_chiller_02_N_max = $_POST['pre_chiller_02_N_max'];
$pre_chiller_02_N_habilita = $_POST['pre_chiller_02_N_habilita'];

$chiller_02_N_min = $_POST['chiller_02_N_min'];
$chiller_02_N_max = $_POST['chiller_02_N_max'];
$chiller_02_N_habilita = $_POST['chiller_02_N_habilita'];

$pre_resfriamento_01_min = $_POST['pre_resfriamento_01_min'];
$pre_resfriamento_01_max = $_POST['pre_resfriamento_01_max'];
$pre_resfriamento_01_habilita = $_POST['pre_resfriamento_01_habilita'];

$pre_resfriamento_02_min = $_POST['pre_resfriamento_02_min'];
$pre_resfriamento_02_max = $_POST['pre_resfriamento_02_max'];
$pre_resfriamento_02_habilita = $_POST['pre_resfriamento_02_habilita'];

$girofreezer_min = $_POST['girofreezer_min'];
$girofreezer_max = $_POST['girofreezer_max'];
$girofreezer_habilita = $_POST['girofreezer_habilita'];

$secao_embalagem_01_min = $_POST['secao_embalagem_01_min'];
$secao_embalagem_01_max = $_POST['secao_embalagem_01_max'];
$secao_embalagem_01_habilita = $_POST['secao_embalagem_01_habilita'];

$secao_embalagem_02_min = $_POST['secao_embalagem_02_min'];
$secao_embalagem_02_max = $_POST['secao_embalagem_02_max'];
$secao_embalagem_02_habilita = $_POST['secao_embalagem_02_habilita'];

$camara_de_resfriado_01_min = $_POST['camara_de_resfriado_01_min'];
$camara_de_resfriado_01_max = $_POST['camara_de_resfriado_01_max'];
$camara_de_resfriado_01_habilita = $_POST['camara_de_resfriado_01_habilita'];

$camara_de_resfriado_02_min = $_POST['camara_de_resfriado_02_min'];
$camara_de_resfriado_02_max = $_POST['camara_de_resfriado_02_max'];
$camara_de_resfriado_02_habilita = $_POST['camara_de_resfriado_02_habilita'];






$res = $pdo->prepare("UPDATE ajuste_area_producao_01 SET
                                   pre_chiller_01_V_min = :pre_chiller_01_V_min,
                                   pre_chiller_01_V_max = :pre_chiller_01_V_max,
                                   pre_chiller_01_V_habilita = :pre_chiller_01_V_habilita,
                                   chiller_01_V_min = :chiller_01_V_min,
                                   chiller_01_V_max = :chiller_01_V_max,
                                   chiller_01_V_habilita = :chiller_01_V_habilita,
                                   pre_chiller_02_N_min = :pre_chiller_02_N_min,
                                   pre_chiller_02_N_max = :pre_chiller_02_N_max,
                                   pre_chiller_02_N_habilita = :pre_chiller_02_N_habilita,
                                   chiller_02_N_min = :chiller_02_N_min,
                                   chiller_02_N_max = :chiller_02_N_max,
                                   chiller_02_N_habilita = :chiller_02_N_habilita,
                                   pre_resfriamento_01_min = :pre_resfriamento_01_min,
                                   pre_resfriamento_01_max = :pre_resfriamento_01_max,
                                   pre_resfriamento_01_habilita = :pre_resfriamento_01_habilita,
                                   pre_resfriamento_02_min = :pre_resfriamento_02_min,
                                   pre_resfriamento_02_max = :pre_resfriamento_02_max,
                                   pre_resfriamento_02_habilita = :pre_resfriamento_02_habilita,
                                   girofreezer_min = :girofreezer_min,
                                   girofreezer_max = :girofreezer_max,
                                   girofreezer_habilita = :girofreezer_habilita,
                                   secao_embalagem_01_min = :secao_embalagem_01_min,
                                   secao_embalagem_01_max = :secao_embalagem_01_max,
                                   secao_embalagem_01_habilita = :secao_embalagem_01_habilita,
                                   secao_embalagem_02_min = :secao_embalagem_02_min,
                                   secao_embalagem_02_max = :secao_embalagem_02_max,
                                   secao_embalagem_02_habilita = :secao_embalagem_02_habilita,
                                   camara_de_resfriado_01_min = :camara_de_resfriado_01_min,
                                   camara_de_resfriado_01_max = :camara_de_resfriado_01_max,
                                   camara_de_resfriado_01_habilita = :camara_de_resfriado_01_habilita,
                                   camara_de_resfriado_02_min = :camara_de_resfriado_02_min,
                                   camara_de_resfriado_02_max = :camara_de_resfriado_02_max,
                                   camara_de_resfriado_02_habilita = :camara_de_resfriado_02_habilita
                                   ");


$res->bindValue(':pre_chiller_01_V_min', $pre_chiller_01_V_min);
$res->bindValue(':pre_chiller_01_V_max', $pre_chiller_01_V_max);
$res->bindValue(':pre_chiller_01_V_habilita', $pre_chiller_01_V_habilita);

$res->bindValue(':chiller_01_V_min', $chiller_01_V_min);
$res->bindValue(':chiller_01_V_max', $chiller_01_V_max);
$res->bindValue(':chiller_01_V_habilita', $chiller_01_V_habilita);

$res->bindValue(':pre_chiller_02_N_min', $pre_chiller_02_N_min);
$res->bindValue(':pre_chiller_02_N_max', $pre_chiller_02_N_max);
$res->bindValue(':pre_chiller_02_N_habilita', $pre_chiller_02_N_habilita);

$res->bindValue(':chiller_02_N_min', $chiller_02_N_min);
$res->bindValue(':chiller_02_N_max', $chiller_02_N_max);
$res->bindValue(':chiller_02_N_habilita', $chiller_02_N_habilita);

$res->bindValue(':pre_resfriamento_01_min', $pre_resfriamento_01_min);
$res->bindValue(':pre_resfriamento_01_max', $pre_resfriamento_01_max);
$res->bindValue(':pre_resfriamento_01_habilita', $pre_resfriamento_01_habilita);

$res->bindValue(':pre_resfriamento_02_min', $pre_resfriamento_02_min);
$res->bindValue(':pre_resfriamento_02_max', $pre_resfriamento_02_max);
$res->bindValue(':pre_resfriamento_02_habilita', $pre_resfriamento_02_habilita);

$res->bindValue(':girofreezer_min', $girofreezer_min);
$res->bindValue(':girofreezer_max', $girofreezer_max);
$res->bindValue(':girofreezer_habilita', $girofreezer_habilita);

$res->bindValue(':secao_embalagem_01_min', $secao_embalagem_01_min);
$res->bindValue(':secao_embalagem_01_max', $secao_embalagem_01_max);
$res->bindValue(':secao_embalagem_01_habilita', $secao_embalagem_01_habilita);

$res->bindValue(':secao_embalagem_02_min', $secao_embalagem_02_min);
$res->bindValue(':secao_embalagem_02_max', $secao_embalagem_02_max);
$res->bindValue(':secao_embalagem_02_habilita', $secao_embalagem_02_habilita);

$res->bindValue(':camara_de_resfriado_01_min', $camara_de_resfriado_01_min);
$res->bindValue(':camara_de_resfriado_01_max', $camara_de_resfriado_01_max);
$res->bindValue(':camara_de_resfriado_01_habilita', $camara_de_resfriado_01_habilita);

$res->bindValue(':camara_de_resfriado_02_min', $camara_de_resfriado_02_min);
$res->bindValue(':camara_de_resfriado_02_max', $camara_de_resfriado_02_max);
$res->bindValue(':camara_de_resfriado_02_habilita', $camara_de_resfriado_02_habilita);



$res->execute();



echo 'Salvo com Sucesso!';

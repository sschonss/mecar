<?php

require_once("../../conexao.php");

$secao_de_corte_01_min = $_POST['secao_de_corte_01_min'];
$secao_de_corte_01_max = $_POST['secao_de_corte_01_max'];
$secao_de_corte_01_habilita = $_POST['secao_de_corte_01_habilita'];

$secao_de_corte_02_min = $_POST['secao_de_corte_02_min'];
$secao_de_corte_02_max = $_POST['secao_de_corte_02_max'];
$secao_de_corte_02_habilita = $_POST['secao_de_corte_02_habilita'];

$secao_de_corte_03_min = $_POST['secao_de_corte_03_min'];
$secao_de_corte_03_max = $_POST['secao_de_corte_03_max'];
$secao_de_corte_03_habilita = $_POST['secao_de_corte_03_habilita'];

$secao_de_corte_04_min = $_POST['secao_de_corte_04_min'];
$secao_de_corte_04_max = $_POST['secao_de_corte_04_max'];
$secao_de_corte_04_habilita = $_POST['secao_de_corte_04_habilita'];

$secao_de_salgado_min = $_POST['secao_de_salgado_min'];
$secao_de_salgado_max = $_POST['secao_de_salgado_max'];
$secao_de_salgado_habilita = $_POST['secao_de_salgado_habilita'];

$secao_de_bandeja_min = $_POST['secao_de_bandeja_min'];
$secao_de_bandeja_max = $_POST['secao_de_bandeja_max'];
$secao_de_bandeja_habilita = $_POST['secao_de_bandeja_habilita'];

$secao_de_emb_IQF_min = $_POST['secao_de_emb_IQF_min'];
$secao_de_emb_IQF_max = $_POST['secao_de_emb_IQF_max'];
$secao_de_emb_IQF_habilita = $_POST['secao_de_emb_IQF_habilita'];

$secao_de_IQF_min = $_POST['secao_de_IQF_min'];
$secao_de_IQF_max = $_POST['secao_de_IQF_max'];
$secao_de_IQF_habilita = $_POST['secao_de_IQF_habilita'];

$secao_de_CMS_min = $_POST['secao_de_CMS_min'];
$secao_de_CMS_max = $_POST['secao_de_CMS_max'];
$secao_de_CMS_habilita = $_POST['secao_de_CMS_habilita'];

$secao_de_CMR_min = $_POST['secao_de_CMR_min'];
$secao_de_CMR_max = $_POST['secao_de_CMR_max'];
$secao_de_CMR_habilita = $_POST['secao_de_CMR_habilita'];













$res = $pdo->prepare("UPDATE ajuste_area_producao_02 SET 
                                   secao_de_corte_01_min = :secao_de_corte_01_min,
                                   secao_de_corte_01_max = :secao_de_corte_01_max,
                                   secao_de_corte_01_habilita = :secao_de_corte_01_habilita,
                                   secao_de_corte_02_min = :secao_de_corte_02_min,
                                   secao_de_corte_02_max = :secao_de_corte_02_max,
                                   secao_de_corte_02_habilita = :secao_de_corte_02_habilita,
                                   secao_de_corte_03_min = :secao_de_corte_03_min,
                                   secao_de_corte_03_max = :secao_de_corte_03_max,
                                   secao_de_corte_03_habilita = :secao_de_corte_03_habilita,
                                   secao_de_corte_04_min = :secao_de_corte_04_min,
                                   secao_de_corte_04_max = :secao_de_corte_04_max,
                                   secao_de_corte_04_habilita = :secao_de_corte_04_habilita,
                                   secao_de_salgado_min = :secao_de_salgado_min,
                                   secao_de_salgado_max = :secao_de_salgado_max,
                                   secao_de_salgado_habilita = :secao_de_salgado_habilita,
                                   secao_de_bandeja_min = :secao_de_bandeja_min,
                                   secao_de_bandeja_max = :secao_de_bandeja_max,
                                   secao_de_bandeja_habilita = :secao_de_bandeja_habilita,
                                   secao_de_emb_IQF_min = :secao_de_emb_IQF_min,
                                   secao_de_emb_IQF_max = :secao_de_emb_IQF_max,
                                   secao_de_emb_IQF_habilita = :secao_de_emb_IQF_habilita,
                                   secao_de_IQF_min = :secao_de_IQF_min,
                                   secao_de_IQF_max = :secao_de_IQF_max,
                                   secao_de_IQF_habilita = :secao_de_IQF_habilita,
                                   secao_de_CMS_min = :secao_de_CMS_min,
                                   secao_de_CMS_max = :secao_de_CMS_max,
                                   secao_de_CMS_habilita = :secao_de_CMS_habilita,
                                   secao_de_CMR_min = :secao_de_CMR_min,
                                   secao_de_CMR_max = :secao_de_CMR_max,
                                   secao_de_CMR_habilita = :secao_de_CMR_habilita
                                    ");

$res->bindParam(':secao_de_corte_01_min', $secao_de_corte_01_min);
$res->bindParam(':secao_de_corte_01_max', $secao_de_corte_01_max);
$res->bindParam(':secao_de_corte_01_habilita', $secao_de_corte_01_habilita);

$res->bindParam(':secao_de_corte_02_min', $secao_de_corte_02_min);
$res->bindParam(':secao_de_corte_02_max', $secao_de_corte_02_max);
$res->bindParam(':secao_de_corte_02_habilita', $secao_de_corte_02_habilita);

$res->bindParam(':secao_de_corte_03_min', $secao_de_corte_03_min);
$res->bindParam(':secao_de_corte_03_max', $secao_de_corte_03_max);
$res->bindParam(':secao_de_corte_03_habilita', $secao_de_corte_03_habilita);

$res->bindParam(':secao_de_corte_04_min', $secao_de_corte_04_min);
$res->bindParam(':secao_de_corte_04_max', $secao_de_corte_04_max);
$res->bindParam(':secao_de_corte_04_habilita', $secao_de_corte_04_habilita);

$res->bindParam(':secao_de_salgado_min', $secao_de_salgado_min);
$res->bindParam(':secao_de_salgado_max', $secao_de_salgado_max);
$res->bindParam(':secao_de_salgado_habilita', $secao_de_salgado_habilita);

$res->bindParam(':secao_de_bandeja_min', $secao_de_bandeja_min);
$res->bindParam(':secao_de_bandeja_max', $secao_de_bandeja_max);
$res->bindParam(':secao_de_bandeja_habilita', $secao_de_bandeja_habilita);

$res->bindParam(':secao_de_emb_IQF_min', $secao_de_emb_IQF_min);
$res->bindParam(':secao_de_emb_IQF_max', $secao_de_emb_IQF_max);
$res->bindParam(':secao_de_emb_IQF_habilita', $secao_de_emb_IQF_habilita);

$res->bindParam(':secao_de_IQF_min', $secao_de_IQF_min);
$res->bindParam(':secao_de_IQF_max', $secao_de_IQF_max);
$res->bindParam(':secao_de_IQF_habilita', $secao_de_IQF_habilita);

$res->bindParam(':secao_de_CMS_min', $secao_de_CMS_min);
$res->bindParam(':secao_de_CMS_max', $secao_de_CMS_max);
$res->bindParam(':secao_de_CMS_habilita', $secao_de_CMS_habilita);

$res->bindParam(':secao_de_CMR_min', $secao_de_CMR_min);
$res->bindParam(':secao_de_CMR_max', $secao_de_CMR_max);
$res->bindParam(':secao_de_CMR_habilita', $secao_de_CMR_habilita);

$res->execute();

echo 'Salvo com Sucesso!';

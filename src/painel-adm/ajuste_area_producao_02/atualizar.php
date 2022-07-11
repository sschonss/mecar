<?php

require_once "../../conexao.php";

$coluna = $_GET['coluna'];
$dataIniAjuste = $_GET['dataIni'];
$dataFimAjuste = $_GET['dataFim'];
$horaIniAjuste = $_GET['horaIni'];
$horaFimAjuste = $_GET['horaFim'];

//data hora para timestamp
$dataIniAjuste = $dataIniAjuste . " " . $horaIniAjuste;
$dataFimAjuste = $dataFimAjuste . " " . $horaFimAjuste;
$dataHoraIniAjuste = strtotime($dataIniAjuste) - 10800;
$dataHoraFimAjuste = strtotime($dataFimAjuste);

@$valorAjust = $pdo->prepare("SELECT * FROM ajuste_area_producao_02 ");
@$valorAjust->execute();
@$valorAjust = $valorAjust->fetch(PDO::FETCH_ASSOC);
//$valorAjust = $valorAjust[0][0];
@$ajuste_min = json_encode($valorAjust[$coluna . '_min']);
@$ajuste_max = json_encode($valorAjust[$coluna . '_max']);
@$ajuste_habilita = json_encode($valorAjust[$coluna . '_habilita']);
//var_dump($ajuste);



if ($coluna == 'secao_de_corte_01') {
    $coluna_format = 'data_format_10';
} elseif ($coluna == 'secao_de_corte_02') {
    $coluna_format = 'data_format_20';
} elseif ($coluna == 'secao_de_corte_03') {
    $coluna_format = 'data_format_21';
} elseif ($coluna == 'secao_de_corte_04') {
    $coluna_format = 'data_format_33';
} elseif ($coluna == 'secao_de_salgado') {
    $coluna_format = 'data_format_24';
} elseif ($coluna == 'secao_de_bandeja') {
    $coluna_format = 'data_format_25';
} elseif ($coluna == 'secao_de_emb_IQF') {
    $coluna_format = 'data_format_26';
} elseif ($coluna == 'secao_de_IQF') {
    $coluna_format = 'data_format_28';
} elseif ($coluna == 'secao_de_CMS') {
    $coluna_format = 'data_format_11';
} elseif ($coluna == 'secao_de_CMR') {
    $coluna_format = 'data_format_27';
}




if ($ajuste_habilita = 'on') {
    $query_update_min = "UPDATE `cMT-0484_DB_Temp_data` SET {$coluna_format} = CONCAT({$ajuste_min}, RIGHT({$coluna_format},1)) WHERE {$coluna_format} < {$ajuste_min} * 10 AND `time@timestamp` BETWEEN {$dataHoraIniAjuste} AND {$dataHoraFimAjuste}";

    $update_min = $pdo->prepare($query_update_min);
    $update_min->execute();
}

$query_update_max = "UPDATE `cMT-0484_DB_Temp_data` SET {$coluna_format} = CONCAT({$ajuste_max}, RIGHT({$coluna_format},1)) WHERE {$coluna_format} > {$ajuste_max} * 10 AND `time@timestamp` BETWEEN {$dataHoraIniAjuste} AND {$dataHoraFimAjuste}";

$update_max = $pdo->prepare($query_update_max);
$update_max->execute();

header('Location: ../index.php?pag=relTempProducao02');

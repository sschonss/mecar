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

@$valorAjust = $pdo->prepare("SELECT * FROM ajuste_area_producao_01 ");
@$valorAjust->execute();
@$valorAjust = $valorAjust->fetch(PDO::FETCH_ASSOC);
//$valorAjust = $valorAjust[0][0];
@$ajuste_min = json_encode($valorAjust[$coluna . '_min']);
@$ajuste_max = json_encode($valorAjust[$coluna . '_max']);
@$ajuste_habilita = json_encode($valorAjust[$coluna . '_habilita']);
//var_dump($ajuste);



if ($coluna == 'pre_chiller_01_V') {
    $coluna_format = 'data_format_15';
} elseif ($coluna == 'chiller_01_V') {
    $coluna_format = 'data_format_16';
} elseif ($coluna == 'pre_chiller_02_N') {
    $coluna_format = 'data_format_30';
} elseif ($coluna == 'chiller_02_N') {
    $coluna_format = 'data_format_32';
} elseif ($coluna == 'pre_resfriamento_01') {
    $coluna_format = 'data_format_14';
} elseif ($coluna == 'pre_resfriamento_02') {
    $coluna_format = 'data_format_31';
} elseif ($coluna == 'camara_de_resfriado_01') {
    $coluna_format = 'data_format_17';
} elseif ($coluna == 'camara_de_resfriado_02') {
    $coluna_format = 'data_format_29';
} elseif ($coluna == 'girofreezer') {
    $coluna_format = 'data_format_38';
} elseif ($coluna == 'secao_embalagem_01') {
    $coluna_format = 'data_format_12';
} elseif ($coluna == 'secao_embalagem_02') {
    $coluna_format = 'data_format_19';
}


if($ajuste_habilita = 'on'){
    $query_update_min = "UPDATE `cMT-0484_DB_Temp_data` SET {$coluna_format} = CONCAT({$ajuste_min}, RIGHT({$coluna_format},1)) WHERE {$coluna_format} < {$ajuste_min} * 10 AND `time@timestamp` BETWEEN {$dataHoraIniAjuste} AND {$dataHoraFimAjuste}";

    $update_min = $pdo->prepare($query_update_min);
    $update_min->execute();

}

$query_update_max = "UPDATE `cMT-0484_DB_Temp_data` SET {$coluna_format} = CONCAT({$ajuste_max}, RIGHT({$coluna_format},1)) WHERE {$coluna_format} > {$ajuste_max} * 10 AND `time@timestamp` BETWEEN {$dataHoraIniAjuste} AND {$dataHoraFimAjuste}";

$update_max = $pdo->prepare($query_update_max);
$update_max->execute();

header('Location: ../index.php?pag=relTempProducao01');



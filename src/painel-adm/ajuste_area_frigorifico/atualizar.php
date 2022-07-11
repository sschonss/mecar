<?php

require_once "../../conexao.php";

$coluna = $_GET['coluna'];
$dataIniAjuste = $_GET['dataIni'];
$dataFimAjuste = $_GET['dataFim'];
$horaIniAjuste = $_GET['horaIni'];
$horaFimAjuste = $_GET['horaFim'];


$dataIniAjusteOriginal = $_GET['dataIni'];
$dataFimAjusteOriginal = $_GET['dataFim'];
$horaIniAjusteOriginal = $_GET['horaIni'];
$horaFimAjusteOriginal = $_GET['horaFim'];


//data hora para timestamp
$dataIniAjuste = $dataIniAjuste . " " . $horaIniAjuste;
$dataFimAjuste = $dataFimAjuste . " " . $horaFimAjuste;
$dataHoraIniAjuste = strtotime($dataIniAjuste) - 10800;
$dataHoraFimAjuste = strtotime($dataFimAjuste);


$valorAjust = $pdo->prepare("SELECT * FROM ajuste_area_frigorifico ");
$valorAjust->execute();
$valorAjust = $valorAjust->fetch(PDO::FETCH_ASSOC);

$ajuste_min = json_encode($valorAjust[$coluna . '_min']);
$ajuste_max = json_encode($valorAjust[$coluna . '_max']);
$ajuste_habilita = json_encode($valorAjust[$coluna . '_habilita']);

@$valorAjust = $pdo->prepare("SELECT * FROM ajuste_area_frigorifico ");
@$valorAjust->execute();
@$valorAjust = $valorAjust->fetch(PDO::FETCH_ASSOC);
//$valorAjust = $valorAjust[0][0];
@$ajuste_min = json_encode($valorAjust[$coluna . '_min']);
@$ajuste_max = json_encode($valorAjust[$coluna . '_max']);
@$ajuste_habilita = json_encode($valorAjust[$coluna . '_habilita']);



if ($coluna == 'camara_01') {
    $coluna_format = 'data_format_1';
} elseif ($coluna == 'camara_02') {
    $coluna_format = 'data_format_2';
} elseif ($coluna == 'camara_03') {
    $coluna_format = 'data_format_3';
} elseif ($coluna == 'camara_04') {
    $coluna_format = 'data_format_4';
} elseif ($coluna == 'tunel_estatico') {
    $coluna_format = 'data_format_8';
} elseif ($coluna == 'tunel_continuo') {
    $coluna_format = 'data_format_9';
} elseif ($coluna == 'embalagem_secundaria_01') {
    $coluna_format = 'data_format_13';
} elseif ($coluna == 'embalagem_secundaria_02') {
    $coluna_format = 'data_format_23';
} elseif ($coluna == 'expedicao') {
    $coluna_format = 'data_format_5';
} elseif ($coluna == 'paletizacao') {
    $coluna_format = 'data_format_6';
}



if($ajuste_habilita = 'on'){
    $query_update_min = "UPDATE `cMT-0484_DB_Temp_data` SET {$coluna_format} = CONCAT({$ajuste_min}, RIGHT({$coluna_format},1)) WHERE {$coluna_format} < {$ajuste_min} * 10 AND `time@timestamp` BETWEEN {$dataHoraIniAjuste} AND {$dataHoraFimAjuste}";

    $update_min = $pdo->prepare($query_update_min);
    $update_min->execute();

}

$query_update_max = "UPDATE `cMT-0484_DB_Temp_data` SET {$coluna_format} = CONCAT({$ajuste_max}, RIGHT({$coluna_format},1)) WHERE {$coluna_format} > {$ajuste_max} * 10 AND `time@timestamp` BETWEEN {$dataHoraIniAjuste} AND {$dataHoraFimAjuste}";

$update_max = $pdo->prepare($query_update_max);
$update_max->execute();

header('Location: ../index.php?pag=relTempFrigorifico');

echo "Update realizado com sucesso!";


<?php
require_once("../conexao.php");
@session_start();

$dataIni = $_GET['dataIni'];

if ($dataIni == null) {
    $dataIni = date('Y-m-d');
}

$horaIni = $_GET['horaIni'];

if ($horaIni == null) {
    $horaIni = "00:00";
}

$dataFim = $_GET['dataFim'];

if ($dataFim == null) {
    $dataFim = date('Y-m-d');
}

$horaFim = $_GET['horaFim'];

if ($horaFim == null) {
    $horaFim = "23:59";
}



$html = file_get_contents($url . "rel/relOperation_html.php?dataIni=$dataIni&horaIni=$horaIni&dataFim=$dataFim&horaFim=$horaFim");

echo $html;

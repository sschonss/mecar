<?php 
header('Content-Type: text/html; charset=iso-8859-1');
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

$html = "";

$dataHoraIni = $dataIni.' '.$horaIni;

$dataHoraFim = $dataFim.' '.$horaFim;

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = strtoupper(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));


$dataHoraBuscaFim =  date('Y-m-d H:i', strtotime("+1 days", strtotime($dataHoraIni)));


//Verifica o numero de dias entre as datas da pesquisa

$dataOrigin = new DateTime($dataHoraIni);
$dataTarget = new DateTime($dataHoraFim);
$dataInterval = $dataOrigin->diff($dataTarget);
$interval = $dataInterval->days;



for ($a=0; $a < $interval; $a++) { 

    $day = "+".$a." days";

    $dataHoraInicio = date('Y-m-d H:i', strtotime($day, strtotime($dataHoraIni)));

    $dataHoraFinal = date('Y-m-d H:i', strtotime($day, strtotime($dataHoraBuscaFim)));

   
    $query = $pdo->query("SELECT dataHora, SUM(vazao) * 0.1 AS 'vazao01', SUM(vazao02) * 0.1 AS vazao02, (SUM(vazao) + SUM(vazao02)) * 0.1 AS totalMoment FROM TotalVazaoETA where dataHora BETWEEN ('{$dataHoraInicio}') AND ('{$dataHoraFinal}');");

    $res = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($res[0]['vazao01'] != null || $res[0]['vazao02'] != null) {

    $html .= '<tr>';
    $html .= '<td colspan="1" rowspan="1">'.date('d/m/Y', strtotime($res[0]['dataHora'])).'</td>';
    $html .= '<td colspan="1" rowspan="1">'.$res[0]['vazao01'].'</td>';
    $html .= '<td colspan="1" rowspan="1">'.$res[0]['vazao02'].'</td>';
    $html .= '<td colspan="1" rowspan="1">'.$res[0]['totalMoment'].'</td>';
    $html .= '</tr>';


  }

  

}

 

$queryTotal = $pdo->query("SELECT SUM(vazao) * 0.1 AS 'vazao01Total', SUM(vazao02) * 0.1 AS vazao02Total, (SUM(vazao) + SUM(vazao02)) * 0.1 AS totalGeral FROM TotalVazaoETA where dataHora BETWEEN ('{$dataHoraIni}') AND ('{$dataHoraFim}');");

$resTotal = $queryTotal->fetchAll(PDO::FETCH_ASSOC);


$html .=  "<tr>";
$html .=  "<th scope='row'colspan='1'>TOTAL</th>";
$html .=  "<th colspan='1'>".$resTotal[0]['vazao01Total']."</th>";
$html .=  "<th colspan='1'>".$resTotal[0]['vazao02Total']."</th>";
$html .=  "<th colspan='1'>".$resTotal[0]['totalGeral']."</th>";
$html .=  '</tr>';





$body = '
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style>
table{
  text-align: center;
}
</style>
</head>
<body>
<table cellspacing="0" cellpadding="1" border="1">
<thead>

<tr style="font-weight: bold;">
<th scope="col" colspan="4" width=60% >RELAT??RIO VAZ??O ETA</th>
</tr>
<tr>
<th scope="row"colspan="1">DATA</th>
<th colspan="1">VAZ??O 01</th>
<th colspan="1">VAZ??O 02</th>
<th colspan="1">TOTAL DIA</th>
</tr>
</thead>
<tbody style="text-align-last: center;">

'.$html.'

</tbody>
</table>
</body>
</html>';


    		// Definimos o nome do arquivo que ser?? exportado
$arquivo = 'Relat??rio Vaz??o ETA.xls';
    		// Configura????es header para for??ar o download
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );
    		// Envia o conte??do do arquivo
echo $body;
exit;


?>
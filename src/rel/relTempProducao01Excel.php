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


$dataHoraIni = $dataIni.' '.$horaIni;

$dataHoraFim = $dataFim.' '.$horaFim;

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = strtoupper(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));

$query = $pdo->query("SELECT FROM_UNIXTIME(`time@timestamp` + 10800, '%d/%m/%y - %H:%i') as 'dataHora', data_format_12 * 0.1 AS data_format_12, data_format_14 * 0.1 AS data_format_14, data_format_15 * 0.1 AS data_format_15, data_format_16 * 0.1 AS data_format_16, data_format_17 * 0.1 AS data_format_17, data_format_19 * 0.1 AS data_format_19, data_format_29 * 0.1 AS data_format_29, data_format_30 * 0.1 AS data_format_30, data_format_31 * 0.1 AS data_format_31, data_format_32 * 0.1 AS data_format_32, data_format_38 * 0.1 AS data_format_38 FROM `cMT-0484_DB_Temp_data` WHERE (FROM_UNIXTIME(`time@timestamp`, '%i:%s') like '00:0%' or (FROM_UNIXTIME(`time@timestamp`, '%i:%s') like '30:0%')) AND FROM_UNIXTIME(`time@timestamp` + 10800, '%Y-%m-%d %H:%i') BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');");

$res = $query->fetchAll(PDO::FETCH_ASSOC);



for ($i=0; $i < count($res); $i++) { 

  foreach ($res[$i] as $key => $value) {

  }


  $dataHora[] = $res[$i]['dataHora'];

  $preChiller01[] = $res[$i]['data_format_15'];

  $chiller01[] = $res[$i]['data_format_16'];

  $preChiller02[] = $res[$i]['data_format_30'];

  $chiller02[] = $res[$i]['data_format_32'];

  $preResfri01[] = $res[$i]['data_format_14'];

  $preResfri02[] = $res[$i]['data_format_31'];

  $camResfriado01[] = $res[$i]['data_format_17'];

  $camResfriado02[] = $res[$i]['data_format_29'];

  $giroFreezer[] = $res[$i]['data_format_38'];

  $secaoEmbalagem01[] = $res[$i]['data_format_12'];

  $secaoEmbalagem02[] = $res[$i]['data_format_19'];




  $html.='<tbody style="text-align-last: center;">';
  $html .= '<tr>';
  $html .= '<td colspan="1" rowspan="1">'.$dataHora[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$preChiller01[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$chiller01[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$preChiller02[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$Chiller02[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$preResfri01[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$preResfri02[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$camResfriado01[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$camResfriado02[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$giroFreezer[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$secaoEmbalagem01[$i].'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$secaoEmbalagem02[$i].'</td>';
  $html .= '</tr>';
  $html .= '</tbody>';

}





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
<th scope="col" colspan="12" width=75% >TEMPERATURA DE SALAS DE MANIPULAÇÃO E PRODUTOS EM PROCESSO 01</th>
</tr>
<tr id="bodyThead">
<th scope="row" rowspan="2" colspan="1"></th>
<th colspan="11" >TEMPERATURAS DE AMBIENTES</th>
</tr>
<tr>
<th scope="row" colspan="1">PRÉ-CHILLER 01</th>
<th colspan="1">CHILLER 01</th>
<th colspan="1">PRÉ-CHILLER 02</th>
<th colspan="1">CHILLER 02</th>
<th colspan="1">PRÉ-RESFRIAMENTO 01</th>
<th colspan="1">PRÉ-RESFRIAMENTO 02</th>
<th colspan="1">CÂMARA DE RESFRIADO 01</th>
<th colspan="1">CÂMARA DE RESFRIADO 02</th>
<th colspan="1">GIROFREEZER</th>
<th colspan="1">SEÇÃO DE EMBALAGEM 01</th>
<th colspan="1">SEÇÃO DE EMBALAGEM 02</th>
</tr>
<tr>
<th scope="row" colspan="1" width=10%>DATA E HORA</th>
<th colspan="1">Temperatura</th>
<th colspan="1">Temperatura</th>
<th colspan="1">Temperatura</th>
<th colspan="1">Temperatura</th>
<th colspan="1">Temperatura</th>
<th colspan="1">Temperatura</th>
<th colspan="1">Temperatura</th>
<th colspan="1">Temperatura</th>
<th colspan="1">Temperatura</th>
<th colspan="1">Temperatura</th>
<th colspan="1">Temperatura</th>
</tr>
</thead>

'.$html.'

</table>
</body>
</html>';


    		// Definimos o nome do arquivo que será exportado
$arquivo = 'Relatório temperaturas Produção.xls';
    		// Configurações header para forçar o download
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );
    		// Envia o conteúdo do arquivo
echo $body;
exit;


?>
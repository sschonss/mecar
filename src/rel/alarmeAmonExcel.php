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


$dataHoraIni = $dataIni.' '.$horaIni;

$dataHoraFim = $dataFim.' '.$horaFim;

$dataHoraIniTT = strtotime($dataHoraIni);

$dataHoraFimTT = strtotime($dataHoraFim);

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Manaus');
$data_hoje = strtoupper(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));



$query = $pdo->query("SELECT sensor,
                        case when sensor IN ('data_format_1') then 'SDVA-SM1-C001'
                        when sensor IN ('data_format_2') then 'SDVA-SM1-C002'
                        when sensor IN ('data_format_3') then 'SDVA-SM1-C003'
                        when sensor IN ('data_format_4') then 'SDVA-SM1-C004'
                        when sensor IN ('data_format_5') then 'SDVA-PT1-C005'
                        when sensor IN ('data_format_6') then 'SDVA-PT1-C006'
                        when sensor IN ('data_format_7') then 'SDVA-PT1-C007'
                        when sensor IN ('data_format_8') then 'SDVA-PT1-C008'
                        when sensor IN ('data_format_9') then 'SDVA-PT1-C009'
                        when sensor IN ('data_format_10') then 'SDVA-PT1-C010'
                        when sensor IN ('data_format_11') then 'SDVA-PT1-C011'
                        when sensor IN ('data_format_12') then 'SDVA-AI1-C012'
                        when sensor IN ('data_format_13') then 'SDVA-AI1-C013'
                        when sensor IN ('data_format_14') then 'SDVA-AI1-C014'
                        when sensor IN ('data_format_15') then 'SDVA-AI1-C015'
                        when sensor IN ('data_format_16') then 'SDVA-AI1-C016'
                        when sensor IN ('data_format_17') then 'SDVA-AI1-C017'
                        when sensor IN ('data_format_18') then 'SDVA-SM2-C018'
                        when sensor IN ('data_format_19') then 'SDVA-SM2-C019'
                        when sensor IN ('data_format_20') then 'SDVA-SM2-C020'
                        when sensor IN ('data_format_21') then 'SDVA-SM2-C021'
                        when sensor IN ('data_format_22') then 'SDVA-SM2-C022'
                        when sensor IN ('data_format_23') then 'SDVA-SM2-C023'
                        ELSE '' END
                        AS 'celula',
                        
                        FROM_UNIXTIME(data_hora_ini + 10800, '%Y-%m-%d %H:%i:%s') AS data_ini,
                        FROM_UNIXTIME(data_hora_fim+ 10800, '%Y-%m-%d %H:%i:%s') AS data_fim,
                        timestampdiff(SECOND ,FROM_UNIXTIME(data_hora_ini + 10800, '%Y-%m-%d %H:%i:%s'),
                        FROM_UNIXTIME(data_hora_fim+ 10800, '%Y-%m-%d %H:%i:%s')) AS tempo_ativo,
                        ppm_max, 
                        sensor as sensor,
                        data_index, justificativa, data_hora_just, usuarios.nome
                        FROM data_format_ppm, usuarios
                        WHERE justificativa != 'off' AND data_format_ppm.ativo = 'on' AND
                        usuarios.id = data_format_ppm.user AND
                        data_hora_ini
                        BETWEEN ('{$dataHoraIniTT}') AND ('{$dataHoraFimTT}') ORDER BY data_index desc;");

$res = $query->fetchAll(PDO::FETCH_ASSOC);

for ($i=0; $i < count($res); $i++) {

    foreach ($res[$i] as $key => $value) {

    }

    $id = $res[$i]['data_index'];
    $celula = $res[$i]['celula'];
    $dataAlarme = $res[$i]['data_ini'];
    $dataReset = $res[$i]['data_fim'];
    $ativo = $res[$i]['tempo_ativo'];
    $dataName = $res[$i]['sensor'];
    $just = $res[$i]['justificativa'];
    $dataJust = $res[$i]['data_hora_just'];
    $ppm = $res[$i]['ppm_max'] * 0.1;
    $usuario = $res[$i]['nome'];











  $html.='<tbody>';
  $html .= '<tr>';
  $html .= '<td colspan="1" rowspan="1">'.$id.'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$celula.'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$dataAlarme.'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$dataReset.'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$ativo. ' segundos' .'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$ppm.'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$just.'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$dataJust.'</td>';
  $html .= '<td colspan="1" rowspan="1">'.$usuario.'</td>';
  $html .= '</tr>';
  $html .= '</tbody>';

}





$body = '
<!DOCTYPE html>
<html>
<head>
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
<tr style="font-weight: bold; background-color:#a9a9a9;">
<td colspan="1" rowspan="1">ID</td>
<td colspan="1" rowspan="1">Celula</td>
<td colspan="1" rowspan="1">Data e Hora Alarme</td>
<td colspan="1" rowspan="1">Data e Hora Reset</td>
<td colspan="1" rowspan="1">Tempo Ativo</td>
<td colspan="1" rowspan="1">Pico Max. PPM Durante o Evento</td>
<td colspan="1" rowspan="1">Justificativa</td>
<td colspan="1" rowspan="1">Data e Hora Justificado</td>
<td colspan="1" rowspan="1">Usuario</td>
</tr>
</thead>

'.$html.'

</table>
</body>
</html>';


    		// Definimos o nome do arquivo que ser?? exportado
$arquivo = 'Relat??rio Alarmes C??lula de Am??nia.xls';
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
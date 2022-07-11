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


$dataHoraIni = $dataIni . ' ' . $horaIni;

$dataHoraFim = $dataFim . ' ' . $horaFim;

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = strtoupper(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));

$query = $pdo->query("SELECT FROM_UNIXTIME(`time@timestamp` + 10800, '%d/%m/%y %H:%i') AS 'dataHora', `user_name`, `object_comment`, `action`, information, ip_address, hostname, platform FROM `cMT-Graxaria_operation` WHERE FROM_UNIXTIME(`time@timestamp`) BETWEEN ('{$dataHoraIni}') AND ('{$dataHoraFim}');");

$res = $query->fetchAll(PDO::FETCH_ASSOC);



for ($i = 0; $i < count($res); $i++) {

    foreach ($res[$i] as $key => $value) {
    }


    $dataHora = $res[$i]['dataHora'];

    $usuario = $res[$i]['user_name'];

    $comentario = $res[$i]['object_comment'];

    $acao = $res[$i]['action'];

    $informacao = $res[$i]['information'];

    $ip = $res[$i]['ip_address'];

    $nomeMaquina = $res[$i]['hostname'];

    $plataforma = $res[$i]['platform'];




    $html .= '<tbody style="text-align-last: center;">';
    $html .= '<tr>';
    $html .= '<th colspan="1" rowspan="1">' . $dataHora . '</th>';
    $html .= '<th colspan="1" rowspan="1">' . $usuario . '</th>';
    $html .= '<th colspan="1" rowspan="1">' . $comentario . '</th>';
    $html .= '<th colspan="1" rowspan="1">' . $acao . '</th>';
    $html .= '<th colspan="1" rowspan="1">' . $informacao . '</th>';
    $html .= '<th colspan="1" rowspan="1">' . $ip . '</th>';
    $html .= '<th colspan="1" rowspan="1">' . $nomeMaquina . '</th>';
    $html .= '<th colspan="1" rowspan="1">' . $plataforma . '</th>';
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
<th scope="col" colspan="11" width=75% >Relatório Registro Operações Sub-Produto</th>
</tr>
<tr id="bodyThead">

<th colspan="10" >REGISTRO DE OPERAÇÕES SUB-PRODUTO</th>
</tr>

<tr>
<th scope="row" colspan="1" width=10%>DATA E HORA</th>
<th colspan="1">USUÁRIO</th>
<th colspan="1">COMENTÁRIO</th>
<th colspan="1">AÇÃO</th>
<th colspan="1">INFORMAÇÃO</th>
<th colspan="1">ENDEREÇO IP</th>
<th colspan="1">NOME DA MAQUINA</th>
<th colspan="1">PLATAFORMA</th>
</tr>
</thead>

' . $html . '

</table>
</body>
</html>';


// Definimos o nome do arquivo que será exportado
$arquivo = 'RelatorioOperacoesSubProduto.xls';
// Configurações header para forçar o download
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: application/x-msexcel");
header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
header("Content-Description: PHP Generated Data");
// Envia o conteúdo do arquivo
echo $body;
exit;

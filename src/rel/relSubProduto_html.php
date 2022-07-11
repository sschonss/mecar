<?php
require_once("../conexao.php");

set_time_limit(0);

@session_start();



$dataHoraIni = $_GET['dataIni'] . ' 05:00:00';
$dataHoraFim =  date('Y-m-d H:i:s', strtotime("+1 days", strtotime($dataHoraIni)));
$relatorio = $_GET['relatorio'];

if ($relatorio == "visceras01") {

	$nome_relatorio = "Visceras 01";
}

if ($relatorio == "visceras02") {

	$nome_relatorio = "Visceras 02";
}

if ($relatorio == "visceras03") {

	$nome_relatorio = "Visceras 03";
}

if ($relatorio == "penas01") {

	$nome_relatorio = "Penas 01";
}

if ($relatorio == "penas02") {

	$nome_relatorio = "Penas 02";
}

if ($relatorio == "penas03") {

	$nome_relatorio = "Penas 03";
}





setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

date_default_timezone_set('America/Sao_Paulo');


$data = date('D');
$mes = date('M');
$dia = date('d');
$ano = date('Y');

$semana = array(
    'Sun' => 'DOMIMGO',
    'Mon' => 'SEGUNDA-FEIRA',
    'Tue' => 'TERÇA-FEIRA',
    'Wed' => 'QUARTA-FEIRA',
    'Thu' => 'QUINTA-FEIRA',
    'Fri' => 'SEXTA-FEIRA',
    'Sat' => 'SÁBADO'
);

$mes_extenso = array(
    'Jan' => 'JANEIRO',
    'Feb' => 'FEVEREIRO',
    'Mar' => 'MARÇO',
    'Apr' => 'ABRIL',
    'May' => 'MAIO',
    'Jun' => 'JUNHO',
    'Jul' => 'JULHO',
    'Aug' => 'AGOSTO',
    'Nov' => 'NOVEMBRO',
    'Sep' => 'SETEMBRO',
    'Oct' => 'OUTUBRO',
    'Dec' => 'DEZEMBRO'
);
$data_hoje= $semana["$data"] . ", {$dia} DE " . $mes_extenso["$mes"] . " DE {$ano}";






?>

<!DOCTYPE html>
<html>

<head>
	<title>Fabrica Sub-Produto</title>

	<link rel="shortcut icon" href="../img/icone.ico" type="image/x-icon">

	<link rel="icon" href="../img/rec.ico" type="image/x-icon">
	<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<style>
		@page {
			margin: 0px;

		}

		.footer {
			margin-top: 20px;
			width: 100%;
			background-color: #ebebeb;
			padding: 10px;
		}

		.cabecalho {
			background-color: #ebebeb;
			padding: 10px;
			margin-bottom: 30px;
			width: 100%;
			height: 100px;
		}

		.titulo {
			margin: 0;
			font-size: 28px;
			font-family: Arial, Helvetica, sans-serif;
			color: #6e6d6d;

		}

		.subtitulo {
			margin: 0;
			font-size: 17px;
			font-family: Arial, Helvetica, sans-serif;
		}

		.areaTotais {
			border: 0.5px solid #bcbcbc;
			padding: 15px;
			border-radius: 5px;
			margin-right: 25px;
			margin-left: 25px;
			position: absolute;
			right: 20;
		}

		.areaTotal {
			border: 0.5px solid #bcbcbc;
			padding: 15px;
			border-radius: 5px;
			margin-right: 25px;
			margin-left: 25px;
			background-color: #f9f9f9;
			margin-top: 2px;
		}

		.pgto {
			margin: 1px;
		}

		.fonte13 {
			font-size: 13px;
		}

		.esquerda {
			display: inline;
			width: 50%;
			float: left;
		}

		.direita {
			display: inline;
			width: 50%;
			float: right;
		}

		.table {
			padding: 15px;
			font-family: Verdana, sans-serif;
			margin-top: 20px;
		}

		.texto-tabela {
			font-size: 12px;
		}


		.esquerda_float {

			margin-bottom: 10px;
			margin-top: 10px;
			float: left;
			display: inline;
			margin-left: 15px;
		}


		.titulos {
			margin-top: 10px;
		}

		.image {
			margin-top: 10px;
		}

		.margem-direita {
			margin-right: 80px;
		}

		.container {
			padding-left: 50px;
			padding-right: 50px;
		}

		hr {
			margin: 8px;
			padding: 1px;
		}

		#tabela {
			margin-top: 10px;
		}
	</style>

</head>

<body>


	<div class="cabecalho">
		<div class="row titulos">
			<div class="col-sm-2 esquerda_float image">
				<img src="../img/logo.png" width="170px">
			</div>
			<div class="col-sm-10 esquerda_float">
				<h2 class="titulo"><b><?php echo strtoupper($nome_empresa) ?></b></h2>
				<h6 class="subtitulo"><?php echo $endereco_empresa ?></h6>

			</div>
		</div>

	</div>

	<div class="container">

		<div class="row">
			<div class="col-sm-4 direita" align="right">
				<big> <small> Data: <?php echo $data_hoje; ?></small> </big>
			</div>
		</div>

		<hr>
		<br><br>

		<p class="titulo" align="center"><b>Relatório Fabrica Sub-Produto <?php echo $nome_relatorio; ?></b></p>

		<br><br>

		<div class="table-responsive">

			<table id="tabela" width="100%" cellspacing="0" border="1">

				<thead>
					<tr style="background-color:#a9a9a9; font-weight: bold;">
						<th colspan="11" rowspan="1">Controle de tempo de processo térmico a uma temperatura mínima de 70°C, por no mínimo 45 min.</th>
					</tr>
					<tr style="font-weight: bold;">
						<th colspan="2" rowspan="2">BATELADA</th>
						<th colspan="2" rowspan="1">Início da batelada</th>
						<th colspan="2" rowspan="1">Início Processo térmico</th>
						<th colspan="2" rowspan="1">Final processo térmico</th>
						<th colspan="2" rowspan="1">Final da batelada</th>
						<th colspan="1" rowspan="2">Tempo da batelada</th>
					</tr>
					<tr style="font-weight: bold;">
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
						<th colspan="1" rowspan="1">Hora</th>
						<th colspan="1" rowspan="1">Temp.</th>
					</tr>

				</thead>



				<tbody style="text-align-last: center;">



					<?php


					$query = $pdo->query("SELECT * FROM {$relatorio} WHERE dataHoraIniBatelada BETWEEN ('$dataHoraIni') AND ('$dataHoraFim');");

					$res = $query->fetchAll(PDO::FETCH_ASSOC);

					$batelada = 0;
					$tempoTotalBatelada = 0;

					for ($i = 0; $i < count($res); $i++) {

						foreach ($res[$i] as $key => $value) {
						}

						$tempoBatelada = (strtotime($res[$i]['dataHoraFimBatelada']) - strtotime($res[$i]['dataHoraIniBatelada'])) / 60;
						$tempoTotalBatelada += (strtotime($res[$i]['dataHoraFimBatelada']) - strtotime($res[$i]['dataHoraIniBatelada'])) / 60;

						$batelada = $batelada + 1;

					?>

						</tr>
						<tr>
							<td colspan="2">Batelada <?php echo $batelada; ?></td>
							<td><?php echo date('d/m/Y H:i', strtotime($res[$i]['dataHoraIniBatelada'])); ?></td>
							<td><?php echo number_format(($res[$i]['tempIniBatelada'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res[$i]['dataHoraIniTermico'])); ?></td>
							<td><?php echo number_format(($res[$i]['tempIniTermico'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res[$i]['dataHoraFimTermico'])); ?></td>
							<td><?php echo number_format(($res[$i]['tempFimTermico'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo date('d/m/Y H:i', strtotime($res[$i]['dataHoraFimBatelada'])); ?></td>
							<td><?php echo number_format(($res[$i]['tempFimBatelada'] * 0.01), 2, '.', ''); ?> °C</td>
							<td><?php echo $tempoBatelada; ?> Min.</td>
						</tr>

					<?php } ?>

					<tr>';
						<td colspan="9"></td>
						<td style="font-weight: bold;">Tempo Total</td>
						<td style="font-weight: bold;"><?php echo $tempoTotalBatelada; ?> Min.</td>
					</tr>

				</tbody>

			</table>

		</div>

		<div class="footer">
			<p style="font-size:14px" align="center"></p>
		</div>




</body>

</html>
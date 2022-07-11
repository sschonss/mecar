<?php 
require_once("../conexao.php"); 

set_time_limit(0);

@session_start();


@$dataIni = $_GET['dataIni'];

@$horaIni = $_GET['horaIni'];

@$dataFim = $_GET['dataFim'];

@$horaFim = $_GET['horaFim'];


$dataHoraIni = $dataIni.' '.$horaIni;

$dataHoraFim = $dataFim.' '.$horaFim;

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
	<title>Temperaturas Frigorifico</title>

	<link rel="shortcut icon" href="../img/icone.ico" type="image/x-icon">

	<link rel="icon" href="../img/rec.ico" type="image/x-icon">
	<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<style>

		@page {
			margin: 0px;

		}

		.footer {
			margin-top:20px;
			width:100%;
			background-color: #ebebeb;
			padding:10px;
		}

		.cabecalho {    
			background-color: #ebebeb;
			padding:10px;
			margin-bottom:30px;
			width:100%;
			height:100px;
		}

		.titulo{
			margin:0;
			font-size:28px;
			font-family:Arial, Helvetica, sans-serif;
			color:#6e6d6d;

		}

		.subtitulo{
			margin:0;
			font-size:17px;
			font-family:Arial, Helvetica, sans-serif;
		}

		.areaTotais{
			border : 0.5px solid #bcbcbc;
			padding: 15px;
			border-radius: 5px;
			margin-right:25px;
			margin-left:25px;
			position:absolute;
			right:20;
		}

		.areaTotal{
			border : 0.5px solid #bcbcbc;
			padding: 15px;
			border-radius: 5px;
			margin-right:25px;
			margin-left:25px;
			background-color: #f9f9f9;
			margin-top:2px;
		}

		.pgto{
			margin:1px;
		}

		.fonte13{
			font-size:13px;
		}

		.esquerda{
			display:inline;
			width:50%;
			float:left;
		}

		.direita{
			display:inline;
			width:50%;
			float:right;
		}

		.table{
			padding:15px;
			font-family:Verdana, sans-serif;
			margin-top:20px;
		}

		.texto-tabela{
			font-size:12px;
		}


		.esquerda_float{

			margin-bottom:10px;
			margin-top: 10px;
			float:left;
			display:inline;
			margin-left: 15px;
		}


		.titulos{
			margin-top:10px;
		}

		.image{
			margin-top:10px;
		}

		.margem-direita{
			margin-right: 80px;
		}

		.container{
			padding-left: 50px;
			padding-right: 50px;
		}

		hr{
			margin:8px;
			padding:1px;
		}

		#tabela{
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
				<big> <small> DATA: <?php echo $data_hoje; ?></small> </big>
			</div>
		</div>

		<hr>
		<br><br>

		<p class="titulo" align="center"><b>Relatório de Temperaturas Frigorífico</b></p>

		<br><br>

		<div class="table-responsive">

			<table id="tabela" width="100%" cellspacing="0" border="1">

				<thead>

                    <tr style="font-weight: bold; background-color:#a9a9a9;">
                      <th scope="col" colspan="11" width=75% >TEMPERATURA DE CÂMARAS FRIAS, TÚNEIS DE CONGELAMENTO E SALAS DE CIRCULAÇÃO DE PRODUTOS EMBALADOS</th>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2" colspan="1"><img src="../img/logo.png" style="width: 70%"></th>
                      <th colspan="4" >CÂMARAS DE ESTOCAGEM</th>
                      <th colspan="1" rowspan="2" width=10%>TÚNEL DE CONGELAMENTO ESTÁTICO</th>
                      <th colspan="1" rowspan="2" width=10%>TÚNEL DE CONGELAMENTO CONTÍNUO</th>
                      <th colspan="4" rowspan="1">SALAS DE CIRCULAÇÃO DE PRODUTOS EMBALADOS</th>
                    </tr>
                    <tr>
                      <th scope="row" colspan="1" width=10%>CÂMARA 1</th>
                      <th colspan="1" width=10%>CÂMARA 2</th>
                      <th colspan="1" width=10%>CÂMARA 3</th>
                      <th colspan="1" width=10%>CÂMARA 4</th>
                      <th colspan="1" width=10%>EMBAL. 2° 1</th>
                      <th colspan="1" width=10%>EMBAL. 2° 2</th>
                      <th colspan="1" width=10%>EXPEDIÇÃO</th>
                      <th colspan="1" width=10%>PALETIZAÇÃO</th>
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
                    </tr>

				</thead>



				<tbody style="text-align-last: center;">



					<?php

					
					$query = $pdo->query("SELECT FROM_UNIXTIME(`time@timestamp` + 10800, '%d/%m/%y %H:%i')AS 'dataHora', data_format_1 * 0.1 AS data_format_1, data_format_2 * 0.1 AS data_format_2, data_format_3 * 0.1 AS data_format_3, data_format_4 * 0.1 AS data_format_4, data_format_5 * 0.1 AS data_format_5, data_format_6 * 0.1 AS data_format_6, data_format_8 * 0.1 AS data_format_8, data_format_9 * 0.1 AS data_format_9, data_format_13 * 0.1 AS data_format_13, data_format_23 * 0.1 AS data_format_23 FROM `cMT-0484_DB_Temp_data` WHERE (FROM_UNIXTIME(`time@timestamp`, '%i:%s') like '00:0%' or (FROM_UNIXTIME(`time@timestamp`, '%i:%s') like '30:0%')) AND FROM_UNIXTIME(`time@timestamp` + 10800, '%Y-%m-%d %H:%i') BETWEEN ('{$dataHoraIni}') AND ('{$dataHoraFim}');");

					$res = $query->fetchAll(PDO::FETCH_ASSOC);



					for ($i=0; $i < count($res); $i++) { 

						foreach ($res[$i] as $key => $value) {

						}


					    $dataHora[] = $res[$i]['dataHora'];

					    $camara01[] = $res[$i]['data_format_1'];

					    $camara02[] = $res[$i]['data_format_2'];

					    $camara03[] = $res[$i]['data_format_3'];

					    $camara04[] = $res[$i]['data_format_4'];

					    $expedicao[] = $res[$i]['data_format_5'];

					    $paletizacao[] = $res[$i]['data_format_6'];

					    $tunelEst[] = $res[$i]['data_format_8'];

					    $tunelCont[] = $res[$i]['data_format_9'];

					    $embSecund01[] = $res[$i]['data_format_13'];

					    $embSecund02[] = $res[$i]['data_format_23'];

						
						?>




						
						<tr>
							<td colspan="1" rowspan="1"><?php echo $dataHora[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $camara01[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $camara02[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $camara03[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $camara04[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $tunelEst[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $tunelCont[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $embSecund01[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $embSecund02[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $expedicao[$i]; ?></td>
							<td colspan="1" rowspan="1"><?php echo $paletizacao[$i]; ?></td>
						</tr>

					<?php } ?>











				</tbody>

			</table>

		</div>

		<div class="footer">
			<p style="font-size:14px" align="center"></p> 
		</div>




	</body>
	</html>

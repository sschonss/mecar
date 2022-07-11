<?php
@session_start();


require_once("../conexao.php"); 
include_once("../class/graphEletrica.php");
include_once("../class/graphMecanica.php");
include_once("../class/graphProcesso.php"); 
include_once("../class/graphExterno.php"); 
include_once("../class/graphProducao.php");  
include_once("../class/graphNaoJust.php");  
include_once("../class/graphEletrica24.php");
include_once("../class/graphMecanica24.php");
include_once("../class/graphProcesso24.php"); 
include_once("../class/graphExterno24.php"); 
include_once("../class/graphNaoJust24.php"); 
include_once("../class/graph.php");



?>


<div class="row">
  <div class="col">
    <div class="row">
      <div class="col-md-6">
        <div class="card shadow mb-2">
          <div class="card-body">
            <h5 class="card-title">Últimos 30 Dias</h5>
          </div>
        </div>
        <div class="card shadow mb-2">
          <div class="card-body col-md-11">
            <canvas id="myChart" width="400" height="150"></canvas>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card shadow mb-4">
              <div class="card-body col-md-11">
                <canvas id="myChartPie" width="400" height="400"></canvas>
              </div>
            </div>            
          </div>

          <div class="col-md-6">
            <div class="card shadow mb-4">
              <div class="card-body col-md-11">
                <canvas id="myChartPie2" width="400" height="400"></canvas>
              </div>
            </div>            
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card shadow mb-2">
          <div class="card-body col-md-11">
            <h5 class="card-title">Últimas 24 Horas</h5>
          </div>
        </div>
        <div class="card shadow mb-2">
          <div class="card-body col-md-11">
            <canvas id="myChart2" width="400" height="150"></canvas>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card shadow mb-4">
              <div class="card-body col-md-11">
                <canvas id="myChartPie3" width="400" height="400"></canvas>
              </div>
            </div>            
          </div>

          <div class="col-md-6">
            <div class="card shadow mb-4">
              <div class="card-body col-md-11">
                <canvas id="myChartPie4" width="400" height="400"></canvas>
              </div>
            </div>            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $data = 10;?>

<script>
  var ctx = document.getElementById('myChart');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels:[<?php echo $data1; ?>],
            datasets: 
            [{
              label: 'Elétrica',
              data: [
              <?php echo $data2; ?>
              ],
              backgroundColor:[
              'rgba(79, 79, 79, 0.2)',
              ],
              borderColor:[
              'rgba(79, 79, 79, 1)'
              ],
              borderWidth: 2,
              radius: 1
            },

            {
              label: 'Mecânica',
              data: [
              <?php echo $data3; ?>
              ],
              backgroundColor: 'rgba(0, 255, 0, 0.2)',
              borderColor:'rgba(0, 255, 0, 1)',
              borderWidth: 2,
              radius: 1 
            },

            {
              label: 'Processo',
              data: [
              <?php echo $data5; ?>
              ],
              backgroundColor: 'rgba(0, 0, 255, 0.2)',
              borderColor:'rgba(0, 0, 255, 1)',
              borderWidth: 2,
              radius: 1 
            },

            {
              label: 'Externo',
              data: [
              <?php echo $data4; ?>
              ],
              backgroundColor: 'rgba(75, 0, 130, 0.2)',
              borderColor:'rgba(75, 0, 130, 1)',
              borderWidth: 2,
              radius: 1 
            },

            {
              label: 'Produção',
              data: [
              <?php echo $data6; ?>
              ],
              backgroundColor: 'rgba(255, 0, 0, 0.2)',
              borderColor:'rgba(255, 0, 0, 1)',
              borderWidth: 2,
              radius: 1 
            },

            {
              label: 'Não Justificado',
              data: [
              <?php echo $data7; ?>
              ],
              backgroundColor: 'rgba(255, 159, 64, 0.2)',
              borderColor:'rgba(255, 159, 64, 1)',
              borderWidth: 2,
              radius: 1 
            },]
          },

    options: {
      elements:{
      line:{tension:0}},
      tooltips:{mode: 'index'},
      legend:{display: true, position: 'top', labels: {fontColor: 'rgb(0,0,0)', fontSize: 16}}
    }
  });
</script>

<script>
  var ctx = document.getElementById('myChart2');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels:['<?php echo $hora24Label; ?>','<?php echo $hora23Label; ?>','<?php echo $hora22Label; ?>','<?php echo $hora21Label; ?>','<?php echo $hora20Label; ?>','<?php echo $hora19Label; ?>','<?php echo $hora18Label; ?>','<?php echo $hora17Label; ?>','<?php echo $hora16Label; ?>','<?php echo $hora15Label; ?>','<?php echo $hora14Label; ?>','<?php echo $hora13Label; ?>','<?php echo $hora12Label; ?>','<?php echo $hora11Label; ?>','<?php echo $hora10Label; ?>','<?php echo $hora09Label; ?>','<?php echo $hora08Label; ?>','<?php echo $hora07Label; ?>','<?php echo $hora06Label; ?>','<?php echo $hora05Label; ?>','<?php echo $hora04Label; ?>','<?php echo $hora03Label; ?>','<?php echo $hora02Label; ?>','<?php echo $hora01Label; ?>'],
            datasets: 
            [{
              label: 'Elétrica',
              data: [
              <?php echo $hora24eletrica; ?>,
              <?php echo $hora23eletrica; ?>,
              <?php echo $hora22eletrica; ?>,
              <?php echo $hora21eletrica; ?>,
              <?php echo $hora20eletrica; ?>,
              <?php echo $hora19eletrica; ?>,
              <?php echo $hora18eletrica; ?>,
              <?php echo $hora17eletrica; ?>,
              <?php echo $hora16eletrica; ?>,
              <?php echo $hora15eletrica; ?>,
              <?php echo $hora14eletrica; ?>,
              <?php echo $hora13eletrica; ?>,
              <?php echo $hora12eletrica; ?>,
              <?php echo $hora11eletrica; ?>,
              <?php echo $hora10eletrica; ?>,
              <?php echo $hora09eletrica; ?>,
              <?php echo $hora08eletrica; ?>,
              <?php echo $hora07eletrica; ?>,
              <?php echo $hora06eletrica; ?>,
              <?php echo $hora05eletrica; ?>,
              <?php echo $hora04eletrica; ?>,
              <?php echo $hora03eletrica; ?>,
              <?php echo $hora02eletrica; ?>,
              <?php echo $hora01eletrica; ?>
              ],
              backgroundColor:[
              'rgba(79, 79, 79, 0.2)',
              ],
              borderColor:[
              'rgba(79, 79, 79, 1)'
              ],
              borderWidth: 2,
              radius: 1
            },

            {
              label: 'Mecânica',
              data: [
              <?php echo $hora24mecanica; ?>,
              <?php echo $hora23mecanica; ?>,
              <?php echo $hora22mecanica; ?>,
              <?php echo $hora21mecanica; ?>,
              <?php echo $hora20mecanica; ?>,
              <?php echo $hora19mecanica; ?>,
              <?php echo $hora18mecanica; ?>,
              <?php echo $hora17mecanica; ?>,
              <?php echo $hora16mecanica; ?>,
              <?php echo $hora15mecanica; ?>,
              <?php echo $hora14mecanica; ?>,
              <?php echo $hora13mecanica; ?>,
              <?php echo $hora12mecanica; ?>,
              <?php echo $hora11mecanica; ?>,
              <?php echo $hora10mecanica; ?>,
              <?php echo $hora09mecanica; ?>,
              <?php echo $hora08mecanica; ?>,
              <?php echo $hora07mecanica; ?>,
              <?php echo $hora06mecanica; ?>,
              <?php echo $hora05mecanica; ?>,
              <?php echo $hora04mecanica; ?>,
              <?php echo $hora03mecanica; ?>,
              <?php echo $hora02mecanica; ?>,
              <?php echo $hora01mecanica; ?>
              ],
              backgroundColor: 'rgba(0, 255, 0, 0.2)',
              borderColor:'rgba(0, 255, 0, 1)',
              borderWidth: 2,
              radius: 1 
            },

            {
              label: 'Processo',
              data: [
              <?php echo $hora24processo; ?>,
              <?php echo $hora23processo; ?>,
              <?php echo $hora22processo; ?>,
              <?php echo $hora21processo; ?>,
              <?php echo $hora20processo; ?>,
              <?php echo $hora19processo; ?>,
              <?php echo $hora18processo; ?>,
              <?php echo $hora17processo; ?>,
              <?php echo $hora16processo; ?>,
              <?php echo $hora15processo; ?>,
              <?php echo $hora14processo; ?>,
              <?php echo $hora13processo; ?>,
              <?php echo $hora12processo; ?>,
              <?php echo $hora11processo; ?>,
              <?php echo $hora10processo; ?>,
              <?php echo $hora09processo; ?>,
              <?php echo $hora08processo; ?>,
              <?php echo $hora07processo; ?>,
              <?php echo $hora06processo; ?>,
              <?php echo $hora05processo; ?>,
              <?php echo $hora04processo; ?>,
              <?php echo $hora03processo; ?>,
              <?php echo $hora02processo; ?>,
              <?php echo $hora01processo; ?>
              ],
              backgroundColor: 'rgba(0, 0, 255, 0.2)',
              borderColor:'rgba(0, 0, 255, 1)',
              borderWidth: 2,
              radius: 1 
            },

            {
              label: 'Externo',
              data: [
              <?php echo $hora24externo; ?>,
              <?php echo $hora23externo; ?>,
              <?php echo $hora22externo; ?>,
              <?php echo $hora21externo; ?>,
              <?php echo $hora20externo; ?>,
              <?php echo $hora19externo; ?>,
              <?php echo $hora18externo; ?>,
              <?php echo $hora17externo; ?>,
              <?php echo $hora16externo; ?>,
              <?php echo $hora15externo; ?>,
              <?php echo $hora14externo; ?>,
              <?php echo $hora13externo; ?>,
              <?php echo $hora12externo; ?>,
              <?php echo $hora11externo; ?>,
              <?php echo $hora10externo; ?>,
              <?php echo $hora09externo; ?>,
              <?php echo $hora08externo; ?>,
              <?php echo $hora07externo; ?>,
              <?php echo $hora06externo; ?>,
              <?php echo $hora05externo; ?>,
              <?php echo $hora04externo; ?>,
              <?php echo $hora03externo; ?>,
              <?php echo $hora02externo; ?>,
              <?php echo $hora01externo; ?>
              ],
              backgroundColor: 'rgba(75, 0, 130, 0.2)',
              borderColor:'rgba(75, 0, 130, 1)',
              borderWidth: 2,
              radius: 1 
            },

            {
              label: 'Produção',
              data: [
              <?php echo $hora24producao; ?>,
              <?php echo $hora23producao; ?>,
              <?php echo $hora22producao; ?>,
              <?php echo $hora21producao; ?>,
              <?php echo $hora20producao; ?>,
              <?php echo $hora19producao; ?>,
              <?php echo $hora18producao; ?>,
              <?php echo $hora17producao; ?>,
              <?php echo $hora16producao; ?>,
              <?php echo $hora15producao; ?>,
              <?php echo $hora14producao; ?>,
              <?php echo $hora13producao; ?>,
              <?php echo $hora12producao; ?>,
              <?php echo $hora11producao; ?>,
              <?php echo $hora10producao; ?>,
              <?php echo $hora09producao; ?>,
              <?php echo $hora08producao; ?>,
              <?php echo $hora07producao; ?>,
              <?php echo $hora06producao; ?>,
              <?php echo $hora05producao; ?>,
              <?php echo $hora04producao; ?>,
              <?php echo $hora03producao; ?>,
              <?php echo $hora02producao; ?>,
              <?php echo $hora01producao; ?>

              ],
              backgroundColor: 'rgba(255, 0, 0, 0.2)',
              borderColor:'rgba(255, 0, 0, 1)',
              borderWidth: 2,
              radius: 1 
            },

            {
              label: 'Não Justificado',
              data: [
              <?php echo $hora24naoJust; ?>,
              <?php echo $hora23naoJust; ?>,
              <?php echo $hora22naoJust; ?>,
              <?php echo $hora21naoJust; ?>,
              <?php echo $hora20naoJust; ?>,
              <?php echo $hora19naoJust; ?>,
              <?php echo $hora18naoJust; ?>,
              <?php echo $hora17naoJust; ?>,
              <?php echo $hora16naoJust; ?>,
              <?php echo $hora15naoJust; ?>,
              <?php echo $hora14naoJust; ?>,
              <?php echo $hora13naoJust; ?>,
              <?php echo $hora12naoJust; ?>,
              <?php echo $hora11naoJust; ?>,
              <?php echo $hora10naoJust; ?>,
              <?php echo $hora09naoJust; ?>,
              <?php echo $hora08naoJust; ?>,
              <?php echo $hora07naoJust; ?>,
              <?php echo $hora06naoJust; ?>,
              <?php echo $hora05naoJust; ?>,
              <?php echo $hora04naoJust; ?>,
              <?php echo $hora03naoJust; ?>,
              <?php echo $hora02naoJust; ?>,
              <?php echo $hora01naoJust; ?>
              ],
              backgroundColor: 'rgba(255, 159, 64, 0.2)',
              borderColor:'rgba(255, 159, 64, 1)',
              borderWidth: 2,
              radius: 1 
            },]
          },

    options: {
      elements:{
      line:{tension:0}},
      tooltips:{mode: 'index'},
      legend:{display: true, position: 'top', labels: {fontColor: 'rgb(0,0,0)', fontSize: 16}}
    }
  });
</script>

<script>
  var ctx = document.getElementById('myChartPie');
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Elétrica', 'Mecânica', 'Processo', 'Externo', 'Produção', 'Não Justificado'],
      datasets: [{
        label: '# of Votes',
        data: [
        <?php echo $porcEletrica; ?>,
        <?php echo $porcMecanica; ?>,
        <?php echo $porcProcesso; ?>,
        <?php echo $porcExterno; ?>,
        <?php echo $porcProducao; ?>,
        <?php echo $porcNaoJustificatica; ?>
        ],
        backgroundColor: [
        'rgba(79, 79, 79, 0.5)',
        'rgba(0, 255, 0, 0.5)',
        'rgba(0, 0, 255, 0.5)',
        'rgba(75, 0, 130, 0.5)',
        'rgba(255, 0, 0, 0.5)',
        'rgba(255, 159, 64, 0.5)'
        ],
        borderColor: [
        'rgba(79, 79, 79, 1)',
        'rgba(0, 255, 0, 1)',
        'rgba(0, 0, 255, 1)',
        'rgba(75, 0, 130, 1)',
        'rgba(255, 0, 0, 1)',
        'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      title:{
        display: true,
        text:'Porcentagem tempo de paradas últimos 30 dias'
      },
      legend: {display: false},
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>

<script>
  var ctx = document.getElementById('myChartPie2');
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Elétrica', 'Mecânica', 'Processo', 'Externo', 'Produção', 'Não Justificado'],
      datasets: [{
        label: '# of Votes',
        data: [
        <?php echo $totalEletrica; ?>,
        <?php echo $totalMecanica; ?>,
        <?php echo $totalProcesso; ?>,
        <?php echo $totalExterno; ?>,
        <?php echo $totalProducao; ?>,
        <?php echo $totalJust; ?>
        ],
        backgroundColor: [
        'rgba(79, 79, 79, 0.5)',
        'rgba(0, 255, 0, 0.5)',
        'rgba(0, 0, 255, 0.5)',
        'rgba(75, 0, 130, 0.5)',
        'rgba(255, 0, 0, 0.5)',
        'rgba(255, 159, 64, 0.5)'
        ],
        borderColor: [
        'rgba(79, 79, 79, 1)',
        'rgba(0, 255, 0, 1)',
        'rgba(0, 0, 255, 1)',
        'rgba(75, 0, 130, 1)',
        'rgba(255, 0, 0, 1)',
        'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      title:{
        display: true,
        text:'Tempo total em minutos de paradas últimos 30 Dias: ' + <?php echo $tempoT; ?> + ' m'
      },
      legend: {display: false},
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>

<script>
  var ctx = document.getElementById('myChartPie3');
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Elétrica', 'Mecânica', 'Processo', 'Externo', 'Produção', 'Não Justificado'],
      datasets: [{
        label: '# of Votes',
        data: [
        <?php echo $porcEleHora; ?>,
        <?php echo $porcMecHora; ?>,
        <?php echo $porcProcHora; ?>,
        <?php echo $porcExtHora; ?>,
        <?php echo $porcProdHora; ?>,
        <?php echo $porcNaoJustHora; ?>
        ],
        backgroundColor: [
        'rgba(79, 79, 79, 0.5)',
        'rgba(0, 255, 0, 0.5)',
        'rgba(0, 0, 255, 0.5)',
        'rgba(75, 0, 130, 0.5)',
        'rgba(255, 0, 0, 0.5)',
        'rgba(255, 159, 64, 0.5)'
        ],
        borderColor: [
        'rgba(79, 79, 79, 1)',
        'rgba(0, 255, 0, 1)',
        'rgba(0, 0, 255, 1)',
        'rgba(75, 0, 130, 1)',
        'rgba(255, 0, 0, 1)',
        'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      title:{
        display: true,
        text:'Porcentagem tempo de paradas últimas 24 Horas'
      },
      legend: {display: false},
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>

<script>
  var ctx = document.getElementById('myChartPie4');
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Elétrica', 'Mecânica', 'Processo', 'Externo', 'Produção', 'Não Justificado'],
      datasets: [{
        label: '# of Votes',
        data: [
        <?php echo $horaEle; ?>,
        <?php echo $horaMec; ?>,
        <?php echo $horaProc; ?>,
        <?php echo $horaExt; ?>,
        <?php echo $horaProd; ?>,
        <?php echo $horaNaoJust; ?>
        ],
        backgroundColor: [
        'rgba(79, 79, 79, 0.5)',
        'rgba(0, 255, 0, 0.5)',
        'rgba(0, 0, 255, 0.5)',
        'rgba(75, 0, 130, 0.5)',
        'rgba(255, 0, 0, 0.5)',
        'rgba(255, 159, 64, 0.5)'
        ],
        borderColor: [
        'rgba(79, 79, 79, 1)',
        'rgba(0, 255, 0, 1)',
        'rgba(0, 0, 255, 1)',
        'rgba(75, 0, 130, 1)',
        'rgba(255, 0, 0, 1)',
        'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      title:{
        display: true,
        text:'Tempo total em minutos de paradas últimas 24 Horas: ' + <?php echo $horaTotal1; ?> + ' m'
      },
      legend: {display: false},
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>
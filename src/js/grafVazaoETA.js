


var btn = document.getElementById("button")


btn.addEventListener("click", function(){



  btn.disabled = "disabled";

  // variaveis que serão enviadas


  var dataIni = document.getElementById("dataIni").value;
  var horaIni = document.getElementById("horaIni").value;
  var dataFim = document.getElementById("dataFim").value;
  var horaFim = document.getElementById("horaFim").value; 

  // Fim



  //verifica o dia e mês da data inicial e final da busca
  //Dia
  var dataIniBuscaDia = new Date(dataIni+'T'+horaIni);

  var diaIniBusca = String(dataIniBuscaDia.getDate());

  var dataFimBuscaDia = new Date(dataFim+'T'+horaFim);

  var diaFimBusca = String(dataFimBuscaDia.getDate());

  //Mês
  var dataIniBuscaMes = new Date(dataIni+'T'+horaIni);

  var mesIniBusca = String(dataIniBuscaMes.getMonth() + 1);

  var dataFimBuscaMes = new Date(dataFim+'T'+horaFim);

  var mesFimBusca = String(dataFimBuscaMes.getMonth() + 1);

  

  //Ano
  var dataIniBuscaAno = new Date(dataIni+'T'+horaIni);

  var anoIniBusca = String(dataIniBuscaAno.getYear() - 100);

  var dataFimBuscaAno = new Date(dataFim+'T'+horaFim);

  var anoFimBusca = String(dataFimBuscaAno.getYear() - 100);

  var periodoBuscaAno = anoFimBusca - anoIniBusca;
  //Fim



  if (periodoBuscaAno > 0) {

    var periodoBuscaMes = (12 * periodoBuscaAno) + (mesFimBusca - mesIniBusca);

  }else{

    var periodoBuscaMes = mesFimBusca - mesIniBusca;

  }


  // Calculo para período de busca

  var dataHoraInicial = new Date(dataIni+'T'+horaIni);
  var dataHoraFinal = new Date(dataFim+'T'+horaFim);

  var timeBusca = (dataHoraFinal.getTime() - dataHoraInicial.getTime()) / 1000;


  //Função para comparar se a variavel de hora é maior que um determinado horario
  function compararHora(hora1, hora2)
  {
    hora1 = hora1.split(":");
    hora2 = hora2.split(":");

    var d = new Date();
    var data1 = new Date(d.getFullYear(), d.getMonth(), d.getDate(), hora1[0], hora1[1]);
    var data2 = new Date(d.getFullYear(), d.getMonth(), d.getDate(), hora2[0], hora2[1]);

    return data1 > data2;
  };


  var horaIniBusca01 = compararHora(horaIni, '00:10');
  var horaIniBusca02 = compararHora(horaIni, '00:59');

  var horaFimBusca01 = compararHora(horaIni, '00:10');
  var horaFimBusca02 = compararHora(horaIni, '00:59');


  //verifica qual tipo de relatório deverá ser carregado
  if ((horaIniBusca01 === true && horaIniBusca02 === false) === true && (horaFimBusca01 === true && horaFimBusca02 === false) === true) {

    if (periodoBuscaMes >= 2) {

      if (diaIniBusca == '1' && diaFimBusca == '1') {

        var busca = "mes";

        console.log('mes 01');

      }else{

        var busca = "dia";

        console.log('dia 01');

      }

    }else{

      if (timeBusca >= 172800) {

        var busca = "dia";

        console.log('dia 02');

      }else{

        var busca = "hora";

        console.log('hora 01');

      }

    }

  }else{ 

    var busca = "hora";

        console.log('hora 02');

  }

  //Fim


  $('#carregando').show();

  $('#carregadoGrafico').hide();

  $('#semDados').hide();


    //Fim 


    // Metodo que envia os dados para consulta

    $.get( "../class/grafVazaoETA_"+ busca +".php", {
      "dataIni":dataIni,
      "horaIni":horaIni,
      "dataFim":dataFim,
      "horaFim":horaFim}
      )

    

    //Retorno dos dados

    .done(function(data) {
     var json = JSON.parse(data);

     console.log(json);

     // Fim

     //Inicio Gráfico

     var trace1 = {
      x:json.dataLinhas,
      y: json.linha01,
      type: 'scatter',
      line: {color: "#008000"},
      name: 'Vazão 01'
    };

    var trace2 = {
      x:json.dataLinhas,
      y: json.linha02,
      type: 'scatter',
      line: {color: "#FF0000"},
      name: 'Vazão 02'
    };

    var trace = [trace1, trace2];

    // Converte Data e Hora para padrão Brasileiro e monta o Titulo do gráfico

    var periodoBuscaIni = dataIni.split('-').reverse().join('/') + " " + horaIni;
    var periodoBuscaFim = dataFim.split('-').reverse().join('/') + " " + horaFim;
    var periodoBusca = "Período da Busca: " + periodoBuscaIni + " à " + periodoBuscaFim;

    //Fim

    var layout = {
      title: periodoBusca,
      showlegend: true
    };

    var config = {responsive: true, scrollZoom: true}

    $('#carregando').hide();

    if (json.dataLinha01 == "" && json.dataLinha02 == "") {

      $('#semDados').show();

      btn.disabled = "";

    }else{

      $('#carregadoGrafico').show();

      btn.disabled = "";

      Plotly.newPlot('graf01', trace, layout, config);

    }

    

    //Fim do Gráfico



  });


  });





var btn = document.getElementById("button")

btn.addEventListener("click", function(){
  btn.disabled = "disabled";

  // variaveis que serão enviadas

  var dataIni = document.getElementById("dataIni").value;
  var horaIni = document.getElementById("horaIni").value;
  var dataFim = document.getElementById("dataFim").value;
  var horaFim = document.getElementById("horaFim").value;
  var linha01 = document.getElementById("linha01").value;
  var linha02 = document.getElementById("linha02").value;
  var linha03 = document.getElementById("linha03").value;
  var linha04 = document.getElementById("linha04").value;

  // Fim

  // Calculo para período de busca

  var dataHoraInicial = new Date(dataIni+'T'+horaIni);
  var dataHoraFinal = new Date(dataFim+'T'+horaFim);

  var timeBusca = (dataHoraFinal.getTime() - dataHoraInicial.getTime()) / 1000;

  // Fim

  if (timeBusca > 86400) {

    alert("O periodo entre à Data e Hora inicial e Data e Hora Final deve ser de no Máximo 24 Horas, Verifique e Tente Novamente! ");

    btn.disabled = "";

  }else{


  // Verifica se as Linhas estão vazias    

    if (linha01 ==='' && linha02 ==='' && linha03 ==='' && linha04 ==='') {

      document.getElementById("linha01").style.border = "1px solid red";
      document.getElementById("linha02").style.border = "1px solid red";
      document.getElementById("linha03").style.border = "1px solid red";
      document.getElementById("linha04").style.border = "1px solid red";

      alert("Selecione uma Linha");

      btn.disabled = "";

      // Fim

    }else{

      document.getElementById("linha01").style.border = "";
      document.getElementById("linha02").style.border = "";
      document.getElementById("linha03").style.border = "";
      document.getElementById("linha04").style.border = "";

      $('#carregadoGrafico').hide();
      $('#semDados').hide();
      $('#carregando').show();


    // Verifica se existe alguma opção selecionada e carrega descrição das linha no gráfico

      if (linha01 !== '') {

        var optionLinha01 = document.getElementById("linha01").selectedOptions[0];
        var descLinha01 = optionLinha01.textContent;

      }else{

        var descLinha01 = 0;

      };

      if (linha02 !== '') {

        var optionLinha02 = document.getElementById("linha02").selectedOptions[0];
        var descLinha02 = optionLinha02.textContent;

      }else{

        var descLinha02 = 0;

      };

      if (linha03 !== '') {

        var optionLinha03 = document.getElementById("linha03").selectedOptions[0];
        var descLinha03 = optionLinha03.textContent;

      }else{

        var descLinha03 = 0;

      };

      if (linha04 !== '') {

        var optionLinha04 = document.getElementById("linha04").selectedOptions[0];
        var descLinha04 = optionLinha04.textContent;

      }else{

        var descLinha04 = 0;

      };

    //Fim 


    // Metodo que envia os dados para consulta

      $.get( "../class/graficoSubProduto.php", {
        "dataIni":dataIni, "horaIni":horaIni,
        "dataFim":dataFim, "horaFim":horaFim,
        "linha01":linha01, "linha02":linha02,
        "linha03":linha03, "linha04":linha04}
        )

    //Retorno dos dados
    
      .done(function(data) {
       var json = JSON.parse(data);


     // Fim
        
        console.log(json);

     //Inicio Gráfico

     var trace1 = {
      x:json.dataLinha1,
      y: json.linha1,
      type: 'scatter',
      line: {color: "#008000"},
      name: descLinha01
    };

    var trace2 = {
      x:json.dataLinha2,
      y: json.linha2,
      type: 'scatter',
      line: {color: "#B22222"},
      name: descLinha02
    };

    var trace3 = {
      x:json.dataLinha3,
      y: json.linha3,
      type: 'scatter',
      line: {color: "#0000CD"},
      name: descLinha03
    };

    var trace4 = {
      x:json.dataLinha4,
      y: json.linha4,
      type: 'scatter',
      line: {color: "#8A2BE2"},
      name: descLinha04
    };


    // Verifica quais linha retornaram dados para carregamento do Gráfico

    var trace = [];


    if (json.linha1 === "undefined" || json.linha1.length === 0) {


    }else{

      trace.push(trace1);

    }

    if (json.linha2 === "undefined" || json.linha2.length === 0) {


    }else{

      trace.push(trace2);

    }

    if (json.linha3 === "undefined" || json.linha3.length === 0) {


    }else{

      trace.push(trace3);

    }

    if (json.linha4 === "undefined" || json.linha4.length === 0) {


    }else{

      trace.push(trace4);

    }
   
    // Fim 

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

    if (trace.length === 0) {

      $('#semDados').show();

      btn.disabled = "";

    }else{

      $('#carregadoGrafico').show();

      btn.disabled = "";

      Plotly.newPlot('graf01', trace, layout, config);

    }

    

    //Fim do Gráfico



  });
      
    }

  }

})



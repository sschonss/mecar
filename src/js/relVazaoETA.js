


var btn = document.getElementById("button")

var contador = 0;


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
  if ((horaIniBusca01 === true && horaIniBusca02 === false) === true && (horaFimBusca01 === true && horaFimBusca02 === false) === true ) {
    
    if (periodoBuscaMes >= 2) {

      if (diaIniBusca == '1' && diaFimBusca == '1') {

        var busca = "mes";

      }else{

        var busca = "dia";

      }

    }else{

      if (timeBusca >= 172800) {

        var busca = "dia";

      }else{

        var busca = "hora";

      }

    }

  }else{ 

    var busca = "hora";

  }

  //Fim


  $('#carregando').show();
  $('#table').hide();
  $('#semDados').hide();


    //Fim 


    // Metodo que envia os dados para consulta

    $.get( "../class/relVazaoETA_"+ busca +".php", {
      "dataIni":dataIni,
      "horaIni":horaIni,
      "dataFim":dataFim,
      "horaFim":horaFim}
      )

    

    //Retorno dos dados

    .done(function(data) {

      var json = JSON.parse(data);  

      if (json.length <= 191) {

        $('#carregando').hide();
        $('#semDados').show();
         btn.disabled = "";

      }else{

        if (contador == 1 ) {

          $('#dataTable1').DataTable().destroy();
          $('#dataTable1').html(json);
          $('#dataTable1').DataTable({
            "ordering": false
          }).draw();

        }else{

          $('#dataTable1').html(json);
          $('#dataTable1').DataTable({
            "ordering": false
          });
        }

        contador = 1;

        $('#carregando').hide();
        $('#table').show();
    
        btn.disabled = "";

        $('#pdf').attr('href', '../rel/relVazaoETA.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&rel='+ busca)
        $('#pdf').attr('target', '_blank');

        $('#excel').attr('href', '../rel/relVazaoETA_'+ busca +'_Excel.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim)

      }

  });

       
});



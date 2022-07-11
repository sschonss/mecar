


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


  $('#carregando').show();
  $('#table').hide();


    //Fim 


    // Metodo que envia os dados para consulta

    $.get( "../class/relTempProducao02.php", {
      "dataIni":dataIni,
      "horaIni":horaIni,
      "dataFim":dataFim,
      "horaFim":horaFim}
      )

    

    //Retorno dos dados

    .done(function(data) {

      var json = JSON.parse(data);
     

      var table = "";


      for (var i = 0; i < json.dataHora.length; i++) {
        
        var dataHora = "<tr><td>" + json.dataHora[i] + "</td>";
        var secaoCorte01 = "<td>" + json.secaoCorte01[i] + "</td>";
        var secaoCorte02 = "<td>" + json.secaoCorte02[i] + "</td>";
        var secaoCorte03 = "<td>" + json.secaoCorte03[i] + "</td>";
        var secaoCorte04 = "<td>" + json.secaoCorte04[i] + "</td>";
        var secaoSalgado = "<td>" + json.secaoSalgado[i] + "</td>";
        var secaoBandeja = "<td>" + json.secaoBandeja[i] + "</td>";
        var secaoEmbIQF = "<td>" + json.secaoEmbIQF[i] + "</td>";
        var secaoIQF = "<td>" + json.secaoIQF[i] + "</td>";
        var secaoCMS = "<td>" + json.secaoCMS[i] + "</td>";
        var secaoCMR = "<td>" + json.secaoCMR[i] + "</td></tr>";

        table += dataHora += secaoCorte01 += secaoCorte02 += secaoCorte03 += secaoCorte04 += secaoSalgado += secaoBandeja += secaoEmbIQF += secaoIQF += secaoCMS += secaoCMR;


      }

     

        if (contador == 1 ) {

          $('#dataTable1').DataTable().destroy();
          $('#conteudoTable').html(table);
          $('#dataTable1').DataTable().draw();

        }else{

          $('#conteudoTable').html(table);
          $('#dataTable1').DataTable();
        }

        
      
        contador = 1;

    $('#carregando').hide();
    $('#table').show();
    
    btn.disabled = "";

    $('#pdf').attr('href', '../rel/relTempProducao02.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim)
    $('#pdf').attr('target', '_blank');

    $('#excel').attr('href', '../rel/relTempProducao02Excel.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim)
    
    $('#atualizar_secao_de_corte_01').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_corte_01')

    $('#atualizar_secao_de_corte_02').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_corte_02')

    $('#atualizar_secao_de_corte_03').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_corte_03')

    $('#atualizar_secao_de_corte_04').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_corte_04')

    $('#atualizar_secao_de_salgado').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_salgado')

    $('#atualizar_secao_de_bandeja').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_bandeja')

    $('#atualizar_secao_de_emb_IQF').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_emb_IQF')

    $('#atualizar_secao_de_IQF').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_IQF')

    $('#atualizar_secao_de_CMS').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_CMS')

    $('#atualizar_secao_de_CMR').attr('href', '../painel-users/ajuste_area_producao_02/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_de_CMR')


    });

       
});



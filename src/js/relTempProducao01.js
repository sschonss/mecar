


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

    $.get( "../class/relTempProducao01.php", {
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
        var preChiller01 = "<td>" + json.preChiller01[i] + "</td>";
        var chiller01 = "<td>" + json.chiller01[i] + "</td>";
        var preChiller02 = "<td>" + json.preChiller02[i] + "</td>";
        var chiller02 = "<td>" + json.chiller02[i] + "</td>";
        var preResfri01 = "<td>" + json.preResfri01[i] + "</td>";
        var preResfri02 = "<td>" + json.preResfri02[i] + "</td>";
        var camResfriado01 = "<td>" + json.camResfriado01[i] + "</td>";
        var camResfriado02 = "<td>" + json.camResfriado02[i] + "</td>";
        var giroFreezer = "<td>" + json.giroFreezer[i] + "</td>";
        var secaoEmbalagem01 = "<td>" + json.secaoEmbalagem01[i] + "</td>";
        var secaoEmbalagem02 = "<td>" + json.secaoEmbalagem02[i] + "</td></tr>";

        table += dataHora += preChiller01 += chiller01 += preChiller02 += chiller02 += preResfri01 += preResfri02 += camResfriado01 += camResfriado02 += giroFreezer += secaoEmbalagem01 += secaoEmbalagem02;


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

    $('#pdf').attr('href', '../rel/relTempProducao01.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim)
    $('#pdf').attr('target', '_blank');

    $('#excel').attr('href', '../rel/relTempProducao01Excel.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim)

    $('#atualizar_pre_chiller_01_V').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=pre_chiller_01_V')

    $('#atualizar_chiller_01_V').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=chiller_01_V')

    $('#atualizar_pre_chiller_02_N').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=pre_chiller_02_N')

    $('#atualizar_chiller_02_N').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=chiller_02_N')

    $('#atualizar_pre_resfriamento_01').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=pre_resfriamento_01')

    $('#atualizar_pre_resfriamento_02').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=pre_resfriamento_02')

    $('#atualizar_camara_resfriado_01').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=camara_resfriado_01')

    $('#atualizar_camara_resfriado_02').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=camara_resfriado_02')

    $('#atualizar_girofreezer').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=girofreezer')

    $('#atualizar_secao_embalagem_01').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_embalagem_01')

    $('#atualizar_secao_embalagem_02').attr('href', '../painel-users/ajuste_area_producao_01/atualizar.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim + '&coluna=secao_embalagem_02')




    });

       
});



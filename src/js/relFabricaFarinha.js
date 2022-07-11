


var btn = document.getElementById("button")



btn.addEventListener("click", function(){

  

  btn.disabled = "disabled";



  // variaveis que serão enviadas 
  var dataIni = document.getElementById("dataIni").value;
  var relatorio = document.getElementById("relatorio").value;

  // Fim


  $('#carregando').show();
  $('#table').hide();
  $('#semDados').hide();

    //Fim 

    if (relatorio == "geral") {

      $.get( "../class/relFabricaFarinhaGeral.php", {
        "dataIni":dataIni}
        )


      //Retorno dos dados

      .done(function(data) {

        var json = JSON.parse(data);  

        if (json.length <= 1) {

          $('#carregando').hide();
          $('#semDados').show();
           btn.disabled = "";

        }else{

                     
            $('#dataTable1').html(json);
        

          $('#carregando').hide();
          $('#table').show();
      
          btn.disabled = "";

          $('#pdf').attr('href', '../rel/relFabricaFarinha.php?dataIni=' + dataIni + '&relatorio=geral')
          $('#pdf').attr('target', '_blank');

          $('#excel').attr('href', '../rel/relFabricaFarinhaGeralExcel.php?dataIni=' + dataIni)

        }

    });

    }else{

      // Metodo que envia os dados para consulta

      $.get( "../class/relFabricaFarinha.php", {
        "dataIni":dataIni,
        "relatorio":relatorio}
        )

      

      //Retorno dos dados

      .done(function(data) {

        var json = JSON.parse(data);  

        if (json.length <= 1) {

          $('#carregando').hide();
          $('#semDados').show();
           btn.disabled = "";

        }else{

                     
            $('#dataTable1').html(json);
        

          $('#carregando').hide();
          $('#table').show();
      
          btn.disabled = "";

          $('#pdf').attr('href', '../rel/relFabricaFarinha.php?dataIni=' + dataIni + '&relatorio=' + relatorio)
          $('#pdf').attr('target', '_blank');

          $('#excel').attr('href', '../rel/relFabricaFarinhaExcel.php?dataIni=' + dataIni + '&relatorio=' + relatorio)

        }

    });

  };     
});






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

    $.get( "../class/relOperation.php", {
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
        var user_name = "<td>" + json.user_name[i] + "</td>";
        var object_comment = "<td>" + json.object_comment[i] + "</td>";
        var action = "<td>" + json.action[i] + "</td>";
        var information = "<td>" + json.information[i] + "</td>";
        var hostname = "<td>" + json.hostname[i] + "</td>";
        var ip_address = "<td>" + json.ip_address[i] + "</td>";
        var platform = "<td>" + json.platform[i] + "</td>";
        "</tr>";

        table += dataHora += user_name += object_comment += action += information += hostname += ip_address += platform;


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

    $('#pdf').attr('href', '../rel/relOperation.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim)
    $('#pdf').attr('target', '_blank');

    $('#excel').attr('href', '../rel/relOperationExcel.php?dataIni=' + dataIni + '&horaIni=' + horaIni + '&dataFim=' + dataFim + '&horaFim=' + horaFim)
    
   



  });

       
});



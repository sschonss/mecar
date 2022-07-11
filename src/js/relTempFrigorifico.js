var btn = document.getElementById('button')

var contador = 0

btn.addEventListener('click', function () {
  btn.disabled = 'disabled'

  // variaveis que serão enviadas

  var dataIni = document.getElementById('dataIni').value
  var horaIni = document.getElementById('horaIni').value
  var dataFim = document.getElementById('dataFim').value
  var horaFim = document.getElementById('horaFim').value

  // Fim

  $('#carregando').show()
  $('#table').hide()

  //Fim

  // Metodo que envia os dados para consulta

  $.get('../class/relTempFrigorifico.php', {
    dataIni: dataIni,
    horaIni: horaIni,
    dataFim: dataFim,
    horaFim: horaFim,
  })

    //Retorno dos dados

    .done(function (data) {
      var json = JSON.parse(data)

      var table = ''

      for (var i = 0; i < json.dataHora.length; i++) {
        var dataHora = '<tr><td>' + json.dataHora[i] + '</td>'
        var camara01 = '<td>' + json.camara01[i] + '</td>'
        var camara02 = '<td>' + json.camara02[i] + '</td>'
        var camara03 = '<td>' + json.camara03[i] + '</td>'
        var camara04 = '<td>' + json.camara04[i] + '</td>'
        var tunelEst = '<td>' + json.tunelEst[i] + '</td>'
        var tunelCont = '<td>' + json.tunelCont[i] + '</td>'
        var embSecund01 = '<td>' + json.embSecund01[i] + '</td>'
        var embSecund02 = '<td>' + json.embSecund02[i] + '</td>'
        var expedicao = '<td>' + json.expedicao[i] + '</td>'
        var paletizacao = '<td>' + json.paletizacao[i] + '</td></tr>'

        table += dataHora += camara01 += camara02 += camara03 += camara04 += tunelEst += tunelCont += embSecund01 += embSecund02 += expedicao += paletizacao
      }

      if (contador == 1) {
        $('#dataTable1').DataTable().destroy()
        $('#conteudoTable').html(table)
        $('#dataTable1').DataTable().draw()
      } else {
        $('#conteudoTable').html(table)
        $('#dataTable1').DataTable()
      }

      contador = 1

      $('#carregando').hide()
      $('#table').show()

      btn.disabled = ''

      $('#pdf').attr(
        'href',
        '../rel/relTempFrigorifico.php?dataIni=' +
          dataIni +
          '&horaIni=' +
          horaIni +
          '&dataFim=' +
          dataFim +
          '&horaFim=' +
          horaFim,
      )
      $('#pdf').attr('target', '_blank')

      $('#excel').attr(
        'href',
        '../rel/relTempFrigorificoExcel.php?dataIni=' +
          dataIni +
          '&horaIni=' +
          horaIni +
          '&dataFim=' +
          dataFim +
          '&horaFim=' +
          horaFim,
      )

      $('#atualizar_camara_01').attr(
        'href',
        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
          dataIni +
          '&horaIni=' +
          horaIni +
          '&dataFim=' +
          dataFim +
          '&horaFim=' +
          horaFim +
          '&coluna=camara_01',
      )


      $('#atualizar_camara_02').attr(
        'href',
        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
          dataIni +
          '&horaIni=' +
          horaIni +
          '&dataFim=' +
          dataFim +
          '&horaFim=' +
          horaFim +
          '&coluna=camara_02',
      )

      $('#atualizar_camara_03').attr(
        'href',
        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
          dataIni +
          '&horaIni=' +
          horaIni +
          '&dataFim=' +
          dataFim +
          '&horaFim=' +
          horaFim +
          '&coluna=camara_03',
      )

      $('#atualizar_camara_04').attr(
        'href',
        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
          dataIni +
          '&horaIni=' +
          horaIni +
          '&dataFim=' +
          dataFim +
          '&horaFim=' +
          horaFim +
          '&coluna=camara_04',
      )

      $('#atualizar_tunel_estatico').attr(
        'href',
        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
          dataIni +
          '&horaIni=' +
          horaIni +
          '&dataFim=' +
          dataFim +
          '&horaFim=' +
          horaFim +
          '&coluna=tunel_estatico',
      )

      $('#atualizar_tunel_continuo').attr(

        'href',
        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
          dataIni +
          '&horaIni=' +
          horaIni +
          '&dataFim=' +
          dataFim +
          '&horaFim=' +
          horaFim +
          '&coluna=tunel_continuo',
      )



      $('#atualizar_embalagem_secundaria_01').attr(
        'href',
        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
          dataIni +
          '&horaIni=' +
          horaIni +
          '&dataFim=' +
          dataFim +
          '&horaFim=' +
          horaFim +
          '&coluna=embalagem_secundaria_01',
      )


      $('#atualizar_embalagem_secundaria_02').attr(
        'href',
        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
          dataIni +
          '&horaIni=' +
          horaIni +
          '&dataFim=' +
          dataFim +
          '&horaFim=' +
          horaFim +
          '&coluna=cembalagem_secundaria_02',
      )

      $('#atualizar_tunel_estatico').attr(
        'href',
        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
          dataIni +
          '&horaIni=' +
          horaIni +
          '&dataFim=' +
          dataFim +
          '&horaFim=' +
          horaFim +
          '&coluna=tunel_estatico',
      )

      $('#atualizar_tunel_continuo').attr(
        'href',
        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
          dataIni +
          '&horaIni=' +
          horaIni +
          '&dataFim=' +
          dataFim +
          '&horaFim=' +
          horaFim +
          '&coluna=tunel_continuo',
      )

      $('#atualizar_embalagem_secundaria_01').attr(
        'href',
        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
          dataIni +
          '&horaIni=' +
          horaIni +
          '&dataFim=' +
          dataFim +
          '&horaFim=' +
          horaFim +
          '&coluna=embalagem_secundaria_01',
      )

      $('#atualizar_embalagem_secundaria_02').attr(
        'href',
        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
          dataIni +
          '&horaIni=' +
          horaIni +
          '&dataFim=' +
          dataFim +
          '&horaFim=' +
          horaFim +
          '&coluna=embalagem_secundaria_02',
      )

      $('#atualizar_expedicao').attr(
        'href',
        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
          dataIni +
          '&horaIni=' +
          horaIni +
          '&dataFim=' +
          dataFim +
          '&horaFim=' +
          horaFim +
          '&coluna=expedicao',
      )

      $('#atualizar_paletizacao').attr(
        'href',
        '../painel-users/ajuste_area_frigorifico/atualizar.php?dataIni=' +
          dataIni +
          '&horaIni=' +
          horaIni +
          '&dataFim=' +
          dataFim +
          '&horaFim=' +
          horaFim +
          '&coluna=paletizacao',
      )
    })
})

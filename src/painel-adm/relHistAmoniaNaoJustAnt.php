<?php

$pag = "relHistAmoniaNaoJustAnt";

require_once("../conexao.php");



@session_start();

//verificar se o usuário está autenticado

if(@$_SESSION['id_usuario'] == null || @$_SESSION['painel'] != 'painel-adm'){

    echo "<script language='javascript'> window.location='../index.php' </script>";



}


?>


<!-- DataTales Example -->

<div class="card shadow mb-4">



    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <div class="form-group">
                        <a href="../rel/alarmeAmonNaoJustAnt.php" target="_blank" class="text-danger" title="Gerar relatório"><i class="far fa-file-pdf" style="font-size: 35px; margin-top: 26px"></i></a>


                        <a href="../rel/alarmeAmonNaoJustExcelAnt.php" class="text-success" title="Gerar relatório EXCEL"><i class="far fa-file-excel ml-2" style="font-size: 35px; margin-top: 26px"></i></a>
                    </div>
                </div>
            </div>
        </div>


        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Célula</th>
                    <th>Data e Hora Alarme</th>
                    <th>Data e Hora Reset</th>
                    <th>Tempo Ativo</th>
                    <th>Nível PPM</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $query = $pdo->query("SELECT dfn.data_name as dataName, 
                    case when dfn.data_name IN ('data_format_1') then 'SDVA-SM1-C001' 
                    when dfn.data_name IN ('data_format_2') then 'SDVA-SM1-C002' 
                    when dfn.data_name IN ('data_format_3') then 'SDVA-SM1-C003' 
                    when dfn.data_name IN ('data_format_4') then 'SDVA-SM1-C004' 
                    when dfn.data_name IN ('data_format_5') then 'SDVA-PT1-C005' 
                    when dfn.data_name IN ('data_format_6') then 'SDVA-PT1-C006' 
                    when dfn.data_name IN ('data_format_7') then 'SDVA-PT1-C007' 
                    when dfn.data_name IN ('data_format_8') then 'SDVA-PT1-C008' 
                    when dfn.data_name IN ('data_format_9') then 'SDVA-PT1-C009' 
                    when dfn.data_name IN ('data_format_10') then 'SDVA-PT1-C010' 
                    when dfn.data_name IN ('data_format_11') then 'SDVA-PT1-C011' 
                    when dfn.data_name IN ('data_format_12') then 'SDVA-AI1-C012' 
                    when dfn.data_name IN ('data_format_13') then 'SDVA-AI1-C013' 
                    when dfn.data_name IN ('data_format_14') then 'SDVA-AI1-C014' 
                    when dfn.data_name IN ('data_format_15') then 'SDVA-AI1-C015' 
                    when dfn.data_name IN ('data_format_16') then 'SDVA-AI1-C016' 
                    when dfn.data_name IN ('data_format_17') then 'SDVA-AI1-C017' 
                    when dfn.data_name IN ('data_format_18') then 'SDVA-SM2-C018' 
                    when dfn.data_name IN ('data_format_19') then 'SDVA-SM2-C019' 
                    when dfn.data_name IN ('data_format_20') then 'SDVA-SM2-C020' 
                    when dfn.data_name IN ('data_format_21') then 'SDVA-SM2-C021' 
                    when dfn.data_name IN ('data_format_22') then 'SDVA-SM2-C022' 
                    when dfn.data_name IN ('data_format_23') then 'SDVA-SM2-C023' 
                    ELSE '' END 
                    AS 'celula', ev.event_index, el.language1 
                    AS 'Descrição do Alarme' , FROM_UNIXTIME(ev.`trigger_time@timestamp` + 10800, '%d/%m/%Y %H:%i:%s') 
                    AS  'dataAlarme', FROM_UNIXTIME(ev.`recover_time@timestamp` + 10800, '%d/%m/%Y %H:%i:%s') 
                    AS 'dataReset', TIMESTAMPDIFF(HOUR,FROM_UNIXTIME(ev.`trigger_time@timestamp`, '%Y-%m-%d %H:%i:%s'), FROM_UNIXTIME(ev.`recover_time@timestamp`, '%Y-%m-%d %H:%i:%s')) 
                    AS Horas, TIMESTAMPDIFF(MINUTE,FROM_UNIXTIME(ev.`trigger_time@timestamp`, '%Y-%m-%d %H:%i:%s'), FROM_UNIXTIME(ev.`recover_time@timestamp`, '%Y-%m-%d %H:%i:%s')) %60 
                    AS Minutos, TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(ev.`trigger_time@timestamp`, '%Y-%m-%d %H:%i:%s'), FROM_UNIXTIME(ev.`recover_time@timestamp`, '%Y-%m-%d %H:%i:%s')) %60   
                    AS segundos, je.just AS Justificativa, DATE_FORMAT(je.dataHora_just,'%d/%m/%Y %H:%i:%s' ) 
                    AS 'timeJustificativa' 
                    FROM `cMT-0484_event` ev
                    LEFT JOIN `cMT-0484_event_log` el ON el.event_log_index = ev.event_log_index 
                    LEFT JOIN `data_format_name` dfn ON el.event_log_index = dfn.alarme or el.event_log_index = dfn.trip 
                    LEFT JOIN `justEvent` je ON ev.event_index = je.event_index 
                    WHERE NOT EXISTS 
                    (SELECT e.event_index 
                    FROM `cMT-0484_event` e 
                    WHERE e.event_index != je.event_index) 
                    AND ev.event_log_index >= '2621' 
                    AND ev.event_log_index <= '2666' 
                    ORDER BY ev.`trigger_time@timestamp` 
                    desc;");

                $res = $query->fetchAll(PDO::FETCH_ASSOC);

                for ($i=0; $i < count($res); $i++) {

                    foreach ($res[$i] as $key => $value) {

                    }


                    $id = $res[$i]['event_index'];
                    $celula = $res[$i]['celula'];
                    $dataAlarme = $res[$i]['dataAlarme'];
                    $dataReset = $res[$i]['dataReset'];
                    $dataName = $res[$i]['dataName'];
                    $ativo = $res[$i]['Horas'].'h '.$res[$i]['Minutos'].'m '.$res[$i]['segundos'].'s';
                    $dataNameHamonia = $res[$i]['dataName']."_hamonia";


                    //converter para timestamp
                    $dataAlarmeFormat = str_replace("/", "-", $dataAlarme);
                    $dataAlarmeFormatTT = strtotime($dataAlarmeFormat). ".000";

                    $dataResetFormat = str_replace("/","-", $dataReset);
                    $dataResetFormatTT = strtotime($dataResetFormat). ".000";


                    $query1 = $pdo->query("SELECT {$dataName} as ppm 
                                                        FROM {$dataNameHamonia} 
                                                        WHERE FROM_UNIXTIME(`time@timestamp` + 10800, '%d-%m-%Y %h:%i:%s')
                                                        BETWEEN ('$dataAlarmeFormat') AND ('$dataResetFormat') 
                                                        ORDER BY {$dataName} DESC 
                                                        LIMIT 1;");

                    $res1 = $query1->fetchAll(PDO::FETCH_ASSOC);
                    $ppm = $res1[0]['ppm'] * 0.1;


                    ?>


                    <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $celula ?></td>
                        <td><?php echo $dataAlarme ?></td>
                        <td><?php echo $dataReset ?></td>
                        <td><?php echo $ativo ?></td>
                        <td><?php echo $ppm ?></td>
                        <td>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Justificar Alarme'><i class='far fa-edit'></i></a>

                            <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>
                        </td>
                    </tr>

                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>



    <?php



    ?>







    <!-- Modal -->

    <div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <?php

                    if (@$_GET['funcao'] == 'editar') {

                        $titulo = "Editar Registro";

                        $id2 = $_GET['id'];



                        $query = $pdo->query("SELECT  case when dfn.data_name IN ('data_format_1') then 'SDVA-SM1-C001' when dfn.data_name IN ('data_format_2') then 'SDVA-SM1-C002'
                        when dfn.data_name IN ('data_format_3') then 'SDVA-SM1-C003' when dfn.data_name IN ('data_format_4') then 'SDVA-SM1-C004'
                        when dfn.data_name IN ('data_format_5') then 'SDVA-PT1-C005' when dfn.data_name IN ('data_format_6') then 'SDVA-PT1-C006'
                        when dfn.data_name IN ('data_format_7') then 'SDVA-PT1-C007' when dfn.data_name IN ('data_format_8') then 'SDVA-PT1-C008'
                        when dfn.data_name IN ('data_format_9') then 'SDVA-PT1-C009' when dfn.data_name IN ('data_format_10') then 'SDVA-PT1-C0010'
                        when dfn.data_name IN ('data_format_11') then 'SDVA-PT1-C0011' when dfn.data_name IN ('data_format_12') then 'SDVA-AI1-C012'
                        when dfn.data_name IN ('data_format_13') then 'SDVA-AI1-C013' when dfn.data_name IN ('data_format_14') then 'SDVA-AI1-C014'
                        when dfn.data_name IN ('data_format_15') then 'SDVA-AI1-C015' when dfn.data_name IN ('data_format_16') then 'SDVA-AI1-C016'
                        when dfn.data_name IN ('data_format_17') then 'SSDVA-AI1-C017' when dfn.data_name IN ('data_format_18') then 'SDVA-SM2-C018'
                        when dfn.data_name IN ('data_format_19') then 'SDVA-SM2-C019' when dfn.data_name IN ('data_format_20') then 'SDVA-SM2-C020'
                        when dfn.data_name IN ('data_format_21') then 'SDVA-SM2-C021' when dfn.data_name IN ('data_format_22') then 'SDVA-SM2-C022'
                        when dfn.data_name IN ('data_format_23') then 'SDVA-SM2-C023'
                        ELSE '' END AS 'celula', ev.event_index, el.language1 AS 'Descrição do Alarme' , FROM_UNIXTIME(ev.`trigger_time@timestamp` + 10800, '%d/%m/%Y %H:%i:%s') AS 
                        'dataAlarme', FROM_UNIXTIME(ev.`recover_time@timestamp` + 10800, '%d/%m/%Y %H:%i:%s') AS 'dataReset',
                        TIMESTAMPDIFF(HOUR,FROM_UNIXTIME(ev.`trigger_time@timestamp`, '%Y-%m-%d %H:%i:%s')
                        ,FROM_UNIXTIME(ev.`recover_time@timestamp`, '%Y-%m-%d %H:%i:%s'))
                        AS Horas,
                        TIMESTAMPDIFF(MINUTE,FROM_UNIXTIME(ev.`trigger_time@timestamp`, '%Y-%m-%d %H:%i:%s'),
                        FROM_UNIXTIME(ev.`recover_time@timestamp`, '%Y-%m-%d %H:%i:%s'))
                        %60 AS Minutos, 
                        TIMESTAMPDIFF(SECOND,FROM_UNIXTIME(ev.`trigger_time@timestamp`, '%Y-%m-%d %H:%i:%s'),
                        FROM_UNIXTIME(ev.`recover_time@timestamp`, '%Y-%m-%d %H:%i:%s'))
                        %60   AS segundos, je.just AS Justificativa, DATE_FORMAT(je.dataHora_just,'%d/%m/%Y %H:%i:%s' ) AS 'timeJustificativa'
                        FROM `cMT-0484_event` ev LEFT JOIN `cMT-0484_event_log` el ON el.event_log_index = ev.event_log_index
                        LEFT JOIN `data_format_name` dfn ON el.event_log_index = dfn.alarme or el.event_log_index = dfn.trip LEFT JOIN `justEvent` je
                        ON ev.event_index = je.event_index
                        WHERE ev.event_index = '".$id2."';");

                        $res = $query->fetchAll(PDO::FETCH_ASSOC);


                        $event_index2 = $res[0]['event_index'];

                        $celula2 = $res[0]['celula'];

                        $dataAlarme2 = $res[0]['dataAlarme'];

                        $dataReset2 = $res[0]['dataReset'];

                        $ativo2 = $res[0]['Horas'].'h '.$res[0]['Minutos'].'m '.$res[0]['segundos'].'s';



                    } else {

                        $titulo = "Inserir Registro";



                    }





                    ?>



                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo ?></h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <form id="form" method="POST">

                    <div class="modal-body">


                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label >ID</label>

                                    <input value="<?php echo @$event_index2 ?>" type="text" class="form-control" id="id" name="id" placeholder="ID" disabled="disabled">

                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label >Célula</label>

                                    <input value="<?php echo @$celula2 ?>" type="text" class="form-control" id="celula" name="celula" placeholder="Célula" disabled>

                                </div>

                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label >Data e Hora Alarme</label>

                                    <input value="<?php echo @$dataAlarme2 ?>" type="text" class="form-control" id="dataAlarme" name="dataAlarme" placeholder="Data e Hora Alarme" disabled>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label >Data e Hora Reset</label>

                                    <input value="<?php echo @$dataReset2 ?>" type="text" class="form-control" id="dataReset" name="dataReset" placeholder="Data e Hora Reset" disabled>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label >Tempo Ativo</label>

                                    <input value="<?php echo @$ativo2 ?>" type="text" class="form-control" id="ativo" name="ativo" placeholder="Tempo Ativo" disabled>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">

                                    <label>Justificativa</label>

                                    <textarea class="form-control" rows="4" id="justificativa" name="justificativa" placeholder="Justificativa"></textarea>

                                </div>

                            </div>

                        </div>

                    </div>


                    <small>

                        <div id="mensagem">



                        </div>

                    </small>

                    <div class="modal-footer">

                        <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid2" id="txtid2">



                        <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                        <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>












<div class="modal" id="modal-deletar" tabindex="-1" role="dialog">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Excluir Registro</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">



                <p>Deseja realmente Excluir este Registro?</p>



                <div align="center" id="mensagem_excluir" class="">



                </div>



            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-excluir">Cancelar</button>

                <form method="post">



                    <input type="hidden" id="id"  name="id" value="<?php echo @$_GET['id'] ?>" required>



                    <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>

                </form>

            </div>

        </div>

    </div>

</div>









<div class="modal" id="modal-endereco" tabindex="-1" role="dialog">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Dados do Usuário</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">



                <?php

                if (@$_GET['funcao'] == 'endereco') {



                    $id2 = $_GET['id'];



                    $query = $pdo->query("SELECT * FROM usuarios where id = '$id2' ");

                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    $nome3 = $res[0]['nome'];

                    $email3 = $res[0]['email'];



                }





                ?>



                <span><b>Nome: </b> <i><?php echo $nome3 ?></i></span><br>

                <span><b>Email: </b> <i><?php echo $email3 ?></i></span><br>



            </div>



        </div>

    </div>

</div>













<?php



if (@$_GET["funcao"] != null && @$_GET["funcao"] == "novo") {

    echo "<script>$('#modalDados').modal('show');</script>";

}



if (@$_GET["funcao"] != null && @$_GET["funcao"] == "editar") {

    echo "<script>$('#modalDados').modal('show');</script>";

}



if (@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir") {

    echo "<script>$('#modal-deletar').modal('show');</script>";

}



if (@$_GET["funcao"] != null && @$_GET["funcao"] == "endereco") {

    echo "<script>$('#modal-endereco').modal('show');</script>";

}



?>









<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM -->

<script type="text/javascript">

    $("#form").submit(function () {

        var pag = "<?=$pag?>";

        event.preventDefault();

        var formData = new FormData(this);



        $.ajax({

            url: pag + "/inserir.php",

            type: 'POST',

            data: formData,



            success: function (mensagem) {



                $('#mensagem').removeClass()



                if (mensagem.trim() == "Salvo com Sucesso!") {



                    //$('#nome').val('');

                    //$('#cpf').val('');

                    $('#btn-fechar').click();


                    window.location = "index.php?pag="+ pag;



                } else {



                    $('#mensagem').addClass('text-danger')

                }



                $('#mensagem').text(mensagem)



            },



            cache: false,

            contentType: false,

            processData: false,

            xhr: function () {  // Custom XMLHttpRequest

                var myXhr = $.ajaxSettings.xhr();

                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload

                    myXhr.upload.addEventListener('progress', function () {

                        /* faz alguma coisa durante o progresso do upload */

                    }, false);

                }

                return myXhr;

            }

        });

    });

</script>


<!--AJAX PARA EXCLUSÃO DOS DADOS -->

<script type="text/javascript">

    $(document).ready(function () {

        var pag = "<?=$pag?>";

        $('#btn-deletar').click(function (event) {

            event.preventDefault();



            $.ajax({

                url: pag + "/excluir.php",

                method: "post",

                data: $('form').serialize(),

                dataType: "text",

                success: function (mensagem) {



                    if (mensagem.trim() === 'Excluído com Sucesso!') {





                        $('#btn-cancelar-excluir').click();

                        window.location = "index.php?pag=" + pag;

                    }



                    $('#mensagem_excluir').text(mensagem)







                },



            })

        })

    })

</script>







<!--SCRIPT PARA CARREGAR IMAGEM -->

<script type="text/javascript">



    function carregarImg() {



        var target = document.getElementById('target');

        var file = document.querySelector("input[type=file]").files[0];

        var reader = new FileReader();



        reader.onloadend = function () {

            target.src = reader.result;

        };



        if (file) {

            reader.readAsDataURL(file);





        } else {

            target.src = "";

        }

    }



</script>











<script type="text/javascript">

    $(document).ready(function () {

        $('#dataTable').dataTable({

            "ordering": false

        })



    });

</script>








<?php

$pag = "ajuste_area_producao_01";

require_once("../conexao.php");



@session_start();

//verificar se o usuário está autenticado

if (@$_SESSION['id_usuario'] == null || @$_SESSION['painel'] != 'painel-adm') {

    echo "<script language='javascript'> window.location='../index.php' </script>";
}



?>



<div class="row mt-4 mb-4">

    <a type="button" class="btn-info btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag ?>&funcao=atualizar">Editar Dados</a>

    <a type="button" class="btn-info btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag ?>&funcao=atualizar">+</a>



</div>







<!-- DataTales Example -->

<div class="card shadow mb-4">



    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>

                <tr>

                    <th>Pré Chiller 01 V</th>
                    <th>Chiller 01 V</th>
                    <th>Pré Chiller 02 N</th>
                    <th>Chiller 02 N</th>
                    <th>Pré Resfriamento 01</th>
                    <th>Pré Resfriamento 02</th>
                    <th>Câmara de Resfriado 01</th>
                    <th>Câmara de Resfriado 02</th>
                    <th>Girofreezer</th>
                    <th>Seção Embalagem 01</th>
                    <th>Seção Embalagem 02</th>


                </tr>

                </thead>



                <tbody>



                <?php



                $query = $pdo->query("SELECT * FROM ajuste_area_producao_01");

                $res = $query->fetchAll(PDO::FETCH_ASSOC);



                for ($i = 0; $i < count($res); $i++) {

                    foreach ($res[$i] as $key => $value) {
                    }



                    $pre_chiller_01_V_min = $res[$i]['pre_chiller_01_V_min'];
                    $pre_chiller_01_V_max = $res[$i]['pre_chiller_01_V_max'];
                    $pre_chiller_01_V_habilita = $res[$i]['pre_chiller_01_V_habilita'];

                    $chiller_01_V_min = $res[$i]['chiller_01_V_min'];
                    $chiller_01_V_max = $res[$i]['chiller_01_V_max'];
                    $chiller_01_V_habilita = $res[$i]['chiller_01_V_habilita'];

                    $pre_chiller_02_N_min = $res[$i]['pre_chiller_02_N_min'];
                    $pre_chiller_02_N_max = $res[$i]['pre_chiller_02_N_max'];
                    $pre_chiller_02_N_habilita = $res[$i]['pre_chiller_02_N_habilita'];

                    $chiller_02_N_min = $res[$i]['chiller_02_N_min'];
                    $chiller_02_N_max = $res[$i]['chiller_02_N_max'];
                    $chiller_02_N_habilita = $res[$i]['chiller_02_N_habilita'];

                    $pre_resfriamento_01_min = $res[$i]['pre_resfriamento_01_min'];
                    $pre_resfriamento_01_max = $res[$i]['pre_resfriamento_01_max'];
                    $pre_resfriamento_01_habilita = $res[$i]['pre_resfriamento_01_habilita'];

                    $pre_resfriamento_02_min = $res[$i]['pre_resfriamento_02_min'];
                    $pre_resfriamento_02_max = $res[$i]['pre_resfriamento_02_max'];
                    $pre_resfriamento_02_habilita = $res[$i]['pre_resfriamento_02_habilita'];

                    $camara_de_resfriado_01_min = $res[$i]['camara_de_resfriado_01_min'];
                    $camara_de_resfriado_01_max = $res[$i]['camara_de_resfriado_01_max'];
                    $camara_de_resfriado_01_habilita = $res[$i]['camara_de_resfriado_01_habilita'];

                    $camara_de_resfriado_02_min = $res[$i]['camara_de_resfriado_02_min'];
                    $camara_de_resfriado_02_max = $res[$i]['camara_de_resfriado_02_max'];
                    $camara_de_resfriado_02_habilita = $res[$i]['camara_de_resfriado_02_habilita'];

                    $girofreezer_min = $res[$i]['girofreezer_min'];
                    $girofreezer_max = $res[$i]['girofreezer_max'];
                    $girofreezer_habilita = $res[$i]['girofreezer_habilita'];

                    $secao_embalagem_01_min = $res[$i]['secao_embalagem_01_min'];
                    $secao_embalagem_01_max = $res[$i]['secao_embalagem_01_max'];
                    $secao_embalagem_01_habilita = $res[$i]['secao_embalagem_01_habilita'];

                    $secao_embalagem_02_min = $res[$i]['secao_embalagem_02_min'];
                    $secao_embalagem_02_max = $res[$i]['secao_embalagem_02_max'];
                    $secao_embalagem_02_habilita = $res[$i]['secao_embalagem_02_habilita'];



                    ?>
                    <tr>
                        <td>
                            <b>Min: </b> <?php echo $pre_chiller_01_V_min  ?> <br>
                            <b>Máx: </b> <?php echo $pre_chiller_01_V_max  ?> <br>
                        </td>
                        <td>
                            <b>Min: </b> <?php echo $chiller_01_V_min  ?> <br>
                            <b>Máx: </b> <?php echo $chiller_01_V_max  ?> <br>
                        </td>
                        <td>
                            <b>Min: </b> <?php echo $pre_chiller_02_N_min  ?> <br>
                            <b>Máx: </b> <?php echo $pre_chiller_02_N_max  ?> <br>
                        </td>
                        <td>
                            <b>Min: </b> <?php echo $chiller_02_N_min  ?> <br>
                            <b>Máx: </b> <?php echo $chiller_02_N_max  ?> <br>
                        </td>
                        <td>
                            <b>Min: </b> <?php echo $pre_resfriamento_01_min  ?> <br>
                            <b>Máx: </b> <?php echo $pre_resfriamento_01_max  ?> <br>
                        </td>
                        <td>
                            <b>Min: </b> <?php echo $pre_resfriamento_02_min  ?> <br>
                            <b>Máx: </b> <?php echo $pre_resfriamento_02_max  ?> <br>
                        </td>
                        <td>
                            <b>Min: </b> <?php echo $camara_de_resfriado_01_min  ?> <br>
                            <b>Máx: </b> <?php echo $camara_de_resfriado_01_max  ?> <br>
                        </td>
                        <td>
                            <b>Min: </b> <?php echo $camara_de_resfriado_02_min  ?> <br>
                            <b>Máx: </b> <?php echo $camara_de_resfriado_02_max  ?> <br>
                        </td>
                        <td>
                            <b>Min: </b> <?php echo $girofreezer_min  ?> <br>
                            <b>Máx: </b> <?php echo $girofreezer_max  ?> <br>
                        </td>
                        <td>
                            <b>Min: </b> <?php echo $secao_embalagem_01_min  ?> <br>
                            <b>Máx: </b> <?php echo $secao_embalagem_01_max  ?> <br>
                        </td>
                        <td>
                            <b>Min: </b> <?php echo $secao_embalagem_02_min  ?> <br>
                            <b>Máx: </b> <?php echo $secao_embalagem_02_max  ?> <br>
                        </td>

                    </tr>

                <?php } ?>


                </tbody>

            </table>

        </div>

    </div>

</div>











<!-- Modal -->

<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <?php

                if (@$_GET['funcao'] == 'atualizar') {

                    $titulo = "Editar Dados Ajuste";





                    $query = $pdo->query("SELECT * FROM ajuste_area_producao_01");

                    $res = $query->fetchAll(PDO::FETCH_ASSOC);


                    $pre_chiller_01_V_min = $res[0]['pre_chiller_01_V_min'];
                    $pre_chiller_01_V_max = $res[0]['pre_chiller_01_V_max'];
                    $pre_chiller_01_V_habilita = $res[0]['pre_chiller_01_V_habilita'];

                    $chiller_01_V_min = $res[0]['chiller_01_V_min'];
                    $chiller_01_V_max = $res[0]['chiller_01_V_max'];
                    $chiller_01_V_habilita = $res[0]['chiller_01_V_habilita'];

                    $pre_chiller_02_N_min = $res[0]['pre_chiller_02_N_min'];
                    $pre_chiller_02_N_max = $res[0]['pre_chiller_02_N_max'];
                    $pre_chiller_02_N_habilita = $res[0]['pre_chiller_02_N_habilita'];

                    $chiller_02_N_min = $res[0]['chiller_02_N_min'];
                    $chiller_02_N_max = $res[0]['chiller_02_N_max'];
                    $chiller_02_N_habilita = $res[0]['chiller_02_N_habilita'];

                    $pre_resfriamento_01_min = $res[0]['pre_resfriamento_01_min'];
                    $pre_resfriamento_01_max = $res[0]['pre_resfriamento_01_max'];
                    $pre_resfriamento_01_habilita = $res[0]['pre_resfriamento_01_habilita'];

                    $pre_resfriamento_02_min = $res[0]['pre_resfriamento_02_min'];
                    $pre_resfriamento_02_max = $res[0]['pre_resfriamento_02_max'];
                    $pre_resfriamento_02_habilita = $res[0]['pre_resfriamento_02_habilita'];

                    $camara_de_resfriado_01_min = $res[0]['camara_de_resfriado_01_min'];
                    $camara_de_resfriado_01_max = $res[0]['camara_de_resfriado_01_max'];
                    $camara_de_resfriado_01_habilita = $res[0]['camara_de_resfriado_01_habilita'];

                    $camara_de_resfriado_02_min = $res[0]['camara_de_resfriado_02_min'];
                    $camara_de_resfriado_02_max = $res[0]['camara_de_resfriado_02_max'];
                    $camara_de_resfriado_02_habilita = $res[0]['camara_de_resfriado_02_habilita'];

                    $girofreezer_min = $res[0]['girofreezer_min'];
                    $girofreezer_max = $res[0]['girofreezer_max'];
                    $girofreezer_habilita = $res[0]['girofreezer_habilita'];

                    $secao_embalagem_01_min = $res[0]['secao_embalagem_01_min'];
                    $secao_embalagem_01_max = $res[0]['secao_embalagem_01_max'];
                    $secao_embalagem_01_habilita = $res[0]['secao_embalagem_01_habilita'];

                    $secao_embalagem_02_min = $res[0]['secao_embalagem_02_min'];
                    $secao_embalagem_02_max = $res[0]['secao_embalagem_02_max'];
                    $secao_embalagem_02_habilita = $res[0]['secao_embalagem_02_habilita'];




                } else {

                    $titulo = "Editar Dados Ajuste";
                }





                ?>



                <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo ?></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <form id="form" method="POST">

                <div class="modal-body col-lg-12">
                    <div class="row">
                        <div class="col-lg-6" >
                            <label for="pre_chiller_01_V"><b>Pré Chiller 01 - V</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="pre_chiller_01_V_min">Min.</label>
                                    <input type="number" class="form-control" id="pre_chiller_01_V_min" name="pre_chiller_01_V_min" value="<?php echo $pre_chiller_01_V_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="pre_chiller_01_V_max">Máx.</label>
                                    <input type="number" class="form-control" id="pre_chiller_01_V_max" name="pre_chiller_01_V_max" value="<?php echo $pre_chiller_01_V_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="pre_chiller_01_V_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="pre_chiller_01_V_habilita" name="pre_chiller_01_V_habilita">
                                        <option value="on" <?php if ($pre_chiller_01_V_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($pre_chiller_01_V_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>

                            <hr>
                        </div>
                        <div class="col-lg-6" >
                            <label for="chiller_01_V"><b>Chiller 01 V</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="chiller_01_V_min">Min.</label>
                                    <input type="number" class="form-control" id="chiller_01_V_min" name="chiller_01_V_min" value="<?php echo $chiller_01_V_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="chiller_01_V_max">Máx.</label>
                                    <input type="number" class="form-control" id="chiller_01_V_max" name="chiller_01_V_max" value="<?php echo $chiller_01_V_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="chiller_01_V_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="chiller_01_V_habilita" name="chiller_01_V_habilita">
                                        <option value="on" <?php if ($chiller_01_V_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($chiller_01_V_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6" >
                            <label for="pre_chiller_02_N"><b>Pré Chiller 02 N</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="pre_chiller_02_N_min">Min.</label>
                                    <input type="number" class="form-control" id="pre_chiller_02_N_min" name="pre_chiller_02_N_min" value="<?php echo $pre_chiller_01_V_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="pre_chiller_02_N_max">Máx.</label>
                                    <input type="number" class="form-control" id="pre_chiller_02_N_max" name="pre_chiller_02_N_max" value="<?php echo $pre_chiller_02_N_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="pre_chiller_02_N_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="pre_chiller_02_N_habilita" name="pre_chiller_02_N_habilita">
                                        <option value="on" <?php if ($pre_chiller_02_N_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($pre_chiller_02_N_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6" >
                            <label for="chiller_02_N"><b>Chiller 02 N</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="chiller_02_N_min">Min.</label>
                                    <input type="number" class="form-control" id="chiller_02_N_min" name="chiller_02_N_min" value="<?php echo $chiller_02_N_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="chiller_02_N_max">Máx.</label>
                                    <input type="number" class="form-control" id="chiller_02_N_max" name="chiller_02_N_max" value="<?php echo $chiller_02_N_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="chiller_02_N_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="chiller_02_N_habilita" name="chiller_02_N_habilita">
                                        <option value="on" <?php if ($chiller_02_N_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($chiller_02_N_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label for="pre_resfriamento_01"><b>Pré Resfriamento 01</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="pre_resfriamento_01_min">Min.</label>
                                    <input type="number" class="form-control" id="pre_resfriamento_01_min" name="pre_resfriamento_01_min" value="<?php echo $pre_resfriamento_01_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="pre_resfriamento_01_max">Máx.</label>
                                    <input type="number" class="form-control" id="pre_resfriamento_01_max" name="pre_resfriamento_01_max" value="<?php echo $pre_resfriamento_01_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="pre_resfriamento_01_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="pre_resfriamento_01_habilita" name="pre_resfriamento_01_habilita">
                                        <option value="on" <?php if ($pre_resfriamento_01_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($pre_resfriamento_01_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>

                        </div>
                        <div class="col-lg-6">
                            <label for="pre_resfriamento_02"><b>Pré Resfriamento 02</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="pre_resfriamento_02_min">Min.</label>
                                    <input type="number" class="form-control" id="pre_resfriamento_02_min" name="pre_resfriamento_02_min" value="<?php echo $pre_resfriamento_02_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="pre_resfriamento_02_max">Máx.</label>
                                    <input type="number" class="form-control" id="pre_resfriamento_02_max" name="pre_resfriamento_02_max" value="<?php echo $pre_resfriamento_02_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="pre_resfriamento_02_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="pre_resfriamento_02_habilita" name="pre_resfriamento_02_habilita">
                                        <option value="on" <?php if ($pre_resfriamento_02_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($pre_resfriamento_02_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label for="camara_de_resfriado_01"><b>Câmara de Resfriado 01</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="camara_de_resfriado_01_min">Min.</label>
                                    <input type="number" class="form-control" id="camara_de_resfriado_01_min" name="camara_de_resfriado_01_min" value="<?php echo $camara_de_resfriado_01_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="camara_de_resfriado_01_max">Máx.</label>
                                    <input type="number" class="form-control" id="camara_de_resfriado_01_max" name="camara_de_resfriado_01_max" value="<?php echo $camara_de_resfriado_01_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="camara_de_resfriado_01_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="camara_de_resfriado_01_habilita" name="camara_de_resfriado_01_habilita">
                                        <option value="on" <?php if ($camara_de_resfriado_01_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($camara_de_resfriado_01_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label for="camara_de_resfriado_02"><b>Câmara de Resfriado 02</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="camara_de_resfriado_02_min">Min.</label>
                                    <input type="number" class="form-control" id="camara_de_resfriado_02_min" name="camara_de_resfriado_02_min" value="<?php echo $camara_de_resfriado_02_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="camara_de_resfriado_02_max">Máx.</label>
                                    <input type="number" class="form-control" id="camara_de_resfriado_02_max" name="camara_de_resfriado_02_max" value="<?php echo $camara_de_resfriado_02_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="camara_de_resfriado_02_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="camara_de_resfriado_02_habilita" name="camara_de_resfriado_02_habilita">
                                        <option value="on" <?php if ($camara_de_resfriado_02_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($camara_de_resfriado_02_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <label for="girofreezer"><b>Girofreezer</b></label>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="girofreezer_min">Min.</label>
                                    <input type="number" class="form-control" id="girofreezer_min" name="girofreezer_min" value="<?php echo $girofreezer_min ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="girofreezer_max">Máx.</label>
                                    <input type="number" class="form-control" id="girofreezer_max" name="girofreezer_max" value="<?php echo $girofreezer_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="girofreezer_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="girofreezer_habilita" name="girofreezer_habilita">
                                        <option value="on" <?php if ($girofreezer_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($girofreezer_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label for="secao_embalagem_01"><b>Seção de Embalagem 01</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="secao_embalagem_01_min">Min.</label>
                                    <input type="number" class="form-control" id="secao_embalagem_01_min" name="secao_embalagem_01_min" value="<?php echo $secao_embalagem_01_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="secao_embalagem_01_max">Máx.</label>
                                    <input type="number" class="form-control" id="secao_embalagem_01_max" name="secao_embalagem_01_max" value="<?php echo $secao_embalagem_01_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="secao_embalagem_01_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="secao_embalagem_01_habilita" name="secao_embalagem_01_habilita">
                                        <option value="on" <?php if ($secao_embalagem_01_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($secao_embalagem_01_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="secao_embalagem_02"><b>Seção Embalagem 02</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="secao_embalagem_02_min">Min.</label>
                                    <input type="number" class="form-control" id="secao_embalagem_02_min" name="secao_embalagem_02_min" value="<?php echo $secao_embalagem_02_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="secao_embalagem_02_max">Máx.</label>
                                    <input type="number" class="form-control" id="secao_embalagem_02_max" name="secao_embalagem_02_max" value="<?php echo $secao_embalagem_02_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="secao_embalagem_02_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="secao_embalagem_02_habilita" name="secao_embalagem_02_habilita">
                                        <option value="on" <?php if ($secao_embalagem_02_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($secao_embalagem_02_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div>
                    <small>

                        <div id="mensagem">



                        </div>

                    </small>



                </div>







                <div class="modal-footer">



                    <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                    <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>

                </div>

            </form>

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



                        <input type="hidden" id="id" name="id" value="<?php echo @$_GET['id'] ?>" required>



                        <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>

                    </form>

                </div>

            </div>

        </div>

    </div>






















    <?php



    if (@$_GET["funcao"] != null && @$_GET["funcao"] == "atualizar") {

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
        $("#form").submit(function() {

            var pag = "<?= $pag ?>";

            event.preventDefault();

            var formData = new FormData(this);



            $.ajax({

                url: pag + "/inserir.php",

                type: 'POST',

                data: formData,



                success: function(mensagem) {



                    $('#mensagem').removeClass()



                    if (mensagem.trim() == "Salvo com Sucesso!") {



                        //$('#nome').val('');

                        //$('#cpf').val('');

                        $('#btn-fechar').click();

                        window.location = "index.php?pag=" + pag;



                    } else {



                        $('#mensagem').addClass('text-danger')

                    }



                    $('#mensagem').text(mensagem)



                },



                cache: false,

                contentType: false,

                processData: false,

                xhr: function() { // Custom XMLHttpRequest

                    var myXhr = $.ajaxSettings.xhr();

                    if (myXhr.upload) { // Avalia se tem suporte a propriedade upload

                        myXhr.upload.addEventListener('progress', function() {

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
        $(document).ready(function() {

            var pag = "<?= $pag ?>";

            $('#btn-deletar').click(function(event) {

                event.preventDefault();



                $.ajax({

                    url: pag + "/excluir.php",

                    method: "post",

                    data: $('form').serialize(),

                    dataType: "text",

                    success: function(mensagem) {



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



            reader.onloadend = function() {

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
        $(document).ready(function() {

            $('#dataTable').dataTable({

                "ordering": false

            })



        });
    </script>
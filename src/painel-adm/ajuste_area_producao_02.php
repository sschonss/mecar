<?php

$pag = "ajuste_area_producao_02";

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

                    <th>Seção de Corte 01</th>
                    <th>Seção de Corte 02</th>
                    <th>Seção de Corte 03</th>
                    <th>Seção de Corte 04</th>
                    <th>Seção de Salgado</th>
                    <th>Seção de Bandeja</th>
                    <th>Seção de Emb. IQF</th>
                    <th>Seção de IQF</th>
                    <th>Seção de CMS</th>
                    <th>Seção de CMR</th>


                </tr>

                </thead>



                <tbody>



                <?php



                $query = $pdo->query("SELECT * FROM ajuste_area_producao_02");

                $res = $query->fetchAll(PDO::FETCH_ASSOC);



                for ($i = 0; $i < count($res); $i++) {

                    foreach ($res[$i] as $key => $value) {
                    }



                    $secao_de_corte_01_min = $res[$i]['secao_de_corte_01_min'];
                    $secao_de_corte_01_max = $res[$i]['secao_de_corte_01_max'];
                    $secao_de_corte_01_habilita = $res[$i]['secao_de_corte_01_habilita'];

                    $secao_de_corte_02_min = $res[$i]['secao_de_corte_02_min'];
                    $secao_de_corte_02_max = $res[$i]['secao_de_corte_02_max'];
                    $secao_de_corte_02_habilita = $res[$i]['secao_de_corte_02_habilita'];

                    $secao_de_corte_03_min = $res[$i]['secao_de_corte_03_min'];
                    $secao_de_corte_03_max = $res[$i]['secao_de_corte_03_max'];
                    $secao_de_corte_03_habilita = $res[$i]['secao_de_corte_03_habilita'];

                    $secao_de_corte_04_min = $res[$i]['secao_de_corte_04_min'];
                    $secao_de_corte_04_max = $res[$i]['secao_de_corte_04_max'];
                    $secao_de_corte_04_habilita = $res[$i]['secao_de_corte_04_habilita'];

                    $secao_de_salgado_min = $res[$i]['secao_de_salgado_min'];
                    $secao_de_salgado_max = $res[$i]['secao_de_salgado_max'];
                    $secao_de_salgado_habilita = $res[$i]['secao_de_salgado_habilita'];

                    $secao_de_bandeja_min = $res[$i]['secao_de_bandeja_min'];
                    $secao_de_bandeja_max = $res[$i]['secao_de_bandeja_max'];
                    $secao_de_bandeja_habilita = $res[$i]['secao_de_bandeja_habilita'];

                    $secao_de_emb_IQF_min = $res[$i]['secao_de_emb_IQF_min'];
                    $secao_de_emb_IQF_max = $res[$i]['secao_de_emb_IQF_max'];
                    $secao_de_emb_IQF_habilita = $res[$i]['secao_de_emb_IQF_habilita'];

                    $secao_de_IQF_min = $res[$i]['secao_de_IQF_min'];
                    $secao_de_IQF_max = $res[$i]['secao_de_IQF_max'];
                    $secao_de_IQF_habilita = $res[$i]['secao_de_IQF_habilita'];

                    $secao_de_CMS_min = $res[$i]['secao_de_CMS_min'];
                    $secao_de_CMS_max = $res[$i]['secao_de_CMS_max'];
                    $secao_de_CMS_habilita = $res[$i]['secao_de_CMS_habilita'];

                    $secao_de_CMR_min = $res[$i]['secao_de_CMR_min'];
                    $secao_de_CMR_max = $res[$i]['secao_de_CMR_max'];
                    $secao_de_CMR_habilita = $res[$i]['secao_de_CMR_habilita'];


                    ?>
                    <tr>
                        <td>
                            <b>Min: </b> <?php echo $secao_de_corte_01_min  ?> <br>
                            <b>Máx: </b> <?php echo $secao_de_corte_01_max  ?> <br>
                        </td>
                        <td>
                            <b>Min: </b> <?php echo $secao_de_corte_02_min  ?> <br>
                            <b>Máx: </b> <?php echo $secao_de_corte_02_max  ?> <br>
                        </td>
                        <td>
                            <b>Min: </b> <?php echo $secao_de_corte_03_min  ?> <br>
                            <b>Máx: </b> <?php echo $secao_de_corte_03_max  ?> <br>
                        </td>
                        <td>
                            <b>Min: </b> <?php echo $secao_de_corte_04_min  ?> <br>
                            <b>Máx: </b> <?php echo $secao_de_corte_04_max  ?> <br>
                        </td>
                        <td>
                            <b>Min: </b> <?php echo $secao_de_salgado_min  ?> <br>
                            <b>Máx: </b> <?php echo $secao_de_salgado_max  ?> <br>
                        </td>
                        <td>
                            <b>Min: </b> <?php echo $secao_de_bandeja_min  ?> <br>
                            <b>Máx: </b> <?php echo $secao_de_bandeja_max  ?> <br>
                        </td>
                        <td>
                            <b>Min: </b> <?php echo $secao_de_emb_IQF_min  ?> <br>
                            <b>Máx: </b> <?php echo $secao_de_emb_IQF_max  ?> <br>
                        </td>
                        <td>
                            <b>Min: </b> <?php echo $secao_de_IQF_min  ?> <br>
                            <b>Máx: </b> <?php echo $secao_de_IQF_max  ?> <br>
                        </td>
                        <td>
                            <b>Min: </b> <?php echo $secao_de_CMS_min  ?> <br>
                            <b>Máx: </b> <?php echo $secao_de_CMS_max  ?> <br>
                        </td>
                        <td>
                            <b>Min: </b> <?php echo $secao_de_CMR_min  ?> <br>
                            <b>Máx: </b> <?php echo $secao_de_CMR_max  ?> <br>
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





                    $query = $pdo->query("SELECT * FROM ajuste_area_producao_02");

                    $res = $query->fetchAll(PDO::FETCH_ASSOC);


                    $secao_de_corte_01_min = $res[0]['secao_de_corte_01_min'];
                    $secao_de_corte_01_max = $res[0]['secao_de_corte_01_max'];
                    $secao_de_corte_01_habilita = $res[0]['secao_de_corte_01_habilita'];

                    $secao_de_corte_02_min = $res[0]['secao_de_corte_02_min'];
                    $secao_de_corte_02_max = $res[0]['secao_de_corte_02_max'];
                    $secao_de_corte_02_habilita = $res[0]['secao_de_corte_02_habilita'];

                    $secao_de_corte_03_min = $res[0]['secao_de_corte_03_min'];
                    $secao_de_corte_03_max = $res[0]['secao_de_corte_03_max'];
                    $secao_de_corte_03_habilita = $res[0]['secao_de_corte_03_habilita'];

                    $secao_de_corte_04_min = $res[0]['secao_de_corte_04_min'];
                    $secao_de_corte_04_max = $res[0]['secao_de_corte_04_max'];
                    $secao_de_corte_04_habilita = $res[0]['secao_de_corte_04_habilita'];

                    $secao_de_salgado_min = $res[0]['secao_de_salgado_min'];
                    $secao_de_salgado_max = $res[0]['secao_de_salgado_max'];
                    $secao_de_salgado_habilita = $res[0]['secao_de_salgado_habilita'];

                    $secao_de_bandeja_min = $res[0]['secao_de_bandeja_min'];
                    $secao_de_bandeja_max = $res[0]['secao_de_bandeja_max'];
                    $secao_de_bandeja_habilita = $res[0]['secao_de_bandeja_habilita'];

                    $secao_de_emb_IQF_min = $res[0]['secao_de_emb_IQF_min'];
                    $secao_de_emb_IQF_max = $res[0]['secao_de_emb_IQF_max'];
                    $secao_de_emb_IQF_habilita = $res[0]['secao_de_emb_IQF_habilita'];

                    $secao_de_IQF_min = $res[0]['secao_de_IQF_min'];
                    $secao_de_IQF_max = $res[0]['secao_de_IQF_max'];
                    $secao_de_IQF_habilita = $res[0]['secao_de_IQF_habilita'];

                    $secao_de_CMS_min = $res[0]['secao_de_CMS_min'];
                    $secao_de_CMS_max = $res[0]['secao_de_CMS_max'];
                    $secao_de_CMS_habilita = $res[0]['secao_de_CMS_habilita'];

                    $secao_de_CMR_min = $res[0]['secao_de_CMR_min'];
                    $secao_de_CMR_max = $res[0]['secao_de_CMR_max'];
                    $secao_de_CMR_habilita = $res[0]['secao_de_CMR_habilita'];





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
                            <label for="secao_de_corte_01"><b>Seção de Corte 01</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="secao_de_corte_01_min">Min.</label>
                                    <input type="number" class="form-control" id="secao_de_corte_01_min" name="secao_de_corte_01_min" value="<?php echo $secao_de_corte_01_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="secao_de_corte_01_max">Máx.</label>
                                    <input type="number" class="form-control" id="secao_de_corte_01_max" name="secao_de_corte_01_max" value="<?php echo $secao_de_corte_01_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="secao_de_corte_01_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="secao_de_corte_01_habilita" name="secao_de_corte_01_habilita">
                                        <option value="on" <?php if ($secao_de_corte_01_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($secao_de_corte_01_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>

                            <hr>
                        </div>
                        <div class="col-lg-6" >
                            <label for="secao_de_corte_02"><b>Seção de Corte 02</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="secao_de_corte_02_min">Min.</label>
                                    <input type="number" class="form-control" id="secao_de_corte_02_min" name="secao_de_corte_02_min" value="<?php echo $secao_de_corte_02_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="secao_de_corte_02_max">Máx.</label>
                                    <input type="number" class="form-control" id="secao_de_corte_02_max" name="secao_de_corte_02_max" value="<?php echo $secao_de_corte_02_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="secao_de_corte_02_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="secao_de_corte_02_habilita" name="secao_de_corte_02_habilita">
                                        <option value="on" <?php if ($secao_de_corte_02_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($secao_de_corte_02_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6" >
                            <label for="secao_de_corte_03"><b>Seção de Corte 03</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="secao_de_corte_03_min">Min.</label>
                                    <input type="number" class="form-control" id="secao_de_corte_03_min" name="secao_de_corte_03_min" value="<?php echo $secao_de_corte_03_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="secao_de_corte_03_max">Máx.</label>
                                    <input type="number" class="form-control" id="secao_de_corte_03_max" name="secao_de_corte_03_max" value="<?php echo $secao_de_corte_03_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="secao_de_corte_03_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="secao_de_corte_03_habilita" name="secao_de_corte_03_habilita">
                                        <option value="on" <?php if ($secao_de_corte_03_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($secao_de_corte_03_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6" >
                            <label for="secao_de_corte_04"><b>Seção de Corte 04</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="secao_de_corte_04_min">Min.</label>
                                    <input type="number" class="form-control" id="secao_de_corte_04_min" name="secao_de_corte_04_min" value="<?php echo $secao_de_corte_04_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="secao_de_corte_04_max">Máx.</label>
                                    <input type="number" class="form-control" id="secao_de_corte_04_max" name="secao_de_corte_04_max" value="<?php echo $secao_de_corte_04_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="secao_de_corte_04_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="secao_de_corte_04_habilita" name="secao_de_corte_04_habilita">
                                        <option value="on" <?php if ($secao_de_corte_04_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($secao_de_corte_04_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label for="secao_de_salgado"><b>Seção de Salgado</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="secao_de_salgado_min">Min.</label>
                                    <input type="number" class="form-control" id="secao_de_salgado_min" name="secao_de_salgado_min" value="<?php echo $secao_de_salgado_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="secao_de_salgado_max">Máx.</label>
                                    <input type="number" class="form-control" id="secao_de_salgado_max" name="secao_de_salgado_max" value="<?php echo $secao_de_salgado_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="secao_de_salgado_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="secao_de_salgado_habilita" name="secao_de_salgado_habilita">
                                        <option value="on" <?php if ($secao_de_salgado_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($secao_de_salgado_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label for="secao_de_bandeja"><b>Seção de Bandeja</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="secao_de_bandeja_min">Min.</label>
                                    <input type="number" class="form-control" id="secao_de_bandeja_min" name="secao_de_bandeja_min" value="<?php echo $secao_de_bandeja_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="secao_de_bandeja_max">Máx.</label>
                                    <input type="number" class="form-control" id="secao_de_bandeja_max" name="secao_de_bandeja_max" value="<?php echo $secao_de_bandeja_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="secao_de_bandeja_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="secao_de_bandeja_habilita" name="secao_de_bandeja_habilita">
                                        <option value="on" <?php if ($secao_de_bandeja_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($secao_de_bandeja_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label for="secao_de_emb_IQF"><b>Seção de Emb. IQF</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="secao_de_emb_IQF_min">Min.</label>
                                    <input type="number" class="form-control" id="secao_de_emb_IQF_min" name="secao_de_emb_IQF_min" value="<?php echo $secao_de_emb_IQF_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="secao_de_emb_IQF_max">Máx.</label>
                                    <input type="number" class="form-control" id="secao_de_emb_IQF_max" name="secao_de_emb_IQF_max" value="<?php echo $secao_de_emb_IQF_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="secao_de_emb_IQF_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="secao_de_emb_IQF_habilita" name="secao_de_emb_IQF_habilita">
                                        <option value="on" <?php if ($secao_de_emb_IQF_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($secao_de_emb_IQF_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label for="secao_de_IQF"><b>Seção de IQF</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="secao_de_IQF_min">Min.</label>
                                    <input type="number" class="form-control" id="secao_de_IQF_min" name="secao_de_IQF_min" value="<?php echo $secao_de_IQF_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="secao_de_IQF_max">Máx.</label>
                                    <input type="number" class="form-control" id="secao_de_IQF_max" name="secao_de_IQF_max" value="<?php echo $secao_de_IQF_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="secao_de_IQF_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="secao_de_IQF_habilita" name="secao_de_IQF_habilita">
                                        <option value="on" <?php if ($secao_de_IQF_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($secao_de_IQF_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label for="secao_de_CMS"><b>Seção de CMS</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="secao_de_CMS_min">Min.</label>
                                    <input type="number" class="form-control" id="secao_de_CMS_min" name="secao_de_CMS_min" value="<?php echo $secao_de_CMS_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="secao_de_CMS_max">Máx.</label>
                                    <input type="number" class="form-control" id="secao_de_CMS_max" name="secao_de_CMS_max" value="<?php echo $secao_de_CMS_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="secao_de_CMS_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="secao_de_CMS_habilita" name="secao_de_CMS_habilita">
                                        <option value="on" <?php if ($secao_de_CMS_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($secao_de_CMS_habilita == 'off') { echo "selected"; } ?>>Não</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="secao_de_CMR"><b>Seção de CMR</b></label>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="secao_de_CMR_min">Min.</label>
                                    <input type="number" class="form-control" id="secao_de_CMR_min" name="secao_de_CMR_min" value="<?php echo $secao_de_CMR_min ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="secao_de_CMR_max">Máx.</label>
                                    <input type="number" class="form-control" id="secao_de_CMR_max" name="secao_de_CMR_max" value="<?php echo $secao_de_CMR_max ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="secao_de_CMR_habilita">Hab. Intervalo</label>
                                    <select class="form-control" id="secao_de_CMR_habilita" name="secao_de_CMR_habilita">
                                        <option value="on" <?php if ($secao_de_CMR_habilita == 'on') { echo "selected"; } ?>>Sim</option>
                                        <option value="off" <?php if ($secao_de_CMR_habilita == 'off') { echo "selected"; } ?>>Não</option>
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
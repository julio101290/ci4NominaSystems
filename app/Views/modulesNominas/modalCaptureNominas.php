<!-- Modal Nominas -->
<div class="modal fade" id="modalAddNominas" tabindex="-1" role="dialog" aria-labelledby="modalAddNominas" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('nominas.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-nominas" class="form-horizontal">
                    <input type="hidden" id="idNominas" name="idNominas" value="0">

                    <div class="form-group row">
                        <label for="idEmpresa" class="col-sm-2 col-form-label"><?= lang('nominas.fields.idEmpresa') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>



                                <select class="form-control idEmpresa form-control" name="idEmpresa" id="idEmpresa" style="width:80%;">


                                    <option value="0"> Seleccione Empresa</option>

                                    <?php
                                    $contadorEmpresas = 0;
                                    foreach ($empresas as $key => $value) {


                                        if ($contadorEmpresas == 0) {

                                            echo "<option value='$value[id]'>$value[id] - $value[nombre] </option>  ";
                                        } else {

                                            echo "<option value='$value[id]'>$value[id] - $value[nombre] </option>  ";
                                        }
                                    }
                                    ?>

                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="idTipoNominas" class="col-sm-2 col-form-label"><?= lang('nominas.fields.idTipoNominas') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>



                                <select class="form-control idTipoNominas form-control" name="idTipoNominas" id="idTipoNominas" style="width:80%;">


                                    <option value="0" Selected> Seleccione el tipo de nómina</option>
                                    <?php
                                    $contadorEmpresas = 0;
                                    foreach ($tiposNominas as $key => $value) {


                                        if ($contadorEmpresas == 0) {

                                            echo "<option  value='$value[id]'>$value[codigo] - $value[nombre] </option>  ";
                                        } else {

                                            echo "<option value='$value[id]'>$value[codigo] - $value[nombre] </option>  ";
                                        }
                                    }
                                    ?>

                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="clave" class="col-sm-2 col-form-label"><?= lang('nominas.fields.clave') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="clave" id="clave" class="form-control <?= session('error.clave') ? 'is-invalid' : '' ?>" value="<?= old('clave') ?>" placeholder="<?= lang('nominas.fields.clave') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fechaInicial" class="col-sm-2 col-form-label"><?= lang('nominas.fields.fechaInicial') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="date" name="fechaInicial" id="fechaInicial" class="form-control <?= session('error.fechaInicial') ? 'is-invalid' : '' ?>" value="<?= old('fechaInicial') ?>" placeholder="<?= lang('nominas.fields.fechaInicial') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fechaFinal" class="col-sm-2 col-form-label"><?= lang('nominas.fields.fechaFinal') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="date" name="fechaFinal" id="fechaFinal" class="form-control <?= session('error.fechaFinal') ? 'is-invalid' : '' ?>" value="<?= old('fechaFinal') ?>" placeholder="<?= lang('nominas.fields.fechaFinal') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" >
                        <label for="diasTrab" class="col-sm-2 col-form-label"><?= lang('nominas.fields.diasTrab') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="diasTrab" id="diasTrab" class="form-control <?= session('error.diasTrab') ? 'is-invalid' : '' ?>" value="<?= old('diasTrab') ?>" placeholder="<?= lang('nominas.fields.diasTrab') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row" hidden>
                        <label for="cerrada" class="col-sm-2 col-form-label"><?= lang('nominas.fields.cerrada') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="cerrada" id="cerrada" class="form-control <?= session('error.cerrada') ? 'is-invalid' : '' ?>" value="<?= old('cerrada') ?>" placeholder="<?= lang('nominas.fields.cerrada') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descripcion" class="col-sm-2 col-form-label"><?= lang('nominas.fields.descripcion') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="descripcion" id="descripcion" class="form-control <?= session('error.descripcion') ? 'is-invalid' : '' ?>" value="<?= old('descripcion') ?>" placeholder="<?= lang('nominas.fields.descripcion') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" hidden>
                        <label for="usuarioAperturo" class="col-sm-2 col-form-label"><?= lang('nominas.fields.usuarioAperturo') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="usuarioAperturo" id="usuarioAperturo" class="form-control <?= session('error.usuarioAperturo') ? 'is-invalid' : '' ?>" value="<?= old('usuarioAperturo') ?>" placeholder="<?= lang('nominas.fields.usuarioAperturo') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" hidden>
                        <label for="fechaCerrado" class="col-sm-2 col-form-label"><?= lang('nominas.fields.fechaCerrado') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="fechaCerrado" id="fechaCerrado" class="form-control <?= session('error.fechaCerrado') ? 'is-invalid' : '' ?>" value="<?= old('fechaCerrado') ?>" placeholder="<?= lang('nominas.fields.fechaCerrado') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="usuarioCerrado" class="col-sm-2 col-form-label"><?= lang('nominas.fields.usuarioCerrado') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="usuarioCerrado" id="usuarioCerrado" class="form-control <?= session('error.usuarioCerrado') ? 'is-invalid' : '' ?>" value="<?= old('usuarioCerrado') ?>" placeholder="<?= lang('nominas.fields.usuarioCerrado') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="diasPagados" class="col-sm-2 col-form-label"><?= lang('nominas.fields.diasPagados') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="diasPagados" id="diasPagados" class="form-control <?= session('error.diasPagados') ? 'is-invalid' : '' ?>" value="<?= old('diasPagados') ?>" placeholder="<?= lang('nominas.fields.diasPagados') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fechaAplicacion" class="col-sm-2 col-form-label"><?= lang('nominas.fields.fechaAplicacion') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="date" name="fechaAplicacion" id="fechaAplicacion" class="form-control <?= session('error.fechaAplicacion') ? 'is-invalid' : '' ?>" value="<?= old('fechaAplicacion') ?>" placeholder="<?= lang('nominas.fields.fechaAplicacion') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="porcISN" class="col-sm-2 col-form-label"><?= lang('nominas.fields.porcISN') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="porcISN" id="porcISN" class="form-control <?= session('error.porcISN') ? 'is-invalid' : '' ?>" value="<?= old('porcISN') ?>" placeholder="<?= lang('nominas.fields.porcISN') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="diasFestivos" class="col-sm-2 col-form-label"><?= lang('nominas.fields.diasFestivos') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="diasFestivos" id="diasFestivos" class="form-control <?= session('error.diasFestivos') ? 'is-invalid' : '' ?>" value="<?= old('diasFestivos') ?>" placeholder="<?= lang('nominas.fields.diasFestivos') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ise" class="col-sm-2 col-form-label"><?= lang('nominas.fields.ise') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="ise" id="ise" class="form-control <?= session('error.ise') ? 'is-invalid' : '' ?>" value="<?= old('ise') ?>" placeholder="<?= lang('nominas.fields.ise') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="proveedorISN" class="col-sm-2 col-form-label"><?= lang('nominas.fields.proveedorISN') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="proveedorISN" id="proveedorISN" class="form-control <?= session('error.proveedorISN') ? 'is-invalid' : '' ?>" value="<?= old('proveedorISN') ?>" placeholder="<?= lang('nominas.fields.proveedorISN') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="porrsg" class="col-sm-2 col-form-label"><?= lang('nominas.fields.porrsg') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="porrsg" id="porrsg" class="form-control <?= session('error.porrsg') ? 'is-invalid' : '' ?>" value="<?= old('porrsg') ?>" placeholder="<?= lang('nominas.fields.porrsg') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="UMA" class="col-sm-2 col-form-label"><?= lang('nominas.fields.UMA') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="UMA" id="UMA" class="form-control <?= session('error.UMA') ? 'is-invalid' : '' ?>" value="<?= old('UMA') ?>" placeholder="<?= lang('nominas.fields.UMA') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="UMA" class="col-sm-2 col-form-label">Tipo Calculo</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control tipoCalculo form-control" name="tipoCalculo" id="tipoCalculo" style="width:80%;">


                                    <option value="0" Selected> Seleccione el tipo de calculo</option>
                                    <?php
                                    $contadorTipoCalculo = 0;
                                    foreach ($tiposCalculo as $key => $value) {


                                        if ($contadorTipoCalculo == 0) {

                                            echo "<option  value='$value[id]'>$value[id] - $value[nombre] </option>  ";
                                        } else {

                                            echo "<option value='$value[id]'>$value[id] - $value[nombre] </option>  ";
                                        }
                                    }

                                    $contadorTipoCalculo++;
                                    ?>

                                </select>

                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveNominas"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>


    $("#idEmpresa").select2();
    $("#idTipoNominas").select2();

    $(document).on('click', '.btnAddNominas', function (e) {


        $(".form-control").val("");

        $("#idNominas").val("0");



        $("#idEmpresa").val(0).trigger("change");
        $("#idTipoNominas").val(0).trigger("change");

        $("#btnSaveNominas").removeAttr("disabled");

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditNominas', function (e) {


        var idNominas = $(this).attr("idNominas");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idNominas").val(idNominas);
        $("#btnGuardarNominas").removeAttr("disabled");

    });




    $("#tipoCalculo").select2();

</script>


<?= $this->endSection() ?>
        
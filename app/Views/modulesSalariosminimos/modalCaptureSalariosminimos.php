<!-- Modal Salariosminimos -->
<div class="modal fade" id="modalAddSalariosminimos" tabindex="-1" role="dialog" aria-labelledby="modalAddSalariosminimos" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('salariosminimos.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-salariosminimos" class="form-horizontal">
                    <input type="hidden" id="idSalariosminimos" name="idSalariosminimos" value="0">

                    <div class="form-group row">
                        <label for="idEmpresa" class="col-sm-2 col-form-label">Empresa</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                               <select class="form-control idEmpresa form-control" name="idEmpresa" id="idEmpresa" style="width:80%;">

                                    <?php
                                    $contadorEmpresas = 0;
                                    foreach ($empresas as $key => $value) {


                                        if ($contadorEmpresas == 0) {

                                            echo "<option selected value='$value[id]'>$value[id] - $value[nombre] </option>  ";
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
                        <label for="descripcion" class="col-sm-2 col-form-label"><?= lang('salariosminimos.fields.descripcion') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="descripcion" id="descripcion" class="form-control <?= session('error.descripcion') ? 'is-invalid' : '' ?>" value="<?= old('descripcion') ?>" placeholder="<?= lang('salariosminimos.fields.descripcion') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="importe" class="col-sm-2 col-form-label"><?= lang('salariosminimos.fields.importe') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="importe" id="importe" class="form-control <?= session('error.importe') ? 'is-invalid' : '' ?>" value="<?= old('importe') ?>" placeholder="<?= lang('salariosminimos.fields.importe') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveSalariosminimos"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $(document).on('click', '.btnAddSalariosminimos', function (e) {

        var idEmpresa = $(".idEmpresa").val();
        
        $(".form-control").val("");

        $("#idSalariosminimos").val("0");

        $("#btnSaveSalariosminimos").removeAttr("disabled");
        
        $(".idEmpresa").val(idEmpresa).trigger("change");

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditSalariosminimos', function (e) {


        var idSalariosminimos = $(this).attr("idSalariosminimos");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idSalariosminimos").val(idSalariosminimos);
        $("#btnGuardarSalariosminimos").removeAttr("disabled");

    });


$(".idEmpresa").select2();

</script>


<?= $this->endSection() ?>
        
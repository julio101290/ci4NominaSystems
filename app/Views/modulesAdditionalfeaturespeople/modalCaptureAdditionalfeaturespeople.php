<!-- Modal Additionalfeaturespeople -->
<div class="modal fade" id="modalAddAdditionalfeaturespeople" tabindex="-1" role="dialog" aria-labelledby="modalAddAdditionalfeaturespeople" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('additionalfeaturespeople.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-additionalfeaturespeople" class="form-horizontal">
                    <input type="hidden" id="idAdditionalfeaturespeople" name="idAdditionalfeaturespeople" value="0">

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label"><?= lang('additionalfeaturespeople.fields.name') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control <?= session('error.name') ? 'is-invalid' : '' ?>" value="<?= old('name') ?>" placeholder="<?= lang('additionalfeaturespeople.fields.name') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="format" class="col-sm-2 col-form-label"><?= lang('additionalfeaturespeople.fields.format') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>



                                <select name="format" id="format" class="form-control <?= session('error.format') ? 'is-invalid' : '' ?>" value="<?= old('format') ?>" placeholder="<?= lang('additionalfeaturespeople.fields.format') ?>" autocomplete="off" style="width: 80%;">
                                    <option value="char" selected=""> <?= lang("additionalfeaturespeople.fields.formatOptionChar") ?></option>
                                    <option value="int"> <?= lang("additionalfeaturespeople.fields.formatOptionInteger") ?></option>
                                    <option value="date"> <?= lang("additionalfeaturespeople.fields.formatOptionDate") ?></option>
                                    <option value="bool"><?= lang("additionalfeaturespeople.fields.formatOptionLogic") ?></option>
                                    <option value="text"><?= lang("additionalfeaturespeople.fields.formatOptionMemo") ?></option>
                                    <option value="number"> <?= lang("additionalfeaturespeople.fields.formatOptionNumber") ?></option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="type" class="col-sm-2 col-form-label"><?= lang('additionalfeaturespeople.fields.type') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <select name="type" id="type" class="form-control <?= session('error.type') ? 'is-invalid' : '' ?>" value="<?= old('type') ?>" placeholder="<?= lang('additionalfeaturespeople.fields.type') ?>" autocomplete="off" style="width: 80%;">

                                    <option value="open" selected=""> <?= lang("additionalfeaturespeople.fields.typeOptionOpen") ?></option>
                                    <option value="closed" > <?= lang("additionalfeaturespeople.fields.typeOptionClosed") ?></option>


                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cid" class="col-sm-2 col-form-label"><?= lang('additionalfeaturespeople.fields.cid') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="cid" id="cid" class="form-control <?= session('error.cid') ? 'is-invalid' : '' ?>" value="<?= old('cid') ?>" placeholder="<?= lang('additionalfeaturespeople.fields.cid') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label"><?= lang('additionalfeaturespeople.fields.code') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="code" id="code" class="form-control <?= session('error.code') ? 'is-invalid' : '' ?>" value="<?= old('code') ?>" placeholder="<?= lang('additionalfeaturespeople.fields.code') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="minimunValue" class="col-sm-2 col-form-label"><?= lang('additionalfeaturespeople.fields.minimunValue') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="minimunValue" id="minimunValue" class="form-control <?= session('error.code') ? 'is-invalid' : '' ?>" value="<?= old('minimunValue') ?>" placeholder="<?= lang('additionalfeaturespeople.fields.minimunValue') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="maximunValue" class="col-sm-2 col-form-label"><?= lang('additionalfeaturespeople.fields.maximunValue') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="maximunValue" id="maximunValue" class="form-control <?= session('error.maximunValue') ? 'is-invalid' : '' ?>" value="<?= old('maximunValue') ?>" placeholder="<?= lang('additionalfeaturespeople.fields.maximunValue') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveAdditionalfeaturespeople"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $(document).on('click', '.btnAddAdditionalfeaturespeople', function (e) {


        $(".form-control").val("");

        $("#idAdditionalfeaturespeople").val("0");

        $("#btnSaveAdditionalfeaturespeople").removeAttr("disabled");

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditAdditionalfeaturespeople', function (e) {


        var idAdditionalfeaturespeople = $(this).attr("idAdditionalfeaturespeople");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idAdditionalfeaturespeople").val(idAdditionalfeaturespeople);
        $("#btnGuardarAdditionalfeaturespeople").removeAttr("disabled");

    });




</script>


<?= $this->endSection() ?>
        
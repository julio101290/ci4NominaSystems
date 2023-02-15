<!-- Modal Holidays -->
<div class="modal fade" id="modalAddHolidays" tabindex="-1" role="dialog" aria-labelledby="modalAddHolidays" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('holidays.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-holidays" class="form-horizontal">
                    <input type="hidden" id="idHolidays" name="idHolidays" value="0">

                    <div class="form-group row">
                        <label for="date" class="col-sm-2 col-form-label"><?= lang('holidays.fields.date') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="date" name="date" id="date" class="form-control <?= session('error.date') ? 'is-invalid' : '' ?>" value="<?= old('date') ?>" placeholder="<?= lang('holidays.fields.date') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveHolidays"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $(document).on('click', '.btnAddHolidays', function (e) {


        $(".form-control").val("");

        $("#idHolidays").val("0");

        $("#btnSaveHolidays").removeAttr("disabled");

    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditHolidays', function (e) {


        var idHolidays = $(this).attr("idHolidays");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idHolidays").val(idHolidays);
        $("#btnGuardarHolidays").removeAttr("disabled");

    });




</script>


<?= $this->endSection() ?>
        
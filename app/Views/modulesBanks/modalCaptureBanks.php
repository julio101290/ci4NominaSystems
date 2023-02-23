<!-- Modal Banks -->
  <div class="modal fade" id="modalAddBanks" tabindex="-1" role="dialog" aria-labelledby="modalAddBanks" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title"><?= lang('banks.createEdit') ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form id="form-banks" class="form-horizontal">
                      <input type="hidden" id="idBanks" name="idBanks" value="0">

                      <div class="form-group row">
    <label for="code" class="col-sm-2 col-form-label"><?= lang('banks.fields.code') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="code" id="code" class="form-control <?= session('error.code') ? 'is-invalid' : '' ?>" value="<?= old('code') ?>" placeholder="<?= lang('banks.fields.code') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label"><?= lang('banks.fields.name') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="name" id="name" class="form-control <?= session('error.name') ? 'is-invalid' : '' ?>" value="<?= old('name') ?>" placeholder="<?= lang('banks.fields.name') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="omision" class="col-sm-2 col-form-label"><?= lang('banks.fields.omision') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="omision" id="omision" class="form-control <?= session('error.omision') ? 'is-invalid' : '' ?>" value="<?= old('omision') ?>" placeholder="<?= lang('banks.fields.omision') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="RFC" class="col-sm-2 col-form-label"><?= lang('banks.fields.RFC') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="RFC" id="RFC" class="form-control <?= session('error.RFC') ? 'is-invalid' : '' ?>" value="<?= old('RFC') ?>" placeholder="<?= lang('banks.fields.RFC') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="keySAT" class="col-sm-2 col-form-label"><?= lang('banks.fields.keySAT') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="keySAT" id="keySAT" class="form-control <?= session('error.keySAT') ? 'is-invalid' : '' ?>" value="<?= old('keySAT') ?>" placeholder="<?= lang('banks.fields.keySAT') ?>" autocomplete="off">
        </div>
    </div>
</div>

        
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                  <button type="button" class="btn btn-primary btn-sm" id="btnSaveBanks"><?= lang('boilerplate.global.save') ?></button>
              </div>
          </div>
      </div>
  </div>

  <?= $this->section('js') ?>


  <script>

      $(document).on('click', '.btnAddBanks', function (e) {


          $(".form-control").val("");

          $("#idBanks").val("0");

          $("#btnSaveBanks").removeAttr("disabled");

      });

      /* 
       * AL hacer click al editar
       */



      $(document).on('click', '.btnEditBanks', function (e) {


          var idBanks = $(this).attr("idBanks");

          //LIMPIAMOS CONTROLES
          $(".form-control").val("");

          $("#idBanks").val(idBanks);
          $("#btnGuardarBanks").removeAttr("disabled");

      });




  </script>


  <?= $this->endSection() ?>
        
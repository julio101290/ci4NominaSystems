<!-- Modal Turns -->
  <div class="modal fade" id="modalAddTurns" tabindex="-1" role="dialog" aria-labelledby="modalAddTurns" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title"><?= lang('turns.createEdit') ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form id="form-turns" class="form-horizontal">
                      <input type="hidden" id="idTurns" name="idTurns" value="0">

                      <div class="form-group row">
    <label for="code" class="col-sm-2 col-form-label"><?= lang('turns.fields.code') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="code" id="code" class="form-control <?= session('error.code') ? 'is-invalid' : '' ?>" value="<?= old('code') ?>" placeholder="<?= lang('turns.fields.code') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label"><?= lang('turns.fields.name') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="name" id="name" class="form-control <?= session('error.name') ? 'is-invalid' : '' ?>" value="<?= old('name') ?>" placeholder="<?= lang('turns.fields.name') ?>" autocomplete="off">
        </div>
    </div>
</div>

        
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                  <button type="button" class="btn btn-primary btn-sm" id="btnSaveTurns"><?= lang('boilerplate.global.save') ?></button>
              </div>
          </div>
      </div>
  </div>

  <?= $this->section('js') ?>


  <script>

      $(document).on('click', '.btnAddTurns', function (e) {


          $(".form-control").val("");

          $("#idTurns").val("0");

          $("#btnSaveTurns").removeAttr("disabled");

      });

      /* 
       * AL hacer click al editar
       */



      $(document).on('click', '.btnEditTurns', function (e) {


          var idTurns = $(this).attr("idTurns");

          //LIMPIAMOS CONTROLES
          $(".form-control").val("");

          $("#idTurns").val(idTurns);
          $("#btnGuardarTurns").removeAttr("disabled");

      });




  </script>


  <?= $this->endSection() ?>
        
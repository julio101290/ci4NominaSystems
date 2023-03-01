<!-- Modal Perceptionsanddeductions -->
<div class="modal fade" id="modalAddPerceptionsanddeductions" tabindex="-1" role="dialog" aria-labelledby="modalAddPerceptionsanddeductions" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('perceptionsanddeductions.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-perceptionsanddeductions" class="form-horizontal">
                    <input type="hidden" id="idPerceptionsanddeductions" name="idPerceptionsanddeductions" value="0">

                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.code') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="number" name="code" id="code" class="form-control <?= session('error.code') ? 'is-invalid' : '' ?>" value="<?= old('code') ?>" placeholder="<?= lang('perceptionsanddeductions.fields.code') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.name') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control <?= session('error.name') ? 'is-invalid' : '' ?>" value="<?= old('name') ?>" placeholder="<?= lang('perceptionsanddeductions.fields.name') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nameAbrev" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.nameAbrev') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="nameAbrev" id="nameAbrev" class="form-control <?= session('error.nameAbrev') ? 'is-invalid' : '' ?>" value="<?= old('nameAbrev') ?>" placeholder="<?= lang('perceptionsanddeductions.fields.nameAbrev') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.type') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                
                                
                                <select class="form-control select" name="type" id="type" style="width: 80%;">
                                     <option value="0"><?= lang('perceptionsanddeductions.fields.selectType') ?></option>
                                    <option value="Perception"><?= lang('perceptionsanddeductions.fields.typePerception') ?></option>
                                    <option value="Deduction"><?= lang('perceptionsanddeductions.fields.typeDeduction') ?></option>


                                </select>



                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Area" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.Area') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control select" name="Area" id="Area" style="width: 80%;">
                                    <option value="0"><?= lang('perceptionsanddeductions.fields.selectArea') ?></option>
                                    <option value="visible"><?= lang('perceptionsanddeductions.fields.areaVisible') ?></option>
                                    <option value="notVisible"><?= lang('perceptionsanddeductions.fields.areaNotVisible') ?></option>
                                    <option value="liquidation"><?= lang('perceptionsanddeductions.fields.areaLiquidation') ?></option>


                                </select>


                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="SATConcept" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.SATConcept') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>


                                <select class="form-control select" name="SATConcept" id="SATConcept" style="width: 80%;">

                                    <option value="0"><?= lang('perceptionsanddeductions.fields.selectSATConcept') ?></option>
                                    <?php
                                    foreach ($deducciones as $key => $value) {

                                        echo '<option value="' . $value->id() . '">' . $value->id() . ' - ' . $value->texto() . '</option>';
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="SATConceptPerception" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.SATConceptPerception') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>


                                <select class="form-control select" name="SATConceptPerceptions" id="SATConceptPerceptions" style="width: 80%;">

                                    <option value="0"><?= lang('perceptionsanddeductions.fields.selectSATConceptPerception') ?></option>
                                    <?php
                                    foreach ($percepciones as $key => $value) {

                                        echo '<option value="' . $value->id() . '">' . $value->id() . ' - ' . $value->texto() . '</option>';
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="calc" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.calc') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>


                                <select class="form-control select" name="calc" id="calc" style="width: 80%;">
                                    <option value="0"><?= lang('perceptionsanddeductions.fields.selectCalc') ?></option>
                                    <option value="Nothing"><?= lang('perceptionsanddeductions.fields.calcNothing') ?></option>
                                    <option value="Automatic"><?= lang('perceptionsanddeductions.fields.calcAutomatic') ?></option>
                                    <option value="Acumulative"><?= lang('perceptionsanddeductions.fields.calcAcumulative') ?></option>
                                    <option value="Repetitive"><?= lang('perceptionsanddeductions.fields.calcRepetitive') ?></option> 


                                </select>


                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="orden" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.orden') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="number" name="orden" id="orden" class="form-control <?= session('error.orden') ? 'is-invalid' : '' ?>" value="<?= old('orden') ?>" placeholder="<?= lang('perceptionsanddeductions.fields.orden') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="payType" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.payType') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control select" name="payType" id="payType" style="width: 80%;">
                                    
                                    <option value="0"><?= lang('perceptionsanddeductions.fields.selectPayType') ?></option>
                                    <option value="cash" ><?= lang('perceptionsanddeductions.fields.payTypeCash') ?></option>
                                    <option value="card"><?= lang('perceptionsanddeductions.fields.payTypeCard') ?></option>
                                    <option value="specie"><?= lang('perceptionsanddeductions.fields.payTypeSpecie') ?></option>
                                    <option value="liquidation"><?= lang('perceptionsanddeductions.fields.payTypeLiquidation') ?></option>


                                </select>


                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ordinary" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.ordinary') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control select" name="ordinary" id="ordinary" style="width: 80%;">
                                    <option value="0"><?= lang('perceptionsanddeductions.fields.selectOrdinary') ?></option>
                                    <option value="yes" ><?= lang('perceptionsanddeductions.fields.ordinaryYes') ?></option>
                                    <option value="no"><?= lang('perceptionsanddeductions.fields.ordinaryNo') ?></option>


                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="otherPay" class="col-sm-2 col-form-label"><?= lang('perceptionsanddeductions.fields.otherPay') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control select" name="otherPay" id="otherPay" style="width: 80%;">

                                    <option value="0"><?= lang('perceptionsanddeductions.fields.selectOtherPays') ?></option>
                                    <?php
                                    foreach ($otrosPagoSAT as $key => $value) {

                                        echo '<option value="' . $value->id() . '">' . $value->id() . ' - ' . $value->texto() . '</option>';
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSavePerceptionsanddeductions"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $(document).on('click', '.btnAddPerceptionsanddeductions', function (e) {


        $(".form-control").val("");

        $("#idPerceptionsanddeductions").val("0");

        $("#btnSavePerceptionsanddeductions").removeAttr("disabled");
        
        $("#type").trigger("change");
        $("#Area").trigger("change");
        $("#SATConcept").trigger("change"); 
        $("#SATConceptPerceptions").trigger("change");
        $("#calc").trigger("change");
        $("#payType").trigger("change");
        $("#ordinary").trigger("change");
        $("#otherPay").trigger("change");
        
    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditPerceptionsanddeductions', function (e) {


        var idPerceptionsanddeductions = $(this).attr("idPerceptionsanddeductions");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idPerceptionsanddeductions").val(idPerceptionsanddeductions);
        $("#btnGuardarPerceptionsanddeductions").removeAttr("disabled");

    });




</script>


<?= $this->endSection() ?>
        
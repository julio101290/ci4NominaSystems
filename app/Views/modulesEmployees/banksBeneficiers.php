<p>
<h3><?= lang("employees.tab.banksBeneficiers") ?></h3> 
<div class="form-group row">
    <label for="nameBeneficiary" class="col-sm-2 col-form-label"><?= lang('employees.fields.nameBeneficiary') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="nameBeneficiary" id="nameBeneficiary" class="form-control <?= session('error.nameBeneficiary') ? 'is-invalid' : '' ?>" value="<?= old('nameBeneficiary') ?>" placeholder="<?= lang('employees.fields.nameBeneficiary') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="relationBeneficiary" class="col-sm-2 col-form-label"><?= lang('employees.fields.relationBeneficiary') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control select" name="relationBeneficiary" id="relationBeneficiary" style="width: 80%;">

                <option value="Nothing"><?= lang('employees.fields.relationBeneficiaryNothing') ?></option>
                <option value="Spouse"><?= lang('employees.fields.relationBeneficiarySpouse') ?></option>
                <option value="Father"><?= lang('employees.fields.relationBeneficiaryFather') ?></option>
                <option value="Mother"><?= lang('employees.fields.relationBeneficiaryMother') ?></option>
                <option value="Sons"><?= lang('employees.fields.relationBeneficiarySons') ?></option>
                <option value="Other"><?= lang('employees.fields.relationBeneficiaryOther') ?></option>

            </select>


        </div>
    </div>
</div>
<div class="form-group row">
    <label for="porcenBeneficiary" class="col-sm-2 col-form-label"><?= lang('employees.fields.porcenBeneficiary') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="porcenBeneficiary" id="porcenBeneficiary" class="form-control <?= session('error.porcenBeneficiary') ? 'is-invalid' : '' ?>" value="<?= old('porcenBeneficiary') ?>" placeholder="<?= lang('employees.fields.porcenBeneficiary') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="nameBeneficiary2" class="col-sm-2 col-form-label"><?= lang('employees.fields.nameBeneficiary2') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="nameBeneficiary2" id="nameBeneficiary2" class="form-control <?= session('error.nameBeneficiary2') ? 'is-invalid' : '' ?>" value="<?= old('nameBeneficiary2') ?>" placeholder="<?= lang('employees.fields.nameBeneficiary2') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="relationBeneficiary2" class="col-sm-2 col-form-label"><?= lang('employees.fields.relationBeneficiary2') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>


            <select class="form-control select" name="relationBeneficiary2" id="relationBeneficiary2" style="width: 80%;">

                <option value="Nothing"><?= lang('employees.fields.relationBeneficiaryNothing') ?></option>
                <option value="Spouse"><?= lang('employees.fields.relationBeneficiarySpouse') ?></option>
                <option value="Father"><?= lang('employees.fields.relationBeneficiaryFather') ?></option>
                <option value="Mother"><?= lang('employees.fields.relationBeneficiaryMother') ?></option>
                <option value="Sons"><?= lang('employees.fields.relationBeneficiarySons') ?></option>
                <option value="Other"><?= lang('employees.fields.relationBeneficiaryOther') ?></option>

            </select>


        </div>
    </div>
</div>
<div class="form-group row">
    <label for="porcenBeneficiary2" class="col-sm-2 col-form-label"><?= lang('employees.fields.porcenBeneficiary2') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="porcenBeneficiary2" id="porcenBeneficiary2" class="form-control <?= session('error.porcenBeneficiary2') ? 'is-invalid' : '' ?>" value="<?= old('porcenBeneficiary2') ?>" placeholder="<?= lang('employees.fields.porcenBeneficiary2') ?>" autocomplete="off">
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="bank" class="col-sm-2 col-form-label"><?= lang('employees.fields.bank') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            
            <select class="form-control select" name="bank" id="bank" style="width: 80%;">

                <option value="0"><?= lang('employees.fields.turnSelect') ?></option>
                <?php
                foreach ($banks as $key => $value) {

                    echo '<option value="' . $value->id . '">' . $value->id . ' - ' . $value->name . '</option>';
                }
                ?>

               

            </select>
            
          
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="bankAccount" class="col-sm-2 col-form-label"><?= lang('employees.fields.bankAccount') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="bankAccount" id="bankAccount" class="form-control <?= session('error.bankAccount') ? 'is-invalid' : '' ?>" value="<?= old('bankAccount') ?>" placeholder="<?= lang('employees.fields.bankAccount') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="creditCard" class="col-sm-2 col-form-label"><?= lang('employees.fields.creditCard') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="creditCard" id="creditCard" class="form-control <?= session('error.creditCard') ? 'is-invalid' : '' ?>" value="<?= old('creditCard') ?>" placeholder="<?= lang('employees.fields.creditCard') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="statusCard" class="col-sm-2 col-form-label"><?= lang('employees.fields.statusCard') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="statusCard" id="statusCard" class="form-control <?= session('error.statusCard') ? 'is-invalid' : '' ?>" value="<?= old('statusCard') ?>" placeholder="<?= lang('employees.fields.statusCard') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="CLABE" class="col-sm-2 col-form-label"><?= lang('employees.fields.CLABE') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="CLABE" id="CLABE" class="form-control <?= session('error.CLABE') ? 'is-invalid' : '' ?>" value="<?= old('CLABE') ?>" placeholder="<?= lang('employees.fields.CLABE') ?>" autocomplete="off">
        </div>
    </div>
</div>

</p>

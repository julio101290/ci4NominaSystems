<p>
<h3><?= lang("employees.tab.otherData") ?></h3>


<div class="form-group row">
    <label for="CURP" class="col-sm-2 col-form-label"><?= lang('employees.fields.CURP') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="CURP" id="CURP" class="form-control <?= session('error.CURP') ? 'is-invalid' : '' ?>" value="<?= old('CURP') ?>" placeholder="<?= lang('employees.fields.CURP') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="scholarship" class="col-sm-2 col-form-label"><?= lang('employees.fields.scholarship') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>


            <select class="form-control select" name="scholarship" id="scholarship" style="width: 80%;">

                <option value="0"><?= lang('employees.fields.scholarshipWithoutstudies') ?></option>
                <option value="1"><?= lang('employees.fields.scholarshipPrimary') ?></option>
                <option value="2"><?= lang('employees.fields.scholarshipSecundaria') ?></option>
                <option value="3"><?= lang('employees.fields.scholarshipPreparatory') ?></option>
                <option value="4"><?= lang('employees.fields.scholarshipTechnical') ?></option>
                <option value="5"><?= lang('employees.fields.scholarshipDegree') ?></option>
                <option value="6"><?= lang('employees.fields.scholarshipMaster') ?></option>
                <option value="7"><?= lang('employees.fields.scholarshipDoctorate') ?></option>

            </select>

        </div>
    </div>
</div>
<div class="form-group row">
    <label for="initials" class="col-sm-2 col-form-label"><?= lang('employees.fields.initials') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="initials" id="initials" class="form-control <?= session('error.initials') ? 'is-invalid' : '' ?>" value="<?= old('initials') ?>" placeholder="<?= lang('employees.fields.initials') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label"><?= lang('employees.fields.email') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="email" id="email" class="form-control <?= session('error.email') ? 'is-invalid' : '' ?>" value="<?= old('email') ?>" placeholder="<?= lang('employees.fields.email') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="nip" class="col-sm-2 col-form-label"><?= lang('employees.fields.nip') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="nip" id="nip" class="form-control <?= session('error.nip') ? 'is-invalid' : '' ?>" value="<?= old('nip') ?>" placeholder="<?= lang('employees.fields.nip') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="turn" class="col-sm-2 col-form-label"><?= lang('employees.fields.turn') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control select" name="turn" id="turn" style="width: 80%;">

                <option value="0"><?= lang('employees.fields.turnSelect') ?></option>
                <?php
                foreach ($turns as $key => $value) {

                    echo '<option value="' . $value->id . '">' . $value->id . ' - ' . $value->name . '</option>';
                }
                ?>

               

            </select>

            
        </div>
    </div>
</div>

</p>
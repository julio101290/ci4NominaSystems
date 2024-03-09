             
<p>
<h3><?= lang("employees.tab.personalData") ?></h3>




<div class="form-group row">
    <label for="idEmpresa" class="col-sm-2 col-form-label">Empresa</label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control idEmpresaEmpleados form-control" name="idEmpresaEmpleados" id="idEmpresaEmpleados" style="width:80%;">

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
    <label for="firstname" class="col-sm-2 col-form-label">Código</label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="codigo" id="codigo" class="form-control <?= session('error.codigo') ? 'is-invalid' : '' ?>" value="<?= old('codigo') ?>" placeholder="Código Empleado" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="firstname" class="col-sm-2 col-form-label"><?= lang('employees.fields.firstname') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="hidden" id="idEmployees" name="idEmployees" value="0">
            <input type="text" name="firstname" id="firstname" class="form-control <?= session('error.firstname') ? 'is-invalid' : '' ?>" value="<?= old('firstname') ?>" placeholder="<?= lang('employees.fields.firstname') ?>" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="lastname" class="col-sm-2 col-form-label"><?= lang('employees.fields.lastname') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="lastname" id="lastname" class="form-control <?= session('error.lastname') ? 'is-invalid' : '' ?>" value="<?= old('lastname') ?>" placeholder="<?= lang('employees.fields.lastname') ?>" autocomplete="off">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="motherLastName" class="col-sm-2 col-form-label"><?= lang('employees.fields.motherLastName') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="motherLastName" id="motherLastName" class="form-control <?= session('error.motherLastName') ? 'is-invalid' : '' ?>" value="<?= old('motherLastName') ?>" placeholder="<?= lang('employees.fields.motherLastName') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="nameAbrev" class="col-sm-2 col-form-label"><?= lang('employees.fields.nameAbrev') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="nameAbrev" id="nameAbrev" class="form-control <?= session('error.nameAbrev') ? 'is-invalid' : '' ?>" value="<?= old('nameAbrev') ?>" placeholder="<?= lang('employees.fields.nameAbrev') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="sex" class="col-sm-2 col-form-label"><?= lang('employees.fields.sex') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>

            <select class="form-control select" name="sex" id="sex" style="width: 80%;">

                <option value="0"><?= lang('employees.fields.sexFermale') ?></option>
                <option value="1"><?= lang('employees.fields.sexMale') ?></option>


            </select>

        </div>
    </div>
</div>
<div class="form-group row">
    <label for="birthdate" class="col-sm-2 col-form-label"><?= lang('employees.fields.birthdate') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="date" name="birthdate" id="birthdate" class="form-control <?= session('error.birthdate') ? 'is-invalid' : '' ?>" value="<?= old('birthdate') ?>" placeholder="<?= lang('employees.fields.birthdate') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="placebirth" class="col-sm-2 col-form-label"><?= lang('employees.fields.placebirth') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="placebirth" id="placebirth" class="form-control <?= session('error.placebirth') ? 'is-invalid' : '' ?>" value="<?= old('placebirth') ?>" placeholder="<?= lang('employees.fields.placebirth') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="RFC" class="col-sm-2 col-form-label"><?= lang('employees.fields.RFC') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="RFC" id="RFC" class="form-control <?= session('error.RFC') ? 'is-invalid' : '' ?>" value="<?= old('RFC') ?>" placeholder="<?= lang('employees.fields.RFC') ?>" autocomplete="off">
        </div>
    </div>
</div>

</p>
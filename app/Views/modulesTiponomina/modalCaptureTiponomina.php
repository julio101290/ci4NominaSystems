<!-- Modal Tiponomina -->
<div class="modal fade" id="modalAddTiponomina" tabindex="-1" role="dialog" aria-labelledby="modalAddTiponomina" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('tiponomina.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-tiponomina" class="form-horizontal">
                    <input type="hidden" id="idTiponomina" name="idTiponomina" value="0">




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
                                        
                                        $contadorEmpresas ++;
                                    }
                                    ?>

                                </select>

                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="idSucursal" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.idSucursal') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control idSucursal form-control" name="idSucursal" id="idSucursal" style="width:80%;">

                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="codigo" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.codigo') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="codigo" id="codigo" class="form-control <?= session('error.codigo') ? 'is-invalid' : '' ?>" value="<?= old('codigo') ?>" placeholder="<?= lang('tiponomina.fields.codigo') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.nombre') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="nombre" id="nombre" class="form-control <?= session('error.nombre') ? 'is-invalid' : '' ?>" value="<?= old('nombre') ?>" placeholder="<?= lang('tiponomina.fields.nombre') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="direccion" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.direccion') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="direccion" id="direccion" class="form-control <?= session('error.direccion') ? 'is-invalid' : '' ?>" value="<?= old('direccion') ?>" placeholder="<?= lang('tiponomina.fields.direccion') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colonia" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.colonia') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="colonia" id="colonia" class="form-control <?= session('error.colonia') ? 'is-invalid' : '' ?>" value="<?= old('colonia') ?>" placeholder="<?= lang('tiponomina.fields.colonia') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ciudad" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.ciudad') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="ciudad" id="ciudad" class="form-control <?= session('error.ciudad') ? 'is-invalid' : '' ?>" value="<?= old('ciudad') ?>" placeholder="<?= lang('tiponomina.fields.ciudad') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="porcISN" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.porcISN') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="porcISN" id="porcISN" class="form-control <?= session('error.porcISN') ? 'is-invalid' : '' ?>" value="<?= old('porcISN') ?>" placeholder="<?= lang('tiponomina.fields.porcISN') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="entidadFederativa" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.entidadFederativa') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <select class="form-control entidadFederativa form-control estado" name="entidadFederativa" id="entidadFederativa" style="width:80%;">
                                    <option value="0">Seleccione el estado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cxcNom" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.cxcNom') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="cxcNom" id="cxcNom" class="form-control <?= session('error.cxcNom') ? 'is-invalid' : '' ?>" value="<?= old('cxcNom') ?>" placeholder="<?= lang('tiponomina.fields.cxcNom') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cxpISN" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.cxpISN') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="cxpISN" id="cxpISN" class="form-control <?= session('error.cxpISN') ? 'is-invalid' : '' ?>" value="<?= old('cxpISN') ?>" placeholder="<?= lang('tiponomina.fields.cxpISN') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cxcInfonavit" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.cxcInfonavit') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="cxcInfonavit" id="cxcInfonavit" class="form-control <?= session('error.cxcInfonavit') ? 'is-invalid' : '' ?>" value="<?= old('cxcInfonavit') ?>" placeholder="<?= lang('tiponomina.fields.cxcInfonavit') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cxcIMSS" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.cxcIMSS') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="cxcIMSS" id="cxcIMSS" class="form-control <?= session('error.cxcIMSS') ? 'is-invalid' : '' ?>" value="<?= old('cxcIMSS') ?>" placeholder="<?= lang('tiponomina.fields.cxcIMSS') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cxcFonacot" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.cxcFonacot') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="cxcFonacot" id="cxcFonacot" class="form-control <?= session('error.cxcFonacot') ? 'is-invalid' : '' ?>" value="<?= old('cxcFonacot') ?>" placeholder="<?= lang('tiponomina.fields.cxcFonacot') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="diasPeriodoNomina" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.diasPeriodoNomina') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="diasPeriodoNomina" id="diasPeriodoNomina" class="form-control <?= session('error.diasPeriodoNomina') ? 'is-invalid' : '' ?>" value="<?= old('diasPeriodoNomina') ?>" placeholder="<?= lang('tiponomina.fields.diasPeriodoNomina') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="maxDias" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.maxDias') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="maxDias" id="maxDias" class="form-control <?= session('error.maxDias') ? 'is-invalid' : '' ?>" value="<?= old('maxDias') ?>" placeholder="<?= lang('tiponomina.fields.maxDias') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="codigoPostal" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.codigoPostal') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="codigoPostal" id="codigoPostal" class="form-control <?= session('error.codigoPostal') ? 'is-invalid' : '' ?>" value="<?= old('codigoPostal') ?>" placeholder="<?= lang('tiponomina.fields.codigoPostal') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="riesgoPto" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.riesgoPto') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control riesgoPto form-control" name="riesgoPto" id="riesgoPto" style="width:80%;">

                                    <?php
                                    
                                    
                                    foreach ($riesgosTrabajo as $key => $value) {
                                        
                                        
                                        echo '<option value="'.$value["id"].'">'.$value["clase"].'</option>';
                                        
                                        
                                    }
                                    
                                    
                                    ?>


                                </select>


                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="areaSalMin" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.areaSalMin') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                
                            
                                 <select class="form-control areaSalMin form-control" name="areaSalMin" id="areaSalMin" style="width:80%;">

                                    <?php
                                    
                                    
                                    foreach ($salariosMinimos as $key => $value) {
                                        
                                        
                                        echo '<option value="'.$value["id"].'">'.$value["descripcion"].'</option>';
                                        
                                        
                                    }
                                    
                                    
                                    ?>


                                </select>
                            
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ejecutivo" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.ejecutivo') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="ejecutivo" id="ejecutivo" class="form-control <?= session('error.ejecutivo') ? 'is-invalid' : '' ?>" value="<?= old('ejecutivo') ?>" placeholder="<?= lang('tiponomina.fields.ejecutivo') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ctaNom" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.ctaNom') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="ctaNom" id="ctaNom" class="form-control <?= session('error.ctaNom') ? 'is-invalid' : '' ?>" value="<?= old('ctaNom') ?>" placeholder="<?= lang('tiponomina.fields.ctaNom') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="NRP" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.NRP') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="NRP" id="NRP" class="form-control <?= session('error.NRP') ? 'is-invalid' : '' ?>" value="<?= old('NRP') ?>" placeholder="<?= lang('tiponomina.fields.NRP') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="porcRiesgoTrabajo" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.porcRiesgoTrabajo') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="porcRiesgoTrabajo" id="porcRiesgoTrabajo" class="form-control <?= session('error.porcRiesgoTrabajo') ? 'is-invalid' : '' ?>" value="<?= old('porcRiesgoTrabajo') ?>" placeholder="<?= lang('tiponomina.fields.porcRiesgoTrabajo') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="numSucBancaria" class="col-sm-2 col-form-label"><?= lang('tiponomina.fields.numSucBancaria') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="numSucBancaria" id="numSucBancaria" class="form-control <?= session('error.numSucBancaria') ? 'is-invalid' : '' ?>" value="<?= old('numSucBancaria') ?>" placeholder="<?= lang('tiponomina.fields.numSucBancaria') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveTiponomina"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>
    
    $(document).on('click', '.btnAddTiponomina', function (e) {
        
        var idEmpresa = $(".idEmpresa").val();
        
        $(".form-control").val("");
        
        $("#idTiponomina").val("0");
        $("#btnSaveTiponomina").removeAttr("disabled");
        
        $(".idEmpresa").val(idEmpresa).trigger("change");
        
    });
    
    /* 
     * AL hacer click al editar
     */
    
    
    
    $(document).on('click', '.btnEditTiponomina', function (e) {
        
        
        var idTiponomina = $(this).attr("idTiponomina");
        
        //LIMPIAMOS CONTROLES
        $(".form-control").val("");
        
        $("#idTiponomina").val(idTiponomina);
        $("#btnGuardarTiponomina").removeAttr("disabled");
        
    });
    
    
    
    
    $("#idSucursal").select2({
        ajax: {
            url: "<?= site_url('admin/sucursales/getSucursalesAjax') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                var idEmpresa = $('.idEmpresa').val(); // CSRF hash
                
                return {
                    searchTerm: params.term, // search term
                    [csrfName]: csrfHash, // CSRF Token
                    idEmpresa: idEmpresa // search term
                };
            },
            processResults: function (response) {
                
                // Update CSRF Token
                $('.txt_csrfname').val(response.token);
                return {
                    results: response.data
                };
            },
            cache: true
        }
    });
    
    $(".idEmpresa").select2();
    $(".riesgoPto").select2();
    
    

</script>


<?= $this->endSection() ?>
        
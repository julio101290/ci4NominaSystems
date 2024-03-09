<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('modulesTiposcalculos/modalCaptureTiposcalculos') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddTiposcalculos" data-toggle="modal" data-target="#modalAddTiposcalculos"><i class="fa fa-plus"></i>

                    <?= lang('tiposcalculos.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableTiposcalculos" class="table table-striped table-hover va-middle tableTiposcalculos">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th><?= lang('tiposcalculos.fields.idEmpresa') ?></th>
                                <th><?= lang('tiposcalculos.fields.nombre') ?></th>
                                <th><?= lang('tiposcalculos.fields.claveTimbrado') ?></th>
                                <th><?= lang('tiposcalculos.fields.claveCalculo') ?></th>
                                <th><?= lang('tiposcalculos.fields.claveImpresion') ?></th>
                                <th><?= lang('tiposcalculos.fields.claveLiquidacion') ?></th>
                                <th><?= lang('tiposcalculos.fields.satTipoNomina') ?></th>
                                <th><?= lang('tiposcalculos.fields.created_at') ?></th>
                                <th><?= lang('tiposcalculos.fields.updated_at') ?></th>
                                <th><?= lang('tiposcalculos.fields.deleted_at') ?></th>

                                <th><?= lang('tiposcalculos.fields.actions') ?> </th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.card -->

<?= $this->endSection() ?>


<?= $this->section('js') ?>
<script>

    /**
     * Cargamos la tabla
     */

    var tableTiposcalculos = $('#tableTiposcalculos').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url('admin/tiposcalculos') ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [11],
                searchable: false,
                targets: [11]

            }],
        columns: [{
                'data': 'id'
            },

            {
                'data': 'idEmpresa'
            },

            {
                'data': 'nombre'
            },

            {
                'data': 'claveTimbrado'
            },

            {
                'data': 'claveCalculo'
            },

            {
                'data': 'claveImpresion'
            },

            {
                'data': 'claveLiquidacion'
            },

            {
                'data': 'satTipoNomina'
            },

            {
                'data': 'created_at'
            },

            {
                'data': 'updated_at'
            },

            {
                'data': 'deleted_at'
            },

            {
                "data": function (data) {
                    return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <button class="btn btn-warning btnEditTiposcalculos" data-toggle="modal" idTiposcalculos="${data.id}" data-target="#modalAddTiposcalculos">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });



    $(document).on('click', '#btnSaveTiposcalculos', function (e) {


        var idTiposcalculos = $("#idTiposcalculos").val();
        var idEmpresa = $("#idEmpresa").val();
        var nombre = $("#nombre").val();
        var claveTimbrado = $("#claveTimbrado").val();
        var claveCalculo = $("#claveCalculo").val();
        var claveImpresion = $("#claveImpresion").val();
        var claveLiquidacion = $("#claveLiquidacion").val();
        var satTipoNomina = $("#satTipoNomina").val();

        $("#btnSaveTiposcalculos").attr("disabled", true);

        var datos = new FormData();
        datos.append("idTiposcalculos", idTiposcalculos);
        datos.append("idEmpresa", idEmpresa);
        datos.append("nombre", nombre);
        datos.append("claveTimbrado", claveTimbrado);
        datos.append("claveCalculo", claveCalculo);
        datos.append("claveImpresion", claveImpresion);
        datos.append("claveLiquidacion", claveLiquidacion);
        datos.append("satTipoNomina", satTipoNomina);


        $.ajax({

            url: "<?= base_url('admin/tiposcalculos/save') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                if (respuesta.match(/Correctamente.*/)) {

                    Toast.fire({
                        icon: 'success',
                        title: "Guardado Correctamente"
                    });

                    tableTiposcalculos.ajax.reload();
                    $("#btnSaveTiposcalculos").removeAttr("disabled");


                    $('#modalAddTiposcalculos').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveTiposcalculos").removeAttr("disabled");


                }

            }

        }

        ).fail(function (jqXHR, textStatus, errorThrown) {

            if (jqXHR.status === 0) {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "No hay conexión.!" + jqXHR.responseText
                });

                $("#btnSaveTiposcalculos").removeAttr("disabled");


            } else if (jqXHR.status == 404) {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Requested page not found [404]" + jqXHR.responseText
                });

                $("#btnSaveTiposcalculos").removeAttr("disabled");

            } else if (jqXHR.status == 500) {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Internal Server Error [500]." + jqXHR.responseText
                });


                $("#btnSaveTiposcalculos").removeAttr("disabled");

            } else if (textStatus === 'parsererror') {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Requested JSON parse failed." + jqXHR.responseText
                });

                $("#btnSaveTiposcalculos").removeAttr("disabled");

            } else if (textStatus === 'timeout') {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Time out error." + jqXHR.responseText
                });

                $("#btnSaveTiposcalculos").removeAttr("disabled");

            } else if (textStatus === 'abort') {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Ajax request aborted." + jqXHR.responseText
                });

                $("#btnSaveTiposcalculos").removeAttr("disabled");

            } else {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: 'Uncaught Error: ' + jqXHR.responseText
                });


                $("#btnSaveTiposcalculos").removeAttr("disabled");

            }
        })

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Tiposcalculos
     =============================================*/
    $(".tableTiposcalculos").on("click", ".btnEditTiposcalculos", function () {

        var idTiposcalculos = $(this).attr("idTiposcalculos");

        var datos = new FormData();
        datos.append("idTiposcalculos", idTiposcalculos);

        $.ajax({

            url: "<?= base_url('admin/tiposcalculos/getTiposcalculos') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idTiposcalculos").val(respuesta["id"]);

                $("#idEmpresa").val(respuesta["idEmpresa"]).trigger("change");;
                $("#nombre").val(respuesta["nombre"]);
                $("#claveTimbrado").val(respuesta["claveTimbrado"]);
                $("#claveCalculo").val(respuesta["claveCalculo"]);
                $("#claveImpresion").val(respuesta["claveImpresion"]);
                $("#claveLiquidacion").val(respuesta["claveLiquidacion"]);
                $("#satTipoNomina").val(respuesta["satTipoNomina"]).trigger("change");


            }

        })

    })


    /*=============================================
     ELIMINAR tiposcalculos
     =============================================*/
    $(".tableTiposcalculos").on("click", ".btn-delete", function () {

        var idTiposcalculos = $(this).attr("data-id");

        Swal.fire({
            title: '<?= lang('boilerplate.global.sweet.title') ?>',
            text: "<?= lang('boilerplate.global.sweet.text') ?>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '<?= lang('boilerplate.global.sweet.confirm_delete') ?>'
        })
                .then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: `<?= base_url('admin/tiposcalculos') ?>/` + idTiposcalculos,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableTiposcalculos.ajax.reload();
                        }).fail((error) => {
                            Toast.fire({
                                icon: 'error',
                                title: error.responseJSON.messages.error,
                            });
                        })
                    }
                })
    })

    $(function () {
        $("#modalAddTiposcalculos").draggable();

    });


</script>
<?= $this->endSection() ?>
        
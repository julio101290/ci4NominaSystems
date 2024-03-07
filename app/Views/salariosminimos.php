<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('modulesSalariosminimos/modalCaptureSalariosminimos') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddSalariosminimos" data-toggle="modal" data-target="#modalAddSalariosminimos"><i class="fa fa-plus"></i>

                    <?= lang('salariosminimos.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableSalariosminimos" class="table table-striped table-hover va-middle tableSalariosminimos">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th><?= lang('salariosminimos.fields.descripcion') ?></th>
                                <th><?= lang('salariosminimos.fields.importe') ?></th>
                                <th><?= lang('salariosminimos.fields.created_at') ?></th>
                                <th><?= lang('salariosminimos.fields.updated_at') ?></th>
                                <th><?= lang('salariosminimos.fields.deleted_at') ?></th>
                                <th><?= lang('salariosminimos.fields.actions') ?> </th>

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

    var tableSalariosminimos = $('#tableSalariosminimos').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url('admin/salariosminimos') ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [6],
                searchable: false,
                targets: [6]

            }],
        columns: [{
                'data': 'id'
            },

            {
                'data': 'descripcion'
            },

            {
                'data': 'importe'
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
                             <button class="btn btn-warning btnEditSalariosminimos" data-toggle="modal" idSalariosminimos="${data.id}" data-target="#modalAddSalariosminimos">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });



    $(document).on('click', '#btnSaveSalariosminimos', function (e) {


        var idSalariosminimos = $("#idSalariosminimos").val();
        var idEmpresa = $("#idEmpresa").val();
        var descripcion = $("#descripcion").val();
        var importe = $("#importe").val();

        $("#btnSaveSalariosminimos").attr("disabled", true);

        var datos = new FormData();
        datos.append("idSalariosminimos", idSalariosminimos);
        datos.append("idEmpresa", idEmpresa);
        datos.append("descripcion", descripcion);
        datos.append("importe", importe);


        $.ajax({

            url: "<?= base_url('admin/salariosminimos/save') ?>",
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

                    tableSalariosminimos.ajax.reload();
                    $("#btnSaveSalariosminimos").removeAttr("disabled");


                    $('#modalAddSalariosminimos').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveSalariosminimos").removeAttr("disabled");


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

                $("#btnSaveSalariosminimos").removeAttr("disabled");


            } else if (jqXHR.status == 404) {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Requested page not found [404]" + jqXHR.responseText
                });

                $("#btnSaveSalariosminimos").removeAttr("disabled");

            } else if (jqXHR.status == 500) {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Internal Server Error [500]." + jqXHR.responseText
                });


                $("#btnSaveSalariosminimos").removeAttr("disabled");

            } else if (textStatus === 'parsererror') {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Requested JSON parse failed." + jqXHR.responseText
                });

                $("#btnSaveSalariosminimos").removeAttr("disabled");

            } else if (textStatus === 'timeout') {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Time out error." + jqXHR.responseText
                });

                $("#btnSaveSalariosminimos").removeAttr("disabled");

            } else if (textStatus === 'abort') {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Ajax request aborted." + jqXHR.responseText
                });

                $("#btnSaveSalariosminimos").removeAttr("disabled");

            } else {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: 'Uncaught Error: ' + jqXHR.responseText
                });


                $("#btnSaveSalariosminimos").removeAttr("disabled");

            }
        })

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Salariosminimos
     =============================================*/
    $(".tableSalariosminimos").on("click", ".btnEditSalariosminimos", function () {

        var idSalariosminimos = $(this).attr("idSalariosminimos");

        var datos = new FormData();
        datos.append("idSalariosminimos", idSalariosminimos);

        $.ajax({

            url: "<?= base_url('admin/salariosminimos/getSalariosminimos') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idSalariosminimos").val(respuesta["id"]);

                $("#idEmpresa").val(respuesta["idEmpresa"]);
                $("#descripcion").val(respuesta["descripcion"]);
                $("#importe").val(respuesta["importe"]);


            }

        })

    })


    /*=============================================
     ELIMINAR salariosminimos
     =============================================*/
    $(".tableSalariosminimos").on("click", ".btn-delete", function () {

        var idSalariosminimos = $(this).attr("data-id");

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
                            url: `<?= base_url('admin/salariosminimos') ?>/` + idSalariosminimos,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableSalariosminimos.ajax.reload();
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
        $("#modalAddSalariosminimos").draggable();

    });


</script>
<?= $this->endSection() ?>
        
<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('modulesRiesgoslaborales/modalCaptureRiesgoslaborales') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddRiesgoslaborales" data-toggle="modal" data-target="#modalAddRiesgoslaborales"><i class="fa fa-plus"></i>

                    <?= lang('riesgoslaborales.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableRiesgoslaborales" class="table table-striped table-hover va-middle tableRiesgoslaborales">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th><?= lang('riesgoslaborales.fields.clase') ?></th>
                                <th><?= lang('riesgoslaborales.fields.porcentaje') ?></th>
                                <th><?= lang('riesgoslaborales.fields.created_at') ?></th>
                                <th><?= lang('riesgoslaborales.fields.updated_at') ?></th>
                                <th><?= lang('riesgoslaborales.fields.deleted_at') ?></th>

                                <th><?= lang('riesgoslaborales.fields.actions') ?> </th>

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


    $(".idEmpresa").select2();
    /**
     * Cargamos la tabla
     */

    var tableRiesgoslaborales = $('#tableRiesgoslaborales').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url(route_to('admin/riesgoslaborales')) ?>',
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
                'data': 'clase'
            },

            {
                'data': 'porcentaje'
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
                             <button class="btn btn-warning btnEditRiesgoslaborales" data-toggle="modal" idRiesgoslaborales="${data.id}" data-target="#modalAddRiesgoslaborales">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });




    $(document).on('click', '#btnSaveRiesgoslaborales', function (e) {



        var idRiesgoslaborales = $("#idRiesgoslaborales").val();
        var idEmpresa = $("#idEmpresa").val();
        var clase = $("#clase").val();
        var porcentaje = $("#porcentaje").val();

        $("#btnSaveRiesgoslaborales").attr("disabled", true);

        var datos = new FormData();
        datos.append("idRiesgoslaborales", idRiesgoslaborales);
        datos.append("idEmpresa", idEmpresa);
        datos.append("clase", clase);
        datos.append("porcentaje", porcentaje);


        $.ajax({

            url: "<?= route_to('admin/riesgoslaborales/save') ?>",
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

                    tableRiesgoslaborales.ajax.reload();
                    $("#btnSaveRiesgoslaborales").removeAttr("disabled");


                    $('#modalAddRiesgoslaborales').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveRiesgoslaborales").removeAttr("disabled");


                }

            }

        }

        )

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Riesgoslaborales
     =============================================*/
    $(".tableRiesgoslaborales").on("click", ".btnEditRiesgoslaborales", function () {

        var idRiesgoslaborales = $(this).attr("idRiesgoslaborales");

        var datos = new FormData();
        datos.append("idRiesgoslaborales", idRiesgoslaborales);

        $.ajax({

            url: "<?= base_url(route_to('admin/riesgoslaborales/getRiesgoslaborales')) ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idRiesgoslaborales").val(respuesta["id"]);

                $("#clase").val(respuesta["clase"]);
                $("#idEmpresa").val(respuesta["idEmpresa"]).trigger("change");
                $("#porcentaje").val(respuesta["porcentaje"]);


            }

        })

    })


    /*=============================================
     ELIMINAR riesgoslaborales
     =============================================*/
    $(".tableRiesgoslaborales").on("click", ".btn-delete", function () {

        var idRiesgoslaborales = $(this).attr("data-id");

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
                            url: `<?= base_url(route_to('admin/riesgoslaborales')) ?>/` + idRiesgoslaborales,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableRiesgoslaborales.ajax.reload();
                        }).fail((error) => {
                            Toast.fire({
                                icon: 'error',
                                title: error.responseJSON.messages.error,
                            });
                        })
                    }
                })
    })




</script>
<?= $this->endSection() ?>
        
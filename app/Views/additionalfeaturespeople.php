<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('modulesAdditionalfeaturespeople/modalCaptureAdditionalfeaturespeople') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddAdditionalfeaturespeople" data-toggle="modal" data-target="#modalAddAdditionalfeaturespeople"><i class="fa fa-plus"></i>

                    <?= lang('additionalfeaturespeople.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableAdditionalfeaturespeople" class="table table-striped table-hover va-middle tableAdditionalfeaturespeople">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th><?= lang('additionalfeaturespeople.fields.name') ?></th>
                                <th><?= lang('additionalfeaturespeople.fields.format') ?></th>
                                <th><?= lang('additionalfeaturespeople.fields.type') ?></th>
                                <th><?= lang('additionalfeaturespeople.fields.cid') ?></th>
                                <th><?= lang('additionalfeaturespeople.fields.code') ?></th>
                                <th><?= lang('additionalfeaturespeople.fields.minimunValue') ?></th>
                                <th><?= lang('additionalfeaturespeople.fields.maximunValue') ?></th>
                                <th><?= lang('additionalfeaturespeople.fields.created_at') ?></th>
                                <th><?= lang('additionalfeaturespeople.fields.updated_at') ?></th>
                                <th><?= lang('additionalfeaturespeople.fields.deleted_at') ?></th>

                                <th><?= lang('additionalfeaturespeople.fields.actions') ?> </th>

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

    var tableAdditionalfeaturespeople = $('#tableAdditionalfeaturespeople').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url(route_to('admin/additionalfeaturespeople')) ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [9],
                searchable: false,
                targets: [9]

            }],
        columns: [{
                'data': 'id'
            },

            {
                'data': 'name'
            },

            {
                'data': 'format'
            },

            {
                'data': 'type'
            },

            {
                'data': 'cid'
            },

            {
                'data': 'code'
            },
            
             {
                'data': 'minimunValue'
            },
            
             {
                'data': 'maximunValue'
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
                             <button class="btn btn-warning btnEditAdditionalfeaturespeople" data-toggle="modal" idAdditionalfeaturespeople="${data.id}" data-target="#modalAddAdditionalfeaturespeople">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });



    $(document).on('click', '#btnSaveAdditionalfeaturespeople', function (e) {


        var idAdditionalfeaturespeople = $("#idAdditionalfeaturespeople").val();
        var name = $("#name").val();
        var format = $("#format").val();
        var type = $("#type").val();
        var cid = $("#cid").val();
        var code = $("#code").val();
        var maximunValue = $("#maximunValue").val();
        var minimunValue = $("#minimunValue").val();

        $("#btnSaveAdditionalfeaturespeople").attr("disabled", true);

        var datos = new FormData();
        datos.append("idAdditionalfeaturespeople", idAdditionalfeaturespeople);
        datos.append("name", name);
        datos.append("format", format);
        datos.append("type", type);
        datos.append("cid", cid);
        datos.append("code", code);
        datos.append("maximunValue", maximunValue);
        datos.append("minimunValue", minimunValue);


        $.ajax({

            url: "<?= route_to('admin/additionalfeaturespeople/save') ?>",
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

                    tableAdditionalfeaturespeople.ajax.reload();
                    $("#btnSaveAdditionalfeaturespeople").removeAttr("disabled");


                    $('#modalAddAdditionalfeaturespeople').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveAdditionalfeaturespeople").removeAttr("disabled");


                }

            }

        }

        )

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Additionalfeaturespeople
     =============================================*/
    $(".tableAdditionalfeaturespeople").on("click", ".btnEditAdditionalfeaturespeople", function () {

        var idAdditionalfeaturespeople = $(this).attr("idAdditionalfeaturespeople");

        var datos = new FormData();
        datos.append("idAdditionalfeaturespeople", idAdditionalfeaturespeople);

        $.ajax({

            url: "<?= base_url(route_to('admin/additionalfeaturespeople/getAdditionalfeaturespeople')) ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idAdditionalfeaturespeople").val(respuesta["id"]);

                $("#name").val(respuesta["name"]);
                $("#format").val(respuesta["format"]);
                $("#format").trigger("change");
                $("#type").val(respuesta["type"]);
                $("#type").trigger("change");
                $("#cid").val(respuesta["cid"]);
                $("#code").val(respuesta["code"]);
                $("#minimunValue").val(respuesta["minimunValue"]);
                $("#maximunValue").val(respuesta["maximunValue"]);


            }

        })

    })


    /*=============================================
     ELIMINAR additionalfeaturespeople
     =============================================*/
    $(".tableAdditionalfeaturespeople").on("click", ".btn-delete", function () {

        var idAdditionalfeaturespeople = $(this).attr("data-id");

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
                            url: `<?= base_url(route_to('admin/additionalfeaturespeople')) ?>/` + idAdditionalfeaturespeople,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableAdditionalfeaturespeople.ajax.reload();
                        }).fail((error) => {
                            Toast.fire({
                                icon: 'error',
                                title: error.responseJSON.messages.error,
                            });
                        })
                    }
                })
    })


    $('#format').select2();
    $('#type').select2();

</script>
<?= $this->endSection() ?>
        
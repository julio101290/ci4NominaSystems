<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('modulesTurns/modalCaptureTurns') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
 <div class="card-header">
     <div class="float-right">
         <div class="btn-group">

             <button class="btn btn-primary btnAddTurns" data-toggle="modal" data-target="#modalAddTurns"><i class="fa fa-plus"></i>

                 <?= lang('turns.add') ?>

             </button>

         </div>
     </div>
 </div>
 <div class="card-body">
     <div class="row">
         <div class="col-md-12">
             <div class="table-responsive">
                 <table id="tableTurns" class="table table-striped table-hover va-middle tableTurns">
                     <thead>
                         <tr>

                             <th>#</th>
                             <th><?= lang('turns.fields.code') ?></th>
<th><?= lang('turns.fields.name') ?></th>
<th><?= lang('turns.fields.created_at') ?></th>
<th><?= lang('turns.fields.updated_at') ?></th>
<th><?= lang('turns.fields.deleted_at') ?></th>

                             <th><?= lang('turns.fields.actions') ?> </th>

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

 var tableTurns = $('#tableTurns').DataTable({
     processing: true,
     serverSide: true,
     autoWidth: false,
     order: [[1, 'asc']],

     ajax: {
         url: '<?= base_url(route_to('admin/turns')) ?>',
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
    'data': 'code'
},

 
{
    'data': 'name'
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
                             <button class="btn btn-warning btnEditTurns" data-toggle="modal" idTurns="${data.id}" data-target="#modalAddTurns">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
             }
         }
     ]
 });



 $(document).on('click', '#btnSaveTurns', function (e) {

     
var idTurns = $("#idTurns").val();
var code = $("#code").val();
var name = $("#name").val();

     $("#btnSaveTurns").attr("disabled", true);

     var datos = new FormData();
datos.append("idTurns", idTurns);
datos.append("code", code);
datos.append("name", name);


     $.ajax({

         url: "<?= route_to('admin/turns/save') ?>",
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

                 tableTurns.ajax.reload();
                 $("#btnSaveTurns").removeAttr("disabled");


                 $('#modalAddTurns').modal('hide');
             } else {

                 Toast.fire({
                     icon: 'error',
                     title: respuesta
                 });

                 $("#btnSaveTurns").removeAttr("disabled");
                

             }

         }

     }

     )

 });



 /**
  * Carga datos actualizar
  */


 /*=============================================
  EDITAR Turns
  =============================================*/
 $(".tableTurns").on("click", ".btnEditTurns", function () {

     var idTurns = $(this).attr("idTurns");
        
     var datos = new FormData();
     datos.append("idTurns", idTurns);

     $.ajax({

         url: "<?= base_url(route_to('admin/turns/getTurns')) ?>",
         method: "POST",
         data: datos,
         cache: false,
         contentType: false,
         processData: false,
         dataType: "json",
         success: function (respuesta) {
             $("#idTurns").val(respuesta["id"]);
             
             $("#code").val(respuesta["code"]);
$("#name").val(respuesta["name"]);


         }

     })

 })


 /*=============================================
  ELIMINAR turns
  =============================================*/
 $(".tableTurns").on("click", ".btn-delete", function () {

     var idTurns = $(this).attr("data-id");

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
                         url: `<?= base_url(route_to('admin/turns')) ?>/` + idTurns,
                         method: 'DELETE',
                     }).done((data, textStatus, jqXHR) => {
                         Toast.fire({
                             icon: 'success',
                             title: jqXHR.statusText,
                         });


                         tableTurns.ajax.reload();
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
        
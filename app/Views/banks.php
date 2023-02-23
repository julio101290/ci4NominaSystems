<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('modulesBanks/modalCaptureBanks') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
 <div class="card-header">
     <div class="float-right">
         <div class="btn-group">

             <button class="btn btn-primary btnAddBanks" data-toggle="modal" data-target="#modalAddBanks"><i class="fa fa-plus"></i>

                 <?= lang('banks.add') ?>

             </button>

         </div>
     </div>
 </div>
 <div class="card-body">
     <div class="row">
         <div class="col-md-12">
             <div class="table-responsive">
                 <table id="tableBanks" class="table table-striped table-hover va-middle tableBanks">
                     <thead>
                         <tr>

                             <th>#</th>
                             <th><?= lang('banks.fields.code') ?></th>
<th><?= lang('banks.fields.name') ?></th>
<th><?= lang('banks.fields.omision') ?></th>
<th><?= lang('banks.fields.RFC') ?></th>
<th><?= lang('banks.fields.keySAT') ?></th>
<th><?= lang('banks.fields.created_at') ?></th>
<th><?= lang('banks.fields.updated_at') ?></th>
<th><?= lang('banks.fields.deleted_at') ?></th>

                             <th><?= lang('banks.fields.actions') ?> </th>

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

 var tableBanks = $('#tableBanks').DataTable({
     processing: true,
     serverSide: true,
     responsive: true,
     autoWidth: false,
     order: [[1, 'asc']],

     ajax: {
         url: '<?= base_url(route_to('admin/banks')) ?>',
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
    'data': 'code'
},

 
{
    'data': 'name'
},

 
{
    'data': 'omision'
},

 
{
    'data': 'RFC'
},

 
{
    'data': 'keySAT'
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
                             <button class="btn btn-warning btnEditBanks" data-toggle="modal" idBanks="${data.id}" data-target="#modalAddBanks">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
             }
         }
     ]
 });



 $(document).on('click', '#btnSaveBanks', function (e) {

     
var idBanks = $("#idBanks").val();
var code = $("#code").val();
var name = $("#name").val();
var omision = $("#omision").val();
var RFC = $("#RFC").val();
var keySAT = $("#keySAT").val();

     $("#btnSaveBanks").attr("disabled", true);

     var datos = new FormData();
datos.append("idBanks", idBanks);
datos.append("code", code);
datos.append("name", name);
datos.append("omision", omision);
datos.append("RFC", RFC);
datos.append("keySAT", keySAT);


     $.ajax({

         url: "<?= route_to('admin/banks/save') ?>",
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

                 tableBanks.ajax.reload();
                 $("#btnSaveBanks").removeAttr("disabled");


                 $('#modalAddBanks').modal('hide');
             } else {

                 Toast.fire({
                     icon: 'error',
                     title: respuesta
                 });

                 $("#btnSaveBanks").removeAttr("disabled");
                

             }

         }

     }

     )

 });



 /**
  * Carga datos actualizar
  */


 /*=============================================
  EDITAR Banks
  =============================================*/
 $(".tableBanks").on("click", ".btnEditBanks", function () {

     var idBanks = $(this).attr("idBanks");
        
     var datos = new FormData();
     datos.append("idBanks", idBanks);

     $.ajax({

         url: "<?= base_url(route_to('admin/banks/getBanks')) ?>",
         method: "POST",
         data: datos,
         cache: false,
         contentType: false,
         processData: false,
         dataType: "json",
         success: function (respuesta) {
             $("#idBanks").val(respuesta["id"]);
             
             $("#code").val(respuesta["code"]);
$("#name").val(respuesta["name"]);
$("#omision").val(respuesta["omision"]);
$("#RFC").val(respuesta["RFC"]);
$("#keySAT").val(respuesta["keySAT"]);


         }

     })

 })


 /*=============================================
  ELIMINAR banks
  =============================================*/
 $(".tableBanks").on("click", ".btn-delete", function () {

     var idBanks = $(this).attr("data-id");

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
                         url: `<?= base_url(route_to('admin/banks')) ?>/` + idBanks,
                         method: 'DELETE',
                     }).done((data, textStatus, jqXHR) => {
                         Toast.fire({
                             icon: 'success',
                             title: jqXHR.statusText,
                         });


                         tableBanks.ajax.reload();
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
        
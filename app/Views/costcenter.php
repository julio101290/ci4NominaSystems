<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('modulesCostcenter/modalCaptureCostcenter') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
 <div class="card-header">
     <div class="float-right">
         <div class="btn-group">

             <button class="btn btn-primary btnAddCostcenter" data-toggle="modal" data-target="#modalAddCostcenter"><i class="fa fa-plus"></i>

                 <?= lang('costcenter.add') ?>

             </button>

         </div>
     </div>
 </div>
 <div class="card-body">
     <div class="row">
         <div class="col-md-12">
             <div class="table-responsive">
                 <table id="tableCostcenter" class="table table-striped table-hover va-middle tableCostcenter">
                     <thead>
                         <tr>

                             <th>#</th>
                             <th><?= lang('costcenter.fields.code') ?></th>
<th><?= lang('costcenter.fields.name') ?></th>
<th><?= lang('costcenter.fields.type') ?></th>
<th><?= lang('costcenter.fields.branchoffice') ?></th>
<th><?= lang('costcenter.fields.created_at') ?></th>
<th><?= lang('costcenter.fields.updated_at') ?></th>
<th><?= lang('costcenter.fields.deleted_at') ?></th>

                             <th><?= lang('costcenter.fields.actions') ?> </th>

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

 var tableCostcenter = $('#tableCostcenter').DataTable({
     processing: true,
     serverSide: true,
     autoWidth: false,
     order: [[1, 'asc']],

     ajax: {
         url: '<?= base_url(route_to('admin/costcenter')) ?>',
         method: 'GET',
         dataType: "json"
     },
     columnDefs: [{
             orderable: false,
             targets: [8],
             searchable: false,
             targets: [8]

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
    'data': 'type'
},

 
{
    'data': 'branchoffice'
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
                             <button class="btn btn-warning btnEditCostcenter" data-toggle="modal" idCostcenter="${data.id}" data-target="#modalAddCostcenter">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
             }
         }
     ]
 });



 $(document).on('click', '#btnSaveCostcenter', function (e) {

     
var idCostcenter = $("#idCostcenter").val();
var code = $("#code").val();
var name = $("#name").val();
var type = $("#type").val();
var branchoffice = $("#branchoffice").val();

     $("#btnSaveCostcenter").attr("disabled", true);

     var datos = new FormData();
datos.append("idCostcenter", idCostcenter);
datos.append("code", code);
datos.append("name", name);
datos.append("type", type);
datos.append("branchoffice", branchoffice);


     $.ajax({

         url: "<?= route_to('admin/costcenter/save') ?>",
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

                 tableCostcenter.ajax.reload();
                 $("#btnSaveCostcenter").removeAttr("disabled");


                 $('#modalAddCostcenter').modal('hide');
             } else {

                 Toast.fire({
                     icon: 'error',
                     title: respuesta
                 });

                 $("#btnSaveCostcenter").removeAttr("disabled");
                

             }

         }

     }

     )

 });



 /**
  * Carga datos actualizar
  */


 /*=============================================
  EDITAR Costcenter
  =============================================*/
 $(".tableCostcenter").on("click", ".btnEditCostcenter", function () {

     var idCostcenter = $(this).attr("idCostcenter");
        
     var datos = new FormData();
     datos.append("idCostcenter", idCostcenter);

     $.ajax({

         url: "<?= base_url(route_to('admin/costcenter/getCostcenter')) ?>",
         method: "POST",
         data: datos,
         cache: false,
         contentType: false,
         processData: false,
         dataType: "json",
         success: function (respuesta) {
             $("#idCostcenter").val(respuesta["id"]);
             
             $("#code").val(respuesta["code"]);
$("#name").val(respuesta["name"]);
$("#type").val(respuesta["type"]);
$("#branchoffice").val(respuesta["branchoffice"]);


         }

     })

 })


 /*=============================================
  ELIMINAR costcenter
  =============================================*/
 $(".tableCostcenter").on("click", ".btn-delete", function () {

     var idCostcenter = $(this).attr("data-id");

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
                         url: `<?= base_url(route_to('admin/costcenter')) ?>/` + idCostcenter,
                         method: 'DELETE',
                     }).done((data, textStatus, jqXHR) => {
                         Toast.fire({
                             icon: 'success',
                             title: jqXHR.statusText,
                         });


                         tableCostcenter.ajax.reload();
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
        
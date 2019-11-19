<script>
$(document).ready(function(){

  var table =  $('#memListTable').DataTable({
        // Processing indicator
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        "paging": true,
        "lengthChange": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/datable/'); ?>",
            "type": "POST",
            
        },
        //Set column definition initialisation properties
        "columnDefs": [
       { 
          "targets": [11],
          "orderable": false,
          "render": function ( data, type, row ) {
                           return '<a href="javascript:void(0);" id="edit" class="text-success" "><i class="fas fa-user-edit"> Edit</i></a>' +
                             ' '+'<a href="javascript:void(0);" id="delete" class=" text-danger" "><i class="fas fa-trash"> Delete</i></a>';
                    }       
       },
       {
        "targets": [10],
          "orderable": false,
          "render": function ( data, type, row ) {
                           return '<a href="javascript:void(0);" id="item_signature" class="text-black"><i class="fas fa-images"> Signatory</i></a>';
                    }   
       }
        ]
    });

    // Insert section here

      $('#add-btn').on('click',function(){
          $('#Modal_Add').modal('show');
      });

      $('#saveForm').submit(function(e){
          e.preventDefault();
          var user = $('#saveForm').serialize();
          var status = $('#status option:selected').val();
          $.ajax({
              type : "POST",
              url  : "<?php echo site_url('admin/save')?>",
              dataType : "JSON",
              data :user,status:status,
              success: function(data){
                  $('#memListTable').DataTable().ajax.reload();
                  $('[name="account_num"]').val("");
                  $('[name="company_name"]').val("");
                  $('[name="address"]').val("");
                  $('[name="telephone_num"]').val("");
                  $('[name="contact_person"]').val("");
                  $('[name="contact_number"]').val("");
                  $('[name="po_validity"]').val("");
                  $('[name="status"]').val("");
                  $('[name="contact_person_after"]').val("");
                  $('[name="contact_num_after"]').val("");
                  $('#Modal_Add').modal('hide');
                  Swal.fire("Company Added!", "Please Check your Company List", "success");
              },error:function(){
                  Swal.fire("Company already Added!", "Please Check your Company List", "error");
              }
          });
          return false;
    });

    //Insert section end



    $('#memListTable tbody').on('click', '#edit', function () {
      var data = table.row( $(this).parents('tr') ).data();
        $('#Modal_Edit').modal('show');
        $('[name="account_num_edit"]').val(data[0]);
        $('[name="company_name_edit"]').val(data[1]);
        $('[name="address_edit"]').val(data[2]);
        $('[name="telephone_num_edit"]').val(data[3]);
        $('[name="contact_person_edit"]').val(data[4]);
        $('[name="contact_number_edit"]').val(data[5]);
        $('[name="po_validity_edit"]').val(data[6]);
        $('[name="status_edit"]').val(data[7]);
        $('[name="contact_person_after_edit"]').val(data[8]);
        $('[name="contact_num_after_edit"]').val(data[9]);
        $('[name="imageID"]').val(data[0]);
        $('[name="userfile"]').val(data[10]);
    } );


// Edit section start here
    $('#editForm').on('submit',function(e){
       e.preventDefault();
       var status = $('#status_edit option:selected').val();
       var user = $('#editForm').serialize();
       $('#memListTable').DataTable().ajax.reload();
          $.ajax({
            url:'<?php echo base_url();?>admin/update',
            type:"post",
            dataType : 'html',
            data:new FormData(this),account_num:imageID,status:status, //this is formData
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success:function(data){
              $('#memListTable').DataTable().ajax.reload();
              $('#Modal_Edit').modal('hide');
              $('#testImage').html(data);
              $('[name="account_num_edit"]').val("");
              $('[name="company_name_edit"]').val("");
              $('[name="address_edit"]').val("");
              $('[name="telephone_num_edit"]').val("");
              $('[name="contact_person_edit"]').val("");
              $('[name="contact_number_edit"]').val("");
              $('[name="po_validity_edit"]').val("");
              $('[name="status_edit"]').val(status);
              $('[name="contact_person_after_edit"]').val("");
              $('[name="contact_num_after_edit"]').val("");
              $('[name="imageID"]').val("");
              $('[name="userfile"]').val("");
            }
          }); 
    });


// DELETE SECTION
    $('#memListTable tbody').on('click', '#delete', function () {
      var data = table.row( $(this).parents('tr') ).data();
      var account_num = data[0];
    $('#Modal_Delete').modal('show');
    $('[name="account_num_delete"]').val(account_num);
    } );

    //delete record to database
$('#btn_delete').on('click',function(){
  var account_num = $('#account_num_delete').val();
  $.ajax({
      type : "POST",
      url  : "<?php echo site_url('admin/delete')?>",
      dataType : "JSON",
      data : {account_num:account_num},
      success: function(data){
          $('#memListTable').DataTable().ajax.reload();
          Swal.fire("Deete Successfuly!", "Please Check your Company List", "success");
          $('[name="account_num_delete"]').val("");
          $('#Modal_Delete').modal('hide');
          show_product();
      },error : function(data){
          alert();
      }
  });
  return false;
});

// DELETE SECTION END

$('#memListTable').on('click','#item_signature',function(){
// e.preventDefault();
var data = table.row( $(this).parents('tr') ).data();
var account_num = data[0];
  $('#Modal_Signature').modal('show');
  $('[name="imageID"]').val(account_num);
  $.ajax({
      type : 'POST',
      url : 'images',
      dataType : 'html',
      cache: false,
      data : {account_num:account_num},
      success : function($htmls){
          $("#Modal_Signature").find('.modal-body').html($htmls)
          
          // $('#Modal_Signature').modal('show');
          // alert();
      }

  });
});
    
});
</script>
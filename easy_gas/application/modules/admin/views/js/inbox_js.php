<script type="text/javascript">
$(document).ready(function(){

  // show_product();	//call function show all product
  show_product();	//call function show all product

  var table =  $('#mydata').DataTable({
    "ordering": false,
    "lengthChange": false,
  });
  $('div.dataTables_wrapper thead,div.dataTables_wrapper th').hide();
//function show all product
function show_product(){
$.ajax({
  type  : 'ajax',
  url   : '<?php echo site_url('admin/message/list')?>',
  async : false,
  dataType : 'json',
  success : function(data){
      var html = '';
      var i;
      for(i=0; i<data.length; i++){
          html += '<tr class="text-center">'+
                         '<td style="display:none;">'+data[i].message_id+'</td>'+
                        '<td style="width:100px;"><input class="checkbox" type="checkbox" value="'+data[i].message_id+'" id="check2"><label for="check1"></label></td>'+
                        '<td id="name-td" class="mailbox-name"><div style="width:200px;"><b>'+data[i].name+'</b></div></td>'+
                        '<td id="text-td"class="mailbox-subject" ><div class="text-truncate" style="width:500px;">'+data[i].message_text+'</div></td>'+
                            '<td id="date-td" class="mailbox-date"><div style="width:200px;">'+data[i].created_date+'</div></td>'+
                        '</tr>';
      }
      $('#show_data').html(html);
  }

});
}


$('#mydata tbody').on('click', '#name-td , #text-td , #date-td', function () {
        var data = table.row( this ).data();
        var md5 = data[0];
        window.location.href = "<?php echo base_url('admin/message/read/');?>" + md5,'_blank';
    } );


//delete function here
$('#test').click(function () {
      var countries = [];
      $.each($("#check2:checked"), function(){            
          countries.push($(this).val());
      });
      if (countries == ""){
        Swal.fire("Delete Error", "Please select a message you want to delete" , "error")
        }else{
          Swal.fire("Successfuly Delete",  `Your Id is:${countries} ` , "error")
        }
});
// end here delete

// refresh here
$('#refresh').click(function () {
  alert();
});
//end here

$(function () {
    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for glyphicon and font awesome
    $('.mailbox-star').click(function (e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var glyph = $this.hasClass('glyphicon')
      var fa    = $this.hasClass('fa')

      //Switch states
      if (glyph) {
        $this.toggleClass('glyphicon-star')
        $this.toggleClass('glyphicon-star-empty')
      }

      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })
  })

}); //end of document

</script>
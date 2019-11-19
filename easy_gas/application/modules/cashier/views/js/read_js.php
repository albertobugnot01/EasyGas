<script>
	$(document).ready(function(){

		  $('#send_message a').on('click',function(e){
		  		  var send =  $('#message_text').val();
		  		 var all =  $('#send_message').serialize();
		  		        if(send == ""){
					        Swal.fire("Message Error", "Please Input text" , "error")
					        }else{
					        $.ajax({
					            type : 'POST',
					            url : '<?php echo base_url();?>admin/message/send_message',
					            dataType : 'html',
					            data :all,
					            success: function(data){
					                    alert(data);
					            }

					        });
					        }
		  });
	});

</script>
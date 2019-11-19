<script type="text/javascript">
	$(document).ready(function(){
		$('#logText').html('Login');
		$('#logForm').submit(function(e){
            e.preventDefault();
            $('#mySubmit').prop("disabled", true);
			$('#logText').html('Checking...');
			var user = $('#logForm').serialize();
			var login = function(){
				$.ajax({
					type: 'POST',
					url: 'welcome/login',
					dataType: 'json',
					data: user,
					success:function(response){
						// $('#message').html(response.message);
						$('#logText').html('Login');
						if(response.error){
                            Swal.fire("Invalid Account!", "Please Check your Username and Password", "error");
                            $('#mySubmit').prop("disabled", false);
						}
						else{
                            $('#mySubmit').prop("disabled", false);
                            $('#logForm')[0].reset();
							setTimeout(function(){
								window.location.href = "admin/index"
							});
						}
					}
				});
			};
			setTimeout(login, 3000);
		});

		$(document).on('click', '#clearMsg', function(){
			$('#responseDiv').hide();
		});
	});
	</script>
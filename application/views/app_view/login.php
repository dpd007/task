<?php
// echo "<pre>";
// print_r($data);
// die();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home Page</title>
	<style>
		.holders {
			margin-top: 5px;
			margin-bottom: 5px;
		}

		.holders label {
			text-transform: capitalize;
		}

		#user_email {
			margin-left: 23px;
		}

		#login_btn {
			margin-top: 15px;
			padding: 5px;
			font-size: 1rem;
			text-transform: capitalize;
		}
	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
<div class="container" style="display: flex; flex-direction:column; align-items: center;">
	<h2 style="text-align: center;">let's build a login system</h2>
	<form id="login_form">
		<div class="holders">
			<label for="user_email">email</label>
			<input type="email" name="user_email" id="user_email" required>
		</div>
		<div class="holders">
			<label for="user_password">password</label>
			<input type="password" name="user_password" id="user_password" required>
		</div>
		<button type="submit" id="login_btn">login</button>
	</form>
</div>
<script>
	$('#login_form').submit(function(e) {
		// e.preventDefault();
		// alert('clicked');
		// let formData = new FormData(document.getElementById('login_form'));
		let base_url = '<?php echo base_url(); ?>'+'Users/loginToApp';
		// alert(base_url);
		// return false;
		// console.log(formData);
		// return false;
		$.ajax({
			url: base_url,
			method: 'POST',
			data: $('#login_form').serialize(),
			processData: false,
			dataType: 'json',
			cache: false,
			success: function(res) {
				if(res == 1){
					window.location.reload();
				}
			}
		});
	});
</script>
</body>

</html>

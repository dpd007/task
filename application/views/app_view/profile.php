<?php
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Profile Page</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<h2>Profile page</h2>
	<?php if($user[0]['image_file'] != ''){ ?>
	<div class='preview'>
		<img src="<?php echo base_url() . '/assets/uploads/' .$user[0]['image_file']; ?>" id="img" width="300" height="300" >
	</div>
	<?php } else{ ?>
	<div class='preview'>
		<img src="" id="img" width="100" height="100" >
	</div>
	<?php } ?>
	<h3>ID is : <?php echo $user[0]['user_id'];?></h3>
	<h4>Email is : <?php echo $user[0]['user_mail'];?></h4>
	<a href="<?php echo base_url("Users/edit/".$user[0]['id']);?>">edit profile pic</a> <br><br>
	<a href="<?php echo base_url("Users/logout");?>" id="logout_btn">logout</a>
</body>
</html>

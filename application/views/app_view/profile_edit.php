<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Profile Edit Page</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class='preview'>
	<img src="" id="img" width="100" height="100" >
</div>
<?php if($user[0]['image_file'] != ''){ ?>
	<div class='preview'>
		<img src="<?php echo base_url() . '/assets/uploads/' .$user[0]['image_file']; ?>" id="img" width="300" height="300" >
	</div>
<?php } ?>
<?php echo form_open_multipart('Users/upload_image');?>
<input type="hidden" name="id" value="<?php echo $user[0]['id']; ?>">
<input type="file" name="userfile" size="20" /> <br>
<input type="submit" value="upload" />
</form>
</body>
</html>

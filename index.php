<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php

	if(isset($_POST['submit']))
	{
		if($_FILES['image']['type'] == "image/png" && $_FILES['image']['size'] < 100100 )
		{
			$tmp = $_FILES['image']['tmp_name'];
		    $img_name = uniqid().".jpg";
		    move_uploaded_file($tmp, "photos/".$img_name);

		}

		else
		{
			echo "Not Supported";
		}


		
	}


	?>

	<form method="POST" action="" enctype="multipart/form-data">
		<input type="file" name="image" accept="image/*">
		<input type="submit" name="submit" value="upload">
		
	</form>

</body>
</html>
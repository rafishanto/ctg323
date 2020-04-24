<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
</head>
<body>
	
<?php

include 'Connection.php';
$db = new Connection();


if(isset($_GET['id'])){
	$id = $_GET['id'];
	$getContact = $db->getContact($_GET['id']);
}

if(isset($_POST['submit'])){
	$db->update($_POST['name'],$_POST['mobile_number'],$_POST['address'],$id);
	header("location: index.php");
}

?>

<?php
	foreach($getContact as $data){
?>

	<form style="border:2px solid blue;padding:20px;" method="POST" action="">
		<input type="text" name="name" placeholder="name" value="<?php echo $data['name']; ?>"><br>
		<input type="number" name="mobile_number"placeholder="mobile_number" value="<?php echo $data['mobile_number']; ?>"><br>
		<textarea name="address" placeholder="address"><?php echo $data['address']; ?></textarea>
		<input type="submit" name="submit" value="Update"><br>
	</form>
<?php
	}
?>	

</body>
</html>
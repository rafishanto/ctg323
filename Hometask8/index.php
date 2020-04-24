<?php
include 'Connection.php';
$db = new Connection();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Phonebook</title>
</head>
<body>

	<h2>Add a new contact</h2>

	<?php

		if(isset($_POST['submit'])){
			if(!empty($_POST['name']) && !empty($_POST['mobile_number']) && !empty($_POST['address'])){
				$db->addContact($_POST['name'],$_POST['mobile_number'],$_POST['address']);
				echo "Contact Added!";
			}else{
				echo "All Fields Must Be Filled Up!";
			}
		}


	?>

	<form style="border:2px solid blue;padding:20px;" method="POST" action="">
		<input type="text" name="name" placeholder="name"><br>
		<input type="number" name="mobile_number"placeholder="mobile_number"><br>
		<textarea name="address" placeholder="address"></textarea>
		<input type="submit" name="submit" value="Add"><br>
	</form>

		<hr>
	<?php
		$results = $db->getAllContacts();
	?>
	<table border="1px">
		<tr>
			<th>Name</th>
			<th>Mobile Number</th>
			<th>Address</th>
			
		</tr>
	<?php
		foreach($results as $data){
	?>
		<tr>
			<td><?php echo $data['name']; ?></td>
			<td><?php echo $data['mobile_number']; ?></td>
			<td><?php echo $data['address']; ?></td>
			<td><a href="update.php?id=<?php echo $data['id']; ?>">Update</a> | <a onclick="return confirm('are you sure?');" href="delete.php?id=<?php echo $data['id']; ?>">Delete</a></td>
		</tr>
	<?php
		}
	?>	
	
	</table>

</body>
</html>
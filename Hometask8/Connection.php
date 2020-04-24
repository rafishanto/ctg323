<?php

class Connection{

	public $conn;

	public function __construct(){
		$this->conn = new PDO("mysql:host=localhost;dbname=phonebook","root","");
	

	}


		//insert a contact
	public function addContact($name,$mobile_number,$address)
	{
		$statement = $this->conn->prepare("INSERT INTO information (name,mobile_number,address) VALUES (:name,:mobile_number,:address)");
				$statement->execute(
					array(
						':name' => $name,
						':mobile_number' => $mobile_number,
						':address' => $address
						
					)
				);
	}

		//get all Contacts
	public function getAllContacts()
	{
		$statement = $this->conn->prepare("SELECT * FROM information");
		$statement->execute();
		$data = $statement->fetchAll();
		return $data;
	}

		//get a Contact
	public function getContact($id)
	{
		$statement = $this->conn->prepare("SELECT * FROM information WHERE id=$id;");
		$statement->execute();
		$data = $statement->fetchAll();
		return $data;	
	}

	//update a Contact
	public function update($name,$mobile_number,$address,$id)
	{
		$name = addslashes($name);
		$statement = $this->conn->prepare("UPDATE information SET name='$name',mobile_number='$mobile_number',address='$address' WHERE id=$id;");
		$statement->execute();
	}

		//delete a Contact
	public function delete($id)
	{
		$statement = $this->conn->prepare("DELETE FROM information WHERE id=$id;");
		$statement->execute();
	}
}

?>
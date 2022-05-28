<?php

if(isset($_POST['submit']))
{

	$link = mysqli_connect("localhost", "root", "", "members");

	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];


	$sql = "INSERT INTO members_table (username, email, password) 
			VALUES ('$username', '$email', '$password')";

	if(mysqli_query($link, $sql))
	{
		echo "Success";
	}
	else
	{
		mysqli_close($link);
	}

	mysqli_close($link);
}

?>

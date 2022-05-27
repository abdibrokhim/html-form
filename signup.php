<?php

if(isset($_POST['submit']))
{

	$link = mysqli_connect("localhost", "root", "", "students");

	$fullname = $_POST["fullname"];
	$email = $_POST["email"];
	$password = $_POST["passwd"];


	$sql = "INSERT INTO students_table (fullname, email, password) 
			VALUES ('$fullname', '$email', '$password')";

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
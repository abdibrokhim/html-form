<?php
$link = mysqli_connect("localhost", "root", "", "members");

unset($_SESSION["id"]);
unset($_SESSION["username"]);
header("Location: signin.php");
?>
<?php
$link = mysqli_connect("localhost", "root", "", "members");

unset($_SESSION["id"]);
unset($_SESSION["name"]);
header("Location: signin.php");
?>
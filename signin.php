<?php
if (isset($_POST['submit'])) {
    $link = mysqli_connect("localhost", "root", "", "members");

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = mysqli_query($link,"SELECT * FROM members_table where email='$email' and password='md5($password)'");
    $row = mysqli_fetch_array($sql);
    if(is_array($row)) {
        $_SESSION["email"]=$row['email'];
        $_SESSION["username"]=$row['username'];
        header("Location: index.html");
    }
    else {
        echo "Invalid Email or Password";
    }
}
?>
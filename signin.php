<?php

if(isset($_POST['submit']))
{
    $link = mysqli_connect("localhost", "root", "", "members");

    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM members_table WHERE email = '$email'";
    $query1 = "SELECT * FROM members_table WHERE password = '$password'";

    $result = mysqli_query($query);
    $result1 = mysqli_query($query1);
    
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo 'found!';
        } else {
            echo 'not found';
        }
    } else {
        echo 'Error: '.mysqli_error();
    }

    if ($result1) {
        if (mysqli_num_rows($result1) > 0) {
            echo 'found!';
        } else {
            echo 'not found';
        }
    } else {
        echo 'Error: '.mysqli_error();
    }

}

?>

<?php
if (isset($_POST['submit'])) {

    $link = mysqli_connect("localhost", "root", "", "members");

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = mysqli_query($link,"SELECT * FROM members_table where email='$email'");

    if (mysqli_num_rows($sql) > 0) {
        echo "Email is already exists";
        exit;
    } else {
        $sql = "INSERT INTO members_table (username, email, password) VALUES ('$username', '$email', '$password')";

        if (mysqli_query($link, $sql)) {
            echo "Success";
        } else {
            mysqli_close($link);
        }

        mysqli_close($link);
    }
}
?>
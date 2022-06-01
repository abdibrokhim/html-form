
<?php

if (isset($_POST['signUp'])) {

    $link = mysqli_connect("localhost", "root", "", "members");

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = mysqli_query($link,"SELECT * FROM members_table where email = '$email'");

    if (mysqli_num_rows($sql) > 0) {
        echo "Email is already exists\n";
        echo "Sign In";
        mysqli_close($link);

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

    echo "<meta http-equiv='refresh' content='0'>";
}

if (isset($_POST['signIn'])) {

    $link = mysqli_connect("localhost", "root", "", "members");

    $email = $_POST["email_"];
    $password = $_POST["password_"];

    $sql = mysqli_query($link,"SELECT * FROM members_table where email = '$email'");

    if (mysqli_num_rows($sql) > 0) {
        header('Refresh: 1; url=admin.php');
        exit;
    } else {
        echo "Sign Up";

        mysqli_close($link);
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BAYC</title>

    <!-- /*Bootstrap CSS*/ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- /*Bootstrap JS*/ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: "Montserrat",sans-serif;
            background-color: black; 
            color: white;
        }
        .card {
            background-color: black;
        }
        .form-control:focus {
            border-color: #bfc500;
            box-shadow: 0 0 0 0.1rem #bfc500;
        }
        .btn-warning {
            border: none;
            background-color: #bfc500;
        }
        .btn-warning:hover {
            background-color: #ffffff;
            border-color: #ffffff
        }
        .form-field .error {
            color: red;
            font-size: 14px;
            margin-top: 15px;
        }
        .success span{
            visibility: hidden;
        }
        .error {
            color: red;
            font-size: 14px;
        }
        .success {
            color: green;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <!-- /*HEADER*/ -->
    <header class="sticky-top p-3">
        <div class="container">
            <div class="d-flex justify-content-center">
                <img class="w-50" src="https://ik.imagekit.io/bayc/assets/bayc-logo.png" alt="BORED APE">
            </div>
        </div>
    </header>

    <!-- /*SECTION*/ -->
    <section class="p-5">
        <div class="container">
            <div class="row row-cols-auto d-flex flex-wrap justify-content-md-between justify-content-center">
                <form class="col-12 col-sm-6 col-md-4 form" action="" method="POST" id="signup" name="signup" onsubmit="return signupjs()">
                    <div class="mb-3 form-field">
                        <label for="username" class="form-label fw-bold">Username</label>
                        <input id="username" type="text" class="form-control" name="username">
                        <span id="nameError" class="error"></span>
                        <span id="nameSuccess" class="success"></span>
                    </div>
                    <div class="mb-3 form-field">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input id="email" type="email" class="form-control" name="email">
                        <span id="emailError" class="error"></span>
                        <span id="emailSuccess" class="success"></span>
                    </div>
                    <div class="mb-3 form-field">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input id="password" type="password" class="form-control" name="password">
                        <span id="passwordError" class="error"></span>
                        <span id="passwordSuccess" class="success"></span>
                    </div>
                    <div class="mb-3 form-field">
                        <label for="confirm_password" class="form-label fw-bold">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password">
                        <span id="confirm_passwordError" class="error"></span>
                        <span id="confirm_passwordSuccess" class="success"></span>
                    </div>

                    <button type="submit" class="btn btn-warning fw-bold w-100 mt-3" id="submit" name="signUp">SIGN UP</button>
                </form>
                <div class="col-12 col-sm-6 col-md-4 card p-md-0 p-5" style="width: 20rem;">
                    <img src="https://ik.imagekit.io/bayc/assets/bayc-footer.png" class="card-img-top" alt="BORED APE">
                    <div class="card-body">
                        <h5 class="card-title fw-bold fst-italic">WELCOME TO THE BORED APE YACHT CLUB</h5>
                        <p class="card-text">A limited NFT collection where the token itself doubles as your membership to a swamp club for apes. The club is open! Ape in with us.</p>
                        <a href="#" class="btn btn-warning fw-bold w-100 stretched-link mt-3">ENTER</a>
                    </div>
                </div>
                <form class="col-12 col-sm-6 col-md-4" action="" name="signin" method="POST" onsubmit="return signinjs()">
                    <div class="mb-3">
                        <label for="email_" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control" id="email_" name="email_">
                        <span id="emailError1" class="error"></span>
                        <span id="emailSuccess1" class="success"></span>
                    </div>
                    <div class="mb-3">
                        <label for="password_" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control" id="password_" name="password_">
                        <span id="passwordError1" class="error"></span>
                        <span id="passwordSuccess1" class="success"></span>
                    </div>

                    <button type="submit" class="btn btn-warning fw-bold w-100 mt-3" name="signIn">SIGN IN</button>
                </form>
            </div>
        </div>
    </section>

    <!-- /*FOOTER*/ -->
    <footer class="pb-5">
        <div class="container">
            <div class="d-flex justify-content-center">
                <a href="#" class="text-decoration-none text-white">&copy 2021 Yuga Labs LLC</a>
            </div>
        </div>
    </footer>

    <script>
        function signupjs() {
            let username = document.signup.username.value;
            let email = document.signup.email.value;
            let password = document.signup.password.value;
            let confirm_password = document.signup.confirm_password.value;

            if (username.length == "") {
                document.getElementById('nameError').innerHTML = "Write your name, please!";
                return false;
            }
            if (email.length == "" && username.length !== "") {
                document.getElementById('nameError').innerHTML = null;
                document.getElementById('emailError').innerHTML = "Write your email, please!";
                return false;
            }
            if (password.length == "" && email.length !== "" && username.length !== "") {
                document.getElementById('nameError').innerHTML = null;
                document.getElementById('emailError').innerHTML = null;
                document.getElementById('passwordError').innerHTML = "Write your password, please!";
                return false;
            }
            if (confirm_password.length == "" && password.length !== "" && email.length !== "" && username.length !== "") {
                document.getElementById('nameError').innerHTML = null;
                document.getElementById('emailError').innerHTML = null;
                document.getElementById('passwordError').innerHTML = null;
                document.getElementById('confirm_passwordError').innerHTML = "Please, confirm your password!";
                return false;
            }
            if (password.length < 8) {
                document.getElementById('passwordError').innerHTML = "Short password!";
                return false;
            }
            if (password !== confirm_password) {
                document.getElementById('confirm_passwordError').innerHTML = "Password should match!";
                return false;
            }
            else {
                // document.getElementById('nameSuccess').innerHTML = "Success";
                return true;
            }
        }


        function signinjs() {
            let email = document.signin.email_.value;
            let password = document.signin.password_.value;

            if (email.length == "") {
                document.getElementById('emailError1').innerHTML = "Write your email, please!";
                return false;
            }
            if (password.length == "" && email.length !== "") {
                document.getElementById('emailError1').innerHTML = null;
                document.getElementById('passwordError1').innerHTML = "Write your password, please!";
                return false;
            }
            else {
                // document.getElementById('nameSuccess1').innerHTML = "Success";
                return true;
            }
        }
    </script>

</body>
</html>

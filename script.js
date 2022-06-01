function validation() {
    let username = document.signup.username.value;
    let email = document.signup.email.value;
    let password = document.signup.password.value;
    let confirm_password = document.signup.confirm_password.value;

    if (username.length == "") {
        document.getElementById('nameError').innerHTML = "Write your name, please!";
        return false;
    }
    if (email.length == "") {
        document.getElementById('emailError').innerHTML = "Write your email, please!";
        return false;
    }
    if (password.length == "") {
        document.getElementById('passwordError').innerHTML = "Write your password, please!";
        return false;
    }
    if (confirm_password.length == "") {
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
        document.getElementById('nameSuccess').innerHTML = "Success";
        return true;
    }
}
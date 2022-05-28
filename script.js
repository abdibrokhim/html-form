

const form = document.getElementById('signup');

const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const confirm_password = document.getElementById('confirm_password');

form.addEventListener('submit', e => {
    e.preventDefault();
    
    checkInputs();
});

function checkInputs() {
    // trim to remove the whitespaces
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const confirm_passwordValue = confirm_password.value.trim();
    
    if(usernameValue === '') {
        setErrorFor(username, 'Provide Username');
    } else if(usernameValue.length < 4) {
        setErrorFor(username, 'Invalid Username');
    } else {
        setSuccessFor(username);
    }
    
    if(emailValue === '') {
        setErrorFor(email, 'Provide Email');
    } else if (!isEmail(emailValue)) {
        setErrorFor(email, 'Invalid Email');
    } else {
        setSuccessFor(email);
    }
    
    if(passwordValue === '') {
        setErrorFor(password, 'Provide Password');
    } else if(passwordValue.length < 8) {
        setErrorFor(password, 'Invalid Password');
    } else {
        setSuccessFor(password);
    }
    
    if(confirm_passwordValue === '') {
        setErrorFor(confirm_password, 'Confirm Password');
    } else if(passwordValue !== confirm_passwordValue) {
        setErrorFor(confirm_password, 'Does not match');
    } else{
        setSuccessFor(confirm_password);
    }
}

function setErrorFor(input, message) {
    const formControl = input.parentElement;
    const span = formControl.querySelector('span');
    formControl.className = 'form-field error';
    span.innerText = message;
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-field success';
}
    
function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

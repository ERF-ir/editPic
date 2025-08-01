const loginText = document.querySelector(".title-text .login");
const loginForm = document.querySelector("form.login");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector("form .signup-link a");
signupBtn.onclick = (() => {
  loginForm.style.marginLeft = "-50%";
  loginText.style.marginLeft = "-50%";
});
loginBtn.onclick = (() => {
  loginForm.style.marginLeft = "0%";
  loginText.style.marginLeft = "0%";
});


let Name = document.getElementById('name');
let Email = document.getElementById('email');
let Password = document.getElementById('password');
let Password_repeat = document.getElementById('password_repeat');
let Signup = document.getElementById('Signup');
let g = document.getElementById('formm');
let error = document.getElementById('error');
let err = document.querySelector('.err');

let pattern_email = /[a-zA-Z1-9]+@gmail.com/

let text_err = ''

Signup.addEventListener('click', (e) => {


  if (!Name.value.trim() || !Email.value.trim() || !Password.value.trim() || !Password_repeat.value.trim()) {
    e.preventDefault()
    err.style.opacity = "1"
    text_err = 'All fields are mandatory';
    error.innerHTML = text_err

  }
 
  else if (!pattern_email.test(Email.value.trim())) {
    e.preventDefault()
    err.style.opacity = "1"
    text_err = 'Email format is invalid';
    error.innerHTML = text_err
  }
  
  else if (Password.value.trim().length < 8) {
    e.preventDefault()
    err.style.opacity = "1"
    text_err = 'Password must be at least 8 characters';
    error.innerHTML = text_err

  }
 
  else if(Password.value.trim() != Password_repeat.value.trim())
  {
    e.preventDefault()
    err.style.opacity = "1"
    text_err = 'Your passwords are not the same';
    error.innerHTML = text_err

  }
 
  else{
    
    err.style.opacity = "0"
  }



})




<?php
session_start();


function Register()
{
  $connection = new PDO("mysql:host=localhost;dbname=editor", 'root', '');


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $data = $_POST['frm'];



    $query = $connection->prepare("INSERT INTO users(user_name,email,password) VALUES(?,?,?)");

    $query->execute([$data['name'], $data['email'], password_hash($data['password'], PASSWORD_DEFAULT)]);
  }
}


function log_in()
{
  $connection = new PDO("mysql:host=localhost;dbname=editor", 'root', '');


  $email = $_POST['frm']['email'];
  $password_user = $_POST['frm']['password'];
  $query = $connection->prepare("SELECT * FROM users WHERE email = '$email'");
  $query->execute();
  $r = $query->fetch(PDO::FETCH_OBJ);

if (@$r->email == $email && password_verify($password_user,@$r->password)) {

  $_SESSION['user'] = $r->id;
 header("location:index.php");
}
else{

  echo "
  <h3 style='color:red'>Your email or password is incorrect</h3>
  ";

}


}





isset($_POST['btn_sign']) &&  Register();
isset($_POST['btn_log']) &&  log_in()
















?>

































<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login signup form with html css javascript</title>
  <link rel="stylesheet" href="src/public/styles/auth_style.css">
</head>

<body>
  <canvas id="canvas-basic"></canvas>

  <div class="wrapper">
    <div class="title-text">
      <div class="title login">Login Form</div>
      <div class="title signup">Signup Form</div>
    </div>
    <div class="form-container">
      <div class="slide-controls">
        <input type="radio" name="slide" id="login" checked>
        <input type="radio" name="slide" id="signup">
        <label for="login" class="slide login">Login</label>
        <label for="signup" class="slide signup">Signup</label>
        <div class="slider-tab"></div>
      </div>
      <div class="form-inner">


        <form id="formm" action="#" method="post" class="login">
          <pre>
            </pre>
          <div class="field">
            <input type="text" autocomplete="off" name="frm[email]" placeholder="Email Address">
          </div>
          <div class="field">
            <input type="password" autocomplete="off" name="frm[password]" placeholder="Password">
          </div>
          <div class="pass-link"><a href="#">Forgot password?</a></div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input name="btn_log" type="submit" value="Login">
          </div>
          <div class="signup-link">Create an account <a href="">Signup now</a></div>
        </form>





        <form action="#" method="post" class="signup">

          <div class="field">
            <input id="name" type="text" autocomplete="off" name="frm[name]" placeholder="Name">
          </div>

          <div class="field">
            <input id="email" type="text" autocomplete="off" name="frm[email]" placeholder="Email Address">
          </div>
          <div class="field">
            <input id="password" type="password" autocomplete="off" name="frm[password]" placeholder="Password">
          </div>
          <div class="field">
            <input id="password_repeat" type="password" autocomplete="off" placeholder="Confirm password">
          </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input id="Signup" name="btn_sign" type="submit" value="Signup">
          </div>
          <div class="err">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 svgg h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
            </svg>
            <p id="error">hello ia m erfan bayat</p>

          </div>
          <div class="signup-link">Already have an account? <a href="">Login</a></div>

        </form>




      </div>
    </div>
  </div>


  <script src="src/lib/granim.min.js"></script>
  <script src="src/lib/sweetalert2.js"></script>
  <script src="src/public/js/auth..js"></script>


  <script>
    var granimInstance = new Granim({
      element: '#canvas-basic',
      direction: 'custom',
      customDirection: {
        x0: '40%',
        y0: '10px',
        x1: '60%',
        y1: '50%',
      },
      isPausedWhenNotInView: true,
      states: {
        "default-state": {
          gradients: [
            ['#a1c4fd', '#c2e9fb'],
            ['#9795f0', '#fbc8d4'],
            ['#4facfe', '#00f2fe'],
            ['#84fab0', '#8fd3f4'],
            ['#0acffe', '#495aff']


          ]
        }
      }
    });
  </script>


</body>

</html>
<!DOCTYPE html>
<html lang="fr">

<?php
$pdo = require '../Modele/connect.php';


if (isset($_POST['login'])) { 
  //var_dump($_POST);
  //exit;
  $email = $_POST['email'];
  $password = $_POST['password'];
// execute a query
  $sql = "SELECT * FROM `admin` WHERE email='{$email}' && password='{$password}'";
  $user_data = $pdo->query($sql)->fetchAll();
  if (count($user_data)>0) {
 // print_r($user_data);
  //exit;
    $_SESSION['isUserLoggedIn'] = true;
    $_SESSION['emailId'] = $_POST['email'];
    echo "<script> window.location.href='./index.php'; </script>";
  }else{
    echo "<script> alert('Email ou mot de passe non valide!')</script>";
  }
}
else {
 // var_dump($_SESSION['isUserLoggedIn']);
 // exit;
  if (isset($_SESSION['isUserLoggedIn'])){
    echo "<script> window.location.href='../index.php'; </script>";
  }
}
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mon Portfolio | Connexion</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Mon</b>Portfolio</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Authentifiez-vous pour administrer votre Portfolio</p>

      <form  method="post">
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Se souvenir de moi
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button name="login" type="submit" class="btn btn-primary btn-block">Connecter</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
</body>
</html>
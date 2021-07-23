<?php 
// get connection for database
include_once '../database/koneksi.php';

// start session
session_start();

//get status
$status_awal = "admin";

// register 
if (isset($_POST["register"])) {
  header('location:register.php');
}

// cek apakah sudah menekan tombol submit atau belum 
if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $password = $_POST["password"];

  // cek apakah username dan password sudah terisi atau belum 
  if(!empty($username) && !empty($password)){

    $sql = "SELECT * FROM user WHERE username = '$username' AND password='$password' AND status = '$status_awal'";
    $exec = mysqli_query($koneksi,$sql);

    // mengambil beberapa Data dari table user untuk dijadikan SESSION
    while($rows = mysqli_fetch_assoc($exec)){
      $nomor = $rows["nomor_induk"];
    }

    $result = mysqli_num_rows($exec);

    
    if($result){
      // mengirim beberapa SESSION 
      $_SESSION["username"] = $username;
      $_SESSION["status"] = $status_awal;
      $_SESSION["nisn/nip"] = $nomor;

      echo "<script>
            alert('Selamat Datang $username');
            document.location.href = '../$status_awal/';
            </script>";

          } else {
            echo "<script>
            alert('mohon maaf akun tidak ditemukan');
            document.location.href = 'login-admin.php';
            </script>";
          }
    
  
  } else {
    $error = true;
  }

}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      html,
      body {
        height: 100%;
      }

      body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
      }

      .form-signin .checkbox {
        font-weight: 400;
      }

      .form-signin .form-floating:focus-within {
        z-index: 2;
      }

      .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }

      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
          </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
      </head>
      <body class="text-center">
        
    <main class="form-signin">

      <form action="" method="post">

      <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
      </svg>
        <h1 class="h3 mb-3 fw-normal">Login</h1>

    <!-- alert jika username / password kosong -->
    <?php if(isset($error)):?>
          <div class="alert alert-danger" role="alert" style="font-size:10px;">
            username atau password anda kosong
          </div>
        <?php endif;?>
        <!-- ------------------------------------ -->
    
    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder= "username">
      <label for="floatingInput">
      <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
      </svg> Username</label>
      </div>
      <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">
      <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
      <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
      </svg> Password</label>
      </div>

    <?php if ($status_awal == "guru"): ?>
         <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Log in</button>
         <button class="w-100 btn btn-lg btn-primary mt-1" type="submit" name="register">Register</button>
    <?php elseif($status_awal == "siswa"): ?>
          <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Log in</button>
          <button class="w-100 btn btn-lg btn-primary mt-1" type="submit" name="register">Register</button>
    <?php else: ?>
          <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Log in</button>
    <?php endif; ?>
  

        <center>
                <hr>
                <p>Lupa Password ? Klik <a href="lupas.php?status=<?= $status_awal; ?>">Disini</a></p>
        </center>
    <p class="mt-5 mb-3 text-muted">&copy; Kelompok 5</p>
  </form>
</main>


    
  </body>
</html>

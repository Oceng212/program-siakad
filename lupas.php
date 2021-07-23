<?php 
// get connection for database
include_once 'database/koneksi.php';

// start session
session_start();

//status user
$status_awal = $_GET["status"];

// cek apakah sudah menekan tombol submit atau belum 
if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $password = $_POST["password"];
  $status   = $_POST["status"];
  $nomor_induk = $_POST["nomor_induk"];

  // cek apakah form sudah terisi atau belum 
  if(!empty($username) && !empty($password) && !empty($status) && !empty($nomor_induk)){

    $sql = "SELECT * FROM user WHERE username = '$username'AND nomor_induk='$nomor_induk' AND status='$status' ";
    $exec = mysqli_query($koneksi,$sql);
    $result = mysqli_num_rows($exec);

    // jika berhasil maka rubah passwordnya
    if ($result>0){
      $ubah = " UPDATE user SET
                password = '$password'
      WHERE nomor_induk = '$nomor_induk'
      ";
      $exec_ubah = mysqli_query($koneksi,$ubah);

      $result = mysqli_num_rows($exec);

    
    if($result){

      echo "<script>
            alert('Password Berhasil Diubah');
            document.location.href = 'login.php';
            </script>";

          } else {
            echo "<script>
            alert('Mohon Maaf, Password Gagal Diubah');
            document.location.href = 'lupas.php';
            </script>";
          }
  
    } else {
      echo "<script>
      alert('Akun Tidak Ditemukan');
      document.location.href = 'lupas.php';
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
    <title>Signin Template · Bootstrap v5.0</title>

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
      <?php if($status_awal == "guru"): ?>
        <h1 class="h4 mb-3 fw-normal">Ubah Password (Guru)</h1>
      <?php else : ?>
        <h1 class="h4 mb-3 fw-normal">Ubah Password (Siswa)</h1>
      <?php endif; ?>


    <!-- alert jika username / password kosong -->
    <?php if(isset($error)):?>
          <div class="alert alert-danger" role="alert" style="font-size:10px;">
            username atau password anda kosong
          </div>
        <?php endif;?>
        <!-- ------------------------------------ -->
    
        <div class="form-floating">
      <input type="text" name="nomor_induk" class="form-control" id="floatingInput" placeholder= "NISN/NIP">
      <?php if($status_awal == "guru"): ?>
      <label for="floatingInput"> Masukkan NIP Anda</label>
      <?php else : ?>
       <label for="floatingInput"> Masukkan NISN Anda</label>
     <?php endif; ?>
      </div>

      <input type="hidden" name="status" value="<?= $status_awal; ?>">

    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder= "username">
      <label for="floatingInput">Username</label>
      </div>

      <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password Yang Baru</label>
      </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Ubah</button>

        <center>
                <hr>
                <p>Anda Ingat Password Akun Anda ? Klik <a href="login.php">Disini</a></p>
        </center>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>


    
  </body>
</html>

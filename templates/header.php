<?php 

// memulai session dan mengambil data dari session
session_start();
$user = $_SESSION["username"];
$status = $_SESSION["status"];
$nim_nip = $_SESSION["nisn/nip"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman login</title>

   <!-- Menyisipkan Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<style type="text/css">
  .latar-belakang{
    width: 330px;
  }
  .nav-atas {
    margin-left: 20px;
    font-size : 30px;
  }
  .nav-subitem {
    margin-top: 5px;
  }
  .judul {
    text-align: center;
  }
  
  /** Sidebar*/

.sidebar {
  position: fixed;
  top: 0;
  /* rtl:raw:right: 0;*/
  bottom: 0;
  /* rtl:remove */
  left: 0;
  z-index: 100; /* Behind the navbar */
  padding: 48px 0 0; /* Height of navbar */
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
}


.sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: .5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}

.sidebar .nav-link {
  font-weight: 500;
  color: white;
}




.sidebar-heading {
  font-size: .75rem;
  text-transform: uppercase;
}


/*
 * Navbar
 */

.nav-link:hover,
.nav-link:active{
  color: black;
}

    </style>

<body>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand nav-atas" href="index.php">SIAKAD SMA Tadika Mesra</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">       
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-subitem ">
          <li class="nav-item">
          </li>
        </ul>
        <span class="navbar-text" style="margin-right:12px; color: white;">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
          </svg> <?= $user?>
          </span>
      </div>
    </div>
  </nav>

  
  <div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-secondary sidebar collapse">
      <div class="position-sticky pt-5">
        <ul class="nav flex-column">
          <!-- mode header (sesuai pengguna) -->

          <!-- status : admin -->
          <?php if ($status=="admin"):?>
          
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">
              <span data-feather="home"></span>
              Profil Sekolah
            </a>
          </li>

           <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Data Master
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="data-guru.php">Data Guru</a></li>
            <li><a class="dropdown-item" href="data-siswa.php">Data Siswa</a></li>
            <li><a class="dropdown-item" href="data-kelas.php">Data kelas</a></li>
            <li><a class="dropdown-item" href="data-akun.php">Data Akun</a></li>
          </ul>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="jabatan.php">
              <span data-feather="home"></span>
              Jabatan 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="jadwal-kbm.php">
              <span data-feather="home"></span>
              Jadwal KBM
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../logout.php" onclick="return confirm('apakah anda ingin keluar ?')" >
              <span data-feather="home"></span>
              Logout
            </a>
          </li>




          <!-- status : guru  -->
          <?php elseif($status=="guru"):?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="profil.php">
              <span data-feather="home"></span>
              Profil Guru
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="kbm.php">
              <span data-feather="file"></span>
              Jadwal KBM
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="olah-nilai.php">
              <span data-feather="users"></span>
              Penilaian Siswa 
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../logout.php" onclick="return confirm('apakah anda ingin keluar ?')">
              <span data-feather="home"></span>
              Logout
            </a>
          </li>

        </ul>
        
        <?php else : ?>
        <!-- status : siswa -->
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="profil.php">
              <span data-feather="home"></span>
              Profil Siswa
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="kbm.php">
              <span data-feather="file"></span>
              Jadwal KBM
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="nilai-index.php">
              <span data-feather="shopping-cart"></span>
              Nilai
            </a>
          </li>

          
          <li class="nav-item">
            <a class="nav-link" href="../logout.php" onclick="return confirm('apakah anda ingin keluar ?')">
              <span data-feather="users"></span>
              Logout
            </a>
          </li>

          <?php endif;?>
        
        
        </ul>
      </div>
</div>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top:40px;">
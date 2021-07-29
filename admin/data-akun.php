<?php 

// set koneksi dan header
include_once '../database/koneksi.php';
include_once '../templates/header.php';

// cek apakah ada data atau tidak 
$sql = "SELECT * FROM user ORDER BY status ASC";
$exec = mysqli_query($koneksi,$sql);

// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){
  $nomor_induk = $_POST["nomor_induk"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $status = $_POST["status"];

  if (!empty($nomor_induk) && !empty($username) && !empty($password) && !empty($status)){
      $input = "INSERT INTO user VALUES ('','$nomor_induk','$username','$password','$status')";
      $exec = mysqli_query($koneksi,$input);
            if($exec){
              echo "<script>
                  alert('data berhasil Ditambahkan');
                  document.location.href='data-akun.php';
                 </script>";
            } else {
              echo "<script>
              alert('Terjadi Kesalahan, Data Gagal Ditambahkan');
              document.location.href='data-akun.php';
              </script>";
            }  
        } else {
             echo "<script>
              alert('Lengkapi Data !!!!');
              document.location.href='data-akun.php';
              </script>";
          
        }
  

  

}


?>

<div class="col-12">
       <div class="row">
            <div class="col-3" style="width:25%;">
                <strong>  <h2>Data Akun</h2>
                </strong>
        </div>
      <div class="col-9" style="width:75%; float:right;">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="float:right;">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 20 20">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                </svg>
        Tambah
        </button>
        </div>
              </div>
              </div>

<br>

<div class="container" style="margin-left:30px;">
    <div class="row">
      <table class="table table-borderless" style = "text-align:center;">
        <tr>
          <th>NISN/NIP</th>
          <th>Username</th>
          <th>Password</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      <form action="" method="post">
      <?php while($rows = mysqli_fetch_assoc($exec)):?>       
        <tr>
        <td><?= $rows["nomor_induk"];?></td>
        <td><?= $rows["username"];?></td>
        <td><?= $rows["password"];?></td>
        <td><?= $rows["status"];?></td>
        <td>
          <div class="d-grid gap-2 d-md-block">
          <a class="btn btn-danger btn-sm" href="hapus-akun.php?id=<?= $rows["id"] ?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 20 20">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
          Hapus</a>
          <a class="btn btn-primary btn-sm" href="ubah-akun.php?id=<?= $rows["id"] ?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 20 20">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>  
          Ubah</a>
          </div>
        </td>
        </tr>
        <?php endwhile;?>
      </table>
      
    </div>
  </div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="nomor_induk">NISN / NIP </label>
          <input type="text" class="form-control" id="nomor_induk" name="nomor_induk">
        </div>

        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>

        <div class="form-group">
          <label for="password">password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
     
        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" id="status" name="status">
          <option value="">-</option>
          <option value="admin">admin</option>
          <option value="guru">guru</option>
          <option value="siswa">siswa</option>
            </optgroup>
          </select>
        </div>

      

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" name="submit" class="btn btn-success">Tambah</button>
     
      </form>
  
      </div>
    </div>
  </div>
</div>
<?php include_once '../templates/footer.php'?>
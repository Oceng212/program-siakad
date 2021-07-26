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
        Tambah
        </button>
        </div>
              </div>
              </div>

<br>

<div class="container">
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
          <a class="btn btn-danger btn-sm" href="hapus-akun.php?id=<?= $rows["id"] ?>">Hapus</a>
          <a class="btn btn-primary btn-sm" href="ubah-akun.php?id=<?= $rows["id"] ?>">Ubah</a>
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
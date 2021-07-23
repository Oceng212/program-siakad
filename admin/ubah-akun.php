<?php 
// get connection and header 
include_once '../database/koneksi.php';
include_once '../templates/header.php';

// tangkap data id yang ditangkap menggunakan fungsi get
$id = $_GET["id"];

// ambil data dari database menggunakan acuan id 
$sql = mysqli_query($koneksi,"SELECT * FROM user WHERE id = '$id'");
while ($rows = mysqli_fetch_assoc($sql)){
  $nomor_induk = $rows["nomor_induk"];
  $username = $rows["username"];
  $password = $rows["password"];
  $status = $rows["status"];
}

// update data akun
if(isset($_POST["ubah"])){
  $id = $_POST["id"];
  $nomor_induk = $_POST["nomor_induk"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $status = $_POST["status"];

  if (!empty($nomor_induk) && !empty($username) && !empty($password) && !empty($status)){
      $input = "UPDATE user SET nomor_induk = '$nomor_induk', username = '$username', password = '$password', status = '$status' WHERE id = '$id'";
      $exec = mysqli_query($koneksi,$input);
            if($exec){
              echo "<script>
                  alert('data berhasil Diubah');
                  document.location.href='data-akun.php';
                 </script>";
            } else {
              echo "<script>
              alert('Terjadi Kesalahan, Data Gagal Diubah');
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

<div class="container mt-3">
	<h2 style="text-transform: capitalize;"> ubah nilai </h2> <br>
	<form action="" method="post">
		      
        <input type="hidden" name="id" value="<?= $id?>">  

  			<div class="form-group">
    			<label for="nomor_induk">NISN / NIP</label>
    			<input type="text" class="form-control" id="nomor_induk" name="nomor_induk" value="<?= $nomor_induk;?>">
  			</div>

  			<div class="form-group">
    			<label for="username">Username</label>
    			<input type="text" class="form-control" id="username" name="username" value="<?= $username;?>">
  			</div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="text" class="form-control" id="password" name="password" value="<?= $password;?>">
        </div>

         <div class="form-group">
          <label for="status">Status</label>
          <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" id="status" name="status">
          <option selected><?= $status; ?></option>
          <option value="">-</option>
          <option value="admin">admin</option>
          <option value="guru">guru</option>
          <option value="siswa">siswa</option>
            </optgroup>
          </select>
        </div>



  			<br>

  			 <button type="submit" name="ubah" class="btn btn-success">Ubah</button>

	</form>
</div>




 <?php include_once '../templates/footer.php'; ?>
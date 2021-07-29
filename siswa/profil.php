<?php 
// get connection
include_once '../database/koneksi.php';
include_once '../templates/header.php';

//get Session
$NISN = $_SESSION['nisn/nip'];
$profil = false;

// cek apakah dia sudah menambahkan profil siswa
$nama = "";
$tempat = "";
$tanggal_lahir = "";
$jenis_kelamin = "";
$agama = "";
$alamat = "";
$telp = "";
$email = "";


$sql = "SELECT * FROM profil_siswa WHERE NISN = '$NISN'";
$exec = mysqli_query($koneksi,$sql);
$result = mysqli_num_rows($exec);

if($result>0){
    $profil = true;
  
    while($rows = mysqli_fetch_assoc($exec)){
     $NISN = $rows["NISN"];
     $nama = $rows["nama"];
     $tempat = $rows["tempat"];
     $tanggal_lahir = $rows["tanggal_lahir"];
     $jenis_kelamin = $rows["jenis_kelamin"];
     $agama = $rows["agama"];
     $alamat = $rows["alamat"];
     $telp = $rows["telp"];
     $email = $rows["email"];
    }
   

}



if(isset($_POST["submit"])){
      if (tambah_siswa($_POST)>0){
          echo "<script>
          alert('Data Telah Ditambahkan')
          document.location.href = 'profil.php';
          </script>
          ";
      } else {
          echo "<script>
          alert('Data Gagal Ditambahkan');
          document.location.href = 'profil.php';
          </script>
          ";
      }

      $nisn_siswa = $_POST["nisn"];
      $nama_siswa = $_POST["nama"];

      inputKelasSiswa($nisn_siswa,$nama_siswa);
      inputNilaiSiswa($nisn_siswa,$nama_siswa);
} 

if(isset($_POST["ubah"])){
  if (updateDataSiswa($_POST)>0){
      echo "<script>
      alert('Data Telah Diubah');
      document.location.href = 'profil.php';
      </script>
      ";
  } else {
      echo "<script>
      alert('Data Gagal Diubah');
      document.location.href = 'profil.php';
      </script>
      ";
  }

  $nisn_siswa = $_POST["nisn"];
  $nama_siswa = $_POST["nama"];


} 




?>

<div class = "container mt-5">
<center><h3>Profil Siswa/i</h3></center>

  <div class="row mt-4" style="padding-right:5px;">
      <div class="col-12" style="background-color:#F5F5F5; border-left:1px solid #ccc;">
       <div class="row">
            <div class="col-3" style="width:25%;">
                <strong> NISN 
                  <span class="pull-right" style="float:right;">:</span>
                </strong>
              </div>
              <div class="col-9" style="width:75%;">
              <strong> 
                <?= $NISN;?>
              </strong>
              </div>
              </div>

        <div class="row">
            <div class="col-3" style="width:25%;">
                <strong> Nama 
                  <span class="pull-right" style="float:right;">:</span>
                </strong>
              </div>
              <div class="col-9" style="width:75%;">
              <strong> 
                <?= $nama;?>
              </strong>
              </div>
          </div>

          <div class="row">
            <div class="col-3" style="width:25%;">
                <strong> Tempat 
                  <span class="pull-right" style="float:right;">:</span>
                </strong>
              </div>
              <div class="col-3" style="width:25%;">
              <strong> 
                <?= $tempat;?>
              </strong>
              </div>
              <div class="col-2" style="width:17%;">
                <strong> Tanggal Lahir 
                  <span class="pull-right" style="float:right;">:</span>
                </strong>
                </div>
              <div class="col-4" style="width:33%;">
                <strong>  
                <?= $tanggal_lahir;?>
                </strong>
                </div>
          </div>


          <div class="row">
            <div class="col-3" style="width:25%;">
                <strong> Jenis Kelamin 
                  <span class="pull-right" style="float:right;">:</span>
                </strong>
              </div>
              <div class="col-9" style="width:75%;">
              <strong> 
                <?= $jenis_kelamin;?>
              </strong>
              </div>
          </div>

          <div class="row">
            <div class="col-3" style="width:25%;">
                <strong> Agama 
                  <span class="pull-right" style="float:right;">:</span>
                </strong>
              </div>
              <div class="col-9" style="width:75%;">
              <strong> 
                <?= $agama;?>
              </strong>
              </div>
          </div>

          <div class="row">
            <div class="col-3" style="width:25%;">
                <strong> Alamat 
                  <span class="pull-right" style="float:right;">:</span>
                </strong>
              </div>
              <div class="col-9" style="width:75%;">
              <strong> 
                <?= $alamat;?>
              </strong>
              </div>
          </div>

          <div class="row">
            <div class="col-3" style="width:25%;">
                <strong> No. Telepon 
                  <span class="pull-right" style="float:right;">:</span>
                </strong>
              </div>
              <div class="col-9" style="width:75%;">
              <strong> 
                <?= $telp;?>
              </strong>
              </div>
          </div>

          <div class="row">
            <div class="col-3" style="width:25%;">
                <strong> Email 
                  <span class="pull-right" style="float:right;">:</span>
                </strong>
              </div>
              <div class="col-9" style="width:75%;">
              <strong> 
                <?= $email;?>
              </strong>
              </div>
          </div>

              
      
       </div>
      </div>
  </div>

<br>
<!-- Button trigger modal -->
<?php if ($profil):?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 20 20">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>    
Update Data
</button>
<?php else :?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 20 20">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                </svg>    
Tambah Data
</button>
<?php endif;?>
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <?php if($profil) :?>
          <h5 class="modal-title" id="staticBackdropLabel">Update Data Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <?php else :?>
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <?php endif;?>
      </div>
      <div class="modal-body">
      <form action="" method="post">
      
  			<div class="form-group">
    			<label for="nisn">NISN</label>
    			<input type="text" class="form-control" id="nisn" name="nisn" value=<?= $NISN;?> >
  			</div>

        <div class="form-group">
    			<label for="nama">Nama</label>
    			<input type="textarea" class="form-control" id="nama" name="nama" value="<?= $nama;?>">
  			</div>

        <div class="form-group">
    			<label for="tempat">Asal</label>
    			<input type="text" class="form-control" id="tempat" name="tempat" value="<?= $tempat;?>">
  			</div>

        <div class="form-group">
    			<label for="tanggal_lahir">Tanggal Lahir</label>
    			<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $tanggal_lahir;?>">
  			</div>

  			<div class="form-group">
			    <label for="jenis kelamin">Jenis Kelamin</label>
			    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" id="jenis_kelamin" name="jenis_kelamin">
          <?php if($profil):?>
              <option value="<?= $jenis_kelamin;?>"><?= $jenis_kelamin;?></option>
              <optgroup label = "---------------------">
          <?php endif;?>
            <option value="pria">pria</option>
            <option value="wanita">wanita</option>
             </select>
			  </div>

        <div class="form-group">
			    <label for="jenis kelamin">Agama</label>
			    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example id="agama" name="agama">
            <?php if($profil):?>
              <option value="<?= $agama;?>"><?= $agama;?></option>
              <optgroup label = "---------------------">
            <?php endif;?>
            <option value="Islam">Islam</option>
			      <option value="Kristen Protestan">Kristen Protestan</option>
            <option value="Kristen Katholik">Kristen Katholik</option>
            <option value="Hindu">Hindu</option>
            <option value="Budha">Budha</option>
            <option value="Kong Hu cu">Kong Hu cu</option>
            </optgroup>
          </select>
			  </div>

        <div class="form-group">
    			<label for="alamat">Alamat</label>
    			<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat;?>">
  			</div>

        <div class="form-group">
    			<label for="telepon">Telp</label>
    			<input type="text" class="form-control" id="telepon" name="telepon" value="<?= $telp;?>">
  			</div>

        <div class="form-group">
    			<label for="email">Email</label>
    			<input type="email" class="form-control" id="email" name="email" value="<?= $email;?>">
  			</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
        <?php if($profil):?>
          <button type="submit" name="ubah" class="btn btn-success">Update</button>
        <?php else:?>
        <button type="submit" name="submit" class="btn btn-success">Tambah</button>
        <?php endif;?>
      </form>
      </div>
    </div>
  </div>
</div>

<?php include_once '../templates/footer.php'?>
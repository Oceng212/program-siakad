<?php 
// get connection and header 
include_once '../database/koneksi.php';
include_once '../templates/header.php';

// get kelas, NISN, dan nama siswa 
$id = $_GET["id"];
$semester = $_GET["semester"];

// ambil data dari database berdasarkan id
$sql = mysqli_query($koneksi,"SELECT * FROM nilai_siswa WHERE id = '$id'");
while ($rows = mysqli_fetch_assoc($sql)){
  $NISN = $rows["NISN"];
  $mapel = $rows["mapel"];
  $nama = $rows["nama"];
  $kelas = $rows["kelas"];
  $harian = $rows["nilai_harian"];
  $uts = $rows["UTS"];
  $uas = $rows["UAS"];
  $absen = $rows["nilai_absen"];
  $sikap = $rows["nilai_sikap"];
  $keterampilan = $rows["keterampilan"];



}


// ubah data nilai ke database 
    if (isset($_POST["submit"])) {
      $nilai_harian = $_POST["harian"];
      $nilai_UTS = $_POST["UTS"];
      $nilai_UAS = $_POST["UAS"];
      $nilai_absensi = $_POST["absensi"];
      $nilai_sikap = $_POST["sikap"];
      $keterampilan = $_POST["keterampilan"];
      $pengetahuan = ((($nilai_harian + $nilai_absensi + $nilai_sikap)/3)*(4/10))+((3/10)*$nilai_UTS)+((3/10)*$nilai_UAS);

          $sql_ubah = "UPDATE nilai_siswa SET nilai_harian = '$nilai_harian', UTS = '$nilai_UTS', UAS = '$nilai_UAS', nilai_absen='$nilai_absensi', nilai_sikap='$nilai_sikap', keterampilan='$keterampilan', pengetahuan ='$pengetahuan' WHERE id ='$id'";
          $exec = mysqli_query($koneksi,$sql_ubah);
          if ($exec) {
            echo "<script>
              alert('Data Berhasil Diubah');
              document.location.href = 'nilai-siswa.php?kelas=$kelas&semester=$semester';
            </script>";
          } else {
            echo "<script>
              alert('Data Gagal Diubah');
              document.location.href = 'nilai-siswa.php?kelas=$kelas&semester=$semester';
            </script>";
          }
        }

 ?>

<div class="container mt-3">
	<h2 style="text-transform: capitalize;"> ubah nilai </h2> <br>
	<form action="" method="post">

  			<div class="form-group">
    			<label for="harian">Nilai Harian</label>
    			<input type="text" class="form-control" id="harian" name="harian" value="<?= $harian?>">
  			</div>

 			<div class="form-group">
    			<label for="UTS">UTS</label>
    			<input type="text" class="form-control" id="UTS" name="UTS" value="<?= $uts?>">
  			</div>

 			<div class="form-group">
    			<label for="UAS">UAS</label>
    			<input type="text" class="form-control" id="UAS" name="UAS" value="<?= $uas?>">
  			</div>

  			<div class="form-group">
    			<label for="absensi">Nilai Absensi</label>
    			<input type="text" class="form-control" id="absensi" name="absensi" value="<?= $absen?>">
  			</div>

  			<div class="form-group">
    			<label for="sikap">Nilai Sikap</label>
    			<input type="text" class="form-control" id="sikap" name="sikap" value="<?= $sikap?>">
  			</div>

        <div class="form-group">
          <label for="keterampilan">Nilai keterampilan</label>
          <input type="text" class="form-control" id="keterampilan" name="keterampilan" value="<?= $keterampilan?>">
        </div>

  			<br>

  			 <button type="submit" name="submit" class="btn btn-primary">Ubah</button>

	</form>
</div>




 <?php include_once '../templates/footer.php'; ?>
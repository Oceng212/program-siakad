<?php
// set database 
    include_once '../database/koneksi.php';
    include_once '../templates/header.php';

// set mapel yang diajarkan 
    $NIP = $_SESSION["nisn/nip"];
    $sql_mapel = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE NIP = '$NIP'");
    while($data = mysqli_fetch_assoc($sql_mapel)){
    	$mapel = $data["mapel"];
    }

// set database untuk siswa yang sudah ditentukan kelasnya dan semester 
    $kelas_utama = $_GET["kelas"];
    $semester = $_GET["semester"];
    $sql = "SELECT * FROM nilai_siswa WHERE kelas = '$kelas_utama' AND mapel ='$mapel'";
    $exec = mysqli_query($koneksi,$sql);



// simpan data nilai ke database 
    if (isset($_POST["submit"])) {
    	$kelas = $_POST["kelas"];
    	$nama_siswa = $_POST["nama"];
    	$pelajaran = $_POST["mapel"];
    	$nilai_harian = $_POST["harian"];
    	$nilai_UTS = $_POST["UTS"];
    	$nilai_UAS = $_POST["UAS"];
    	$nilai_absensi = $_POST["absensi"];
    	$nilai_sikap = $_POST["sikap"];
    	$keterampilan = $_POST["keterampilan"];
      $nilai_pengetahuan = ((($nilai_harian + $nilai_absensi + $nilai_sikap)/3)*(4/10))+((3/10)*$nilai_UTS)+((3/10)*$nilai_UAS);

    	// mengambil nisn di table kelas_siswa
		$sql_nama = mysqli_query($koneksi,"SELECT * FROM kelas_siswa WHERE nama ='$nama_siswa' AND kelas ='$kelas'");
		while ($data = mysqli_fetch_assoc($sql_nama)){
			$NISN = $data["NISN"];
		} 


    	// cek apakah data yang kosong atau tidak
    	if (!empty($NISN) && !empty($nama_siswa) && !empty($pelajaran) && !empty($nilai_harian) && !empty($nilai_UTS) && !empty($nilai_UAS) && !empty($nilai_absensi) && !empty($nilai_absensi) && !empty($keterampilan)){

    		//cek apakah data sudah ada atau belum 
    		$sql_cek = mysqli_query($koneksi,"SELECT * FROM nilai_siswa WHERE nama = '$nama_siswa' AND mapel = '$pelajaran'");
    		$result = mysqli_num_rows($sql_cek);

    		if ($result>0){
    			echo "<script>
    					alert('Data Sudah Ada !!');
    					document.location.href = 'nilai-siswa.php?kelas=$kelas';
    				</script>";
    		} else {

    			$sql_input = "INSERT INTO nilai_siswa VALUES ('','$pelajaran','$NISN','$nama_siswa','$kelas','$semester','$nilai_harian','$nilai_UTS','$nilai_UAS','$nilai_absensi','$nilai_sikap','$keterampilan','$nilai_pengetahuan')";
    			$exec = mysqli_query($koneksi,$sql_input);
    			if ($exec) {
    				echo "<script>
    					alert('Data Berhasil Ditambahkan');
    					document.location.href = 'nilai-siswa.php?kelas=$kelas&semester=$semester';
    				</script>";
    			} else {
    				echo "<script>
    					alert('Data Gagal Ditambahkan');
    					document.location.href = 'nilai-siswa.php?kelas=$kelas&semester=$semester';
    				</script>";
    			}
    		}



    	} else {
    		echo "<script>
    					alert('Lengkapi Data !!');
    					document.location.href = 'nilai-siswa.php?kelas=$kelas&semester=$semester';
    				</script>";
    	}
    }
?>

<!-- menampilkan data siswa kelas ... (menggunakan fungsi get dan patokan nama kelas) -->
<div class="col-12">
       <div class="row">
            <div class="col-3" style="width:25%;">
                <strong>  <h2 style="text-transform: capitalize;">Kelas <?= $kelas_utama; ?></h2>
                </strong>
				</div>
			<div class="col-9" style="width:75%; float:right;">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="float:right;">
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
					<th>NIP</th>
					<th>Nama</th>
					<th>Harian</th>
					<th>UTS</th>
					<th>UAS</th>
					<th>Absensi</th>
					<th>Sikap</th>
					<th>Keterampilan</th>
          <th>Pengetahuan</th>
					<th>Aksi</th>

				</tr>
			<form action="" method="post">
			<?php while($rows = mysqli_fetch_assoc($exec)):?>				
				<tr>
				<td><?= $rows["NISN"];?></td>
				<td><?= $rows["nama"];?></td>
				<td><?= $rows["nilai_harian"] ?></td>
				<td><?= $rows["UTS"] ?></td>
				<td><?= $rows["UAS"] ?></td>
				<td><?= $rows["nilai_absen"] ?></td>
				<td><?= $rows["nilai_sikap"] ?></td>
				<td><?= $rows["keterampilan"] ?></td>
        <td><?= $rows["pengetahuan"]?></td>
				<td>
					<div class="d-grid gap-2 d-md-block">
						<a class="btn btn-success btn-sm" href="tambah-raport.php?kelas=<?= $kelas_utama;?>&nisn=<?= $rows["NISN"]?>&nama=<?= $rows["nama"] ?>">Tambah</a>
  						<a class="btn btn-warning btn-sm" href="ubah-raport.php?id=<?= $rows["id"]?>&semester=<?= $semester ?>">Ubah</a>
					</div>
				</td>
				</tr>
			<?php endwhile;?>
			</table>
			
		</div>
	</div>

	<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<input type="hidden" name="mapel" value="<?= $mapel; ?>">

      	<input type="hidden" name="kelas" value="<?= $kelas_utama; ?>">

     
        <div class="form-group">
			    <label for="nama">Nama Siswa</label>
			    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" id="nama" name="nama">
			    <option value="-">-</option>
			    <?php 
			    	$sql_siswa = mysqli_query($koneksi,"SELECT * FROM kelas_siswa WHERE kelas ='$kelas_utama'");
			    	while ($siswa = mysqli_fetch_assoc($sql_siswa)):
			     ?>
			    <option value="<?= $siswa["nama"]; ?>"><?= $siswa["nama"]; ?></option>
			<?php endwhile; ?>
            </optgroup>
          </select>
			  </div>

  			<div class="form-group">
    			<label for="harian">Nilai Harian</label>
    			<input type="text" class="form-control" id="harian" name="harian">
  			</div>

 			<div class="form-group">
    			<label for="UTS">UTS</label>
    			<input type="text" class="form-control" id="UTS" name="UTS">
  			</div>

 			<div class="form-group">
    			<label for="UAS">UAS</label>
    			<input type="text" class="form-control" id="UAS" name="UAS">
  			</div>

  			<div class="form-group">
    			<label for="absensi">Nilai Absensi</label>
    			<input type="text" class="form-control" id="absensi" name="absensi">
  			</div>

  			<div class="form-group">
    			<label for="sikap">Nilai Sikap</label>
    			<input type="text" class="form-control" id="sikap" name="sikap">
  			</div>

  			<div class="form-group">
    			<label for="keterampilan">Nilai Keterampilan</label>
    			<input type="text" class="form-control" id="keterampilan" name="keterampilan">
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

<?php include_once '../templates/footer.php';?>
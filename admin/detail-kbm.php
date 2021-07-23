<?php 

// set koneksi dan header
include_once '../database/koneksi.php';
include_once '../templates/header.php';

//mengambil nama kelas di $_GET
$kelas = $_GET["kelas"];

// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){
	$kelas = $_POST["kelas"];
	$hari = $_POST["hari"];
    $jam = $_POST["jam"];
    $mapel = $_POST["mapel"];
    $pengajar = $_POST["pengajar"];

	$input = " INSERT INTO pelajaran VALUES
        ('','$kelas','$hari','$jam','$mapel','$pengajar')";

	$exec = mysqli_query($koneksi,$input);

	if($exec){
		echo "<script>
				alert('data berhasil Ditambahkan');
				document.location.href='detail-kbm.php?kelas=$kelas';
			 </script>";
	} else {
		echo "<script>
		alert('Data Gagal Ditambahkan');
		document.location.href='detail-kbm.php?kelas=$kelas';
	 	</script>";
	}

}


?>

<div class="col-12">
       <div class="row">
            <div class="col-3" style="width:25%;">
                <strong>  <h2>Jadwal KBM</h2>
                </strong>
				</div>
			<div class="col-9" style="width:75%; float:right;">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="float:right;">
				+ Tambah
				</button>
				</div>
              </div>
              </div>

<br>

<form action="" method="post">
<div class="container">
		<div class="row">
            <h4>--- Senin ---</h4>
            <?php 
            $sql1=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE kelas='$kelas' AND hari='Senin' ORDER BY jam ASC");?>
			<table style = "text-align:center;">
				<tr>
                    <th>Jam</th>
                    <th>Mata pelajaran</th>
                    <th>Pengajar</th>
                    <th>Opsi</th>
				</tr>
            <?php while($senin = mysqli_fetch_assoc($sql1)):?>
                <tr>
                    <td><?= $senin["jam"]?></td>
                    <td><?= $senin["mapel"]?></td>
                    <td><?= $senin["pengajar"]?></td>
                    <td><a href="hapus-kbm.php?id=<?= $senin["id"]?>&kelas=<?=$kelas ?>" style="color: white; text-decoration:none;" class="badge bg-danger float-right ml-1"
                    onclick = "return confirm('yakin?');">Hapus</a>
  					<a href="ubah-kbm.php?id=<?= $senin["id"]?>&kelas=<?=$kelas ?>" style="color: white; text-decoration:none;" class="badge bg-primary float-right ml-1">ubah</a></td>
				</tr>
            <?php endwhile;?>
			  			
            </table>

            <h4>--- Selasa ---</h4>
            <?php 
            $sql2=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE kelas='$kelas' AND hari='Selasa' ORDER BY jam ASC");?>
			<table style = "text-align:center;">
				<tr>
                    <th>Jam</th>
                    <th>Mata pelajaran</th>
                    <th>Pengajar</th>
                    <th>Opsi</th>
				</tr>
            <?php while($selasa = mysqli_fetch_assoc($sql2)):?>
                <tr>
                    <td><?= $selasa["jam"]?></td>
                    <td><?= $selasa["mapel"]?></td>
                    <td><?= $selasa["pengajar"]?></td>
                    <td><a href="hapus-kbm.php?id=<?= $selasa["id"]?>&kelas=<?=$kelas ?>" style="color: white; text-decoration:none;" class="badge bg-danger float-right ml-1"
                    onclick = "return confirm('yakin?');">Hapus</a>
  					<a href="ubah-kbm.php?id=<?= $selasa["id"]?>&kelas=<?=$kelas ?>" style="color: white; text-decoration:none;" class="badge bg-primary float-right ml-1">ubah</a></td>
				</tr>
            <?php endwhile;?>
			  			
            </table>

            <h4>--- Rabu ---</h4>
            <?php 
            $sql3=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE kelas='$kelas' AND hari='Rabu' ORDER BY jam ASC");?>
            <table style = "text-align:center;">
                <tr>
                    <th>Jam</th>
                    <th>Mata pelajaran</th>
                    <th>Pengajar</th>
                    <th>Opsi</th>
                </tr>
            <?php while($rabu = mysqli_fetch_assoc($sql3)):?>
                <tr>
                    <td><?= $rabu["jam"]?></td>
                    <td><?= $rabu["mapel"]?></td>
                    <td><?= $rabu["pengajar"]?></td>
                    <td><a href="hapus-kbm.php?id=<?= $rabu["id"]?>&kelas=<?=$kelas ?>" style="color: white; text-decoration:none;" class="badge bg-danger float-right ml-1"
                    onclick = "return confirm('yakin?');">Hapus</a>
                    <a href="ubah-kbm.php?id=<?= $rabu["id"]?>&kelas=<?=$kelas ?>" style="color: white; text-decoration:none;" class="badge bg-primary float-right ml-1">ubah</a></td>
                </tr>
            <?php endwhile;?>
                        
            </table>

            <h4>--- Kamis ---</h4>
            <?php 
            $sql4=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE kelas='$kelas' AND hari='Kamis' ORDER BY jam ASC");?>
            <table style = "text-align:center;">
                <tr>
                    <th>Jam</th>
                    <th>Mata pelajaran</th>
                    <th>Pengajar</th>
                    <th>Opsi</th>
                </tr>
            <?php while($kamis = mysqli_fetch_assoc($sql4)):?>
                <tr>
                    <td><?= $kamis["jam"]?></td>
                    <td><?= $kamis["mapel"]?></td>
                    <td><?= $kamis["pengajar"]?></td>
                    <td><a href="hapus-kbm.php?id=<?= $kamis["id"]?>&kelas=<?=$kelas ?>" style="color: white; text-decoration:none;" class="badge bg-danger float-right ml-1"
                    onclick = "return confirm('yakin?');">Hapus</a>
                    <a href="ubah-kbm.php?id=<?= $kamis["id"]?>&kelas=<?=$kelas ?>" style="color: white; text-decoration:none;" class="badge bg-primary float-right ml-1">ubah</a></td>
                </tr>
            <?php endwhile;?>
                        
            </table>

            <h4>--- Jumat ---</h4>
            <?php 
            $sql5=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE kelas='$kelas' AND hari='Jumat' ORDER BY jam ASC");?>
            <table style = "text-align:center;">
                <tr>
                    <th>Jam</th>
                    <th>Mata pelajaran</th>
                    <th>Pengajar</th>
                    <th>Opsi</th>
                </tr>
            <?php while($jumat = mysqli_fetch_assoc($sql5)):?>
                <tr>
                    <td><?= $jumat["jam"]?></td>
                    <td><?= $jumat["mapel"]?></td>
                    <td><?= $jumat["pengajar"]?></td>
                    <td><a href="hapus-kbm.php?id=<?= $jumat["id"]?>&kelas=<?=$kelas ?>" style="color: white; text-decoration:none;" class="badge bg-danger float-right ml-1"
                    onclick = "return confirm('yakin?');">Hapus</a>
                    <a href="ubah-kbm.php?id=<?= $jumat["id"]?>&kelas=<?=$kelas ?>" style="color: white; text-decoration:none;" class="badge bg-primary float-right ml-1">ubah</a></td>
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
          <h5 class="modal-title" id="staticBackdropLabel">Tambah KBM</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <input type="hidden" class="form-control" id="kelas" name="kelas" value="<?= $kelas;?>">
     
      <div class="form-group">
		<label for="mapel">mapel</label>
		  <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" id="mapel" name="mapel">
                <option value="-">-</option>
				<option value="Bahasa Indonesia">Bahasa Indonesia</option>
			    <option value="Bahasa Inggris">Bahasa Inggris</option>
				<option value="Penjasorkes">Penjasorkes</option>
			 	<option value="Seni Budaya">Seni Budaya</option>
				<option value="Matematika">Matematika</option>
				<option value="Fisika">Fisika</option>
				<option value="Kimia">Kimia</option>
				<option value="Biologi">Biologi</option>
				<option value="Agama">Agama</option>
				<option value="Ekonomi">Ekonomi</option>
				<option value="Sosiologi">Sosiologi</option>
				<option value="Sejarah">Sejarah</option>
          </select>
	  </div>

              <div class="form-group">
			    <label for="hari">Hari</label>
			    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" id="hari" name="hari">
			    <option value="-">-</option>
			    <option value="Senin">Senin</option>
				<option value="Selasa">Selasa</option>
			 	<option value="Rabu">Rabu</option>
				<option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                </optgroup>
                </select>
			  </div>

              <div class="form-group">
			    <label for="pengajar">Pengajar</label>
			    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" id="pengajar" name="pengajar">
				<option value="-">---(Silahkan Pilih Guru)---</option>
                <!-- mengelompokkan para guru berdasarkan mapel -->

                <!-- penjasorkes -->
                        <?php 
                        $sql_penjas = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Penjasorkes'");
                        while($penjas = mysqli_fetch_assoc($sql_penjas)):
                        ?>
                        <optgroup label = "Guru Penjasorkes">
                        <option value="<?= $penjas["nama"];?>"><?= $penjas["nama"];?></option>
                        <optgroup label = "---------------------">
                        <?php endwhile;?>
                <!-- Matematika -->
                        <?php 
                        $sql_mtk = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Matematika'");
                        while($mtk = mysqli_fetch_assoc($sql_mtk)):
                        ?>
                        <optgroup label = "Guru Matematika">
                        <option value="<?= $mtk["nama"];?>"><?= $mtk["nama"];?></option>
                        <optgroup label = "---------------------">
                        <?php endwhile;?>
                <!-- Bahasa Indonesia -->
                        <?php 
                        $sql_indo = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Bahasa Indonesia'");
                        while($indo = mysqli_fetch_assoc($sql_indo)):
                        ?>
                        <optgroup label = "Bahasa Indonesia">
                        <option value="<?= $indo["nama"];?>"><?= $indo["nama"];?></option>
                        <optgroup label = "---------------------">
                        <?php endwhile;?>
                <!-- Bahasa Inggris -->
                        <?php 
                        $sql_Inggris = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Bahasa Inggris'");
                        while($Inggris = mysqli_fetch_assoc($sql_Inggris)):
                        ?>
                        <optgroup label = "Bahasa Inggris">
                        <option value="<?= $Inggris["nama"];?>"><?= $Inggris["nama"];?></option>
                        <optgroup label = "---------------------">
                        <?php endwhile;?>
                <!-- Seni Budaya -->
                        <?php 
                        $sql_senbud = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Seni Budaya'");
                        while($senbud = mysqli_fetch_assoc($sql_senbud)):
                        ?>
                        <optgroup label = "Seni Budaya">
                        <option value="<?= $senbud["nama"];?>"><?= $senbud["nama"];?></option>
                        <optgroup label = "---------------------">
                        <?php endwhile;?>
                <!-- Fisika -->
                        <?php 
                        $sql_fisika = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Fisika'");
                        while($fisika = mysqli_fetch_assoc($sql_fisika)):
                        ?>
                        <optgroup label = "Fisika">
                        <option value="<?= $fisika["nama"];?>"><?= $fisika["nama"];?></option>
                        <optgroup label = "---------------------">
                        <?php endwhile;?>
                <!-- Kimia -->
                        <?php 
                        $sql_Kimia = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Kimia'");
                        while($Kimia = mysqli_fetch_assoc($sql_Kimia)):
                        ?>
                        <optgroup label = "Kimia">
                        <option value="<?= $Kimia["nama"];?>"><?= $Kimia["nama"];?></option>
                        <optgroup label = "---------------------">
                        <?php endwhile;?>
                <!-- Biologi -->
                        <?php 
                        $sql_Biologi = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Biologi'");
                        while($Biologi = mysqli_fetch_assoc($sql_Biologi)):
                        ?>
                        <optgroup label = "Biologi">
                        <option value="<?= $Biologi["nama"];?>"><?= $Biologi["nama"];?></option>
                        <optgroup label = "---------------------">
                        <?php endwhile;?>
                <!-- Agama -->
                        <?php 
                        $sql_Agama = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Agama'");
                        while($Agama = mysqli_fetch_assoc($sql_Agama)):
                        ?>
                        <optgroup label = "Agama">
                        <option value="<?= $Agama["nama"];?>"><?= $Agama["nama"];?></option>
                        <optgroup label = "---------------------">
                        <?php endwhile;?>
                <!-- Ekonomi -->
                        <?php 
                        $sql_Ekonomi = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Ekonomi'");
                        while($Ekonomi = mysqli_fetch_assoc($sql_Ekonomi)):
                        ?>
                        <optgroup label = "Ekonomi">
                        <option value="<?= $Ekonomi["nama"];?>"><?= $Ekonomi["nama"];?></option>
                        <optgroup label = "---------------------">
                        <?php endwhile;?>
                <!-- Sosiologi -->
                        <?php 
                        $sql_Sosiologi = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Sosiologi'");
                        while($Sosiologi = mysqli_fetch_assoc($sql_Sosiologi)):
                        ?>
                        <optgroup label = "Sosiologi">
                        <option value="<?= $Sosiologi["nama"];?>"><?= $Sosiologi["nama"];?></option>
                        <optgroup label = "---------------------">
                        <?php endwhile;?>
                <!-- Sejarah -->
                        <?php 
                        $sql_Sejarah = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Sejarah'");
                        while($Sejarah = mysqli_fetch_assoc($sql_Sejarah)):
                        ?>
                        <optgroup label = "Sejarah">
                        <option value="<?= $Sejarah["nama"];?>"><?= $Sejarah["nama"];?></option>
                        <optgroup label = "---------------------">
                        <?php endwhile;?>

                </optgroup>
          </select>
			  </div>

              <div class="form-group">
			    <label for="jam">Jam</label>
			    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" id="jam" name="jam">
			    <option value="-">-</option>
                <option value="7:00-7:45">7:00-7:45</option>
			    <option value="7:45-8:30">7:45-8:30</option>
                <option value="8:30-9:15">8:30-9:15</option>
                <option value="9:15-10:00">9:15-10:00</option>
                <option value="10:15-11:00">10:15-11:00</option>
                <option value="11:00-11:45">11:00-11:45</option>
                <option value="12:30-13:15">12:30-13:15</option>
                <option value="13:15-14:00">13:15-14:00</option>
                <option value="14:00-14:45">14:00-14:45</option>
                <option value="14:45-15:30">14:45-15:30</option>
                
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
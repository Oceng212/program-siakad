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
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 20 20">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                </svg>
                Tambah
				</button>
				</div>
              </div>
              </div>

<br>

<form action="" method="post">
<div class="container" style="width: 800px;">
		<div class="row">
            <h4>--- Senin ---</h4>
            <?php 
            $sql1=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE kelas='$kelas' AND hari='Senin' ORDER BY id ASC");?>
			<table class="table table-borderless" style = "text-align:center;">
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
                    <td><a href="hapus-kbm.php?id=<?= $senin["id"]?>&kelas=<?=$kelas ?>" style="color: white; text-decoration:none;" class="btn btn-danger btn-sm float-right ml-1"onclick = "return confirm('yakin?');">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 20 20">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                    Hapus</a>
  					<a href="ubah-kbm.php?id=<?= $senin["id"]?>&kelas=<?=$kelas ?>" style="color: white; text-decoration:none;" class="btn btn-primary btn-sm float-right ml-1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 20 20">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>  
                    ubah</a></td>
				</tr>
            <?php endwhile;?>
			  			
            </table>

            <h4>--- Selasa ---</h4>
            <?php 
            $sql2=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE kelas='$kelas' AND hari='Selasa' ORDER BY id ASC");?>
			<table class="table table-borderless" style = "text-align:center;">
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
                    <td><a href="hapus-kbm.php?id=<?= $selasa["id"]?>&kelas=<?=$kelas ?>" style="color: white; text-decoration:none;" class="btn btn-danger btn-sm float-right ml-1"onclick = "return confirm('yakin?');">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 20 20">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                    Hapus</a>
                    <a href="ubah-kbm.php?id=<?= $selasa["id"]?>&kelas=<?=$kelas ?>" style="color: white; text-decoration:none;" class="btn btn-primary btn-sm float-right ml-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 20 20">
				<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
				<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
				</svg>
                    ubah</a></td>
				</tr>
            <?php endwhile;?>
			  			
            </table>

            <h4>--- Rabu ---</h4>
            <?php 
            $sql3=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE kelas='$kelas' AND hari='Rabu' ORDER BY id ASC");?>
            <table class="table table-borderless" style = "text-align:center;">
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
                    <td><a href="hapus-kbm.php?id=<?= $rabu["id"]?>&kelas=<?=$kelas ?>" style="color: white; text-decoration:none;" class="btn btn-danger btn-sm float-right ml-1" onclick = "return confirm('yakin?');">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 20 20">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                    Hapus</a>
                    <a href="ubah-kbm.php?id=<?= $rabu["id"]?>&kelas=<?=$kelas ?>" style="color: white; text-decoration:none;" class="btn btn-primary btn-sm float-right ml-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 20 20">
				<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
				<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
				</svg>
                    ubah</a></td>
                </tr>
            <?php endwhile;?>
                        
            </table>

            <h4>--- Kamis ---</h4>
            <?php 
            $sql4=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE kelas='$kelas' AND hari='Kamis' ORDER BY id ASC");?>
            <table class="table table-borderless" style = "text-align:center;">
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
                    <td><a href="hapus-kbm.php?id=<?= $kamis["id"]?>&kelas=<?=$kelas ?>" style="color: white; text-decoration:none;" class="btn btn-danger btn-sm float-right ml-1" onclick = "return confirm('yakin?');">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 20 20">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                    Hapus</a>
                    <a href="ubah-kbm.php?id=<?= $kamis["id"]?>&kelas=<?=$kelas ?>" style="color: white; text-decoration:none;" class="btn btn-primary btn-sm float-right ml-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 20 20">
				<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
				<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
				</svg>
                    ubah</a></td>
                </tr>
            <?php endwhile;?>
                        
            </table>

            <h4>--- Jumat ---</h4>
            <?php 
            $sql5=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE kelas='$kelas' AND hari='Jumat' ORDER BY id ASC");?>
            <table class="table table-borderless" style = "text-align:center;">
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
                    <td><a href="hapus-kbm.php?id=<?= $jumat["id"]?>&kelas=<?=$kelas?>" style="color: white; text-decoration:none;" class="btn btn-danger btn-sm float-right ml-1" onclick = "return confirm('yakin?');">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 20 20">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                    Hapus</a>
                    <a href="ubah-kbm.php?id=<?= $jumat["id"]?>&kelas=<?=$kelas ?>" style="color: white; text-decoration:none;" class="btn btn-primary btn-sm float-right ml-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 20 20">
				<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
				<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
				</svg>
                    ubah</a></td>
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
                        <optgroup label = "Guru Penjasorkes">
                        <?php 
                        $sql_penjas = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Penjasorkes'");
                        while($penjas = mysqli_fetch_assoc($sql_penjas)):
                        ?>
                        <option value="<?= $penjas["nama"];?>"><?= $penjas["nama"];?></option>
                        <?php endwhile;?>
                        <optgroup label = "---------------------">
                        
                <!-- Matematika -->
                        <optgroup label = "Guru Matematika">
                        <?php 
                        $sql_mtk = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Matematika'");
                        while($mtk = mysqli_fetch_assoc($sql_mtk)):
                        ?>
                        <option value="<?= $mtk["nama"];?>"><?= $mtk["nama"];?></option>
                        <?php endwhile;?>
                        <optgroup label = "---------------------">
                        
                <!-- Bahasa Indonesia -->
                        <optgroup label = "Bahasa Indonesia">
                        <?php 
                        $sql_indo = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Bahasa Indonesia'");
                        while($indo = mysqli_fetch_assoc($sql_indo)):
                        ?>
                        <option value="<?= $indo["nama"];?>"><?= $indo["nama"];?></option>
                        <?php endwhile;?>
                        <optgroup label = "---------------------">
                        
                <!-- Bahasa Inggris -->
                        <optgroup label = "Bahasa Inggris">
                        <?php 
                        $sql_Inggris = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Bahasa Inggris'");
                        while($Inggris = mysqli_fetch_assoc($sql_Inggris)):
                        ?>
                        <option value="<?= $Inggris["nama"];?>"><?= $Inggris["nama"];?></option>
                        <?php endwhile;?>
                        <optgroup label = "---------------------">
                        
                <!-- Seni Budaya -->
                        <optgroup label = "Seni Budaya">
                        <?php 
                        $sql_senbud = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Seni Budaya'");
                        while($senbud = mysqli_fetch_assoc($sql_senbud)):
                        ?>
                        <option value="<?= $senbud["nama"];?>"><?= $senbud["nama"];?></option>
                        <?php endwhile;?>
                        <optgroup label = "---------------------">
                        
                <!-- Fisika -->
                        <optgroup label = "Fisika">
                        <?php 
                        $sql_fisika = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Fisika'");
                        while($fisika = mysqli_fetch_assoc($sql_fisika)):
                        ?>
                        <option value="<?= $fisika["nama"];?>"><?= $fisika["nama"];?></option>
                        <?php endwhile;?>
                        <optgroup label = "---------------------">
                        
                <!-- Kimia -->
                        <optgroup label = "Kimia">
                        <?php 
                        $sql_Kimia = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Kimia'");
                        while($Kimia = mysqli_fetch_assoc($sql_Kimia)):
                        ?>
                        <option value="<?= $Kimia["nama"];?>"><?= $Kimia["nama"];?></option>
                        <?php endwhile;?>
                        <optgroup label = "---------------------">
                        
                <!-- Biologi -->
                        <optgroup label = "Biologi">
                        <?php 
                        $sql_Biologi = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Biologi'");
                        while($Biologi = mysqli_fetch_assoc($sql_Biologi)):
                        ?>
                        <option value="<?= $Biologi["nama"];?>"><?= $Biologi["nama"];?></option>
                        <?php endwhile;?>
                        <optgroup label = "---------------------">
                        
                <!-- Agama -->
                        <optgroup label = "Agama">
                        <?php 
                        $sql_Agama = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Agama'");
                        while($Agama = mysqli_fetch_assoc($sql_Agama)):
                        ?>
                        <option value="<?= $Agama["nama"];?>"><?= $Agama["nama"];?></option>
                        <?php endwhile;?>
                        <optgroup label = "---------------------">
                        
                <!-- Ekonomi -->
                        <optgroup label = "Ekonomi">
                        <?php 
                        $sql_Ekonomi = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Ekonomi'");
                        while($Ekonomi = mysqli_fetch_assoc($sql_Ekonomi)):
                        ?>
                        <option value="<?= $Ekonomi["nama"];?>"><?= $Ekonomi["nama"];?></option>
                        <?php endwhile;?>
                        <optgroup label = "---------------------">
                        
                <!-- Sosiologi -->
                        <optgroup label = "Sosiologi">
                        <?php 
                        $sql_Sosiologi = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Sosiologi'");
                        while($Sosiologi = mysqli_fetch_assoc($sql_Sosiologi)):
                        ?>
                        <option value="<?= $Sosiologi["nama"];?>"><?= $Sosiologi["nama"];?></option>
                        <?php endwhile;?>
                        <optgroup label = "---------------------">
                        
                <!-- Sejarah -->
                        <optgroup label = "Sejarah">
                        <?php 
                        $sql_Sejarah = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE mapel='Sejarah'");
                        while($Sejarah = mysqli_fetch_assoc($sql_Sejarah)):
                        ?>
                        <option value="<?= $Sejarah["nama"];?>"><?= $Sejarah["nama"];?></option>
                        <?php endwhile;?>
                        <optgroup label = "---------------------">
                        

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
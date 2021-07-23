<?php 
// get connection and header 
include_once '../database/koneksi.php';
include_once '../templates/header.php';

// tangkap data id yang ditangkap menggunakan fungsi get
$id = $_GET["id"];

// ambil data dari database menggunakan acuan id 
$sql = mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE id = '$id'");
while ($rows = mysqli_fetch_assoc($sql)){
  $kelas = $rows["kelas"];
  $hari = $rows["hari"];
  $jam = $rows["jam"];
  $mapel = $rows["mapel"];
  $pengajar = $rows["pengajar"];
}

// update data akun
if(isset($_POST["ubah"])){
        $kelas = $_POST["kelas"];
	    $hari = $_POST["hari"];
        $jam = $_POST["jam"];
        $mapel = $_POST["mapel"];
        $pengajar = $_POST["pengajar"];

	$ubah = "UPDATE pelajaran SET 
            kelas = '$kelas',
            hari = '$hari',
            jam = '$jam',
            mapel = '$mapel',
            pengajar = '$pengajar'
            WHERE id = '$id'
    
    ";

	$exec = mysqli_query($koneksi,$ubah);

	if($exec){
		echo "<script>
				alert('data berhasil Diubah');
				document.location.href='detail-kbm.php?kelas=$kelas';
			 </script>";
	} else {
		echo "<script>
		alert('Data Gagal Diubah');
		document.location.href='detail-kbm.php?kelas=$kelas';
	 	</script>";
	}
}




 ?>

<div class="container mt-3">
	<h2 style="text-transform: capitalize;"> ubah nilai </h2> <br>
	<form action="" method="post">
		      
    <input type="hidden" class="form-control" id="kelas" name="kelas" value="<?= $kelas;?>">
     
     <div class="form-group">
       <label for="mapel">mapel</label>
         <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" id="mapel" name="mapel">
                <option value="<?= $mapel?>"><?= $mapel?></option>
               <option value="">-</option>
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
               <option value="<?= $hari?>"><?= $hari?></option>
               <option value="">-</option>
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
               <option value="<?= $pengajar?>"><?= $pengajar?></option>
               <option value="">---(Silahkan Pilih Guru)---</option>
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
               <option value="<?= $jam?>"><?= $jam?></option>
               <option value="">-</option>
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
     <br>
     <div class="modal-footer">
     <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
        </div>

	</form>
</div>




 <?php include_once '../templates/footer.php'; ?>
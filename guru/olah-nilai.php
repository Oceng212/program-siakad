<?php 

include_once '../database/koneksi.php';
include_once '../templates/header.php';

$sql = "SELECT * FROM data_kelas";
$exec = mysqli_query($koneksi,$sql);

// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["ubah"])){
    
	$walikelas = $_POST["walikelas"];

	$data = $_POST["data"];
	$data = implode(",",$data);

	$ubah_kelas = "UPDATE data_kelas SET 
			walikelas = '$walikelas'
			WHERE id IN ($data)
	";

	$exec_kelas = mysqli_query($koneksi,$ubah_kelas);

	if($exec_kelas){
		echo "<script>
				alert('data berhasil di ubah');
				document.location.href='data-kelas.php';
			 </script>";
	} else {
		echo "<script>
		alert('Harap Pilih Data yang akan diubah, Ubah Data Gagal');
		document.location.href='data-kelas.php';
	 	</script>";
	}

}

?>
<div class="col-12">
       <div class="row">
            <div class="col-3" style="width:25%;">
                <strong>  <h2>Penilaian Siswa</h2>
                </strong>
				</div>
               
              </div>
              </div>

<br>

<div class="container">
	<h6 style="color:red;">*) Pilih Sesuai Kelas yang Diajar</h6>
 <div class="row">
 	<?php while($rows = mysqli_fetch_assoc($exec)):?>
      <div class="col-md mt-3">
        <div class="card" style="width: 18rem;">
          <div class="card-body" style="text-align:center;">
            <h5 class="card-title text-center" style="text-transform: uppercase;"><?= $rows["kelas"] ?></h5>
            <p class="card-text" style="text-transform: capitalize;"><?= $rows["walikelas"] ?></p>
            <div class="d-grid gap-2 col-6 mx-auto" style="width:100%;">
            <a href="nilai-siswa.php?kelas=<?= $rows["kelas"];?>&semester=ganjil" style="color: white; text-decoration:none;" class="btn btn-success">Ganjil</a>
             <a href="nilai-siswa.php?kelas=<?= $rows["kelas"];?>&semester=genap" style="color: white; text-decoration:none;" class="btn btn-success">Genap</a>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
</div>
</div>


<?php include_once '../templates/footer.php';?>
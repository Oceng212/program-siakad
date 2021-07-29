<?php 
include_once '../database/koneksi.php';
include_once '../templates/header.php';

// mengambil data siswa yang bersangkutan  
$NISN = $_SESSION["nisn/nip"];
$semester = $_GET["semester"];
$indexKelas = $_GET["kelas"];
$sql = "SELECT * FROM nilai_siswa WHERE NISN = '$NISN' AND kelas LIKE '%".$indexKelas."%'";
$exec = mysqli_query($koneksi,$sql);
$result = mysqli_num_rows($exec);
if ($result>0){
  while ($rows = mysqli_fetch_assoc($exec)) {
    $nama = $rows["nama"];
    $kelas = $rows["kelas"];
  }

  // mengambil data kelas 
  $sql_kelas = mysqli_query($koneksi,"SELECT * FROM data_kelas WHERE kelas = '$kelas'");
  while ($data_kelas = mysqli_fetch_assoc($sql_kelas)){
	$walikelas = $data_kelas["walikelas"];
  }

  //mengambil data nilai siswa
  $data = "SELECT * FROM nilai_siswa WHERE NISN = '$NISN' AND kelas ='$kelas' AND semester ='$semester'";
  $exec_data = mysqli_query($koneksi,$data);


} else {
  echo "<script> 
    alert('Data tidak ditemukan ! Silahkan hubungi Admin');
    document.location.href = 'raport-index.php';
  </script>";
}




?>

<div class="col-12">
       <div class="row">
            <div class="col-3" style="width:100%;">
                <strong>  
                    <h2 style="text-transform: uppercase; text-align:center;">e - raport</h2>
                </strong>
			</div>
        </div>
</div>

<div class="container mt-3">
		<div class="row">
            <div class="col-3" style="width:15%;">
                <p> NISN
                  <span class="pull-right" style="float:right;">:</span>
                </p>
            </div>
            <div class="col-9" style="width:50%;">
              <p> <?= $NISN;?></p>
			</div>
			<div class="col-3" style="width:15%;">
              <p> Kelas 
			  	<span class="pull-right" style="float:right;">:</span>
			  </p>
            </div>
			<div class="col-9" style="width:20%;">
              <p> <?= $kelas;?> </p>
            </div>

        </div>

		<div class="row">
            <div class="col-3" style="width:15%;">
                <p> Nama
                  <span class="pull-right" style="float:right;">:</span>
                </p>
              </div>
            <div class="col-9" style="width:50%;">
              <p> 
                <?= $nama;?>
              </p>
            </div>
			<div class="col-3" style="width:15%;">
                <p> Walikelas
                  <span class="pull-right" style="float:right;">:</span>
                </p>
            </div>
			<div class="col-9" style="width:20%;">
              <p> 
                <?= $walikelas;?>
              </p>
            </div>
			
        </div>

</div>

<div class="container mt-3">
	<div class="row">
		<table class="table table-borderless" style="text-align: center;">
			<tr>
				<th>Mata Pelajaran </th>
				<th>Pengetahuan</th>
				<th>Keterampilan</th>
			</tr>
      <?php while ($raport = mysqli_fetch_assoc($exec_data)): ?>
      <tr>
        <td><?= $raport["mapel"]?></td>
        <td><?= $raport["pengetahuan"]?></td>
        <td><?= $raport["keterampilan"]?></td>
      </tr>
    <?php endwhile; ?>
		</table>
	</div>
   <a href="cetak-raport.php?nisn=<?= $NISN ?>&semester=ganjil" class="btn btn-primary">Cetak</a>
</div>


<?php include_once '../templates/footer.php';?>
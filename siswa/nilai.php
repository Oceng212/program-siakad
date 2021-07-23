<?php 
include_once '../database/koneksi.php';
include_once '../templates/header.php';

// get data siswa yang bersangkutan  
$NISN = $_SESSION["nisn/nip"];
$sql = "SELECT * FROM nilai_siswa WHERE NISN = '$NISN'";

?>

<div class="col-12">
       <div class="row">
            <div class="col-3" style="width:50%;">
                <strong>  
                    <h2 style="text-transform: uppercase;">Nilai</h2>
                </strong>
			</div>
        </div>
</div>

<h4>
	Nama :  <br>
	Kelas :
</h4>


<div class="container mt-3">
	<div class="row">
		<table style="text-align: center;">
			<tr>
				<th>Mata Pelajaran </th>
				<th>Pengetahuan</th>
				<th>Keterampilan</th>
			</tr>
		</table>
	</div>
</div>


<?php include_once '../templates/footer.php';?>
<?php 

// set koneksi dan header
include_once '../database/koneksi.php';
include_once '../templates/header.php';

//mengambil NIP di $_SESSION
$nip = $_SESSION["nisn/nip"];

//mengambil data nama berdasarkan NIP 
$sql = mysqli_query($koneksi,"SELECT * FROM jabatan_guru WHERE NIP = '$nip'");
while ($guru = mysqli_fetch_assoc($sql)){
    $nama = $guru["nama"];
} 


?>

<div class="col-12">
       <div class="row">
            <div class="col-3" style="width:100%;">
                <strong>  <h2 style="text-align: center;">Jadwal KBM</h2>
                </strong>
				</div>
              </div>
              </div>

<br>

<form action="" method="post">
<div class="container">
		<div class="row">
            <h4>--- Senin ---</h4>
            <?php 
            $sql1=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE pengajar = '$nama' AND hari='Senin' ORDER BY jam ASC");?>
			<table style = "text-align:center;">
				<tr>
                    <th>Jam</th>
                    <th>Mata pelajaran</th>
                    <th>Kelas</th>
				</tr>
            <?php while($senin = mysqli_fetch_assoc($sql1)):?>
                <tr>
                    <td><?= $senin["jam"]?></td>
                    <td><?= $senin["mapel"]?></td>
                    <td><?= $senin["kelas"]?></td>
				</tr>
            <?php endwhile;?>
			  			
            </table>

            <h4>--- Selasa ---</h4>
            <?php 
            $sql2=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE pengajar = '$nama' AND hari='Selasa' ORDER BY jam ASC");?>
			<table style = "text-align:center;">
				<tr>
                    <th>Jam</th>
                    <th>Mata pelajaran</th>
                    <th>Kelas</th>
				</tr>
            <?php while($selasa = mysqli_fetch_assoc($sql2)):?>
                <tr>
                    <td><?= $selasa["jam"]?></td>
                    <td><?= $selasa["mapel"]?></td>
                    <td><?= $selasa["kelas"]?></td>
				</tr>
            <?php endwhile;?>
			  			
            </table>

            <h4>--- Rabu ---</h4>
            <?php 
            $sql3=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE pengajar = '$nama' AND hari='Rabu' ORDER BY jam ASC");?>
            <table style = "text-align:center;">
                <tr>
                    <th>Jam</th>
                    <th>Mata pelajaran</th>
                    <th>Kelas</th>
                </tr>
            <?php while($rabu = mysqli_fetch_assoc($sql3)):?>
                <tr>
                    <td><?= $rabu["jam"]?></td>
                    <td><?= $rabu["mapel"]?></td>
                    <td><?= $rabu["kelas"]?></td>
                </tr>
            <?php endwhile;?>
                        
            </table>

            <h4>--- Kamis ---</h4>
            <?php 
            $sql4=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE pengajar = '$nama' AND hari='Kamis' ORDER BY jam ASC");?>
            <table style = "text-align:center;">
                <tr>
                    <th>Jam</th>
                    <th>Mata pelajaran</th>
                    <th>Kelas</th>
                </tr>
            <?php while($kamis = mysqli_fetch_assoc($sql4)):?>
                <tr>
                    <td><?= $kamis["jam"]?></td>
                    <td><?= $kamis["mapel"]?></td>
                    <td><?= $kamis["kelas"]?></td>
                </tr>
            <?php endwhile;?>
                        
            </table>

            <h4>--- Jumat ---</h4>
            <?php 
            $sql5=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE pengajar = '$nama' AND hari='Jumat'ORDER BY jam ASC");?>
            <table style = "text-align:center;">
                <tr>
                    <th>Jam</th>
                    <th>Mata pelajaran</th>
                    <th>Kelas</th>
                </tr>
            <?php while($jumat = mysqli_fetch_assoc($sql5)):?>
                <tr>
                    <td><?= $jumat["jam"]?></td>
                    <td><?= $jumat["mapel"]?></td>
                    <td><?= $jumat["kelas"]?></td>
                </tr>
            <?php endwhile;?>
                        
            </table>
		</div>
	</div>

<?php include_once '../templates/footer.php'?>
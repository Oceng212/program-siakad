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
            <div class="col-3" style="width:25%;">
                <strong> <h2 style="text-transform: uppercase;">jadwal kbm</h2>
                </strong>
				</div>
			<div class="col-9" style="width:75%; float:right;">
            <a href="cetak-kbm.php?nip=<?= $nip?>" style="color: white; text-decoration:none; float: right; margin-right: 5px;" class="btn btn-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-printer" viewBox="0 0 20 20">
        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
        </svg>
        Print Jadwal</a>
				</div>
              </div>
              </div>

<div class="container">

		<div class="row mt-4">
            <?php 
            $sql1=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE pengajar = '$nama' AND hari='Senin' ORDER BY jam ASC");?>
			<table class="table table-borderless" style="text-align: center;">
                <tr class="table-primary">
                    <td></td>
                    <td> <h4>--- Senin ---</h4> </td>
                    <td></td>    
                </tr>

				<tr>
                    <th class="col-3">Jam</th>
                    <th scope="col">Mata pelajaran</th>
                    <th scope="col">Kelas</th>
				</tr>
            <?php while($senin = mysqli_fetch_assoc($sql1)):?>
                <tr>
                    <td><?= $senin["jam"]?></td>
                    <td><?= $senin["mapel"]?></td>
                    <td><?= $senin["kelas"]?></td>
				</tr>
            <?php endwhile;?>
            

            
            <?php 
            $sql2=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE pengajar = '$nama' AND hari='Selasa' ORDER BY jam ASC");?>
			     <tr class="table-success">
                    <td></td>
                    <td> <h4>--- Selasa ---</h4> </td>
                    <td></td>    
                </tr>

				<tr>
                    <th scope="col">Jam</th>
                    <th scope="col">Mata pelajaran</th>
                    <th scope="col">Kelas</th>
                </tr>
            <?php while($selasa = mysqli_fetch_assoc($sql2)):?>
                <tr>
                    <td><?= $selasa["jam"]?></td>
                    <td><?= $selasa["mapel"]?></td>
                    <td><?= $selasa["kelas"]?></td>
				</tr>
            <?php endwhile;?>
			  			

            
            <?php 
            $sql3=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE pengajar = '$nama' AND hari='Rabu' ORDER BY jam ASC");?>
                <tr class="table-danger">
                    <td></td>
                    <td> <h4>--- Rabu ---</h4> </td>
                    <td></td>    
                </tr>

                <tr>
                    <th scope="col">Jam</th>
                    <th scope="col">Mata pelajaran</th>
                    <th scope="col">Kelas</th>
                </tr>
            <?php while($rabu = mysqli_fetch_assoc($sql3)):?>
                <tr>
                    <td><?= $rabu["jam"]?></td>
                    <td><?= $rabu["mapel"]?></td>
                    <td><?= $rabu["kelas"]?></td>
                </tr>
            <?php endwhile;?>
                        
          

           
            <?php 
            $sql4=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE pengajar = '$nama' AND hari='Kamis' ORDER BY jam ASC");?>
                <tr class="table-warning">
                    <td></td>
                    <td> <h4>--- Kamis ---</h4> </td>
                    <td></td>    
                </tr>

                <tr>
                    <th scope="col">Jam</th>
                    <th scope="col">Mata pelajaran</th>
                    <th scope="col">Kelas</th>
                </tr>
            <?php while($kamis = mysqli_fetch_assoc($sql4)):?>
                <tr>
                    <td><?= $kamis["jam"]?></td>
                    <td><?= $kamis["mapel"]?></td>
                    <td><?= $kamis["kelas"]?></td>
                </tr>
            <?php endwhile;?>
                        
         

           
            <?php 
            $sql5=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE pengajar = '$nama' AND hari='Jumat'ORDER BY jam ASC");?>
                <tr class="table-secondary">
                    <td></td>
                    <td> <h4>--- Jumat ---</h4> </td>
                    <td></td>    
                </tr>

                <tr>
                    <th scope="col">Jam</th>
                    <th scope="col">Mata pelajaran</th>
                    <th scope="col">Kelas</th>
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
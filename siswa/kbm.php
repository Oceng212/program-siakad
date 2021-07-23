<?php 

// set koneksi dan header
include_once '../database/koneksi.php';
include_once '../templates/header.php';
$nisn = $_SESSION["nisn/nip"];

//cek kelas 
$cek = mysqli_query($koneksi,"SELECT * FROM kelas_siswa WHERE NISN = '$nisn'");
while ($data = mysqli_fetch_assoc($cek)){
    $kelas = $data["kelas"];
}


?>

<div class="col-12">
       <div class="row">
            <div class="col-3" style="width:50%;">
                <strong>  <h2 style="text-transform: uppercase;">Jadwal KBM <?= $kelas; ?></h2>
                </strong>
				</div>
              </div>
              </div>

<br>
<div class="container mt-3">
    <div class="row">
 <h4>--- Senin ---</h4>
            <?php 
            $sql1=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE kelas='$kelas' AND hari='Senin' ORDER BY jam ASC");?>
            <table style = "text-align:center;">
                <tr>
                    <th>Jam</th>
                    <th>Mata pelajaran</th>
                    <th>Pengajar</th>
                </tr>
            <?php while($senin = mysqli_fetch_assoc($sql1)):?>
                <tr>
                    <td><?= $senin["jam"]?></td>
                    <td><?= $senin["mapel"]?></td>
                    <td><?= $senin["pengajar"]?></td>
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
                </tr>
            <?php while($selasa = mysqli_fetch_assoc($sql2)):?>
                <tr>
                    <td><?= $selasa["jam"]?></td>
                    <td><?= $selasa["mapel"]?></td>
                    <td><?= $selasa["pengajar"]?></td>
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
                </tr>
            <?php while($rabu = mysqli_fetch_assoc($sql3)):?>
                <tr>
                    <td><?= $rabu["jam"]?></td>
                    <td><?= $rabu["mapel"]?></td>
                    <td><?= $rabu["pengajar"]?></td>
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
                </tr>
            <?php while($kamis = mysqli_fetch_assoc($sql4)):?>
                <tr>
                    <td><?= $kamis["jam"]?></td>
                    <td><?= $kamis["mapel"]?></td>
                    <td><?= $kamis["pengajar"]?></td>
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
                </tr>
            <?php while($jumat = mysqli_fetch_assoc($sql5)):?>
                <tr>
                    <td><?= $jumat["jam"]?></td>
                    <td><?= $jumat["mapel"]?></td>
                    <td><?= $jumat["pengajar"]?></td>
                </tr>
            <?php endwhile;?>
                        
            </table>
        </div>
    </div>
			
<?php include_once '../templates/footer.php'?>
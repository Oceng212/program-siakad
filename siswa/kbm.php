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


<div class="container">
    <h2 style="text-transform: uppercase;">jadwal kbm</h2>
    <div class="row">
            <?php 
            $sql1=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE kelas='$kelas' AND hari='Senin' ORDER BY jam ASC");?>
            <table class="table table-borderless" style="text-align:center;">
                <thead>
                <tr>
                    <td><h3>--- Senin ---</h3></td>
                    <td></td>
                    <td></td>   
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col">Jam</th>
                    <th scope="col">Mata pelajaran</th>
                    <th scope="col">Pengajar</th>
                </tr>
            <?php while($senin = mysqli_fetch_assoc($sql1)):?>
                <tr>
                    <td><?= $senin["jam"]?></td>
                    <td><?= $senin["mapel"]?></td>
                    <td><?= $senin["pengajar"]?></td>
                </tr>
            </tbody>
            <?php endwhile;?>
                        
           

            
            <?php 
            $sql2=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE kelas='$kelas' AND hari='Selasa' ORDER BY jam ASC");?>
            
                <tr>
                    <td><h3>--- Selasa ---</h3></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <th scope="col">Jam</th>
                    <th scope="col">Mata pelajaran</th>
                    <th scope="col">Pengajar</th>
                </tr>
            <?php while($selasa = mysqli_fetch_assoc($sql2)):?>
                <tr>
                    <td><?= $selasa["jam"]?></td>
                    <td><?= $selasa["mapel"]?></td>
                    <td><?= $selasa["pengajar"]?></td>
                </tr>
            <?php endwhile;?>
                        
            

            
            <?php 
            $sql3=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE kelas='$kelas' AND hari='Rabu' ORDER BY jam ASC");?>
                
                <tr>
                    <td><h3>---Rabu---</h3></td>
                    <td></td>
                    <td></td>    
                </tr>

                <tr>
                    <th scope="col">Jam</th>
                    <th scope="col">Mata pelajaran</th>
                    <th scope="col">Pengajar</th>
                </tr>
            <?php while($rabu = mysqli_fetch_assoc($sql3)):?>
                <tr>
                    <td><?= $rabu["jam"]?></td>
                    <td><?= $rabu["mapel"]?></td>
                    <td><?= $rabu["pengajar"]?></td>
                </tr>
            <?php endwhile;?>
                        
            
            <?php 
            $sql4=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE kelas='$kelas' AND hari='Kamis' ORDER BY jam ASC");?>
                <tr>
                    <td><h3>---Kamis---</h3></td>
                    <td></td>
                    <td></td>    
                </tr>

                <tr>
                    <th scope="col">Jam</th>
                    <th scope="col">Mata pelajaran</th>
                    <th scope="col">Pengajar</th>
                </tr>
            <?php while($kamis = mysqli_fetch_assoc($sql4)):?>
                <tr>
                    <td><?= $kamis["jam"]?></td>
                    <td><?= $kamis["mapel"]?></td>
                    <td><?= $kamis["pengajar"]?></td>
                </tr>
            <?php endwhile;?>
                        
            

            
            <?php 
            $sql5=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE kelas='$kelas' AND hari='Jumat' ORDER BY jam ASC");?>
           <tr>
                    <td><h3>---Jumat--</h3></td>
                    <td></td>
                    <td></td>    
                </tr>

                <tr>
                    <th scope="col">Jam</th>
                    <th scope="col">Mata pelajaran</th>
                    <th scope="col">Pengajar</th>
                </tr>
            <?php while($jumat = mysqli_fetch_assoc($sql5)):?>
                <tr>
                    <td><?= $jumat["jam"]?></td>
                    <td><?= $jumat["mapel"]?></td>
                    <td><?= $jumat["pengajar"]?></td>
                </tr>
            <?php endwhile;?>
            
            <tr></tr>            
            </table>

        </div>
    </div>
			
<?php include_once '../templates/footer.php'?>
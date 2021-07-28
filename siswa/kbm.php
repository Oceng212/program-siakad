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

function KBM($hari){
    global $kelas;
    global $koneksi;
    switch($hari){

        case '1':
        $hari = "Senin";
        break;

        case '2':
        $hari = "Selasa";
        break;

        case '3':
        $hari = "Rabu";
        break;

        case '4':
        $hari = "Kamis";
        break;

        case '5':
        $hari = "Jumat";
        break;

        default:
        $hari="";
        break;

    }
    $sql=mysqli_query($koneksi,"SELECT * FROM pelajaran WHERE kelas='$kelas' AND hari='$hari' ORDER BY id ASC");
            echo "<table class='table table-borderless' style='text-align:center;'>";
            echo    "<thead>";
            echo   "<tr>";
            echo       "<td></td>";
            echo    "<td><h3>--------- $hari --------</h3></td>";
            echo        "<td></td>"; 
            echo    "</tr>";
            echo "</thead>";
            echo "<tbody>";
            echo   "<tr>";
            echo   '<th scope="col">Jam</th>';
            echo        '<th scope="col">Mata pelajaran</th>';
            echo        '<th scope="col">Pengajar</th>';
            echo    "</tr>";
            while($rows = mysqli_fetch_assoc($sql)){
            echo   "<tr>";
            echo        "<td>".$rows["jam"]."</td>";
            echo        "<td>".$rows["mapel"]."</td>";
            echo        "<td>".$rows["pengajar"]."</td>";
            }
            echo   "</tr>";
            echo "</tbody>";
            echo "</table>";
            

}

?>

<h2 style="text-transform: uppercase;">jadwal kbm</h2>
<div class="container" style="width: 800px;">
    
    <div class="row">

    <?php 
    for ($no=1;$no<=5;$no++){
        KBM($no);    
    }
    ?>

        </div>
    </div>
			
<?php include_once '../templates/footer.php'?>
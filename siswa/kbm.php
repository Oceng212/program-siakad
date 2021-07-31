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

<div class="col-12">
       <div class="row">
            <div class="col-3" style="width:25%;">
                <strong> <h2 style="text-transform: uppercase;">jadwal kbm</h2>
                </strong>
				</div>
			<div class="col-9" style="width:75%; float:right;">
            <a href="cetak-kbm.php?nisn=<?= $nisn?>" style="color: white; text-decoration:none; float: right; margin-right: 5px;" class="btn btn-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-printer" viewBox="0 0 20 20">
        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
        </svg>
        Print KBM</a>
				</div>
              </div>
              </div>

<br>



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
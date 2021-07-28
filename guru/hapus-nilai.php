<?php 

include_once '../database/koneksi.php';

$NISN = $_GET["nisn"];
$kelas= $_GET["kelas"];
$semester = $_GET["semester"];
$mapel = $_GET["mapel"];

$sql ="DELETE FROM nilai_siswa WHERE NISN = '$NISN' AND kelas='$kelas' AND semester='$semester' AND mapel='$mapel'";

mysqli_query($koneksi,$sql);

$result = mysqli_affected_rows($koneksi);

if ($result > 0 ){
    echo"<script>
        alert('Data Berhasil Dihapus');
        document.location.href = 'nilai-siswa.php?kelas=$kelas&semester=$semester';
    </script>";
} else {
    echo"<script>
        alert('Data Gagal Dihapus');
        document.location.href = 'nilai-siswa.php?kelas=$kelas&semester=$semester';
        </script>";
}


?>
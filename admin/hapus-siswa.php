<?php 

include_once '../database/koneksi.php';

$NISN = $_GET["nisn"];

$sql ="DELETE FROM profil_siswa WHERE NISN = '$NISN'";

mysqli_query($koneksi,$sql);

$result = mysqli_affected_rows($koneksi);

if ($result > 0 ){
    echo"<script>
        alert('Data Berhasil Dihapus');
        document.location.href = 'data-siswa.php';
    </script>";
} else {
    echo"<script>
        alert('Data Gagal Dihapus');
        document.location.href = 'data-siswa.php';
        </script>";
}


?>
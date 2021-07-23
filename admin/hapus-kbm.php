<?php 

include_once '../database/koneksi.php';

$id = $_GET["id"];
$kelas = $_GET["kelas"];

$sql ="DELETE FROM pelajaran WHERE id = '$id'";

mysqli_query($koneksi,$sql);

$result = mysqli_affected_rows($koneksi);

if ($result > 0 ){
    echo"<script>
        alert('Data Berhasil Dihapus');
        document.location.href = 'detail-kbm.php?kelas=$kelas';
    </script>";
} else {
    echo"<script>
        alert('Data Gagal Dihapus');
        document.location.href = 'data-siswa.php';
        </script>";
}


?>
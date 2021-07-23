<?php 

include_once '../database/koneksi.php';

$NIP = $_GET["NIP"];

$sql ="DELETE FROM profil_guru WHERE NIP = '$NIP'";

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

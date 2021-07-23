<?php 

include_once '../database/koneksi.php';

$id = $_GET["id"];

$sql ="DELETE FROM user WHERE id = '$id'";

mysqli_query($koneksi,$sql);

$result = mysqli_affected_rows($koneksi);

if ($result > 0 ){
    echo"<script>
        alert('Data Berhasil Dihapus');
        document.location.href = 'data-akun.php';
    </script>";
} else {
    echo"<script>
        alert('Data Gagal Dihapus');
        document.location.href = 'data-akun.php';
        </script>";
}


?>
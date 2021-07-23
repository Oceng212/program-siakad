<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db   = "siakad";

$koneksi = mysqli_connect($host,$user,$pass,$db);

    function tambah_siswa($tambah_siswa){
        global $koneksi;
        $NISN = $tambah_siswa['nisn'];
        $nama = $tambah_siswa['nama'];
        $tempat = $tambah_siswa['tempat'];
        $tanggal_lahir = $tambah_siswa['tanggal_lahir'];
        $jenis_kelamin = $tambah_siswa['jenis_kelamin'];
        $agama = $tambah_siswa['agama'];
        $alamat = $tambah_siswa['alamat'];
        $telp = $tambah_siswa['telepon'];
        $email = $tambah_siswa['email'];

        $input = " INSERT INTO profil_siswa VALUES 
        ('$NISN','$nama','$tempat','$tanggal_lahir','$jenis_kelamin','$agama','$alamat','$telp','$email')";

        mysqli_query($koneksi,$input);

        return mysqli_affected_rows($koneksi);
    
    }

    function updateDataSiswa($update){
        global $koneksi;
        $NISN = $update['nisn'];
        $nama = $update['nama'];
        $tempat = $update['tempat'];
        $tanggal_lahir = $update['tanggal_lahir'];
        $jenis_kelamin = $update['jenis_kelamin'];
        $agama = $update['agama'];
        $alamat = $update['alamat'];
        $telp = $update['telepon'];
        $email = $update['email'];

        $ubah = " UPDATE profil_siswa SET
                    nama = '$nama',
                    tempat = '$tempat',
                    tanggal_lahir = '$tanggal_lahir',
                    jenis_kelamin = '$jenis_kelamin',
                    agama = '$agama',
                    alamat = '$alamat',
                    telp = '$telp',
                    email = '$email'
                    WHERE NISN = '$NISN'
         ";

        mysqli_query($koneksi,$ubah);

        return mysqli_affected_rows($koneksi);
        
    }

    function tambah_guru($tambah_guru){
        global $koneksi;
        $NIP = $tambah_guru['nip'];
        $nama = $tambah_guru['nama'];
        $tempat = $tambah_guru['tempat'];
        $tanggal_lahir = $tambah_guru['tanggal_lahir'];
        $jenis_kelamin = $tambah_guru['jenis_kelamin'];
        $agama = $tambah_guru['agama'];
        $alamat = $tambah_guru['alamat'];
        $telp = $tambah_guru['telepon'];
        $email = $tambah_guru['email'];

        $input = " INSERT INTO profil_guru VALUES 
        ('$NIP','$nama','$tempat','$tanggal_lahir','$jenis_kelamin','$agama','$alamat','$telp','$email')";

        mysqli_query($koneksi,$input);

        return mysqli_affected_rows($koneksi);

     
    
    }

    function inputKelasSiswa($nisn_siswa,$nama_siswa){
        global $koneksi;
        $NISN = $nisn_siswa;
        $nama = $nama_siswa;
        $kelas = "-";

        $sql = "INSERT INTO kelas_siswa VALUES ('$NISN','$nama','$kelas')";
        mysqli_query($koneksi,$sql);
    }

    function inputJabatanGuru($nip_guru,$nama_guru){
        global $koneksi;
        $NIP = $nip_guru;
        $nama = $nama_guru;

        $input_jabatan = "INSERT INTO jabatan_guru VALUES ('$NIP','$nama','','')";

        mysqli_query($koneksi,$input_jabatan);

    }

    function updateDataGuru($update){
        global $koneksi;
        $NIP = $update['nip'];
        $nama = $update['nama'];
        $tempat = $update['tempat'];
        $tanggal_lahir = $update['tanggal_lahir'];
        $jenis_kelamin = $update['jenis_kelamin'];
        $agama = $update['agama'];
        $alamat = $update['alamat'];
        $telp = $update['telepon'];
        $email = $update['email'];

        $ubah = " UPDATE profil_guru SET
                    nama = '$nama',
                    tempat = '$tempat',
                    tanggal_lahir = '$tanggal_lahir',
                    jenis_kelamin = '$jenis_kelamin',
                    agama = '$agama',
                    alamat = '$alamat',
                    telp = '$telp',
                    email = '$email'
                    WHERE NIP = '$NIP'
         ";

        mysqli_query($koneksi,$ubah);

        return mysqli_affected_rows($koneksi);
        
    }
?>
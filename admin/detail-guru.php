<?php 
    include_once '../database/koneksi.php';
    include_once '../templates/header.php';

    $nip = $_GET['nip'];

    $sql = "SELECT * FROM profil_guru WHERE NIP = '$nip'";

    $exec = mysqli_query($koneksi,$sql);

        while($rows = mysqli_fetch_assoc($exec)){
        $NIP = $rows["NIP"];
        $nama = $rows["nama"];
        $tempat = $rows["tempat"];
        $tanggal_lahir = $rows["tanggal_lahir"];
        $jenis_kelamin = $rows["jenis_kelamin"];
        $agama = $rows["agama"];
        $alamat = $rows["alamat"];
        $telp = $rows["telp"];
        $email = $rows["email"];
      
        }
    
    
?>

<div class = "container mt-5">
<h3>Profil Guru</h3>
  <div class="row mt-4" style="padding-right:5px;">
      <div class="col-12" >
       <div class="row">
            <div class="col-3" style="width:25%;">
                <strong> NIP 
                  <span class="pull-right" style="float:right;">:</span>
                </strong>
              </div>
              <div class="col-9" style="width:75%;">
              <strong> 
                <?= $NIP;?>
              </strong>
              </div>
              </div>

        <div class="row">
            <div class="col-3" style="width:25%;">
                <strong> Nama 
                  <span class="pull-right" style="float:right;">:</span>
                </strong>
              </div>
              <div class="col-9" style="width:75%;">
              <strong> 
                <?= $nama;?>
              </strong>
              </div>
          </div>

          <div class="row">
            <div class="col-3" style="width:25%;">
                <strong> Tempat 
                  <span class="pull-right" style="float:right;">:</span>
                </strong>
              </div>
              <div class="col-3" style="width:25%;">
              <strong> 
                <?= $tempat;?>
              </strong>
              </div>
              <div class="col-2" style="width:17%;">
                <strong> Tanggal Lahir 
                  <span class="pull-right" style="float:right;">:</span>
                </strong>
                </div>
              <div class="col-4" style="width:33%;">
                <strong>  
                <?= $tanggal_lahir;?>
                </strong>
                </div>
          </div>


          <div class="row">
            <div class="col-3" style="width:25%;">
                <strong> Jenis Kelamin 
                  <span class="pull-right" style="float:right;">:</span>
                </strong>
              </div>
              <div class="col-9" style="width:75%;">
              <strong> 
                <?= $jenis_kelamin;?>
              </strong>
              </div>
          </div>

          <div class="row">
            <div class="col-3" style="width:25%;">
                <strong> Agama 
                  <span class="pull-right" style="float:right;">:</span>
                </strong>
              </div>
              <div class="col-9" style="width:75%;">
              <strong> 
                <?= $agama;?>
              </strong>
              </div>
          </div>

          <div class="row">
            <div class="col-3" style="width:25%;">
                <strong> Alamat 
                  <span class="pull-right" style="float:right;">:</span>
                </strong>
              </div>
              <div class="col-9" style="width:75%;">
              <strong> 
                <?= $alamat;?>
              </strong>
              </div>
          </div>

          <div class="row">
            <div class="col-3" style="width:25%;">
                <strong> No. Telepon 
                  <span class="pull-right" style="float:right;">:</span>
                </strong>
              </div>
              <div class="col-9" style="width:75%;">
              <strong> 
                <?= $telp;?>
              </strong>
              </div>
          </div>

          <div class="row">
            <div class="col-3" style="width:25%;">
                <strong> Email 
                  <span class="pull-right" style="float:right;">:</span>
                </strong>
              </div>
              <div class="col-9" style="width:75%;">
              <strong> 
                <?= $email;?>
              </strong>
              </div>
        </div>
       </div>
      </div>
      </div>
  </div>
<?php
// set database 
    include_once '../database/koneksi.php';
    include_once '../templates/header.php';

// set database untuk siswa yang sudah ditentukan kelasnya 
    $kelas_utama = $_GET["kelas"];
    $sql = "SELECT * FROM kelas_siswa WHERE kelas = '$kelas_utama'";
    $exec = mysqli_query($koneksi,$sql);

// set database untuk siswa yang belum memiliki kelas 
    $kelas = "-";
    $sql2 = "SELECT * FROM kelas_siswa WHERE kelas = '$kelas'";
    $exec2 = mysqli_query($koneksi,$sql2);
    $result = mysqli_num_rows($exec2);

//set update jika menekan tombol ubah  
    if(isset($_POST["ubah"])){
        $kelas = $_POST["Kelas"];
        
        // memisahkan data yang masih dalam bentuk array
        $data = $_POST["data"];
        $data = implode(",",$data);
        
        // melakukan update ke database 
        $ubah = "UPDATE kelas_siswa SET 
                kelas = '$kelas'
                WHERE NISN IN ($data)
        ";
    
        $exec = mysqli_query($koneksi,$ubah);
    
        if($exec){
            echo "<script>
                    alert('data berhasil di ubah');
                    document.location.href='detail-kelas.php?kelas=$kelas_utama';
                 </script>";
        } else {
            echo "<script>
            alert('Harap Pilih Data yang akan diubah, Ubah Data Gagal');
            document.location.href='detail-kelas.php?kelas=$kelas_utama';
             </script>";
        }
    
    }
?>

<!-- menampilkan data siswa kelas ... (menggunakan fungsi get dan patokan nama kelas) -->
<div class="col-12">
       <div class="row">
            <div class="col-3" style="width:25%;">
                <strong>  <h2>Data kelas</h2>
                </strong>
				</div>
			<div class="col-9" style="width:75%; float:right;">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="float:right;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 20 20">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>  
                Ubah</button>
        <a href="print-absen.php?kelas=<?= $kelas_utama?>" style="color: white; text-decoration:none; float: right; margin-right: 5px;" class="btn btn-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-printer" viewBox="0 0 20 20">
        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
        </svg>
        Print Absen</a>
				</div>
              </div>
              </div>

<br>

<div class="container" style="margin-left:20px;">
		<div class="row">
			<table style = "text-align:center;">
				<tr>
					<th>Cek</th>
					<th>NIP</th>
					<th>Nama</th>
                    <th>Kelas</th>
				</tr>
			<form action="" method="post">
			<?php while($rows = mysqli_fetch_assoc($exec)):?>				
				<tr>
				<td><input type="checkbox" name="data[]" value=<?= $rows['NISN']; ?>></td>
				<td><?= $rows["NISN"];?></td>
				<td><?= $rows["nama"];?></td>
				<?php if(empty($rows["kelas"])):?>
				<td>-</td>
				<?php else:?>
				<td><?= $rows["kelas"]?></td>
				<?php endif;?>
				</tr>
				<?php endwhile;?>
			</table>
			
		</div>
	</div>

    <br>
    <br>


<!-- ketika ada siswa yang belum memiliki kelas maka akan ditampilkan  -->
<?php if($result):?>
    <div class="col-12">
       <div class="row">
            <div class="col-3" style="width:50%;">
                <strong>  
                    <h4>(siswa yang belum memiliki kelas)</h4>
                </strong>
			</div>
        </div>
    </div>


<div class="container mt-3">
		<div class="row">
			<table style = "text-align:center;">
				<tr>
					<th>Cek</th>
					<th>NIP</th>
					<th>Nama</th>
                    <th>Kelas</th>
				</tr>
			<form action="" method="post">
			<?php while($rows = mysqli_fetch_assoc($exec2)):?>				
				<tr>
				<td><input type="checkbox" name="data[]" value=<?= $rows['NISN']; ?>></td>
				<td><?= $rows["NISN"];?></td>
				<td><?= $rows["nama"];?></td>
				<?php if(empty($rows["kelas"])):?>
				<td>-</td>
				<?php else:?>
				<td><?= $rows["kelas"]?></td>
				<?php endif;?>
				</tr>
				<?php endwhile;?>
			</table>
			
		</div>
	</div>

    <?php else :?> 
    
    <?php endif;?>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Update Data Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     
        <div class="form-group">
			    <label for="Kelas">Kelas</label>
			    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" id="Kelas" name="Kelas">
			    <option value="-">-</option>
			    <option value="x mipa 1">x mipa 1</option>
				<option value="x mipa 2">x mipa 2</option>
			 	<option value="x ips 1">x ips 1</option>
				<option value="x ips 2">x ips 2</option>
            </optgroup>
          </select>
			  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" name="ubah" class="btn btn-success">Update</button>
		 
      </form>
	
      </div>
    </div>
  </div>
</div>

<?php include_once '../templates/footer.php';?>
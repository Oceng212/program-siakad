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
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="float:right;">Update</button>
        <a href="print-absen.php?kelas=<?= $kelas_utama?>" style="color: white; text-decoration:none; float: right; margin-right: 5px;" class="btn btn-success">Print Absen</a>
				</div>
              </div>
              </div>

<br>

<div class="container">
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
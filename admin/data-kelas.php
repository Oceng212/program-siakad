<?php 

include_once '../database/koneksi.php';
include_once '../templates/header.php';

$sql = "SELECT * FROM data_kelas";
$exec = mysqli_query($koneksi,$sql);

// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["ubah"])){
    
	$walikelas = $_POST["walikelas"];

	$data = $_POST["data"];
	$data = implode(",",$data);

	$ubah_kelas = "UPDATE data_kelas SET 
			walikelas = '$walikelas'
			WHERE id IN ($data)
	";

	$exec_kelas = mysqli_query($koneksi,$ubah_kelas);

	if($exec_kelas){
		echo "<script>
				alert('data berhasil di ubah');
				document.location.href='data-kelas.php';
			 </script>";
	} else {
		echo "<script>
		alert('Harap Pilih Data yang akan diubah, Ubah Data Gagal');
		document.location.href='data-kelas.php';
	 	</script>";
	}

}

?>
<div class="col-12">
       <div class="row">
            <div class="col-3" style="width:25%;">
                <strong>  <h2>Data Kelas</h2>
                </strong>
				</div>
                <div class="col-9" style="width:75%; float:right;">
				<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="float:right; ">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 20 20">
				<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
				<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
				</svg>
				Ubah
				</button>
				</div>

              </div>
              </div>

<br>

<div class="container" style="margin-left:30px;">
		<div class="row">
			<table class="table table-borderless" style = "text-align:center;">
				<tr>
                    <th>Cek</th>
					<th>Kelas</th>
					<th>Walikelas</th>
                    <th>Siswa</th>
				</tr>
			<form action="" method="post">
			<?php while($rows = mysqli_fetch_assoc($exec)):?>				
				<tr>
                <td><input type="checkbox" name="data[]" value=<?= $rows["id"]; ?>></td>
				<td><?= $rows["kelas"];?></td>
				<td><?= $rows["walikelas"];?></td>
				<td><a href="detail-kelas.php?kelas=<?= $rows["kelas"];?>" style="color: white; text-decoration:none;" class="btn btn-primary btn-sm">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 20 20">
				<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
				<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
				</svg>
				Lihat</a>
  				</li></td>
                
			<?php endwhile;?>
			</table>
			
		</div>
	</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Update Data Kelas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     
        <div class="form-group">
			    <label for="walikelas">Wali kelas</label>
			    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" id="walikelas" name="walikelas">
				<option value="-">-</option>
                <?php 
                $sql_data_guru = "SELECT * FROM profil_guru";
                $exec_guru = mysqli_query($koneksi,$sql_data_guru);
                while($guru = mysqli_fetch_assoc($exec_guru)):
                ?>
                <option value="<?= $guru["nama"]?>"><?= $guru["nama"]?></option>
			    <?php endwhile;?>
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
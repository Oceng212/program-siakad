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
                <strong>  <h2>Penilaian Siswa</h2>
                </strong>
				</div>
               
              </div>
              </div>

<br>

<div class="container">
		<div class="row">
			<table style = "text-align:center;">
				<tr>
					<th>Kelas</th>
					<th>Walikelas</th>
                    <th>Siswa</th>
				</tr>
			<form action="" method="post">
			<?php while($rows = mysqli_fetch_assoc($exec)):?>				
				<tr>
				<td><?= $rows["kelas"];?></td>
				<td><?= $rows["walikelas"];?></td>
				<td><a href="nilai-siswa.php?kelas=<?= $rows["kelas"];?>" style="color: white; text-decoration:none;" class="badge bg-primary float-right ml-1">Lihat</a>
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
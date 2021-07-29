<?php 

// set koneksi dan header
include_once '../database/koneksi.php';
include_once '../templates/header.php';

// cek apakah ada data atau tidak 
$sql = "SELECT * FROM jabatan_guru";
$exec = mysqli_query($koneksi,$sql);

// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["ubah"])){
	$jabatan = $_POST["jabatan"];
	$mapel = $_POST["mapel"];

	$data = $_POST["data"];
	$data = implode(",",$data);
	

	$ubah = "UPDATE jabatan_guru SET 
			jabatan = '$jabatan',
			mapel = '$mapel'
			WHERE NIP IN ($data)
	";

	$exec = mysqli_query($koneksi,$ubah);

	if($exec){
		echo "<script>
				alert('data berhasil di ubah');
				document.location.href='jabatan.php';
			 </script>";
	} else {
		echo "<script>
		alert('Harap Pilih Data yang akan diubah, Ubah Data Gagal');
		document.location.href='jabatan.php';
	 	</script>";
	}

}


?>

<div class="col-12">
       <div class="row">
            <div class="col-3" style="width:25%;">
                <strong>  <h2>Pengajar / Guru</h2>
                </strong>
				</div>
			<div class="col-9" style="width:75%; float:right;">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="float:right;">
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

<div class="container" style="width: 800px;">
		<div class="row">
			<table class="table table-borderless" style = "text-align:center;">
				<tr>
					<th>Cek</th>
					<th>NIP</th>
					<th>Nama</th>
                    <th>Jabatan</th>
                    <th>Guru Mapel</th>
				</tr>
			<form action="" method="post">
			<?php while($rows = mysqli_fetch_assoc($exec)):?>				
				<tr>
				<td><input type="checkbox" name="data[]" value=<?= $rows['NIP']; ?>></td>
				<td><?= $rows["NIP"];?></td>
				<td><?= $rows["nama"];?></td>
				<?php if(empty($rows["jabatan"]) && empty($rows["mapel"])):?>
				<td>-</td>
                <td>-</td>
				<?php else:?>
				<td><?= $rows["jabatan"]?></td>
				<td><?= $rows["mapel"]?></td>
				<?php endif;?>
				</tr>
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
          <h5 class="modal-title" id="staticBackdropLabel">Update Data Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     
        <div class="form-group">
			    <label for="jabatan">Jabatan</label>
			    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" id="jabatan" name="jabatan">
			<option value="Guru">Guru</option>
			    <option value="Waka Kesiswaan">Waka Kesiswaan</option>
				<option value="Waka Kurikulum">Waka Kurikulum</option>
			 	<option value="Waka Sarana dan Prasarana">Waka Sarana dan Prasarana</option>
				<option value="Waka Humas">Waka Humas</option>
            </optgroup>
          </select>
			  </div>

			  <div class="form-group">
			    <label for="mapel">mapel</label>
			    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" id="mapel" name="mapel">
				<option value="Bahasa Indonesia">Bahasa Indonesia</option>
			    <option value="Bahasa Inggris">Bahasa Inggris</option>
				<option value="Penjasorkes">Penjasorkes</option>
			 	<option value="Seni Budaya">Seni Budaya</option>
				<option value="Matematika">Matematika</option>
				<option value="Fisika">Fisika</option>
				<option value="Kimia">Kimia</option>
				<option value="Biologi">Biologi</option>
				<option value="Agama">Agama</option>
				<option value="Ekonomi">Ekonomi</option>
				<option value="Sosiologi">Sosiologi</option>
				<option value="Sejarah">Sejarah</option>
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
<?php include_once '../templates/footer.php'?>
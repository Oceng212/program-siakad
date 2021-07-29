<?php 
    include_once '../database/koneksi.php';
    include_once '../templates/header.php';

    $sql = "SELECT * FROM profil_siswa";
    $exec = mysqli_query($koneksi,$sql);

    
?>

<div class="container mt-5" style="background-color:#AFEEEE;">
    <h2>Data Siswa</h2>
</div>
<br>

<div class="container" style="margin-left:30px;">
		<div class="row">

			<table class="table table-borderless" style = "text-align:center;">
				<tr>
					<th>NISN</th>
					<th>Nama</th>
					<th>Aksi</th>
				</tr>
			<?php while($rows = mysqli_fetch_assoc($exec)):?>				
				<tr>					
					<td><?= $rows["NISN"];?></td>
					<td><?= $rows["nama"];?></td>
					<td><a href="hapus-siswa.php?nisn=<?= $rows["NISN"]?>" style="color: white; text-decoration:none;" class="btn btn-danger btn-sm"
                    onclick = "return confirm('yakin?');">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 20 20">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
					Hapus</a>
  					<a href="details-siswa.php?nisn=<?= $rows["NISN"]?>" style="color: white; text-decoration:none;" class="btn btn-primary btn-sm">
					  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 20 20">
				<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
				<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
				</svg>  
					Details</a></td>
				</tr>
			<?php endwhile;?>
			</table>
			
		</div>
	</div>

<?php include_once '../templates/footer.php';?>
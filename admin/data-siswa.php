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

<div class="container">
		<div class="row">

			<table style = "text-align:center;">
				<tr>
					<th>NISN</th>
					<th>Nama</th>
					<th>Aksi</th>
				</tr>
			<?php while($rows = mysqli_fetch_assoc($exec)):?>				
				<tr>					
					<td><?= $rows["NISN"];?></td>
					<td><?= $rows["nama"];?></td>
					<td><a href="hapus-siswa.php?nisn=<?= $rows["NISN"]?>" style="color: white; text-decoration:none;" class="badge bg-danger float-right ml-1"
                    onclick = "return confirm('yakin?');">Hapus</a>
  					<a href="details-siswa.php?nisn=<?= $rows["NISN"]?>" style="color: white; text-decoration:none;" class="badge bg-primary float-right ml-1">Details</a></td>
				</tr>
			<?php endwhile;?>
			</table>
			
		</div>
	</div>

<?php include_once '../templates/footer.php';?>
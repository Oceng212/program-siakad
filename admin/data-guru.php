<?php 
    include_once '../database/koneksi.php';
    include_once '../templates/header.php';

    $sql = "SELECT * FROM profil_guru";
    $exec = mysqli_query($koneksi,$sql);
    
    
?>

<div class="container mt-5" style="background-color:#3CB371; color:white;">
    <h2>Data Guru</h2>
</div>
<br>

<div class="container">
		<div class="row">

			<table class="table table-borderless" style = "text-align:center;">
				<tr>
					<th>NISN</th>
					<th>Nama</th>
					<th>Aksi</th>
				</tr>
			<?php while($rows = mysqli_fetch_assoc($exec)):?>				
				<tr>					
					<td><?= $rows["NIP"];?></td>
					<td><?= $rows["nama"];?></td>
					<td><a href="hapus-guru.php?NIP=<?= $rows["NIP"]?>" style="color: white; text-decoration:none;" class="btn btn-danger btn-sm"
                    onclick = "return confirm('yakin?');">Hapus</a>
  					<a href="detail-guru.php?nip=<?= $rows["NIP"]?>" style="color: white; text-decoration:none;" class="btn btn-primary btn-sm">Details</a></td>
				</tr>
			<?php endwhile;?>
			</table>
			
		</div>
	</div>

<?php include_once '../templates/footer.php';?>
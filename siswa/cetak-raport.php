<?php
// library fpdf
include "../fpdf/fpdf.php";
// membuat koneksi
include_once '../database/koneksi.php';

// mengambil data siswa yang bersangkutan  
$NISN = $_GET["nisn"];
$semester = $_GET["semester"];
if ($semester == "ganjil"){
	$semester = "Ganjil";
} else {
	$semester = "Genap";
}

$sql = "SELECT * FROM kelas_siswa WHERE NISN = '$NISN'";
$exec = mysqli_query($koneksi,$sql);
while ($rows = mysqli_fetch_assoc($exec)) {
	$nama = $rows["nama"];
	$kelas = $rows["kelas"];
}

// mengambil data kelas 
$sql_kelas = mysqli_query($koneksi,"SELECT * FROM data_kelas WHERE kelas = '$kelas'");
while ($data_kelas = mysqli_fetch_assoc($sql_kelas)){
	$walikelas = $data_kelas["walikelas"];
}

//mengambil data nilai siswa
$data = "SELECT * FROM nilai_siswa WHERE NISN = '$NISN' AND kelas ='$kelas' AND semester ='$semester'";
$exec_data = mysqli_query($koneksi,$data);

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,'SIAKAD SMA TADIKA MESRA','0','1','C',false);
$pdf->SetFont('Arial','i',8);
$pdf->Cell(0,5,'Alamat : Jl.Jimbabwe km 8-afrika.','0','1','C',false);
$pdf->Cell(0,2,'www.tadikamesra.ac.id | info@tadikamesra.ac.id | 082147739928','0','1','C',false);
$pdf->Ln(3);
$pdf->Cell(190,0.6,'','0','1','C',true);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,5,'Raport','0','1','C',false);
$pdf->Ln(3);

$pdf->SetFont('Arial','',9);
$pdf->Cell(25,6,'','0','0','C',false);
$pdf->Cell(40,6,'NISN : '.$NISN,'0','0','L',false);
$pdf->Cell(71,6,'','0','0','C',false);
$pdf->Cell(47,6,'Kelas : '.$kelas,'0','0','L',false);
$pdf->Ln(7);

$pdf->SetFont('Arial','',9);
$pdf->Cell(25,6,'','0','0','C',false);
$pdf->Cell(40,6,'Nama : '.$nama,'0','0','L',false);
$pdf->Cell(71,6,'','0','0','C',false);
$pdf->Cell(47,6,'Semester : '.$semester,'0','0','L',false);
$pdf->Ln(7);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(48,6,'Mata Pelajaran',1,0,'C');
$pdf->Cell(47,6,'KKM',1,0,'C');
$pdf->Cell(47,6,'Pengetahuan',1,0,'C');
$pdf->Cell(47,6,'Keterampilan',1,0,'C');
$pdf->Ln(2);

while ($rows = mysqli_fetch_assoc($exec_data)){
$pdf->Ln(4);
$pdf->SetFont('Arial','',8);
$pdf->Cell(48,6,$rows['mapel'],1,0,'C');
$pdf->Cell(47,6,'70',1,0,'C');
$pdf->Cell(47,6,$rows['pengetahuan'],1,0,'C');
$pdf->Cell(47,6,$rows['keterampilan'],1,0,'C');
$pdf->Ln(2);
}

$pdf->Ln(10);
$pdf->SetFont('Arial','',9);
$pdf->Cell(95,5,'Orang Tua/Wali','0','0','C',false);
$pdf->Cell(95,5,'Walikelas '.$kelas,'0','0','C',false);
$pdf->Ln(7);

$pdf->Ln(10);
$pdf->SetFont('Arial','',9);
$pdf->Cell(95,5,'.........................','0','0','C',false);
$pdf->Cell(95,5,$walikelas,'0','0','C',false);
$pdf->Ln(7);

$pdf->Output();
?>
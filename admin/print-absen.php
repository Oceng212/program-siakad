<?php
// library fpdf
include "../fpdf/fpdf.php";
// membuat koneksi
include_once '../database/koneksi.php';

// mengambil data kelas 
$kelas = $_GET["kelas"];

// mengambil data kelas 
$sql_kelas = mysqli_query($koneksi,"SELECT * FROM data_kelas WHERE kelas = '$kelas'");
while ($data_kelas = mysqli_fetch_assoc($sql_kelas)){
	$walikelas = $data_kelas["walikelas"];
}


//mengambil data nilai siswa
$data = "SELECT * FROM kelas_siswa WHERE kelas = '$kelas'";
$exec_data = mysqli_query($koneksi,$data);

$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Arial','B',26);
$pdf->Cell(275,5,'SMA TADIKA MESRA','0','1','C',false);
$pdf->SetFont('Arial','i',9);
$pdf->Cell(275,5,'Alamat : Jl.Jimbabwe km 8-afrika.','0','1','C',false);
$pdf->Cell(275,2,'www.tadikamesra.ac.id | info@tadikamesra.ac.id | 082147739928','0','1','C',false);
$pdf->Ln(3);
$pdf->Cell(275,0.6,'','0','1','C',true);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',18);
$pdf->Cell(275,5,'Absensi Kelas '.$kelas ,'0','1','C',false);
$pdf->Ln(5);

$pdf->SetFont('Arial','',9);
$pdf->Cell(137,5,'Semester :','0','0','C',false);
$pdf->Cell(137,5,'Bulan :','0','0','C',false);
$pdf->Cell(137,5,'Tahun Ajaran :','0','0','C',false);
$pdf->Ln(7);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,6,'NISN',1,0,'C');
$pdf->Cell(50,6,'Nama Siswa/i',1,0,'C');
for ($no=1;$no<=30;$no++){
	$pdf->Cell(6,6,$no,1,0,'C');
}
$pdf->Cell(6,6,'S',1,0,'C');
$pdf->Cell(6,6,'I',1,0,'C');
$pdf->Cell(6,6,'A',1,0,'C');
$pdf->Ln(2);

while ($rows = mysqli_fetch_assoc($exec_data)){
$pdf->Ln(4);
$pdf->SetFont('Arial','',10);
$pdf->Cell(25,6,$rows['NISN'],1,0,'C');
$pdf->Cell(50,6,$rows['nama'],1,0,'C');
for ($no=1;$no<=33;$no++){
	$pdf->Cell(6,6,'',1,0,'C');
}
$pdf->Ln(2);
}

$pdf->Ln(8);
$pdf->SetFont('Arial','',10);
$pdf->Cell(100,5,'Catatan','0','0','C',false);
$pdf->Ln(30);

$pdf->Ln(8);
$pdf->SetFont('Arial','',10);
$pdf->Cell(137,5,'Mengetahui,','0','0','C',false);
$pdf->Ln(2);


$pdf->Ln(3);
$pdf->SetFont('Arial','',10);
$pdf->Cell(137,5,'Kepala Sekolah SMA TADIKA MESRA','0','0','C',false);
$pdf->Cell(137,5,'Walikelas '.$kelas,'0','0','C',false);
$pdf->Ln(7);

$pdf->Ln(10);
$pdf->SetFont('Arial','',10);
$pdf->Cell(137,5,'Osha Chandra Fauza,M.Pd','0','0','C',false);
$pdf->Cell(137,5,$walikelas,'0','0','C',false);
$pdf->Ln(7);



$pdf->Output();
?>
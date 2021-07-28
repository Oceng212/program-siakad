<?php
// library fpdf
include "../fpdf/fpdf.php";
// membuat koneksi
include_once '../database/koneksi.php';

// mengambil data siswa yang bersangkutan  
$nisn = $_GET["nisn"];

$sql = "SELECT * FROM kelas_siswa WHERE NISN = '$nisn'";
$exec = mysqli_query($koneksi,$sql);
while ($rows = mysqli_fetch_assoc($exec)) {
	$kelas = $rows["kelas"];
}

function JamKBM($jam){
	global $kelas;
	global $koneksi;
	global $pdf;
	switch ($jam) {
		case '1':
		$jam="7:00-7:45";
		break;

		case '2':
		$jam="7:45-8:30";
		break;

		case '3':
		$jam="8:30-9:15";
		break;

		case '4':
		$jam="9:15-10:00";
		break;

		case '5':
		$jam="10:00-10:15";
		break;

		case '6':
		$jam="10:15-11:00";
		break;

		case '7':
		$jam="11:45-12:30";
		break;

		case '8':
		$jam="12:30-13:15";
		break;

		case '9':
		$jam="13:15-14:00";
		break;

		case '10':
		$jam="14:00-14:45";
		break;

		case '11':
		$jam="14:45-15:30";
		break;
		
		default:
			header('Location : index.php');
		break;
	}
	$sql_kbm = "SELECT * FROM pelajaran WHERE kelas='$kelas' AND jam='$jam' ORDER BY hari DESC";
	$exec_kbm = mysqli_query($koneksi,$sql_kbm);
	$pdf->Ln(4);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(32,6,$jam,1,0,'C');
	while ($data = mysqli_fetch_assoc($exec_kbm)){
		$pdf->Cell(31,6,$data['mapel'],1,0,'C');
	}

	// ini waktu istirahat pertama
	if ($jam == "10:00-10:15") {
		$pdf->Cell(124,6,'ISTIRAHAT',1,0,'C');
	}
	// ini waktu istirahat kedua
	if ($jam == "11:45-12:30") {
		$pdf->Cell(124,6,'ISTIRAHAT',1,0,'C');
	}
	
	$pdf->Ln(2);

}


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
$pdf->Cell(0,5,'KBM '.$kelas,'0','1','C',false);
$pdf->Ln(3);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(32,6,'Jam',1,0,'C');
$pdf->Cell(31,6,'Senin',1,0,'C');
$pdf->Cell(31,6,'Selasa',1,0,'C');
$pdf->Cell(31,6,'Rabu',1,0,'C');
$pdf->Cell(31,6,'Kamis',1,0,'C');
$pdf->Cell(31,6,'Jumat',1,0,'C');
$pdf->Ln(2);

for($no=1;$no<=11;$no++){
	JamKBM($no);
}

$pdf->Output();
?>
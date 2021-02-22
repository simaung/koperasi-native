
<?php
include "../config/koneksi.php";
require('pdf/fpdf.php');
$pdf = new FPDF("L","cm","A4");


$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->MultiCell(19.5,0.5,'',0,'L'); 
$pdf->SetX(4);   
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->Image('../logo_kop.GIF',2,1.3,2,1.6);
$pdf->SetX(4); 
$pdf->MultiCell(19.5,0.5,'  " KOPERASI SIMPAN PINJAM FAMILY "',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'  KAMPUNG MUARA RW.01 DESA BANJARAN WETAN ',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,' KECAMATAN BANJARAN KABUPATEN BANDUNG ',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.2,0.7,"Laporan Seluruh Tabungan",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"\nDi cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(3, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Kode Tabungan', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Kode Anggota', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Nama Anggota', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Jumlah Saldo', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$query=mysql_query("SELECT * FROM t_tabungan");
	$no=1;
	while($data=mysql_fetch_array($query))
	{
		$pdf->Cell(3, 0.8, $no,1, 0, 'C');
    	$pdf->Cell(6, 0.8, $data['kode_tabungan'],1, 0, 'C');
	    $pdf->Cell(6, 0.8, $data['kode_anggota'], 1, 0,'C');
	    $d=$data['kode_anggota'];$f=mysql_fetch_array(mysql_query("SELECT nama_anggota from t_anggota where kode_anggota='$d'"));
	    $pdf->Cell(5, 0.8, $f['nama_anggota'],1, 0,'C');
		$pdf->Cell(5, 0.8, number_format($data['besar_tabungan']),1, 1,'C');
		$no++;
	}
$hasil=mysql_fetch_array(mysql_query("SELECT sum(besar_tabungan) as besar from t_tabungan"));
$pdf->Cell(20, 0.8, 'Total', 1, 0, 'C');
$pdf->Cell(5, 0.8, number_format($hasil['besar']), 1, 1, 'C');



$pdf->Output("Laporan Semua Tabungan.pdf","I");
?>
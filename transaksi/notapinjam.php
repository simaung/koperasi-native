<?php
session_start();
$kode_anggota=isset($_GET['kode_anggota']) ? $_GET['kode_anggota'] : '';
$kode_jenis=isset($_GET['kode_jenis']) ? $_GET['kode_jenis'] : '';
$besar=$_GET['besar_pinjaman'];
$besarangsur=$_GET['besar_angsuran'];
include "../config/koneksi.php";
$sqla=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * from t_anggota where kode_anggota='$kode_anggota'"));
$sqlb=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * from t_jenis_pinjam where kode_jenis_pinjam='$kode_jenis'"));
?>
<body onload="window.print()">
<h3><center><img src="../logo_kop.gif" width="60" height="60"><br>Bukti Transaksi Pinjaman</center></h3>
<table style="margin-left:50px;">
	<tr>
		<td>Kode Anggota</td>
		<td>:</td>
		<td><?php echo $kode_anggota; ?></td>
	</tr>
	<tr>
		<td>Nama Anggota</td>
		<td>:</td>
		<td><?php echo $sqla['nama_anggota']; ?></td>
	</tr>
	<tr>
		<td>Jenis Pinjaman</td>
		<td>:</td>
		<td><?php echo $sqlb['nama_pinjaman']; ?></td>
	</tr>
	<tr>
		<td>Besar Pinjaman</td>
		<td>:</td>
		<td><?php echo $besar; ?></td>
	</tr>
	<tr>
		<td>Besar Angsuran</td>
		<td>:</td>
		<td><?php echo $besarangsur; ?></td>
	</tr>
	<tr>
		<td>Tanggal</td>
		<td>:</td>
		<td><?php echo date("Y-m-d");?></td>
	</tr>
</table>
<table  border="0" align="center">
		<tr align="center">
			<td width="200" colspan="2">Diketahui oleh,</td>
			<td width="200" colspan="2">Diterima oleh,</td>
		</tr>
		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>
		<tr align="center">
			<td width="200" colspan="2">_ _ _ _ _ _ _ _ _</td>
			<td width="200" colspan="2"><?php if(!isset($_SESSION)){session_start();} echo $_SESSION['kopname'];?></td>
			<td width="200" colspan="2"><?php echo $sqla['nama_anggota'];?></td>
		</tr>
		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>
  </table>
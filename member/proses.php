<?php
session_start();include "../config/koneksi.php";
$perintah=$_GET['perintah'];
if($perintah=='akses')
{
	$kode=$_POST['kodeang'];
	$jumlah=mysql_num_rows(mysql_query("SELECT*from t_anggota where kode_anggota='$kode'"));
	if($jumlah > 0){
		$a=mysql_fetch_array(mysql_query("SELECT*from t_anggota where kode_anggota='$kode'"));
		$_SESSION['kode']=$a['kode_anggota'];
		header("location:area.php?pilih=home");
		}else{
	?>
		<script>
			alert("Akses Ditolak");
			window.location="index.php";
		</script>
	<?php
	}
	
}
else if($perintah=='keluar')
{
	session_destroy();
	header("location:index.php");
}
?>
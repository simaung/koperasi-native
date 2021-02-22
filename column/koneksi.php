<?php
	mysqli_connect("localhost","root","") or die ("Koneksi Gagal");
	mysqli_select_db("koperasi") or die ("Database Tidak Terakses");
	
	$koneksi=mysqli_connect("localhost","root","","koperasi");
?>
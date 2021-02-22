<?php
	include "../config/koneksi.php";
	require ('root.php');
	$lib= new root();	
	$pros = isset($_GET['pros']) ? $_GET['pros'] : '';
	$kode_p=isset($_GET['kode_petugas']) ? $_GET['kode_petugas'] : '';
	$kode_user=$_POST['kode_user'];
	$kode_petugas=$_POST['kode_petugas'];
	
	$nama_petugas=$_POST['nama_petugas'];
	$jabatan=$_POST['jabatan'];
	$alamat_petugas=$_POST['alamat_petugas'];
	$telp=$_POST['telp'];
	$jenis_kelamin=$_POST['jenis_kelamin'];
	$u_entry=$_POST['u_entry'];
	$tgl_entri=$_POST['tgl_entri'];
	//$kode_user,$kode_petugas,$kode_p,$nama_petugas,$alamat_petugas,$telp,$jenis_kelamin,$u_entry,$tgl_entri
	
	switch ($pros){
		case "tambah" :
				$lib->tambah($kode_user,$kode_petugas,$kode_p,$nama_petugas,$alamat_petugas,$jabatan,$telp,$jenis_kelamin,$u_entry,$tgl_entri);
		break;
		
		case "ubah" :
				$lib->edit($kode_user,$kode_petugas,$kode_p,$nama_petugas,$alamat_petugas,$jabatan,$telp,$jenis_kelamin,$u_entry,$tgl_entri);
		break;
		
		case "hapus" :
				$lib->hapus($kode_user,$kode_petugas,$kode_p,$nama_petugas,$alamat_petugas,$jabatan,$telp,$jenis_kelamin,$u_entry,$tgl_entri);
		break;
		
		default : break; 
	}
	
?>
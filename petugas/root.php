<?php
class root
{
	function __construct()
	{
		$koneksi=mysqli_connect('localhost','root','');
		mysqli_select_db($koneksi,'koperasi');

	}
	public function tambah($kode_user,$kode_petugas,$kode_p,$nama_petugas,$jabatan,$alamat_petugas,$telp,$jenis_kelamin,$u_entry,$tgl_entri)
	{
		$koneksi=mysqli_connect('localhost','root','');
		mysqli_select_db($koneksi,'koperasi');
		$qtambah=mysqli_query($koneksi,"INSERT INTO t_petugas values('$kode_petugas','$nama_petugas','$jabatan','$alamat_petugas','$telp','$jenis_kelamin','$u_entry','$tgl_entri');");
		if($qtambah)
		{
			header("location:../index.php?pilih=4.7");
		}
	}
	public function edit($kode_user,$kode_petugas,$kode_p,$nama_petugas,$alamat_petugas,$jabatan,$telp,$jenis_kelamin,$u_entry,$tgl_entri)
	{
		$koneksi=mysqli_connect('localhost','root','');
		mysqli_select_db($koneksi,'koperasi');
		$qubah=mysqli_query($koneksi,"UPDATE t_petugas SET nama_petugas='$nama_petugas',alamat_petugas='$alamat_petugas',jabatan='$jabatan',no_telp='$telp',jenis_kelamin='$jenis_kelamin',u_entry='$u_entry',tgl_entri='$tgl_entri' WHERE kode_petugas='$kode_petugas'");
		if($qubah){
				header("location:../index.php?pilih=4.7");
			}else{
				echo "Edit Data Gagal!!!";
			}
	}
	public function hapus($kode_user,$kode_petugas,$kode_p,$nama_petugas,$alamat_petugas,$telp,$jenis_kelamin,$u_entry,$tgl_entri)
	{
		$koneksi=mysqli_connect('localhost','root','');
		mysqli_select_db($koneksi,'koperasi');
		$qdelete=mysqli_query($koneksi,"DELETE FROM t_petugas WHERE kode_petugas='$kode_p'");
			if($qdelete){
				header("location:../index.php?pilih=4.7");
			}else{
				echo "Hapus Data Gagal!!!!";
			}
	}
}
?>
<?php
	ini_set('display_errors',true);
	$host	= 'localhost';
	$user	= 'root';
	$pass	= '';
	$db		= 'koperasi';
	
	
	$koneksi=mysqli_connect("localhost","root","","koperasi");
	$db=mysqli_select_db($koneksi,$db);
	
	if ($koneksi){
		//echo "berhasil : )";
	}else{
?>
	<script language="javascript">alert("Gagal Koneksi Database MySql !!")</script>
<?php
	}
	
	
	class Tabungan{
		private $saldo;
		function Tabungan($a){
			$this->saldo = $a;
		}
		function simpan($sim){
			$this->saldo = $this->saldo + $sim;
		}
		function pinjam($pin){
			$this->saldo = $this->saldo - $pin;
		}
		function cek_saldo(){
			return $this->saldo;
		}
	};
?>
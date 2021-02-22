<?php 
	include 'config/koneksi.php';
	include 'fungsi/fungsi.php';

	//$aksi=$_GET['aksi'];
	//$kategori = ($kategori=$_POST['kategori'])?$kategori : $_GET['kategori'];
	//$cari = ($cari = $_POST['input_cari'])? $cari: $_GET['input_cari'];
	
	$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';
	$kategori = ($kategori=isset($_POST['kategori'])) ? $kategori : isset($_GET['kategori']);
	$cari = ($cari = isset( $_POST['input_cari'])) ? $cari: isset($_GET['input_cari']);
?>

<?php
	// **STYLE FORM
?>
<script language="javascript" type="text/javascript" src="js/niceforms.js"></script>
<link rel="stylesheet" type="text/css" href="css/theme1.css" />
</head>

<?php
	if(empty($aksi)){
?>
<body>  
<div class="row mt">
 <div class="col-lg-12">
  <div class="form-panel">
   <h4 class="mb"><span class='glyphicon glyphicon-briefcase'></span> Setting Data User
                    <span style="float:right;">
<a href="?pilih=4.3&aksi=tambah" class="btn btn-primary"><span class='glyphicon glyphicon-plus'></span> Tambah</a> 
                    </span></h4>
<form class="form-inline" role="form">
  <table class="table table-bordered table-striped table-condensed">
    <thead>
		<tr class="info">
             <th><a href="#">No</a></th>
             <th><a href="#">Kode User</a></th>
             <th><a href="#">Usernama</a></th>
      			 <th><a href="#">Password</a></th>
      			 <th><a href="#">Nama</a></th>
             <th><a href="#">Level</a></th>
             <th><a>Aksi</a></th>
       	</tr>
		
    </thead><tbody>
<?php
	$sqlku=mysqli_query($koneksi,"SELECT * from t_user");
	$no=1;
	while($data=mysqli_fetch_array($sqlku)){
?>
    
    	<tr>
			<td><?php echo $no;?></td>
            <td><?php echo $data['kode_user'];?></td>
			<td><?php echo $data['username'];?></td>
			<td><?php echo $data['password'];?></td>
			<td><?php echo $data['nama'];?></td>
      <td><?php echo $data['level'];?></td>
<td align="center">
<a class="btn btn-success btn-xs" href=index.php?pilih=4.3&aksi=ubah&kode_user=<?php echo $data['kode_user'];?>><i class="glyphicon glyphicon-pencil"></i> Edit</a>
<script type="text/javascript">
    function hapus(){
    var msg = confirm("Apakah Anda yakin ?");
    if(msg==true){
    window.location="setting/proses_user.php?pros=hapus&kode_user=<?php echo $data['kode_user'];?>";  
    }
    else{
    
    }
    }
    </script>
<a class="btn btn-danger btn-xs" href="#" onclick="hapus();"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
			</td>
        </tr> 
	
<?php
	$no++;} //tutup while
?>
</tbody></table></div></form></div></div></div>
    
<?php
	}elseif($aksi=='tambah'){
?>
<?php
		$query="SELECT max(kode_user) as KodeTerbesar FROM t_user";
		$hasil=mysqli_query($koneksi,$query);
		$data=mysqli_fetch_array($hasil);
		$kode_user=$data['KodeTerbesar'];
		
		$No_Urut =(int)Substr($kode_user, 3, 3);
		$No_Urut++;
		$huruf='U';
		$kode_user=$huruf . sprintf("%04s", $No_Urut);
	
?>

<div class="row mt">
 <div class="col-lg-12">
  <div class="form-panel" style="width:50%;">
   <h4 class="mb"><span class='glyphicon glyphicon-briefcase'></span> Tambah Data User</h4>
<form action="setting/proses_user.php?pros=tambah" method="post" id="form">
<div class="form-group">
 <label>Kode User</label>
 <input type="text" class="form-control" name="kode_user" size="54" value="<?php echo $kode_user;?>" readonly title="Kode harus diisi"/>
</div>
<div class="form-group">
<label>Username</label>
 <input type="text"  class="form-control" name="username" size="54" class="required" title="Nama harus diisi">
</div>
<div class="form-group">
<label>Password</label>
 <input type="password" class="form-control" name="password" size="54" class="required" title="Password harus diisi"/>
</div>
<div class="form-group">
<label>Nama</label>
<input name="nama" class="form-control" type="text" class="required">
</div>
<div class="form-group">
<label>Tanggal Entri</label>
 <input type="text" class="form-control" name="tgl_entri" size="54" value="<?php echo date("Y-m-d");?>" readonly />
</div>
<div class="form-group">
<label>Level</label>
<select class="form-control" name="level" class="required">
            	<option value="">pilih</option>
                <option value="admin">Admin</option>
                <option value="operator">Operator</option>
            </select>
</div>
<div class="form-group">
<button class="btn btn-danger"><span class='glyphicon glyphicon-pencil'></span> Tambah</button>
</form></div></div></div>
<?php
	}elseif($aksi=='ubah'){
		$kode=$_GET['kode_user'];
		$q=mysqli_query($koneksi,"SELECT * FROM t_user WHERE kode_user='$kode'");
		$data2=mysqli_fetch_array($q);
?>
<div class="row mt">
 <div class="col-lg-12">
  <div class="form-panel" style="width:50%;">
   <h4 class="mb"><span class='glyphicon glyphicon-briefcase'></span> Edit Data User</h4>
<form action="setting/proses_user.php?pros=ubah" method="post" id="form">
<div class="form-group">
 <label>Kode User</label>
 <input type="text" class="form-control" name="kode_user" size="54" value="<?php echo $data2['kode_user'];?>"/>
</div>
<div class="form-group">
<label>Username</label>
 <input type="text" class="form-control" name="username" size="54" class="required" value="<?php echo $data2['username'];?>">
</div>
<div class="form-group">
<label>Password</label>
 <input type="text" class="form-control" name="password" size="54" class="required" title="Telepon harus diisi" value="<?php echo $data2['password'];?>"/>
</div>
<div class="form-group">
<label>Nama</label>
<input name="nama" class="form-control" type="text" value="<?php echo $data2['nama'];?>" class="required">
</div>
<div class="form-group">
<label>Tanggal Entri</label>
 <input type="text" class="form-control" name="tgl_entri" size="54" value="<?php echo date("Y-m-d");?>" readonly/>
</div>
<div class="form-group">
<label>Level</label>
<select name="level" class="form-control">
		<?php
			$q=mysqli_query($koneksi,"SELECT * FROM t_user where kode_user='$kode'");
			while($a=mysqli_fetch_array($q)){
			?>
            <option value="admin" <?php if($a['level']=='admin'){?>selected="selected"<?php }?>>Admin</option>
            <option value="operator" <?php if($a['level']=='operator'){?>selected="selected"<?php }?>>Operator</option>
            <?php
            }
		?>
</select>
</div>
<button class="btn btn-danger"><span class='glyphicon glyphicon-pencil'></span> Edit</button>
</form></div></div></div>
<?php
	}
?>


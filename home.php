<?php
$page = $_GET['page'];
	$qsp = $_SESSION['sesQSP'];
	$quh = $_SESSION['sesQUH'];
	$qum = $_SESSION['sesQUM'];
	$hari_s = getHari(date("w"));
	echo "
	<h1 class='page-header'>SELAMAT DATANG</h1>
	<p>Hai <b>$_SESSION[uNama]</b>, selamat datang di halaman Sistem Monitoring Laporan KKN.<br> Silahkan klik menu pilihan yang berada 
	di sebelah kiri untuk mengelola akun anda. </p>
	<p>&nbsp;</p>
	<p>Login : $hari_s, ".getTglIndo(date('Y m d'))." | ".date('H:i:s')." WIB</p><hr>";



	if ($_SESSION['uLevel']==3){
		include 'mod/mahasiswa/judul.php';
	}elseif ($_SESSION['uLevel']=='2'){
		if ($_GET['mode']=='baca'){
			mysql_query("UPDATE konsultasi SET kBaca='1'");
			echo "<script>
					setTimeout('window.location.href=\"media.php?page=bimbingan\"',100)
					</script>";
		}
		
		$jdkomen = getNumRows("SELECT a.kkId,b.kId FROM komentar a 
									  LEFT JOIN konsultasi b ON a.kId=b.kId
									  WHERE a.kkOleh!='$_SESSION[uId]' AND a.kkBaca='0' AND b.dosId='$_SESSION[uId]'");
		if ($jdkomen>0){
			$jdkon = "<div class='alert alert-block alert-success'>
							<p>
								<strong>
								<i class='icon-comments'></i>
								Anda memiliki $jdkomen pesan baru
								</strong>
							</p>
							<p>
								<a href='media.php?page=bimbingan' class='btn btn-small btn-success'>Lihat Pesan</a>
							</p>
						</div>";
			//$jkon = "<span data-rel='tooltip' data-placement='right' data-original-title='$jnkonsul Konsultasi Belum Diperiksa' class='badge badge-info'>
							//$jnkonsul
						//</span>";
		}else{
			$jdkon = "";
		}
		echo $jdkon;
  		?>
  		<?php
if($_GET[act]=="judulacc"){
$e = mysql_fetch_array(mysql_query("SELECT a.*,b.* FROM penugasan a JOIN mahasiswa b ON a.nkel=b.nkel WHERE a.pid='$_GET[id]'"));

?>
<div class="widget-box">
<div class="widget-header widget-header-flat"><h2 class="smaller">Terima Judul Buku Laporan</h2></div>
<div class="widget-body">
<div class="widget-main">

	<!-- FORM -->
	<form method="POST" enctype="multipart/form-data" class="form-horizontal">
		<input type="hidden" name="id" value="<?php echo $e['pid'];?>">
		<div class="control-group">
			<label class="control-label" for="nim">Judul Laporan</label>
			<div class="controls">
				<input class="input-large" type="text" id="judul" name="judul" value="<?php echo $e[judul];?>" readonly required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nim">No. Kel</label>
			<div class="controls">
				<input class="input-large" type="text" id="nim" name="nim" value="<?php echo $e[nkel];?>" readonly required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nama">Nama Kelompok</label>
			<div class="controls">
				<input class="input-xlarge" type="text" id="nama" name="nama" value="<?php echo $e[mNama];?>" readonly required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nama">Desa / Kota</label>
			<div class="controls">
				<input class="input-xlarge" type="text" id="nama" name="nama" value="<?php echo $e[mDesaKota];?>" readonly required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nama">Status Judul</label>
			<div class="controls">
				<input class="input-xlarge" type="text" id="nama" name="nama" value="Terima" readonly required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nama">Komentar</label>
			<div class="controls">
				<textarea name="komentar" id="komentar"></textarea>
			</div>
		</div>
		
		<div class="form-actions">
			<button class="btn btn-info" type="submit" name="simpan">
				<i class="icon-save bigger-110"></i>Simpan
			</button>
			<a class="btn" href="media.php?page=<?php echo $_GET[page];?>">
				<i class="icon-undo bigger-110"></i>Batal
			</a>
		</div>
	</form>
	<!-- FORM -->
	<?php
	if (isset($_POST[simpan])){
		$q= mysql_query("UPDATE penugasan SET statJudul='2',
		judul='$_POST[judul]', komentar='$_POST[komentar]' WHERE pid='$_POST[id]'");
		

		if ($q){
			echo "<script>
			 		notifsukses('Success','Data Tersimpan..!!');
			  		setTimeout('window.location.href=\"media.php?page=$page\"', 2000)
			      </script>";

		}else{
			echo "<script>
			      notiferror('Failed','Data Gagal Tersimpan..!!');
			  		setTimeout(function() { history.go(-1); }, 2000);
			      </script>";
		}
	}
}elseif ($_GET[act]=="judultolak") {
		$e = mysql_fetch_array(mysql_query("SELECT a.*,b.* FROM penugasan a JOIN mahasiswa b ON a.nkel=b.nkel WHERE a.pid='$_GET[id]'"));

?>
<div class="widget-box">
<div class="widget-header widget-header-flat"><h2 class="smaller">Terima Judul Buku Laporan</h2></div>
<div class="widget-body">
<div class="widget-main">

	<!-- FORM -->
	<form method="POST" enctype="multipart/form-data" class="form-horizontal">
		<input type="hidden" name="id" value="<?php echo $e['pid'];?>">
		<div class="control-group">
			<label class="control-label" for="nim">Judul Laporan</label>
			<div class="controls">
				<input class="input-large" type="text" id="judul" name="judul" value="<?php echo $e[judul];?>" readonly required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nim">No. Kel</label>
			<div class="controls">
				<input class="input-large" type="text" id="nim" name="nim" value="<?php echo $e[nkel];?>" readonly required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nama">Nama Kelompok</label>
			<div class="controls">
				<input class="input-xlarge" type="text" id="nama" name="nama" value="<?php echo $e[mNama];?>" readonly required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nama">Desa / Kota</label>
			<div class="controls">
				<input class="input-xlarge" type="text" id="nama" name="nama" value="<?php echo $e[mDesaKota];?>" readonly required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nama">Status Judul</label>
			<div class="controls">
				<input class="input-xlarge" type="text" id="nama" name="nama" value="Ditolak" readonly required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nama">Komentar</label>
			<div class="controls">
				<textarea name="komentar" id="komentar"></textarea>
			</div>
		</div>
		
		<div class="form-actions">
			<button class="btn btn-info" type="submit" name="simpan">
				<i class="icon-save bigger-110"></i>Simpan
			</button>
			<a class="btn" href="media.php?page=<?php echo $_GET[page];?>">
				<i class="icon-undo bigger-110"></i>Batal
			</a>
		</div>
	</form>
	<!-- FORM -->
	<?php
	if (isset($_POST[simpan])){
		$q= mysql_query("UPDATE penugasan SET statJudul='1',
		judul='$_POST[judul]',  komentar='$_POST[komentar]' WHERE pid='$_POST[id]'");
		

		if ($q){
			echo "<script>
			 		notifsukses('Success','Data Tersimpan..!!');
			  		setTimeout('window.location.href=\"media.php?page=$page\"', 2000)
			      </script>";

		}else{
			echo "<script>
			      notiferror('Failed','Data Gagal Tersimpan..!!');
			  		setTimeout(function() { history.go(-1); }, 2000);
			      </script>";
		}
	}
	?>
</div>
</div>
</div>
<?php

}else{
	?>
		<div class="table-header">
		   DAFTAR JUDUL BUKU LAPORAN KKN
		</div>
		<div class="row-fluid">
		<table id="myTable" class="table table-striped table-bordered table-hover">
		<thead>
		    <tr>
		    <th class="center" width="30px">No</th>
		    <th class="center" width="30px">No. Kel.</th>
		    <th class="center" width="100px">Nama Kelompok</th>
		    <th class="center" width="110px">Judul Laporan</th>
		    <th class="center" width="90px">Penyunting</th>
		    <th class="center" width="50px">Status</th>
		    <th class="center" width="30px">Aksi</th>
		    <th class="center" width="80px">Komentar</th>
		    </tr>
		</thead>
		<tbody>
		<?php
	 	$qry = mysql_query("SELECT a.*,b.* FROM penugasan a
	 							  LEFT JOIN mahasiswa b ON a.nkel=b.nkel
	 							 where a.id_dosen='$_SESSION[uId]'");
	 	
		 while ($d = mysql_fetch_array($qry)){
	      ?>
	      <tr>
	      <?php
	      $no++;
	      $tgl = getTglIndo($d[sTgl]);
	      $peny = getValue("nama_lengkap","dosen","id_dosen='$d[id_dosen]'");
	      ?>

	      <td class='center'><?php echo "$no" ?></td>
	      <td class='center'><?php echo "$d[nkel]" ?></td>
	      <td class='center'><?php echo "$d[mNama]" ?></td>
	      <td class='center'><?php echo "$d[judul]" ?></td>
	      <td class='center'><?php echo"$peny" ?></td>
	      <td class="center">
	      <?php
	      if ($d[statJudul]=='0') {
	      	echo "<span class='badge badge-warning'>Belum Disetujui</span>";
	      }elseif ($d[statJudul]=='1') {
	      	echo "<span class='badge badge-danger'>Ditolak</span>";
	      }elseif ($d[statJudul]=='2') {
	      	echo"<span class='badge badge-success'>Sudah Disetujui</span>";
	      }else{
	      	echo "<span class='badge badge-warning'>Belum Disetujui</span>";
	      }
	      ?>
	      </td>
	      <td class="center">
	      	<div class='inline position-relative'>
              <button class='btn btn-minier btn-primary dropdown-toggle' data-toggle='dropdown'><i class='icon-cog icon-only bigger-110'></i></button>
              <ul class='dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close'>
                  <li><a href=<?php echo "?page=$page&act=judulacc&id=$d[pid]"?> class='tooltip-success' data-rel='tooltip' data-original-title='Terima'>
                      <span class='green'><i class='icon-check bigger-120'></i></span>
                      </a>
                  </li>
                  <li><a href='<?php echo "?page=$page&act=judultolak&id=$d[pid]"?> class='tooltip-error' data-rel='tooltip' data-original-title='Tolak'>
                      <span class='red'><i class='icon-remove bigger-120 bigger-120'></i></span>
                      </a>
                  </li>
	              </ul>
	            </div>
	      </td>
	      <td><?php echo "$d[komentar]" ?></td>
	     </tr>
	   <?php
	   }
	 }
	   ?>
		</tbody>
		</table>
		</div>
		<?php
	}
	?>
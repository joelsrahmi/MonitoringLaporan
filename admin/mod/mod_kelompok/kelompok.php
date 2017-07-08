<?php
	$page = $_GET['page'];
?>
<div class="row-fluid">
<div class="span12">
<?php
if($_GET[act]=="tambah"){
?>
<div class="widget-box">
<div class="widget-header widget-header-flat">
<h2 class="smaller">Tambah Kelompok</h2>
</div>
<div class="widget-body">
<div class="widget-main">

	<!-- FORM -->
	<form method="POST" enctype="multipart/form-data" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="foto">Foto</label>
			<div class="controls">
				<div id="foto">
					<div class="span2" data-rel="tooltip" data-placement="right" data-original-title="Ukuran File Gambar Tidak Boleh Lebih 300kb">
						<input type="file" name="fupload" required> 
					</div>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nkel">No. Kelompok</label>
			<div class="controls">
				<input class="input-large" type="text" id="nkel" name="nkel" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nama">Nama Kelompok</label>
			<div class="controls">
				<input class="input-xlarge" type="text" id="nama" name="nama" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="alamat">Desa / Kota</label>
			<div class="controls">
				<input class="input-xxlarge" type="text" id="desakota" name="desakota" placeholder="Contoh: Cibodas / Bogor" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telp">Telp/HP</label>
			<div class="controls">
				<div class="input-append">
				<input class="input-medium" type="text" id="telp" name="telp" required>
				<span class="add-on"><i class="icon-phone"></i></span>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email">Email</label>
			<div class="controls">
				<div class="input-append">
				<input class="input-xlarge" type="email" id="email" name="email" required>
				<span class="add-on"><i class="icon-envelope"></i></span>
				</div>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="username">Username</label>
			<div class="controls">
				<input class="input-medium" type="text" id="username" name="username" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="password">Password</label>
			<div class="controls">
				<input class="input-medium" type="password" id="password" name="password" required>
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
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
  		$tipe_file      = $_FILES['fupload']['type'];
  		$nama_file      = $_FILES['fupload']['name'];
  		$acak           = rand(1,99);
  		$foto = $acak.$nama_file;
		$pass = md5($_POST[password]);
		UploadMhs($foto);
		$a = mysql_query("INSERT INTO mahasiswa (nkel,mNama,mTelp,mEmail,mDesaKota,mfoto,username,password) VALUES ('$_POST[nkel]','$_POST[nama]','$_POST[telp]','$_POST[email]','$_POST[desakota]','$foto','$_POST[username]','$pass')");
		$b = mysql_query("INSERT INTO penugasan (nkel) VALUES ('$_POST[nkel]')");

		if ($a){
			echo "<script>
			 		notifsukses('Success','Data Tersimpan..!!');
			  		setTimeout('window.location.href=\"media.php?page=$page\"', 2000)
			      </script>";
		}else{
			echo mysql_error();
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
}elseif($_GET[act]=="edit"){
$e = mysql_fetch_array(mysql_query("SELECT * FROM mahasiswa WHERE mid='$_GET[id]'"));
?>
<div class="widget-box">
<div class="widget-header widget-header-flat"><h2 class="smaller">Edit</h2></div>
<div class="widget-body">
<div class="widget-main">

	<!-- FORM -->
	<form method="POST" enctype="multipart/form-data" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="foto">Foto</label>
			<div class="controls">
				<?php
					$ptol = "Anda belum menginput gambar, ukuran file gambar tidak boleh lebih 1MB";
					if (!empty($e[mfoto])){
						$gbrx ="<div class='span2'>
								<img class='pull-left' src='../logo_kel/$e[mfoto]' width='80%' margin='5px' data-rel='tooltip' data-placement='right' data-original-title='Foto Sekarang'>
								</div>";
						$ptol = "Abaikan jika gambar tidak diganti, ukuran file gambar tidak boleh lebih 1MB";
					}						
				?>
				<div id="foto">
					<div class="span2" data-rel="tooltip" data-placement="right" data-original-title="<?php echo $ptol;?>">
						<input type="file" name="fupload"> 
					</div>
				</div>
				<?php echo $gbrx;?>
			</div>
		</div>


		<div class="control-group">
			<label class="control-label" for="nkel">No. Kelompok</label>
			<div class="controls">
				<input class="input-large" type="text" id="nkel" name="nkel" value="<?php echo $e[nkel];?>" readonly required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nama">Nama Kelompok</label>
			<div class="controls">
				<input class="input-xlarge" type="text" id="nama" name="nama" value="<?php echo $e[mNama];?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="desakota">Desa / Kota</label>
			<div class="controls">
				<input class="input-xxlarge" type="text" id="desakota" name="desakota" value="<?php echo $e[mDesaKota];?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telp">Telp/HP</label>
			<div class="controls">
				<div class="input-append">
				<input class="input-medium" type="text" id="telp" name="telp" value="<?php echo $e[mTelp];?>" required>
				<span class="add-on"><i class="icon-phone"></i></span>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email">Email</label>
			<div class="controls">
				<div class="input-append">
				<input class="input-xlarge" type="email" id="email" name="email" value="<?php echo $e[mEmail];?>" required>
				<span class="add-on"><i class="icon-envelope"></i></span>
				</div>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="username">Username</label>
			<div class="controls">
				<input class="input-medium" type="text" id="username" name="username" value="<?php echo $e[username];?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="password">Password</label>
			<div class="controls">
				<input type="password" class="input-medium" id="password" name="password">
				<span class="help-inline"> * Biarkan kosong jika password tak diubah</span>
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
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
  		$tipe_file      = $_FILES['fupload']['type'];
  		$nama_file      = $_FILES['fupload']['name'];
  		$acak           = rand(1,99);
  		$foto = $acak.$nama_file;

  		if (!empty($_POST[password])){
  			$xp = md5($_POST[password]);
  			$pass = ",password='$xp'";
  		}else{
  			$pass = "";
  		}

		if (!empty($lokasi_file)){
			UploadMhs($foto);
			$ft = getValue("mfoto","mahasiswa","mid='$_POST[mid]'");
			if (!$ft==""){
				unlink("../logo_kel/$ft");
			}

			$q= mysql_query("UPDATE mahasiswa SET mNama='$_POST[nama]',
														 mTelp='$_POST[telp]',mEmail='$_POST[email]',desakota='$_POST[alamat]',
														 mFoto='$foto',username='$_POST[username]' $pass
												WHERE mid='$_GET[id]'");
		}else{
			$q= mysql_query("UPDATE mahasiswa SET mNama='$_POST[nama]',
														 mTelp='$_POST[telp]',mEmail='$_POST[email]',desakota='$_POST[alamat]',
														 mFoto='$foto',username='$_POST[username]' $pass
												WHERE mid='$_GET[id]'");
		}

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
	<?php
		if ($_GET[mode]=="hapus"){
			$xx = getData("mid,mNama,mfoto","mahasiswa","mid='$_GET[id]'");
			if (!$xx[0]==""){
				if (!empty($xx[2])){
					unlink("../logo_kel/$xx[2]");
				}
				mysql_query("DELETE FROM mahasiswa WHERE mid='$_GET[id]'");
				echo "<script>
				 		notifsukses('Success','Data Terhapus..!!');
				  		setTimeout('window.location.href=\"media.php?page=$page\"', 2000)
				      </script>";
			}else{
				echo "<script>window.location=('media.php?page=$page')</script>";
			}
		}
	?>
	<button onclick="NewWindow('../cetak/lapkelompok.php','ZoomIn','850','550','yes');return false" class="btn btn-primary">
		<i class="icon-print bigger-100"></i>Cetak
	</button><br><br>
	<div class="table-header">
	   DATA MAHASISWA
	</div>
	<div class="row-fluid">
	<table id="myTable" class="table table-striped table-bordered table-hover">
	<thead>
	    <tr>
	    <th class="center" width="40px">No</th>
	    <th class="center" width="150px">No. Kel</th>
	    <th class="center">Nama Kel</th>
	    <th class="hidden-480 center" width="100px">Desa / Kota</th>
	    <th class="center" width="100px">Telp</th>
	    <th class="hidden-480 center" width="100px">Email</th>
	    <th class="hidden-480 center" width="100px">Username</th>
		 <th class="center" width="40px">Aksi</th>
	    </tr>
	</thead>
	<tbody>
	 <?php
	 	$qry = mysql_query("SELECT * FROM mahasiswa 
	 							  ORDER BY nkel ASC");
		while ($d = mysql_fetch_array($qry)){
	      ?>
	      <tr>
	      <?php
	      $no++;
	      echo "
	      <td class='center'>$no</td>
	      <td class='center'>$d[nkel]</td>
	      <td>$d[mNama]</td>
	      <td class='hidden-480 center'>$d[mDesaKota]</td>
	      <td class='center'>$d[mTelp]</td>
	      <td class='hidden-480'>$d[mEmail]</td>
	      <td class='center hidden-480'>$d[username]</a></td>
	      <td class='center'>
            <div class='inline position-relative'>
              <button class='btn btn-minier btn-primary dropdown-toggle' data-toggle='dropdown'><i class='icon-cog icon-only bigger-110'></i></button>
              <ul class='dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close'>
                  <li><a href='?page=$page&act=edit&id=$d[mid]' class='tooltip-success' data-rel='tooltip' data-original-title='Edit'>
                      <span class='green'><i class='icon-edit bigger-120'></i></span>
                      </a>
                  </li>
                  <li><a href='?page=$page&mode=hapus&id=$d[mid]' onclick='return qh();' class='tooltip-error' data-rel='tooltip' data-original-title='Delete'>
                      <span class='red'><i class='icon-trash bigger-120'></i></span>
                      </a>
                  </li>
	              </ul>
	            </div>
		      </td>";
	      ?>
	     </tr>
	   <?php
	   }
	   ?>
	</tbody>
	</table>
	</div>
<?php
}
?>
</div>
</div>
<div class="row-fluid ">
<div class="span12">
	<div class="span4">
		<?php
			$e = mysql_fetch_array(mysql_query("SELECT * FROM mahasiswa WHERE mid='$_SESSION[uId]'"));
			$did = $e[mid];
			$npage = "home";
		?>
		<div id="user-profile-1" class="user-profile row-fluid">
			<div class="span12 center">
				<div>
					<span class="profile-picture">
						<?php
							if ($e[mfoto]=="") {
								echo "<img style='max-width:100px;max-height:100px;' alt='$e[mNama]' src='images/photo.jpg'>";
							}else{
								echo "<img style='max-width:200px;max-height:200px;' alt='$e[mNama]' src='logo_kel/$e[mfoto]'>";
							}
						?>
					</span>
					<div class="space-4"></div>
					<div class="width-80 label label-info label-large arrowed-in arrowed-in-right">
						<div class="inline position-relative">
							<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
								<span class="white middle bigger-120"><?php echo $e[nkel]." - ".$e[mNama];?></span>
							</a>
						</div>
					</div>
				</div>
				<div class="space-6"></div>
				<div class="profile-contact-info">
					<div class="profile-contact-links align-left">
						<a class="btn btn-link" href="#"><i class="icon-home bigger-120 green"></i><?php echo $e[mDesaKota];?></a><br>
						<a class="btn btn-link" href="#"><i class="icon-envelope bigger-120 orange"></i><?php echo $e[mEmail];?></a><br>
						<a class="btn btn-link" href="#"><i class="icon-phone bigger-120 blue"></i><?php echo $e[mTelp];?></a><br>
					</div>
				</div>
				<div class="space-6"></div>
				
				</div>
		</div>
	</div>
	<div class="span8">
		<div class="span12">
			<?php
					$cekjudul = mysql_num_rows(mysql_query("SELECT sId FROM skripsi WHERE mid='$did' AND (sStatus='0' OR sStatus='2')"));
					if ($cekjudul>0){
						$jterima = mysql_fetch_array(mysql_query("SELECT * FROM skripsi WHERE mid='$did' AND sStatus='2'"));
						if (isset($jterima['sId'])){
							$pem1 = getValue("nama_lengkap","dosen","id_dosen='$jterima[sPem1]'");
	      				$pem2 = getValue("nama_lengkap","dosen","id_dosen='$jterima[sPem2]'");
							?>
							<div class="alert alert-block alert-success">
								<p>
									<strong><i class="icon-ok"></i>Judul Telah Diterima..!</strong><br><br>
									"<?php echo $jterima['sJudul']?>"<br><br>
									Pembimbing I : <?php echo $pem1;?><br>
									Pembimbing II : <?php echo $pem2;?><br>
								</p>
								<p>
									<button onclick="NewWindow('cetak/skpem.php?sid=<?php echo $jterima['sId'];?>','ZoomIn','850','550','yes');return false" class="btn btn-small btn-success">Cetak SK</button>
								</p>
							</div>
							<span class="btn btn-block btn-primary no-hover center" onclick="window.location='media.php?page=konsul'" data-rel="tooltip" data-original-title="Judul Diterima : <?php echo $jterima[sJudul];?>">
								<span class="bigger-275"><i class="icon-exchange"></i> Konsultasi</span>
							</span>
							<?php
						}else{
							?>
							<div class="alert alert-block alert-info">
								<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>
								Judul yang anda ajukan sebelumnya masih menunggu untuk diverifikasi oleh bagian akademik.
								apabila judul <b>diterima</b>, maka akan tampil menu konsultasi.<br><br>
								Namun jika judul yang anda ajukan <b>ditolak</b>, maka silahkan untuk mengajukan judul kembali.
							</div>
							<?php
						}
					?>
					<?php
					}else{
						$a = mysql_fetch_array(mysql_query("SELECT a.*, b.* FROM penugasan a JOIN mahasiswa b on a.nkel=b.nkel where mid='$_SESSION[uId]'"));
					?>

						<div class="widget-box align-left">
						<div class="widget-header widget-header-flat"><h2 class="smaller">Input Judul</h2></div>
						<div class="widget-body">
						<div class="widget-main">
							<!-- FORM -->
							<form method="POST" enctype="multipart/form-data" class="form-horizontal">
							<input type="hidden" name="id" value="<?php echo $a['pid'];?>">
								<div class="control-group">
									<label class="control-label" for="judul">Judul</label>
									<div class="controls">
										<input class="input-xxlarge" type="text" id="judullaporan" name="judullaporan" placeholder="Judul Buku Laporan" required>
									</div>
								</div>						
								<div class="form-actions">
									<button class="btn btn-info" type="submit" name="simpan">
										<i class="icon-save bigger-110"></i>Simpan
									</button>
								</div>
							</form>
							<!-- FORM -->
							<?php
								$tgls = date('Y-m-d');
							if (isset($_POST[simpan])){
									
							$b = mysql_query("UPDATE penugasan SET judul='$_POST[judullaporan]', sTgl='$tgls' where pid='$_POST[id]'");

								if ($b){
									echo "<script>
									 		notifsukses('Success','Data Tersimpan..!!');
									  		setTimeout('window.location.href=\"media.php?page=$npage\"', 2000)
									      </script>";
								}else{
									echo "<script>
									      notiferror('Failed','Data Gagal Tersimpan..!!');
									  		setTimeout('window.location.href=\"media.php?page=$npage\"', 2000)
									      </script>";
								}
							}
							?>
						</div>
						</div>
						</div>
					<?php
					}
				?>
		</div>
	</div>
</div><!--span12-->
</div>
<div class="row-fluid">
<div class="span12">
	<div class="table-header">
	   JUDUL BUKU LAPORAN YANG TELAH DIAJUKAN
	</div>
	<div class="row-fluid">
	<table id="myTable" class="table table-striped table-bordered table-hover">
	<thead>
	    <tr>
	    <th class="center" width="40px">No</th>
	    <th class="center" width="80px">No. Kelompok</th>
	    <th class="center" width="150px">Nama Kelompok</th>
	    <th class="center">Judul Yang Diajukan</th>
	    <th class="center" width="250px">Pembimbing</th>
	    <th class="center" width="250px">Status</th>

	    </tr>
	</thead>
	<tbody>
	 <?php
	 	$qry = mysql_query("SELECT a.*,b.* FROM penugasan a
	 							  LEFT JOIN mahasiswa b ON a.nkel=b.nkel
	 							  where mid='$_SESSION[uId]'");
	 	
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
	      <td class='center'>
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
	     </tr>
	   <?php
	   }
	   ?>
	</tbody>
	</table>
	</div>
</div>
</div>
</div><!--row-fluid-->
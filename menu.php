<ul class="nav nav-list">
	<li class="active"><a href="index.php"><i class="icon-external-link"></i><span class="menu-text">Halaman Utama</span></a></li>
	<li><a href="?page=home"><i class="icon-home"></i><span class="menu-text">Beranda</span></a></li>
	<div class="sidebar-collapse" id=""></div>
	<?php
	if ($_SESSION['uLevel']==2){
		$jnkonsul = getNumRows("SELECT kId FROM konsultasi WHERE dosId='$_SESSION[uId]' AND kBaca='0'");
		if ($jnkonsul>0){
			$jkon = "<span data-rel='tooltip' data-placement='right' data-original-title='$jnkonsul Konsultasi Belum Diperiksa' class='badge badge-info'>
							$jnkonsul
						</span>";
		}else{
			$jkon = "";
		}
	?>
		<li><a href="?page=bimbingan" class="dropdown-toggle"><i class="icon-cloud-download"></i><span class="menu-text">Bimbingan <?php echo $jkon;?></span></a></li>
		
	<?php
	}else{
		$cjudul = mysql_num_rows(mysql_query("SELECT a.*, b.* FROM penugasan a LEFT JOIN mahasiswa b ON a.nkel=b.nkel WHERE a.statJudul='2' AND b.mid='$_SESSION[uId]'"));
  		if($cjudul>0){
  			$jnkomen = getNumRows("SELECT a.kkId,b.sId,c.pid,d.* FROM komentar a
  				LEFT JOIN konsultasi b ON a.kId=b.kId
  				LEFT JOIN penugasan c ON b.pid=c.pid
  				LEFT JOIN mahasiswa d ON c.nkel=c.nkel
  				WHERE a.kkOleh!='$_SESSION[uId]' AND a.kkBaca='0' AND d.mid='$_SESSION[uId]'");
			if ($jnkomen>0){
				$jkom = "<span  data-rel='tooltip' data-placement='right' data-original-title='$jnkonsul Komentar Baru' class='badge badge-info'>
								$jnkomen
							</span>";
			}else{
				$jkom = "";
			}
  			echo "<li><a href='?page=konsul' class='dropdown-toggle'><i class='icon-cloud-upload'></i><span class='menu-text'>Konsultasi $jkom</span></a></li>";
  		}
  		?>
		<li><a href="?page=dosen" class="dropdown-toggle"><i class="icon-group"></i><span class="menu-text">Info Penyunting</span></a></li>
	<?php
	}
	?>
	<div class="sidebar-collapse" id=""></div>
</ul><!--/.nav-list-->
<?php
	$page = $_GET['page'];
?>
<div class="row-fluid">
<div class="span12">
<?php
if($_GET[act]=="terima"){
$e = mysql_fetch_array(mysql_query("SELECT a.*,b.* FROM penugasan a LEFT JOIN mahasiswa b ON a.nkel=b.nkel WHERE a.pid='$_GET[id]'"));

?>
<div class="widget-box">
<div class="widget-header widget-header-flat"><h2 class="smaller">Penugasan Pembimbing</h2></div>
<div class="widget-body">
<div class="widget-main">

	<!-- FORM -->
	<form method="POST" enctype="multipart/form-data" class="form-horizontal">
		<input type="hidden" name="id" value="<?php echo $e['sId'];?>">
		<div class="control-group">
			<label class="control-label" for="nim">No. Kel</label>
			<div class="controls">
				<input class="input-large" type="text" id="nim" name="nim" value="<?php echo $e[nKel];?>" readonly required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nama">Nama</label>
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
			<label class="control-label" for="nama">Penyunting</label>
			<div class="controls">
				<input class="input-xlarge" type="text" id="nama" name="nama" value="<?php echo $e[mDesaKota];?>" readonly required>
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
		$q= mysql_query("UPDATE penugasan SET status='2',
														id_dosen='$_POST[]',
														sPem2='$_POST[penyunting]'
												WHERE nkel='$_POST[nkel]'");
		

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
	<button onclick="NewWindow('../cetak/lapjdaftar.php','ZoomIn','850','550','yes');return false" class="btn btn-primary">
		<i class="icon-print bigger-100"></i>Cetak
	</button><br><br>
	<div class="table-header">
	   KELOMPOK YANG BELUM MEMILIKI PENYUNTING
	</div>
	<div class="row-fluid">
	<table id="myTable" class="table table-striped table-bordered table-hover">
	<thead>
	    <tr>
	    <th class="center" width="40px">No</th>
	    <th class="center" width="80px">No. Kelompok</th>
	    <th class="center" width="150px">Nama Kelompok</th>
	    <th class="hidden-480 center" width="100px">Desa / Kota</th>
		 <th class="center" width="40px">Aksi</th>
	    </tr>
	</thead>
	<tbody>
	 <?php
	 	$qry = mysql_query("SELECT a.*, b.* FROM penugasan a 
		  LEFT JOIN mahasiswa b ON a.nkel=b.nkel
		  WHERE a.status='0'
		  ORDER BY a.nkel DESC");
		while ($d = mysql_fetch_array($qry)){
	      ?>
	      <tr>
	      <?php
	      $no++;	      
	      $tgl = getTglIndo($d['sTgl']);
	      echo 
	      <td class='center'>$no</td>
	      <td class='center'>$d[nkel]</td>
	      <td>$d[mNama]</td>
	      <td>$d[mDesaKota]</td>
	      <td class='center'>
            <div class='inline position-relative'>
              <button class='btn btn-minier btn-primary dropdown-toggle' data-toggle='dropdown'><i class='icon-cog icon-only bigger-110'></i></button>
              <ul class='dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close'>
                  <li><a href='?page=$page&act=terima&id=$d[sId]' class='tooltip-success' data-rel='tooltip' data-original-title='Terima'>
                      <span class='green'><i class='icon-check bigger-120'></i></span>
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
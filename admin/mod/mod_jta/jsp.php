<?php
	$page = $_GET['page'];
	
?>
<!---PENUGASAN PENYUNTING-->
<button onclick="NewWindow('../cetak/lapjterima.php','ZoomIn','850','550','yes');return false" class="btn btn-primary">
		<i class="icon-print bigger-100"></i>Cetak
	</button><br><br>
<div class="row-fluid">
<div class="span12">
	<div class="table-header">
	   PENUGASAN PENYUNTING
	</div>
	<div class="row-fluid">
	<table id="myTable" class="table table-striped table-bordered table-hover">
	<thead>
	    <tr>
	    <th class="center" width="40px">No</th>
	    <th class="center" width="80px">No. Kelompok</th>
	    <th class="center" width="150px">Nama Kelompok</th>
	    <th class="center" width="150px">Desa / Kota</th>
	    <th class="center" width="250px">Penyunting</th>
	    </tr>
	</thead>
	<tbody>
	 <?php
	 	$qry = mysql_query("SELECT a.*,b.* FROM penugasan a
	 							  LEFT JOIN mahasiswa b ON a.nkel=b.nkel
	 							  WHERE a.status='2' ORDER BY a.pid ASC");
		while ($d = mysql_fetch_array($qry)){
	      $no++;
	      $tgl = getTglIndo($d['sTgl']);
	      $peny = getValue("nama_lengkap","dosen","id_dosen='$d[id_dosen]'");
	      
	      $tgls = date("Y-m-d");
	      echo "
	      <tr>
	      <td class='center'>$no</td>
	      <td class='center'>$d[nkel]</td>
	      <td class='center'>$d[mNama]</td>
	      <td class='center'>$d[mDesaKota]</td>
	      <td class='center'>$peny</td>"
	      ?>
	     </tr>
	   <?php
	   }
	   ?>
	</tbody>
	</table>
	</div>
</div>
</div>
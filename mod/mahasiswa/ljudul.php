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
	 							  WHERE a.statJudul='2' ORDER BY a.pid ASC");
		while ($d = mysql_fetch_array($qry)){
	      ?>
	      <tr>
	      <?php
	      $no++;
	      $tgl = getTglIndo($d[sTgl]);
	      $peny = getValue("nama_lengkap","dosen","id_dosen='$d[penyunting]'");
	      echo "
	      <td class='center'>$no</td>
	      <td class='center'>$d[nkel]</td>
	      <td>$d[mNama]</td>
	      <td>$d[judul]</td>
	      <td>
	      	Penyunting I : $pem1<br>
	      </td>";
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
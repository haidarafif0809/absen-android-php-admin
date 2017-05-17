<?php 
include 'header.php';
include 'navbar.php';
include 'android/db.php';
 ?>


<div class="container">
	
		<form class="form-inline">

		<div class="form-group">
		   
		   <select class="form-control" name="nik">
		   	<?php 
		   		$query_user = $db->query("SELECT * FROM daftar_karyawan ");
		   		while ($data_user = $query_user->fetch_array()) {
		   			# code...
		   			echo "<option value='".$data_user['nik']."'>".$data_user['nik']." | ".$data_user['nama']."</option>";
		   		}


		   	 ?>
		   </select>
		  
		  </div>
		  <div class="form-group">
		   
		   <input type="text" class="form-control datepicker" id="dari_tanggal" name="dari_tanggal" placeholder="Dari Tanggal">
		  
		  </div>
		  <div class="form-group">

		    <input type="text" class="form-control datepicker" id="pwd" name="sampai_tanggal" placeholder="Sampai Tanggal">
		  </div>

	  <button type="submit" class="btn btn-default">Cari</button>
	</form>
	<br>
<div class="table-responsive">
	<table class="table table-bordered datatable">
		
	<thead>
		<th>NIK</th>
		<th>Waktu Masuk</th>
		<th>Waktu Pulang</th>
		<th>Lokasi Masuk</th>
		<th>Lokasi Pulang</th>
		<th>Foto Masuk</th>
		<th>Foto Pulang</th>


	</thead>
	<tbody>
	<?php 

	if (isset($_GET['nik'])) {
		# code...

		$nik = $_GET['nik'];
		$dari_tanggal = tanggal_mysql($_GET['dari_tanggal']);
		$sampai_tanggal = tanggal_mysql($_GET['sampai_tanggal']);

		$query_presensi = $db->query("SELECT * FROM presensi WHERE tanggal_masuk >= '$dari_tanggal' AND tanggal_masuk <= '$sampai_tanggal'");

		while ($data_presensi = $query_presensi->fetch_array()) {
			
			echo "<tr>
			<td>".$nik."</td>
			<td>".$data_presensi['waktu_masuk']."</td>
			<td>".$data_presensi['waktu_pulang']."</td>
			<td>".$data_presensi['lokasi_absen_masuk']."</td>
			<td>".$data_presensi['lokasi_absen_pulang']."</td>
			<td><a href='android/".$data_presensi['gambar']."'> <img class='img-responsive' width='80px' height='80px' src='android/".$data_presensi['gambar']."'></a></td>
			<td><a href='android/".$data_presensi['gambar_pulang']."'><img class='img-responsive'  width='80px' height='80px' src='android/".$data_presensi['gambar_pulang']."'</a></td>
			</tr>";
		}
	}

	 ?>
	</tbody>
	 	</table>

	 	</div>



</div>

 <?php include 'footer.php'; ?>
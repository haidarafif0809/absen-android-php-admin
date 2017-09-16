<?php 
include 'header.php';
include 'navbar.php';
include 'android/db.php';
 ?>


<div class="container">
	
		<form class="form-inline">

		<div class="form-group ">
		   
		   <select class="form-control" name="nik" id="nik" required="">
		   <option value="">-- pilih karyawan --</option>
		   	<?php 
		   		$query_user = $db->query("SELECT * FROM daftar_karyawan ");
		   		while ($data_user = $query_user->fetch_array()) {
		   			# code...
		   			echo "<option value='".$data_user['nik']."'>".$data_user['nik']." | ".$data_user['nama']."</option>";
		   		}


		   	 ?>
		   </select>
		  
		  </div> 
		
			<div class="form-group ">
				 <input type="text" class="form-control datepicker" id="dari_tanggal" name="dari_tanggal" placeholder="Dari Tanggal" required="">
			</div>
			<div class="form-group ">
			    <input type="text" class="form-control datepicker" id="pwd" name="sampai_tanggal" placeholder="Sampai Tanggal" required="">
		</div>

		  <!-- / end row tanggal -->
		<div class="checkbox">
		  <label><input type="checkbox" value="1" name="tampil_foto">Tampil Foto</label>
		</div>
		<div class="checkbox">
		  <label><input type="checkbox" value="1" name="tampil_lokasi">Tampil Lokasi</label>
		</div>

	  <button type="submit" class="btn btn-default">Cari</button>
	</form>
	<br>

<div class="table-responsive">
	<table class="table table-bordered datatable">
		
	<thead>
		<th>NIK</th>
		<th>Waktu Masuk</th>
		<th>Keterangan Masuk</th>
		<th>Waktu Pulang</th>
		<th>Keterangan Pulang</th>
		<?php if (isset($_GET['tampil_lokasi'])): ?>
			<th>Lokasi Masuk</th>
		<th>Lokasi Pulang</th>	
		<?php endif ?>
	<?php if (isset($_GET['tampil_foto'])): ?>
		<th>Foto Masuk</th>
		<th>Foto Pulang</th>
	<?php endif ?>
		


	</thead>
	<tbody>
	<?php 

	if (isset($_GET['nik'])) {
		# code...

		$nik = $_GET['nik'];
		$dari_tanggal = tanggal_mysql($_GET['dari_tanggal']);
		$sampai_tanggal = tanggal_mysql($_GET['sampai_tanggal']);

		$query_presensi = $db->query("SELECT * FROM presensi WHERE nik = '$nik' AND  tanggal_masuk >= '$dari_tanggal' AND tanggal_masuk <= '$sampai_tanggal'");

		while ($data_presensi = $query_presensi->fetch_array()) {
			
			echo "<tr>
			<td>".$nik."</td>
			<td>".$data_presensi['waktu_masuk']."</td>
			<td>".$data_presensi['keterangan_masuk']."</td>
		
			<td>".$data_presensi['waktu_pulang']."</td>
				<td>".$data_presensi['keterangan_pulang']."</td>";
			if (isset($_GET['tampil_lokasi'])) {
			
	echo "<td>".$data_presensi['lokasi_absen_masuk']."</td>
			<td>".$data_presensi['lokasi_absen_pulang']."</td>";
			}
				if (isset($_GET['tampil_foto'])) {
						echo "<td><a href='android/".$data_presensi['gambar']."'> <img class='img-responsive' width='80px' height='80px' src='android/".$data_presensi['gambar']."'></a></td>
			<td><a href='android/".$data_presensi['gambar_pulang']."'><img class='img-responsive'  width='80px' height='80px' src='android/".$data_presensi['gambar_pulang']."'</a></td>
			";
			}

		
			echo "</tr>";
		}
	}

	 ?>
	</tbody>
	 	</table>

	 	</div>
	 	<?php if (isset($_GET['nik'])): ?>
	 		
	 	<a href="export_rekap.php?nik=<?php echo $_GET['nik'] ?>&dari_tanggal=<?php echo $_GET['dari_tanggal'] ?>&sampai_tanggal=<?php echo $_GET['sampai_tanggal'] ?>" class="btn btn-success">Export Rekap Presensi</a>

	 	<?php endif ?>

</div>

<script type="text/javascript">
	$("#nik").selectize({
placeholder: "-- pilih karyawan --",
    sortField: 'text'
});

</script>

 <?php include 'footer.php'; ?>
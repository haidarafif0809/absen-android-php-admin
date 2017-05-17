<?php 
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=rekap_presensi.xls");

include 'android/db.php';

 ?>


 <table>
 	<thead>
 		<th>NIK</th>
 		<th>waktu masuk</th>
 		<th>waktu pulang</th>
 		<th>Lokasi masuk</th>
 		<th>Lokasi Pulang</th>
 	</thead>
 	<tbody>

 	<?php 
			$nik = $_GET['nik'];
			$dari_tanggal = tanggal_mysql($_GET['dari_tanggal']);
			$sampai_tanggal = tanggal_mysql($_GET['sampai_tanggal']);

			$query_presensi = $db->query("SELECT * FROM presensi WHERE nik = '$nik' AND  tanggal_masuk >= '$dari_tanggal' AND tanggal_masuk <= '$sampai_tanggal'");

			while ($data_presensi = $query_presensi->fetch_array()) {
				
				echo "<tr>
				<td>".$nik."</td>
				<td>".$data_presensi['waktu_masuk']."</td>
				<td>".$data_presensi['waktu_pulang']."</td>";
			
		echo "<td>".$data_presensi['lokasi_absen_masuk']."</td>
				<td>".$data_presensi['lokasi_absen_pulang']."</td>";
				
					

			
				echo "</tr>";
			}

 	 ?>
 		
 	</tbody>

 </table>
<?php
include "database.php";
$controll = new database();
if(!empty($_POST['tempat'])){

	$tempat = $controll->keamanan($_POST['tempat']);
$sql = mysql_query("SELECT * FROM datajadwal where `tempat_acara`='$tempat' order by `tanggal_acara` Desc");
?>
<table id="table_data" class="table table-striped table-hover">
					<tr><th>No</th><th>Tanggal Acara</th><th>Deskripsi Acara</th><th>Pemesan</th><th>Tempat</th><th>Tanggal Pesan</th><th>Tanggal Input</th></tr>
				
<?php
$i=0;
				while($rows=mysql_fetch_array($sql)){
					$i++;
					$tgl_acara = $rows['tanggal_acara'];
					$nama_acara = $rows['nama_acara'];
					$pngguna_acara = $rows['pengguna_acara'];
					$tgl_pesan_acara = $rows['tanggal_pesan'];
					$tempat_acara = $rows['tempat_acara'];
					$tgl_input_acara = $rows['tanggal_input']; 
					echo "<tr><td>$i</td><td>$tgl_acara</td><td>$nama_acara</td><td>$pngguna_acara</td><td>$tempat_acara</td><td>$tgl_pesan_acara</td><td>$tgl_input_acara</td></tr>";
				}
				?>
				</table>
				<?php
				
}else{
	echo "error getting data!!";
}

?>
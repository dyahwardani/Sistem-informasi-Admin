<?php
include 'conn.php';
$satuan = $_GET['berangkat'];
if ($satuan==1) {
	# code...
	
    echo "<option value='Tidak ada'>tidak ada</option>";
}elseif ($satuan==2) {
	# code...
	$kota1 = mysqli_query($koneksi,"SELECT * FROM departure_juanda order by id_depart");
	echo "<option>Pilih Jadwal</option>";
	while($kor = mysqli_fetch_array($kota1)){
    echo "<option value=\"".$kor['jam']."\">".$kor['jam']."</option>\n";
	}
}elseif ($satuan==3) {
   echo "<option value='Tidak ada'>tidak ada</option>";
}
?>

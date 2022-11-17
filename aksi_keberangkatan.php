<?php
error_reporting(~E_NOTICE);
require_once 'conn.php';
$jum = count($_POST['id_travel']);
$jum2 = count($_POST['id_sewa']);

//TRAVEL
//Menghitung jumlah isi dari array
$count_id_berangkat = count($_POST['id_berangkat']);
$count_oper = count($_POST['oper']);
$count_status = count($_POST['status']);
$count_keterangan = count($_POST['keterangan']);
$count_id_travel = count($_POST['id_travel']);

//Membuat variabel array sementara untuk selanjutnya diolah
$temp_id_berangkat = $_POST['id_berangkat'];
$temp_id_travel = $_POST['id_travel'];
$temp_oper = $_POST['oper'];
$temp_status = $_POST['status'];
$temp_keterangan = $_POST['keterangan'];

//Mengecek apakah jumlah data di array lain lebih besear dari id_travel atau tidak

if ($count_id_berangkat > $count_id_travel) {
	//data yang tidak dibutuhkan di indeks awal akan dihapus lalu disimpan di variabel array sementara
	$index_max = $count_id_berangkat - $count_id_travel;
	for ($i = 0; $i < $index_max; $i++) {
		unset($temp_id_berangkat[$i]);
	}
	$temp_id_berangkat = array_values($temp_id_berangkat);
}

if ($count_oper > $count_id_travel) {
	//data yang tidak dibutuhkan di indeks awal akan dihapus lalu disimpan di variabel array sementara
	$index_max = $count_oper - $count_id_travel;
	for ($i = 0; $i < $index_max; $i++) {
		unset($temp_oper[$i]);
	}
	$temp_oper = array_values($temp_oper);
}

if ($count_status > $count_id_travel) {
	//data yang tidak dibutuhkan di indeks awal akan dihapus lalu disimpan di variabel array sementara
	$index_max = $count_status - $count_id_travel;

	for ($i = 0; $i < $index_max; $i++) {
		unset($temp_status[$i]);
	}
	$temp_status = array_values($temp_status);
}
if ($count_keterangan > $count_id_travel) {
	//data yang tidak dibutuhkan di indeks awal akan dihapus lalu disimpan di variabel array sementara
	$index_max = $count_keterangan - $count_id_travel;

	for ($i = 0; $i < $index_max; $i++) {
		unset($temp_keterangan[$i]);
	}
	$temp_keterangan = array_values($temp_keterangan);
}

for ($i = 0; $i < $jum; $i++) {
		$id_travel = $temp_id_travel[$i];
		$id_berangkat = $temp_id_berangkat[$i];
		$oper = $temp_oper[$i];
		$status = $temp_status[$i];
		$ket = $temp_keterangan[$i];
		$query = mysqli_query(
			$koneksi,
			"INSERT INTO travel_berangkat VALUES('','$id_travel',
	'$id_berangkat','$oper','$status','$ket')"
		);
}


//SEWA
//Menghitung jumlah isi dari array
$count_id_berangkat_sewa = count($_POST['id_berangkat']);
$count_oper_sewa = count($_POST['oper2']);
$count_status_sewa = count($_POST['status2']);
$count_keterangan_sewa = count($_POST['keterangan2']);
$count_id_sewa = count($_POST['id_sewa']);

//Membuat variabel array sementara untuk selanjutnya diolah
$temp_id_berangkat_sewa = $_POST['id_berangkat'];
$temp_id_sewa = $_POST['id_sewa'];
$temp_oper_sewa = $_POST['oper2'];
$temp_status_sewa = $_POST['status2'];
$temp_keterangan_sewa = $_POST['keterangan2'];

//Mengecek apakah jumlah data di array lain lebih besear dari id_sewa atau tidak

if ($count_id_berangkat_sewa > $count_id_sewa) {
	//data yang tidak dibutuhkan di indeks awal akan dihapus lalu disimpan di variabel array sementara
	$index_max2 = $count_id_berangkat_sewa - $count_id_sewa;
	for ($i = 0; $i < $index_max2; $i++) {
		unset($temp_id_berangkat_sewa[$i]);
	}
	$temp_id_berangkat_sewa = array_values($temp_id_berangkat_sewa);
}

if ($count_oper_sewa > $count_id_sewa) {
	//data yang tidak dibutuhkan di indeks awal akan dihapus lalu disimpan di variabel array sementara
	$index_max2 = $count_oper_sewa - $count_id_sewa;
	for ($i = 0; $i < $index_max2; $i++) {
		unset($temp_oper_sewa[$i]);
	}
	$temp_oper_sewa = array_values($temp_oper_sewa);
}

if ($count_status_sewa > $count_id_sewa) {
	//data yang tidak dibutuhkan di indeks awal akan dihapus lalu disimpan di variabel array sementara
	$index_max2 = $count_status_sewa - $count_id_sewa;

	for ($i = 0; $i < $index_max2; $i++) {
		unset($temp_status_sewa[$i]);
	}
	$temp_status_sewa = array_values($temp_status_sewa);
}
if ($count_keterangan_sewa > $count_id_sewa) {
	//data yang tidak dibutuhkan di indeks awal akan dihapus lalu disimpan di variabel array sementara
	$index_max2 = $count_keterangan_sewa - $count_id_sewa;

	for ($i = 0; $i < $index_max2; $i++) {
		unset($temp_keterangan_sewa[$i]);
	}
	$temp_keterangan_sewa = array_values($temp_keterangan_sewa);
}
// echo "<hr>";
// echo $count_id_berangkat;
// echo $count_id_travel;
// echo "<hr>";
// print_r($temp_id_berangkat_sewa);
// print_r($temp_oper);
// print_r($temp_status);
// print_r($temp_keterangan);
// print_r($temp_arr_keterangan);


for ($j = 0; $j < $jum2; $j++) {
	# code...
	$id_sewa =$temp_id_sewa[$j];
	$id_berangkat_sewa = $temp_id_berangkat_sewa[$j];
	$oper_sewa = $temp_oper_sewa[$j];
	$status_sewa = $temp_status_sewa[$j];
	$ket_sewa = $temp_keterangan_sewa[$j];
	$query2 = mysqli_query($koneksi, "INSERT INTO sewa_berangkat VALUES('','$id_sewa','$id_berangkat_sewa','$oper_sewa','$status_sewa','$ket_sewa')");
}
if ($query){

?>
 <script language="javascript">
		alert("Penumpang Sudah di Jadwalkan");
		history.back();

</script>
<?php
	   }elseif ($query2) { 
	?>
<script language="javascript">
		alert("Penumpang Sudah di Jadwalkan");
		history.back();
		
</script>
<?php } else
	  {
	   echo"Data Gagal Disimpan";
	  }
	?>
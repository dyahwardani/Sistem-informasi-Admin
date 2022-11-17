<?php
error_reporting(~E_NOTICE);
require_once 'conn.php';
$idt = $_POST['id_travel'];
$nm = $_POST['namapenumpang'];
$aljem=$_POST['alamatjemput'];
$rute=$_POST['rute'];
$nohp=$_POST['nohp'];
$alan=$_POST['ket_antar'];
$jam=$_POST['jamjemput'];
$seat=$_POST['seat'];
$jumseat=$_POST['jumseat'];
$harga=$_POST['harga'];
$jenis=$_POST['jenis'];
$paket=$_POST['paket'];
$rekan=$_POST['rekanan'];
var_dump($_POST);

$query = mysqli_query($koneksi, "UPDATE travel SET nama='$nm', alamat_jemput='$aljem', rute='$rute', hp='$nohp', ket_antar='$alan', seat='$seat', jum_seat='$jumseat', keterangan='$paket', id_rekan='$rekan', jam_jemput='$jam', harga='$harga' WHERE id_travel='$idt'");

if($query){?>
    <script language="javascript">
		alert("Penumpang Sudah di Jadwalkan");
		history.back();

</script>
<?php
}
?>
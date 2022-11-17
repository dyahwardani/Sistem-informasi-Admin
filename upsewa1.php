<?php
error_reporting(~E_NOTICE);
require_once 'conn.php';
$ids = $_POST['id_sewa'];
$nm = $_POST['namapenumpang'];
$jam=$_POST['jamjemput'];
$nohp=$_POST['nohp'];
$aljem=$_POST['alamatjemput'];
$alan=$_POST['alamatantar'];
$paket=$_POST['paket'];
$harga=$_POST['harga'];
$rekan=$_POST['rekanan'];

var_dump($_POST);
$query = mysqli_query($koneksi, "UPDATE sewa SET nama_sewa='$nm', jam_jemput='$jam', no_hp='$nohp', alamat_jemput='$aljem', alamat_antar='$alan', paket='$paket', harga_sewa='$harga', id_rekan='$rekan' WHERE id_sewa='$ids'");

if($query){?>
    <script language="javascript">
		alert("Penumpang Sudah di Jadwalkan");
		history.back();

</script>
<?php
}
?>
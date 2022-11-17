<?php
error_reporting( ~E_NOTICE ); // avoid notice
require_once '../conn.php'; 
 $id = $_GET['id']; //get the no which will deleted
 $query = mysqli_query($koneksi,"DELETE from keuangan WHERE id_keuangan = '$id'");
// $hasil = ($query);
 if ($query) {
 ?>
	<script language="javascript">
	alert("data sudah dihapus");
	history.back();
	</script>
 <?php
    //header('location:index.php?page=dt_admin');
    //include "?page=dt_kom_guru";


}
?>
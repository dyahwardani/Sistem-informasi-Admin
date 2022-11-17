<?php
error_reporting( ~E_NOTICE ); // avoid notice
require_once 'conn.php'; 
 $id_sewa = $_GET['id_sewa']; //get the no which will deleted
 $query = mysqli_query($koneksi,"DELETE from sewa WHERE id_sewa = '$id_sewa'");
// $hasil = ($query);
 if ($query) {
 	
    //header('location:index.php?page=detail_penumpang');
    //include "?page=dt_kom_guru";
	?>
	<script language="javascript">
	alert("data sudah dihapus");
	history.back();
	</script>
    <?php
}
?>
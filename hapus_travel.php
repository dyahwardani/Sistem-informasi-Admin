<?php
error_reporting( ~E_NOTICE ); // avoid notice
require_once 'conn.php'; 
 $id_travel = $_GET['id_travel']; //get the no which will deleted
 $query = mysqli_query($koneksi,"DELETE from travel WHERE id_travel = '$id_travel'");
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
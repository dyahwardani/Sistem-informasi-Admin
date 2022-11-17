<?php
error_reporting( ~E_NOTICE ); // avoid notice
require_once 'conn.php'; 
 $id_travel = $_GET['id_travel']; //get the no which will deleted
 $status = $_GET['status'];
 $query = mysqli_query($koneksi,"UPDATE travel SET status='$status' WHERE id_travel='$id_travel'");
// $hasil = ($query);
 if ($query) {
 	
    //header('location:index.php?page=detail_penumpang');
    //include "?page=dt_kom_guru";
	?>
	<script language="javascript">
	alert("data sudah diupdate");
	history.back();
	</script>
    <?php
}
?>
<?php
error_reporting( ~E_NOTICE ); // avoid notice
require_once 'conn.php'; 
 $nomor = $_GET['nomor']; //get the no which will deleted
 $query = mysqli_query($koneksi,"DELETE from travel WHERE hp = '$nomor'");
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
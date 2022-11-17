<?php
error_reporting( ~E_NOTICE ); // avoid notice
require_once 'conn.php'; 
 $id_operator = $_GET['id_operator']; //get the no which will deleted
 $query = mysqli_query($koneksi,"DELETE from operator WHERE id_operator = '$id_operator'");
// $hasil = ($query);
if ($query) {
header('location:pagetujuan');
}
?>
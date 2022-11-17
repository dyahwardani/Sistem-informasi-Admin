<?php
error_reporting( ~E_NOTICE ); // avoid notice
require_once '../conn.php'; 
 $id_admin = $_GET['id_admin']; //get the no which will deleted
 $query = mysqli_query($koneksi,"DELETE from admin WHERE id_admin = '$id_admin'");
// $hasil = ($query);
 if ($query) {
    header('location:index.php?page=dt_admin');
    //include "?page=dt_kom_guru";
}
?>
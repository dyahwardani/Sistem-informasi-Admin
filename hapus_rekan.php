<?php
error_reporting( ~E_NOTICE ); // avoid notice
require_once 'conn.php'; 
 $id = $_GET['id']; //get the no which will deleted
 $query = mysqli_query($koneksi,"DELETE from dt_rekanan WHERE id_rekan = '$id'");
// $hasil = ($query);
 if ($query) {
    header('location:index.php?page=dt_rekanan');
    //include "?page=dt_kom_guru";
}
?>
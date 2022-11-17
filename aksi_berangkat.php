<?php
require_once 'conn.php';
$jumlah = count($_POST["id_travel"]);
for($i=0; $i < $jumlah; $i++) 
{
	$supir = $_POST["supir"][$i];// user name
    $mobil = $_POST["mobil"][$i];// user email
    $jamber =$_POST["jamber"][$i];
    $tanggal =$_POST["tanggal"][$i];
    $jam =$_POST["jam"][$i];
    $tgglber =$_POST["tgglber"][$i];
    $id_travel =$_POST["id_travel"][$i];
    $q=mysql_query("INSERT INTO berangkat values ('','$supir','$mobil','$id_travel','$tanggal','$jam','$jamber','$tgglber')"); 
}

if ($q){
//header ("location:home_admin.php?page=perangkingan&&id_dftr=$id_dftr");
header ("location:index.php");
  }
  else
  {
   echo"Data Gagal Disimpan";
  }
?>
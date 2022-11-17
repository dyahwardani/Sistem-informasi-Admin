<?php
session_start();
include '../conn.php';
$usern = $_POST['username'];
$passm = $_POST['password'];


// query untuk mendapatkan record dari username
$hasil = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$usern' and password='$passm'");
$data = mysqli_fetch_array($hasil);
// cek kesesuaian password
if ($usern == $data['username'] && $passm==$data['password'])
{
    // menyimpan username dan level ke dalam session
    $_SESSION['id_admin'] = $data['id_admin'];  
   	header('location:index.php');
}
else
        {
            echo "Gagal Login";
        }

?>
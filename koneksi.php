<?php
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="nayfa_travel";

$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (!$conn) {
    # code...
    die("Tidak bisa terhubung ke database".mysqli_connect_error());
    echo "Tidak terhubung";
}
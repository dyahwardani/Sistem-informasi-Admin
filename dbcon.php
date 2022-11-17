<?php

$DB_host = "sql110.ezyro.com";
$DB_user = "ezyro_19198918";
$DB_pass = "agadayai";
$DB_name = "ezyro_19198918_nayfatrans";

$SQLConn = new MySQLi($DB_host,$DB_user,$DB_pass,$DB_name);

if($SQLConn->connect_errno)
{
    die("ERROR : -> ".$SQLConn->connect_error);
}

?>
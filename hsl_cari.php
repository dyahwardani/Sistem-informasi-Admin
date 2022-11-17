<?php require_once'conn.php';
$nama = strip_tags($_GET['nama']);
if($nama=="")
echo "Masukkan nama penumpang";
else{
$query =  "SELECT * FROM travel where nama like '%$nama%' order by tanggal_jemput asc"; 
$result = $koneksi->query($query) or die($koneksi->error.__LINE__);
$no=1;
if($result->num_rows > 0){
echo '<h4 class="media-heading"> Sudah pernah pesan sebanyak ';
echo $result->num_rows.' kali </h4>';
while($rows= $result->fetch_assoc()){
extract($rows);
echo ' 
				<div class="col-lg-3">
                <div class="widget style1 lazur-bg">
                <div class="row">
  	<h4 class="media-heading">'.$no++.'. Tanggal jemput: '.$tanggal_jemput.'</h4>
    Nama Penumpang: '.$nama.'<br>Rute: '.$rute.'<br>Alamat Jemput: '.$alamat_jemput.'Alamat Antar: '.$ket_antar.'
 </div>
 </div>
</div>';}

} else{
$hasil = " <h4 style='color:red'>Penumpang tidak ditemukan!</h4>";
}}?>
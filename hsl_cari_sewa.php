<?php require_once'conn.php';
$nama = strip_tags($_GET['nama']);
if($nama=="")
echo "Masukkan nama penumpang";
else{
$query =  "SELECT * FROM sewa where nama_sewa like '%$nama%' order by tanggal_jemput asc"; 
$result = $koneksi->query($query) or die($koneksi->error.__LINE__);
$no=1;
if($result->num_rows > 0){
echo '<h4 class="media-heading"> Sudah pernah sewa sebanyak ';
echo $result->num_rows.' kali </h4>';
while($rows= $result->fetch_assoc()){
extract($rows);
echo'
				<div class="col-lg-3">
                <div class="widget style1 lazur-bg">
                <div class="row">
  	<h4 class="media-heading">'.$no++.'. Tanggal Jemput: '.$tanggal_jemput.'</h4>Tanggak Booking: '.$tanggal_booking.'<br> Nama Penumpang: '.$nama_sewa.'<br>Paket: '.$paket.'<br>Nomor HP: '.$no_hp.'<br>Alamat Jemput: '.$alamat_jemput.'
 </div>
 </div>
</div>';}

} else{
$hasil = " <h4 style='color:red'>Penyewa tidak ditemukan!</h4>";
}}?>
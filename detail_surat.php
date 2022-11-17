<?php 
session_start();
require_once'conn.php';
$tgl = strip_tags($_GET['nama']);
if($tgl=="")
echo "Masukkan Tanggal Jemput";
else{
$query =  "SELECT * FROM berangkat,supir,mobil  WHERE berangkat.id_supir=supir.id_supir AND berangkat.id_mobil=mobil.id_mobil and berangkat.tanggal_jemput like '%$tgl%' order by id_berangkat asc"; 
$result = $koneksi->query($query) or die($koneksi->error.__LINE__);
$no=1;
if($result->num_rows > 0){
?>
<div class="container">
    <div class="row"> 
        <div class="row animated fadeInRight">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content" id="ibox-content">
                     <center><h2>Jadwal Keberangkatan Tanggal <?php echo $tgl; ?></h2></center>
                     <div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">
                    <?php
                    while($rows= $result->fetch_assoc()){
                    extract($rows);
                    ?>
                    <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon blue-bg">
                                    <i class="fa fa-car"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <p> <strong><h2>Driver : <?php echo $nama; ?> , Mobil :<?php echo $nama_mobil; ?>, Nopol :<?php echo $plat_nomer; ?></h2></strong></p>
                                    <p></p>
                                    <a href="?page=detail&&id=<?php echo $id_berangkat; ?>&&tanggal=<?php echo $tanggal_jemput; ?>" class="btn btn-sm btn-primary"> Surat Jalan</a>
                                    <span class="vertical-date">
                                        <?php 
                                        ini_set('date.timezone', 'Asia/Jakarta');
                                        $dateno=(date('D'));
                                        $dayList = array(
                                            'Sun' => 'Minggu',
                                            'Mon' => 'Senin',
                                            'Tue' => 'Selasa',
                                            'Wed' => 'Rabu',
                                            'Thu' => 'Kamis',
                                            'Fri' => 'Jumat',
                                            'Sat' => 'Sabtu'
                                            );
                                        echo  $dayList[$dateno]." Pukul: ".$jam_berangkat; ?> WIB <br/>
                                        <small><?php echo $tanggal_jemput; ?></small>
                                    </span>
                                </div>
                            </div>
<?php
}
} else{
echo '<h4 class="media-heading"> Tidak ada pejadwalan pada tanggal ';
echo $tgl."</h4>";
} }?>
                   </div>
                    </div>
                </div>
            </div>
            </div>           
              
</div>
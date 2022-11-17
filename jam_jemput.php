<?php 
session_start();
require_once'conn.php';
$tgl = strip_tags($_GET['nama']);
if($tgl=="")
echo "Masukkan Tanggal Jemput";
else{
$query =  "SELECT mobil.id_mobil as id,mobil.nama_mobil,mobil.jenis_mobil,mobil.plat_nomer,
    mobil.jum_seat,mobil.jum_duduk,berangkat.id_berangkat,berangkat.id_supir,berangkat.id_mobil,berangkat.tanggal_jemput,berangkat.jam_pulang,berangkat.jam_berangkat from mobil LEFT OUTER JOIN berangkat ON berangkat.id_mobil=mobil.id_mobil and berangkat.tanggal_jemput = '$tgl'"; 
$result = $koneksi->query($query) or die($koneksi->error.__LINE__);
$no=1;
if($result->num_rows > 0){ 
?>

<div class="container">

        <div class="row animated fadeInRight">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    
                    <div class="ibox-content" id="ibox-content">
                     <center><h2>Setting Keberangkatan</h2></center>
                     <div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">
                     <?php 
                    // while ($col2 =mysqli_fetch_array($quer2)) {
              // $tanggal=$col2['tanggal_jemput']; 
                      //  $id_3=$col2['id'];
                       // $id_4=$col2['id_mobil'];
                      while($rows= $result->fetch_assoc()){
                      extract($rows);
                     ?>

                        
                            <div class="vertical-timeline-block">
                            <?php
                            if ($id==$id_mobil) { ?>
                                 <div class="vertical-timeline-icon yellow-bg">
                                    <i class="fa fa-car"></i>
                                </div>
                           <?php  } else { ?>
                                <div class="vertical-timeline-icon blue-bg">
                                    <i class="fa fa-car"></i>
                                </div>
                            
                           <?php } 

                            ?>

                                <div class="vertical-timeline-content">
                                    <p> <strong><h2>Driver : 
                                    <?php 
                                    $id=$id_supir;
                                    $supir=mysqli_query($koneksi, "SELECT *  FROM supir WHERE id_supir='$id'");
                                    $supirid=mysqli_fetch_array($supir);
                                    echo $supirid['nama'];
                                     ?> , Mobil :<?php echo $nama_mobil; ?>, Nopol :<?php echo $plat_nomer; ?></h2></strong></p>
                                    <?php 
                                     
                                    $id_1=$id;
                                    $id_2=$id_mobil;
                                    $id_berangkat=$id_berangkat;
                                    $jam_jemput=$jam_pulang;
                                    $tanggal_jemput=$tanggal_jemput;
                                    if ($id_1=$id_2) {
                                    echo $ok="<a href='?page=setting_penumpang&&id_berangkat=$id_berangkat&&tanggal=$tanggal_jemput' class='btn btn-sm btn-danger'>Setting Penumpang</a>";
                                    }else{echo $ok="<a href='?page=berangkat&&plat=$plat_nomer' class='btn btn-sm btn-primary'> Setting Mobil</a>";
                                    }
                                    ?>
                                   
                                    <span class="vertical-date">
                                        <?php
                                        date_default_timezone_set('Asia/Jakarta'); 
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
                                        echo "Berangkat Hari ".$dayList[$dateno]." Pukul: ".$jam_berangkat; ?> WIB <br/>
                                        <small><?php echo $tanggal_jemput; ?></small>
                                    </span>
                                </div>
                            </div>
                      
                        <?php
                        }

                        }  }?>
                        </div>
                    </div>
                </div>
            </div>
            </div>           
              
</div>
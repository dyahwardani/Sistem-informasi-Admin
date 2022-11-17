<?php
    date_default_timezone_set('Asia/Jakarta');
    $tgl=date('m/d/Y');
 
    $datenow=mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM travel WHERE tanggal_jemput='$tgl'");
    $ngedate=mysqli_fetch_array($datenow);
    $penumpang=mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM travel WHERE tanggal_jemput='$tgl' and status='1'");
    $jum=mysqli_fetch_array($penumpang);
    $booking=mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM travel WHERE jadwal_booking='$tgl'");
    $jum_booking=mysqli_fetch_array($booking);
    $sew=mysqli_query($koneksi,"SELECT COUNT(*) as jumlah FROM sewa WHERE tanggal_jemput='$tgl'");
    $sewa=mysqli_fetch_array($sew);
 ?>
<div class="container">
    <div class="row">
    <div class="col-lg-4"><a href="?page=detail_booking&&tgl=<?php echo $tgl; ?>">
                <div class="widget style1 lazur-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-archive fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Customer yang booking pada hari ini tanggal <?php echo $tgl; ?></span>
                            <h2 class="font-bold"><?php echo $jum_booking['jumlah']; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
    <div class="col-lg-4"><a href="?page=detail_penumpang&&nama=<?php echo $tgl; ?>">
                <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Customer yang di jemput pada hari ini tanggal <?php echo $tgl; ?></span>
                            <h2 class="font-bold"><?php echo $ngedate['jumlah']; ?></h2>
                        </div>
                    </div>
                </div></a>
            </div>
            
            <div class="col-lg-4"><a href="?page=detail_sewa&&nama=<?php echo $tgl; ?>">
                <div class="widget style1 yellow-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-taxi fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Customer yang Sewa hari ini tanggal <?php echo $tgl; ?></span>
                            <h2 class="font-bold"><?php echo $sewa['jumlah']; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row animated fadeInRight">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">

                    
                    <div class="ibox-content" id="ibox-content">
                     <center><h2>Jadwal Keberangkatan Hari ini</h2></center>
                     <div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">
                     <?php 
                      $query1 = mysqli_query($koneksi, "SELECT * FROM berangkat,supir,mobil  WHERE berangkat.id_supir=supir.id_supir AND berangkat.id_mobil=mobil.id_mobil 
                            and berangkat.tanggal_jemput='$tgl'");
                      while ($guh = mysqli_fetch_array($query1)) {
                          # code...
                      
                     ?>

                        
                            <div class="vertical-timeline-block">
                                <div class="vertical-timeline-icon blue-bg">
                                    <i class="fa fa-car"></i>
                                </div>

                                <div class="vertical-timeline-content">
                                    <p> <strong><h2>Driver : <?php echo $guh['nama']; ?> , Mobil :<?php echo $guh['nama_mobil']; ?>, Nopol :<?php echo $guh['plat_nomer']; ?></h2></strong></p>
                                    <p></p>
                                    <a href="?page=detail&&id=<?php echo $guh['id_berangkat']; ?>&&tanggal=<?php echo $guh['tanggal_jemput']; ?>" class="btn btn-sm btn-primary"> Surat Jalan</a>
                                    <span class="vertical-date">
                                        <?php 
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
                                        echo  $dayList[$dateno]." Pukul: ".$guh['jam_berangkat']; ?> WIB <br/>
                                        <small><?php echo $guh['tanggal_jemput'];; ?></small>
                                    </span>
                                </div>
                            </div>
                      
                        <?php
                        } 
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>           
              
</div>
 
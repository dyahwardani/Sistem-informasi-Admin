<?php
 session_start();
 $idber=$_GET['id'];
 $tanggal=$_GET['tanggal'];
 $quer = mysqli_query($koneksi, "SELECT * FROM nayfa");//header
 $col1 = mysqli_fetch_array($quer);



 $quer2= mysqli_query($koneksi, "SELECT travel.id_travel,SUM(travel.harga) AS jumlah, travel.rute, travel.nama, travel.hp, travel.jam_jemput, travel.seat, travel.jum_seat, travel.alamat_jemput, travel.ket_antar, travel.id_rekan, dt_rekanan.nm_rekan AS dari, travel_berangkat.id_keberangkatan, travel_berangkat.id_berangkat, travel_berangkat.keterangan FROM berangkat, travel_berangkat, travel, dt_rekanan WHERE travel.id_rekan=dt_rekanan.id_rekan AND travel_berangkat.id_berangkat=berangkat.id_berangkat AND travel_berangkat.id_berangkat='$idber' AND travel_berangkat.keterangan='pergi'AND travel.tanggal_jemput='$tanggal' AND travel_berangkat.id_travel=travel.id_travel GROUP BY travel_berangkat.id_keberangkatan");
 
 $quer22= mysqli_query($koneksi, "SELECT travel.id_travel,SUM(travel.harga) AS jumlah, travel.rute, travel.nama, travel.hp, travel.jam_jemput, travel.seat, travel.jum_seat, travel.alamat_jemput, travel.ket_antar, travel.id_rekan, dt_rekanan.nm_rekan AS dari, travel_berangkat.id_keberangkatan, travel_berangkat.id_berangkat, travel_berangkat.keterangan FROM berangkat, travel_berangkat, travel, dt_rekanan WHERE travel.id_rekan=dt_rekanan.id_rekan AND travel_berangkat.id_berangkat=berangkat.id_berangkat AND travel_berangkat.id_berangkat='$idber' AND travel_berangkat.keterangan='pulang'AND travel.tanggal_jemput='$tanggal' AND travel_berangkat.id_travel=travel.id_travel GROUP BY travel_berangkat.id_keberangkatan");

 //TAGIHAN PERGI
 $quer3= mysqli_query($koneksi, "SELECT travel.id_travel, SUM(travel.harga) AS tothar, travel_berangkat.keterangan, travel.jum_seat, travel_berangkat.id_berangkat FROM travel, berangkat, travel_berangkat WHERE travel.id_travel=travel_berangkat.id_travel AND  travel_berangkat.id_berangkat=berangkat.id_berangkat AND travel_berangkat.id_berangkat='$idber' AND travel_berangkat.keterangan='pergi' AND berangkat.tanggal_jemput='$tanggal'");

 $dat=mysqli_fetch_array($quer3);
 $total=($dat['tothar'])*($dat['jum_seat']);
//  echo $total;

$quer7= mysqli_query($koneksi, "SELECT sewa.id_sewa, SUM(sewa.harga_sewa) AS tothar, sewa_berangkat.keterangan, sewa_berangkat.id_berangkat FROM sewa, berangkat, sewa_berangkat WHERE sewa.id_sewa=sewa_berangkat.id_sewa AND  sewa_berangkat.id_berangkat=berangkat.id_berangkat AND sewa_berangkat.id_berangkat='$idber' AND sewa_berangkat.keterangan='pergi' AND berangkat.tanggal_jemput='$tanggal'");
 $dat1=mysqli_fetch_array($quer7);
 $total1=$dat1['tothar'];

$total_akhir =$total+$total1;
// echo $total_akhir;

$jumlah_desimal2 ="0";
$pemisah_desimal2 =",";
$pemisah_ribuan2 =".";

$total_akhir_banget = "Rp ".number_format($total_akhir, $jumlah_desimal2, $pemisah_desimal2, $pemisah_ribuan2)."-";

//TAGIHAN PULANG
 $quer33= mysqli_query($koneksi, "SELECT travel.id_travel, SUM(travel.harga) AS tothar, travel_berangkat.keterangan, travel.jum_seat, travel_berangkat.id_berangkat FROM travel, berangkat, travel_berangkat WHERE travel.id_travel=travel_berangkat.id_travel AND  travel_berangkat.id_berangkat=berangkat.id_berangkat AND travel_berangkat.id_berangkat='$idber' AND travel_berangkat.keterangan='pulang' AND berangkat.tanggal_jemput='$tanggal'");
 $dat33=mysqli_fetch_array($quer33);
 $total33=$dat33['tothar'];

$quer77= mysqli_query($koneksi, "SELECT sewa.id_sewa, SUM(sewa.harga_sewa) AS tothar, sewa_berangkat.keterangan, sewa_berangkat.id_berangkat FROM sewa, berangkat, sewa_berangkat WHERE sewa.id_sewa=sewa_berangkat.id_sewa AND  sewa_berangkat.id_berangkat=berangkat.id_berangkat AND sewa_berangkat.id_berangkat='$idber' AND sewa_berangkat.keterangan='pulang' AND berangkat.tanggal_jemput='$tanggal'");
 $dat77=mysqli_fetch_array($quer77);
 $total77=$dat77['tothar'];

$total_akhir37 =$total33+$total77;

$jumlah_desimal21 ="0";
$pemisah_desimal21 =",";
$pemisah_ribuan21 =".";

$total_akhir_banget2 = "Rp ".number_format($total_akhir37, $jumlah_desimal21, $pemisah_desimal21, $pemisah_ribuan21)."-";



$quer4= mysqli_query($koneksi, "SELECT * FROM berangkat,supir,mobil WHERE berangkat.id_supir=supir.id_supir AND berangkat.id_mobil=mobil.id_mobil AND id_berangkat='$idber' and berangkat.tanggal_jemput='$tanggal'");

$col4= mysqli_fetch_array($quer4);


//PENUMPANG PERGI
$quer5= mysqli_query($koneksi, "SELECT travel_berangkat.id_berangkat, travel_berangkat.keterangan, COUNT(travel_berangkat.id_keberangkatan) AS jumlah_penumpang, berangkat.tanggal_jemput FROM travel, travel_berangkat, berangkat WHERE travel_berangkat.id_berangkat=berangkat.id_berangkat AND travel.id_travel=travel_berangkat.id_travel AND travel_berangkat.id_berangkat='$idber' AND travel_berangkat.keterangan='pergi' AND berangkat.tanggal_jemput='$tanggal'");

 $jum_=mysqli_fetch_array($quer5);
 $jum_penumpang=$jum_['jumlah_penumpang'];

 $quer8= mysqli_query($koneksi, "SELECT sewa_berangkat.id_berangkat, sewa_berangkat.keterangan, COUNT(sewa_berangkat.id_sewaberangkat) AS jumlah_sewa, berangkat.tanggal_jemput FROM sewa, sewa_berangkat, berangkat WHERE sewa_berangkat.id_berangkat=berangkat.id_berangkat AND sewa.id_sewa=sewa_berangkat.id_sewa AND sewa_berangkat.id_berangkat='$idber' AND sewa_berangkat.keterangan='pergi' AND berangkat.tanggal_jemput='$tanggal'");

 $jum2_=mysqli_fetch_array($quer8);
 $jum_penumpang2=$jum2_['jumlah_sewa'];

 $jum_penumpang_akhir=$jum_penumpang+$jum_penumpang2;

 //PENUMPANG PULANG
 $quer55= mysqli_query($koneksi, "SELECT travel_berangkat.id_berangkat, travel_berangkat.keterangan, COUNT(travel_berangkat.id_keberangkatan) AS jumlah_penumpang, berangkat.tanggal_jemput FROM travel, travel_berangkat, berangkat WHERE travel_berangkat.id_berangkat=berangkat.id_berangkat AND travel.id_travel=travel_berangkat.id_travel AND travel_berangkat.id_berangkat='$idber' AND travel_berangkat.keterangan='pulang' AND berangkat.tanggal_jemput='$tanggal'");

 $jum_5=mysqli_fetch_array($quer55);
 $jum_penumpang5=$jum_5['jumlah_penumpang'];

 $quer88= mysqli_query($koneksi, "SELECT sewa_berangkat.id_berangkat, sewa_berangkat.keterangan, COUNT(sewa_berangkat.id_sewaberangkat) AS jumlah_sewa, berangkat.tanggal_jemput FROM sewa, sewa_berangkat, berangkat WHERE sewa_berangkat.id_berangkat=berangkat.id_berangkat AND sewa.id_sewa=sewa_berangkat.id_sewa AND sewa_berangkat.id_berangkat='$idber' AND sewa_berangkat.keterangan='pulang' AND berangkat.tanggal_jemput='$tanggal'");

 $jum2_8=mysqli_fetch_array($quer88);
 $jum_penumpang28=$jum2_8['jumlah_sewa'];

 $jum_penumpang_akhir2=$jum_penumpang5+$jum_penumpang28;
// echo $jum_penumpang_akhir2;
  $quer6= mysqli_query($koneksi, "SELECT sewa.id_sewa, SUM(sewa.harga_sewa) AS jumlah, sewa.nama_sewa, sewa.no_hp, sewa.jam_jemput, sewa.alamat_jemput, sewa.id_rekan, dt_rekanan.nm_rekan AS dari, sewa_berangkat.id_sewaberangkat, sewa_berangkat.id_berangkat, sewa_berangkat.keterangan FROM berangkat, sewa_berangkat, sewa, dt_rekanan WHERE sewa.id_rekan=dt_rekanan.id_rekan AND sewa_berangkat.id_berangkat=berangkat.id_berangkat AND sewa_berangkat.id_berangkat='$idber' AND sewa_berangkat.keterangan='pergi'AND sewa.tanggal_jemput='$tanggal' AND sewa_berangkat.id_sewa=sewa.id_sewa GROUP BY sewa_berangkat.id_sewaberangkat");


  //problem baru 01/05/2018 #1

  $quer66= mysqli_query($koneksi, "SELECT sewa.id_sewa, SUM(sewa.harga_sewa) AS jumlah, sewa.nama_sewa, sewa.no_hp, sewa.jam_jemput, sewa.alamat_jemput, sewa.id_rekan, dt_rekanan.nm_rekan AS dari, sewa_berangkat.id_sewaberangkat, sewa_berangkat.id_berangkat, sewa_berangkat.keterangan FROM berangkat, sewa_berangkat, sewa, dt_rekanan WHERE sewa.id_rekan=dt_rekanan.id_rekan AND sewa_berangkat.id_berangkat=berangkat.id_berangkat AND sewa_berangkat.id_berangkat='$idber' AND sewa_berangkat.keterangan='pulang'AND sewa.tanggal_jemput='$tanggal' AND sewa_berangkat.id_sewa=sewa.id_sewa GROUP BY sewa_berangkat.id_sewaberangkat");
 //problem baru 01/05/2018 #2

//  header("Content-Type:application/vnd.msword");
//  header("Expires: 0");
//  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//  header("content-disposition:attachment; filename=nayfa_file.doc");
//  header("Pragma: no-cache");
 

 ?>

 <style>

    h2.huruf{
         font-size: 12.0pt;         
     }
    h4.batas{
        margin-bottom: 0.5px;
    }

    @page Section1{
        size: 29.7cm 21cm;
        margin: 2cm 2cm 2cm 2cm;
        mso-page-orientation: landscape;
}
div.Section1 { page:Section1; }

 </style>

<body class="white-bg">
 <div class="Section1">
 <!-- <div class="wrapper wrapper-content animated fadeInRight"> -->
                    <div class="ibox-content p-xl" id="div1">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3><?php echo $col1['nama_perusahan']; ?></h3>
                                    <img src="Nayfa/Versi02_250x100.png" class="img-rounded" style="padding: 7px 7px;">
                                    <address>
                                        
                                        <?php echo $col1['alamat']; ?><br>
                                        <?php echo $col1['no_telp']; ?><br>
                                      
                                    </address>
                                </div>

                                <div class="col-sm-6 text-right">
                                     <h4 class="batas"> Operator : <?php echo $namauser ?> </h4>
                                     <h4 class="">ID Keberangkatan : <?php echo $idber; ?></h4>
                                     <h4 class="">Tanggal Berangkat : <?php echo $tanggal; ?></h4>
                                    <span>Driver Name</span>
                                    <address>
                                        <strong><?php echo $col4['nama']; ?></strong><br>
                                        Mobil : <?php echo $col4['nama_mobil']; ?>/<?php echo $col4['plat_nomer']; ?><br>
                                        Jam Berangkat : <?php echo $col4['jam_berangkat']; ?><br> 
                                    </address>
                                    
                                </div>
                            </div>
                            <h2 class="huruf" >PERGI</h2>
                            <div class="table-responsive m-t">
                                <table class="table invoice-table" border="1">
                                    <thead><h3>Travel</h3>
                                    <tr>
                                        <th>Rute/Layanan</th>
                                        <th>Nama Penumpang</th>
                                        <th>Telepon</th>
                                        <th>Jam Jemput</th>
                                        <th>Kursi</th>
                                        <th>Jumlah Kursi</th>
                                        <th>Alamat Jemput</th>
                                        <th>Alamat Tujuan</th>
                                        <th>Dari</th>
                                        <th>Tagihan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($col2 =mysqli_fetch_array($quer2)) {
                                          # code...
                                     ?>
                                    <tr>
                                        <td><div><strong><?php echo $col2['rute']; ?></strong></div>
                                            </td>
                                        <td><?php echo $col2['nama']; ?></td>
                                        <td><?php echo $col2['hp']; ?></td>
                                        <td><?php echo $col2['jam_jemput']; ?></td>
                                        <td><?php echo $col2['seat']; ?></td>
                                        <td><?php echo $col2['jum_seat']; ?></td>
                                        <td><?php echo $col2['alamat_jemput']; ?></td>
                                        <td><?php echo $col2['ket_antar']; ?></td>
                                        <td><?php echo $col2['dari'];?></td>
                                        <td><?php 
                                        $total_trvl=($col2['jumlah'])*($col2['jum_seat']);
                                        $jum_desimal ="0";
                                        $pem_desimal =",";
                                        $pem_ribuan =".";
                                        echo $total_all_trvl="Rp ".number_format($total_trvl, $jum_desimal, $pem_desimal, $pem_ribuan)."-";
                                         ?></td>
                                    </tr>
                                    <?php
                                    } 
                                     
                                    ?>

                                    </tbody>
                                </table>
                                 <table class="table invoice-table" border="1">
                                    <thead><h3>Sewa</h3>
                                    <tr>
                                        <th>Alamat jemput</th>
                                        <th>Nama Penumpang</th>
                                        <th>Telepon</th>
                                        <th>Jam Jemput</th>
                                        <th>Alamat Jemput</th>
                                        <th>Dari</th>
                                        <th>Tagihan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($col6 =mysqli_fetch_array($quer6)) {
                                          # code...
                                     ?>
                                    <tr>
                                        <td><div><strong><?php echo $col6['alamat_jemput']; ?></strong></div>
                                            </td>
                                        <td><?php echo $col6['nama_sewa']; ?></td>
                                        <td><?php echo $col6['no_hp']; ?></td>
                                        <td><?php echo $col6['jam_jemput']; ?></td>
                                        <td><?php echo $col6['alamat_jemput']; ?></td>
                                        <td><?php echo $col6['dari']; ?></td>
                                        <td><?php 
                                        $total_sw=$col6['jumlah'];
                                        $jum_desimal ="0";
                                        $pem_desimal =",";
                                        $pem_ribuan =".";
                                        echo $total_all_sw="Rp ".number_format($total_sw, $jum_desimal, $pem_desimal, $pem_ribuan)."-";
                                         ?></td>
                                    </tr>
                                    <?php
                                    } 
                                     
                                    ?>

                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->
                            <table class="table invoice-total" border="1">
                                <tbody>
                                <tr>
                                    <td><strong>Total Penumpang Pergi :</strong></td>
                                    <td><?php echo $jum_penumpang_akhir; ?></td>
                                  
                                    <td><strong>Total Tagihan Pergi :</strong></td>
                                    <td><?php echo $total_akhir_banget; ?></td>
                                </tr>
                                </tbody>
                            </table>
                           
                             <h2 class="huruf">PULANG</h2>
                            <div class="table-responsive m-t">
                                <table class="table invoice-table" border="1">
                                    <thead><h3>Travel</h3>
                                    <tr>
                                        <th>Rute/Layanan</th>
                                        <th>Nama Penumpang</th>
                                        <th>Telepon</th>
                                        <th>Jam Jemput</th>
                                        <th>Kursi</th>
                                        <th>Jumlah Kursi</th>
                                        <th>Alamat Jemput</th>
                                        <th>Alamat Tujuan</th>
                                        <th>Dari</th>
                                        <th>Tagihan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($col22 =mysqli_fetch_array($quer22)) {
                                          # code...
                                     ?>
                                    <tr>
                                        <td><div><strong><?php echo $col22['rute']; ?></strong></div>
                                            </td>
                                        <td><?php echo $col22['nama']; ?></td>
                                        <td><?php echo $col22['hp']; ?></td>
                                        <td><?php echo $col22['jam_jemput']; ?></td>
                                        <td><?php echo $col22['seat']; ?></td>
                                        <td><?php echo $col22['jum_seat']; ?></td>
                                        <td><?php echo $col22['alamat_jemput']; ?></td>
                                        <td><?php echo $col22['ket_antar']; ?></td>
                                        <td><?php echo $col22['dari']; ?></td>
                                        <td><?php 
                                        $totalp=($col22['jumlah'])*($col22['jum_seat']);
                                        $jum_desimal ="0";
                                        $pem_desimal =",";
                                        $pem_ribuan =".";
                                        echo $total_all_lp="Rp ".number_format($totalp, $jum_desimal, $pem_desimal, $pem_ribuan)."-";
                                         ?></td>
                                    </tr>
                                    <?php
                                    } 
                                     
                                    ?>

                                    </tbody>
                                </table>
                                 <table class="table invoice-table" border="1">
                                    <thead><h3>Sewa</h3>
                                    <tr>
                                        <th>Alamat jemput</th>
                                        <th>Nama Penumpang</th>
                                        <th>Telepon</th>
                                        <th>Jam Jemput</th>
                                        <th>Alamat Jemput</th>
                                        <th>Dari</th>
                                        <th>Tagihan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($col66 =mysqli_fetch_array($quer66)) {
                                          # code...
                                     ?>
                                    <tr>
                                        <td><div><strong><?php echo $col66['alamat_jemput']; ?></strong></div>
                                            </td>
                                        <td><?php echo $col66['nama_sewa']; ?></td>
                                        <td><?php echo $col66['no_hp']; ?></td>
                                        <td><?php echo $col66['jam_jemput']; ?></td>
                                        <td><?php echo $col66['alamat_jemput']; ?></td>
                                        <td><?php echo $col66['nm_rekan']; ?></td>
                                        <td><?php 
                                        $totalg=$col66['jumlah'];
                                        $jum_desimal ="0";
                                        $pem_desimal =",";
                                        $pem_ribuan =".";
                                        echo $total_all_lg="Rp ".number_format($totalg, $jum_desimal, $pem_desimal, $pem_ribuan)."-";
                                         ?></td>
                                    </tr>
                                    <?php
                                    } 
                                     
                                    ?>

                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <table class="table invoice-total" border="1">
                                <tbody>
                                <tr>
                                    <td><strong>Total Penumpang Pulang :</strong></td>
                                    <td><?php echo $jum_penumpang_akhir2; ?></td>
                                  
                                    <td><strong>Total Tagihan Pulang:</strong></td>
                                    <td><?php echo $total_akhir_banget2; ?></td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="well m-t"><strong>Selamat Bertugas</strong>
                                Semoga sampai dengan selamat
                            </div>
                            <table>
                                <tr><td>TOTAL JUMLAH TAGIHAN</td><td> : <?php 
                                $total=$total_akhir+$total_akhir37;
                                $jum_desimalll ="0";
                                $pem_desimalll =",";
                                $pem_ribuannn =".";
                                echo $Totalll="Rp ".number_format($total, $jum_desimalll, $pem_desimalll, $pem_ribuannn)."";
                                //echo $total_akhir_banget2;
                                ?></td></tr>
                                <tr><td>UANG SAKU</td><td> : Rp <?php echo $col4['saku']; ?></td></tr>
                                <tr><td>BBM</td><td> : Rp <?php echo $col4['bbm']; ?></td></tr>
                                <tr><td>TOL</td><td> : Rp <?php echo $col4['tol']; ?></td></tr>
                                <tr><td>PARKIR</td><td> : Rp <?php echo $col4['parkir']; ?></td></tr>
                                <tr><td>FEE DRIVER</td><td> : Rp <?php $col4['']; ?></td></tr>
                                <tr><td>TOTAL SETORAN</td><td> : Rp <?php $col4['']; ?></td></tr>
                            </table>
                        </div>
                        </div>
                        </body>
                <script>
    //               $('#cetak').click(function(){
    //     $('#navbar').hide();
    // });
                </script>

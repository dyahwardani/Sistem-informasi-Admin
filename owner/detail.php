 <?php
 $idber=$_GET['id'];
 $quer = mysqli_query($koneksi, "SELECT * FROM nayfa");
 $col1 = mysqli_fetch_array($quer);

 $quer2= mysqli_query($koneksi, "SELECT * FROM travel,berangkat WHERE travel.id_berangkat=berangkat.id_berangkat AND travel.id_berangkat=$idber ");
 $quer3= mysqli_query($koneksi, "SELECT sum(harga) as total from travel where id_berangkat='$idber'");
 $dat=mysqli_fetch_array($quer3);
 $total=$dat['total'];

$jumlah_desimal ="0";
$pemisah_desimal =",";
$pemisah_ribuan =".";

$total_semua="Rp ".number_format($total, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."-";

$quer4= mysqli_query($koneksi, "SELECT * FROM berangkat,supir,mobil WHERE berangkat.id_supir=supir.id_supir AND berangkat.id_mobil=mobil.id_mobil AND id_berangkat=$idber");
$col4= mysqli_fetch_array($quer4);
 ?>
 <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl" id="div1">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5><?php echo $col1['nama_perusahan']; ?></h5>
                                    <img src="Nayfa/Versi01_250x100.png" class="img-rounded" style="padding: 7px 7px;">
                                    <address>
                                        
                                        <?php echo $col1['alamat']; ?><br>
                                        <?php echo $col1['no_telp']; ?><br>
                                      
                                    </address>
                                </div>

                                <div class="col-sm-6 text-right">
                                
                                     <h4 class="text-navy">ID Keberangkatan. <?php echo $idber; ?></h4>
                                    <span>Driver Name</span>
                                    <address>
                                        <strong><?php echo $col4['nama']; ?></strong><br>
                                        Mobil : <?php echo $col4['nama_mobil']; ?><br>
                                        Jam & Tanggal Berangkat : <?php echo $col4['jam_berangkat']."/".$col4['tanggal_berangkat']; ?><br>
                                        Tujuan : <?php echo $col4['tujuan']; ?>
                                    </address>
                                    
                                </div>
                            </div>

                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>Atas nama</th>
                                        <th>Tujuan</th>
                                        <th>Kursi</th>
                                        <th>Alamat Jemput</th>
                                        <th>Harga</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($col2 =mysqli_fetch_array($quer2)) {

                                        $harga=$col2['harga'];

                                        $total_harga=number_format($harga, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."-";
                                         # code...
                                     ?>
                                    <tr>
                                        <td><div><strong><?php echo $col2['nama']; ?></strong></div>
                                            </td>
                                        <td><?php echo $col2['alamat_antar']; ?></td>
                                        <td>Seat <?php echo $col2['seat']; ?></td>
                                        <td><?php echo $col2['alamat_jemput']; ?></td>
                                        <td><?php echo $total_harga; ?></td>
                                    </tr>
                                    <?php
                                    } 
                                     
                                    ?>

                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <table class="table invoice-total">
                                <tbody>
                                
                                <tr>
                                    <td><strong>TOTAL :</strong></td>
                                    <td><?php echo $total_semua; ?></td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="well m-t"><strong>Selamat Bertugas</strong>
                                Semoga sampai dengan selamat
                            </div>
                        </div>
                        <div class="ibox-content p-xl">
                        <div class="text-center">
                                <button class="btn btn-primary" onclick="printContent('div1')"><i class="fa fa-print"></i> Cetak</button>
                            </div>
                            </div>

                </div>
                <script>
    function printContent(el){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
    </script>

<?php 
error_reporting( ~E_NOTICE ); // avoid notice
require_once 'conn.php';
$quer2= mysqli_query($koneksi, "SELECT * FROM mobil");
$no=1;
?>
<div class="row">
<div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Data Mobil</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>  
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-sm-9 m-b-xs">
                                         
                                    </div>
                                    <div class="col-sm-3">
                                       
                                    </div>
                                </div>
                                <div class="table-responsive">
<table class="table table-striped">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Mobil</th>
                    <th>Jumlah Seat</th>
                    <th>Jumlah Tempat Duduk</th>
                    <th>Plat nomor</th>
                    <th><a href="?page=mobil"><i class="fa fa-plus-square" title="Add"></i></a></th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($col2 =mysqli_fetch_array($quer2)) {
                $nama_mobil=$col2['nama_mobil'];
                $jum_seat=$col2['jum_seat'];
                $jum_duduk=$col2['jum_duduk'];
                $plat_nomer=$col2['plat_nomer'];
                $id_mobil=$col2['id_mobil'];
                //$total_harga=number_format($harga, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."-";
                ?>
                <tr>
                    <td><?php echo $no++; ?>.</td>
                    <td><?php echo $nama_mobil; ?></td>
                    <td><?php echo $jum_seat; ?></td>
                    <td><?php echo $jum_duduk; ?></td>
                    <td><?php echo $plat_nomer; ?></td>
                    <td><a href="?page=update_mobil&&id=<?php echo $id_mobil; ?>"><i class="fa fa fa-pencil-square" title="Edit"></i></a> |<a href="hapus_mobil.php?id=<?php echo $id_mobil; ?>"><i class="fa fa-times-circle" title="Hapus"></i></a></td>
                </tr>
                 <?php
                 } 
                 ?>
                </tbody>
 </table>
  </div>
</div>
                        </div>
                    </div>

                </div>

            </div>

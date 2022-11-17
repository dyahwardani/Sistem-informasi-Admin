<?php 
error_reporting( ~E_NOTICE ); // avoid notice
require_once 'conn.php';
$quer2= mysqli_query($koneksi, "SELECT * FROM perhitungan_bobot");
$no=1;
?>
<div class="row">
<div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Bobot Awal</h5>
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
                    <th>Bobot Character</th>
                    <th>Bobot Capacity</th>
                    <th>Bobot Collateral</th>
                    <th><a href="?page=form_account"><i class="fa fa-plus-square" title="Add"></i></a></th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($col2 =mysqli_fetch_array($quer2)) {
                $x1=$col2['w_x_1'];
                $x2=$col2['w_x_2'];
                $x3=$col2['w_x_3'];
                //$total_harga=number_format($harga, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."-";
                ?>
                <tr>
                    <td><?php echo $x1; ?></td>
                    <td><?php echo $x2; ?></td>
                    <td><?php echo $x3; ?></td>
                    <td><a href=""><i class="fa fa-times-circle" title="Hapus"></i></a></td>
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

<?php 
error_reporting( ~E_NOTICE ); // avoid notice
require_once 'conn.php';
$quer2= mysqli_query($koneksi, "SELECT * FROM supir");
$no=1;
?>
<div class="row">
<div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Data Sopir/ Driver</h5>
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
                    <th>Nama Sopir</th>
                    <th>Alamat</th>
                    <th>Nomor HP</th>
                    <th><a href="?page=supir"><i class="fa fa-plus-square" title="Add"></i></a></th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($col2 =mysqli_fetch_array($quer2)) {
                $nama=$col2['nama'];
                $alamat=$col2['alamat'];
                $nohp=$col2['nohp'];
                $id_supir=$col2['id_supir'];
                //$total_harga=number_format($harga, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."-";
                ?>
                <tr>
                    <td><?php echo $no++; ?>.</td>
                    <td><?php echo $col2['nama']; ?></td>
                    <td><?php echo $col2['alamat']; ?></td>
                    <td><?php echo $col2['nohp']; ?></td>
                    <td><a href="?page=update_sopir&&id=<?php echo $id_supir; ?>"><i class="fa fa fa-pencil-square" title="Edit"></i></a> | <a href="hapus_supir.php?id=<?php echo $id_supir; ?>"><i class="fa fa-times-circle" title="Hapus"></i></a></td>
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

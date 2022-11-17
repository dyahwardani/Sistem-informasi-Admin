<?php 
error_reporting( ~E_NOTICE ); // avoid notice
require_once 'conn.php';
$quer2= mysqli_query($koneksi, "SELECT * FROM dt_rekanan where id_rekan!='1'");
$no=1;
?>
<div class="row">
<div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Data Rekanan</h5>
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
                    <th>Nama Rekanan/Agen</th>
                    <th>Alamat Rekanan/Agen</th>
                    <th>Nomor HP Rekanan/Agen</th>
                    <th><a href="?page=rekan"><i class="fa fa-plus-square" title="Add"></i></a></th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($col2 =mysqli_fetch_array($quer2)) {
                $nama=$col2['nm_rekan'];
                $alamat=$col2['alamat_rekan'];
                $nohp=$col2['nohp'];
                $id_rekan=$col2['id_rekan'];
                //$total_harga=number_format($harga, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."-";
                ?>
                <tr>
                    <td><?php echo $no++; ?>.</td>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $alamat; ?></td>
                    <td><?php echo $nohp; ?></td>
                    <td><a href="?page=edit_rekan&&id=<?php echo $id_rekan; ?>"><i class="fa fa fa-pencil-square" title="Edit"></i></a> | <a href="hapus_rekan.php?id=<?php echo $id_rekan; ?>"><i class="fa fa-times-circle" title="Hapus"></i></a></td>
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

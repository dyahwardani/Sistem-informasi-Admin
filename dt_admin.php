<?php 
error_reporting( ~E_NOTICE ); // avoid notice
require_once 'conn.php';
$quer2= mysqli_query($koneksi, "SELECT * FROM operator");
$no=1;
?>
<div class="row">
<div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Data Account Operator</h5>
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
                    <th>Username</th>
                    <th>Password</th>
                    <th><a href="?page=form_account"><i class="fa fa-plus-square" title="Add"></i></a></th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($col2 =mysqli_fetch_array($quer2)) {
                $username=$col2['username'];
                $password=$col2['password'];
                $id_operator=$col2['id_operator'];
                //$total_harga=number_format($harga, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."-";
                ?>
                <tr>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $password; ?></td>
                    <td><a href="hapus_account.php?id_operator=<?php echo $id_operator; ?>"><i class="fa fa-times-circle" title="Hapus"></i></a></td>
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

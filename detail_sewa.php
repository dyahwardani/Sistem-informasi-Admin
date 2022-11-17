<?php 
session_start();
error_reporting( ~E_NOTICE ); // avoid notice
require_once 'conn.php';
$tgl = strip_tags($_GET['nama']);
if($tgl=="")
echo "Data tidak ada";
else{
$query =  "SELECT * FROM sewa,dt_rekanan where sewa.id_rekan=dt_rekanan.id_rekan and tanggal_jemput='$tgl'"; 
$result = $koneksi->query($query) or die($koneksi->error.__LINE__);
$no=1;
echo '<h4 class="media-heading"> Ada ';
echo $result->num_rows.' customer </h4>';
if($result->num_rows > 0){ 
?>
  <div class="table-responsive">
                 <table class="table table-striped">
                <thead>
               <tr>
                  <th>No.</th>
                    <th>Tanggal Jemput</th>
                    <th>Jam Jemput</th>
                    <th>Nama Penyewa</th>
                    <th>Nomor HP</th>
                    <th>Alamat Jemput</th>
                    <th>Alamat Antar</th>
                    <th>Paket</th>
                    <th>Dari</th> 
                    <th>action</th>
                </tr></strong>
                </thead>
                <tbody>
                <?php
                while($rows= $result->fetch_assoc()){
                extract($rows);
                var_dump($rows);
               ?>
                <tr>
                    <td><?php echo $no++; ?>.</td>
                    <td><?php echo $tanggal_jemput; ?></td>
                    <td><?php echo $jam_jemput; ?></td>
                    <td><?php echo $nama_sewa; ?></td>
                    <td><?php echo $no_hp; ?></td>
                    <td><?php echo $alamat_jemput; ?></td>
                    <td><?php echo $alamat_antar; ?></td>
                    <td><?php echo $paket; ?></td>
                    <td><?php echo $nm_rekan; ?></td>
                    <td><a href="?page=update_sewa&&id=<?php echo $id_sewa;?>&&nomor=<?php echo $no_hp; ?>"><i class="fa fa-pencil-square" aria-hidden="true" title="Edit"></i>
                    </a> | 
                    <?php if ($status=='1') {echo $hsl="
                    <a href='status_sewa.php?id_sewa=$id_sewa&&status=0'><i class='fa fa-check-circle' aria-hidden='true' title='Ready'></i>
                    </a>"; }else{echo $hsl="
                    <a href='status_sewa.php?id_sewa=$id_sewa&&status=1'><i class='fa fa-circle' aria-hidden='true' title='Batal'></i>
                    </a>";} ?> | <a href="hapus_sewa.php?id_sewa=<?php echo $id_sewa; ?>"><i class="fa fa-times-circle" aria-hidden="true" title="Hapus"></i></a></td>
                </tr>
                 <?php
                  }
                  }  
                  }
                 ?>
                </tbody>
                </table>
 </div>

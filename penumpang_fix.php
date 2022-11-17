<?php 
error_reporting( ~E_NOTICE ); // avoid notice
require_once 'conn.php';
$tanggal=$_GET['tgl'];
$quer2= mysqli_query($koneksi, "SELECT * FROM travel where tanggal_jemput='$tanggal' and status='1'");
?>
 <div class="table-responsive m-t">

                <table class="table invoice-table">
                <thead>
                <tr class="unread">
                    <th class="mail-subject">Rute</th>
                    <th class="mail-subject">Nama Penumpang</th>
                    <th class="mail-subject">Nomor HP</th>
                    <th class="mail-subject">Alamat Jemput</th>
                    <th class="mail-subject">Alamat Antar</th>
                    <th class="mail-subject">Keterangan Antar</th>
                    <th class="mail-subject">Seat</th>
                    <th class="mail-subject">Jenis Pembayaran</th>
                    <th class="mail-subject">Keterangan</th> 
                    <th class="mail-subject">Pembatalan</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($col2 =mysqli_fetch_array($quer2)) {
               ?>
                <tr class="unread">
                    <td class="mail-subject"><?php echo $col2['rute']; ?></td>
                    <td class="mail-subject"><?php echo $col2['nama']; ?></td>
                    <td class="mail-subject"><?php echo $col2['hp']; ?></td>
                    <td class="mail-subject"><?php echo $col2['alamat_jemput']; ?></td>
                    <td class="mail-subject"><?php echo $col2['alamat_antar']; ?></td>
                    <td class="mail-subject"><?php echo $col2['ket_antar']; ?></td>
                    <td class="mail-subject"><?php echo $col2['seat']; ?></td>
                    <td class="mail-subject"><?php echo $col2['jenis']; ?></td>
                    <td class="mail-subject"><?php echo $col2['keterangan']; ?></td>
                     
                    <td class="mail-subject"><a href="">Update</a></td>
                </tr>
                 <?php
                 } 
                 ?>
                </tbody>
                </table>


                </div>

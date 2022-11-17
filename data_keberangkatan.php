<?php 
error_reporting( ~E_NOTICE ); // avoid notice
require_once 'conn.php';
$tanggal=$_GET['tgl'];
$jam=$_GET['jam'];
$quer2= mysqli_query($koneksi, "SELECT * FROM berangkat,supir,mobil where berangkat.id_supir=supir.id_supir and mobil.id_mobil=berangkat.id_mobil and berangkat.tanggal_jemput='$tanggal' and berangkat.jam_jemput='$jam'");
?>
 <div class="table-responsive m-t">
                <table class="table invoice-table">
                <thead>
                <tr class="unread">
                    <th class="mail-subject">Nama Sopir</th>
                    <th class="mail-subject">Nama Mobil</th>
                    <th class="mail-subject">Plat Nomer</th>
                    <th class="mail-subject">Jam Berangkat</th>
                    <th class="mail-subject">Jumlah Seat</th>
                    <th class="mail-subject">Jumlah Duduk</th>
                    <th class="mail-subject">Setting</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($col2 =mysqli_fetch_array($quer2)) {
                $id=$col2['id_berangkat'];     
               ?>
                <tr class="read">
                    <td class="mail-subject"><?php echo $col2['nama']; ?></td>
                    <td class="mail-subject"><?php echo $col2['nama_mobil']; ?></td>
                    <td class="mail-subject"><?php echo $col2['plat_nomer']; ?></td>
                    <td class="mail-subject"><?php echo $col2['jam_berangkat']; ?></td>
                    <td class="mail-subject"><?php echo $col2['jum_seat']; ?></td>
                    <td class="mail-subject"><?php echo $col2['jum_duduk']; ?></td>
                    <td class="mail-subject"><a href="?page=setting_penumpang&&jam=<?php echo $jam; ?>&&tanggal=<?php echo $tanggal; ?>&&id=<?php echo $id; ?>"><img src="img/login-icon.gif" title="Penumpang"></a> | <a href=""><img src="img/edit-icon.gif" title="Surat Jalan"></a></td>
                </tr>
                 <?php
                 } 
                 ?>
                </tbody>
                </table>


                </div>

 <?php 
// error_reporting( ~E_NOTICE ); // avoid notice
include "conn.php";
$tanggal=$_POST['tanggal'];
// $jam=$_GET['jam'];
$id_berangkat=$_POST['berangkat'];

$quer2= mysqli_query($koneksi, "SELECT travel.id_travel,travel.jam_jemput,travel.tanggal_jemput,travel.nama,travel.hp,travel.alamat_jemput,travel.ket_antar,travel.rute,travel.seat,travel.jum_seat,travel.harga,travel.jenis,travel.jadwal_booking,travel.waktu_booking,travel.keterangan,travel.`status`,travel_berangkat.id_keberangkatan,travel_berangkat.id_travel as id_travel2,travel_berangkat.id_berangkat,travel_berangkat.`status` as status2 FROM travel LEFT JOIN travel_berangkat ON travel.id_travel=travel_berangkat.id_travel WHERE travel.tanggal_jemput='$tanggal' and travel.status='1' GROUP BY travel.id_travel");

$quer3= mysqli_query($koneksi, "SELECT sewa.id_sewa,sewa.tanggal_jemput,sewa.jam_jemput,sewa.nama_sewa,sewa.no_hp,sewa.alamat_jemput,sewa.alamat_antar,sewa.paket,sewa.harga_sewa,sewa.tanggal_booking,sewa.jam_booking,sewa.`status`,sewa_berangkat.id_sewaberangkat,sewa_berangkat.id_sewa as id_sewa2, sewa_berangkat.id_berangkat, sewa_berangkat.`status` as status3 FROM sewa LEFT JOIN sewa_berangkat ON sewa.id_sewa=sewa_berangkat.id_sewa WHERE sewa.tanggal_jemput='$tanggal' and sewa.status='1' GROUP BY sewa.id_sewa");
?> 
 <div class="table-responsive m-t">
 <form action="aksi_keberangkatan.php" method="post" class="form-horizontal">
                <table class="table invoice-table">
                <thead>
                <tr class="unread">
                    <th class="mail-subject">Pilih</th>
                    <th class="mail-subject">Nama Penumpang</th>
                    <th class="mail-subject">Jam Jemput</th>
                    <th class="mail-subject">Alamat Jemput</th>
                    <th class="mail-subject">Keterangan</th>
                    <th class="mail-subject">Oper</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($col2 =mysqli_fetch_array($quer2)) {
                $id_travel=$col2['id_travel'];  
                $stts=$col2['status2'];    
               ?>
                <tr class="read">
                    <td>
                    <?php
                    if($stts=='1'){echo $hsl="<img src='img/msg-ok.gif' title='Penumpang Sudah Dijadwalkan'>";}else{echo $hsl="<input type='checkbox' class='i-checks' name='id_travel[]' value='$id_travel' id='id_travel[]'>";}?>
                    <input type="hidden" class="form-control" name="id_berangkat[]" value="<?php echo $id_berangkat;?>" id="id_berangkat[]">
                    <input type="hidden" class="form-control" name="status[]" value="1" id="status[]">
                    </td>
                    <td class="mail-subject"><?php echo $col2['nama']; ?></td>
                    <td class="mail-subject"><?php echo $col2['jam_jemput']; ?></td>
                    <td class="mail-subject"><?php echo $col2['alamat_jemput']; ?></td>
                    <td><select class="form-control" id="sel1" name="keterangan[]">
                        <option value="pergi">Pergi</option>
                        <option value="pulang">Pulang</option>
                        </select>
                    </td>
                    <td><select class="form-control" id="sel1" name="oper[]">
                        <option value="5">TIDAK</option>
                        <?php
                        $queryR = mysqli_query($koneksi, "SELECT * from dt_rekanan where id_rekan != '1'");
                        while ($colR = mysqli_fetch_array($queryR)) {
                        ?>
                        <option value="<?php echo $colR['id_rekan']; ?>"><?php echo $colR['nm_rekan']; ?></option>
                        <?php
                        } 
                        ?>
                        </select> 
                    </td>

                </tr>
                 <?php
                 } 
                 ?>
                </tbody>

                <thead>
                <tr class="unread">
                    <th class="mail-subject">Pilih</th>
                    <th class="mail-subject">Nama Penyewa</th>
                    <th class="mail-subject">Jam Jemput</th>
                    <th class="mail-subject">Alamat Jemput</th>
                    <th class="mail-subject">Keterangan</th>
                    <th class="mail-subject">Oper</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($col3 =mysqli_fetch_array($quer3)) {
                $id_sewa=$col3['id_sewa'];  
                $stts=$col3['status3'];  
                // var_dump($col3);  
               ?>
                <tr class="read">
                    <td>
                    <?php
                    if($stts=='1'){echo $hsl="<img src='img/msg-ok.gif' title='Penumpang Sudah Dijadwalkan'>";}else{echo $hsl="<input type='checkbox' class='i-checks' name='id_sewa[]' value='$id_sewa' id='id_sewa[]'>";}
                    ?>
                    <input type="hidden" class="form-control" name="id_berangkat[]" value="<?php echo $id_berangkat;?>" id="id_berangkat[]">
                    <input type="hidden" class="form-control" name="status2[]" value="1" id="status[]">
                    </td>
                    <td class="mail-subject"><?php echo $col3['nama_sewa']; ?></td>
                    <td class="mail-subject"><?php echo $col3['jam_jemput']; ?></td>
                    <td class="mail-subject"><?php echo $col3['alamat_jemput']; ?></td>
                    <td><select class="form-control" id="sel1" name="keterangan2[]">
                        <option value="pergi">Pergi</option>
                        <option value="pulang">Pulang</option>
                        </select>
                    </td>
                    <td><select class="form-control" id="sel1" name="oper2[]">
                        <option value="5">TIDAK</option>
                        <?php
                        $query_rekan = mysqli_query($koneksi, "SELECT * from dt_rekanan where id_rekan != '1'");
                        while ($col_rekan = mysqli_fetch_array($query_rekan)) {
                        ?>
                        <option value="<?php echo $col_rekan['id_rekan']; ?>"><?php echo $col_rekan['nm_rekan']; ?></option>
                        <?php
                        } 
                        ?>
                        </select>
                    </td>

                </tr>
                 <?php
                 } 
                 ?>
                </tbody>
                </table>
                <button class="ladda-button btn btn-primary" data-style="expand-left" type="submit" name="btnsave">Simpan</button>
</form>

                </div>


                
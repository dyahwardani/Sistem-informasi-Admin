 <?php 
error_reporting( ~E_NOTICE ); // avoid notice
require_once 'conn.php';
$tanggal=$_GET['tanggal'];
//$jam=$_GET['jam'];
$id_berangkat=$_GET['id_berangkat'];

$berang= mysqli_query($koneksi,"SELECT * FROM berangkat,mobil,supir WHERE supir.id_supir=berangkat.id_supir and mobil.id_mobil=berangkat.id_mobil and id_berangkat='$id_berangkat'");
$rowber = mysqli_fetch_array($berang);

$quer2= mysqli_query($koneksi, "SELECT travel.id_travel,travel.hp, travel.nama, travel.rute, travel.jam_jemput, travel.alamat_jemput, travel.ket_antar, travel.seat, travel.jum_seat, travel.jenis, travel.keterangan, travel_berangkat.id_keberangkatan, travel_berangkat.id_travel, travel_berangkat.id_berangkat, travel_berangkat.`status`, travel_berangkat.keterangan, berangkat.id_berangkat, berangkat.tanggal_jemput, berangkat.jam_pulang, berangkat.jam_berangkat, dt_rekanan.id_rekan as idrekan, dt_rekanan.nm_rekan AS namarekan FROM dt_rekanan, berangkat, travel_berangkat, travel WHERE dt_rekanan.id_rekan=travel.id_rekan AND berangkat.id_berangkat=travel_berangkat.id_berangkat AND travel.id_travel=travel_berangkat.id_travel AND travel.tanggal_jemput='$tanggal' AND travel_berangkat.keterangan='pergi' AND travel_berangkat.id_berangkat='$id_berangkat'");

$querpulang= mysqli_query($koneksi, "SELECT travel.id_travel,travel.hp, travel.nama, travel.rute, travel.jam_jemput, travel.alamat_jemput, travel.ket_antar, travel.seat, travel.jum_seat, travel.jenis, travel.keterangan, travel_berangkat.id_keberangkatan, travel_berangkat.id_travel, travel_berangkat.id_berangkat, travel_berangkat.`status`, travel_berangkat.keterangan, berangkat.id_berangkat, berangkat.tanggal_jemput, berangkat.jam_pulang, berangkat.jam_berangkat, dt_rekanan.id_rekan as idrekan, dt_rekanan.nm_rekan AS namarekan FROM dt_rekanan, berangkat, travel_berangkat, travel WHERE dt_rekanan.id_rekan=travel.id_rekan AND berangkat.id_berangkat=travel_berangkat.id_berangkat AND travel.id_travel=travel_berangkat.id_travel AND travel.tanggal_jemput='$tanggal' AND travel_berangkat.keterangan='pulang' AND travel_berangkat.id_berangkat='$id_berangkat'");

$quer3= mysqli_query($koneksi, "SELECT sewa.id_sewa, sewa.tanggal_jemput,sewa.no_hp, sewa.jam_jemput, sewa.nama_sewa, sewa.no_hp, sewa.alamat_jemput, sewa.alamat_antar, sewa.paket, sewa.harga_sewa, sewa.tanggal_booking, sewa.jam_booking, sewa.`status`, sewa_berangkat.id_sewaberangkat, sewa_berangkat.id_sewa, sewa_berangkat.`status`, sewa_berangkat.keterangan, berangkat.id_berangkat, berangkat.tanggal_jemput, berangkat.jam_pulang, berangkat.jam_berangkat, dt_rekanan.id_rekan AS idrekan, dt_rekanan.nm_rekan AS namarekan FROM dt_rekanan, berangkat, sewa, sewa_berangkat WHERE sewa.id_sewa=sewa_berangkat.id_sewa AND sewa_berangkat.id_berangkat=berangkat.id_berangkat AND sewa_berangkat.id_berangkat='$id_berangkat' AND sewa_berangkat.keterangan='pergi' AND sewa.tanggal_jemput='$tanggal' AND sewa.id_rekan=dt_rekanan.id_rekan");

$querpulangsewa= mysqli_query($koneksi, "SELECT sewa.id_sewa, sewa.tanggal_jemput,sewa.no_hp, sewa.jam_jemput, sewa.nama_sewa, sewa.no_hp, sewa.alamat_jemput, sewa.alamat_antar, sewa.paket, sewa.harga_sewa, sewa.tanggal_booking, sewa.jam_booking, sewa.`status`, sewa_berangkat.id_sewaberangkat, sewa_berangkat.id_sewa, sewa_berangkat.`status`, sewa_berangkat.keterangan, berangkat.id_berangkat, berangkat.tanggal_jemput, berangkat.jam_pulang, berangkat.jam_berangkat, dt_rekanan.id_rekan AS idrekan, dt_rekanan.nm_rekan AS namarekan FROM dt_rekanan, berangkat, sewa, sewa_berangkat WHERE sewa.id_sewa=sewa_berangkat.id_sewa AND sewa_berangkat.id_berangkat=berangkat.id_berangkat AND sewa_berangkat.id_berangkat='$id_berangkat' AND sewa_berangkat.keterangan='pulang' AND sewa.tanggal_jemput='$tanggal' AND sewa.id_rekan=dt_rekanan.id_rekan");
?> 
<script type="text/javascript">
// Popup window code
function newPopup(url) {
  popupWindow = window.open(
    url,'popUpWindow','height=400,width=800,left=10,top=10,resizable=no,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes')
}
</script>

<!-- ############################################################################################################## -->
<!-- ############################################################################################################## -->

<div>
    <a class="edit-record" href="" data-id="<?php echo $tanggal;?>" data-us="<?php echo $id_berangkat;?>"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tambah</button></a>  
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Penumpang</h4>
      </div>
      <div class="modal-body">        
           
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>
</div>
</div>
 
<!-- ############################################################################################################## -->
<!-- ############################################################################################################## -->

 <div class="table-responsive m-t">
 <h3>MOBIL : <?php echo $rowber['nama_mobil'];?>/<?php echo $rowber['plat_nomer']; ?> <br> DRIVER : <?php echo $rowber['nama'];?> <br> Pergi Jam : <?php echo $rowber['jam_berangkat']; ?></h3>
                <table class="table invoice-table" border="1">
                <h3>*TRAVEL</h3>
                <thead>
                <tr>
                    <th align="center">Rute</th>
                    <th align="center">Nama Penumpang</th>
                    <th align="center">Jam Jemput</th>
                    <th align="center">Alamat Jemput</th>
                    <th align="center">Alamat Antar</th> 
                    <th align="center">Seat</th>
                    <th align="center">Jumlah Seat</th>
                    <th align="center">Jenis Pembayaran</th>
                    <th align="center">Keterangan</th>
                    <th align="center">Dari</th>
                    <th align="center">Oper ke-</th> 
                    <th align="center">aksi</th> 
                   <!--  <th class="mail-subject"><a href="JavaScript:newPopup('?page=form_penumpang&&tanggal=<?php echo $tanggal;?>&&berangkat=<?php echo $id_berangkat;?>')"><img src="img/add-icon.gif" title="Tambah Penumpang"></a></th> -->
                </tr>
                </thead>
                <tbody>
                <?php
                
                $aa = mysqli_query($koneksi, "SELECT travel.id_travel, travel.hp, travel_berangkat.id_keberangkatan, travel_berangkat.id_rekan,travel_berangkat.keterangan, dt_rekanan.nm_rekan AS oper, travel_berangkat.id_berangkat, travel.tanggal_jemput FROM travel, berangkat, dt_rekanan, travel_berangkat WHERE travel_berangkat.id_rekan=dt_rekanan.id_rekan AND travel_berangkat.id_berangkat=berangkat.id_berangkat AND travel_berangkat.id_berangkat='$id_berangkat' AND travel_berangkat.keterangan='pergi' AND travel.id_travel=travel_berangkat.id_travel AND travel.tanggal_jemput='$tanggal'");
                
                while ($col2=mysqli_fetch_array($quer2) and $bb= mysqli_fetch_array($aa) ) {
                $id_keberangkatan=$col2['id_keberangkatan'];     
                // echo $id_keberangkatan;
                $ht=$col2['namarekan'];
                $a=$col2['idrekan'];
                $id=$col2['id_travel'];
                $hp=$col2['hp'];
                // echo $id;
                // echo $hp;
               ?>
                <tr>
                    <td align="center"><?php echo $col2['rute']; ?></td>
                    <td align="center"><?php echo $col2['nama']; ?></td>
                    <td align="center"><?php echo $col2['jam_jemput']; ?></td>
                    <td align="center"><?php echo $col2['alamat_jemput']; ?></td>
                    <td align="center"><?php echo $col2['ket_antar']; ?></td>
                    <td align="center"><?php echo $col2['seat']; ?></td>
                    <td align="center"><?php echo $col2['jum_seat']; ?></td>
                    <td align="center"><?php echo $col2['jenis']; ?></td>
                    <td align="center"><?php echo $col2['keterangan']; ?></td>
                    <td align="center"><?php echo $col2['namarekan'];?> </td>
                    <td align="center"><?php echo $bb['oper']; ?></td>
                    <td><a class="edit-data" href="" data-id="<?php echo $id;?>" data-userid="<?php echo $hp;?>" data-toggle="modal" data-target="#edit"><i class="fa fa-pencil-square" data-toggle="modal" aria-hidden="true" title="Edit"></i></a></td>
                </tr>
                 <?php
                 } 
                 ?>
                </tbody>
                </table>

<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Penumpang</h4>
      </div>
      <div id="modal-body-edit">        
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>
</div>
</div>


<!-- ############################################################################################################## -->
                <br>
                 <table class="table invoice-table" border="1">
                 <h3>*SEWA</h3>
                <thead>
                <tr>
                    <th align="center">Tanggal Jemput</th>
                    <th align="center">Nama Penyewa</th>
                    <th align="center">Jam Jemput</th>
                    <th align="center">Alamat Jemput</th>
                    <th align="center">Alamat Antar</th>
                    <th align="center">Paket</th>
                    <th align="center">Harga</th>
                    <th align="center">No Hp</th>
                    <th align="center">Dari</th>
                    <th align="center">Oper ke-</th> 
                    <th align="center">aksi</th> 
                   <!--  <th class="mail-subject"><a href="JavaScript:newPopup('?page=form_penumpang&&tanggal=<?php echo $tanggal;?>&&berangkat=<?php echo $id_berangkat;?>')"><img src="img/add-icon.gif" title="Tambah Penumpang"></a></th> -->
                </tr>
                </thead>
                <tbody>
                <?php
                $ss = mysqli_query($koneksi, "SELECT sewa_berangkat.id_sewaberangkat,sewa.no_hp, sewa_berangkat.id_rekan,sewa_berangkat.keterangan, dt_rekanan.nm_rekan AS oper, sewa_berangkat.id_berangkat, sewa.tanggal_jemput FROM sewa, berangkat, dt_rekanan, sewa_berangkat WHERE sewa_berangkat.id_rekan=dt_rekanan.id_rekan AND sewa_berangkat.id_berangkat=berangkat.id_berangkat AND sewa_berangkat.id_berangkat='$id_berangkat' AND sewa_berangkat.keterangan='pergi' AND sewa.id_sewa=sewa_berangkat.id_sewa AND sewa.tanggal_jemput='$tanggal'");
                while ($col3 =mysqli_fetch_array($quer3) and $dd= mysqli_fetch_array($ss)) {
                  $id_travel=$col2['id_travel'];  
                  $id_sewaberangkat=$col3['id_sewaberangkat'];
                  // echo $id_sewaberangkat;   
                  $ids=$col3['id_sewa'];
                  $nohps=$col3['no_hp'];
                  // echo $ids;
                  // echo $nohps;
               ?>
                <tr>
                    <td align="center"><?php echo $col3['tanggal_jemput']; ?></td>
                    <td align="center"><?php echo $col3['nama_sewa']; ?></td>
                    <td align="center"><?php echo $col3['jam_jemput']; ?></td>
                    <td align="center"><?php echo $col3['alamat_jemput']; ?></td>
                    <td align="center"><?php echo $col3['alamat_antar']; ?></td>
                    <td align="center"><?php echo $col3['paket']; ?></td>
                    <td align="center"><?php echo $col3['harga_sewa']; ?></td>
                    <td align="center"><?php echo $col3['no_hp']; ?></td>
                    <td align="center"><?php echo $col3['namarekan']; ?></td>
                    <td align="center"><?php echo $dd['oper']; ?></td> 
                    <td><a class="edit-data2" href="" data-id="<?php echo $ids;?>" data-userid="<?php echo $nohps;?>" data-toggle="modal" data-target="#edit2"><i class="fa fa-pencil-square" aria-hidden="true" title="Edit"></i></a></td>
                </tr>
                 <?php
                 } 
                 ?>
                </tbody>
                </table>
                </div>

<div id="edit2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Penumpang</h4>
      </div>
      <div id="modal-body-edit2">              
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>
</div>
</div>


<!-- ############################################################################################################## -->
<!-- ############################################################################################################## -->


                <div class="table-responsive m-t">
 <h3>Pulang Jam :<?php echo $rowber['jam_pulang']; ?> </h3>
                <table class="table invoice-table" border="1">
                <h3>*TRAVEL</h3>
                <thead>
                <tr>
                    <th align="center">Rute</th>
                    <th align="center">Nama Penumpang</th>
                    <th align="center">Jam Jemput</th>
                    <th align="center">Alamat Jemput</th>
                    <th align="center">Alamat Antar</th>
                    <th align="center">Seat</th>
                    <th align="center">Jumlah Seat</th>
                    <th align="center">Jenis Pembayaran</th>
                    <th align="center">Keterangan</th>
                    <th align="center">Dari</th>
                    <th align="center">Oper ke-</th> 
                    <th align="center">aksi</th> 
                   <!--  <th class="mail-subject"><a href="JavaScript:newPopup('?page=form_penumpang&&tanggal=<?php echo $tanggal;?>&&berangkat=<?php echo $id_berangkat;?>')"><img src="img/add-icon.gif" title="Tambah Penumpang"></a></th> -->
                </tr>
                </thead>
                <tbody>
                <?php
                $cc = mysqli_query($koneksi, "SELECT travel_berangkat.id_keberangkatan, travel.hp, travel_berangkat.id_rekan,travel_berangkat.keterangan, dt_rekanan.nm_rekan AS oper, travel_berangkat.id_berangkat, travel.tanggal_jemput FROM travel, berangkat, dt_rekanan, travel_berangkat WHERE travel_berangkat.id_rekan=dt_rekanan.id_rekan AND travel_berangkat.id_berangkat=berangkat.id_berangkat AND travel_berangkat.id_berangkat='$id_berangkat' AND travel_berangkat.keterangan='pulang' AND travel.id_travel=travel_berangkat.id_travel AND travel.tanggal_jemput='$tanggal'");
                while ($col22 =mysqli_fetch_array($querpulang) and $dd= mysqli_fetch_array($cc)) {
                  $id_travel=$col2['id_travel'];     
                  $id_keberangkatan2=$col2['id_keberangkatan'];
                  // echo $id_keberangkatan2;
                  $id1=$col22['id_travel'];
                  $hp1=$col22['hp'];
                  // echo $id1;
                  // echo $hp1;
               ?>
                <tr>
                    <td align="center"><?php echo $col22['rute']; ?></td>
                    <td align="center"><?php echo $col22['nama']; ?></td>
                    <td align="center"><?php echo $col22['jam_jemput']; ?></td>
                    <td align="center"><?php echo $col22['alamat_jemput']; ?></td>
                    <td align="center"><?php echo $col22['ket_antar']; ?></td> 
                    <td align="center"><?php echo $col22['seat']; ?></td>
                    <td align="center"><?php echo $col22['jum_seat']; ?></td>
                    <td align="center"><?php echo $col22['jenis']; ?></td>
                    <td align="center"><?php echo $col22['keterangan']; ?></td>
                    <td align="center"><?php echo $col22['namarekan'];?> </td>
                    <td align="center"><?php echo $dd['oper']; ?></td>
                    <td><a class="edit-data1" href="" data-id="<?php echo $id1;?>" data-userid="<?php echo $hp1;?>" data-toggle="modal" data-target="#edit1"><i class="fa fa-pencil-square" aria-hidden="true" title="Edit"></i></a></td>
                </tr>
                 <?php
                 } 
                 ?>
                </tbody>
                </table>

<div id="edit1" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Penumpang</h4>
      </div>
      <div id="modal-body-edit1">        
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>
</div>
</div>

                
<!-- ############################################################################################################## -->
                
                
                <br>
                 <table class="table invoice-table" border="1">
                 <h3>*SEWA</h3>
                <thead>
                <tr>
                    <th align="center">Tanggal Jemput</th>
                    <th align="center">Nama Penyewa</th>
                    <th align="center">Jam Jemput</th>
                    <th align="center">Alamat Jemput</th>
                    <th align="center">Alamat Antar</th>
                    <th align="center">Paket</th>
                    <th align="center">Harga</th>
                    <th align="center">No Hp</th>
                    <th align="center">Dari</th>
                    <th align="center">Oper ke-</th> 
                    <th align="center">aksi</th> 
                   <!--  <th class="mail-subject"><a href="JavaScript:newPopup('?page=form_penumpang&&tanggal=<?php echo $tanggal;?>&&berangkat=<?php echo $id_berangkat;?>')"><img src="img/add-icon.gif" title="Tambah Penumpang"></a></th> -->
                </tr>
                </thead>
                <tbody>
                <?php
                $ff = mysqli_query($koneksi, "SELECT sewa_berangkat.id_sewaberangkat,sewa.no_hp, sewa_berangkat.id_rekan,sewa_berangkat.keterangan, dt_rekanan.nm_rekan AS oper, sewa_berangkat.id_berangkat, sewa.tanggal_jemput FROM sewa, berangkat, dt_rekanan, sewa_berangkat WHERE sewa_berangkat.id_rekan=dt_rekanan.id_rekan AND sewa_berangkat.id_berangkat=berangkat.id_berangkat AND sewa_berangkat.id_berangkat='$id_berangkat' AND sewa_berangkat.keterangan='pulang' AND sewa.id_sewa=sewa_berangkat.id_sewa AND sewa.tanggal_jemput='$tanggal'");
                while ($col33 =mysqli_fetch_array($querpulangsewa) and $gg= mysqli_fetch_array($ff)) {
                  $id_travel=$col2['id_travel'];     
                  $id_sewaberangkat2=$col33['id_sewaberangkat'];
                  // echo $id_sewaberangkat2;
                  $ids1=$col33['id_sewa'];
                  $nohps1=$col33['no_hp'];
                  // echo $ids1;
                  // echo $nohps1;
               ?>
                <tr>
                    <td align="center"><?php echo $col33['tanggal_jemput']; ?></td>
                    <td align="center"><?php echo $col33['nama_sewa']; ?></td>
                    <td align="center"><?php echo $col33['jam_jemput']; ?></td>
                    <td align="center"><?php echo $col33['alamat_jemput']; ?></td>
                    <td align="center"><?php echo $col33['alamat_antar']; ?></td>
                    <td align="center"><?php echo $col33['paket']; ?></td>
                    <td align="center"><?php echo $col33['harga_sewa']; ?></td>
                    <td align="center"><?php echo $col33['no_hp']; ?></td>
                    <td align="center"><?php echo $col33['namarekan']; ?></td>
                    <td align="center"><?php echo $gg['oper']; ?></td>  
                    <td><a class="edit-data3" href="" data-id="<?php echo $ids1;?>" data-userid="<?php echo $nohps1;?>" data-toggle="modal" data-target="#edit3"><i class="fa fa-pencil-square" aria-hidden="true" title="Edit"></i></a></td>
                </tr>
                 <?php
                 } 
                 ?>
                </tbody>
                </table>
                </div>

<div id="edit3" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Penumpang</h4>
      </div>
      <div id="modal-body-edit3">        
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>
</div>
</div>    
<!-- ############################################################################################################## -->            
<script>
        $(function(){

            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('form_penumpang.php',
                    {tanggal:$(this).attr('data-id'),berangkat:$(this).attr('data-us')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });

            $(document).on('click','.edit-data',function(a){
                a.preventDefault();
                $("#edit").modal('show');
                $.post('uptravel.php',
                    {id:$(this).attr('data-id'),nomor:$(this).attr('data-userid')},
                    function(html){
                        $("#modal-body-edit").html(html);
                    }   
                );
            });

            $(document).on('click','.edit-data1',function(b){
                b.preventDefault();
                $("#edit1").modal('show');
                $.post('uptravel.php',
                    {id:$(this).attr('data-id'),nomor:$(this).attr('data-userid')},
                    function(html){
                        $("#modal-body-edit1").html(html);
                    }   
                );
            });

            $(document).on('click','.edit-data2',function(c){
                c.preventDefault();
                $("#edit2").modal('show');
                $.post('upsewa.php',
                    {id:$(this).attr('data-id'),nomor:$(this).attr('data-userid')},
                    function(html){
                        $("#modal-body-edit2").html(html);
                    }   
                );
            });

            $(document).on('click','.edit-data3',function(d){
                d.preventDefault();
                $("#edit3").modal('show');
                $.post('upsewa.php',
                    {id:$(this).attr('data-id'),nomor:$(this).attr('data-userid')},
                    function(html){
                        $("#modal-body-edit3").html(html);
                    }   
                );
            });
        });
    </script>
 
                
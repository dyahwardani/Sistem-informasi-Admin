<?php

            error_reporting( ~E_NOTICE ); // avoid notice

            require_once 'conn.php';
            
            if(isset($_POST['btnsave']))
            {
              $jamjemput = $_POST['jamjemput'];// user name
              $tggljemput = $_POST['tggljemput'];// user email
              $namapenumpang =$_POST['namapenumpang'];
              $nohp =$_POST['nohp'];
              $alamatjemput = $_POST['alamatjemput'];// user name
              $ket_antar =$_POST['ket_antar'];
              $rute =$_POST['rute'];
              $seat =$_POST['seat'];
              $harga =$_POST['harga'];
              $jenis =$_POST['jenis'];
              $tgglbook =$_POST['tgglbook'];
              $jambook =$_POST['jambook'];
              $paket =$_POST['paket'];
               $status =$_POST['status'];
               $jumseat =$_POST['jumseat'];
               $idt =$_POST['id_travel'];
               $rekanan =$_POST['rekanan'];

            //  $cari2 = mysqli_query($koneksi, "SELECT * FROM tujuan WHERE id_tujuan='$alamatant'");
             // $cari3 = mysqli_fetch_array($cari2);
            //  $namalokasi = $cari3['nama_lokasi'];

                // if no error occured, continue ....
                if(!isset($errMSG))
                {
                    $stmt = "UPDATE travel SET id_travel='$idt', id_rekan='$rekanan',jam_jemput='$jamjemput',tanggal_jemput='$tggljemput',nama='$namapenumpang',hp='$nohp',alamat_jemput='$alamatjemput',ket_antar='$ket_antar',rute='$rute',seat='$seat',jum_seat='$jumseat',harga='$harga',jenis='$jenis',jadwal_booking='$tgglbook',waktu_booking='$jambook',keterangan='$paket',status='$status' WHERE id_travel='$idt'";

                    if($koneksi->query($stmt)===true)
                    {?>
                        <!-- //$successMSG = "Data Customer Travel berhasil diupdate ...";
                    //    header('location:index.php?page=search'); // redirects image view page after 5 seconds. -->
                    <script language="javascript">
                        alert("Data sudah di update");
                        history.back();                       
                    </script>
                    <?php
                    // header('location:index.php?page=search');
                    ?>
                     <?php
                    }
                    else
                    {
                        $errMSG = "error while inserting....";
                    }
                }
            }
          ?>


          <?php
          if(isset($errMSG)){
              ?>
                    <div class="alert alert-danger">
                      <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
                    </div>
                    <?php
          }
          else if(isset($successMSG)){
            ?>
                <div class="alert alert-success">
                      <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
                </div>
                <?php
          }
  
    $quer = mysqli_query($koneksi, "SELECT * FROM berangkat,supir,mobil WHERE berangkat.id_supir=supir.id_supir AND berangkat.id_mobil=mobil.id_mobil");
    // $quer2 = mysqli_query($koneksi, "SELECT * FROM tujuan");
    
?>
 
<div class="container">
 <div class="row">
<?php

$id_tr = strip_tags($_GET['id']);
$query1 =  "SELECT * FROM travel where id_travel='$id_tr'"; 
$result1 = $koneksi->query($query1) or die($koneksi->error.__LINE__);
$rows1= $result1->fetch_assoc();
// extract($rows1);
// var_dump($rows1);


$nama = strip_tags($_GET['nomor']);
if($nama=="")
echo "";
else{
$query =  "SELECT * FROM travel where hp like '%$nama%' order by tanggal_jemput asc"; 
$result = $koneksi->query($query) or die($koneksi->error.__LINE__);
$no=1;

if($result->num_rows > 0){
    echo '<h4 class="media-heading"> Sudah pernah pesan travel sebanyak ';
    echo $result->num_rows.' kali </h4>';
    $rows= $result->fetch_assoc();
    extract($rows);
    var_dump($rows);
    ?>
<div class="row animated fadeInRight">
<div class="col-lg-12">

                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Update Data Customer</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form action="?page=update_travel" method="post" class="form-horizontal" name="form1">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Rute</label>
                                <div class="col-sm-10"> 
                                <select name="rute" class="form-control">
           <?php
           if ($rute == "MLG-SBY") echo "<option value='MLG-SBY' selected>MLG-SBY</option>";
           else echo "<option value='MLG-SBY'>MLG-SBY</option>";
           if ($rute == "MLG-SDR") echo "<option value='MLG-SDR' selected>MLG-SDR</option>";
           else echo "<option value='MLG-SDR'>MLG-SDR</option>";
           if ($rute == "MLG-JND") echo "<option value='MLG-JND' selected>MLG-JND</option>";
           else echo "<option value='MLG-JND'>MLG-JND</option>";
           if ($rute == "MLG-BT") echo "<option value='MLG-BT' selected>MLG-BT</option>";
           else echo "<option value='MLG-BT'>MLG-BT</option>";
           if ($rute == "BT-JND") echo "<option value='BT-JND' selected>BT-JND</option>";
           else echo "<option value='BT-JND'>BT-JND</option>";
           if ($rute == "BT-MLG") echo "<option value='BT-MLG' selected>BT-MLG</option>";
           else echo "<option value='BT-MLG'>BT-MLG</option>";
           if ($rute == "BT-SBY") echo "<option value='BT-SBY' selected>BT-SBY</option>";
           else echo "<option value='BT-SBY'>BT-SBY</option>";
           if ($rute == "BT-SDR") echo "<option value='BT-SDR' selected>BT-SDR</option>";
           else echo "<option value='BT-SDR'>BT-SDR</option>";
           if ($rute == "SDR-SBY") echo "<option value='SDR-SBY' selected>SDR-SBY</option>";
           else echo "<option value='SDR-SBY'>SDR-SBY</option>";
           if ($rute == "SDR-JND") echo "<option value='SDR-JND' selected>SDR-JND</option>";
           else echo "<option value='SDR-JND'>SDR-JND</option>";
           if ($rute == "SDR-BT") echo "<option value='SDR-BT' selected>SDR-BT</option>";
           else echo "<option value='SDR-BT'>SDR-BT</option>";
           if ($rute == "SDR-MLG") echo "<option value='SDR-MLG' selected>SDR-MLG</option>";
           else echo "<option value='SDR-MLG'>SDR-MLG</option>";
           if ($rute == "JND-SBY") echo "<option value='JND-SBY' selected>JND-SBY</option>";
           else echo "<option value='JND-SBY'>JND-SBY</option>";
           if ($rute == "JND-BT") echo "<option value='JND-BT' selected>JND-BT</option>";
           else echo "<option value='JND-BT'>JND-BT</option>";
           if ($rute == "JND-SDR") echo "<option value='JND-SDR' selected>JND-SDR</option>";
           else echo "<option value='JND-SDR'>JND-SDR</option>";
           if ($rute == "JND-MLG") echo "<option value='JND-MLG' selected>JND-MLG</option>";
           else echo "<option value='JND-MLG'>JND-MLG</option>";
           if ($rute == "SBY-MLG") echo "<option value='SBY-MLG' selected>SBY-MLG</option>";
           else echo "<option value='SBY-MLG'>SBY-MLG</option>";
           if ($rute == "SBY-BT") echo "<option value='SBY-BT' selected>SBY-BT</option>";
           else echo "<option value='SBY-BT'>SBY-BT</option>";
           if ($rute == "SBY-SDR") echo "<option value='SBY-SDR' selected>SBY-SDR</option>";
           else echo "<option value='SBY-SDR'>SBY-SDR</option>";
           if ($rute == "SBY-JND") echo "<option value='SBY-JND' selected>SBY-JND</option>";
           else echo "<option value='SBY-JND'>SBY-JND</option>";
           ?>
                                  </select>
                                </div>
                                </div> 

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jam Jemput</label>

                                <div class="col-sm-10">
                                <input type="text" class="form-control" data-mask="99:99" placeholder="hh:ss" name="jamjemput" id="jamjemput" value="<?php echo $jam_jemput; ?>"><input type="hidden" class="form-control" name="id_travel" value="<?php echo $id_travel; ?>">
                                </div>
                                </div>  

                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="data_1">
                                <label class="col-sm-2 control-label">Tanggal Jemput</label>
                                <div class="col-sm-10">
                                 <input type="text" class="form-control" name="tggljemput" data-mask="99/99/9999" placeholder="mm/dd/YYYY" value="<?php echo $tanggal_jemput; ?>">
                                
                                </div>
                                </div>  
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Penumpang</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="namapenumpang" value="<?php echo $nama; ?>"></div>
                                </div>
                               
                                <div class="hr-line-dashed"></div>
                                 <div class="form-group"><label class="col-sm-2 control-label">No Hp</label>
                                <div class="col-sm-10"><input type="text" class="form-control" data-mask="999-999-999-999" placeholder="" name="nohp" value="<?php echo $hp; ?>"> </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat Jemput</label>

                                <div class="col-sm-10"><textarea class="form-control" name="alamatjemput"><?php echo $alamat_jemput; ?></textarea >
                                </div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat Antar</label>

                                <div class="col-sm-10"><textarea class="form-control" name="ket_antar"><?php echo $ket_antar; ?></textarea >
                 
                                </div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Seat</label>

                                <div class="col-sm-10"><input type="text" class="form-control" name="seat" value="<?php echo $seat; ?>">
                                <input type="hidden" class="form-control" name="status" value="1"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jumlah Seat</label>

                                <div class="col-sm-10"><input type="text" class="form-control" name="jumseat" value="<?php echo $jum_seat; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Harga</label>
                
                                <div class="col-sm-10"><input type="text" class="form-control" data-mask="999999" placeholder="" name="harga" value="<?php echo $harga; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jenis Bayar</label>

                                <div class="col-sm-10">
                                
                                  <select class="form-control" name="jenis" id="jenis">
                              <?php
                               if ($jenis == "BA") echo "<option value='BA' selected>BA</option>";
                               else echo "<option value='BA'>BA</option>";
                               if ($jenis == "LA") echo "<option value='LA' selected>LA</option>";
                               else echo "<option value='LA'>LA</option>";
                               ?>
                                </select>
                             
                                </div>
                                </div>
                                <input type="hidden" class="form-control" name="tgglbook" value="<?php date_default_timezone_set('Asia/Jakarta'); echo $tgl=date('d/m/Y'); ?>">
                                 <input type="hidden" class="form-control" name="jambook" value="<?php date_default_timezone_set('Asia/Jakarta'); echo $jam=date('H:i:s'); ?>"> 
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Keterangan</label>

                                <div class="col-sm-10">
                                
                                  <select class="form-control" name="paket"  id="paket">
                               <?php
                               if ($keterangan == "Penumpang") echo "<option value='Penumpang' selected>Penumpang</option>";
                               else echo "<option value='Penumpang'>Penumpang</option>";
                               if ($keterangan == "Paket") echo "<option value='Paket' selected>Paket</option>";
                               else echo "<option value='Paket'>Paket</option>";
                               ?>
                                  </select>
                             
                                </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Dari</label>

                                <div class="col-sm-10">
                                <select class="form-control" name="rekanan">
                                  <?php 
                                  $rekan = mysqli_query($koneksi, "SELECT * from dt_rekanan where id_rekan = '$id_rekan'"); 
                                  $rekans=mysqli_fetch_array($rekan);
                                  $nama_rekan=$rekans['nm_rekan'];
                                  ?>
                                    <option value="<?php echo $id_rekan; ?>"><?php echo $nama_rekan; ?></option> 
                                    <option value="5"></option>
                                        <?php
                                        $query_rekan = mysqli_query($koneksi, "SELECT * from dt_rekanan where id_rekan != '1'");
                                        while ($col_rekan = mysqli_fetch_array($query_rekan)) {
                                             # code...
                                        ?>
                                        <option value="<?php echo $col_rekan['id_rekan']; ?>"><?php echo $col_rekan['nm_rekan']; ?></option>
                                        
                                      
                                        <?php
                                         } 
                                        ?>
                                     </select>
                                </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="reset">Cancel</button>
                                        <button class="ladda-button btn btn-primary" data-style="expand-left" type="submit" name="btnsave">Submit</button>
                                    </div>
                                </div>
                            </form></div>
                        </div>
                    </div>
                </div>
</div>
</div>
<?php
}                                        
}                                        ?>

 

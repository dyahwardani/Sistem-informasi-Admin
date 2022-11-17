<?php

            //error_reporting( ~E_NOTICE ); // avoid notice

            require_once 'koneksi.php';

            if(isset($_POST['btnsave']))
            {

              // $target = "uploads/".basename($_FILES['image']['name']);
              // $image = $_FILES['image']['name'];


              $jamjemput = $_POST['jamjemput'];// user name
              $tggljemput = $_POST['tggljemput'];// user email
              $namapenumpang =$_POST['namapenumpang'];
              $email =$_POST['email']; // email
              $nohp =$_POST['nohp'];
              $alamatjemput = $_POST['alamatjemput'];// user name
              $ket_antar =$_POST['ket_antar'];
              $rute =$_POST['rute'];
              $seat =$_POST['seat'];
              $harga =$_POST['harga'];
              $metode =$_POST['metode'];  //metode
              $jenis =$_POST['jenis'];
              $tgglbook =$_POST['tgglbook'];
              $jambook =$_POST['jambook'];
              $paket =$_POST['paket'];
               $status =$_POST['status'];
               $jumseat =$_POST['jumseat'];
               $rekan =$_POST['rekanan'];
               
               $nohp_com = str_replace("-","", $_POST['nohp']);
               
               //Penerapan Cookie
                $value_1='nama';
                $value_2='email';
                $value_3='metode_bayar';
                $value_4='keterangan_antar'; //product detail -> info rinci lihat di form_api_bayar.php
                $value_5='nomor';
                $value_6='harga';
               
                
                setcookie($value_1, $namapenumpang, time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie($value_2, $email, time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie($value_3, $metode, time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie($value_4, $namapenumpang, time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie($value_5, $nohp_com, time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie($value_6, $harga, time() + (86400 * 30), "/"); // 86400 = 1 day
               

                if(!isset($errMSG))
                {
                    $stmt = "INSERT INTO travel (id_travel,id_rekan,jam_jemput,tanggal_jemput,nama,hp,alamat_jemput,ket_antar,rute,seat,jum_seat,harga,jenis,jadwal_booking,waktu_booking,keterangan,status)
                VALUES(null,'".$rekan."','".$jamjemput."','".$tggljemput."','".$namapenumpang."','".$nohp."','".$alamatjemput."','".$ket_antar."','".$rute."','".$seat."','".$jumseat."','".$harga."','".$jenis."','".$tgglbook."','".$jambook."','".$paket."','".$status."')";

                  $msg = "";

                    if($koneksi->query($stmt)===true)
                    {
                      // echo "<script>
                      // alert('Data Travel telah berhasil di tambahkan');
                      
                      // </script>";

                      // if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                      //   $msg = "Image terupload";
                      // }else{
                      //   $msg = "Image tidak terupload";
                      // }
      
                        header("location:?page=search");
                        $successMSG = "Penumpang Travel berhasil ditambahkan ... silahkan cek di menu Travel";
                        //header("berangkat.php"); // redirects image view page after 5 seconds.
                    }
                    else
                    {
                        $errMSG = "error while inserting....";
                        var_dump($stmt);
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
?>
<div class="row animated fadeInRight">
<div class="col-lg-12">

                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Tambah Data Customer</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form action="?page=form_travel" method="post" class="form-horizontal" name="form1">
              <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Rute</label>

                                <div class="col-sm-10"> 
                               
                                  <select class="form-control" name="rute">
                                    <option value="MLG-SBY">MLG-SBY</option>
                                    <option value="MLG-SDR">MLG-SDR</option>
                                    <option value="MLG-JND">MLG-JND</option>
                                    <option value="MLG-BT">MLG-BT</option>
                                    <option value="BT-JND">BT-JND</option>
                                    <option value="BT-MLG">BT-MLG</option>
                                    <option value="BT-SBY">BT-SBY</option>
                                    <option value="BT-SDR">BT-SDR</option>
                                    <option value="SDR-SBY">SDR-SBY</option>
                                    <option value="SDR-JND">SDR-JND</option>
                                    <option value="SDR-BT">SDR-BT</option>
                                    <option value="SDR-MLG">SDR-MLG</option>
                                    <option value="JND-SBY">JND-SBY</option>
                                    <option value="JND-BT">JND-BT</option>
                                    <option value="JND-SDR">JND-SDR</option>
                                    <option value="JND-MLG">JND-MLG</option>
                                    <option value="SBY-MLG">SBY-MLG</option>
                                    <option value="SBY-BT">SBY-BT</option>
                                    <option value="SBY-SDR">SBY-SDR</option>
                                    <option value="SBY-JND">SBY-JND</option>
                                  </select>
                                   
                                </div>
                                </div> 
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jam Jemput</label>

                                <div class="col-sm-10">
                                <input type="text" class="form-control" data-mask="99:99" placeholder="hh:ss" name="jamjemput" id="jamjemput">
                                </div>
                                </div>  
                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="data_1">
                                <label class="col-sm-2 control-label">Tanggal Jemput</label><div class="col-sm-10">
                                 <input type="text" class="form-control" name="tggljemput" data-mask="99/99/9999" placeholder="mm/dd/YYYY">
                                
                                </div></div>  
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Penumpang</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="namapenumpang" value="<?php echo $nama; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                 <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10"><input type="text" class="form-control"  name="email" value="<?php echo $email; ?>"> </div>
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
                                <!--<div class="form-group"><label class="col-sm-2 control-label">Harga</label>-->
                
                                <!--<div class="col-sm-10"><input type="text" class="form-control" data-mask="999999" placeholder="" name="harga">-->
                                <!--        <span class="help-block">ex: Rp.999999</span></div>-->
                                <!--</div>-->

                                <!--<div class="hr-line-dashed"></div>-->
                                <div class="form-group"><label class="col-sm-2 control-label">Media Payment</label>
      
                                <div class="col-sm-10">
                                
                                  <select class="form-control" name="metode" id="metode">
                                    <option value="VC">VISA</option>
                                    <option value="">-</option>
                                  </select>
                             
                                </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jenis Bayar</label>

                                <div class="col-sm-10">
                                
                                  <select class="form-control" name="jenis" id="jenis">
                                    <option value="BA">BA</option>
                                    <option value="LA">LA</option>
                                  </select>
                             
                                </div>
                                </div>
                                <input type="hidden" class="form-control" name="tgglbook" value="<?php date_default_timezone_set('Asia/Jakarta'); echo $tgl=date('d/m/Y'); ?>">
                                 <input type="hidden" class="form-control" name="jambook" value="<?php date_default_timezone_set('Asia/Jakarta'); echo $jam=date('H:i:s'); ?>"> 
                             <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Keterangan</label>

                                <div class="col-sm-10">
                                
                                  <select class="form-control" name="paket"  id="paket">
                                    <option value="penumpang">Penumpang</option>
                                    <option value="paket">Paket</option>
                                    
                                  </select>
                             
                                </div>
                                </div>
                                 <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Dari</label>

                                <div class="col-sm-10">
                                <select class="form-control" name="rekanan">
                                    <option value="1"></option>
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
//}

} else{
echo '<h4 class="media-heading"> Anda Customer Travel Baru </h4>';
?>
<div class="row animated fadeInRight">
<div class="col-lg-12">

                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Tambah Data Customer</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form action="?page=form_travel" method="post" class="form-horizontal" name="form1">
              <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Rute</label>

                                <div class="col-sm-10"> 
                               
                                  <select class="form-control" name="rute">
                                    <option value="MLG-SBY">MLG-SBY</option>
                                    <option value="MLG-SDR">MLG-SDR</option>
                                    <option value="MLG-JND">MLG-JND</option>
                                    <option value="MLG-BT">MLG-BT</option>
                                    <option value="BT-JND">BT-JND</option>
                                    <option value="BT-MLG">BT-MLG</option>
                                    <option value="BT-SBY">BT-SBY</option>
                                    <option value="BT-SDR">BT-SDR</option>
                                    <option value="SDR-SBY">SDR-SBY</option>
                                    <option value="SDR-JND">SDR-JND</option>
                                    <option value="SDR-BT">SDR-BT</option>
                                    <option value="SDR-MLG">SDR-MLG</option>
                                    <option value="JND-SBY">JND-SBY</option>
                                    <option value="JND-BT">JND-BT</option>
                                    <option value="JND-SDR">JND-SDR</option>
                                    <option value="JND-MLG">JND-MLG</option>
                                    <option value="SBY-MLG">SBY-MLG</option>
                                    <option value="SBY-BT">SBY-BT</option>
                                    <option value="SBY-SDR">SBY-SDR</option>
                                    <option value="SBY-JND">SBY-JND</option>
                                  </select>
                                   
                                </div>
                                </div> 
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jam Jemput</label>

                                <div class="col-sm-10">
                                <input type="text" class="form-control" data-mask="99:99" placeholder="hh:ss" name="jamjemput" id="jamjemput">
                                
                                </div>
                                </div>  
                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="data_1">
                                <label class="col-sm-2 control-label">Tanggal Jemput</label><div class="col-sm-10">
                                 <input type="text" class="form-control" name="tggljemput" data-mask="99/99/9999" placeholder="mm/dd/YYYY">
                                
                                </div></div>  
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Penumpang</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="namapenumpang"></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10"><input type="email" class="form-control" name="email"></div>
                                </div>
                               
                                <div class="hr-line-dashed"></div>
                                 <div class="form-group"><label class="col-sm-2 control-label">No Hp</label>
                                <div class="col-sm-10"><input type="text" class="form-control" data-mask="999-999-999-999" placeholder="" name="nohp" value="<?php echo $nama; ?>"> </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat Jemput</label>

                                <div class="col-sm-10"><textarea class="form-control" name="alamatjemput"></textarea >
                                </div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat Antar</label>

                                <div class="col-sm-10"><textarea class="form-control" name="ket_antar"></textarea >
                 
                                </div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Seat</label>

                                <div class="col-sm-10"><input type="text" class="form-control" name="seat">
                                <input type="hidden" class="form-control" name="status" value="1"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jumlah Seat</label>

                                <div class="col-sm-10"><input type="text" class="form-control" name="jumseat"></div>
                                </div>
                                
                                <!--<div class="hr-line-dashed"></div>-->
                                <!--<div class="form-group"><label class="col-sm-2 control-label">Harga</label>-->
                
                                <!--<div class="col-sm-10"><input type="text" class="form-control" data-mask="999999" placeholder="" name="harga">-->
                                <!--        <span class="help-block">ex: Rp.999999</span></div>-->
                                <!--</div>-->
                                
                                 <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Harga</label>

                                <div class="col-sm-10"><input type="number" class="form-control" placeholder="Tuliskan jumlah uang nominal tanpa titik " name="harga"></div>
                                </div>

                                <!-- <div class="hr-line-dashed"></div> -->
                                <!-- <div class="form-group"><label class="col-sm-2 control-label">Metode Bayar</label>

                                <div class="col-sm-10">
                                
                                  <select class="form-control" name="metode" id="metode">
                                    <option value="VC">VISA MASTER</option>
                                    <option value="-">-</option>
                                  </select>
                             
                                </div>
                                </div> -->

                                <!-- <div class="hr-line-dashed"></div> -->
                                <!-- <div class="form-group"><label class="col-sm-2 control-label" >File Bukti Pembayaran</label> -->

                                  <!-- <div class="col-sm-10"> -->
                                    <!-- <form action="uploadd.php" method="post" enctype="multipart/form-data"> -->
                                    <!-- <div class="col-sm-10"><input type="file" name="image" /> -->
                                    <!-- </form> -->
                                  <!-- </div>
                                  
                                  </div>
                                </div> -->

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jenis Bayar</label>

                                <div class="col-sm-10">
                                
                                  <select class="form-control" name="jenis" id="jenis">
                                    <option value="BA">BA</option>
                                    <option value="LA">LA</option>
                                  </select>
                             
                                </div>
                                </div>

                                <input type="hidden" class="form-control" name="tgglbook" value="<?php date_default_timezone_set('Asia/Jakarta'); echo $tgl=date('d/m/Y'); ?>">
                                 <input type="hidden" class="form-control" name="jambook" value="<?php date_default_timezone_set('Asia/Jakarta'); echo $jam=date('H:i:s'); ?>"> 
                             <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Keterangan</label>

                                <div class="col-sm-10">
                                
                                  <select class="form-control" name="paket"  id="paket">
                                    <option value="penumpang">Penumpang</option>
                                    <option value="paket">Paket</option>
                                    
                                  </select>
                             
                                </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Dari Rekanan</label>

                                <div class="col-sm-10">
                                <select class="form-control" name="rekanan">
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
}
?>

 

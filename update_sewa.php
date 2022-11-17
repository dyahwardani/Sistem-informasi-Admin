<?php

            error_reporting( ~E_NOTICE ); // avoid notice

            require_once 'conn.php';

            if(isset($_POST['btnsave']))
            {
              $jamjem = $_POST['jamjemput'];// user name
              $tggljem = $_POST['tggljemput'];// user email
              $namapenm =$_POST['namapenumpang'];
              $nohp =$_POST['nohp'];
              $alamatjem = $_POST['alamatjemput'];// user name
              $alamatant = $_POST['alamatantar'];// user email
              $paket =$_POST['paket'];
              $harga =$_POST['harga'];
              $tglbook =$_POST['tgglbook'];
              $jambook =$_POST['jambook'];
              $idsew =$_POST['id_sewa'];
              $rekan =$_POST['rekanan'];

                // if no error occured, continue ....
                if(!isset($errMSG))
                {
                    $stmt = "UPDATE sewa SET id_sewa='$idsew', id_rekan='$rekan',tanggal_jemput='$tggljem',jam_jemput='$jamjem',nama_sewa='$namapenm',no_hp='$nohp',alamat_jemput='$alamatjem',alamat_antar='$alamatant',paket='$paket',harga_sewa='$harga',tanggal_booking='$tglbook',jam_booking='$jambook' WHERE id_sewa='$idsew'";

                    if($koneksi->query($stmt)===true)
                    {?>
                        <!-- //$successMSG = "Data Sewa berhasil ditambahkan ...";
                        // header('location:index.php?page=searching'); // redirects image view page after 5 seconds. -->
                        <script language="javascript">
                        alert("Data sudah di update");
                        history.back();                       
                    </script>
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
          ?>

 
<div class="container">
<div class="row">
 <?php
$ids = strip_tags($_GET['id']);
$query =  "SELECT * FROM sewa where id_sewa='$ids'"; 
$result = $koneksi->query($query) or die($koneksi->error.__LINE__);
$rows= $result->fetch_assoc();
// extract($rows);
// var_dump($rows);

$nama = strip_tags($_GET['nomor']);
if($nama=="")
echo "";
else{
$query =  "SELECT * FROM sewa where no_hp like '%$nama%' order by tanggal_jemput asc"; 
$result = $koneksi->query($query) or die($koneksi->error.__LINE__);
$no=1;
if($result->num_rows > 0){
echo '<h4 class="media-heading"> Sudah pernah sewa sebanyak ';
echo $result->num_rows.' kali </h4>';
$rows= $result->fetch_assoc();
extract($rows);
var_dump($rows);
?>
<div class="row animated fadeInRight">
<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Update Data Sewa</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form action="?page=update_sewa" method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Jam Jemput</label>

                                <div class="col-sm-10">
                                <input type="text" class="form-control" data-mask="99:99" placeholder="hh:ss" name="jamjemput" id="jamjemput" value="<?php echo $jam_jemput; ?>">
                                <input type="hidden" name="id_sewa" value="<?php echo $id_sewa; ?>">
                                </div>
                                </div>  
                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="data_1">
                                <label class="col-sm-2 control-label">Tanggal Jemput</label><div class="col-sm-10">
                                 <input type="text" class="form-control" name="tggljemput" data-mask="99/99/9999" placeholder="mm/dd/YYYY" value="<?php echo $tanggal_jemput; ?>">
                               
                                </div></div>  
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Penumpang</label>

                                <div class="col-sm-10"><input type="text" class="form-control" name="namapenumpang" required="true" value="<?php echo $nama_sewa; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                 <div class="form-group"><label class="col-sm-2 control-label">No Hp</label>

                                <div class="col-sm-10"><input type="text" class="form-control" name="nohp" required="true" data-mask="999-999-999-999" placeholder="" value="<?php echo $no_hp; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat Jemput</label>

                                <div class="col-sm-10"><textarea class="form-control" name="alamatjemput"><?php echo $alamat_jemput; ?></textarea></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat Antar</label>

                                <div class="col-sm-10"><textarea class="form-control" name="alamatantar"><?php echo $alamat_antar; ?></textarea>
                                </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Paket</label>
                                <div class="col-sm-10">
                                <select class="form-control" name="paket">
            <?php
           if ($paket == "FD") echo "<option value='FD' selected>FD</option>";
           else echo "<option value='FD'>FD</option>";
           if ($paket == "12 Jam") echo "<option value='12 Jam' selected>12 Jam</option>";
           else echo "<option value='12 Jam'>12 Jam</option>";
           if ($paket == "Bromo") echo "<option value='Bromo' selected>Bromo</option>";
           else echo "<option value='Bromo'>Bromo</option>";
           if ($paket == "Drop") echo "<option value='Drop' selected>Drop</option>";
           else echo "<option value='Drop'>Drop</option>";
           if ($paket == "Paket Wisata") echo "<option value='Paket Wisata' selected>Paket Wisata</option>";
           else echo "<option value='Paket Wisata'>Paket Wisata</option>";
           ?>
                                </select>
                                </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Harga</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="harga" required="true" data-mask="999.999" placeholder="" value="<?php echo $harga_sewa; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="data_1">
                                <label class="col-sm-2 control-label">Tanggal Booking</label><div class="col-sm-10">
                                <input type="text" class="form-control" name="tgglbook" data-mask="99/99/9999" placeholder="mm/dd/YYYY" value="<?php echo $tanggal_booking; ?>">
                               </div></div> 

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jam Booking</label>
                                <div class="col-sm-10"><input type="time" class="form-control" name="jambook" required="true" data-mask="99:99" placeholder="hh:ss" value="<?php echo $jam_booking; ?>">
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
                            </form>
                        </div>
                    </div>
                </div>
</div>
</div>
<?php
}
}
?>
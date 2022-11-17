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
              $pakt =$_POST['paket'];
              $harg =$_POST['harga'];
              $tglbook =$_POST['tgglbook'];
              $jambook =$_POST['jambook'];
              $rekan =$_POST['rekanan']; 
              $status = $_POST['status'];

                // if no error occured, continue ....
                if(!isset($errMSG))
                {
                    $stmt = "INSERT INTO sewa(id_sewa,id_rekan,tanggal_jemput,jam_jemput,nama_sewa,no_hp,alamat_jemput,alamat_antar,paket,harga_sewa,tanggal_booking,jam_booking,status)
                VALUES(null,'".$rekan."','".$tggljem."','".$jamjem."','".$namapenm."','".$nohp."','".$alamatjem."','".$alamatant."','".$pakt."','".$harg."','".$tglbook."','".$jambook."','".$status."')";

                    if($koneksi->query($stmt)===true)
                    {
                        
                        header("location:?page=searching"); // redirects image view page after 5 seconds.
                        $successMSG = "Data Sewa berhasil ditambahkan ... silahkan cek di menu Sewa";
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
?>
<div class="row animated fadeInRight">
<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Tambah Data Sewa</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form action="?page=form_sewa" method="post" class="form-horizontal">
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

                                <div class="col-sm-10"><input type="text" class="form-control" name="namapenumpang" required="true" value="<?php echo $nama_sewa; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                 <div class="form-group"><label class="col-sm-2 control-label">No Hp</label>

                                <div class="col-sm-10"><input type="text" class="form-control" name="nohp" required="true" data-mask="999-999-999-999" placeholder="" value="<?php echo $nama; ?>">
                                <input type="hidden" class="form-control" name="status" value="1"></div></div>
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
                                <option value="FD">Full Day (FD)</option>
                                <option value="12 Jam">12 Jam</option>
                                <option value="Bromo">Bromo</option>
                                <option value="Drop">Drop</option>
                                <option value="Paket Wisata">Paket Wisata</option>
                                </select>
                                </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Harga</label>

                                <div class="col-sm-10"><input type="text" class="form-control" name="harga"  data-mask="999999" placeholder="">
                                        <span class="help-block">ex: Rp.999999</span></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="data_1">
                                <label class="col-sm-2 control-label">Tanggal Booking</label><div class="col-sm-10">
                                <input type="text" class="form-control" name="tgglbook" data-mask="99/99/9999" placeholder="mm/dd/YYYY">
                               </div></div> 
                                <div class="hr-line-dashed"></div>
                                 <div class="form-group"><label class="col-sm-2 control-label">Jam Booking</label>

                                <div class="col-sm-10"><input type="time" class="form-control" name="jambook" required="true" data-mask="99:99" placeholder="hh:ss">
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
                            </form>
                        </div>
                    </div>
                </div>
</div>
</div>
<?php 
//}

} else{
echo '<h4 class="media-heading"> Anda Customer Sewa Baru </h4>';
?>
<div class="row animated fadeInRight">
<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Tambah Data Sewa</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form action="?page=form_sewa" method="post" class="form-horizontal">
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

                                <div class="col-sm-10"><input type="text" class="form-control" name="namapenumpang" required="true"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                 <div class="form-group"><label class="col-sm-2 control-label">No Hp</label>

                                <div class="col-sm-10"><input type="text" class="form-control" name="nohp" required="true" data-mask="999-999-999-999" placeholder="" value="<?php echo $nama; ?>">
                                <input type="hidden" class="form-control" name="status" value="1"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat Jemput</label>

                                <div class="col-sm-10"><textarea class="form-control" name="alamatjemput"></textarea></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat Antar</label>
                                <div class="col-sm-10"><textarea class="form-control" name="alamatantar"></textarea>
                                </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Paket</label>
                                <div class="col-sm-10">
                                <select class="form-control" name="paket">
                                <option value="FD 12 Jam">FD 12 Jam</option>
                                <option value="12 Jam">12 Jam</option>
                                <option value="Bromo">Bromo</option>
                                <option value="Drop">Drop</option>
                                <option value="Paket Wisata">Paket Wisata</option>
                                </select>
                                </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Harga</label>
                                <div class="col-sm-10"><input type="text" class="form-control" name="harga" required="true" data-mask="999999" placeholder="">
                                        <span class="help-block">ex: Rp.999999</span></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="data_1">
                                <label class="col-sm-2 control-label">Tanggal Booking</label><div class="col-sm-10">
                                <input type="text" class="form-control" name="tgglbook" data-mask="99/99/9999" placeholder="mm/dd/YYYY">
                               </div></div> 
                                <div class="hr-line-dashed"></div>
                                 <div class="form-group"><label class="col-sm-2 control-label">Jam Booking</label>

                                <div class="col-sm-10"><input type="text" class="form-control" name="jambook" required="true" data-mask="99:99" placeholder="hh:ss">
                                </div>
                                </div>
                                 <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Dari</label>

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
                            </form>
                        </div>
                    </div>
                </div>
</div>
</div>
<?php
}}
?>


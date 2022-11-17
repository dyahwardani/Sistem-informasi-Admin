<?php
error_reporting( ~E_NOTICE ); // avoid notice
require_once 'conn.php';
            if(isset($_POST['btnsave']))
            {
              //  $jumlah = count($_POST["id_travel"]);
              /*  $mobil = $_POST['mobil'];
                $quer5 = mysqli_query($koneksi, "SELECT * FROM mobil where id_mobil='$mobil'");
                $jum_mobil=mysqli_fetch_array($quer5);
                $jumlah=$jum_mobil['jum_duduk'];*/
             
                $supir = $_POST["supir"] ;// user name
                $mobil = $_POST["mobil"] ;// user email
                $jamber =$_POST["jamber"] ;
                $jampul = $_POST['jampul'];
                $tanggal =$_POST["tanggal"] ;
                $idrekan = $_POST["rekanan"];
                //$jam =$_POST["jam"] ; 
              /*  $saku = $_POST['saku'];
                $bbm =$_POST["bbm"] ;
                $tol =$_POST["tol"] ; 
                $parkir =$_POST["parkir"] ; */
                // if no error occured, continue ....
                 if(!isset($errMSG))
                {
                $stmt = "INSERT INTO berangkat(id_berangkat,id_supir,id_rekan,id_mobil, tanggal_jemput,jam_pulang,jam_berangkat)
                VALUES(null,'".$supir."','".$idrekan."','".$mobil."','".$tanggal."','".$jampul."','".$jamber."')";
             
                    if($koneksi->query($stmt)===true)
                    {
                        $successMSG = "Keberangkatan berhasil ditambahkan ...";
                       // header("berangkat.php"); // redirects image view page after 5 seconds.
                        ?>
                            <script language="javascript">
                            alert("Mobil Sudah di Jadwalkan");
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

  //  $jam=$_GET['jam'];
    $plat=$_GET['plat'];     
    $quer = mysqli_query($koneksi, "SELECT * FROM supir");
    $quer2 = mysqli_query($koneksi, "SELECT * FROM mobil where plat_nomer='$plat'");
    $col2 = mysqli_fetch_array($quer2);
    $nm_mobil=$col2['nama_mobil'];
    $plat_nmr=$col2['plat_nomer'];
    $id_mbl=$col2['id_mobil'];
    $quer3 = mysqli_query($koneksi, "SELECT * FROM tujuan");
    $quer4 = mysqli_query($koneksi, "SELECT * FROM travel where jam_jemput='$jam' and tanggal_jemput='$tanggal'");
     
?>
<div class="container">
<div class="row animated fadeInRight">
<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Setting Data Keberangkatan</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form action="?page=berangkat" method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Supir</label>

                                    <div class="col-sm-10">
                                   
                                        <select class="form-control" name="supir">
                                        <?php
                                        
                                        while ($col1 = mysqli_fetch_array($quer)) {
                                             # code...
                                        ?>
                                        <option value="<?php echo $col1['id_supir']; ?>"><?php echo $col1['nama']; ?></option>
                                        
                                      
                                        <?php
                                         } 
                                        ?>
                                     </select>
                                </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Mobil</label>
                                <div class="col-sm-10"><input type="text" disabled="disabled" class="form-control" value="<?php echo $nm_mobil; ?>/<?php echo $plat_nmr; ?>"> <input type="hidden" class="form-control" name="mobil" value="<?php echo $id_mbl; ?>">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="data_1">
                                <label class="col-sm-2 control-label">Tanggal Berangkat</label><div class="col-sm-10">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tanggal" value="<?php echo $tanggal; ?>">
                                </div>
                              </div></div> 
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jam Berangkat</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="jamber" data-mask="99.99" placeholder="">
                                    <span class="help-block">ex: 10.00</span> </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jam Pulang</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="jampul" data-mask="99.99" placeholder="">
                                    <span class="help-block">ex: 10.00</span> </div>
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

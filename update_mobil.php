  <?php

            error_reporting( ~E_NOTICE ); // avoid notice
           // $id_mobil = strip_tags($_GET['id']);
            require_once 'conn.php';
            if(isset($_POST['btnsave']))
            {
                $namamobil = $_POST['namamobil'];// user name
                $jenis = $_POST['jenismobil'];// user email
                $plat =$_POST['platmobil'];
                $jumlah =$_POST['jumlah'];
                $duduk =$_POST['duduk'];
                $id =$_POST['id_mobil'];
               

                // if no error occured, continue ....
                if(!isset($errMSG))
                {
                $stmt = "UPDATE mobil SET id_mobil='$id',nama_mobil='$namamobil',jenis_mobil='$jenis',plat_nomer='$plat',jum_seat='$jumlah',jum_duduk='$duduk' WHERE id_mobil='$id'";

                    if($koneksi->query($stmt)===true)
                    {
                       // $successMSG = "Mobil berhasil ditambahkan ...";
                        //header("mobil.php"); // redirects image view page after 5 seconds.
                        header('location:index.php?page=dt_mobil');
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
<div class="row animated fadeInRight">
    <?php

            $id_mobil = strip_tags($_GET['id']);
            $query =  "SELECT * FROM mobil where id_mobil='$id_mobil'"; 
            $result = $koneksi->query($query) or die($koneksi->error.__LINE__);
            $rows= $result->fetch_assoc();
            extract($rows);?>
<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Update Data Mobil</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form action="?page=update_mobil" method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Mobil</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="namamobil" value="<?php echo $nama_mobil; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jenis Mobil</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="jenismobil" value="<?php echo $jenis_mobil; ?>"></div><input type="hidden" name="id_mobil" value="<?php echo $id_mobil; ?>">
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Plat Nomer</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="platmobil" value="<?php echo $plat_nomer; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jumlah Seat</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="jumlah" value="<?php echo $jum_seat; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jumlah Tempat Duduk</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="duduk" value="<?php echo $jum_duduk; ?>"></div>
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

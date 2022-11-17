  <?php

            error_reporting( ~E_NOTICE ); // avoid notice

            require_once 'conn.php';

            if(isset($_POST['btnsave']))
            {
                $namamobil = $_POST['namamobil'];// user name
                $jenis = $_POST['jenismobil'];// user email
                $plat =$_POST['platmobil'];
                $jumlah =$_POST['jumlah'];
                $duduk =$_POST['duduk'];


                // if no error occured, continue ....
                if(!isset($errMSG))
                {
                $stmt = "INSERT INTO mobil(id_mobil,nama_mobil,jenis_mobil,plat_nomer,jum_seat,jum_duduk)
                VALUES(null,'".$namamobil."','".$jenis."','".$plat."','".$jumlah."','".$duduk."')";

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
<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Tambah Data Mobil</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form action="?page=mobil" method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Mobil</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="namamobil"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jenis Mobil</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="jenismobil"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Plat Nomer</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="platmobil"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jumlah Seat</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="jumlah"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jumlah Tempat Duduk</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="duduk"></div>
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

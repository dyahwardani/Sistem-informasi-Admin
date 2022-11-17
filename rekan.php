  <?php

            error_reporting( ~E_NOTICE ); // avoid notice

            require_once 'conn.php';

            if(isset($_POST['btnsave']))
            {
              //$nama = $_POST['ktp'];// user name
              $nama = $_POST['nama'];// user email
              $alamat =$_POST['alamat'];
              $nohp=$_POST['nohp'];
              //$tgl=$_POST['tggllahir'];
              //$tmpt=$_POST['tempatlahir'];


                // if no error occured, continue ....
                if(!isset($errMSG))
                {
                    $stmt = "INSERT INTO dt_rekanan(id_rekan,nm_rekan,alamat_rekan,nohp)
                VALUES(null,'".$nama."','".$alamat."','".$nohp."')";

                    if($koneksi->query($stmt)===true)
                    {
                        //$successMSG = "Supir berhasil ditambahkan ...";
                        //header("?page=dt_sopir"); // redirects image view page after 5 seconds.
                        header('location:index.php?page=dt_rekanan');
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
                            <h5>Tambah Data Rekanan/Agen</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form action="?page=rekan" method="post" class="form-horizontal">
                                
                                 
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Rekanan</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="nama"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat Rekanan</label>

                                    <div class="col-sm-10"><textarea class="form-control" name="alamat"></textarea > 
                                </div>
                              </div>
                                 <div class="hr-line-dashed"></div>
                                 <div class="form-group"><label class="col-sm-2 control-label">Nomor Hp Rekanan</label>
                                <div class="col-sm-10"><input type="text" class="form-control"  name="nohp"> </div>
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

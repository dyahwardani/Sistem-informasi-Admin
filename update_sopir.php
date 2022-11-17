  <?php

            error_reporting( ~E_NOTICE ); // avoid notice

            require_once 'conn.php';

            if(isset($_POST['btnsave']))
            {
                $kt = $_POST['ktp'];// user name
                $nama = $_POST['nama'];// user email
              $alamat =$_POST['alamat'];
              $nohp=$_POST['nohp'];
              $tgl=$_POST['tggllahir'];
              $tmpt=$_POST['tempatlahir'];
              $id_supir=$_POST['id'];


                // if no error occured, continue ....
                if(!isset($errMSG))
                {
                    $stmt = "UPDATE supir SET id_supir='$id_supir',ktp='$kt',nama='$nama',alamat='$alamat',nohp='$nohp',tanggal_lahir='$tgl',tempat_lahir='$tmpt' WHERE id_supir='$id_supir'";

                    if($koneksi->query($stmt)===true)
                    {
                        //$successMSG = "Supir berhasil ditambahkan ...";
                        //header("?page=dt_sopir"); // redirects image view page after 5 seconds.
                        header('location:index.php?page=dt_sopir');
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
<script language='javascript' type='text/javascript' src='tiny_mce/tiny_mce.js'></script>
<script language='javascript' type='text/javascript'>
  tinyMCE.init({
      theme : "advanced",
    theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        mode : "textareas"
    });
</script>
<div class="container">
<div class="row animated fadeInRight">
  <div class="row animated fadeInRight">
      <?php

            $id_sopir = strip_tags($_GET['id']);
            $query =  "SELECT * FROM supir where id_supir='$id_sopir'"; 
            $result = $koneksi->query($query) or die($koneksi->error.__LINE__);
            $rows= $result->fetch_assoc();
            extract($rows);
            // var_dump($rows);
            ?>
            
<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Tambah Data Supir</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form action="?page=update_sopir" method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">KTP</label>
                                <div class="col-sm-10"><input type="text" class="form-control" data-mask="999999-999999-9999" placeholder="" name="ktp" value="<?php echo $ktp; ?>"><input type="text" class="form-control" name="id" value="<?php echo $id_supir; ?>">
                                        <span class="help-block">ex: 999999-999999-9999</span> </div>
                                </div>
                                 
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Lengkap</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat Lengkap</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>"></textarea > 
                                </div></div>
                                 <div class="hr-line-dashed"></div>
                                 <div class="form-group"><label class="col-sm-2 control-label">No Hp</label>
                                <div class="col-sm-10"><input type="text" class="form-control" data-mask="999-999-999-999" placeholder="" name="nohp" value="<?php echo $nohp; ?>">
                                        <span class="help-block">ex: 099-999-999-999</span> </div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="data_1">
                                <label class="col-sm-2 control-label">Tanggal Lahir</label><div class="col-sm-10">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="tggllahir" value="<?php echo $tanggal_lahir; ?>">
                                </div>
                              </div></div>
                                 
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Tempat Lahir</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="tempatlahir" value="<?php echo $tempat_lahir; ?>"></div>
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

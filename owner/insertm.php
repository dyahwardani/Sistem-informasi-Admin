  <?php

            error_reporting( ~E_NOTICE ); // avoid notice

            require_once '../conn.php';

            if(isset($_POST['btnsave']))
            {
                $tggl = $_POST['tanggal'];// user name
                $sup = $_POST['supir'];// user email
              $orde =$_POST['orde'];
              $tag = $_POST['tagihan'];// user name
                $uangsak = $_POST['uangsaku'];// user email
              $bbm =$_POST['bbm'];
              $tol = $_POST['tol'];// user name
                $park = $_POST['parkir'];// user email
              $fee =$_POST['feedriver'];


                // if no error occured, continue ....
                if(!isset($errMSG))
                {
                    $stmt = "INSERT INTO keuangan(id_keuangan,tanggal_keuangan,c_order,tagihan,uang_saku,bbm,tol,parkir,fee_driver,nama_driver)
                VALUES(null,'".$tggl."','".$orde."','".$tag."','".$uangsak."','".$bbm."','".$tol."','".$park."','".$fee."','".$sup."')";

                    if($koneksi->query($stmt)===true)
                    {
                        $successMSG = "Data Keuangan berhasil ditambahkan ...";
                        header("insertm.php"); // redirects image view page after 5 seconds.
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
          <?php 
             $quer = mysqli_query($koneksi, "SELECT * FROM supir");
          ?>

<div class="container">
<div class="row animated fadeInRight">
<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Tambah Data Keuangan</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form action="?page=insertm" method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Tanggal</label>

                                    <div class="col-sm-10"><input type="date" class="form-control" name="tanggal" data-mask="99/99/9999" placeholder="mm/dd/YYYY"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Driver</label>

                                    <div class="col-sm-10">
                                   
                                        <select class="form-control" name="supir">
                                         <?php
                                        while ($col1 = mysqli_fetch_array($quer)) {
                                             # code...
                                        ?>
                                        <option value="<?php echo $col1['nama']; ?>"><?php echo $col1['nama']; ?></option>
                                        
                                      
                                        <?php
                                         } 
                                        ?>
                                     </select>
                                </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Order</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="orde"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Tagihan</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="tagihan"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Uang Saku</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="uangsaku"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">BBM</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="bbm"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">TOL</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="tol"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">PARKIR</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="parkir"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">FEE DRIVER</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="feedriver"></div>
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

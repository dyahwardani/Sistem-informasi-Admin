  <?php

            error_reporting( ~E_NOTICE ); // avoid notice

            require_once '../conn.php';

            if(isset($_POST['btnsave']))
            {
                $username = $_POST['username'];// user name
                $password = $_POST['password'];// user email
                


                // if no error occured, continue ....
                if(!isset($errMSG))
                {
                    $stmt = "INSERT INTO admin(id_admin,username,password)
                VALUES(null,'".$username."','".$password."')";

                    if($koneksi->query($stmt)===true)
                    {
                       // $successMSG = "Mobil berhasil ditambahkan ...";
                        //header("mobil.php"); // redirects image view page after 5 seconds.
                        header('location:index.php?page=dt_admin');
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
                            <h5>Tambah Account Owner</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form action="?page=form_account" method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Username</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="username"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Password </label>

                                    <div class="col-sm-10"><input type="password" class="form-control" name="password"></div>
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

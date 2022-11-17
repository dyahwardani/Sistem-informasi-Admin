  <?php

            error_reporting( ~E_NOTICE ); // avoid notice
            $id_operator = strip_tags($_GET['id_operator']);
            require_once 'conn.php';

            if(isset($_POST['btnsave']))
            {
                $username = $_POST['username'];// user name
                $password = $_POST['password'];// user email
                $id = $_POST['id'];

                


                // if no error occured, continue ....
                if(!isset($errMSG))
                {
                    $stmt = "UPDATE operator SET username='$username',password='$password' where id_operator='$id'";

                    if($koneksi->query($stmt)===true)
                    {
                       // $successMSG = "Mobil berhasil ditambahkan ...";
                        //header("mobil.php"); // redirects image view page after 5 seconds.
                        //header('location:index.php?page=dt_admin');
                        ?>
                      <script language="javascript">
                      alert("data sudah diupdate");
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
 

$query =  "SELECT * FROM operator where id_operator='$id_operator'"; 
$result = $koneksi->query($query) or die($koneksi->error.__LINE__);
$rows= $result->fetch_assoc();
extract($rows);
?>

<div class="container">
<div class="row animated fadeInRight">
<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Update Account Operator</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form action="?page=form_update_account" method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Username</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="username" value="<?php echo $username;?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Password </label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="password" value="<?php echo $password;?>">
                                    <input type="hidden" class="form-control" name="id" value="<?php echo $id_operator;?>"></div>
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

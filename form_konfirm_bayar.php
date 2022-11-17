<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>.:: Nayfa Trans ::.</title>
   
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <?php
      $value_1='nama';
      $value_2='email';
      $value_3='metode_bayar';
      $value_4='keterangan_antar'; //product detail
      $value_5='nomor';
        session_start();
        $value_1='nama';
        $value_2='email';
        $value_3='metode_bayar';
        $value_4='keterangan_antar'; //product detail
        $value_5='nomor';
    ?>
    
</head>

<body>

    <div id="wrapper"  class="gray-bg">
        <div id="page-wrapper" class="gray-bg">
        <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Konfirmasi Data Pembayaran<small> Data tidak bisa di update, harus di halaman sebelumnya.</small></h5>
                            <div class="ibox-tools">
                                <!-- <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a> -->
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="get" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Rekening</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="nama_rkng" value= "<?php echo $_COOKIE[$value_1]; ?>" readonly></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Email </label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="email_rkng"  value= "<?php echo $_COOKIE[$value_2]; ?>" readonly></div>  
                                </div>
                                <div class="hr-line-dashed"></div>
                                    <div class="form-group"><label class="col-sm-2 control-label">No. HP </label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="no_hp"  value= "<?php echo $_COOKIE[$value_5]; ?>" readonly></div>  
                                </div>
                                <div class="hr-line-dashed"></div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Metode Bayar </label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="metode_bayar"  value= "<?php echo $_COOKIE[$value_3]; ?>" readonly></div>  
                                </div>
                                <div class="hr-line-dashed"></div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Detail Produk </label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="detail_produk"  value= "<?php echo $_COOKIE[$value_4]; ?>" readonly></div>  
                                </div>
                               
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-danger" type="button" onClick="javascript:history.go(-1)" >Kembali</button>
                                        <button class="btn btn-primary" type="submit">Lanjutkan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
    </div><!-- wrapper-->
      

        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
</body>

</html>

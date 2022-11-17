<?php
include "conn.php";
$id=$_POST['id'];
$nomor=$_POST['nomor'];
echo $id;
echo $nomor;
$query = mysqli_query($koneksi, "SELECT * FROM travel WHERE id_travel='$id'");
$result = mysqli_fetch_array($query);
// var_dump($result);

//UPDATE
// if(isset($_POST['btnsave'])){
//     $jamjemput = $_POST['jamjemput'];// user name
//     $tggljemput = $_POST['tggljemput'];// user email
//     $namapenumpang =$_POST['namapenumpang'];
//     $nohp =$_POST['nohp'];
//     $alamatjemput = $_POST['alamatjemput'];// user name
//     $ket_antar =$_POST['ket_antar'];
//     $rute =$_POST['rute'];
//     $seat =$_POST['seat'];
//     $harga =$_POST['harga'];
//     $jenis =$_POST['jenis'];
//     $tgglbook =$_POST['tgglbook'];
//     $jambook =$_POST['jambook'];
//     $paket =$_POST['paket'];
//     $status =$_POST['status'];
//     $jumseat =$_POST['jumseat'];
//     $idt =$_POST['id_travel'];
//     $rekanan =$_POST['rekanan'];

//         $stmt = "UPDATE travel SET id_travel='$idt', id_rekan='$rekanan',jam_jemput='$jamjemput',tanggal_jemput='$tggljemput',nama='$namapenumpang',hp='$nohp',alamat_jemput='$alamatjemput',ket_antar='$ket_antar',rute='$rute',seat='$seat',jum_seat='$jumseat',harga='$harga',jenis='$jenis',jadwal_booking='$tgglbook',waktu_booking='$jambook',keterangan='$paket',status='$status' WHERE id_travel='$idt'";
        
    

// }
?>

<div class="ibox-content">
    <form action="uptravel1.php" method="post" class="form-horizontal">
        <div class="form-group"><label class="col-sm-2 control-label">Rute</label>
            <div class="col-sm-10"> 
            <select name="rute" class="form-control">
           <?php
           if ($result['rute'] == "MLG-SBY") echo "<option value='MLG-SBY' selected>MLG-SBY</option>";
           else echo "<option value='MLG-SBY'>MLG-SBY</option>";
           if ($result['rute'] == "MLG-SDR") echo "<option value='MLG-SDR' selected>MLG-SDR</option>";
           else echo "<option value='MLG-SDR'>MLG-SDR</option>";
           if ($result['rute'] == "MLG-JND") echo "<option value='MLG-JND' selected>MLG-JND</option>";
           else echo "<option value='MLG-JND'>MLG-JND</option>";
           if ($result['rute'] == "MLG-BT") echo "<option value='MLG-BT' selected>MLG-BT</option>";
           else echo "<option value='MLG-BT'>MLG-BT</option>";
           if ($result['rute'] == "BT-JND") echo "<option value='BT-JND' selected>BT-JND</option>";
           else echo "<option value='BT-JND'>BT-JND</option>";
           if ($result['rute'] == "BT-MLG") echo "<option value='BT-MLG' selected>BT-MLG</option>";
           else echo "<option value='BT-MLG'>BT-MLG</option>";
           if ($result['rute'] == "BT-SBY") echo "<option value='BT-SBY' selected>BT-SBY</option>";
           else echo "<option value='BT-SBY'>BT-SBY</option>";
           if ($result['rute'] == "BT-SDR") echo "<option value='BT-SDR' selected>BT-SDR</option>";
           else echo "<option value='BT-SDR'>BT-SDR</option>";
           if ($result['rute'] == "SDR-SBY") echo "<option value='SDR-SBY' selected>SDR-SBY</option>";
           else echo "<option value='SDR-SBY'>SDR-SBY</option>";
           if ($result['rute'] == "SDR-JND") echo "<option value='SDR-JND' selected>SDR-JND</option>";
           else echo "<option value='SDR-JND'>SDR-JND</option>";
           if ($result['rute'] == "SDR-BT") echo "<option value='SDR-BT' selected>SDR-BT</option>";
           else echo "<option value='SDR-BT'>SDR-BT</option>";
           if ($result['rute'] == "SDR-MLG") echo "<option value='SDR-MLG' selected>SDR-MLG</option>";
           else echo "<option value='SDR-MLG'>SDR-MLG</option>";
           if ($result['rute'] == "JND-SBY") echo "<option value='JND-SBY' selected>JND-SBY</option>";
           else echo "<option value='JND-SBY'>JND-SBY</option>";
           if ($result['rute'] == "JND-BT") echo "<option value='JND-BT' selected>JND-BT</option>";
           else echo "<option value='JND-BT'>JND-BT</option>";
           if ($result['rute'] == "JND-SDR") echo "<option value='JND-SDR' selected>JND-SDR</option>";
           else echo "<option value='JND-SDR'>JND-SDR</option>";
           if ($result['rute'] == "JND-MLG") echo "<option value='JND-MLG' selected>JND-MLG</option>";
           else echo "<option value='JND-MLG'>JND-MLG</option>";
           if ($result['rute'] == "SBY-MLG") echo "<option value='SBY-MLG' selected>SBY-MLG</option>";
           else echo "<option value='SBY-MLG'>SBY-MLG</option>";
           if ($result['rute'] == "SBY-BT") echo "<option value='SBY-BT' selected>SBY-BT</option>";
           else echo "<option value='SBY-BT'>SBY-BT</option>";
           if ($result['rute'] == "SBY-SDR") echo "<option value='SBY-SDR' selected>SBY-SDR</option>";
           else echo "<option value='SBY-SDR'>SBY-SDR</option>";
           if ($result['rute'] == "SBY-JND") echo "<option value='SBY-JND' selected>SBY-JND</option>";
           else echo "<option value='SBY-JND'>SBY-JND</option>";
           ?>
            </select>
            </div>
        </div>

        <div class="form-group"><label class="col-sm-2 control-label">Jam Jemput</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" data-mask="99:99" placeholder="hh:ss" name="jamjemput" id="jamjemput" value="<?php echo $result['jam_jemput']; ?>">
            <input type="hidden" class="form-control" name="id_travel" value="<?php echo $result['id_travel']; ?>">
            </div>
        </div> 

        <div class="form-group" id="data_1">
        <!-- <label class="col-sm-2 control-label">Tanggal Jemput</label> -->
            <div class="col-sm-10">
                <input type="hidden" class="form-control" name="tggljemput" data-mask="99/99/9999" placeholder="mm/dd/YYYY" value="<?php echo $result['tanggal_jemput']; ?>">
            </div>
        </div>

        <div class="form-group"><label class="col-sm-2 control-label">Nama Penumpang</label>
            <div class="col-sm-10"><input type="text" class="form-control" name="namapenumpang" value="<?php echo $result['nama']; ?>"></div>
        </div>

        <div class="form-group"><label class="col-sm-2 control-label">No Hp</label>
            <div class="col-sm-10"><input type="text" class="form-control" data-mask="999-999-999-999" placeholder="" name="nohp" value="<?php echo $result['hp']; ?>"> </div>
        </div>

        <div class="form-group"><label class="col-sm-2 control-label">Alamat Jemput</label>
            <div class="col-sm-10"><textarea class="form-control" name="alamatjemput"><?php echo $result['alamat_jemput']; ?></textarea></div>
        </div>

        <div class="form-group"><label class="col-sm-2 control-label">Alamat Antar</label>
            <div class="col-sm-10"><textarea class="form-control" name="ket_antar"><?php echo $result['ket_antar']; ?></textarea ></div>
        </div>

        <div class="form-group"><label class="col-sm-2 control-label">Seat</label>
            <div class="col-sm-10"><input type="text" class="form-control" name="seat" value="<?php echo $result['seat']; ?>"><input type="hidden" class="form-control" name="status" value="1"></div>
        </div>

        <div class="form-group"><label class="col-sm-2 control-label">Jumlah Seat</label>
            <div class="col-sm-10"><input type="text" class="form-control" name="jumseat" value="<?php echo $result['jum_seat']; ?>"></div>
        </div>

        <div class="form-group"><label class="col-sm-2 control-label">Harga</label>
            <div class="col-sm-10"><input type="text" class="form-control" data-mask="999999" placeholder="" name="harga" value="<?php echo $result['harga']; ?>"></div>
        </div>

        <div class="form-group"><label class="col-sm-2 control-label">Jenis Bayar</label>
            <div class="col-sm-10">
                <select class="form-control" name="jenis" id="jenis">
                <?php
                if ($result['jenis'] == "BA") echo "<option value='BA' selected>BA</option>";
                else echo "<option value='BA'>BA</option>";
                if ($result['jenis'] == "LA") echo "<option value='LA' selected>LA</option>";
                else echo "<option value='LA'>LA</option>";
                ?>
                </select>
            </div>
        </div>

        <input type="hidden" class="form-control" name="tgglbook" value="<?php date_default_timezone_set('Asia/Jakarta'); echo $result['jadwal_booking']=date('d/m/Y'); ?>">
        <input type="hidden" class="form-control" name="jambook" value="<?php date_default_timezone_set('Asia/Jakarta'); echo $result['waktu_booking']=date('H:i:s'); ?>"> 

        <div class="form-group"><label class="col-sm-2 control-label">Keterangan</label>
            <div class="col-sm-10">
                <select class="form-control" name="paket"  id="paket">
                <?php
                if ($keterangan == "Penumpang") echo "<option value='Penumpang' selected>Penumpang</option>";
                else echo "<option value='Penumpang'>Penumpang</option>";
                if ($keterangan == "Paket") echo "<option value='Paket' selected>Paket</option>";
                else echo "<option value='Paket'>Paket</option>";
                ?>
                </select>
            </div>
        </div>

        <div class="form-group"><label class="col-sm-2 control-label">Dari</label>
            <div class="col-sm-10">
            <select class="form-control" name="rekanan">
                <?php 
                $aa=$result['id_rekan'];
                $rekan = mysqli_query($koneksi, "SELECT * from dt_rekanan where id_rekan = '$aa'"); 
                $rekans=mysqli_fetch_array($rekan);
                $nama_rekan=$rekans['nm_rekan'];
                ?>
                <option value="<?php echo $aa; ?>"><?php echo $nama_rekan; ?></option> 
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

        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <!-- <button class="btn btn-white" type="reset">Cancel</button> -->
                <button class="ladda-button btn btn-primary" data-style="expand-left" type="submit" name="btnsave">Update</button>
            </div>
        </div>
    </form>


</div>
<?php
include "conn.php";
$id=$_POST['id'];
$nomor=$_POST['nomor'];
echo $id;
echo $nomor;
$query = mysqli_query($koneksi, "SELECT * FROM sewa WHERE id_sewa='$id'");
$result = mysqli_fetch_array($query);
?>

<div class="ibox-content">
    <form action="upsewa1.php" method="post" class="form-horizontal">
        <div class="form-group"><label class="col-sm-2 control-label">Jam Jemput</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" data-mask="99:99" placeholder="hh:ss" name="jamjemput" id="jamjemput" value="<?php echo $result['jam_jemput']; ?>">
                <input type="hidden" name="id_sewa" value="<?php echo $result['id_sewa']; ?>">
            </div>
        </div>

        <div class="form-group" id="data_1">
            <!-- <label class="col-sm-2 control-label">Tanggal Jemput</label> -->
            <div class="col-sm-10">
                <input type="hidden" class="form-control" name="tggljemput" data-mask="99/99/9999" placeholder="mm/dd/YYYY" value="<?php echo $result['tanggal_jemput']; ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Nama Penumpang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="namapenumpang" required="true" value="<?php echo $result['nama_sewa']; ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">No Hp</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nohp" required="true" data-mask="999-999-999-999" placeholder="" value="<?php echo $result['no_hp']; ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Alamat Jemput</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="alamatjemput"><?php echo $result['alamat_jemput']; ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Alamat Antar</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="alamatantar"><?php echo $result['alamat_antar']; ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Paket</label>
            <div class="col-sm-10">
                <select class="form-control" name="paket">
                <?php
                    if ($result['paket'] == "FD") echo "<option value='FD' selected>FD</option>";
                    else echo "<option value='FD'>FD</option>";
                    if ($result['paket'] == "12 Jam") echo "<option value='12 Jam' selected>12 Jam</option>";
                    else echo "<option value='12 Jam'>12 Jam</option>";
                    if ($result['paket'] == "Bromo") echo "<option value='Bromo' selected>Bromo</option>";
                    else echo "<option value='Bromo'>Bromo</option>";
                    if ($$result['paket'] == "Drop") echo "<option value='Drop' selected>Drop</option>";
                    else echo "<option value='Drop'>Drop</option>";
                    if ($$result['paket'] == "Paket Wisata") echo "<option value='Paket Wisata' selected>Paket Wisata</option>";
                    else echo "<option value='Paket Wisata'>Paket Wisata</option>";
                ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Harga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="harga" required="true" data-mask="999.999" placeholder="" value="<?php echo $result['harga_sewa']; ?>">
            </div>
        </div>

        <div class="form-group" id="data_1">
            <!-- <label class="col-sm-2 control-label">Tanggal Booking</label> -->
            <div class="col-sm-10">
                <input type="hidden" class="form-control" name="tgglbook" data-mask="99/99/9999" placeholder="mm/dd/YYYY" value="<?php echo $result['tanggal_booking']; ?>">
            </div>
        </div>
        
        <div class="form-group">
            <!-- <label class="col-sm-2 control-label">Jam Booking</label> -->
            <div class="col-sm-10">
                <input type="hidden" class="form-control" name="jambook" required="true" data-mask="99:99" placeholder="hh:ss" value="<?php echo $result['jam_booking']; ?>">
                <input type="hidden" class="form-control" name="status" value="1">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Dari</label>
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
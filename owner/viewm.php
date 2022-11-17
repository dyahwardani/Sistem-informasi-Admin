<?php
    $quer = mysqli_query($koneksi, "SELECT * FROM keuangan WHERE tanggal_keuangan=DATE(NOW())");
    $quer2 = mysqli_query($koneksi, "SELECT sum(tagihan) + sum(uang_saku) as debet FROM keuangan WHERE tanggal_keuangan=DATE(NOW())");
    $col2 = mysqli_fetch_array($quer2);
    $pemasukan = $col2['debet'];
    $quer3 = mysqli_query($koneksi, "SELECT sum(bbm) + sum(tol) + sum(parkir) + sum(fee_driver) as kredit FROM keuangan WHERE tanggal_keuangan=DATE(NOW())");
    $col3 = mysqli_fetch_array($quer3);
    $pengeluaran = $col3['kredit'];

    // var_dump($col2);
    $omset = $pemasukan - $pengeluaran;

    $jumlah_desimal ="0";
    $pemisah_desimal =",";
    $pemisah_ribuan =".";

    $total_pemasukan="Rp ".number_format($pemasukan, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."-";
    $total_pengeluaran="Rp ".number_format($pengeluaran, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."-";
    $total_omset="Rp ".number_format($omset, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."-";
?>
<div class="container">
    <div class="row">
<div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data keuangan</h5>
                        
                    </div>
                    <div class="ibox-content">
                    <form method="post" action="?page=filter">
                    <div class="col-md-3">

            <div class="form-group" id="data_1"><div class="col-sm-10">
            <div class="input-group date">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date" />
            </div>
            </div></div>
          
            <div class="form-group" id="data_1"><div class="col-sm-10">
            <div class="input-group date">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" />
            </div>
            </div></div>
            </div>
            <div class="col-md-5">
                <button type="submit" class="btn btn-info">Filter</button>
            </div>
            <div style="clear:both"></div>          
            <br />

                        
                    </form>
<p>Omset Hari ini</p>
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" id="keuangan">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Nama Driver</th>
                        <th>Order</th>
                        <th>Tagihan</th>
                        <th>Uang saku</th>
                        <th>bbm</th>
                        <th>Tol</th>
                        <th>Parkir</th>
                        <th>Fee Driver</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($col1 = mysqli_fetch_array($quer)) {
                            
                        ?>
                    <tr class="gradeX">
                        <td><?php echo $col1['id_keuangan']; ?></td>
                        <td><?php echo $col1['tanggal_keuangan']; ?></td>
                        <td><?php echo $col1['nama_driver']; ?></td>
                        <td><?php echo $col1['c_order']; ?></td>
                        <td><?php echo $col1['tagihan'] ;?></td>
                        <td><?php echo $col1['uang_saku']; ?></td>
                        <td><?php echo $col1['bbm']; ?></td>
                        <td><?php echo $col1['tol']; ?></td>
                        <td><?php echo $col1['parkir']; ?></td>
                        <td><?php echo $col1['fee_driver']; ?></td>
                    </tr>
                    <?php
                    }  
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Pemasukan :</th>
                        <th><?php echo $total_pemasukan ?></th>
                        <th>Pengeluaran : </th>
                        <th><?php echo $total_pengeluaran ?></th>
                        <th>Omset : </th>
                        <th><?php echo $total_omset?></th>
                        
                    </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
           </div>
           </div>
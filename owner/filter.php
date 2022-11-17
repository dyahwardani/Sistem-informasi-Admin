<?php
    
    $frommdate = $_POST['from_date'];
    $todate    = $_POST['to_date'];
    $quer = mysqli_query($koneksi, "SELECT * FROM keuangan WHERE tanggal_keuangan BETWEEN '".$frommdate."' AND '".$todate."' ");
    $quer2 = mysqli_query($koneksi, "SELECT sum(tagihan) + sum(uang_saku) as debet FROM keuangan WHERE tanggal_keuangan BETWEEN '".$frommdate."' AND '".$todate."' ");
    $col2 = mysqli_fetch_array($quer2);
    $pemasukan = $col2['debet'];
    $quer3 = mysqli_query($koneksi, "SELECT sum(bbm) + sum(tol) + sum(parkir) + sum(fee_driver) as kredit FROM keuangan WHERE tanggal_keuangan BETWEEN '".$frommdate."' AND '".$todate."' ");
    $col3 = mysqli_fetch_array($quer3);
    $pengeluaran = $col3['kredit'];

    $omset = $pemasukan - $pengeluaran;

    $jumlah_desimal ="0";
    $pemisah_desimal =",";
    $pemisah_ribuan =".";

    $total_pemasukan="Rp ".number_format($pemasukan, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."-";
    $total_pengeluaran="Rp ".number_format($pengeluaran, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."-";
    $total_omset="Rp ".number_format($omset, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan)."-";
    $no=1;
?>
<div class="container">
    <div class="row">
<div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data keuangan dari tanggal : <?php echo $frommdate; ?> Sampai Tanggal : <?php echo $todate; ?></h5>
                        
                    </div>
                    <div class="ibox-content" id="dataTables-example">

                        <div class="table-responsive">
                    <table id="keuangan" class="table table-striped table-bordered table-hover dataTables-example" >
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
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($col1 = mysqli_fetch_array($quer)) {
                         $id=$col1['id_keuangan'];
                        ?>
                    <tr class="gradeX">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $col1['tanggal_keuangan']; ?></td>
                        <td><?php echo $col1['nama_driver']; ?></td>
                        <td><?php echo $col1['c_order']; ?></td>
                        <td><?php echo $col1['tagihan'] ;?></td>
                        <td><?php echo $col1['uang_saku']; ?></td>
                        <td><?php echo $col1['bbm']; ?></td>
                        <td><?php echo $col1['tol']; ?></td>
                        <td><?php echo $col1['parkir']; ?></td>
                        <td><?php echo $col1['fee_driver']; ?></td>
                        <td><a href='hapus_data.php?id=<?php echo $id;?>'><i class="fa fa-times-circle" title="Hapus"></i></a></td>
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
           <!-- <div class="text-center">
                <button class="btn btn-primary" onclick="printContent('div1')"><i class="fa fa-print"></i> Cetak</button>
                
            </div> -->
           </div>

           <script>
    function printContent(el){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }

    $(document).ready(function(){
           

        });
    </script>

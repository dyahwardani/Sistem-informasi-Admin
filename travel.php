
<?php
/*
$nama = strip_tags($_GET['nama']);
if($nama=="")
echo "Masukkan nama penumpang";
else{
$query =  "SELECT * FROM travel where hp like '%$nama%' order by tanggal_jemput asc"; 
$result = $koneksi->query($query) or die($koneksi->error.__LINE__);
$no=1;
if($result->num_rows > 0){
echo '<h4 class="media-heading"> Sudah pernah pesan sebanyak ';
echo $result->num_rows.' kali </h4>';
$rows= $result->fetch_assoc();
extract($rows);*/
    
    error_reporting( ~E_NOTICE ); // avoid notice
    //require_once 'conn.php';
    $mysqli = new mysqli('localhost', 'root', '', 'nayfa_travel');
    $sql = 'SELECT distinct(hp) as hp,nama,count(hp),id_travel as jumlah FROM travel WHERE hp LIKE ? group by hp';
    $stmt = $mysqli->prepare($sql);
    $variabel=trim($_GET['q']);//khusus untuk data not found
    $stmt->bind_param('s', $val);
    $val = '%' .trim($_GET['q']). '%';
    
    $res = $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($d,$e,$f,$g);
    $no=1;
    if($res) {
        if($stmt->num_rows) { ?>
            <div class="table-responsive">
                 <table class="table table-striped">
                <thead>
                <tr>
                    <th>No.</th>                              
                    <th>No. HP</th>
                    <th>Nama Customer</th>
                    <th>Count</th>
                    <!-- <th>ID</th>   -->
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
                <?php while($stmt->fetch()) { 
                
                ?>
                    <tr>
                        <td><?php echo $no++; ?>. </td>
                        <td><?php echo $d; ?></td>
                        <td><?php echo $e; ?></td>
                        <td><?php echo $f; ?> x</td>
                        <!-- <td><?php echo $g; ?> </td> -->
                        <td><a href="?page=update_travel&&id=<?php echo $g; ?>&&nomor=<?php echo $d; ?>"><i class="fa fa-pencil-square" aria-hidden="true" title="Form Order Travel"></i></a></td> 
                        <td><a href="?page=delete_cus&&nomor=<?php echo $d;?>"><i class="fa fa-times" aria-hidden="true" title="Delete"></i></a></td>  
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php
        $stmt->free_result();
        } else {
            echo "Nomor HP ".$variabel." Belum Terdaftar ";
            echo "<h2><a href='?page=form_travel&&nomor=".$variabel."'><i class='fa fa-pencil-square-o' aria-hidden='true' title='Form Order Customer Travel Baru'></i></a></h2>";
        }
    }
    
    $stmt->close;

?>


 

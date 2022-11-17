<?php

error_reporting(0);

include_once 'dbcon.php';

$idtra = $_POST['id_travel'];
$idber = $_POST['id_berangkat'];
$stts = $_POST['status'];

$idtracount = count($idtra);

// $chk = $_POST['chk'];
// $chkcount = count($chk);

if(!isset($idtra))
{
    ?>
    <script>
        alert('At least one checkbox Must be Selected !!!');
        window.location.href = 'index.php';
    </script>
    <?php
}
else
{
    for($i=0; $i<$chkcount; $i++)
    {
        $del = $chk[$i];
        $idbera = $idber[$i];
        $statue = $stts[$i];
        $sql=$SQLConn->query("UPDATE travel SET id_berangkat='$berangkat' WHERE id_travel=".$del);
    }

    if($sql)
    {
        ?>
        <script>
            alert('<?php echo $chkcount; ?> Records Was Update!!!');
            window.location.href='index.php?page=detail&id=<?php echo $berangkat?>';
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert('Error while Deleting , TRY AGAIN');
            window.location.href='index.php';
        </script>
        <?php
    }

}
?>

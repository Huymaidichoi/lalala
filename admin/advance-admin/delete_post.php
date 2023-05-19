<?php
    include('control.php');
    $getdata = new data();
    $deldata = $getdata->delete_post($_GET['idPost']);
    if ($_GET['idPost']) {
        echo "<script> alert('xoa thanh cong'); window.location='index.php'</script>";
    } else {
        echo "<script> alert('xoa khong thanh cong'); window.location='index.php' </script>";
    }
    ?>     

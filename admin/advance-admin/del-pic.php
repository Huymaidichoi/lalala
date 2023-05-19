<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include('control.php');
    $getdata = new data();
    $getimg = $getdata->get_img($_GET['idIMG']);
    foreach ($getimg as $img)
        $idChapter = $img['id_chap'];
    $deldata = $getdata->delete_image($_GET['idIMG']);
    
    if ($deldata) {
        // echo "Success";
        echo "<script>alert('Xóa thành công')</script>";
        echo "<script>window.location='detail.php?idChapter=".$idChapter."'</script>";
    } else {
        echo "xoa khong thanh cong";
    }
    ?>
</body>

</html>
<?php
include('control.php');
$getdata = new data();
$idPost = $_GET['idPost'];
$idChapter = $_GET['idChapter'];
$deldata = $getdata->delete($idChapter);
if ($idChapter) {
    echo "xoa thanh cong";
    header("Location:list_chapter.php?idPost=$idPost");
} else {
    echo "xoa khong thanh cong";
    header("Location:list_chapter.php?idPost=$idPost");
}
?>
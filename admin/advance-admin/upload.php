<?php 
include ('control.php');
    if(isset($_POST['submit']) && 
       isset($_POST['txtname']) && 
       isset($_POST['txtauthor']) && 
       isset($_POST['txtcontent']) && 
       isset($_POST['txtavatar'])  && 
       isset($_POST['txttag']) &&
       isset($_POST['txtchap']) &&
       isset($_POST['txt_pic_chap']))
    {
        $getdata= new data();
        $_inproduct=$gatdata->upload_info_post($_POST['txtname'],$_POST['txtauthor'],$_POST['txtcontent'],$_POST['txttag']);
        if($_inproduct)
        {
            echo "thanh cong";
        }else
        {
            echo "that bai";
        }
    }
?>
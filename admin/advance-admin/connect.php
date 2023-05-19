<?php
    $SERVER='localhost';
    $username='root';
    $password='';
    $database='hyper';
    $conn=mysqli_connect($SERVER , $username , $password , $database);
    mysqli_query($conn, 'set names "utf8"');
?>
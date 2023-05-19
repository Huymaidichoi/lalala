<?php 
include('connect.php');
global $conn;
$id_post = $_POST['id_post'];

foreach($_FILES['image']['tmp_name'] as $key => $tmp_name) {
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name'][$key]));

    $sql = "INSERT INTO picture_chapter (id_post, image) VALUES ('$id_post', '$image')";
}

echo "Images uploaded successfully";
?>
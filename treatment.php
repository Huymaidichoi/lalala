<?php
include('control.php');
session_start();
$getdata = new data;
$getPost = $getdata->se_post_id($_SESSION['idPost']);
foreach ($getPost as $post)
    if (isset($_POST['favorite'])) {
        $inFavorite = $getdata->in_favorite($_SESSION['id'], $_SESSION['idPost']);
        $inlike = $getdata->up_like($post['like_post'] + 1, $_SESSION['idPost']);
        echo "<script>alert('Đã thích')</script>";
        echo '<script>window.location="post.php?id=' . $_SESSION['idPost'] . '"</script>';
    }
if (isset($_POST['unfavorite'])) {
    $unFavorite = $getdata->del_favorite($_SESSION['id'], $_SESSION['idPost']);
    $inlike = $getdata->up_like($post['like_post'] - 1, $_SESSION['idPost']);
    echo "<script>alert('Bỏ thích')</script>";
    echo "<script>window.location='post.php?id=" . $_SESSION['idPost'] . "'</script>";
}
if (isset($_POST['follow'])) {
    $inFollow = $getdata->inFollow($_SESSION['id'], $_SESSION['idPost']);
    echo "<script>alert('Đã theo dõi')</script>";
    echo "<script>window.location='post.php?id=" . $_SESSION['idPost'] . "'</script>";
}
if (isset($_POST['unfollow'])) {
    $unFollow = $getdata->del_follow($_SESSION['id'], $_SESSION['idPost']);
    echo "<script>alert('Bỏ theo dõi')</script>";
    echo "<script>window.location='post.php?id=" . $_SESSION['idPost'] . "'</script>";
}
?>
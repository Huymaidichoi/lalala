<?php
include('connect.php');
class data
{
    //INSERT
    function upload_info_post($name, $author, $content, $avatar, $tag)
    {
        global $conn;
        $sql = "INSERT into post(name_post, author_post, content_post,avatar_post, name_tag) values ('$name','$author','$content','$avatar','$tag')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function addchap($id_post, $chapter)
    {
        global $conn;
        $sql = "INSERT into chapter (id_post, name) values ('$id_post','$chapter')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function in_image($idChapter, $image)
    {
        global $conn;
        $sql = "INSERT into picture_chapter(id_chap, image) values ('$idChapter','$image')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function in_user($name, $avatar, $email, $password, $permission)
    {
        global $conn;
        $sql = "INSERT into user(name_user, avatar, email, password, permission) values ('$name','$avatar','$email','$password','$permission')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //SELECT
    function se_user()
    {
        global $conn;
        $sql = "SELECT * FROM user"; //Lấy dữ liệu trong database ra
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_post()
    {
        global $conn;
        $sql = "SELECT * FROM post"; //Lấy dữ liệu trong database ra
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_chap($id_post)
    {
        global $conn;
        $sql = "SELECT * from chapter where id_post='$id_post'"; //Lấy dữ liệu trong database ra
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_image($idchapter)
    {
        global $conn;
        $sql = "SELECT * FROM picture_chapter WHERE id_chap='$idchapter'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //GET
    function get_user($idUser){
        global $conn;
        $sql = "SELECT * FROM user WHERE id_user = '$idUser'"; //Lấy dữ liệu trong database ra
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function getPost($idPost)
    {
        global $conn;
        $sql = "SELECT * from post where id_post='$idPost'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function getChapter($idChapter)
    {
        global $conn;
        $sql = "SELECT * from chapter where id='$idChapter'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function get_img($idimg){
        global $conn;
        $sql = "SELECT * from picture_chapter where id='$idimg'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function checkNamechapter($idPost, $nameChapter)
    {
        global $conn;
        $sql = "SELECT * FROM chapter WHERE id_post = '$idPost' AND name = '$nameChapter'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //UPDATE
    function up_user($id, $name, $avatar, $email, $password, $permission){
        global $conn;
        $sql = "UPDATE user SET name_user='$name', avatar='$avatar', email='$email', password='$password' , permission='$permission' WHERE id_user='$id'";echo $sql;
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function up_post($id, $name, $cover, $author, $content, $type){
        global $conn;
        $sql = "UPDATE post SET name_post='$name', avatar_post='$cover', author_post='$author', content_post='$content' , name_tag='$type' WHERE id_post='$id'";echo $sql;
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function up_chap($id, $name){
        global $conn;
        $sql = "UPDATE chapter SET name = '$name' WHERE id = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function up_img($image, $id){
        global $conn;
        $sql = "UPDATE picture_chapter SET image = '$image' WHERE id = '$id'"; echo $sql;
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function up_time($idPost, $time){
        global $conn;
        $sql = "UPDATE post SET time_update = '$time' WHERE id_post = '$idPost'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    //DELETE
    function delete($id)
    {
        global $conn;
        $sql = "DELETE from chapter where id='$id'"; //Lấy dữ liệu trong database ra
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function delete_post($id)
    {
        global $conn;
        $sql = "DELETE from post where id_post='$id'"; //Lấy dữ liệu trong database ra
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function delete_image($id)
    {
        global $conn;
        $sql = "DELETE from picture_chapter where id='$id'"; //Lấy dữ liệu trong database ra
        $run = mysqli_query($conn, $sql);
        return $run;
    }
}
?>
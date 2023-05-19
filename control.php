<?php   
    include ('connect.php');
    class data
    {
        //INSERT
        function up_user($name, $email, $password, $permission){
            global $conn;
            $sql="INSERT into user (name_user, email, password, permission) values ('$name','$email','$password','$permission')";
            $run=mysqli_query($conn, $sql);
            return $run;
        }
        function inFollow ($idUser,$idPost){
            global $conn;
            $sql = "INSERT into follow (id_user, id_post) values ('$idUser', '$idPost')";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function in_comment($idPost, $idUser, $comment, $time){
            global $conn;
            $sql = "INSERT INTO comment (id_post, id_user, comment, time) values ('$idPost', '$idUser', '$comment', '$time')";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function in_favorite($idUser, $idPost){
            global $conn;
            $sql = "INSERT INTO favorite (id_post, id_user) values ('$idPost', '$idUser')";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        //SELLECT
        function se_post()
        {
            global $conn;
            $sql="SELECT * FROM post ORDER BY time_update DESC" ; //Lấy dữ liệu trong database ra
            $run=mysqli_query($conn, $sql);
            return $run;
        }
        function setoppost()
        {
            global $conn;
            $sql="SELECT * from post ORDER BY view DESC LIMIT 4"; //Lấy dữ liệu trong database ra
            $run=mysqli_query($conn, $sql);
            return $run;
        }
        function sepost_inpage($postStart, $limit){
            global $conn;
            $sql="SELECT * from post ORDER BY view DESC LIMIT $postStart, $limit";
            $run=mysqli_query($conn, $sql);
            return $run;
        }
        function se_chuong($id){
            global $conn;
            $sql="SELECT * from chapter where id_post='$id'";
            $run=mysqli_query($conn, $sql);
            return $run;
        }
        function tranh ($id_chap){
            global $conn;
            $sql = "SELECT * from picture_chapter where id_chap = '$id_chap'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function se_comment($idPost){
            global $conn;
            $sql = "SELECT * FROM comment where id_post = '$idPost' ORDER BY time DESC";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function secmt_inpage($cmtStart, $cmtLimit, $idPost){
            global $conn;
            $sql = "SELECT * FROM comment where id_post = '$idPost' ORDER BY time DESC LIMIT $cmtStart, $cmtLimit";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function testChapter($chapterName, $idPost){
            global $conn;
            $sql = "SELECT * from chapter where name = '$chapterName' and id_post='$idPost'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function checkPost($postName){
            global $conn;
            $sql = "SELECT * from post where name_post='$postName'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function checkCategory ($postCategory) {
            global $conn;
            $sql = "SELECT * from post where name_tag = '$postCategory'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        //GET
        function se_user($email, $password){
            global $conn;
            $sql="SELECT * FROM user where email='$email' and password='$password'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        function se_user_info($id){
            global $conn;
            $sql="SELECT * FROM user where id_user='$id'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        
        function se_email($email){
            global $conn;
            $sql="SELECT * from user where email='$email'";
            $run=mysqli_query($conn, $sql);
            return $run;
        }
        function se_post_id($idPost){
            global $conn;
            $sql="SELECT * from post where id_post='$idPost'";
            $run=mysqli_query($conn, $sql);
            return $run;
        }
        
        function getChapter($idChapter){
            global $conn;
            $sql="SELECT * from chapter where id='$idChapter'";
            $run=mysqli_query($conn, $sql);
            return $run;
        }
        function getFollow ($idPost, $idUser) {
            global $conn;
            $sql = "SELECT * from follow where id_post='$idPost' AND id_user = '$idUser'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function get_favorite($idPost, $idUser){
            global $conn;
            $sql = "SELECT * FROM favorite WHERE id_post='$idPost' AND id_user = '$idUser'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function seFollow ($idUser) {
            global $conn;
            $sql = "SELECT * from follow f JOIN post p ON f.id_post = p.id_post where f.id_user = '$idUser'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        //UPDATE
        function update_user($name, $avatar, $email, $password, $id){
            global $conn;
            $sql="UPDATE user SET name_user='$name', avatar='$avatar', email='$email', password='$password' WHERE id_user='$id'";
            $run=mysqli_query($conn, $sql);
            return $run;
        }
        function upview($view, $idPost){
            global $conn;
            $sql = "UPDATE post SET view = '$view' WHERE id_post = '$idPost'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function up_like($like, $idPost){
            global $conn;
            $sql = "UPDATE post SET like_post = '$like' WHERE id_post = '$idPost'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        //DELETE
        function del_favorite ($idUser, $idPost){
            global $conn;
            $sql = "DELETE FROM favorite WHERE id_user = '$idUser' AND id_post = '$idPost'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        function del_follow ($idUser, $idPost){
            global $conn;
            $sql = "DELETE FROM follow WHERE id_user = '$idUser' AND id_post = '$idPost'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
    }
?>
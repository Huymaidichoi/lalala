<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">COMPANY NAME</a>
            </div>

            <div class="header-right">

                <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i
                        class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i
                        class="fa fa-bars fa-2x"></i></a>
                <a href="login.html" class="btn btn-danger" title="Logout"><i
                        class="fa fa-exclamation-circle fa-2x"></i></a>


            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <?php
        include('control.php');
        session_start();
        $getdata = new data();
        $getuser = $getdata->get_user($_SESSION['id']);
        foreach ($getuser as $user)
        ?>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="IMG/avatar/<?php echo $user['avatar'] ?>" class="img-thumbnail" />
                            <div class="inner-text">
                                <?php echo $user['name_user'] ?>
                            </div>
                        </div>
                    </li>


                    <li>
                        <a class="active-menu" href="index.php">Danh sách truyện</a>
                    </li>

                    <li>
                        <a href="list-user.php">Quản lí người dùng</a>
                    </li>

                    <li>
                        <a href="addproduct.php">Đăng truyện</a>
                    </li>

                    <li>
                        <a href="login.html"></i>Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- /. NAV SIDE  -->
        <?php
        $idChapter = $_GET['idChapter'];
        $selectIMG = $getdata->se_image($idChapter);
        $selectChapter = $getdata->getChapter($idChapter);
        foreach ($selectChapter as $chapter)
            $idPost = $chapter['id_post'];
        $getPost = $getdata->getPost($idPost); foreach ($getPost as $post)
        ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <a href="list_chapter.php?idPost=<?php echo $idPost ?>" class="page-head-line"
                            style="font-size: unset; border-bottom: unset; ">
                            <?php echo $post['name_post'] ?>
                        </a> /
                        <a href="detail.php?idChapter=<?php echo $idChapter?>" class="page-head-line" style="font-size: unset; border-bottom: unset;">
                            Chapter
                            <?php echo $chapter['name'] ?>
                        </a>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <a href="list_chapter.php?idChapter=<?php echo $idChapter ?>">HUY</a>
                            </div>
                            <div class="panel-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div style="min-width:210px; min-height:250px;">
                                        <img id="preview" class="form-control"
                                            style="max-width:200px; min-height: 200px; " alt="Preview Image">
                                        <input type="file" name="image" onchange="previewImage(event)">
                                    </div>
                                    <input type="submit" name="submit" value="Upload">
                                </form>
                                <script>
                                    function previewImage(event) {
                                        var reader = new FileReader();
                                        reader.onload = function () {
                                            var preview = document.getElementById('preview');
                                            preview.src = reader.result;
                                            preview.style.display = "block";
                                        };
                                        reader.readAsDataURL(event.target.files[0]);
                                    }
                                </script>
                                <?php
                                if (isset($_POST['submit'])) {
                                    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                                        $file_size = $_FILES['image']['size'];
                                        $file_tmp = $_FILES['image']['tmp_name'];
                                        $file_type = $_FILES['image']['type'];
                                        $file_content = file_get_contents($file_tmp);

                                        $namePost = $getdata->getPost($idPost);
                                        $nameChapter = $getdata->getChapter($idChapter);
                                        foreach ($namePost as $post) foreach ($nameChapter as $chapter)
                                                $post_name = $post['name_post'];
                                        $chapter_name = $chapter['name'];

                                        $file_name = $post_name . '-' . $chapter_name . '-' . $_FILES['image']['name'];

                                        $time = isset($_POST["time"]) ? $_POST["time"] : date("Y-m-d");

                                        $file_name_parts = explode('.', $_FILES['image']['name']);
                                        $file_ext = strtolower(end($file_name_parts));
                                        $extensions = array("jpeg", "jpg", "png");

                                        if (in_array($file_ext, $extensions) === false) {
                                            echo "Chỉ được upload file có định dạng JPEG, JPG hoặc PNG.";
                                        }
                                        if ($file_size > 2097152) {
                                            echo 'Kích thước file phải nhỏ hơn 2MB';
                                        }

                                        $_inIMG = $getdata->in_image($idChapter, $file_name);
                                        $_uploadIMG = move_uploaded_file($file_tmp, "IMG/images/" . $file_name);
                                        $update = $getdata->up_time($idPost, $time);
                                        if ($_inIMG && $_uploadIMG) {
                                            echo "<script>alert('Đăng tải thành công');</script>";
                                            echo "<script> window.location='detail.php?idChapter=".$idChapter."'</script>";
                                        } else {
                                            echo "Đăng tải thất bại";
                                        }
                                    } else {
                                        echo "File trống";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>

</html>
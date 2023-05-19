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
                        <a href="index.php">Danh sách truyện</a>
                    </li>

                    <li>
                        <a href="list-user.php">Quản lí người dùng</a>
                    </li>

                    <li>
                        <a class="active-menu" href="#">Đăng truyện</a>
                    </li>

                    <li>
                        <a href="../../logout.php"></i>Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- /. NAV SIDE  -->
        
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Basic Forms</h1>
                        <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text.
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                BASIC FORM
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Tên truyện</label>
                                        <input class="form-control" type="text" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Tác giả</label>
                                        <input class="form-control" type="text" name="author">
                                    </div>
                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea class="form-control" rows="3" name="content"></textarea>
                                    </div>
                                    <div style="min-width:210px; min-height:250px;">
                                        <img id="preview" class="form-control"
                                            src="IMG/cover-art/<?php echo $post['avatar_post'] ?>"
                                            style="width: unset; height: unset; max-width: 215px; max-height: 260px; "
                                            alt="Preview Image">
                                        <input type="file" name="cover" onchange="previewImage(event)">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Thể loại</label><br>
                                        <select name="theloai">
                                            <option value="Manga">Manga</option>
                                            <option value="Manhua">Manhua</option>
                                            <option value="Manhwa">Manhwa</option>
                                            <option value="Comic">Comic</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-info" name="submit">Đăng</button>
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
                                    if (!empty($_POST['name']) && !empty($_POST['theloai'])) {
                                        if (isset($_FILES['cover']) && $_FILES['cover']['error'] === UPLOAD_ERR_OK) {

                                            $file_name = $_FILES['cover']['name'];
                                            $file_size = $_FILES['cover']['size'];
                                            $file_tmp = $_FILES['cover']['tmp_name'];
                                            $file_type = $_FILES['cover']['type'];

                                            $_inproduct = $getdata->upload_info_post($_POST['name'], $_POST['author'], $_POST['content'], $file_name, $_POST['theloai']);

                                            move_uploaded_file($file_tmp, "IMG/cover-art/" . $file_name);
                                            if ($_inproduct) {
                                                echo "<script> alert('Them thanh cong'); window.location='index.php' </script>";
                                            } else {
                                                echo "<script> alert('Them that bai') </script>";
                                            }
                                        }else {
                                            echo "Ảnh bìa không hợp lệ";
                                        }
                                    } else {
                                        echo "Chưa nhập đầy đủ thông tin";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. WRAPPER  -->
            <div id="footer-sec">
                &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/"
                    target="_blank">BinaryTheme.com</a>
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
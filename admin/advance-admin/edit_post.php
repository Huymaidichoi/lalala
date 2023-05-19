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
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="assets/img/user.png" class="img-thumbnail" />
                            <div class="inner-text">
                                Admin
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
                        <a href="addpost.php">Đăng truyện</a>
                    </li>

                    <li>
                        <a href="logout.php"></i>Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Chỉnh sửa thông tin thành viên</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <a href="list-user.php">Hủy bỏ</a>
                            </div>
                            <div class="panel-body">
                                <?php
                                include('control.php');
                                $getdata = new data();
                                $getpost = $getdata->getPost($_GET['idPost']);
                                foreach ($getpost as $post)
                                ?>
                                <form role="form" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Tên: <input class="form-control" type="text" name="name"
                                                value="<?php echo $post['name_post'] ?>"></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Cover Art:</label>
                                    </div>
                                    <div style="min-width:210px; min-height:250px;">
                                        <img id="preview" class="form-control"
                                            src="IMG/cover-art/<?php echo $post['avatar_post'] ?>"
                                            style="width: unset; height: unset; max-width: 215px; max-height: 260px "
                                            alt="Preview Image">
                                        <input type="file" name="cover" onchange="previewImage(event)">
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Tác giả:
                                            <input class="form-control" type="text" name="author"
                                                value="<?php echo $post['author_post'] ?>">
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Content:
                                            <input class="form-control" type="text" name="content"
                                                value="<?php echo $post['content_post'] ?>">
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Thể loại:
                                            <select class="form-control" name="type">
                                                <option value="<?php echo $post['name_tag'] ?>"><?php echo $post['name_tag'] ?></option>
                                                <option value="Manga">Manga</option>
                                                <option value="Manhua">Manhua</option>
                                                <option value="Manhwa">Manhwa</option>
                                                <option value="Comic">Comic</option>
                                            </select>
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-info" name="submit">Lưu sửa</button>
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
                                    $name = $_POST['name'] ?? '';
                                    $author = $_POST['author'] ?? '';
                                    $content = $_POST['password'] ?? '';
                                    $type = $_POST['type'] ?? '';
                                    if (isset($_FILES['cover']) && $_FILES['cover']['error'] === UPLOAD_ERR_OK) {
                                        $cover = $_FILES['cover']['name'];
                                    } else {
                                        $cover = $post['avatar_post'];
                                    }
                                    if (empty($name)) {
                                        echo "Tên trống";
                                    } else {
                                        $inproduct = $getdata->up_post($_GET['idPost'], $name, $cover, $author, $content, $type);
                                        if (isset($_FILES['cover']) && $_FILES['cover']['error'] === UPLOAD_ERR_OK) {
                                            move_uploaded_file($_FILES['cover']['tmp_name'], "IMG/cover-art/" . $cover);
                                        }
                                        if ($inproduct) {
                                            // echo "Success";
                                            echo "<script>alert('Chỉnh sửa thành công')</script>";
                                            echo "<script>window.location='index.php'</script>";
                                        } else {
                                            echo "<script>alert('Chỉnh sửa thất bại')</script>";
                                        }
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
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
                        <a href="table.html">Quản lí người dùng</a>
                    </li>

                    <li>
                        <a href="#">Đăng truyện</a>
                    </li>

                    <li>
                        <a href="login.html"></i>Đăng xuất</a>
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
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <a href="">Hủy bỏ</a>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Họ và tên: <input class="form-control" type="text" name="name"></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Avatar: <input type="file" name="image" id=""></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email: <input class="form-control" type="email"
                                                name="email"></label><br>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password: <input class="form-control" type="password_get_info"
                                                name="password"></label><br>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Permission:
                                            <select class="form-control" name="permission">
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-info" name="submit">Thêm</button>
                                </form>
                                <?php
                                if (isset($_POST['submit'])) {
                                    if (empty($_POST['name'])) {
                                        echo "Yêu cầu nhập Tên";
                                    } elseif (empty($_POST['email'])) {
                                        echo "Email trống";
                                    } elseif (empty($_POST['password'])) {
                                        echo "Password trống";
                                    } elseif (empty($_POST['permission'])) {
                                        echo "Permission trống";
                                    } else {
                                        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                                            $file_name = $_FILES['image']['name'];
                                            $file_tmp = $_FILES['image']['tmp_name'];
                                            $_uploadIMG = move_uploaded_file($file_tmp, "IMG/avatar/" . $file_name);
                                        } else {
                                            $file_name = '';
                                        }
                                        $_inproduct = $getdata->in_user($_POST['name'], $file_name, $_POST['email'], $_POST['password'], $_POST['permission']);
                                        if ($_inproduct) {
                                            echo "<script> alert('thanh cong') </script>";
                                        } else {
                                            echo "<script> alert('that bai') </script>";
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
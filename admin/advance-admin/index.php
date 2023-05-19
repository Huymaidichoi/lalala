<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>
    <!--STYLES CSS-->
    <link rel="stylesheet" href="assets/css/style.css">
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
                        <a class="active-menu" href="list-product.php">Danh sách truyện</a>
                    </li>
                    <li>
                        <a href="list-user.php">Quản lí người dùng</a>
                    </li>

                    <li>
                        <a href="addproduct.php">Đăng truyện</a>
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
                        <h1 class="page-head-line">Data Table</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div>
                    <div>
                        <!--   Kitchen Sink -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="addproduct.php">Thêm truyện mới</a>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <?php
                                    $select = $getdata->se_post();
                                    ?>
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Ảnh bìa</th>
                                                <th>Tên</th>
                                                <th>Tác giả</th>
                                                <th>Nội dung</th>
                                                <th>Thể loại</th>
                                                <th>Lượt đọc</th>
                                                <th>Yêu thích</th>
                                                <th>Bình luận</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($select as $se_pro) //Duyệt data trả về từ database
                                            {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $se_pro['id_post'] ?>
                                                    </td>
                                                    <td>
                                                        <img style="max-width: 100px;"
                                                            src="IMG/cover-art/<?php echo $se_pro['avatar_post'] ?>" alt="">
                                                    </td>
                                                    <td class="wth-20">
                                                        <?php echo $se_pro['name_post'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $se_pro['author_post'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $se_pro['content_post'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $se_pro['name_tag'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $se_pro['view'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $se_pro['like_post'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $se_pro['comment_post'] ?>
                                                    </td>
                                                    <td><a
                                                            href="edit_post.php?idPost=<?php echo $se_pro['id_post'] ?>">Sửa</a>
                                                    </td>
                                                    <td><a
                                                            href="list_chapter.php?idPost=<?php echo $se_pro['id_post'] ?>">Chương</a>
                                                    </td>
                                                    <td><a
                                                            href="delete_post.php?idPost=<?php echo $se_pro['id_post'] ?>">Xóa</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End  Kitchen Sink -->
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
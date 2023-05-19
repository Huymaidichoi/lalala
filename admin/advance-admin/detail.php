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
                        <a href="table.html">Quản lí người dùng</a>
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
        $getPost = $getdata->getPost($idPost);
        foreach ($getPost as $post)
        ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <a href="list_chapter.php?idPost=<?php echo $idPost ?>" class="page-head-line" style="font-size: unset ">
                            <?php echo $post['name_post'] ?>
                        </a> /  
                        <a href="" class="page-head-line" style="font-size: unset ">
                            Chapter <?php echo $chapter['name'] ?>
                        </a>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-6">
                        <!--   -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="add_image.php?idChapter=<?php echo $idChapter ?>">Thêm ảnh</a>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Images</th>
                                                <th>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($selectIMG as $se) //Duyệt data trả về từ database
                                            {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $se['id'] ?>
                                                    </td>
                                                    <td>
                                                        <img style="width: 100px; "
                                                            src="IMG/images/<?php echo $se['image'] ?>" alt="">
                                                    </td>
                                                    <td>
                                                        <?php echo $se['image'] ?>
                                                    </td>
                                                    <td><a href="edt_img.php?idIMG=<?php echo $se['id'] ?>">update</a>
                                                    </td>
                                                    <td><a
                                                            href="del-pic.php?idIMG=<?php echo $se['id'] ?>">delete</a>
                                                    </td>
                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <!-- End  -->
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
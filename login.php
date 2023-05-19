<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="admin/advance-admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="admin/advance-admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script type="text/javascript">
        function preventback() { window.history.forward() };
        setTimeout("preventback()", 0);
        window.onunload = function () { null; }
    </script>

</head>

<body style="background-color: #f1f5f4;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img style="width: 100px;" src="IMG/logo/logo-1.jpg" />
            </div>
        </div>
        <div class="row ">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel-body">
                    <form role="form" method="POST">
                        <hr />
                        <h5>Nhập thông tin đăng nhập</h5><br />
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                            <input type="text" class="form-control" placeholder="Email" name="Email" />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" placeholder="Mật khẩu" name="Password" />
                        </div>
                        <div>
                            <input type="submit" class="btn btn-primary" name="txtlogin" value="Đăng nhập">
                            <a href="register.php">
                                <button type="button" class="btn btn-primary">Đăng kí</button>
                            </a>
                        </div>
                        <hr />
                        <a href="index.php">Trở về trang chủ</a>
                    </form>
                    <?php
                    include('control.php');
                    $getdata = new data();
                    if (isset($_POST['txtlogin'])) {
                        $email = $_POST['Email'];
                        $password = $_POST['Password'];
                        $result = $getdata->se_user($email, $password);
                        $row = mysqli_fetch_assoc($result);
                        if ($row) {
                            foreach ($result as $se_er)
                            session_start();
                            $_SESSION['id'] = $se_er['id_user'];
                            $_SESSION['email'] = $se_er['email'];
                            $_SESSION['permission'] = $se_er['permission'];
                            if ($_SESSION['permission'] === "admin"){
                                header("Location:admin/advance-admin/index.php");
                            } else {
                                header("Location:index.php");
                            }
                        } else {
                            echo "Ten dang nhap hoac mat khau khong dung";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
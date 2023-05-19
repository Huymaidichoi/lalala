<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

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
                    <hr />
                    <h2>Nhập thông tin đăng kí</h2><br />
                    <form role="form" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Họ và tên: <input class="form-control" type="text" name="name"></label>
                        </div>
                        <div class="form-group input-group">
                            <label>Email: <input type="email" class="form-control" name="email" /></label>
                        </div>
                        <div class="form-group input-group">
                            <label>Password: <input type="password" class="form-control" name="password" /></label>
                        </div>
                        <div class="form-group input-group">
                            <label>Re_Password: <input type="password" class="form-control" name="repassword" /></label>
                        </div>
                        <button type="submit" class="btn btn-primary " value="" name="txtsub">Đăng kí</button>
                        <hr />
                        <a href="login.php">Hủy đăng kí</a> hoặc quay lại <a href="index.php">trang chủ</a>
                    </form>
                    <?php
                    include('control.php');
                    $getdata = new data();
                    if (isset($_POST['txtsub'])) {
                        $name = $_POST['name'] ?? '';
                        $email = $_POST['email'] ?? '';
                        $password = $_POST['password'] ?? '';
                        $repassword = $_POST['repassword'] ?? '';
                        $permission = 'user';

                        if ($name == null) {
                            echo "Tên trống";
                        } elseif ($email == null) {
                            echo "Email trống";
                        } elseif ($password == null) {
                            echo "Password trống";
                        } elseif ($repassword == null) {
                            echo "Re password trống";
                        } elseif ($password !== $repassword) {
                            echo "Mật khẩu không khớp";
                        } else {
                            $result = $getdata->se_email($email);
                            if ($result->num_rows > 0) {
                                echo "Email đã tồn tại";
                            } else {
                                $_inproduct = $getdata->up_user($name, $email, $password, $permission);
                                if ($_inproduct) {
                                    echo "<script>alert('Đăng kí thành công')</script>";
                                    echo "<script>window.location='login.php'</script>";
                                } else {
                                    echo "<script>alert('Đăng kí thất bại')</script>";
                                }
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
</body>

</html>
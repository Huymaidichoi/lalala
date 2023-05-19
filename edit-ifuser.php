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

<body style="background-color: #E2E2E2;">
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
                    <h2>Chỉnh sửa thông tin</h2><br />
                    <?php
                    include('control.php');
                    session_start();
                    $getdata = new data();
                    $select = $getdata->se_user_info($_SESSION['id']);
                    foreach ($select as $se_if)
                    ?>
                    <form role="form" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Họ và tên:
                                <input class="form-control" type="text" name="name"
                                    value="<?php echo $se_if['name_user'] ?>">
                            </label>
                        </div>
                        <div style="min-width:210px; min-height:250px;">
                            <img id="preview" class="form-control"
                                src="admin/advance-admin/IMG/avatar/<?php echo $se_if['avatar'] ?>"
                                style="max-width:200px; min-height: 200px; " alt="Preview Image">
                            <input type="file" name="avatar" onchange="previewImage(event)">
                        </div>
                        <div class="form-group">
                            <label>
                                Email: <input class="form-control" type="email" name="email"
                                    value="<?php echo $se_if['email'] ?>">
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                Password: <input class="form-control" type="password" name="password"
                                    value="<?php echo $se_if['password'] ?>">
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                Re Password: <input class="form-control" type="password" name="repassword"
                                    value="<?php echo $se_if['password'] ?>">
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary " name="submit">Lưu thay đổi</button>
                        <hr />
                        <a href="info-user.php">Hủy</a>
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
                        $email = $_POST['email'] ?? '';
                        $password = $_POST['password'] ?? '';
                        $repassword = $_POST['repassword'] ?? '';
                        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                            $avatar = $_FILES['avatar']['name'];
                        } else {
                            $avatar = $se_if['avatar'];
                        }
                        if (empty($name)) {
                            echo "Tên trống";
                        } elseif (empty($email)) {
                            echo "Email trống";
                        } elseif (empty($password)) {
                            echo "Password trống";
                        } elseif (empty($repassword)) {
                            echo "Re Password trống";
                        } elseif ($password != $repassword) {
                            echo "Mật khẩu không trùng khớp";
                        } else {
                            $_inproduct = $getdata->update_user($name, $avatar, $email, $password, $_SESSION['id']);
                            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                                move_uploaded_file($_FILES['avatar']['tmp_name'], "admin/advance-admin/IMG/avatar/" . $avatar );
                            }
                            if ($_inproduct) {
                                echo "<script>alert('Chỉnh sửa thành công')</script>";
                                echo "<script>window.location='info-user.php'</script>";
                            } else {
                                echo "<script>alert('Chỉnh sửa thất bại')</script>";
                            }

                        }
                    }
                    ?>
                </div>
            </div>
        </div>
</body>

</html>
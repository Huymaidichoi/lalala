<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="main.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <!-- header -->
        <header>
            <!--Logo-->
            <div class="logo">
                <a href="index.php">
                    <img src="IMG/logo/logo-1.jpg" alt="">
                    <h1>HYper MICKILL</h1>
                </a>
            </div>
            <!--Menu-->
            <div>
                <ul id="Menu">
                    <li><a href="index.php"> Trang Chủ</a></li>
                    <li><a href="">Thể Loại</a>
                        <ul class="sub_menu">
                            <?php
                            $manga = 'Manga';
                            $manhua = 'Manhua';
                            $manhwa = 'Manhwa';
                            $comic = 'Comic';
                            ?>
                            <li><a href="category.php?category=<?php echo $manga ?>">Manga</a></li>
                            <li><a href="category.php?category=<?php echo $manhua ?>">Manhua</a></li>
                            <li><a href="category.php?category=<?php echo $manhwa ?>">Manhwa</a></li>
                            <li><a href="category.php?category=<?php echo $comic ?>">Comic</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href=""> Tài khoản</a>
                        <ul class="sub_menu">
                            <li>
                                <?php
                                session_start();
                                if (isset($_SESSION['email']) && $_SESSION['email'] == true) {
                                    echo "<a href='info-user.php'>Thông tin</a>";
                                } else {
                                    echo "<a href='login.php'>Đăng nhập</a>";
                                }
                                ?>
                            </li>
                            <li>
                                <?php
                                if (isset($_SESSION['email']) && $_SESSION['email'] == true) {
                                    echo "<a href='follow.php'>Theo dõi</a>";
                                } else {
                                    echo "";
                                }
                                ?>
                            </li>
                            <li>
                                <?php
                                if (isset($_SESSION['email']) && $_SESSION['email'] == true) {
                                    echo "<a href='logout.php'>Đăng xuất</a>";
                                } else {
                                    echo "";
                                }
                                ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--Tìm kiếm-->
            <div class="search">
                <form method="post">
                    <input type="search" name="search" placeholder="Tên truyện" class="inputSearch">
                    <input type="submit" name="submit" value="Tìm kiếm" class="buttonSearch">
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    if (empty($_POST['search'])) {
                        echo "";
                    } else {
                        $postName = $_POST['search'];
                        header("Location:search.php?postName=$postName");
                    }
                }
                ?>
            </div>
            <!--Tìm kiếm End-->
        </header>

        <main class="bd-info" style="display: flex;">
            <?php
            include('control.php');
            $getdata = new data();
            $select = $getdata->se_user_info($_SESSION['id']);
            foreach ($select as $se_er)
            ?>
            <div class="avatar-user" style="margin: 50px;">
                <div>
                    <img style="width: 200px; height: 300px;"
                        src="admin/advance-admin/IMG/avatar/<?php echo $se_er['avatar'] ?>" alt="">
                </div>
            </div>
            <div style="margin: 50px;">
                <h2>
                    <?php echo $se_er['name_user'] ?>
                </h2>

                <label for="">Email:
                    <?php echo $se_er['email'] ?>
                </label> <br>
                <a href="edit-ifuser.php">Chỉnh sửa</a>
            </div>
        </main>
    </div>
</body>

</html>
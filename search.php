<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
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
    <!-- header End-->
    <!-- Main Content -->
    <div class="phantruyen">
        <div class="truyenkhu">
            <?php
            // Xử lý nút tìm kiếm
            include('control.php');
            $getdata = new data();
            $postName = $_GET['postName'];
            $result = $getdata->checkPost($postName);
            if ($result === false) {
                echo "Lỗi truy vấn hoặc không tìm thấy bản ghi nào";
            } else {
                // Xử lý kết quả trả về ở đây
                $rows = mysqli_num_rows($result);
                if ($rows >= 1) {
                    // Hiển thị kết quả tìm kiếm
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Truyện
                        echo "<div class='truyen-container'>
                    <ul>
                        <li style='list-style-type: none'>
                            <a href='post.php?id=" . $row['id_post'] . "' style='text-decoration: none'>
                                <div class='truyen'>
                                    <div class='anhbia'>
                                        <img src='admin/advance-admin/IMG/cover-art/" . $row['avatar_post'] . "'>
                                    </div>
                                    <div class='ten_truyen'>
                                        " . $row['name_post'] . "
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>";
                    }
                } else {
                    // Hiển thị thông báo không tìm thấy kết quả
                    echo "Không tìm thấy kết quả phù hợp";
                }
            }
            ?>
        </div>
    </div>
    <!-- Main Content End-->
</body>

</html>
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
    <title>HYper MICIKILL</title>
    <script type="text/javascript">
        function preventback() { window.history.forward() };
        setTimeout("preventback()", 0);
        window.onunload = function () { null; }
    </script>
</head>

<body>
    <div class="tong">
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
        <div class="duoi">
            <!-- 2/Trang Chủ-->
            <div class="duoitop">
                <p>Đọc truyện online, đọc truyện chữ, truyện full, truyện hay. Tổng hợp đầy đủ và cập nhật liên tục.</p>
            </div>
            <!--Phần Truyện-->
            <div class="phantruyen">
                <?php
                include('control.php');
                $getdata = new data();
                $idUser = $_SESSION['id'];
                $selectFollow = $getdata->seFollow($idUser);
                ?>
                <!--Danh sách truyen da thoe doi-->
                <div class="truyenkhu">
                    <div>
                        <h1>Truyện theo dõi</h1>
                    </div>
                    <!--Truyen-->
                    <div class="truyen-container">
                        <?php
                        foreach ($selectFollow as $se_po) {
                            ?>
                            <div class="truyen">
                                <div class="anhbia">
                                    <a href="post.php?id=<?php echo $se_po['id_post'] ?>"><img
                                            src="admin/advance-admin/IMG/cover-art/<?php echo $se_po['avatar_post'] ?>"
                                            alt="">
                                    </a>
                                </div>
                                <div class="ten_truyen">
                                    <a href="post.php?id=<?php echo $se_po['id_post'] ?>">
                                        <?php echo $se_po['name_post'] ?>
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="cuoicung">
            <hr>
            <div class="cuoitop">
                <p class="p">
                    Đọc truyện online, đọc truyện chữ,
                    truyện hay. Website luôn cập nhật <br>
                    những bộ truyện mới thuộc các thể
                    loại đặc sắc như truyện kiếm hiệp,<br>
                    truyện xuyên khong, hay truyện ngôn
                    tình một cách nhanh nhất. Hỗ <br> trợ mọi
                    thiết bị như di động và máy tính bảng
                </p>
                <p>Truyện được cấp phép của ...................</p>
            </div>
            <div class="cuoitop2">
                <p>Hotile:0855422054</p>
                <p>Email:cauhuygay9x@hmail.com</p>
            </div>
        </div>
    </div>
</body>

</html>
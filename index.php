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
</head>

<body>
    <!-- header -->
    <header>
        <!--Logo-->
        <div class="logo">
            <a href="">
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
    <!--Banner web-->
    <div style="">
        <div class="banner">
            <img style="width: 100vw; min-width: 800px; max-width: 100vw;  margin-top: 60px;"
                src="IMG/banner/banner-4.jpg" alt="">
        </div>
        <div class="duoitop">
            <p>Đọc truyện online, đọc truyện chữ, truyện full, truyện hay. Tổng hợp đầy đủ và cập nhật liên tục.</p>
        </div>
    </div>
    <div class="tong">
        <!-- 2/Trang Chủ-->
        <div class="duoi">
            <!--Phần Truyện-->
            <div class="phantruyen">
                <?php
                include('control.php');
                $getdata = new data();
                $selecttop = $getdata->setoppost();
                ?>
                <!--Truyện HOT-->
                <div class="truyenkhu">
                    <div>
                        <h1><i class="fa-brands fa-hotjar"></i> Truyện đọc nhiều</h1>
                    </div>
                    <!--Truyện-->
                    <div class="truyen-container">
                        <?php foreach ($selecttop as $se_po) { ?>
                            <ul>
                                <li style="list-style-type: none">
                                    <a href="post.php?id=<?php echo $se_po['id_post'] ?>" style="text-decoration: none">
                                        <div class="truyen">
                                            <div class="anhbia">
                                                <img
                                                    src="admin/advance-admin/IMG/cover-art/<?php echo $se_po['avatar_post'] ?>">
                                            </div>
                                            <div class="ten_truyen">
                                                <?php echo $se_po['name_post'] ?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
                <!--Truyện mới cập nhật-->
                <div class="truyenkhu" style="margin-top: 50px;">
                    <div>
                        <h1>Truyện mới cập nhật</h1>
                    </div>
                    <!--Truyen-->
                    <div class="truyen-container">
                        <?php
                        $select = $getdata->se_post();
                        $tt_post = mysqli_num_rows($select);
                        $ttpost_inpage = 12;
                        $tt_page = ceil($tt_post / $ttpost_inpage);
                        if (isset($_GET['page']) && $_GET['page'] == true) {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }
                        $postStart = ($page - 1) * $ttpost_inpage;
                        $sePost = $getdata->sepost_inpage($postStart, $ttpost_inpage);
                        foreach ($sePost as $se_po) {
                            ?>
                            <ul>
                                <li style="list-style-type: none">
                                    <a href="post.php?id=<?php echo $se_po['id_post'] ?>" style="text-decoration: none">
                                        <div class="truyen">
                                            <div class="anhbia">
                                                <img src="admin/advance-admin/IMG/cover-art/<?php echo $se_po['avatar_post'] ?>"
                                                    alt="">
                                            </div>
                                            <div class="ten_truyen">
                                                <?php echo $se_po['name_post'] ?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                    <div class="page">
                        <?php
                        if (($page - 2) > 0){
                            echo '<a href="index.php?page='.($page-2).'">'.($page-2).'</a>';
                        } else {
                            echo '';
                        }
                        if (($page - 1) > 0){
                            echo '<a href="index.php?page='.($page-1).'">'.($page-1).'</a>';
                        } else {
                            echo '';
                        }
                        ?>
                        <a href="">
                            <?php echo $page ?>
                        </a>
                        <?php
                        if (($page + 1) <= $tt_page){
                            echo '<a href="index.php?page='.($page+1).'">'.($page+1).'</a>';
                        } else {
                            echo '';
                        }
                        if (($page + 2) <= $tt_page){
                            echo '<a href="index.php?page='.($page+2).'">'.($page+2).'</a>';
                        } else {
                            echo '';
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
                    thiết bị như di động và máy tính bảng</p>
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
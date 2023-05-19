<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                                    echo "<a href='info-user.php?'>Thông tin</a>";
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
            <div class="center_div">
                <div class="body_info">
                    <?php
                    include('control.php');
                    $getdata = new data();
                    $gettruyen = $getdata->se_post_id($_GET['id']);
                    $getchuong = $getdata->se_chuong($_GET['id']);
                    $idPost = $_GET['id'];
                    ?>
                    <?php
                    foreach ($gettruyen as $se_po) {
                        ?>
                        <div class="anhbia_khu">
                            <div class="anhbia_info"><img
                                    src="admin/advance-admin/IMG/cover-art/<?php echo $se_po['avatar_post'] ?>" alt="">
                            </div>
                        </div>
                        <div class="tentruyen">
                            <h1>
                                <?php echo $se_po['name_post'] ?>
                            </h1>
                        </div>
                        <div class="info_khu">
                            <div class="info_truyen">
                                <table>
                                    <tr>
                                        <th>Tác giả:</th>
                                        <td>
                                            <?php echo $se_po['author_post'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Thể loại:</th>
                                        <td>
                                            <?php echo $se_po['name_tag'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Lượt đọc:</th>
                                        <td>
                                            <?php echo $se_po['view'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Yêu thích:</th>
                                        <td>
                                            <?php echo $se_po['like_post'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            if (isset($_SESSION['email']) && $_SESSION['email'] == true) {
                                                $getFavorite = $getdata->get_favorite($idPost, $_SESSION['id']);
                                                $rowFavorite = mysqli_num_rows($getFavorite);
                                                if (isset($_SESSION['idPost']) && $_SESSION['idPost'] == true) {
                                                    unset($_SESSION['idPost']);
                                                    $_SESSION['idPost'] = $idPost;
                                                } else {
                                                    $_SESSION['idPost'] = $idPost;
                                                }
                                                if ($rowFavorite > 0) {
                                                    echo "<form action='treatment.php' method='POST'>
                                                            <input type='submit' name='unfavorite' value='Đã Thích'>
                                                        </form>";
                                                } else {
                                                    echo "<form action='treatment.php' method='POST'>
                                                            <input type='submit' name='favorite' value='Thích'>
                                                        </form>";
                                                }
                                            } else {
                                                echo "<a href='login.php'>Đăng nhập</a>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if (isset($_SESSION['email']) && $_SESSION['email'] == true) {
                                                $getFollow = $getdata->getFollow($idPost, $_SESSION['id']);
                                                $rows = mysqli_num_rows($getFollow);
                                                if ($rows > 0) {
                                                    echo "<form action='treatment.php' method='POST'>
                                                            <input type='submit' name='unfollow' value='Đã theo dõi'>
                                                        </form>";
                                                } else {
                                                    echo "<form action='treatment.php' method='POST'>
                                                            <input type='submit' name='follow' value='Theo dõi'>
                                                        </form>";
                                                }
                                            } else {
                                                echo "<a href='login.php'>Đăng nhập</a>";
                                            }

                                            ?>
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr>
                                        <th>Giới thiệu:</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $se_po['content_post'] ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="list_khu">
                        <div class="chuong_list">
                            <p>Danh sách chương</p>
                            <?php foreach ($getchuong as $se_ch) { ?>
                                <a href="read.php?idChapter=<?php echo $se_ch['id'] ?>&idPost=<?php echo $idPost ?>"
                                    class="linkChapter">Chương <?php echo $se_ch['name'] ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div>
                        <?php
                        $secomment = $getdata->se_comment($idPost);
                        $row = mysqli_num_rows($secomment) ?? 0;
                        ?>
                        <h2>Bình luận (
                            <?php echo $row ?>)
                        </h2>
                    </div>
                    <?php
                    $ttcmt_inpage = 12;
                    $tt_page = ceil($row / $ttcmt_inpage);
                    if (isset($_GET['page']) && $_GET['page'] == true) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $cmtStart = ($page - 1) * $ttcmt_inpage;
                    $secmt = $getdata->secmt_inpage($cmtStart, $ttcmt_inpage, $idPost);
                    ?>
                    <div>
                        <?php
                        foreach ($secmt as $comment) {
                            $seUser = $getdata->se_user_info($comment['id_user']);
                            foreach ($seUser as $user)
                            ?>
                            <div class="comment">
                                <div>
                                    <img class="avt_cmt" style=""
                                        src="admin/advance-admin/IMG/avatar/<?php echo $user['avatar'] ?>" alt="">
                                </div>
                                <div style="margin: 15px;">
                                    <span class="name_user_cmt">
                                        <?php echo $user['name_user'] ?> -
                                        <?php echo $comment['time'] ?>
                                    </span>
                                    <p class="content_cmt">
                                        <?php echo $comment['comment'] ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="page">
                        <?php
                        if (($page - 2) > 0) {
                            echo '<a href="post.php?page=' . ($page - 2) . '&id=' . $idPost . '">' . ($page - 2) . '</a>';
                        } else {
                            echo '';
                        }
                        if (($page - 1) > 0) {
                            echo '<a href="post.php?page=' . ($page - 1) . '&id=' . $idPost . '">' . ($page - 1) . '</a>';
                        } else {
                            echo '';
                        }
                        ?>
                        <a href="">
                            <?php echo $page ?>
                        </a>
                        <?php
                        if (($page + 1) <= $tt_page) {
                            echo '<a href="post.php?page=' . ($page + 1) . '&id=' . $idPost . '">' . ($page + 1) . '</a>';
                        } else {
                            echo '';
                        }
                        if (($page + 2) <= $tt_page) {
                            echo '<a href="post.php?page=' . ($page + 2) . '&id=' . $idPost . '">' . ($page + 2) . '</a>';
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
</body>

</html>
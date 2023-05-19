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
        <!--Content main-->
        <div class="duoi">
            <?php
            include('control.php');
            $getdata = new data();
            $idChapter = $_GET['idChapter'];
            $idPost = $_GET['idPost'];
            $getPost = $getdata->se_post_id($idPost);
            foreach ($getPost as $post)
                $view = $post['view'] + 1;
            $getdata->upview($view, $idPost);
            $select = $getdata->tranh($idChapter);
            $selectChapter = $getdata->se_chuong($idPost);
            $getChapter = $getdata->getChapter($idChapter); foreach ($getChapter as $namechapter)
            ?>
            <!-- slogan -->
            <div class="duoitop">
                <p>Đọc truyện online, đọc truyện chữ, truyện full, truyện hay. Tổng hợp đầy đủ và cập nhật liên tục.</p>
            </div>
            <div class="duoitop">
                <a href="post.php?id=<?php echo $idPost ?>">
                    <?php echo $post['name_post'] ?> /
                </a>
                <a href="">
                    Chap
                    <?php echo $namechapter['name'] ?>
                </a>
            </div>
            <!--Phần Truyện-->
            <div class="center_div">
                <div class="body_info">
                    <!-- Name -->
                    <div class="postName">
                        <a href="post.php?idPost=<?php echo $idPost ?>">
                            <?php echo $post['name_post'] ?>
                        </a>
                    </div>
                    <!-- Interactive -->
                    <div class="interactive">
                        <form method="POST">
                            <!-- previous chapter -->
                            <?php
                            $chapterName = $namechapter['name'];
                            $chapterBack = intval($chapterName) - 1;
                            $result = $getdata->testChapter(strval($chapterBack), $idPost);
                            $num = mysqli_num_rows($result);
                            if ($num == 1) {
                                foreach ($result as $preChaptrer)
                                    $idPreChapter = $preChaptrer['id'];
                                echo '<a class="buttonInteractive" href="read.php?idChapter=' . $idPreChapter . '&idPost=' . $idPost . '"> < </a>';
                            }
                            ?>
                            <!-- List option chapter -->
                            <select name="" id="" value="Chapter <?php echo $namechapter['name'] ?>">
                                <?php foreach ($selectChapter as $chapter) { ?>
                                    <option name="chapter" value="<?php echo $chapter['name'] ?>">Chương
                                        <?php echo $chapter['name'] ?>
                                    </option>
                                <?php } ?>
                                <a href="read.php?idChapter=<?php echo $chapter['id'] ?>"></a>
                            </select>
                            <!-- Next chapter -->
                            <?php
                            $nextChapter = intval($chapterName) + 1;
                            $result = $getdata->testChapter(strval($nextChapter), $idPost);
                            $num = mysqli_num_rows($result);
                            if ($num == 1) {
                                foreach ($result as $nextChaptrer)
                                    $idNextChapter = $nextChaptrer['id'];
                                echo '<a class="buttonInteractive" href="read.php?idChapter=' . $idNextChapter . '&idPost=' . $idPost . '"> > </a>';
                            }
                            ?>
                        </form>
                    </div>
                    <!-- End Interactive -->
                    <!-- images -->
                    <?php foreach ($select as $sel) { ?>
                        <div class="tranh" style="width: 100%;">
                            <div>
                                <img style="width:500px;" src="admin/advance-admin/IMG/images/<?php echo $sel['image'] ?>"
                                    alt="">
                            </div>
                        </div>
                    <?php } ?>
                    <!-- End images -->
                    <!-- Interactive -->
                    <div class="interactive">
                        <?php
                        $select = $getdata->tranh($idChapter);
                        $selectChapter = $getdata->se_chuong($idPost);
                        $getChapter = $getdata->getChapter($idChapter);
                        foreach ($getChapter as $namechapter)
                        ?>
                        <form method="POST">
                            <!-- previous chapter -->
                            <?php
                            $chapterName = $namechapter['name'];
                            $chapterBack = intval($chapterName) - 1;
                            $result = $getdata->testChapter(strval($chapterBack), $idPost);
                            $num = mysqli_num_rows($result);
                            if ($num == 1) {
                                foreach ($result as $preChaptrer)
                                    $idPreChapter = $preChaptrer['id'];
                                echo '<a class="buttonInteractive" href="read.php?idChapter=' . $idPreChapter . '&idPost=' . $idPost . '"> < </a>';
                            }
                            ?>
                            <!-- List option chapter -->
                            <select name="" id="" value="Chapter <?php echo $namechapter['name'] ?>">
                                <?php foreach ($selectChapter as $chapter) { ?>
                                    <option name="chapter" value="<?php echo $chapter['name'] ?>">Chương
                                        <?php echo $chapter['name'] ?>
                                    </option>
                                <?php } ?>
                                <a href="read.php?idChapter=<?php echo $chapter['id'] ?>"></a>
                            </select>
                            <!-- Next chapter -->
                            <?php
                            $nextChapter = intval($chapterName) + 1;
                            $result = $getdata->testChapter(strval($nextChapter), $idPost);
                            $num = mysqli_num_rows($result);
                            if ($num == 1) {
                                foreach ($result as $nextChaptrer)
                                    $idNextChapter = $nextChaptrer['id'];
                                echo '<a class="buttonInteractive" href="read.php?idChapter=' . $idNextChapter . '&idPost=' . $idPost . '"> > </a>';
                            }
                            ?>
                        </form>
                    </div>

                    <!-- End Interactive -->
                    <!-- Comment Start-->
                    <div>
                        <?php
                        $secomment = $getdata->se_comment($idPost);
                        $row = mysqli_num_rows($secomment);
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
                        <form method="POST">
                            <textarea name="txtcomment" cols="50" rows="5" placeholder="Bình luận"
                                maxlength="500"></textarea><br>
                            <?php
                            if (isset($_SESSION['id']) && $_SESSION['id'] == true) {
                                echo '<input type="submit" name="comment" value="Bình luận">';
                            } else {
                                echo '<a class="pointer" href="login.php"><input type="buton" style="witdth: 100px;" value="Đăng nhập"></a>';
                            }
                            ?>
                        </form>
                        <?php
                        if (isset($_POST['comment'])) {
                            $content = $_POST['txtcomment'];
                            if (empty($content)) {
                                echo "Nhập bình luận";
                            } else {
                                $time = isset($_POST["time"]) ? $_POST["time"] : date("Y-m-d H-i-s");
                                $in_comment = $getdata->in_comment($idPost, $_SESSION['id'], $content, $time);
                                if ($in_comment) {
                                    echo "Thành công";

                                } else {
                                    echo "Thất bại";
                                    // echo '<script>location.reload();</script>';
                                }
                            }
                        }
                        ?>
                    </div>
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
                                        <?php echo $user['name_user'] ?>
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
                            echo '<a href="read.php?page=' . ($page - 2) . '&idPost=' . $idPost . ' &idChapter=' . $idChapter . '">' . ($page - 2) . '</a>';
                        } else {
                            echo '';
                        }
                        if (($page - 1) > 0) {
                            echo '<a href="read.php?page=' . ($page - 1) . '&idPost=' . $idPost . '&idChapter=' . $idChapter . '">' . ($page - 1) . '</a>';
                        } else {
                            echo '';
                        }
                        ?>
                        <a href="">
                            <?php echo $page ?>
                        </a>
                        <?php
                        if (($page + 1) <= $tt_page) {
                            echo '<a href="read.php?page=' . ($page + 1) . '&idPost=' . $idPost . '&idChapter=' . $idChapter . '">' . ($page + 1) . '</a>';
                        } else {
                            echo '';
                        }
                        if (($page + 2) <= $tt_page) {
                            echo '<a href="read.php?page=' . ($page + 2) . '&idPost=' . $idPost . '&idChapter=' . $idChapter . '">' . ($page + 2) . '</a>';
                        } else {
                            echo '';
                        }
                        ?>
                    </div>
                    <!-- Comment End -->
                    <div>
                        <button id="back-to-top" onclick="scrollToTop()"> ^ </button>
                    </div>
                    
                    <script>
                        // Xử lý sự kiện click
                        function scrollToTop() {
                            window.scrollTo({
                                top: 0,
                                behavior: "smooth" // Cuộn mượt
                            });
                        }

                        // Hiển thị nút "Quay lại đầu trang" khi cuộn xuống
                        window.onscroll = function () {
                            var backToTopButton = document.getElementById("back-to-top");
                            if (document.documentElement.scrollTop > 300) {
                                backToTopButton.style.display = "block";
                            } else {
                                backToTopButton.style.display = "none";
                            }
                        };

                        // Điều chỉnh vị trí của nút khi cuộn
                        window.addEventListener("scroll", function () {
                            var backToTopButton = document.getElementById("back-to-top");
                            var scrollPosition = window.scrollY || document.documentElement.scrollTop;
                            backToTopButton.style.bottom = (20 + scrollPosition) + "px";
                        });
                    </script>
                </div>
            </div>
        </div>
        <!--End Content main-->
        <!-- footer -->
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
        <!-- End Footer -->
    </div>
</body>

</html>
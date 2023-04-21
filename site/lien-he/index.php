<?php
session_start();
require_once("../../autoload/autoload.php");
require_once("../../controller/site/trang-chu.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('../template/head.php') ?>
</head>

<body class="cms-index-index">
    <div class="page">
        <header class="header-container">
            <?php require_once('../template/top.php') ?>
        </header>
        <div class="container">
            <?php require_once('../template/menu.php') ?>
        </div>
        <div class="container">
            <div class="row">
                <!-- breadcrumbs -->
                <div class="breadcrumbs">
                    <div class="container">
                        <div class="row">
                            <ul>
                                <li class="home"> <a href="../trang-chu">Trang chủ</a><span>—›</span></li>
                                <li><strong>Liên hệ</strong></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End breadcrumbs -->
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php require_once('../template/menu-left.php') ?>
                <div class="col-sm-9 main-content">
                    <h2 class="page-title"><a href="#">Liên hệ</a></h2>
                    <div class="row">
                        <div class="col-sm">
                            <i class="fa fa-facebook"></i>
                        </div>
                        <div class="col-sm">
                            One of three columns
                        </div>
                        <div class="col-sm">
                            One of three columns
                        </div>
                    </div>
                    <div class="page">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14580.283105123714!2d108.19778399668166!3d16.063693039410357!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421855396c1545%3A0xb61e600b922abe84!2zMTE0IEjDoCBIdXkgVOG6rXAsIEjDsmEgS2jDqiwgVGhhbmggS2jDqiwgxJDDoCBO4bq1bmcgNTUwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1682057284758!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <?php require_once('../template/footer.php') ?>
        </footer>
    </div>
    <?php require_once('../template/link-javascrip.php') ?>
    
</body>

</html>
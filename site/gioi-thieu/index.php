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
                                    <li><strong>Giới thiệu</strong></li>
                                    
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
                        <h2 class="page-title"><a href="#">Giới thiệu</a></h2>
                        <div class="page">
                            <p><span style="font-size: 22px"><span style="color: #FF0000"><span style="font-size: 26px"><span style="color: #FF0000">6 năm bán mỹ phẩm  uy tín bên lamchame! (2011-2017)</span></span></span></span><br>
                                <span style="font-size: 22px"><span style="color: #FF0000"><span style="font-size: 18px"><span style="color: #000000">Các mẹ trên diễn đàn Làmchame thân mến!</span></span></span></span><br>
                                <span style="font-size: 22px"><span style="color: #FF0000"><span style="font-size: 18px"><span style="color: #000000">Mình rất cảm ơn các mẹ đã ưu ái, quan tâm và tin dùng mỹ phẩm Yves Rocher của Mẹhieuminh! Nếu như 6 năm trước, Mehieuminh còn bỡ ngỡ tập tành kinh doanh hàng xách tay trên diễn đàn thì bây giờ, Mehieuminh đã có nhiều kinh nghiệm cũng như khách hàng thân thiết và được các mẹ ở khắp các địa phương tin dùng. Mình còn có nhiều khách mua buôn ở các tỉnh trên toàn quốc. Hiện tại, chị gái mình đã nhận bằng Tiến sỹ và công tác tại Pháp, chị cũng vừa được nhập Quốc tịch PHÁP. </span></span></span></span><br>
                                <span style="font-size: 22px"><span style="color: #FF0000"><span style="font-size: 18px"><span style="color: #000000">Yves Rocher là mỹ phẩm thiên nhiên, rất được ưa chuộng tại Pháp mà giá cũng phải chăng. Mình được chị gái gửi xách tay về để làm thêm, vì vậy các mẹ cứ yên tâm là hàng xách tay chính hãng nhé. Giá mình bán cũng cực mềm, luôn thấp hơn showroom tại Hà Nội từ 15-30%. </span></span></span></span>
                            </p>
                            <p><span style="font-size: 22px"><span style="color: #FF0000"><span style="font-size: 18px"><span
                            
                            
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
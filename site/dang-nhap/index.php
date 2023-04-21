<?php
session_start();
  require_once("../../autoload/autoload.php");
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
                            
                              <li><strong>Đăng nhập tài khoản</strong></li>
                            
                          </ul>
                        </div>
                      </div>
                    </div>
<!-- End breadcrumbs --> 
                </div>
            </div>
            <section class="main-container col1-layout">
                <div class="main container">
                    <div class="account-login">
                        <div class="page-title">
                            <h2>Đăng nhập hoặc tạo tài khoản mới</h2>
                        </div>
                        <?php 
                            if(isset($_SESSION['success'])) { 

                                success($_SESSION['success']);
                                unset($_SESSION['success']);

                            }
                            if(isset($_SESSION['error'])) {
                                warning($_SESSION['error']);
                                unset($_SESSION['error']);
                            }
                        ?>
                        <fieldset class="col2-set">
                            <div class="col-1 new-users">
                                <strong>Người dùng mới</strong>
                                <div class="content">
                                    <p>Bằng cách tạo tài khoản, người dùng có thể nhận được thông tin từ cửa hàng một cách nhanh hơn, lưu trữ được nhiều địa chỉ giao hàng,xem và theo dõi đơn hàng của bạn và nhiều hơn nữa...</p>
                                    <div class="buttons-set">
                                        <button onclick="window.location.href='../dang-ky'" class="button create-account" type="button"><span>Tạo tài khoản</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 registered-users" id="login">
                                <strong>Đăng nhập</strong>
                                <div class="content">
                                    <p>Nếu bạn đã có tài khoản hãy nhập thông tin.</p>
                                    <form accept-charset="UTF-8" action="../../controller/site/dang-nhap.php" id="customer_login" method="post">
                                        <input name="FormType" type="hidden" value="customer_login">
                                        <input name="utf8" type="hidden" value="true">
                                        <ul class="form-list">
                                            <li>
                                                <label for="email">Địa chỉ Email <span class="required">*</span></label>
                                                <br>
                                                <input type="text" class="input-text required-entry" id="email" name="email">
                                            </li>
                                            <li>
                                                <label for="pass">Mật khẩu <span class="required">*</span></label>
                                                <br>
                                                <input type="password" id="pass" class="input-text required-entry validate-password" name="password">
                                            </li>
                                        </ul>
                                        <div class="buttons-set">
                                            <button id="send2" type="submit" class="button login"><span>Đăng nhập</span></button>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </fieldset>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </section>
            <footer class="footer">
                <?php require_once('../template/footer.php') ?>
            </footer>
        </div>
        <?php require_once('../template/link-javascrip.php') ?>
    </body>
</html>
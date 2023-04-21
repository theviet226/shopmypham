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
                            
                              <li><strong>Đăng ký tài khoản</strong></li>
                            
                          </ul>
                        </div>
                      </div>
                    </div>
<!-- End breadcrumbs --> 
                </div>
            </div>

            <section class="main-container col1-layout">
                <div class="main container">
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
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <form accept-charset="UTF-8" action="../../controller/site/dang-ky.php" id="customer_register" method="post">
                                <input name="FormType" type="hidden" value="customer_register">
                                <input name="utf8" type="hidden" value="true"> 
                                <ul class="form-list">
                                    <li>
                                        <label for="email">Họ và tên : <span class="required">*</span></label>
                                        <br>
                                        <input type="text" class="input-text required-entry"  name="name">
                                    </li>
                                    
                                    <li>
                                        <label for="pass">Email<span class="required">*</span></label>
                                        <br>
                                        <input type="text" id="pass" class="input-text required-entry" name="email">
                                    </li>
                                    <li>
                                        <label for="pass">Mật khẩu <span class="required">*</span></label>
                                        <br>
                                        <input type="password" id="pass" class="input-text required-entry validate-password" name="password">
                                    </li>
                                    <li>
                                        <label for="pass">Nhập lại mật khẩu <span class="required">*</span></label>
                                        <br>
                                        <input type="password" id="pass" class="input-text required-entry validate-password" name="rpassword">
                                    </li>
                                </ul>
                                <div class="buttons-set">
                                    <button id="send2" type="submit" class="button login"><span>Đăng ký</span></button>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="footer">
                <?php require_once('../template/footer.php') ?>
            </footer>
        </div>
        <?php require_once('../template/link-javascrip.php') ?>
    </body>
</html>
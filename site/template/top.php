<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="welcome-msg hidden-xs"></div>
            </div>
            <div class="col-xs-6">
                <?php if(isset($_SESSION['cart'])): ?>
                <div class="shop-cart hidden-xs hidden-sm">
                    <a href="../gio-hang" class="cart-control">
                        <span class="cart-item">
                            <img src="../../public/site/image/icon/cart.png" alt="Giỏ hàng" width="22" height="20">
                            <span class="cart-number"><?php echo count($_SESSION['cart']) ?></span>
                        </span><!-- .cart-item -->
                        <?php $total =0; ?>
                        <?php foreach($_SESSION['cart'] as $key =>$value): ?>
                            <?php
                                $total = $total + $value['amount'];
                               
                            ?>
                        <?php endforeach ?>
                        <span class="cart-price">Giỏ hàng : <?php echo number_format($value['price'])   ?>đ</span>
                    </a><!-- .cart-control -->
                    <div class="mini-cart-content">
                        <div class="has-items">
                            <div class="action-btn clearfix">
                                <a href="../gio-hang" class="button type_2 pull-left">Giỏ hàng</a>
                                <a href="/checkout" class="button type_1">Thanh toán</a>
                            </div>
                        </div>
                        <div class="no-item" style="display:none">
                            Không có sản phẩm nào trong giỏ hàng của bạn.
                        </div>
                    </div>
                </div>
                <?php else: ?>
                
                <div class="shop-cart hidden-xs hidden-sm">
                    <a href="../gio-hang" class="cart-control">
                        <span class="cart-item">
                        <img src="../../public/site/image/icon/cart.png" alt="Giỏ hàng" width="22" height="20">
                        <span class="cart-number">0</span>
                        </span><!-- .cart-item -->
                        <span class="cart-price">Giỏ hàng 0₫</span>
                    </a>
                    <!-- .cart-control -->
                    <div class="mini-cart-content">
                        <div class="has-items">
                            <div class="action-btn clearfix">
                                <a href="../gio-hang" class="button type_2 pull-left">Giỏ hàng</a>
                                <a href="/checkout" class="button type_1">Thanh toán</a>
                            </div>
                        </div>
                        <div class="no-item" >
                            Không có sản phẩm nào trong giỏ hàng của bạn.
                        </div>
                    </div>
                </div>
                <?php endif ?>
                <div class="toplinks">
                    <div class="links">
                        <?php if(isset($_SESSION['id_user'])): ?>
                            <div class="myaccount"><a><span class="hidden-xs">Xin chào : <?php echo $_SESSION['name_user'] ?></span></a></div>
                            <div class="wishlist"><a href="../../controller/site/dang-xuat.php"><span class="hidden-xs">Đăng suất</span></a></div>
                        <?php else: ?>
                        <div class="myaccount"><a href="../dang-nhap"><span class="hidden-xs">Đăng nhập</span></a></div>
                        <div class="wishlist"><a href="../dang-ky"><span class="hidden-xs">Đăng ký</span></a></div>
                        <?php endif ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header container">
    <div class="row">
        <a class="logo" href="/"><img alt="Nganyvesrocher" src="../../public/site/image/logo2.png"></a>
    </div>
</div>
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
               <?php require_once('../template/slide-show.php') ?>
            </div>
            <div class="container">
                <div class="row">
                    <?php require_once('../template/menu-left.php') ?>
                    <div class="col-sm-9 main-content">
                        <section class="col1-layout home-content-container">
                            <div class="std">
                                <div class="slider-items-products">
                                    <div class="new_title center">
                                        <h2>Sản phẩm nổi bật</h2>
                                    </div>
                                    <div id="best-seller-slider" class="product-flexslider hidden-buttons">
                                        <div class="slider-items slider-width-col4">
                                            <?php foreach($productBuyed as $value): ?>
                                                <div class="item">
                                                    <div class="col-item">
                                                        <div class="images-container">
                                                            <a class="product-image" href="../chi-tiet-san-pham/index.php?id=<?php echo $value['id'] ?>"> 
                                                             <img src="<?php echo url().'upload/san-pham/'.$value['thunbar']; ?>"  alt="Cinque Terre" >
                                                            </a>
                                                            <div class="actions">
                                                                <form action="../../controller/site/gio-hang.php?action=addtocart&id=<?php echo $value['id'] ?>" method="post">
                                                                    <div class="actions-inner">
                                                                        <input type="hidden" name="VariantId" value="1685597" /> 
                                                                        <input type="hidden" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                                                        <button type="submit" class="button btn-cart"><span>Mua hàng</span></button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="info">
                                                            <div class="info-inner">
                                                                <div class="item-title"> <a href="../chi-tiet-san-pham/index.php?id=<?php echo $value['id'] ?>"> <?php echo $value['name'] ?>"> </a> </div>
                                                                <div class="item-content">
                                                                    <div class="price-box">
                                                                        <p class="special-price"> <span class="price">
                                                                <p class="special-price"> <span class="price"><?php echo number_format($value['price'])   ?>đ</span> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="col1-layout home-content-container">
                            <div class="std">
                                <div class="new_title center">
                                    <h2>Sản phẩm mới</h2>
                                </div>
                                <ul class="products-grid">
                                    <?php foreach($newProduct as $value): ?>
                                        <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                            <div class="col-item">
                                                <div class="images-container">
                                                    <a class="product-image" href="../chi-tiet-san-pham/index.php?id=<?php echo $value['id'] ?>"> 
                                                    <img src="<?php echo url().'upload/san-pham/'.$value['thunbar']; ?>"  alt="Cinque Terre" >
                                                    </a>
                                                    <div class="actions">
                                                        <form action="../../controller/site/gio-hang.php?action=addtocart&id=<?php echo $value['id'] ?>" method="post">
                                                            <div class="actions-inner">
                                                                <input type="hidden" name="VariantId" value="1685597" /> 
                                                                <button type="submit" class="button btn-cart"><span>Mua hàng</span></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <div class="info-inner">
                                                        <div class="item-title"> <a href="../chi-tiet-san-pham/index.php?id=<?php echo $value['id'] ?>" title="<?php echo $value['name'] ?>"> <?php echo $value['name'] ?> </a> </div>
                                                        <div class="item-content">
                                                            <div class="price-box">
                                                                <p class="special-price"> <span class="price"><?php echo number_format($value['price'])   ?>đ</span> </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </section>
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                    $table ='product';
                                    $link = 'index.php';
                                    echo pagination($display,$table,$link,$record); 
                                ?>
                            </div>
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
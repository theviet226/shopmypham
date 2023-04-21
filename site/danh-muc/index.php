<?php
session_start();
  require_once("../../autoload/autoload.php");
  require_once("../../controller/site/san-pham-danh-muc.php");
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
            <?php if( isset($dataCate) && !empty($dataCate)) :?>
                <div class="container">
                    <div class="row">
                        <!-- breadcrumbs -->
                        <div class="breadcrumbs">
                            <div class="container">
                                <div class="row">
                                    <ul>
                                        <li class="home"> <a href="../trang-chu">Trang chủ</a><span>—›</span></li>
                                        <?php foreach ($dataCate  as $key =>$category): ?>
                                         <li><strong><?php echo $category['name'] ?></strong></li>
                                         <?php endforeach ?>
                                        
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
                            <?php foreach ($dataCate  as $key =>$category): ?>
                            <section class="col1-layout home-content-container">
                                <div class="std">
                                    <div class="new_title center">
                                        <h2><?php echo $category['name'] ?></h2>
                                    </div>
                                    <?php foreach ($category['sub'] as $keyz_sub => $values): ?>
                                    <?php foreach ($values['subpro'] as $key => $value): ?>
                                    <ul class="products-grid">
                                       
                                            <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                                <div class="col-item">
                                                    <div class="images-container">
                                                        <a class="product-image" href="../chi-tiet-san-pham/index.php?id=<?php echo $value['id'] ?>"> 
                                                        <img src="<?php echo url().'upload/san-pham/'.$value['thunbar']; ?>"  alt="Cinque Terre" >
                                                        </a>
                                                        <div class="actions">
                                                            <form action="/cart/add" method="post">
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
                                        <?php endforeach; ?>
                                    </ul>
                                   
                                </div>
                            </section>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            <?php endif ?>

            <?php if( isset($dataSubCate) && !empty($dataSubCate)) :?>
                <div class="container">
                    <div class="row">
                        <!-- breadcrumbs -->
                        <div class="breadcrumbs">
                            <div class="container">
                                <div class="row">
                                    <ul>
                                        <li class="home"> <a href="../trang-chu">Trang chủ</a><span>—›</span></li>
                                        <?php foreach ($dataSubCate  as $key =>$category): ?>
                                            <li class="home"> <a href="../danh-muc/index.php?action=category&id=<?php echo $category['id'] ?>"><?php echo $category['name'] ?></a><span>—›</span>
                                                    <?php foreach ($category['sub'] as $keyz_sub => $values): ?>
                                                    <li><strong><?php echo $values['name'] ?></strong></li>
                                                    <?php endforeach ?>
                                         <?php endforeach ?>
                                        
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
                            <?php foreach ($dataSubCate  as $key =>$category): ?>
                                <?php foreach ($category['sub'] as $keyz_sub => $values): ?>
                            <section class="col1-layout home-content-container">
                                <div class="std">
                                    <div class="new_title center">
                                        <h2><?php echo $values['name'] ?></h2>
                                    </div>
                                    
                                    <?php foreach ($values['subpro'] as $key => $value): ?>
                                    <ul class="products-grid">
                                       
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
                            <?php endforeach; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <footer class="footer">
                <?php require_once('../template/footer.php') ?>
            </footer>
        </div>
        <?php require_once('../template/link-javascrip.php') ?>
    </body>
</html>
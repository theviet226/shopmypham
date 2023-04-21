<?php
session_start();
require_once("../../autoload/autoload.php");
require_once("../../controller/site/chi-tiet-san-pham.php");
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
                                <?php foreach ($dataViewProduct as $key => $value) : ?>
                                    <li><strong><?php echo $value['name'] ?></strong></li>
                                <?php endforeach ?>
                                <li>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End breadcrumbs -->
            </div>
        </div>

        <div class="main container">
            <div class="row">
                <section class="main-container col1-layout">
                    <div class="main container">
                        <div class="col-main">
                            <div class="row">
                                <div class="product-view wow">
                                    <div class="product-essential">
                                        <?php foreach ($dataViewProduct as $key => $value) : ?>
                                            <form action="../../controller/site/gio-hang.php?action=addtocart&id=<?php echo $value['id'] ?>" method="post" id="product_addtocart_form">
                                                <div class="product-img-box col-lg-6 col-sm-6 col-xs-12">
                                                    <ul class="moreview" id="moreview" style="display: block; width: 352px; height: 338.218px;">
                                                        <li class="moreview_thumb   moreview_thumb_active thumb_1" style="display: list-item; opacity: 1; left: 74px; position: absolute; overflow: hidden; background-image: none;">

                                                            <img class="moreview_thumb_image" src="<?php echo url() . 'upload/san-pham/' . $value['thunbar']; ?>" style="display: inline; width: 276px; height: 336.218px;">

                                                            <img class="moreview_source_image" src="<?php echo url() . 'upload/san-pham/' . $value['thunbar']; ?>">

                                                            <img style="position: absolute;" class="zoomImg" src="<?php echo url() . 'upload/san-pham/' . $value['thunbar']; ?>">

                                                            <img src="<?php echo url() . 'upload/san-pham/' . $value['thunbar']; ?>" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 423px; height: 448px; border: none; max-width: none;">
                                                        </li>
                                                        <li class="moreview_magnifier" style="margin: 0px; padding: 0px; left: 6410px; top: 0.109091px; display: none;">

                                                            <div style="margin: 0px; padding: 0px; width: 276px; height: 336px;">
                                                                <img src="<?php echo url() . 'upload/san-pham/' . $value['thunbar']; ?>" style="margin: 0px; padding: 0px; width: 276px; height: 336.218px; display: inline;">
                                                            </div>
                                                        </li>
                                                        <li class="moreview_icon">&nbsp;</li>
                                                        <li class="moreview_zoom_area" style="margin: 0px; opacity: 0; left: 362px; display: none; background-image: none;">
                                                            <div class="moreview_description" style="width: 42.0896px; bottom: 0px; left: 0px; opacity: 0.7; display: none;">

                                                            </div>
                                                            <div style="width: 82.0896px; height: 100px;"><img class="moreview_zoom_img" src="<?php echo url() . 'upload/san-pham/' . $value['thunbar']; ?>" style="width: 82.0896px; height: 100px;">
                                                            </div>
                                                        </li>
                                                        <li class="moreview_small_thumbs" style="top: 0px; height: 338.218px;">
                                                            <ul style="height: 187px;">

                                                                <li class="moreview_smallthumb_active vertical" style="opacity: 1; margin: 0px 0px 10px;"><img class="moreview_small_thumb" src="<?php echo url() . 'upload/san-pham/' . $value['thunbar']; ?>" height="75" style="width: 62px; height: 75px;">
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>

                                                </div>
                                                <!-- end: more-images -->
                                                <div class="product-shop col-lg-6 col-sm-6 col-xs-12">
                                                    <div class="product-name">
                                                        <h1> <?php echo $value['name'] ?> </h1>
                                                    </div>
                                                    <div class="ratings">
                                                        <p class="rating-links"><a></a> <span class="separator"> Nhà cung cấp |</span> <a> <?php echo $value['supplier'] ?></a> </p>
                                                    </div>
                                                    <?php if ($value['qty'] > 0) : ?>
                                                        <p class="availability in-stock"><span>Còn hàng</span></p>
                                                    <?php else : ?>
                                                        <p class="availability in-stock" style="background: red;"><span>Hết hàng</span></p>
                                                    <?php endif ?>
                                                    <div class="price-block">
                                                        <div class="price-box">
                                                            <p class="special-price"><span class="price"><?php echo number_format($value['price'])   ?>đ</span> </p>
                                                        </div>
                                                    </div>
                                                    <div class="short-description">
                                                        - <?php echo $value['slug'] ?>
                                                    </div>
                                                    <div class="variant-box">
                                                        <div class="product-variant">
                                                            <input type="hidden" name="variantId" value="1685588">
                                                        </div>
                                                    </div>
                                                    <div class="add-to-box">
                                                        <div class="add-to-cart">
                                                            <label for="qty">Số lượng:</label>
                                                            <div class="pull-left">
                                                                <div class="custom pull-left">
                                                                    <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="glyphicon glyphicon-plus">&nbsp;</i></button>
                                                                    <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                                                    <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="glyphicon glyphicon-minus">&nbsp;</i></button>
                                                                </div>
                                                            </div>
                                                            <button class="button btn-cart  btn-add-to-cart" type="submit">
                                                                <span><i class="icon-basket"></i> Thêm vào giỏ hàng</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                            </form>
                                    </div>
                                    <div class="product-collateral">

                                        <div class="col-sm-12">
                                            <div class="box-additional">
                                                <div class="related-pro wow">
                                                    <div class="slider-items-products">
                                                        <div class="new_title center">
                                                            <h2>Sản phẩm liên quan</h2>
                                                        </div>
                                                        <section class="col1-layout home-content-container">
                                                            <div id="best-seller-slider" class="product-flexslider hidden-buttons">
                                                                <div class="slider-items slider-width-col4">
                                                                    <?php foreach ($product_lq as $value) : ?>
                                                                        <div class="item">
                                                                            <div class="col-item">
                                                                                <div class="images-container">
                                                                                    <a class="product-image" href="../chi-tiet-san-pham/index.php?id=<?php echo $value['id'] ?>">
                                                                                        <img src="<?php echo url() . 'upload/san-pham/' . $value['thunbar']; ?>" alt="Cinque Terre">
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
                                                                                        <div class="item-title"> <a href="../chi-tiet-san-pham/index.php?id=<?php echo $value['id'] ?>"> <?php echo $value['name'] ?></a> </div>
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
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <footer class="footer">
            <?php require_once('../template/footer.php') ?>
        </footer>
    </div>

    <?php require_once('../template/link-javascrip.php') ?>

    <script>
        var selectCallback = function(variant, selector) {

            var addToCart = jQuery('.btn-add-to-cart'),
                productPrice = jQuery('.special-price .price'),
                comparePrice = jQuery('.old-price .price');

            if (variant) {
                if (variant.available) {
                    addToCart.removeClass('disabled').removeAttr('disabled').val('Thêm vào giỏ hàng');
                } else {
                    addToCart.val('Hết hàng').addClass('disabled').attr('disabled', 'disabled');
                }
                productPrice.html(Bizweb.formatMoney(variant.price, "{{amount_no_decimals_with_comma_separator}}₫"));
                if (variant.compare_at_price > variant.price) {
                    productPrice.addClass("on-sale")
                    comparePrice
                        .html(Bizweb.formatMoney(variant.compare_at_price, "{{amount_no_decimals_with_comma_separator}}₫"))
                        .show();
                } else {
                    comparePrice.hide();
                    productPrice.removeClass("on-sale");
                }
            } else {
                addToCart.val('Unavailable').addClass('disabled').attr('disabled', 'disabled');
            }
        };
        jQuery(function($) {


            // Add label if only one product option and it isn't 'Title'. Could be 'Size'.


            // Hide selectors if we only have 1 variant and its title contains 'Default'.

            $('.selector-wrapper').hide();


        });
    </script>
</body>

</html>
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
                            
                              <li><strong>Giỏ hàng</strong></li>
                            
                          </ul>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
           <div class="main container">
               <div class="row">
                   <section class="main-container col1-layout">
                       <div class="main container">
                           <div class="col-main">
                               <form method="post" action="/cart">
                                   <div class="cart wow">
                                       <div class="page-title">
                                           <h2>Giỏ hàng</h2>
                                       </div>
                                       <div class="table-responsive">
                                        <?php if(isset($_SESSION['cart'])): ?>
                                           <fieldset>
                                               <table class="data-table cart-table" id="shopping-cart-table">
                                                   <colgroup>
                                                       <col width="1">
                                                       <col>
                                                       <col width="1">
                                                       <col width="1">
                                                       <col width="1">
                                                       <col width="1">
                                                   </colgroup>
                                                   <thead>
                                                       <tr class="first last">
                                                           <th rowspan="1">&nbsp;</th>
                                                           <th rowspan="1"><span class="nobr">Tên sản phẩm</span></th>

                                                           <th colspan="1" class="a-center"><span class="nobr">Giá</span></th>
                                                           <th class="a-center" rowspan="1">Số lượng</th>

                                                           <th colspan="1" class="a-center">Tổng</th>
                                                           <th class="a-center" rowspan="1">&nbsp;</th>
                                                       </tr>
                                                   </thead>
                                                   <tfoot>
                                                       <tr class="first last">
                                                           <td class="a-right last" colspan="50"><button onclick="window.location.href='../trang-chu'" class="button btn-continue" type="button"><span><span>Tiếp tục mua sắm</span></span></button>
 
                                                               <button onclick="window.location.href='../../controller/site/gio-hang.php?action=delete-cart-all'" id="empty_cart_button" class="button btn-empty" value="empty_cart" name="update_cart_action" type="button"><span><span>Xóa giỏ hàng</span></span></button>
                                                           </td>
                                                       </tr>
                                                   </tfoot>
                                                   <tbody>
                                                        
                                                        
                                                        <?php $stt = 0 ;?>
                                                        <?php foreach($_SESSION['cart'] as $key =>$value): ?>
                                                       <tr class=" first  odd">
                                                           <td class="image"><a class="product-image" href=""><img width="75" src="<?php echo url().'upload/san-pham/'.$value['image']; ?>"></a></td>
                                                           <td>
                                                               <h2 class="product-name"> <a href=""> <?php echo $value['name'] ?></a> </h2>
                                                           </td>
                                                           

                                                           <td class="a-right"><span class="cart-price"> <span class="price"><?php echo number_format($value['price'])   ?>đ</span> </span></td>
                                                           <td class="a-center movewishlist"><input maxlength="12" class="input-text qty" size="4" id="updates_4210982" value="<?php echo $value['qty'] ?>" name="lines"></td>
                                                           <td class="a-right movewishlist"><span class="cart-price"> <span class="price"><?php echo number_format($value['amount'])   ?>đ</span> </span></td>
                                                           <td class="a-center last"><a class="button remove-item" href="../../controller/site/gio-hang.php?action=delete-cart&id=<?php echo $key ?>" "><span><span>Remove item</span></span></a></td>
                                                       </tr>
                                                        <?php endforeach ?>
                                                        
                                                   </tbody>
                                               </table>
                                           </fieldset>
                                            
                                       </div>
                                        <div class="cart-collaterals row">
                                           <div class="col-sm-4">
                                               &nbsp;
                                           </div>
                                           <div class="col-sm-4">
                                               &nbsp;
                                           </div>
                                           <div class="totals col-sm-4">
                                               <h3>Tổng giỏ hàng</h3>
                                               <div class="inner">
                                                   <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                                                       <colgroup>
                                                           <col>
                                                           <col width="1">
                                                       </colgroup>
                                                       <tbody>
                                                           <tr>
                                                               <td colspan="1" class="a-left" style=""> Tổng tiền </td>
                                                               <?php $total =0; ?>
                                                                <?php foreach($_SESSION['cart'] as $key =>$value): ?>
                                                                    <?php
                                                                        $total = $total + $value['amount'];
                                                                       
                                                                    ?>
                                                                <?php endforeach ?>
                                                               <td class="a-right" style=""><span class="price">
                                                                <?php  echo number_format($total).'đ'; ?>
                                                                </span></td>
                                                                
                                                           </tr>
                                                       </tbody>
                                                   </table>
                                                   <ul class="checkout">
                                                       <li>
                                                           <button onclick="window.location.href='../thanh-toan'" class="button btn-proceed-checkout" title="Proceed to Checkout" type="button"><span>Thanh toán</span></button>
                                                       </li>
                                                       <br>
                                                   </ul>
                                               </div>
                                           </div>
                                        </div>
                                        <?php else: ?>
                                            <?php if (isset($_SESSION['success'])): ?>

                                            <div class='alert alert-success customalert'>
                                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> <?php  echo $_SESSION['success'] ?>
                                            </div>
                                          <?php else: ?>
                                            <div class='alert alert-danger customalert'>
                                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> Không có sản phẩm nào trong giỏ hàng
                                            </div>
                                        <?php endif ?>
                                        <?php endif ?>
                                   </div>
                               </form>
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
    </body>
</html>
<?php
session_start();
  require_once("../../autoload/autoload.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="anyflexbox boxshadow display-table">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Nganyvesrocher - Thanh toán đơn hàng" />
      <title>Thanh toán đơn hàng</title>
      <link rel="shortcut icon" href="//bizweb.dktcdn.net/assets/favicon.ico" type="image/x-icon" />
      <script src='../../public/plugins/jQuery/jQuery-2.2.0.min.js' type='text/javascript'></script>  
       <link href='../../public/site/css/bootstrap.min.css' rel='stylesheet' type='text/css' />
      <link href='../../public/site/css/nprogress.css' rel='stylesheet' type='text/css' />
      <link href='../../public/site/css/font-awesome.min.css' rel='stylesheet' type='text/css' />
      <link href='../../public/site/css/checkout.css' rel='stylesheet' type='text/css' />
      <link href='../../public/site/css/checkoutv2.css' rel='stylesheet' type='text/css' />
      <!-- Google Tag Manager -->
      <noscript>
         <iframe src='//www.googletagmanager.com/ns.html?id=GTM-MS77Z9' height='0' width='0' style='display:none;visibility:hidden'></iframe>
      </noscript>
      <script>
         (function (w, d, s, l, i) {
         w[l] = w[l] || []; w[l].push({
         'gtm.start':
         new Date().getTime(), event: 'gtm.js'
         }); var f = d.getElementsByTagName(s)[0],
         j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
         '//www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
         })(window, document, 'script', 'dataLayer', 'GTM-MS77Z9');
      </script>
      <!-- End Google Tag Manager -->
      <script>
         var Bizweb = Bizweb || {};
         Bizweb.store = 'nganyvesrocher.bizwebvietnam.net';
         Bizweb.theme = {"id":57473,"role":"main","name":"Fashion 12 -  Inspire"};
         Bizweb.template = '';
      </script>
   </head>
   <body class="body--custom-background-color ">
      <div class="banner" data-header="">
         <div class="wrap">
            <div class="shop logo logo--left ">
               <h1 class="shop__name">
                  <a href="/">
                  
                  </a>
               </h1>
            </div>
         </div>
      </div>
      <button class="order-summary-toggle" bind-event-click="Bizweb.Checkout.toggleOrderSummary(this)">
         <div class="wrap">
            <h2>
               <label class="control-label">Đơn hàng</label>
               <label class="control-label hidden-small-device">
               ( <?php echo count($_SESSION['cart'] ) ?> sản phẩm)
               </label>
               <label class="control-label visible-small-device inline">
               ( <?php echo count($_SESSION['cart'] ) ?> sản phẩm)
               </label>
            </h2>
            <a class="underline-none expandable pull-right" href="javascript:void(0)">
         
            </a>
         </div>
      </button>
      <form method="post" action="../../controller/site/thanh-toan.php" data-toggle="validator" class="content stateful-form formCheckout">
         <div class="wrap" >
            <div class='sidebar '>
               <div class="sidebar_header">
                  <h2>
                     <label class="control-label">Đơn hàng</label>
                     <label class="control-label"> ( <?php echo count($_SESSION['cart'] ) ?> sản phẩm)</label>
                  </h2>
                  <hr class="full_width"/>
               </div>
               <div class="sidebar__content">
                  <div class="order-summary order-summary--product-list order-summary--is-collapsed">
                     <div class="summary-body summary-section summary-product" >
                        <div class="summary-product-list">
                           <table class="product-table">
                              <tbody>
                                 <?php foreach($_SESSION['cart'] as $key =>$value): ?>
                                 <tr class="product product-has-image clearfix">
                                    <td>
                                       <div class="product-thumbnail">
                                          <div class="product-thumbnail__wrapper">
                                             <img src='<?php echo url().'upload/san-pham/'.$value['image']; ?>' class='product-thumbnail__image' />
                                          </div>
                                          <span class="product-thumbnail__quantity" aria-hidden="true"><?php echo $value['qty'] ?></span>
                                       </div>
                                    </td>
                                    <td class="product-info">
                                       <span class="product-info-name">
                                       <?php echo $value['name'] ?>
                                       </span>
                                    </td>
                                    <td class="product-price text-right">
                                       <?php echo number_format($value['amount'])   ?>đ
                                    </td>
                                 </tr>
                              <?php endforeach ?>
                              </tbody>
                           </table>
                           
                        </div>
                     </div>
                     <hr class="m0"/>
                  </div>
                  
                  <div class="order-summary order-summary--total-lines">
                     <div class="summary-section border-top-none--mobile">
                        
                        
                        <div class="total-line total-line-total clearfix">
                           <span class="total-line-name pull-left">
                           Tổng cộng
                           </span>
                           <span>
                              <?php $total =0; ?>
                               <?php foreach($_SESSION['cart'] as $key =>$value): ?>
                                   <?php
                                       $total = $total + $value['amount'];
                                      
                                   ?>
                               <?php endforeach ?>
                              <td class="a-right" style =""><span class="price">
                               <?php  echo number_format($total).'đ'; ?>
                               </span>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="form-group clearfix hidden-sm hidden-xs">
                     <div class="field__input-btn-wrapper mt10">
                        <a class="previous-link" href="../gio-hang">
                        
                        <span>Quay về giỏ hàng</span>
                        </a>
                        <input class="btn btn-primary " type="submit"  value="ĐẶT HÀNG" />
                     </div>
                  </div>
                  <div class="form-group has-error">
                     <div class="help-block ">
                        <ul class="list-unstyled">
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="main" role="main">
               <div class="main_header">
                  <div class="shop logo logo--left ">
                     <h1 class="shop__name">
                        <a href="/">
                        
                        </a>
                     </h1>
                  </div>
               </div>
               <div class="main_content">
                  <div class="row">
                     <div class="col-md-6 col-lg-6">
                        <div class="section" define="{billing_address: {}}">
                           <div class="section__header">
                              <div class="layout-flex layout-flex--wrap">
                                 <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                    <i class="fa fa-id-card-o fa-lg section__title--icon hidden-md hidden-lg" aria-hidden="true"></i>
                                    <label class="control-label">Thông tin mua hàng</label>
                                 </h2>
                              </div>
                           </div>
                           <div class="section__content">
                              <div class="form-group" bind-class="{'has-error' : invalidEmail}">
                                 <div>
                                    <label class="field__input-wrapper" bind-class="{ 'js-is-filled': email }">
                                    <span class="field__label" bind-event-click="handleClick(this)">
                                    Email
                                    </span>
                                    <input name="mail" type="email" bind-event-change="changeEmail()" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_email" data-error="Vui lòng nhập email đúng định dạng"  required  name="Email"  value=""  pattern="^([a-zA-Z0-9_\-\.\+]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" bind="email" />
                                    </label>
                                 </div>
                                 <div class="help-block with-errors">
                                 </div>
                              </div>
                              <div class="billing">
                                 <div>
                                    <div class="form-group">
                                       <div class="field__input-wrapper" bind-class="{ 'js-is-filled': billing_address.full_name }">
                                          <span class="field__label" bind-event-click="handleClick(this)">
                                          Họ và tên
                                          </span>
                                          <input name="name" type="text" bind-event-change="saveAbandoned()" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_billing_address_last_name" data-error="Vui lòng nhập họ tên" required bind="billing_address.full_name" />
                                       </div>
                                       <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                       <div class="field__input-wrapper" bind-class="{ 'js-is-filled': billing_address.phone }">
                                          <span class="field__label" bind-event-click="handleClick(this)">
                                          Số điện thoại
                                          </span>
                                          <input name="phone" bind-event-change="saveAbandoned()" type="text" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_billing_address_phone"  data-error="Vui lòng nhập số điện thoại" required  bind="billing_address.phone"/>
                                       </div>
                                       <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                       <div class="field__input-wrapper" bind-class="{ 'js-is-filled': billing_address.address1 }">
                                          <span class="field__label" bind-event-click="handleClick(this)">
                                          Địa chỉ
                                          </span>
                                          <input name="address" bind-event-change="saveAbandoned()" type="text" bind-event-focus="handleFocus(this)" bind-event-blur="handleFieldBlur(this)" class="field__input form-control" id="_billing_address_address1"  data-error="Vui lòng nhập địa chỉ" required  bind="billing_address.address1" />
                                       </div>
                                       <div class="help-block with-errors"></div>
                                    </div>
                              </div>
                           </div>
                        </div> 
                     </div>
                     
               </div>
            </div>
         </div>
      </form>
      <script src='../../public/site/js/jquery-2.1.3.min.js' type='text/javascript'></script>
      <script src='../../public/site/js/bootstrap.min.js' type='text/javascript'></script>
      <script src='../../public/site/js/twine.min.js' type='text/javascript'></script>
      <script src='../../public/site/js/validator.min.js' type='text/javascript'></script>
      <script src='../../public/site/js/nprogress.js' type='text/javascript'></script>
      <script src='../../public/site/js/money-helper.js' type='text/javascript'></script>
      <script type="text/javascript" src="../../public/site/js/checkout.js"></script>
      <script type="text/javascript">
         $(document).ajaxStart(function () {
             NProgress.start();
         });
         $(document).ajaxComplete(function () {
             NProgress.done();
         });
         
         context = {}
         
         $(function () {
             Twine.reset(context).bind().refresh();
         });
         
         $(document).ready(function () {
         setTimeout(function(){
  
         }, 50);
         
         });
      </script>
   </body>
</html>
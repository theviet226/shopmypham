<?php
  require_once("../../autoload/autoload.php");

   if(isset($_SESSION['id']))
    {
      $id = $_SESSION['id'] ;
      
    }
      
 

  /**
  *  khởi tạo class view Admin kế thừa từ My_Model
  */

  class viewAdmin extends My_Model
  {

  }
  $db = new viewAdmin();
  // lấy ra danh sạch các admin
  $data = $db->fetchAll('ordere');
  //pre($data);
?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once('../template/head.php') ?>
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <?php require_once ('../template/header.php') ?>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
            <?php require_once ('../template/sidebar.php') ?>
        <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Đơn Hàng 
                
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Đơn hàng</a></li>
                <li class="active">Danh sách đơn hàng</li>
              </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Danh sách các đơn hàng</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                    <div class="right_col" role="main">
                    <div class="">
                      <div class="page-title" id ="load">
                          <div class="clearfix"></div>
                              <div class="row">
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                      <div class="x_panel">
                                          <div class="x_content">
                                          <div class="row">
                                          <div class="col-sm-12">
                                              <form method="get" action="" class="list_filter form">
                                                  <table class="table table-bordered">
                                                      <!-- hiển thị thông báo lỗi -->
                                                      <?php 
                                                        if(isset($_SESSION['success']))
                                                        {
                                                          success($_SESSION['success']);
                                                          unset($_SESSION['success']);
                                                        }
                                                      ?>
                                                      <!-- end -->
                                                      <thead>
                                                          <tr>
                                                           
                                                            <th>Mã số</th>
                                                            <th>Mã sản phẩm</th>
                                                            <th>Mã giao dịch</th>
                                                            <th>Tên sản phẩm</th>
                                                            <th>Số lượng</th>
                                                            <th>Giá</th>
                                                            <th>Ảnh</th>
                                                            <th>Tổng tiền </th>
                                                            <th>Ngày lập</th>
                                                            <th>Thao tác</th>
                                                            
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                      
                                                      <?php $stt = 0 ?>
                                                      <?php foreach($data as $value): ?>
                                                      <tr class="row_<?php echo $value['id']?>">
                                                        
                                                        <td class="center"><?php echo $stt = $stt +1 ?></td>
                                                        <td><?php echo $value['product_id'] ?></td>
                                                        <td><?php echo $value['transaction_id'] ?></td>
                                                        <td><?php echo $value['name'] ?> </td>
                                                        <td><?php echo $value['qty'] ?> </td>
                                                        <td><?php echo  number_format($value['price']).'đ'; ?> </td>
                                                        <td class="center">  <img src="<?php echo url().'upload/san-pham/'.$value['image']; ?>" class="img-thumbnail" alt="Cinque Terre" width="80" height="80">  </td>
                                                        <td><?php echo number_format($value['amount']).'đ'; ?> </td>
                                                        <td><?php echo $value['created_at'] ?> </td>
                                                        <td class="center">
                                                          <a href ="../../controller/admin/OrderController.php?action=delete&id=<?php echo $value['id'] ?>" class="verify_action" > 
                                                            <i class="fa fa-trash-o style-delete" onclick="confirmDelete('Bạn chắc chắn muốn xóa san pham')"></i>
                                                        </a>
                                                    </td>
                                                            
                                                      </tr>
                                                   <?php endforeach;?>
                                                      </tbody>
                                                  </table>
                                              <div class="list_actions itemActions">
                                                 
                                              </div>
                                        </form>
                                      </div>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                       </div>
                </div>
               
                <!-- /.box-body -->
                <div class="box-footer">
                  Footer
                </div>
                <!-- /.box-footer-->
              </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrappeontent Wrapper. Contains page content -->

        <footer class="main-footer">
            <?php require_once ('../template/footer.php') ?>
        </footer>

        <!-- Control Sidebar -->

        <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- link java script  -->
        <?php require_once ('../template/link-java-script.php') ?>
    <!-- end link java script -->
</body>
</html>
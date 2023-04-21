<?php
require_once("../../autoload/autoload.php");

if (isset($_SESSION['id'])) {
  $id = $_SESSION['id'];
}

class ShowData extends My_Model
{
  public function __construct()
  {
    parent::__construct();
  }


  public function showTransaction($start, $display)
  {
    $data = parent::fetchAllpagina('transaction', $start, $display);
    return $data;
  }
  public function countid()
  {
    $data = parent::countTable('transaction');
    return $data;
  }
}

$show_data = new ShowData();

$display = 10;
$start = (isset($_GET['s']) && filter_var($_GET['s'], FILTER_VALIDATE_INT, array('min_range' => 1))) ? $_GET['s'] : 0;
$record = $show_data->countid();
$data_transaction = $show_data->showTransaction($start, $display);
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
      <?php require_once('../template/header.php') ?>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <?php require_once('../template/sidebar.php') ?>
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
          <li><a href="#">Giao dịch</a></li>
          <li class="active">Danh sách giao dịch</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">>Danh sách giao dịch</h3>

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
                <div class="page-title" id="load">
                  <div class="clearfix"></div>
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_content">
                          <div class="row">
                            <div class="col-sm-12">
                              <form method="get" action="" class="list_filter form">
                                <table class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Tên </th>
                                      <th>Email </th>
                                      <th>Địa chỉ </th>
                                      <th>Phone </th>
                                      <th>Tổng tiền </th>

                                      <th>Ngày tạo</th>
                                      <th colspan="2" class="text-center">Thao tác</th>
                                    </tr>
                                  </thead>

                                  <?php foreach ($data_transaction as $value) : ?>
                                    <tbody>
                                      <tr>
                                        <td><?php echo $value['id'] ?></td>
                                        <td><?php echo $value['name'] ?></td>
                                        <td><?php echo $value['email'] ?></td>
                                        <td><?php echo $value['address'] ?></td>
                                        <td><?php echo $value['phone'] ?></td>
                                        <td><?php echo number_format($value['amount']) ?>đ</td>

                                        <td><?php echo $value['created_at'] ?></td>
                                        <td class="text-center">

                                          <a class="btn btn-xs btn-danger btn-delete-action verify_action" href="<?php echo '../../controller/admin/Active.php?action=delete&id=' . $value['id']; ?>"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                      </tr>
                                    </tbody>
                                  <?php endforeach; ?>
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
      <?php require_once('../template/footer.php') ?>
    </footer>

    <!-- Control Sidebar -->

    <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- link java script  -->
  <?php require_once('../template/link-java-script.php') ?>
  <!-- end link java script -->
</body>

</html>
<?php
require_once("../../autoload/autoload.php");

if (isset($_SESSION['id']) && isset($_SESSION['role_id'])) {
  $id = $_SESSION['id'];
  $role_id = $_SESSION['role_id'];
}

checkLogin($id, $role_id);

/**
 *  khởi tạo class view Admin kế thừa từ My_Model
 */

class viewAdmin extends My_Model
{
}
$db = new viewAdmin();
// lấy ra danh sạch các admin
$data = $db->fetchAll('admin');
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Danh sách user

    </h1>
    <ol class="breadcrumb">
      <li><a href="../home/"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Admin</a></li>
      <li class="active">List Admin</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">

      <!-- /.box-body -->
      <div class="box-footer">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
          <div class="row">
            <div class="col-md-12">
              <button type="button" class="btn bg-orange btn-flat margin btn-right" onclick="history.go(-1); return false;">Quay lại</button>
              <a href="index.php?action=add"><button type="button" class="btn bg-olive btn-flat margin btn-right">Thêm mới</button></a>

            </div>
          </div>
          <?php
          if (isset($_SESSION['success'])) {
            success($_SESSION['success']);
            unset($_SESSION['success']);
          }
          if (isset($_SESSION['error'])) {
            warning($_SESSION['error']);
            unset($_SESSION['error']);
          }
          ?>
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
                          if (isset($_SESSION['success'])) {
                            success($_SESSION['success']);
                            unset($_SESSION['success']);
                          }
                          ?>
                          <!-- end -->
                          <thead>
                            <tr>

                              <th>Mã số</th>
                              <th>Avata</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Address</th>
                              <th>Updated_at</th>
                              <th>Status</th>
                              <th>Edit</th>
                              <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php $stt = 0 ?>
                            <?php foreach ($data as $value) : ?>
                              <tr class="row_<?php echo $value['id'] ?>">

                                <td class="center"><?php echo $stt = $stt + 1 ?></td>
                                <td class="center"> <img src="<?php echo url() . 'upload/admin/' . $value['avata']; ?>" class="img-thumbnail" alt="Cinque Terre" width="80" height="80"> </td>
                                <td><?php echo $value['name'] ?></td>
                                <td><?php echo $value['email'] ?> </td>
                                <td><?php echo $value['phone'] ?> </td>
                                <td><?php echo $value['address'] ?> </td>
                                <td><?php echo $value['updated_ad'] ?> </td>
                                <td class="center">
                                  <?php if ($value['status'] == 1) : ?>
                                    <?php echo '<i class="fa fa-fw fa-check style-edit" id = "icon_xanh"></i> ' ?>
                                  <?php else : ?>
                                    <?php echo '<i class="fa fa-fw fa-close style-delete" id = "icon_red"></i>'; ?>
                                  <?php endif; ?>
                                </td>

                                <td class="center">
                                  <a href="<?php echo 'index.php?action=edit&id=' . $value['id'] ?>">
                                    <i class="fa fa-edit style-edit">
                                    </i>
                                  </a>
                                </td>
                                <td class="center">
                                  <a href="../../controller/admin/AdminController.php?action=delete&id=<?php echo $value['id'] ?>">
                                    <i class="fa fa-trash-o style-delete" onclick="confirmDelete('Bạn chắc chắn muốn xóa danh mục')"> </i>
                                  </a>
                                </td>
                              </tr>
                            <?php endforeach; ?>
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
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
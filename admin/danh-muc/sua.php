<?php

  /**
  * kế thừa từ hàm
  */
  class viewAdd extends My_Model
  {
   
  }

  $db = new viewAdd();
  $parent = $db->fetchwhere('category','parent_id = 0');
  if(testInputInt($_GET['id']))
  {
    $id = testInputInt($_GET['id']); 

    $where = "id = ".$id;
    $data = $db->fetchwhere ('category',$where);

    if (empty($data)) {
      # code...
      $_SESSION['error'] = "Danh mục không đã tồn tại (*).";
    }
  }
  else
  {
    
    
    echo "<script> window.location = 'index.php'; </script>";
    
  }

?>




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chỉnh Sửa Danh Mục
            <small>Edit new category</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Layout</a></li>
            <li class="active">Fixed</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
        <div class="box">
            
        <div class="box-body">
            <div class="col-sm-12">
                <a href="index.php?action=add" ><button type="button" class="btn bg-olive  margin btn-right">Thêm mới</button></a>
                <a href="../danh-muc/" ><button type="button" class="btn bg-purple margin btn-right">Danh sách</button></a>
            </div>
            <div class="box-body">
                <?php

                    if (isset($_SESSION['error']))
                    {
                      warning($_SESSION['error']);
                      unset($_SESSION['error']);

                    }
                ?>
                    <?php foreach ($data as $key => $value): ?>
                    <form action="../../controller/admin/danh-muc.php?action=edit&id=<?php echo $id ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                              <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                                  <div class="col-md-3 col-sm-6 col-xs-12 ">
                                       <label for="exampleInputEmail1">Tên danh mục <sup class="obligatory">(*)</sup></label>
                                  </div>
                                  <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                      <input type="text" name="name" class="form-control" required="required"  placeholder="Tên danh mục" value="<?php echo $value['name']  ?>" tabindex="1" maxlength="">
                                      <span class="text-danger"><p></p></span>
                                  </div>
                                  <div class="col-md-3 col-sm-3 col-xs-0 "></div>
                              </div>


                              <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                                  <div class="col-md-3 col-sm-6 col-xs-12 ">
                                       <label for="exampleInputEmail1"> Thứ tự hiển thị <sup class="obligatory">(*)</sup></label>
                                  </div>
                                  <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                      <input type="number" name="sort_order" class="form-control" required="required"  placeholder="Thứ tự hiển thị" value="<?php echo $value['sort_order']  ?>" tabindex="1" maxlength="">
                                      <span class="text-danger"><p></p></span>
                                  </div>
                                  <div class="col-md-3 col-sm-3 col-xs-0 ">

                                  </div>
                              </div>

                              <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                                  <div class="col-md-3 col-sm-6 col-xs-12 ">
                                       <label for="exampleInputEmail1"> Danh mục cha <sup class="obligatory">(*)</sup></label>
                                  </div>
                                  <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                      <select class="form-control" name="parent_id">
                                          <option value="0">Đây là danh mục cha</option>
                                            <?php 
                                                foreach ($parent as $key => $values)  {
                                                  echo'<option'
                                            ?>
                                            <?php 
                                                if ($value['parent_id'] == $values['id']) {
                                                    echo "selected";
                                                }

                                                echo' value="'.$values['id'].'">'.$values['name'].'</option>';
                                            }
                                            ?>
                                      </select>
                                      <span class="text-danger"><p></p></span>
                                  </div>
                                  <div class="col-md-3 col-sm-3 col-xs-0 ">

                                  </div>
                              </div>


                              <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                                  <div class="col-md-3 col-sm-6 col-xs-12 ">
                                       <label for="exampleInputEmail1"><sup class="obligatory"></sup></label>
                                  </div>
                                  <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                      <input type="submit" class="btn bg-olive btn-flat margin"  name="" value="Chỉnh sửa">
                                  </div>
                                  <div class="col-md-3 col-sm-3 col-xs-0 ">

                                  </div>
                              </div>
                          </form>
                <?php endforeach ?>
            </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
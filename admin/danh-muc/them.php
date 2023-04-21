 <?php

    if (isset($_SESSION['id']) ) {

      $id = $_SESSION['id'] ;
    }
      
    checkLogin($id);

  class viewAdd
  {
    public $db;
    function __construct()
    {
      # code...
      $this->db = new My_Model();
    }

    function showOption()
    {
      $data = $this->db->fetchwhere('category','parent_id = 0');
      return $data;
    }
  }

  $viewcate = new viewAdd();
  $parent = $viewcate->showOption();


?>


 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm Mới Danh Mục
        </h1>
        <ol class="breadcrumb">
            <li><a href="../home/"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="index.php"> Thêm Mới Danh mục</a></li>
            
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
        <div class="box">
            
            <div class="box-body">
                <div class="col-sm-12">
                    <a href="../danh-muc/" ><button type="button" class="btn bg-navy margin btn-right">Danh sách</button></a>
                   
                </div>
                <div class="box-body">

                    <div class="col-md-12">
                        <div class=" col-md-6">
                            <?php

                                if (isset($_SESSION['error']))
                                {
                                  warning($_SESSION['error']);
                                  unset($_SESSION['error']);

                                }
                            ?>
                        </div>
                        
                    </div>
                    <form action="../../controller/admin/danh-muc.php?action=add" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <label for="exampleInputEmail1">Tên danh mục <sup class="obligatory">(*)</sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="text" name="name" class="form-control" required="required"  placeholder="Tên danh mục" value="" tabindex="1" maxlength="">
                                <span class="text-danger"><p></p></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-0 "></div>
                        </div>


                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <label for="exampleInputEmail1"> Thứ tự hiển thị <sup class="obligatory">(*)</sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="" name="sort_order" class="form-control" required="required"  placeholder="Thứ tự hiển thị" value="" tabindex="1" maxlength="">
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
                                        if (!empty($parent)) {

                                            foreach ($parent as $key => $value) {
                                              # code...
                                              echo'<option value="'.$value['id'].'">'.$value['name'].'</option>';
                                            }
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
                                <input type="submit" class="btn bg-olive btn-flat margin"  name="" value="Thêm Mới">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-0 ">

                            </div>
                        </div>
                    </form>
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
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm Mới Quản Trị Viên
            <small>Add new admin</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Admin</a></li>
            <li class="active">Add Admin</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-sm-12">
                    <a href="../auth/" ><button type="button" class="btn bg-purple btn-flat margin btn-right">Danh sách</button></a>
                    <button type="button" class="btn bg-orange btn-flat margin btn-right" onclick="history.go(-1); return false;">Quay lại</button>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        
                            <?php 
                              if(isset($_SESSION['success']))
                              {
                                success($_SESSION['success']);
                                unset($_SESSION['success']);
                              }
                              if(isset($_SESSION['error']))
                              {
                                warning($_SESSION['error']);
                                unset($_SESSION['error']);
                              }
                            ?>
                        
                        
                    </div>
                    <form action="../../controller/admin/AdminController.php?action=add" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <label for="exampleInputEmail1">Họ Tên<sup class="obligatory">(*)</sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="text" name="name" class="form-control" required="required"  placeholder=" " value="<?php echo isset($_POST['name'])? $_POST['name']:""  ?>" tabindex="1" maxlength="">
                                <span class="text-danger"><p></p></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-0 "></div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <label for="exampleInputEmail1">Email </label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="Email" name="email" class="form-control"  placeholder="" value="<?php echo isset($_POST['email'])? $_POST['email']:""  ?>" tabindex="1" maxlength="">
                                <span class="text-danger"><p></p></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-0 ">
                            </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <label for="exampleInputEmail1">Mật Khẩu <sup class="obligatory">(*)</sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="password" name="password" class="form-control"  placeholder="" value="" tabindex="1" maxlength="">
                                <span class="text-danger"><p></p></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-0 ">

                            </div>
                        </div>


                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                <label for="exampleInputEmail1"> Nhập lại mật khẩu <sup class="obligatory"></sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="password" name="rpassword" class="form-control"  placeholder="" value="" tabindex="1" maxlength="">
                                <span class="text-danger"><p></p></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-0 ">

                            </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                <label for="exampleInputEmail1"> Số điện thoại <sup class="obligatory"></sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="text" name="phone" class="form-control"  placeholder="" value="<?php echo isset($_POST['phone'])? $_POST['phone']:""  ?> " tabindex="1" maxlength="">
                                <span class="text-danger"><p></p></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-0 ">

                            </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                <label for="exampleInputEmail1"> Địa chỉ <sup class="obligatory"></sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="text" name="address" class="form-control"  placeholder="" value="<?php echo isset($_POST['address'])? $_POST['address']:""  ?> " tabindex="1" maxlength="">
                                <span class="text-danger"><p></p></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-0 ">

                            </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <label for="exampleInputEmail1"> Trạng thái <sup class="obligatory"></sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="radio" name="status" id="show_home2" value="1" checked> <span>Hiển thị</span>
                                <input type="radio" name="status" id="show_home2" value="2"> <span>Ẩn</span>
                                <span class="text-danger"><p></p></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-0 ">

                            </div>
                        </div>


                        <div class="form-group col-md-12 col-sm-12 col-xs-12 has-feedback">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <label for="exampleInputEmail1"> Ảnh <sup class="obligatory"></sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="file" id="uploadfile" name="image"  value="" placeholder = "" onchange="readURL(this);" >
                                  <div class="preview showimg" id="thumbbox" >
                                      <img id="thumbimage"  src=""  width="30%" alt="Image preview...">
                                      <a class="removeimg" href="javascript:" ></a>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-0 ">

                            </div>
                            
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <label for="exampleInputEmail1"><sup class="obligatory"></sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <button type="submit" class="btn bg-olive btn-flat margin">Thêm Mới</button>
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
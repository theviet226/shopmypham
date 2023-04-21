<?php
    if(isset($_SESSION['id'])) {

          $id = $_SESSION['id'] ;
          
    }
      
    checkLogin($id);
  /**
  * kế thừa từ hàm
  */
  class viewAdd extends My_Model
  {


   
  }

  $db = new viewAdd();


  if(testInputInt($_GET['id']))
  {
    $id = testInputInt($_GET['id']); 

    $where = "id = ".$id;
    $data = $db->fetchwhere ('product',$where);

    if (empty($data)) {
      # code...
      $_SESSION['error'] = "Sản phẩm không tồn tại (*).";
    }
  }
  else
  {
    
    echo "<script> window.location = 'index.php'; </script>";
  }

  
    
    $datas = $db->fetchwhere('category','   parent_id = 0');

    foreach ( $datas as $key => $value)
    {

      $where = 'parent_id  = '. $value['id'] ;
      $datas[$key]['danhmuc'] = $db->fetchwhere('category',$where);
    }
    
?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chỉnh Sửa Sản Phẩm
            
        </h1>
        <ol class="breadcrumb">
            <li><a href="../home"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="#">Chỉnh sửa sản phẩm</a></li>
            
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
                    <a href="../san-pham/" ><button type="button" class="btn bg-purple margin btn-right">Danh sách</button></a>
                    
                </div>
                <div class="box-body">
                    <?php

                        if (isset($_SESSION['error']))
                        {
                          warning($_SESSION['error']);
                          unset($_SESSION['error']);

                        }
                    ?>
                    
                    <?php  foreach ( $data as $values ): ?>
                        
                    <form action="../../controller/admin/san-pham.php?action=edit&id=<?php echo $values['id'] ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <label for="exampleInputEmail1">Tên sản phẩm <sup class="obligatory">(*)</sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="text" name="name" class="form-control" required="required"  placeholder="" value="<?php echo !empty($values['name']) ? $values['name'] : '' ?>" tabindex="1" maxlength="">
                                <span class="text-danger"><p></p></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-0 "></div>
                        </div>

                        

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <label for="exampleInputEmail1"> Giá <sup class="obligatory">(*)</sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="number" name="price" class="form-control" required="required"  placeholder="Giá" value="<?php echo !empty($values['price']) ? $values['price'] : '' ?>" tabindex="1" maxlength="">
                                <span class="text-danger"><p></p></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-0 ">

                            </div>
                        </div>


                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                <label for="exampleInputEmail1"> Số lượng <sup class="obligatory">(*)</sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="number" name="qty" class="form-control"  value="<?php echo !empty($values['qty']) ? $values['qty'] : '' ?>" tabindex="1" maxlength="">
                                <span class="text-danger"><p></p></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-0 ">

                            </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <label for="exampleInputEmail1"> Danh mục  <sup class="obligatory">(*)</sup></label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <select class="form-control parsley-error" _autocheck="true" name="parent_id">
                                      <option value="0"> Chọn danh mục </option>
                                      <?php
                                        foreach ($datas as $key => $value) {
                                          # code...
                                          if(!empty($value['danhmuc']))
                                          {
                                      ?>
                                            <optgroup label="<?php echo $value['name']?>">
                                              <?php foreach ($value['danhmuc'] as $sub ): ?>
                                                <option value="<?php echo $sub['id'] ?>" <?php  echo ($sub['id'] == $values['category_id']) ? 'selected':""; ?>  >
                                                  <?php echo $sub['name'] ?>
                                                </option>
                                              <?php endforeach;?>
                                            </optgroup>
                                      <?php
                                          }else {
                                        ?>
                                            <option id="heard"  value=" <?php echo $value['id']  ?>" <?php echo ($value['id'] == $values['category_id']) ? 'selected' :""; ?> > <?php echo $value['name'] ?> </option>;
                                        <?php
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
                                 <label for="exampleInputEmail1"> Nhà cung cấp  </label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <input type="text" name="supplier" class="form-control"   value="<?php echo $values['supplier'] ?>" tabindex="1" maxlength="">
                                <span class="text-danger"><p></p></span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-0 ">
                            </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 ">
                            <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <label for="exampleInputEmail1"> Mô tả <sup class="obligatory">(*)</sup> </label>
                            </div>
                            <div class=" form-group  col-md-6 col-sm-6 col-xs-12 ">
                                <textarea id="editor1" name="slug" rows="10" cols="82"  required="required" > <?php echo !empty($values['slug']) ? $values['slug'] : '' ?>"</textarea>
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
                                      <img id="thumbimage"  src="<?php echo url().'upload/san-pham/'.$values['thunbar']; ?>"  width="30%" alt="Image preview...">
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
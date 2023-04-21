<?php

  /**
  * 
  */
  class showData
  {
    public $db;
   public  function __construct()
    {
      # code...
      $this->db = new My_Model();
    }
    public function show_list($start,$display)
    {
      $data = $this->db ->fetchAllpagina('product' , $start,$display);
      return $data;
    }
    public function countid()
    {
       $data = $this->db->countTable('product');
       return $data;
    }

    public function show_parent($table,$where)
    {
        $data = $this->db->fetchwhere($table,$where);
        return $data;
    }

  }

  $show_list_cate = new showData();

  $display = 10;
  $start = (isset($_GET['s']) && filter_var($_GET['s'],FILTER_VALIDATE_INT,array('min_range'=>1)))?$_GET['s']:0;
  $record = $show_list_cate ->countid();
  $data =$show_list_cate ->show_list($start,$display);


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh Sách Sản Phẩm
            
        </h1>
        <ol class="breadcrumb">
            <li><a href="../home/"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li><a href="#">Danh sách sản phẩm</a></li>
           
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            
            <div class="box-footer">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                       <div class="col-md-12">
                           
                            <a href="index.php?action=add"><button type="button" class="btn bg-olive margin btn-right">Thêm mới</button></a>
                           
                       </div>
                    </div>
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
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0"  rowspan="1" colspan="1"  >STT</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1">Tên</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1">Ảnh</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1">Mô tả</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1">Thuộc danh mục</th>
                                        <th class="sorting_asc" tabindex="0"  rowspan="1" colspan="1">Giá</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1">Số lượng</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1">Nhà cung cấp</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1">Edit</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt = 0 ?>
                                    <?php foreach($data as $key => $value): ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"><?php echo $stt = $stt +1 ?></td>
                                            <td><?php echo $value['name'] ?></td>
                                            <td><img src="<?php echo url().'upload/san-pham/'.$value['thunbar']; ?>" class="img-thumbnail" alt="Cinque Terre" width="100" height="100"></td>
                                            <td><?php echo the_excerpt($value['slug'],80) ?></td>
                                            <td>
                                                <?php 
                                                        $where = 'id = '.$value["category_id"];
                                                            $parent_name = $show_list_cate-> show_parent('category',$where);
                                                          if(!empty($parent_name))
                                                          {
                                                              foreach ($parent_name as $key => $values) {
                                                                # code...
                                                                echo $values['name'];
                                                              }
                                                          }
                                                    ?> 
                                            </td>
                                            <td><?php echo number_format($value['price'])   ?>đ</td>
                                            <td><?php echo $value['qty']   ?></td>
                                            <td><?php echo $value['supplier']   ?></td>
                                            <td>
                                                <a href="index.php?action=edit&id=<?php echo $value['id'] ?>">
                                                  <i class="fa fa-edit style-edit" >
                                                  </i>
                                                </a>
                                            </td>
                                            <td><a href="../../controller/admin/san-pham.php?action=delete&id=<?php echo $value['id'] ?>" ><i class="fa fa-trash-o style-delete" onclick="confirmDelete('Bạn chắc chắn muốn xóa san pham')"></a></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                <?php 
                                    $table ='product';
                                    $link = 'index.php';
                                    echo pagination($display,$table,$link,$record); 
                                ?>
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
 <?php

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
      $data = $this->db ->fetchAllpagina('category' , $start,$display);
      return $data;
    }
    public function countid()
    {
       $data = $this->db->countTable('category');
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
            Danh Sách Danh Mục
        </h1>
        <ol class="breadcrumb">
            <li><a href="../trang-chu/"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="#">Danh mục</a></li>
            <li class="active">Danh sách danh mục</li>
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
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1">Tên danh mục</th>
                                        <th class="sorting_asc" tabindex="0"  rowspan="1" colspan="1">Danh mục cha</th>
                                        <th class="sorting_asc" tabindex="0"  rowspan="1" colspan="1">Thứ tự hiển thị</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1">Edit</th>
                                        <th class="sorting" tabindex="0"  rowspan="1" colspan="1">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt = 0; ?>
                                    <?php foreach ($data as $key => $value):?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"><?php echo $stt = $stt +1; ?></td>
                                            <td><?php echo $value['name']  ?></td>
                                            <td>
                                            <?php
                                                $where = 'id = '.$value["parent_id"];
                                                $parent_name = $show_list_cate-> show_parent('category',$where);
                                                if (!empty($parent_name)) {

                                                    foreach ($parent_name as $key => $values) {
                                                        # code...
                                                        echo $values['name'];
                                                    }
                                                } else {

                                                    echo "Danh mục cha";
                                                }
                                            ?>
                                            </td>
                                           
                                            <td><?php echo $value['sort_order']  ?></td>
                                            <td>
                                                <a href="index.php?action=edit&id=<?php echo $value['id'] ?>">
                                                  <i class="fa fa-edit style-edit" >
                                                  </i>
                                                </a>
                                            </td>
                                            <td><a href="../../controller/admin/danh-muc.php?action=delete&id=<?php echo $value['id'] ?>" ><i class="fa fa-trash-o style-delete" onclick="confirmDelete('Bạn chắc chắn muốn xóa danh mục')"></a></td>
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
                                    $table ='category';
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
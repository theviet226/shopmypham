<?php 
    
    // khai báo class ShowCategory
    class ShowCategory extends My_Model{

        public function __construct()
        {
            parent::__construct();
        }

        function showCate()
        {

          $data = parent::fetchwhere('category','parent_id = 0  ORDER BY sort_order ASC');

          foreach ( $data as $key => $value)
          {

            $where = 'parent_id  = '. $value['id'].' ORDER BY sort_order ASC ' ;
            $data[$key]['danhmuc'] = parent::fetchwhere('category',$where);
          }
          return $data;
        }

        public function showProductBuyLeft()
        {
            $where = ' 1 ORDER BY buyed DESC LIMIT 0,5';
            return parent::fetchwhere('product',$where);
        }

    }
    // khởi tạo class 
    $show_category = new ShowCategory();
    // lấy ra các danh mục 
    $data = $show_category ->showCate();

    $dataLeft = $show_category ->showProductBuyLeft();

?>

<div class="hidden-xs">
    <aside class="col-left sidebar col-sm-3 col-xs-12 wow">
        <div class="side-nav-categories hidden-xs">
            <div class="block-title">Danh mục sản phẩm</div>
            <div class="box-content box-category">
                <ul>
                    <?php foreach($data as $value): ?>
                    <li>
                        <a class="active" href="../danh-muc/index.php?action=category&id=<?php echo $value['id'] ?>">
                    <?php echo $value['name'] ?></a></a> <span class="subDropdown minus"></span>
                    <?php if(!empty($value['danhmuc'])): ?>
                        <ul style="display:block">
                            <?php foreach ($value['danhmuc'] as $key => $sub ): ?>
                                <li><a href="../danh-muc/index.php?action=sub_cate&id=<?php echo $sub['id'] ?>"> <?php echo $sub['name'] ?> </a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif ?>
                    </li>
                    <?php endforeach; ?>
                   
                </ul>
            </div>
        </div>
        <div class="box support-online hidden-xs">
            <div class="box-heading">Hỗ trợ trực tuyến</div>
            <div class="block-content">
                <img src="//bizweb.dktcdn.net/100/044/137/themes/57473/assets/lienhe.png?1484368157774"> 
                <br />
                <span>TƯ VẤN HỖ TRỢ</span>
                <br />
                ĐT: 
                <br />
                Email: <a href="mailto:ngandk2004@gmail.com"></a>
            </div>
        </div>
        <div class="inner-div">
            <h2 class="category-pro-title"><span>Sản phẩm nổi bật</span></h2>
            <div class="category-products">
                <div class="products small-list">

                    <?php foreach( $dataLeft as $value): ?>
                        <div class="item">
                            <div class="item-area">
                                <div class="product-image-area"> 
                                    <a href="../chi-tiet-san-pham/index.php?id=<?php echo $value['id'] ?>" class="product-image"> 
                                    <img src="<?php echo url().'upload/san-pham/'.$value['thunbar']; ?>"  alt="Cinque Terre" >
                                    </a> 
                                </div>
                                <div class="details-area">
                                    <h2 class="product-name"><a href="../chi-tiet-san-pham/index.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h2>
                                    <div class="price-box"> 
                                        <span class="regular-price"> 
                                        <span class="price">
                                            <p class="special-price"> <span class="price"><?php echo number_format($value['price'])   ?>đ</span> 
                                        </span>                                             
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="box support-online visible-xs">
            <div class="box-heading">Hỗ trợ trực tuyến</div>
            <div class="block-content">
                <img src=""> 
                <br />
                <span>TƯ VẤN HỖ TRỢ</span>
                <br />
                ĐT: 
                <br />
                Email: <a href="mailto:ngandk2004@gmail.com"></a>
            </div>
        </div>
    </aside>
</div>
<?php 

class ViewProduct extends My_Model{

        public function __construct()
        {
            parent::__construct();

        }

        public function showProducCate($id)
        {
            $id = validate_id($id);

            // show danh mục cha co parent_id =0
            $data_category = parent::fetchwhere('category','id = '.$id);

            // show danh mục con
            foreach ($data_category as $keys => $category)
            {
                $where = 'parent_id = '.$category["id"];
                $category_sub = parent::fetchwhere('category', $where);



                $data_category[$keys]['sub'] = $category_sub;



                foreach ($data_category[$keys]['sub'] as $key  => $value)
                {
                    $where = 'category_id = '.$value['id'].' LIMIT 0 ,16';
                    // show sản phẩm thuộc danh mục 
                    $product = parent::fetchwhere('product',$where);

                    $data_category[$keys]['sub'][$key]['subpro'] = $product;
                }
            }
            

            return $data_category ;



        }

        public function showProducSub($id)
        {
             $id = validate_id($id);

             $data_sub = parent::fetchwhere('category','id = '.$id);

             foreach ($data_sub as $key => $value) {
                 # code...
                $where = "id = ".$value['parent_id'];
                $data_category = parent::fetchwhere('category',$where);
                $data_category[$key]['sub'] = $data_sub;

                foreach ($data_sub as $keys => $value) {
                 # code...
                    $where = 'category_id = '.$value['id'];
                    $product = parent::fetchwhere('product',$where);

                    $data_category[$key]['sub'][$keys]['subpro'] = $product;
                 }
             }
             
             return $data_category;
        }

    }

    $view_product = new ViewProduct();
    $action = $_GET['action'];
    
    switch ($action) {
        case 'category':
            # code...
            $id = validate_id($_GET['id']);
            $dataCate = $view_product->showProducCate($id);

            break;
        case 'sub_cate':
            # code...
            $id = validate_id($_GET['id']);
            $dataSubCate = $view_product->showProducSub($id);
            
            break;
       
    }


    
   
    
    
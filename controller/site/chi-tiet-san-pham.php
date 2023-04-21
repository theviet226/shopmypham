<?php 

class ViewProductController extends My_Model 
{
	public function __construct(){

        parent::__construct();
    }

    public function viewProduct($id)
    {
       $id =  validate_id($id);

       $where = "id = ".$id;

        $data = parent::fetchwhere('product',$where);
        return $data;
    }

    public function viewProducts($id)
    {
        $id =  validate_id($id);
        $where = "id = ".$id;

        $data = parent::fetchwhere('product',$where);

        foreach ($data as $key => $value) {
        # code...

            $where = ' category_id = '.$value['category_id'] .' ORDER BY created_at DESC LIMIT 3 ' ;
            return $product_lq = parent::fetchwhere('product',$where);
 
        }
    }

}


$view_product = new ViewProductController();
if(validate_id($_GET['id']))
{
    $id = validate_id($_GET['id']);
    $dataViewProduct = $view_product->viewProduct($id);

    $product_lq = $view_product->viewProducts($id);
}


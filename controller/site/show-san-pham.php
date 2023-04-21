<?php 
/**
* 
*/
class ViewProductController extends My_Model 
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}


	public function viewProduct($id)
    {
       $id =  validate_id($id);

       $where = "id = ".$id;

        $data = parent::fetchwhere('product',$where);
       // lấy ra danh mục cha
       foreach ($data as $key => $value) {
        # code...

            $data[$key]['category'] = parent::fetchwhere('category', 'id = '.$value['category_id']);
            
        }

        return $data;
    }

    public function viewProducts($id)
    {
        $id =  validate_id($id);
        $where = "id = ".$id;

        $data = parent::fetchwhere('product',$where);

        foreach ($data as $key => $value) {
        # code...

            $where = ' category_id = '.$value['category_id'];
            return $product_lq = parent::fetchwhere('product',$where);

            
        }
    }
}

$view_product = new ViewProductController();
if(validate_id($_GET['id']))
{
    $id = validate_id($_GET['id']);

    $data_new = $view_product->viewProduct($id);

    $product_lq = $view_product->viewProducts($id);



}
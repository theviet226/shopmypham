<?php
session_start();
    require_once("../../autoload/autoload.php");

    class Order extends My_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

           // xóa đơn hàng
        public function delete($data)
        {
            if (isset($_GET['id'])) {
                # code...
                $id = $_GET['id'];
                settype ($id, "int");
                $this->_del($id);
            }else{
                $_SESSION['error'] = "Sản phẩm không tồn tại";
                rdr_url("../../admin/product/index.php"); 
            }
            
        }

        // Xóa tất cả sản phẩm 
        public function deleteall($data)
        {
            $ids = $_POST['ids'];
            foreach ($ids as  $id) {
                # code...
                $this-> _del($id);
                }
        }
            


        public function _del($id,$rediect = true)
        {

            $data = parent::fetchid('ordere',$id);
            if(!$data)
            {
                
                $_SESSION['error'] = "Đơn hàng không tồn tại";
                if($rediect){
                    rdr_url("../../admin/order/index.php");
                }else{
                    return false;
                }
            }
                
            parent::delete('ordere',$id);

           

            $_SESSION['success'] = "Đơn hàng đã được xóa.";
            rdr_url("../../admin/order/index.php"); 
           
        }


        // end class
    }





   $actionOrder = new Order();
    switch($_REQUEST['action']){
        case 'delete':
                if($_SERVER['REQUEST_METHOD']=='GET')
                {
                    $actionOrder ->delete($_REQUEST);
                } 
            break;
        
        
        default:
           rdr_url("../../admin/order/index.php"); 
            break;

    }


?>
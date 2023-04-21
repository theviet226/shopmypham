<?php 
session_start();
    require_once("../../autoload/autoload.php");
    class Active extends My_Model{
    	public function __construct()
    	{
    		parent::__construct();
    	}

    	public function actionPay($data)
    	{

    		$ids = validate_id($data['id']);

            $data = parent::fetchwhere('ordere','transaction_id = '.$ids);
            

    		$datas = array('active'=>1);
    		$where = array('id' =>$ids);
    		if(parent::update('transaction',$datas,$where)){
                
            }else
            {
               
            }
    		
    		redirect_to('admin/giao-dich/');
    	}

    	public function actionUnpaid($data)
    	{

    		$ids = validate_id($data['id']);

            $data = parent::fetchwhere('ordere','transaction_id = '.$ids);
            foreach($data as $val )
            {
                $id = $val['product_id'];

                $product = parent::fetchwhere('product' ,'id ='.$id);

                foreach($product as $value)
                {
                    $qty = $value['qty'] +1;
                }
                

                $data = array('qty' =>$qty);
                $where = array('id' =>$id);
                if(parent::update('product',$data,$where))
                {
                   
                }


            }
    		$datas = array('active'=>0);
    		$where = array('id' =>$ids);
    		parent::update('transaction',$datas,$where);
    		redirect_to('admin/giao-dich/');
    	}



    	 public function deletes($data)
        {
            if (isset($_GET['id'])) {
                # code...
                $id = $_GET['id'];
                settype ($id, "int");
                $this->_del($id);
            }else{
                $_SESSION['error'] = "Giao dịch không không tồn tại";
                redirect_to('admin/giao-dich/');
            }
            
        }


      
           
        public function _del($id,$rediect = true)
        {

            $data = parent::fetchid('transaction',$id);
            if(!empty($data))
            {
                parent::delete('transaction',$id);
                $_SESSION['success'] = "Giao dịch đã được xóa.";
                redirect_to('admin/giao-dich/');
                
            }
            else
            {
                $_SESSION['error'] = "Giao dịch không không tồn tại";
                redirect_to('admin/giao-dich/');
                
            }
        }

    }



	$actives = new Active();

	switch ($_REQUEST['action']) {
		case 'pay':
			# code...
			$pay = $actives -> actionPay($_REQUEST);
			break;
		case 'unpaid':
			# code...
			$unpaid = $actives -> actionUnpaid($_REQUEST);
			break;

		case 'delete':
			# code...
			$delete = $actives ->deletes($_REQUEST);
			break;
		
		default:
			# code...
			break;
	}
?>

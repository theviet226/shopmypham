<?php
session_start();
    require_once("../../autoload/autoload.php");

    class Product extends My_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        // thêm mói sản phẩm 
        public function actionAdd($data,$file)
        {
            // tạo mảng trổng lưu thông báo lỗi
            $error = array();
            // tạo mảng lưu các giá trị get từ form về 
            $product = array();

            // kiểm tra giá trị  nhập vào từ form 
            if(testInputString($data['name']))
            {
                $product['name'] = testInputString($data['name']);
            }
            else
            {
                $error[] ="name";
            }

            
            if(testInputString($data['slug']))
            {
                $product['slug'] = testInputString($data['slug']);
            }
            else {
                $error[] ="slug";
            }

            if(testInputString($data['price']))
            {
                $product['price'] = testInputString($data['price']);
            }
            else
            {
                $error[] ="price";
            }

            if(testInputString($data['qty']))
            {
                $product['qty'] = testInputString($data['qty']);
            }
            else
            {
                $error[] ="qty";
            }


            if(testInputString($data['supplier']))
            {
                $product['supplier'] = testInputString($data['supplier']);
            }
            else
            {
                $product['supplier'] = '';
            }

            if(testInputString($data['parent_id']))
            {
                $product['category_id'] = testInputString($data['parent_id']);
            }
            else
            {
                $error[] ="parent_id";
            }

            if ($file) {
                 # code...
                $product['thunbar'] =  uploadImage($file,'san-pham','add');
            }else{
                $product['thunbar'] =  '';
            }

           
            
            // nếu các trường yêu cầu người dùng nhập đã đầy đủ
           if (empty($error)) {
               # code...
                // insert dữ liệu vào csdl
                parent::insert('product',$product);

                $_SESSION['success'] = "Insert thành công .";
                rdr_url("../../admin/san-pham/index.php");
          
           }else{
                // Thông báo người dùng cần điền đầy đủ các trường 
                $_SESSION['error'] = "Bạn cần điền đầy đủ các trường có dấu sao .";

               
                rdr_url("../../admin/san-pham/them.php");
           }

           

        }

        // chỉnh sửa sản phẩm 
        public function actionEdit($data,$file)
        {
            
            // tạo mảng trổng lưu thông báo lỗi
            $error = array();

            // tạo mảng lưu các giá trị get từ form về 
            $product = array();

            // kiểm tra giá trị  nhập vào từ form 
            // kiểm tra giá trị  nhập vào từ form 
            // kiểm tra giá trị  nhập vào từ form 
            if(testInputString($data['name']))
            {
                $product['name'] = testInputString($data['name']);
            }
            else
            {
                $error[] ="name";
            }

            
            if(testInputString($data['slug']))
            {
                $product['slug'] = testInputString($data['slug']);
            }
            else {
                $error[] ="slug";
            }

            if(testInputString($data['price']))
            {
                $product['price'] = testInputString($data['price']);
            }
            else
            {
                $error[] ="price";
            }

            if(testInputString($data['qty']))
            {
                $product['qty'] = testInputString($data['qty']);
            }
            else
            {
                $error[] ="qty";
            }


            if(testInputString($data['supplier']))
            {
                $product['supplier'] = testInputString($data['supplier']);
            }
            else
            {
                $product['supplier'] = '';
            }

            if(testInputString($data['parent_id']))
            {
                $product['category_id'] = testInputString($data['parent_id']);
            }
            else
            {
                $error[] ="parent_id";
            }


            if (!empty($file['image']['name'])) {
                 # code...
                $product['thunbar'] =  uploadImage($file,'product','edit');
             }

            $id = $data['id'];

            
            // kiểm tra nếu các giá trị đã được điền đầy đủ
            if (empty($error)) 
            {
                # code...
                // update vào cơ sở dữ liệu
                parent:: update('product',$product ,array("id" => $id));
                
                $_SESSION['success'] = "Chỉnh sửa thành công sản phẩm.";
                rdr_url("../../admin/san-pham/index.php"); 
            }
            else
            {
                // thông báo lỗi
                $_SESSION['error'] = "Bạn cần nhập đầy đủ các trường có dấu (*).";
                rdr_url("../../admin/san-pham/index.php?action=edit&{$id}");
            }


        }

        // xóa sản phẩm 
        public function deletes($data)
        {
            if (isset($_GET['id'])) {
                # code...
                $id = $_GET['id'];
                settype ($id, "int");
                $this->_del($id);
            }else{
                $_SESSION['error'] = "Sản phẩm không tồn tại";
                rdr_url("../../admin/san-pham/index.php"); 
            }
            
        }

     
        public function _del($id,$rediect = true)
        {

            $data = parent::fetchid('product',$id);
            if(!$data)
            {
                
                $_SESSION['error'] = "Sản phẩm  không tồn tại";
                if($rediect){
                    rdr_url("../../admin/san-pham/index.php");
                }else{
                    return false;
                }
            }
                
            parent::delete('product',$id);

            foreach ($data as $key => $value) {
                # code...
                $link_img = url().'upload/san-pham/'.$value['thunbar'];
            }
            if(file_exists($link_img))
            {
                unlink($link_img);
            }

            $_SESSION['success'] = "Sản phẩn đã được đã được xóa.";
            rdr_url("../../admin/san-pham/index.php"); 
           
        }


        // end class
    }





   $actionProduct = new Product();
    switch($_REQUEST['action']){
        case 'add':
            if($_SERVER['REQUEST_METHOD']=='POST')
                {
                   
                    $actionProduct ->actionAdd($_REQUEST,$_FILES);
                }
        break;
        case 'edit':
            if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    
                    $actionProduct ->actionEdit($_REQUEST,$_FILES);
                }  
            break;
        case 'delete':
                if($_SERVER['REQUEST_METHOD']=='GET')
                {
                    $actionProduct ->deletes($_REQUEST);
                } 
            break;
        
        default:
           
            break;

    }


?>
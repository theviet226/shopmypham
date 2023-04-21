<?php
session_start();
	require_once("../../autoload/autoload.php");
	class Cate
	{
		public $db;
		public function __construct()
		{
			$this->db = new My_Model();

		}
		/*
		*hàm insert vào csdl bảng category
		*/
		public function actionAdd($data,$file)
		{

			$error = array();
			$category = array();
			// kiểm tra giá trị name nhập vào
			if(testInputString($data['name']))
			{
				$category['name'] = testInputString($data['name']);
			}
			else
			{
				$error[] ="name";
			}
			
			
			// kiểm tra giá trị sort_order nhập vào
			if(testInputString($data['sort_order']))
			{
				$category['sort_order'] = testInputString($data['sort_order']);
			}
			else
			{
				$error[] ="sort_order";
			}

			$category['parent_id'] = $data['parent_id'];
			

			$category['created_at'] = get_date();

			if (empty($error)) {
				# code...
				$data_cate = $this->db->fetchwhere("category","name = '".$category['name']."' ");
				if (empty($data_cate)) 
				{
					# code...
					$this->db->insert('category',$category);
					$_SESSION['success'] = "Insert thành công danh mục.";
					rdr_url("../../admin/danh-muc/index.php");

				}
				else
				{
					$_SESSION['error'] = "Danh mục đã tồn tại (*).";
					rdr_url("../../admin/danh-muc/index.php?action=add");
				}	
			}
			else
			{
				$_SESSION['error'] = "Bạn cần nhập đầy đủ các trường có dấu (*).";
				rdr_url("../../admin/danh-muc/index.php?action=add");
			}
		}

		// end fuction actionAdd

		public function actionEdit($data)
		{

			$error = array();
			$category = array();
			$id = $data['id'];
			// kiểm tra giá trị name nhập vào
			if(testInputString($data['name']))
			{
				$category['name'] = testInputString($data['name']);
			}
			else
			{
				$error[] ="name";
			}
			
		

			// kiểm tra giá trị sort_order nhập vào
			if(testInputString($data['sort_order']))
			{
				$category['sort_order'] = testInputString($data['sort_order']);
			}
			else
			{
				$error[] ="sort_order";
			}
			
			$category['parent_id'] = $data['parent_id'];
			
			$category['created_at'] = get_date();

			if (!empty($file['image']['name'])) {
                 # code...
                $category['image'] =  uploadImage($file,'category','edit');
             }
			if (empty($error)) 
			{
				# code...
				$this->db->update('category',$category,array("id" => $id));
				$_SESSION['success'] = "Update thành công danh mục.";
				rdr_url("../../admin/danh-muc/index.php");	
			}
			else
			{
				$_SESSION['error'] = "Bạn cần nhập đầy đủ các trường có dấu (*).";
				rdr_url("../../admin/danh-muc/index.php?action=edit&{$id}");
			}
		}


		public function delete($data)
		{
			if (isset($_GET['id'])) {
				# code...
				$id = $_GET['id'];
				settype ($id, "int");
				$this->_del($id);
			}else{
				$_SESSION['error'] = "Danh mục không tồn tại";
				rdr_url("../../admin/danh-muc/index.php");	
			}
			
		}


		public function _del($id,$rediect = true)
		{
			$data_cate = $this->db->fetchwhere("category","id = ".$id );

			if( empty($data_cate) ) {
				$_SESSION['error'] = "Không tồn tại danh mục";
				rdr_url("../../admin/danh-muc/index.php");
			}
			
			$this->db->delete('category',$id);
			$_SESSION['success'] = "Danh mục đã được xóa.";
			rdr_url("../../admin/danh-muc/index.php");	
				
			
		}


	}

	$actionCate = new Cate();
	switch($_REQUEST['action']){
		case 'add':
      		if($_SERVER['REQUEST_METHOD']=='POST')
				{
					$actionCate ->actionAdd($_REQUEST,$_FILES);
				}
        break;
	    case 'edit':
	    	if($_SERVER['REQUEST_METHOD']=='POST')
				{

					$actionCate ->actionEdit($_REQUEST,$_FILES);
				}  
	        break;
	    case 'delete':
	        	if($_SERVER['REQUEST_METHOD']=='GET')
				{
					$actionCate ->delete($_REQUEST);
				} 
	        break;
	    
	    
	    default:
	       
	        break;

	}
		
 ?>
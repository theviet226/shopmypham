<?php
session_start();
	require_once("../../autoload/autoload.php");

	$db = new My_Model();

	/*
		Xử lý giỏ hàng .

	*/

	if(validate_id($_REQUEST['id']) && isset($_REQUEST['id']))
	{
		$id = validate_id($_REQUEST['id']);

		
	}
	

	if(isset($_REQUEST['action']))
	{
		$action = $_REQUEST['action'];
	}

	switch ($action) {
		case 'addtocart':
			# code...

			/*
				kiểm tra xem sản phẩm có tồn tại hay không

			*/
				
				if(isset($id)){

					
					
					$product = $db->fetchwhere('product','id = '.$id);

					
					

					if(empty($product))
					{
						$_SESSION['error'] ="Sorry . Sản phẩm không thể thêm vào giỏ hàng ";
						rdr_url('../../site/gio-hang');
						
					}

					if(isset($_SESSION['cart'][$id]))
					{
						
						foreach($product as $value){
							$product_id 	= $id;
							$qty 			= $_SESSION['cart'][$id]['qty'] + 1;
							$name 			= $value['name'];
							$image 			= $value['thunbar'];
							$price 			= $value['price'];
							$amount			= $qty * $price;
							
						}

					}else{
						// tạo mới giỏ hàng

						foreach($product as $value){
							$product_id 	= $value['id'];
							$qty 			= isset($_REQUEST['qty'])?$_REQUEST['qty'] : 1;
							$name 			= $value['name'];
							$image 			= $value['thunbar'];
							$price 			= $value['price'];
							$amount			= $qty * $price;
							
						}
						
					}
				}else
				{
					rdr_url('home');
				}

				$_SESSION['cart'][$id]['product_id'] = $product_id;
				$_SESSION['cart'][$id]['qty'] = $qty;
				$_SESSION['cart'][$id]['name'] = $name;
				$_SESSION['cart'][$id]['price'] = $price;
				$_SESSION['cart'][$id]['image'] = $image;
				$_SESSION['cart'][$id]['amount'] = $amount;


				rdr_url('../../site/gio-hang');
				
			    break;
		
		case 'delete-cart':
			# code...
			unset($_SESSION['cart'][$id]);
			rdr_url('../../site/gio-hang');

			break;

		case 'update_cart':
			# code...
			$id = $_GET['key'];
			$num = $_GET['qty'];
			if(isset($_SESSION['cart'][$id]))
			{
				$_SESSION['cart'][$id]['qty'] =  $num;
				$_SESSION['cart'][$id]['amount'] = $_SESSION['cart'][$id]['price'] * $num;
			}
			rdr_url('../../site/gio-hang');
			break;
		case 'delete-cart-all':

		unset($_SESSION['cart']);
		rdr_url('../../site/gio-hang');
		break;

		}

	
 ?>

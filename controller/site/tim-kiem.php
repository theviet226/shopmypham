<?php
session_start();
  require_once("../../autoload/autoload.php");
  
/**
* 
*/


class SearchKeyController extends My_Model 
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	 public function searchProduct($data)
    {
        $key = $data['search'];
        $key = trim($key);

        $where = "name LIKE '%$key%' OR price LIKE '%$key%'";
        return $data = parent::fetchwhere('product',$where);
    }

}
$searchKey = new SearchKeyController();

if($_SERVER['REQUEST_METHOD'] == 'GET')
{

	$seach_product = $searchKey ->searchProduct($_REQUEST);

}

redirect_to('../index.php');

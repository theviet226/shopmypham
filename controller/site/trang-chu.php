<?php 

class ShowProduct
{
    public $db;
    public  function __construct()
    {
      # code...
      $this->db = new My_Model();
    }
    public function show_list($start,$display)
    {
      $data = $this->db ->fetchAllpagina('product' , $start,$display);
      return $data;
    }
    public function countid()
    {
       $data = $this->db->countTable('product');
       return $data;
    }

    public function showProductBuyed()
    {
    	$where = ' 1 ORDER BY buyed DESC LIMIT 0,12';
    	return $this->db->fetchwhere('product',$where);
    }

}

  	$showProduct = new ShowProduct();

	$display = 12;
	$start   = (isset($_GET['s']) && filter_var($_GET['s'],FILTER_VALIDATE_INT,array('min_range'=>1)))?$_GET['s']:0;
	$record  = $showProduct ->countid();
	$newProduct    = $showProduct ->show_list($start,$display);

	$productBuyed = $showProduct -> showProductBuyed();

	
?>
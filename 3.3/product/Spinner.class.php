<?php 
namespace product;

class Spinner extends Product 
{
	public $type;
		
	function __construct($name, $type, $price, $title){
		parent::__construct($name, $price, $title);
		$this->type = $type;
	}	
}

 ?>
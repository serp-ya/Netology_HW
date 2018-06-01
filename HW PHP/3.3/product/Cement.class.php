<?php 

namespace product;

class Cement extends Product 
{
	public $weight;
	function __construct($name, $weight, $price, $title) {
		parent::__construct($name, $price, $title);
		$this->weight = $weight;
	}	
}


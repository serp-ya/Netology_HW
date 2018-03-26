<?php 
namespace product;

 abstract class Product implements \Musthave {
	
	public $value = 10;
	public $name;
	public $price;
	public $title;


    public function __construct($name, $price, $title){
        $this->name = $name;
		$this->price = $price;
		$this->title = $title;
		
    }

	function getDiscount(){
		if ($this->weight) {
			if ($this->weight > 10) {
				return round($this->price -($this->price * $this->value / 100) );
			}else{
				return $this->price;
			}
			
		}elseif($this->weight == null){
			return round($this->price -($this->price * $this->value / 100) );
		}
	}

	function getDeliverPrice(){
		if ($this->getDiscount() == $this->price){
			return "250 руб.";
		}else{
			return "300 руб.";
		}

	} 

	function getFullDescription(){
		echo "{$this->name} {$this->type} цена  {$this->getDiscount()} руб.  <br/> {$this->title}  <br/> цена доставки {$this->getDeliverPrice()}";
	}  
	
}

 ?>
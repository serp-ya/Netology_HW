<?php 
interface MustHave
{
    function getFullDescription();
    function getDeliverPrice();
    function getDiscount();
}

trait Construct
{
    function __construct($name, $type, $price, $title)
    {
        parent::__construct($name, $price, $title);
        $this->type = $type;
    }	
} 

class Product implements MustHave {
	
    protected $value = 10;

       public function __construct($name, $price, $title)
       {
        $this->name = $name;
		$this->price = $price;
		$this->title = $title;		
       }

    function getDiscount()
    {
        if ($this->weight) {
            if ($this->weight > 10) {
                return round($this->price -($this->price * $this->value / 100) );
            }else {
                return $this->price;
            }
			
        }elseif($this->weight == null) {
		    return round($this->price -($this->price * $this->value / 100) );
        }
    }

    function getDeliverPrice()
    {
        if ($this->getDiscount() == $this->price) {
            return "250 руб.";
        }else {
            return "300 руб.";
        }
    } 

    function getFullDescription()
    {
        echo "{$this->name} {$this->type} цена  {$this->getDiscount()} руб.  <br/> {$this->title}  <br/> цена доставки {$this->getDeliverPrice()}";
    }  
}

class SmartPhone extends Product  
{
    public $type;		
    use Construct;
}

echo "<p>";
$sony = new SmartPhone("Sony ", "Xperia ", "20000  ", "Сделан в Южной Корее" );
$sony -> getFullDescription();
echo "</p>";

echo "<p>";
$Iphone = new SmartPhone ("Iphone ", "6 ", "40000  ", "Сделан в Китае");
$Iphone -> getFullDescription();
echo "</p>";

class Spinner extends Product 
{
    public $type;		
    use Construct;
}

echo "<p>";
$spiner1 = new Spinner("Спинер ", "с двумя лопастями ", "700  ", "Сделан в Китае" );
$spiner1 -> getFullDescription();
echo "</p>";

echo "<p>";
$spiner2 = new Spinner ("Спинер  ", "трехлопастевый ", "1000 ", "Сделан во Вьетнаме");
$spiner2 -> getFullDescription();
echo "</p>";

class Cement extends Product 
{
    public $weight;
	
    function __construct($name, $weight, $price, $title)
    {
        parent::__construct($name, $price, $title);
        $this->weight = $weight;		
    }	
}

echo "<p>";
$cement1 = new Cement("Цемент (15 кг) ", "15 кг ", "5000  ", "Сделан в Германии" );
$cement1 -> getFullDescription();
echo "</p>";

echo "<p>";
$cement2 = new Cement ("Цемент (5 кг) ", "5 кг ", "2000  ", "Сделан во РФ");
$cement2 -> getFullDescription();
echo "</p>";







 
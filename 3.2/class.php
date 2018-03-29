<?php 

interface FirstInterface
{	
    public function getParam();	
}

class Object implements FirstInterface
{
    public $name;	
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getParam()
    {
        $info =  "{$this->name} ";
        return $info;
    }	
}

?>

<p>Автомобили</p>
<hr/>

<?php 
class Car extends Object
{
    public $model;
    public $color;

    public function __construct($name, $model, $color)
    {
        parent::__construct($name);
        $this->model = $model;
        $this->color = $color;
    }

    public function getParam()
    {
        $info = parent::getParam();
        $info .= "{$this->model} "."{$this->color}". "<br/>";
        return $info;
    }
}

$audi = new Car("Ауди", "Q7", "Красный");
echo $audi->getParam();

$honda = new Car("Хонда", "Civic", "Синий");
echo $honda->getParam();

?>    
<p>Телевизоры</p>
<hr/>

<?php
class Tv extends Object
{	
    public $quality;

    public function __construct($name, $quality)
    {
        parent::__construct($name);
        $this->quality = $quality;
    }

    public function getParam()
    {
        $info = parent::getParam();
        $info .= "{$this->quality}". "<br/>";
        return $info;
    }
}

$tv1 = new Tv("LG", "HD");
echo $tv1->getParam();

$tv2 = new Tv("Sony", "FullHD");
echo $tv2->getParam();

?>
 
<p>Шариковая ручка</p>
<hr/>

<?php 
class Pen extends Object
{	
    public $inkColor;
	
    public function __construct($name, $inkColor)
    {
        parent::__construct($name);
        $this->inkColor = $inkColor;
    }

    public function getParam()
    {
        $info = parent::getParam();
        $info .= "{$this->inkColor}". "<br/>";
        return $info;
    }
}

$pen1 = new Pen("Шариковая ручка ", "красная");
echo $pen1->getParam();

$pen2 = new Pen("Шариковая ручка", "синяя");
echo $pen2->getParam();

?>

<p>Утка</p>
<hr/>

<?php
class Duck extends Object
{	
    public $color;
	
    public function __construct($name, $color)
    {
        parent::__construct($name);
        $this->color = $color;
    }

    public function getParam()
    {
        $info = parent::getParam();
        $info .= "{$this->color}". "<br/>";
        return $info;  
    }
}

$duck1 = new Duck("Домашняя", "белая");
echo $duck1->getParam();

$duck2 = new Duck("Дикая", "серая");
echo $duck2->getParam();

?>

<p>Товар</p>
<hr/>

<?php
class Item extends Object
{
    public $price;

    public function __construct($name, $price)
    {
        parent::__construct($name);
        $this->price = $price;
    }

    public function getParam()
    {
        $info = parent::getParam();
        $info .= "{$this->price}". "<br/>";
        return $info;
    }
}

$item1 = new Item("Молоко", "54 руб.");
echo $item1->getParam();

$item2 = new Item("Хлеб", "25 руб.");
echo $item2->getParam();

?>
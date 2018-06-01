<p>Автомобили</p>
<hr/>

<?php 
class Car
{
	public $make;
	public $model;
	public $color;
	
	public function setParam($valueMake, $valueModel, $valueColor)
	{
		$this->make = $valueMake;
		$this->model = $valueModel;
		$this->color = $valueColor;
	}

	public function getParam()
	{
        echo "Производитель:". " " .$this->make . "<br/>" ;
        echo "Модель:". " " .$this->model. "<br/>";
        echo "Цвет:". " " .$this->color. "<br/>" . "<br/>";
	}
		
}

$audi = new Car;

echo $audi->setParam("Ауди", "Q7", "Красный");
echo $audi->getParam();

$honda = new Car;

echo $honda->setParam("Хонда", "Civic", "Синий");
echo $honda->getParam();

?>

<p>Телевизоры</p>
<hr/>

<?php

class TV
{
	
	public $model;
	public $quality;

	public function setParam($valueModel, $valueQual)
	{
		
		$this->model = $valueModel;
		$this->quality = $valueQual;
	}

	public function getParam()
	{
        echo "Модель:". " " .$this->model. "<br/>";
        echo "Качество:". " " .$this->quality. "<br/>" . "<br/>";
	}
}

$tv1 = new TV;

echo $tv1->setParam("LG", "HD");
echo $tv1->getParam();

$tv2 = new TV;

echo $tv2->setParam("Sony", "FullHD");
echo $tv2->getParam();

 ?>
 
 <p>Шариковая ручка</p>
<hr/>

<?php

class Pen
{
	public $inkColor;
	public $type;

	public function setParam($valueInkColor, $valueType)
	{
		$this->inkColor = $valueInkColor;
		$this->type = $valueType;
	}

	public function getParam()
	{   
        echo "Цвет чернил:". " " .$this->inkColor. "<br/>";
        echo "Тип:". " " .$this->type. "<br/>" . "<br/>";
	}
}

$pen1 = new Pen;

echo $pen1->setParam("Красный", "Автоматическая");
echo $pen1->getParam();

$pen2pen3 = new Pen;

echo $pen2pen3->setParam("Синий", "Не автоматичсекая");
echo $pen2pen3->getParam();

?>

<p>Утка</p>
<hr/>

<?php

class Duck
{
	
	public $color;
	public $type;

	public function setParam($valueColor, $valueType)
	{
		
		$this->color = $valueColor;
		$this->type = $valueType;
	}

	public function getParam()
	{  
        echo "Цвет :". " " .$this->color. "<br/>";
        echo "Тип:". " " .$this->type. "<br/>" . "<br/>";
	}
}

$duck1 = new Duck;

echo $duck1->setParam("Белая", "Домашняя");
echo $duck1->getParam();

$duck2 = new Duck;

echo $duck2->setParam("Серая", "Дикая");
echo $duck2->getParam();

?>


<p>Товар</p>
<hr/>

<?php

class Item
{
	
	public $name;
	public $price;

	public function setParam($valueName, $valuePrice)
	{		
		$this->name = $valueName;
		$this->price = $valuePrice;
	}

	public function getParam()
	{   
        echo "Название товара :". " " .$this->name. "<br/>";
        echo "Цена". " " .$this->price. "<br/>" . "<br/>";
	}
}

$item1 = new Item;

echo $item1->setParam("Молоко", "54 руб.");
echo $item1->getParam();

$item2 = new Item;

echo $item2->setParam("Хлеб", "25 руб.");
echo $item2->getParam();

?>
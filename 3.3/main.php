<?php 
include 'core/autoload.php';


$Sony = new \product\SmartPhone("Sony ", "Xperia ", "20000  ", "Сделан в Южной Корее");
$Iphone = new \product\SmartPhone("Iphone ", "6 ", "40000  ", "Сделан в Китае");


$spiner1 = new \product\Spinner("Спинер ", "с двумя лопастями ", "700  ", "Сделан в Китае" );
$spiner2 = new \product\Spinner ("Спинер  ", "трехлопастевый ", "1000 ", "Сделан во Вьетнаме");

$cement1 = new \product\Cement("Цемент (15 кг) ", "15 кг ", "5000  ", "Сделан в Германии" );
$cement2 = new \product\Cement ("Цемент (5 кг) ", "5 кг ", "2000  ", "Сделан во РФ");


/*
echo "<p>";
$Sony -> getFullDescription();
echo "</p>";

echo "<p>";
$Iphone -> getFullDescription();
echo "</p>";

echo "<p>";
$spiner1 -> getFullDescription();
echo "</p>";

echo "<p>";
$spiner2 -> getFullDescription();
echo "</p>";


echo "<p>";
$cement1 -> getFullDescription();
echo "</p>";

echo "<p>";
$cement2 -> getFullDescription();
echo "</p>";
*/

$order = new \order\order();

$order->addProduct($Sony); //добавляю товар в корзину
$order->addProduct($Iphone); //добавляю товар в корзину
$order->addProduct($spiner1); //добавляю товар в корзину
$order->addProduct($spiner2); //добавляю товар в корзину
$order->addProduct($cement1); //добавляю товар в корзину
$order->addProduct($cement2); //добавляю товар в корзину

echo '<br>';
 
$order->showAllProduct();
 
echo '<br>';
echo '<br>';
echo 'На сумму: ' . $order->sum();


<?php 
namespace order;

final class Order extends \basket\basket {
    public function showAllProduct() { //показать список продуктов и количество
        $resCountProduct = 0;   
        foreach ($this->countProduct as $key => $value) {
            echo 'Товар ' . $value->name . $value->type  .', количество: ' . $value->numberProduct . '<br>';   
            $resCountProduct = $resCountProduct + $value->numberProduct;        
        }    
        echo 'Общее количество товаров: ' . $resCountProduct;
    }
}





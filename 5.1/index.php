<?php 

require "./vendor/autoload.php";

$api = new \Yandex\Geo\Api();

$api->setQuery($_POST['address']);

$api
    ->setLimit(5) // кол-во результатов
    ->setLang(\Yandex\Geo\Api::LANG_RU) // локаль ответа
    ->load();

$response = $api->getResponse();
$count =$response->getFoundCount(); // кол-во найденных адресов
$response->getQuery(); // исходный запрос
$response->getLatitude(); // широта для исходного запроса
$response->getLongitude();

$collection = $response->getList();
foreach ($collection as $item) {
    $address = $item->getAddress(); // вернет адрес
    $shir = $item->getLatitude(); // широта
    $dolg = $item->getLongitude(); // долгота
    $item->getData(); // необработанные данные
}

 ?>



 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 	<link rel="stylesheet" href="style.css">
 	<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">
    </script>
 	<title>Document</title>
 </head>
 <body class="container">

 	<h1>Поиск координт по адресу</h1>

 	<form method="POST">
  		<div class="form-group">
    		<label >Введите адрес</label>
    		<input class="form-control" type="text" name="address">
  		</div>
  	<button type="submit" class="btn btn-primary">Найти</button>
	</form>

 	<h2>Найденные результаты:</h2>

        <table class="table">
          <tr>
            <th>Адрес</th>
            <th>Координаты</th>
          </tr>
          <?php
          $i = 0;
          foreach ($collection as $item) :
          ?>
            <tr>
              <td>
                <a href="">
                    <?= $address ?>   
                </a>
              </td>
              <td>Широта:<?= $shir; ?>, Долгота: <?= $dolg; ?> </td>
            </tr>

          <?php
          $i++;
          endforeach; ?>
        </table>

 <div id="map" style="width: 600px; height: 400px"></div>



 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

 <script type="text/javascript">
    ymaps.ready(init);
    var myMap,
        myPlacemark;

    function init(){     
        myMap = new ymaps.Map("map", {
            center: [<?= $shir; ?>, <?= $dolg; ?>],
            zoom: 10
        });

        myPlacemark = new ymaps.Placemark([<?= $shir; ?>, <?= $dolg; ?>], { 
            hintContent: '<?= $address; ?>', 
            balloonContent: '<?= $address; ?>' 
        });

        myMap.geoObjects.add(myPlacemark);
    }
 </script>
 </body>
 </html>
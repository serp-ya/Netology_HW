<?php

require "core/core.php";

$searchResults = new SearchResults(getParam('address'), getParam('addressID')); // создаем объект
$lastSearchID = $searchResults->getLastSearchID(); // ID элемента, который будет отображаться на карте
$resultForMap = $searchResults->getItemByID($lastSearchID); // элемент, который будет отображаться на карте
$searchQuery = (getParam('address') !== null OR getParam('addressID') !== null) ?
    $searchResults->getSearchQuery() : ''; // поисковой запрос


    ?>

    <!DOCTYPE html>
    <html lang="ru">
    <head>
      <title>Домашнее задание</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">
      </script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
      <link rel="stylesheet" href="./css/styles.css">
    </head>
    <body>
      <h1>Определение точки на карте по введенному адресу</h1>
      <div class="form-container">

        <form class="form form-group" method="POST">
          <h2>Введите адрес:</h2>
          <input class="text_input form-control" type="text" name="address"
          value="<?= $searchQuery ?>"/>
          <input class="mt-2 btn btn-primary" type="submit" name="find" value="Найти"/>
        </form>

        <?php
        if ($searchResults->getFoundCount() > 0) : ?>

          <h2>Найденные результаты:</h2>
          <table>
            <tr>
              <th>Адрес</th>
              <th>Координаты</th>
            </tr>

            <?php
            $i = 0;
            foreach ($searchResults->getList() as $item) :
              ?>

              <tr>
                <td>
                  <a href="?addressID=<?= $i ?>">
                    <?= $i === $lastSearchID ? '<strong>' : '' ?>
                    <?= $item->getAddress() ?>
                    <?= $i === $lastSearchID ? '</strong>' : '' ?>
                  </a>
                </td>
                <td>Широта:<?= $resultForMap->getLatitude(); ?>, Долгота: <?= $resultForMap->getLongitude(); ?></td>
              </tr>

              <?php
              $i++;
            endforeach; ?>
          </table>

          <?php if (!empty($resultForMap)) : ?>

            <script type="text/javascript">
              ymaps.ready(init);
              var myMap, myPlacemark;

              function init() {
                myMap = new ymaps.Map("map", {
                  center: [<?= $resultForMap->getLatitude() ?>, <?= $resultForMap->getLongitude() ?>],
                  zoom: 10
                });
                myPlacemark = new ymaps.Placemark([<?= $resultForMap->getLatitude() ?>, <?= $resultForMap->getLongitude() ?>], {
                  hintContent: '<?= $resultForMap->getAddress() ?>',
                  balloonContent: '<?= $resultForMap->getAddress() ?>'
                });

                myMap.geoObjects.add(myPlacemark);
              }
            </script>

            <div id="map" style="width: 600px; height: 400px"></div>
          <?php endif; ?>
        <?php endif; ?>

      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    </body>
    </html>

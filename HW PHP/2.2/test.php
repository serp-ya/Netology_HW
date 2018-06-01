<?php

ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();
$testing = null;
$testid = null;
if(isset($_GET['testid'])) {
  $testJSON =  file_get_contents('tests/'. 'test' . $_GET['testid'] . '.json');
  $tests = json_decode($testJSON, 'true');
  $_SESSION['test'] = $tests;
  $testing = true;
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Форма теста</title>
    <style media="screen">
      form, h1, a {
        margin: 10px auto;
        padding: 0 25% 0;
      }
      fieldset {
        margin: 10px auto;
      }
      input[value="Отправить"] {
        margin: 10px auto;
      }
    </style>
</head>
<body>
  <h1>Ответьте на следющие вопросы</h1>
  <?php if ($testing == true):?>
  <?php foreach ($tests as $key => $test):?>
  <form action="test.php" method="POST">
    <fieldset>
      <legend><?php echo $test['q'];?></legend>
      <?php foreach ($test as $key2 => $value2):?>
      <?php	if (($key2 !== 'q') && ($key2 !== 'answer')):?>
      <label><input type="radio" name="<?php echo $key;?>" value="<?php echo $key2;?>"><?php echo $value2;?></label>
      <?php endif;?>
      <?php endforeach;?>
    </fieldset>
  <?php endforeach;?>
    <input value="Отправить" type="submit">
  <?php endif;?>
  </form>
  <?php
    if (isset($_POST[0])) {
        $tests = $_SESSION['test'];
        foreach ($tests as $key => $test) {
            $num = $key + 1;
            if ($_POST[$key] == $test['answer']) {
                echo "Ответ на ".$num." вопрос верен."."\n";
            }
            else {
                echo "Ответ на ".$num." вопрос не верен."."\n";
            }
        }
    }
   ?>
  <p><a href="list.php">К списку загруженных тестов</a></p>
  <p><a href="admin.php">К форме загрузки тестов</a></p>
</body>
</html>

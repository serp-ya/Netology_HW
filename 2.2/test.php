<?php 
$a = $_GET['testname'];
$file = file_get_contents($a); 
$fileDecode = json_decode($file, true); 
 
/*
echo '<pre>';
var_dump($file);
echo '</pre>';

echo '<pre>';
print_r($fileDecode);
echo '</pre>';
*/

//Выполянем проверку
$ot = 0;
$not = 0;
if (isset($_POST)) {
	if ($_POST[a1] == r){$ot++;} else {$not++;}
      if ($_POST[a2] == r){$ot++;} else {$not++;}
      if ($_POST[a3] == r){$ot++;} else {$not++;}

}

  


     
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Тестирование</title>
</head>
<body>
	<p>Решите тест:</p>
<form method="POST">
	
		<?php foreach ($fileDecode as  $value) { ?>
		
		<fieldset>

		<legend><?= $label = $value['question'] ?></legend>
				
				<?php foreach ($value['input'] as $key => $it) { ?>
					<input type="radio" name="<?php echo $it['name']?>" value="<?php echo $it['value']?>">
				<?= $it['answer'] ?>
				<?php } ?>
		
		</fieldset>
		
		<?php }?>
		
		<input type="submit" value="Проверить">
	
</form>
<p>Правильных ответов: <?php echo $ot; ?></p>
<p>Неправильных ответов: <?php echo $not; ?></p>
</body>
</html>
<?php 


// полчение теста из list.php
$a = $_GET['testname'];
$file = file_get_contents($a); 
$fileDecode = json_decode($file, true);


//проверка на прохождение теста
$var = empty($_POST);

$ot=0;
$i=1;

if ($var == true) {
	echo "Вы еще не прошли тест";
	
}else{
	foreach ($fileDecode as $value) {
		foreach ($value['input'] as $key => $it) {
			if ($_POST[a.$i] == 'r') {
				$ot++;
				$i++;
			}
		}

	}
	echo"<center>Вы прошли тест на <strong>$ot</strong> балла </center>";
} 



 
/*
echo '<pre>';
var_dump($file);
echo '</pre>';

echo '<pre>';
print_r($fileDecode);
echo '</pre>';
 
*/

     
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
</body>
</html>

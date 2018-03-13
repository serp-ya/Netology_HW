<?php 





// полчение теста из list.php
if (file_exists($_GET['testname'])) {
	$a = $_GET['testname'];
   $file = file_get_contents($a);
   $fileDecode = json_decode($file, true); 

}else{
	
	header("HTTP/1.1 404 Not Found");
    echo "Not found";
    die();
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
<form action="result.php" method="POST">
	
		<?php foreach ($fileDecode as  $value) { ?>
		
		<fieldset>

		<legend><?= $label = $value['question'] ?></legend>
				
				<?php foreach ($value['input'] as $key => $it) { ?>
					<input type="radio" name="<?php echo $it['name']?>" value="<?php echo $it['value']?>">
				<?= $it['answer'] ?>
				<?php } ?>
		
		</fieldset>
		
		<?php }?>
		<p>Введите ваше имя</p>
		<input type="text" name="name">
		<input type="submit" value="Получить сертификат">
		
		
	
</form>

	
</body>
</html>

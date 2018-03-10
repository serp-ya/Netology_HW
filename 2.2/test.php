<?php 
$a = $_GET['testname'];
$file = file_get_contents($a); 
$fileDecode = json_decode($file, true); 
 
/* 
echo '<pre>';
var_dump($file);
echo '</pre>';
 
echo '<pre>';
var_dump($fileDecode);
echo '</pre>';
*/

$label = $fileDecode['question'];
$var = $fileDecode['input'];

$ot = 0;
$not = 0;

if ($_POST[a1] === 'r'){$ot++;} else {$not++;}
     
?>


<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>Решите пример</p>
<form  method="POST">
	<fieldset>
		<legend><?= $label ?></legend>
		<?php foreach ($var as  $value['name']) {
		     ?>
			<label >
			<input type="radio" name="a1" value="<?php echo $value['name']['value']?>">
			<?= $value['name']['name'] ?>
		
    		</label>

			<?php  }?>
		
	</fieldset>

    <button type="submit">Проверить</button>

</form>

<p>Правильных ответов: <?php echo $ot; ?></p>
<p>Неправильных ответов: <?php echo $not; ?></p>

</body>
</html>
<?php 
session_start();


if (empty($_SESSION)) {

	header('HTTP/1.0 403 Forbidden');
	echo 'Вы не авторизованны!';
	echo "<a href= 'index.php'> Авторизоваться </a>";
	 
	die();
}



if ($_SESSION['guest']) {

	echo "Привет" . " " . $_SESSION['guest'];
	
}elseif ($_SESSION['user']) {
	echo "Привет" . ' ' . $_SESSION['user']['username']; ?>
	<br>
	<a href="admin.php">Загрузить тест</a>
	
	

<?php }?>

<br>

<a href="logout.php">Exit</a>




 
 
<p>Список тестов:</p>
<?php
foreach (glob("tests/*.json") as $i => $filename) { 
	
	$name = basename($filename);

?>


<?php if ($_SESSION['guest']) {?>
	<label ><a href="test.php?testname=<?= $name ?>">Выбрать тест</a> <?= ++$i?></br></label>

<?php }else{?>
 <label >
 	<a href="test.php?testname=<?= $name ?>">Выбрать тест</a> <?= ++$i?>
    <a href="del_test.php?testname=<?= $name ?>">Удалить тест</a> </br>
</label>

<?php } ?>

<?php }?>













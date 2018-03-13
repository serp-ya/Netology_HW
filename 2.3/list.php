
<p>Список тестов:</p>
<?php
foreach (glob("tests/*.json") as $i => $filename) {
	$name = basename($filename);?>


	

<label ><a href="test.php?testname=<?= $name ?>">Выбрать тест</a> <?= ++$i, "</br>" ?> </label>
    
<?php }?>






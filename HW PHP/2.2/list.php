
<p>Список тестов:</p>
<?php
foreach (glob("tests/*.json") as $i => $filename) {
  $name = basename($filename);?>
  

<label ><a href="test.php?testid=<?= $i+1 ?>">Выбрать тест</a> <?= ++$i, "</br>" ?> </label>
    
<?php }?>






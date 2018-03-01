<?php

  $data = file_get_contents('contacts.json');
  $contacts = json_decode($data,true);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Телефонная книга</title>
</head>
<body>
	<table border="1">
		<tr>
			<th>Ф.И.О.</th>
			<th>Адресс</th>
			<th>Номер телефона</th>
		</tr>

		<?php foreach($contacts as $value){?>
		<tr>
			<td><?=  $value['firstName']. ' ' .$value['lastName']?></td>
			<td><?= 'г.' . $value['address']['city']. ', ' . 'ул.' . $value['address']['streetAddress']. ', ' . 'д.' . $value['address']['homeNumber']?></td>
			<td><?= $value['phoneNumbers'][0] . "<br/>" . $value['phoneNumbers'][1]?></td>
			
			
		</tr>
		<?php }?>
	</table>
	
</body>
</html>
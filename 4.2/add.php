<?php 
header('Location: index.php', true, 302 );
include_once 'config.php';
include_once 'change.php';

if (!empty($_POST['description'])) {
	$description = $_POST['description'];
	$db->exec("INSERT INTO TODO (description, status) VALUES ('".$description."', 'В процессе')");
}




<?php 
session_start();

$ot = 0;

	
    if ($_POST[a1] == r){$ot++;} 
    if ($_POST[a2] == r){$ot++;} 
    if ($_POST[a3] == r){$ot++;} 
    


if ($_SESSION['guest']) {

	$name = $_SESSION['guest'];
	
}elseif ($_SESSION['user']) {
	$name = $_SESSION['user']['username'];
}

$result = $_POST['result'];
$im =  imagecreatefrompng('img/sert.png');

$orange = imagecolorallocate($im, 238,122,28);

$font = __DIR__.'/times.ttf';
imagettftext($im, 40, 0, 400, 270, $orange, $font, $name);
imagettftext($im, 40, 0, 480, 520, $orange, $font, $ot);
header("Content-type: image/png");
imagepng($im);
imagedestroy($im);

 ?>

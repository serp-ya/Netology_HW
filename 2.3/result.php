<?php 
define(RIGHT_ANSWER, 'r');

$ot = 0;

if ($_POST[a1] == RIGHT_ANSWER)
	$ot++;
 

if ($_POST[a2] == RIGHT_ANSWER)
	$ot++;


if ($_POST[a3] == RIGHT_ANSWER)
	$ot++;

    




$name = $_POST['name'];
$result = $_POST['result'];
$im =  imagecreatefrompng('img/sert.png');

$orange = imagecolorallocate($im, 238,122,28);

$font = __DIR__.'/times.ttf';
imagettftext($im, 40, 0, 400, 270, $orange, $font, $name);
imagettftext($im, 40, 0, 480, 520, $orange, $font, $ot);
header("Content-type: image/png");
imagepng($im);
imagedestroy($im);

 

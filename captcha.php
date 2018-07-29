<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 29/07/2018
 * Time: 12:48 PM
 */

session_start();
$random_number = rand(1000,9999);
$_SESSION['randomnr2'] = md5($random_number);
$image = imagecreatetruecolor(130,60);

$white=imagecolorallocate($image, 255, 255, 255);
$grey = imagecolorallocate($image, 128, 128, 128);
$black = imagecolorallocate($image, 0, 0, 0);
$font = __DIR__."/static/fonts/AbrilFatface-Regular.ttf";

imagefilledrectangle($image, 0, 0, 200, 35,$black);
imagettftext($image, 35, 0, 22, 35, $grey, $font, $random_number);
imagettftext($image, 35, 0, 10, 40, $white, $font, $random_number);

header("Expires: Wed, 1 Jan 1997 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header ("Content-type: image/gif");
imagegif($image);
imagedestroy($image);
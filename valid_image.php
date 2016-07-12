<?php
session_start(); 
$select_pic = rand(1,4);
$kartinka = imagecreatefrompng("images/capcha/$select_pic.png");
$_SESSION['code'] = rand(10000,99999);
$bg = imagecolorallocate($kartinka, 240, 240, 240); 
$textcolor = imagecolorallocate($kartinka, 0, 0, 0); 
imagestring($kartinka, 5, 22, 0, $_SESSION['code'], $textcolor); 
header("Content-type: image/png");
imagepng($kartinka);
?> 
<?php
session_start();

$kod=substr(md5(mt_rand(0,9999999)),0,6);

$_SESSION["kod"]=$kod;

header('Content-type: image/png');

$resim=imagecreate(100,50);

$arka_renk=imagecolorallocate($resim,234,236,25);
$yazi_renk=imagecolorallocate($resim,47,47,42);

$nokta_renk=imagecolorallocate($resim,rand(0,225),rand(0,225),rand(0,225));

for ($i=0; $i<500; $i++) :
imagesetpixel($resim,rand()%100,rand()%50,$nokta_renk);
endfor;

imagestring($resim,35,20,20,$kod,$yazi_renk);
imagepng($resim);
imagedestroy($resim);


?>
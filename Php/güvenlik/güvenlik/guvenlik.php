<?php
header("Content-type: image/png");
$resim = imagecreatetruecolor(80,30);//resim cerceve kenarlarını belirledim.
$kirmizi= imagecolorallocate($resim, 255, 0, 0);
$beyaz = imagecolorallocate($resim, 255, 255, 255);
$siyah = imagecolorallocate($resim, 0, 0, 0);
$dizi=array("x","y","O","P","7","8","3","4","6");
$kod="";
for($i=0;$i<4;$i++)
{
$kod.=$dizi[rand(0,count($dizi)-1)];

}
imagestring($resim,5,20,3,$kod,$kirmizi);







imagepng($resim);
imagefill($resim, 0, 0, $siyah );
imagedestroy($resim); 

?>
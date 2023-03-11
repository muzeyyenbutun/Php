<?php
include("ayar.php");
$soru = mysql_fetch_assoc(mysql_query("select * from sorular where id='".$_GET["id"]."'"));
$soru_adi=$soru["soru"];
$ansay = mysql_fetch_assoc(mysql_query("select Count(*) as ans from ip_kontrol where anket_id='".$soru["anket_id"]."'"));
header ("Content-type: image/png");
$w           = 500;
$h           = 250;
$Baslik      = $soru_adi;
$BaslikFont = 3;
$GraphName   = "Ankete Katilanlarin Sayisi / Siklar";
$BoslukLeft = ($w-(($BaslikFont+3)*strlen("$Baslik")))/2;
$BoslukTop   = ($h+(5*strlen("$GraphName")))/2;
$YatayGrid   = 5;
$LeftM       = ($w*(12/100))/2;
$TopM        = ($h*(12/100))/2;
$SutunGen    = $w*6/100;
$sor = mysql_query("select * from siklar where soru_id='$_GET[id]'");
$i=0;
while ($lis = mysql_fetch_array($sor)) {
	$a_sonuc = mysql_fetch_assoc(mysql_query("SELECT Count(*) as sonuc FROM anket_sonuclari where sik_id='".$lis["id"]."'"));
	$Veri[$i]=$a_sonuc["sonuc"];
	$sikadi[$i]=$lis["adi"];
	$i++;
}
$VeriKova = array_values($Veri);
sort($VeriKova);
$Min = $VeriKova[0];
$Max = $VeriKova[11];
$Top = array_sum($Veri);
$Resim = imagecreate($w,$h);
$Siyah       = imagecolorAllocate($Resim, 0, 0, 0);
$Beyaz       = imagecolorallocate($Resim, 255, 255, 255);
$Mavi        = imagecolorallocate($Resim, 100, 100, 255);
$Kirmizi     = imagecolorAllocate($Resim, 255, 0, 0);
$Yesil       = imagecolorAllocate($Resim, 0, 150, 0);
$Gri        = imagecolorAllocate($Resim, 200, 200, 200);
imagefilledrectangle($Resim, 0, 0, $w, $h ,$Beyaz);
imagerectangle($Resim, 0, 0, $w-1, $h-1, $Siyah);
$CAAM = ($h-($TopM*4))/$YatayGrid;
$Cizgi[0] = $TopM*2;
$MaxTemp = $Max;
if(strlen($MaxTemp)>=3):
$CizgiSayim = strrev(substr(strrev("$MaxTemp"), 0, 2));
$WhileGo = 100;
else:
$CizgiSayim = strrev(substr(strrev("$MaxTemp"), 0, 1));
$WhileGo = 10;
endif;
while(intval($CizgiSayim)<$WhileGo)
{
$CizgiSayim++;
$MaxTemp++;
}
$CizgiSayi[0] = $MaxTemp;
for($i=0; $i<=$YatayGrid; $i++)
{
if(empty($CizgiSayi[$i]))
{
$CizgiSayi[$i] = round($MaxTemp*(($YatayGrid-$i)/$YatayGrid));
$Cizgi[$i] = $Cizgi[$i-1]+$CAAM;
}
switch(strlen($CizgiSayi[$i]))
{
case "1" ; $spacer = "   "; break;
case "2" ; $spacer = " "; break;
case "3" ; $spacer = " "; break;
case "4" ; $spacer = ""; break;
}
imageline($Resim,$LeftM*2,$Cizgi[$i], $w-$LeftM, $Cizgi[$i],$Gri);
imagestring($Resim, 2, $LeftM-($LeftM/4), $Cizgi[$i]-7, "$spacer$CizgiSayi[$i]", $siyah);
}
$Sutun = ($w-(3*$LeftM))/12;
$GrafikAlani = round($h-($TopM*4));
$Birim = $GrafikAlani/$MaxTemp;
for($i=0; $i<12; $i++)
{
if($Veri[$i]==$Max) : $Renk = $Kirmizi;
elseif($Veri[$i]==$Min) : $Renk = $Yesil;
else : $Renk = $Mavi;
endif;
$x1 = 2.1*$LeftM+($Sutun*$i);
$y1 = ($TopM*2)+$GrafikAlani-($Birim*$Veri[$i]);
$x2 = $x1+$SutunGen;
$y2 = $h-$TopM*2;
switch(strlen($Veri[$i]))
{
case "1" : $xcarpan = 2.5; break;
case "2" : $xcarpan = 2.475; break;
case "3" : $xcarpan = 2.330; break;
case "4" : $xcarpan = 2.300; break;
}
imagefilledRectangle($Resim, $x1, $y1, $x2, $y2, $Renk);
imageRectangle($Resim, $x1, $y1, $x2, $y2, $Siyah);
imagestring($Resim,2,2.335*$LeftM+($Sutun*$i),$h-(2*$TopM),"$sikadi[$i]",$Siyah);
imagestring($Resim,1,$xcarpan*$LeftM+($Sutun*$i),$y1-9,"$Veri[$i]",$Siyah);
}
imageline($Resim,$LeftM*2,$h-$TopM*2,$w-$LeftM,$h-$TopM*2,$Siyah);
imageline($Resim,$LeftM*2,$TopM,$LeftM*2,$h-$TopM*2,$Siyah);
imagestring($Resim,$BaslikFont,$BoslukLeft+1,(1/$BaslikFont)+3,"$Baslik",$Gri);
imagestring($Resim,$BaslikFont,$BoslukLeft,1/$BaslikFont+2,"$Baslik",$Kirmizi);
imagestring($Resim,1,$LeftM*6, $h-$TopM,"Toplam Ankete Katilanlarin Sayisi = ".$ansay["ans"]."",$Mavi);
imagestringup($Resim,1,3,$BoslukTop,"$GraphName",$Kirmizi); $mysign= "Web Survey 2013 - Batuhan Erhan";
imagestringup($Resim,1,$w-10,$h-(strlen($mysign)*0.2), $mysign,$Gri);
imagepng($Resim);
imagedestroy($Resim);
?>
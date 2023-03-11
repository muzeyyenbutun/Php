<?php
include("ayar.php");
	$konu=$_POST['baslik'];
	$mesaj=$_POST['aciklama'];
	
		if($_POST["gonder"]){
		
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$headers .= 'From: <bilgi@softwareeulproject.com>' . "\r\n";
			$headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";		
			$sor = mysql_query("select * from uyelik where danisman_id='".$y_al["id"]."'");
while ($listele = mysql_fetch_array($sor)) {
				$eposta = $listele["mail"];
			mail($eposta, $konu, $mesaj, $headers);		
			}
			
			echo "Danışmanlığınızı Yaptığınız Kişilere Mail gönderildi.";
		}
?>
<form method="post" enctype="multipart/form-data" name="example" action="<?=$PHP_SELF;?>">
<table width="453" align="center"  cellpadding="3" 
      cellspacing="0" class="liste" id="tablo" 
      style="BORDER-RIGHT: #d1d9e1 1px solid; BORDER-TOP: medium none; BORDER-LEFT: #d1d9e1 1px solid; BORDER-BOTTOM: #d1d9e1 1px solid">

  <tr>
    <td height="16" colspan="2"><div align="center" class="baslik">
      <div align="center" class="tablobaslik">Mail Gönder</div>
    </div></td>
  </tr>
  <tr>
    <td width="125" height="30">Başlık    : </td>
    <td width="289"><input type="text" name="baslik" value="Anketimize Katılmak İstermisiniz"></td>
  </tr>
  <tr>
    <td width="125" height="30">Açıklama    : </td>
    <td width="289"><textarea name="aciklama" cols="45" rows="5">Merhaba
    Anketime Katılmak istermisiniz.
    Anket Linki : softwareeulproject.com/webanket/uindex.php?s=anketdoldur&sa=<?=$_GET["u"];?></textarea></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"><input type="hidden" name="id" value="<?=$_GET["u"]?>" />
      <input type="submit" class="buton" name="gonder" id="gonder" value="Gönder"/>
      </div></td>
  </tr>
</table></form>
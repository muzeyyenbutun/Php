<?php
include("ayar.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Survey 2013</title>
<link href="css/960.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/text.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/login.css" rel="stylesheet" type="text/css" media="all" />
<style type="text/css">
body {
	background-color: #333;
}
</style>
</head>

<body>
<table>
<tr>
<td width="958" rowspan="2">
  <div class="grid_6 prefix_5 suffix_5">
  <?php
  $adi_soyadi=$_POST['adi_soyadi'];
	$numara=$_POST['numara'];
	$bolum_id=$_POST['bolum_id'];
	$yas=$_POST['yas'];
	$mail=$_POST['mail'];
	$sifre=md5($_POST['sifre']);
	$danisman_id=$_POST['danisman_id'];
		if($_POST["add"]){
			$k=mysql_fetch_assoc(mysql_query("select * from uyelik where numara='".$numara."' or mail='".$mail."'"));
			if($k){
				echo "<h1>Kaydınız Alınamadı.Zaten Böyle bir Üye Var.Lütfen Tekrar Deneyiniz.</h1><br>";
				echo "<h3><a href='index.php'>Tekrar Üye Kaydı</a></h3>";
			}else{
		mysql_query("insert into uyelik values (NULL,'".$adi_soyadi."','".$numara."','".$bolum_id."','".$yas."','".$mail."','".$sifre."',0,'".$danisman_id."')")or die(mysql_error());
			echo "<h1>Kaydınız Alınmıştır.Onay Verildiği Zaman Bilgilendirileceksiniz.</h1>";
			}
		}else{
  ?>
   	  <h1>Üye Kayıt Ol</h1>
    	<div id="login">
    	  <!--<p class="tip">You just need to hit the button and you're in!</p>
          <p class="error">This is when something is wrong!</p>        -->
    	 <form method="post" enctype="multipart/form-data" name="example" action="<?=$PHP_SELF;?>">
    	    <p>
    	      <label><strong>Adı Soyadı :</strong>
                <input type="text" name="adi_soyadi" value="<?=$k["adi_soyadi"];?>" class="inputText" id="textfield" />
    	      </label>
  	      </p>
          <p>
    	      <label><strong>Numara :</strong>
                <input type="text" name="numara" value="<?=$k["numara"];?>" class="inputText" id="textfield" />
    	      </label>
  	      </p>
          <p>
    	      <label><strong>Bölüm :</strong>
    	        <select class="inputText" id="textfield" name="bolum_id">
    	          <option value="<?=$list["id"];?>" selected="selected"><?=$list["bolum"];?></option>
<?php
$s = mysql_query("select * from bolum");
while ($lis = mysql_fetch_array($s)) {
?>
      <option value="<?=$lis["id"];?>"><?=$lis["bolum"];?></option>
      
<?
}
?>
      </select>
   	        </label>
  	      </p>
           <p>
    	      <label><strong>Yaş :</strong>
                <input type="text" name="yas" value="<?=$k["yas"];?>" class="inputText" id="textfield" />
    	      </label>
  	      </p>
           <p>
    	      <label><strong>E-Mail :</strong>
                <input type="text" name="mail" value="<?=$k["mail"];?>" class="inputText" id="textfield" />
    	      </label>
  	      </p>
    	    <p>
    	      <label><strong>Şifre : </strong>
                <input type="password" name="sifre" class="inputText" id="textfield2" />
  	        </label>
    	    </p>
            <p>
    	      <label><strong>Danışman :</strong>
    	        <select class="inputText" id="textfield" name="danisman_id">
    	          <option value="<?=$listi["id"];?>" selected="selected"><?=$listi["danisman"];?></option>
<?php
$s = mysql_query("select * from anketor");
while ($lis = mysql_fetch_array($s)) {
?>
      <option value="<?=$lis["id"];?>"><?=$lis["adi_soyadi"];?></option>
      
<?
}
?>
      </select>
   	        </label>
  	      </p><center>
    		<input type="submit" name="add" value="Üye Ol" />
    	  </center></form>
		  <br clear="all" />
    	</div>
        <?php
		}
        ?>
        <div id="forgot"></div>
  </div>

<br clear="all" /></td>
<td width="954"><div class="grid_6 prefix_5 suffix_5">
   	  <h1>Üye Girişi</h1>
    	<div id="login">
    	  <!--<p class="tip">You just need to hit the button and you're in!</p>
          <p class="error">This is when something is wrong!</p>        -->
    	  <form id="form1" name="form1" method="post" action="uindex.php">
    	    <p>
    	      <label><strong>E-Mail :</strong>
                <input type="text" name="e-mail" class="inputText" id="textfield" />
    	      </label>
  	      </p>
    	    <p>
    	      <label><strong>Şifre : </strong>
                <input type="password" name="sifre" class="inputText" id="textfield2" />
  	        </label>
    	    </p><center>
    		<input type="submit" name="ok" value="Giriş" />
    	  </center></form>
		  <br clear="all" />
    	</div>
        <div id="forgot"></div>
  </div>
<br clear="all" /></td>
</tr>
<tr>
  <td><div class="grid_6 prefix_5 suffix_5">
   	  <h1>Anketör Girişi</h1>
    	<div id="login">
    	  <!--<p class="tip">You just need to hit the button and you're in!</p>
          <p class="error">This is when something is wrong!</p>        -->
    	  <form id="form1" name="form1" method="post" action="aindex.php">
    	    <p>
    	      <label><strong>E-Mail :</strong>
                <input type="text" name="e-mail" class="inputText" id="textfield" />
    	      </label>
  	      </p>
    	    <p>
    	      <label><strong>Şifre : </strong>
                <input type="password" name="sifre" class="inputText" id="textfield2" />
  	        </label>
    	    </p><center>
    		<input type="submit" name="ok" value="Giriş" />
    	  </center></form>
		  <br clear="all" />
    	</div>
        <div id="forgot"></div>
  </div></td>
</tr>
</table>
</body>
</html>

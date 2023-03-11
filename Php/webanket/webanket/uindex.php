<?php
include("ayar.php");
ob_start();
session_start();
if(!isset($_SESSION["u_id"])){
$email = $_POST["e-mail"];
$sifre = md5($_POST["sifre"]);
$u_giris = mysql_fetch_assoc(mysql_query("SELECT * FROM uyelik where mail='$email' and sifre='$sifre'"));
	if ($u_giris){
		$_SESSION["u_id"] = $u_giris["id"];
	}
}
	if($_SESSION["u_id"]){
	$u_al = mysql_fetch_assoc(mysql_query("SELECT * FROM uyelik where id='$_SESSION[u_id]'"));
	$mesaj = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as say FROM umesaj where kime='$_SESSION[u_id]'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Üye Paneli - Web Survey 2013</title>
<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  
    <script type="text/javascript" src="../../ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/blend/jquery.blend.js"></script>
	<script type="text/javascript" src="js/ui.core.js"></script>
	<script type="text/javascript" src="js/ui.sortable.js"></script>    
    <script type="text/javascript" src="js/ui.dialog.js"></script>
    <script type="text/javascript" src="js/ui.datepicker.js"></script>
    <script type="text/javascript" src="js/effects.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.pack.js"></script>
    <!--[if IE]>
    <script language="javascript" type="text/javascript" src="js/flot/excanvas.pack.js"></script>
    <![endif]-->
	<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="css/iefix.css" />
	<script src="js/pngfix.js"></script>
    <script>
        DD_belatedPNG.fix('#menu ul li a span span');
    </script>        
    <![endif]-->
    <script id="source" language="javascript" type="text/javascript" src="js/graphs.js"></script>

</head>

<body>
<!-- WRAPPER START -->
<div class="container_16" id="wrapper">	
<!-- HIDDEN COLOR CHANGER -->      
      <div style="position:relative;">
      	<div id="colorchanger">
        	<a href="dashboard_red.html"><span class="redtheme">Red Theme</span></a>
            <a href="dashboard.html"><span class="bluetheme">Blue Theme</span></a>
            <a href="dashboard_green.html"><span class="greentheme">Green Theme</span></a>
        </div>
      </div>
  	<!--LOGO-->
	<div class="grid_8" id="logo">Üye Paneli - Web Survey 2013</div>
    <div class="grid_8">
<!-- USER TOOLS START -->
      <div id="user_tools"><span><a href="uindex.php?s=umesaj&id=<?=$u_al["id"]?>" class="mail">(<?=$mesaj["say"];?>)</a> Hoşgeldiniz <a href="uindex.php?s=uyeduzenle&id=<?=$u_al["id"]?>"><?php echo $u_al["adi_soyadi"]; ?></a> |  <a href="uindex.php?s=cikis&u=1">Çıkış</a></span></div>
    </div>
<!-- USER TOOLS END -->    
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one"><a href="uindex.php" class="main current"><span class="outer"><span class="inner dashboard">Anasayfa</span></span></a></li>
        <li class="item middle" id="two"><a href="uindex.php?s=anketdoldur" class="main"><span class="outer"><span class="inner content">Anket Doldur</span></span></a></li>
        <li class="item last" id="three"><a href="uindex.php?s=rapor"><span class="outer"><span class="inner reports png">Raporlar</span></span></a></li>
       
    </ul>
</div>
<!-- MENU END -->
</div>
<div class="grid_16">

</div>

    <div class="grid_16" id="content">
    <?php
	if(!$_GET["s"]){
		?>
    <div class="grid_9">
    <h1 class="dashboard">Hoşgeldiniz</h1>
    </div>
    <div class="clear">
    </div>
    <div class="grid_15" id="textcontent">
    <h2>Web Survey 2013</h2>
    <p> Bitirme Projesi olarak yapılmıştır.</p></div>
        <?php
	}
	?>
    <div id="portlets">

    <div class="clear"></div>
    <?php
			if($_GET["s"]=="cikis"){
				include("cikis.php");
			}else if($_GET["s"]=="uyeduzenle"){
				include("uyeduzenle.php");
			}else if($_GET["s"]=="umesaj"){
				include("umesaj.php");
			}else if($_GET["s"]=="anketdoldur"){
				include("anketdoldur.php");
			}else if($_GET["s"]=="rapor"){
				include("rapor.php");
			}else{
				include("u.php");
			}
					?>  
   </div>
    <div class="clear"> </div>
  </div>
<div class="clear"> </div>

		<!-- This contains the hidden content for modal box calls -->
		<div class='hidden'>
			<div id="inline_example1" title="This is a modal box" style='padding:10px; background:#fff;'>
			<p><strong>This content comes from a hidden element on this page.</strong></p>
            			
			<p><strong>Try testing yourself!</strong></p>
            <p>You can call as many dialogs you want with jQuery UI.</p>
			</div>
		</div>
</div>
<!-- WRAPPER END -->
<!-- FOOTER START -->
<div class="container_16" id="footer">
Web Survey 2013 - <a href="#">Batuhan Erhan</a></div>
<!-- FOOTER END -->
</body>
</html>
<?php
	}else{	
		echo '<html>
<head>    <script type="text/javascript">
function yanlis(){
alert("Kullanici Adi veya Sifre Yanlis.Tekrar Deneyiniz.")
}
</script></head><body onload="yanlis()"></body></html>';
		header("Refresh: 0; url=ugiris.html");
	}
?>
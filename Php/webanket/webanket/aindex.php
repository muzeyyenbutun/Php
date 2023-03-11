<?php
include("ayar.php");
ob_start();
session_start();
if(!isset($_SESSION["y_id"])){
$email = $_POST["e-mail"];
$sifre = md5($_POST["sifre"]);
$y_giris = mysql_fetch_assoc(mysql_query("SELECT * FROM anketor where mail='$email' and sifre='$sifre'"));
	if ($y_giris){
		$_SESSION["y_id"] = $y_giris["id"];
	}
}
	if($_SESSION["y_id"]){
	$y_al = mysql_fetch_assoc(mysql_query("SELECT * FROM anketor where id='$_SESSION[y_id]'"));
	$mesaj = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as say FROM mesaj where kime='$_SESSION[y_id]'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Anketör Paneli - Web Survey 2013</title>
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
	<div class="grid_8" id="logo">Anketör Paneli - Web Survey 2013</div>
    <div class="grid_8">
<!-- USER TOOLS START -->
      <div id="user_tools"><span><a href="aindex.php?s=amesaj&id=<?=$y_al["id"]?>" class="mail">(<?=$mesaj["say"];?>)</a> Hoşgeldiniz <a href="aindex.php?s=anketorduzenle&id=<?=$y_al["id"]?>"><?php echo $y_al["adi_soyadi"]; ?></a> |  <a href="aindex.php?s=cikis&y=1">Çıkış</a></span></div>
    </div>
<!-- USER TOOLS END -->    
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one"><a href="aindex.php" class="main current"><span class="outer"><span class="inner dashboard">Anasayfa</span></span></a></li>
        <li class="item middle" id="two"><a href="aindex.php?s=anketekle" class="main"><span class="outer"><span class="inner content">Anket Ekle</span></span></a></li>
        <li class="item middle" id="three"><a href="aindex.php?s=arapor"><span class="outer"><span class="inner reports png">Raporlar</span></span></a></li>
        <li class="item middle" id="four"><a href="aindex.php?s=uyeler" class="main"><span class="outer"><span class="inner users">Üyeler</span></span></a></li>
		 <li class="item middle" id="four"><a href="aindex.php?s=anketor" class="main"><span class="outer"><span class="inner users">Anketörler</span></span></a></li>       
		<li class="item middle" id="two"><a href="aindex.php?s=bolum" class="main"><span class="outer"><span class="inner content">Bölüm</span></span></a></li>      
		<li class="item middle" id="two"><a href="aindex.php?s=unvan" class="main"><span class="outer"><span class="inner content">Ünvan</span></span></a></li>       
		<li class="item last" id="two"><a href="aindex.php?s=kategori" class="main"><span class="outer"><span class="inner content">Kategori</span></span></a></li>         
    </ul>
</div>
<!-- MENU END -->
</div>
<div class="grid_16">
<!--
    <div id="tabs">
         <div class="container">
            <ul>
                      <li><a href="#" class="current"><span>Dashboard elements</span></a></li>
                      <li><a href="forms.html"><span>Content Editing</span></a></li>
                      <li><a href="#"><span>Submenu Link 3</span></a></li>
                      <li><a href="#"><span>Submenu Link 4</span></a></li>
                      <li><a href="#"><span>Submenu Link 5</span></a></li>
                      <li><a href="#"><span>Submenu Link 6</span></a></li>
                      <li><a href="#" class="more"><span>More Submenus</span></a></li>            
           </ul>
        </div>
    </div>
-->    
</div>
<!-- HIDDEN SUBMENU START -->
<div class="grid_16" id="hidden_submenu">
	  <ul class="more_menu">
		<li><a href="#">More link 1</a></li>
		<li><a href="#">More link 2</a></li>  
	    <li><a href="#">More link 3</a></li>    
        <li><a href="#">More link 4</a></li>                               
      </ul>
	  <ul class="more_menu">
		<li><a href="#">More link 5</a></li>
		<li><a href="#">More link 6</a></li>  
	    <li><a href="#">More link 7</a></li> 
        <li><a href="#">More link 8</a></li>                                  
      </ul>
	  <ul class="more_menu">
		<li><a href="#">More link 9</a></li>
		<li><a href="#">More link 10</a></li>  
	    <li><a href="#">More link 11</a></li>  
        <li><a href="#">More link 12</a></li>                                 
      </ul>            
  </div>
<!-- HIDDEN SUBMENU END -->  

<!-- CONTENT START -->
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
			}else if($_GET["s"]=="anketorduzenle"){
				include("anketorduzenle.php");
			}else if($_GET["s"]=="amesaj"){
				include("amesaj.php");
			}else if($_GET["s"]=="kategori"){
				include("kategori.php");
			}else if($_GET["s"]=="unvan"){
				include("unvan.php");
			}else if($_GET["s"]=="bolum"){
				include("bolum.php");
			}else if($_GET["s"]=="anketor"){
				include("anketor.php");
			}else if($_GET["s"]=="uyeler"){
				include("uyeler.php");
			}else if($_GET["s"]=="anketekle"){
				include("anketekle.php");
			}else if($_GET["s"]=="soruekle"){
				include("soruekle.php");
			}else if($_GET["s"]=="sikekle"){
				include("sikekle.php");
			}else if($_GET["s"]=="anketson"){
				include("anketson.php");
			}else if($_GET["s"]=="arapor"){
				include("arapor.php");
			}else if($_GET["s"]=="anketduzenle"){
				include("anketduzenle.php");
			}else if($_GET["s"]=="gonder"){
				include("gonder.php");
			}else if($_GET["s"]=="soruduzenle"){
				include("soruduzenle.php");
			}else{
				include("a.php");
			}
					?>
<!--  END #PORTLETS -->  
   </div>
    <div class="clear"> </div>
<!-- END CONTENT-->    
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
		header("Refresh: 0; url=agiris.html");
	}
?>
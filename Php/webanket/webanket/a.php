<div class="portlet">
        <div class="portlet-header fixed"><img src="images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> Onay Bekleyen Üyeler</div>
		<div class="portlet-content nopadding">
        <form action="" method="post">
          <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
            <thead>
              <tr>
               <th width="42" scope="col"></th>
    <th width="252" scope="col">Adı Soyadı</th>
    <th width="252" scope="col">Numara</th>
    <th width="252" scope="col">Bölüm</th>
    <th width="252" scope="col">Yaş</th>
    <th width="193" scope="col">E-Mail</th>
    <th width="165" scope="col">Danışman</th>
    <th width="69" scope="col">Sil</th>
    <th width="69" scope="col">Seçim</th>
                </tr>
            </thead>
            <tbody>
               <?php
if($_GET["o"]){
	mysql_query("update uyelik set onay='1' where id='".$_GET["o"]."'")or die(mysql_error());
}else{
			   
  $i=0;
  $s = mysql_query("select * from uyelik where onay=0 order by id");
while ($lis = mysql_fetch_array($s)) {
	$list = mysql_fetch_assoc(mysql_query("select * from bolum where id=".$lis["bolum_id"].""));
	$listi = mysql_fetch_assoc(mysql_query("select * from anketor where id=".$lis["danisman_id"].""));
	$i++;
  ?>
  <tr>
  	<td><?=$i;?></td>
    <td><?=$lis["adi_soyadi"];?></td>
    <td><?=$lis["numara"];?></td>
    <td><?=$list["bolum"];?></td>
    <td><?=$lis["yas"];?></td>
    <td><?=$lis["mail"];?></td>
    <td><?=$listi["adi_soyadi"];?></td>
    <td><a href="aindex.php?s=uyeler&del=<?=$lis["id"];?>">Sil</a></td>
    <td><a href="aindex.php?o=<?=$lis["id"];?>">Onayla</a>
     </td>
    </tr>
    <?php
  } }
   ?>
            </tbody>
          </table>
        </form>
		</div>
      </div>
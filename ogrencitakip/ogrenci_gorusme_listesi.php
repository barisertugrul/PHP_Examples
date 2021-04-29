<?php
$sayfa="rehberlik";
include('baslik.php');
$gorusmeler = ogrenci_gorusmelerini_cek();

if($_POST["ara"]){
	$gorusmeler = ogrenci_gorusmelerini_cek($_POST["ogrNo"]);
}

?>

<!-- Join ve öğrenci arama örneği -->

<h3>Öğrenci Ara</h3>
<div class="arama">
  <form action="ogrenci_gorusme_listesi.php" method="post">
    <label for="ogrNo">Öğrenci Numarası</label>
    <input type="text" id="ogrNo" name="ogrNo" placeholder="Öğrencinin numarasını giriniz.."><input type="submit" name="ara" value="Ara">
  </form>
</div>

<h3>Görüşme Listesi</h3>
<div>
<table id="gorusmeler">
  <tr>
    <th>Foto</th>
    <th>Öğrenci No</th>
    <th>Adı</th>
    <th>Soyadı</th>
    <th>Geliş Tarihi</th>
    <th>Rehber Öğretmen</th>
    <th>Sorun</th>
	<th>Çözüm</th>
  </tr>
  
  <?php
  if($gorusmeler){
	foreach( $gorusmeler as $gorusme ){
	?>
		<tr>
			<td><?php if($gorusme['Foto']){ ?><img src="foto/<?=$gorusme['Foto'];?>" width="200"><?php } ?></td>
			<td><?=$gorusme['OgrNo'];?></td>
			<td><?=$gorusme['Adi'];?></td>
			<td><?=$gorusme['Soyadi'];?></td>
			<td><?=date_format(date_create($gorusme['GelisTarihi']), 'd.m.Y');?></td>
			<td><?=$gorusme['RehberOgretmen'];?></td>
			<td><?=$gorusme['Sorun'];?></td>
			<td><?=$gorusme['Cozum'];?></td>
		</tr>
	<?php
		 }
  }
	?>
  
</table>
</div>
<?php
include('sayfa_alti.php');
?>
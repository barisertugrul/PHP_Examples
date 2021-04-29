<?php
$sayfa="ogrenci";
include('baslik.php');
$ogrenciler = ogrenci_listesi_cek();

?>
<h3>Öğrenci Listesi</h3>
<div>
<table id="ogrenciler">
  <tr>
    <th>Foto</th>
    <th>Öğrenci No</th>
    <th>Adı</th>
    <th>Soyadı</th>
    <th>Doğum Yeri</th>
    <th>Doğum Tarihi</th>
    <th>Sınıfı</th>
	<th>İşlemler</th>
  </tr>
  
  <?php
  if($ogrenciler){
	foreach( $ogrenciler as $ogrenci ){
	?>
		<tr>
			<td><?php if($ogrenci['Foto']){ ?><img src="foto/<?=$ogrenci['Foto'];?>" width="200"><?php } ?></td>
			<td><?=$ogrenci['OgrNo'];?></td>
			<td><?=$ogrenci['Adi'];?></td>
			<td><?=$ogrenci['Soyadi'];?></td>
			<td><?=$ogrenci['DogumYeri'];?></td>
			<td><?=date_format(date_create($ogrenci['DogumTarihi']), 'd.m.Y');?></td>
			<td><?=$ogrenci['Sinifi'];?></td>
			<td>
				<a class="btn btn-green" href="ogrenci_guncelle.php?ogrNo=<?=$ogrenci['OgrNo'];?>" target="_blank">Güncelle</a>
				<a class="btn btn-red" href="ogrenci_sil.php?ogrNo=<?=$ogrenci['OgrNo'];?>" target="_blank">Sil</a>
			</td>
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
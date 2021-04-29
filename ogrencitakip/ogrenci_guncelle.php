<?php
$sayfa="ogrenci";
include('baslik.php');

if($_POST["kaydet"]){
	ogrenci_guncelle();
}

if($_GET["ogrNo"]){
	$ogrenci = ogrenci_cek($_GET["ogrNo"]);
}
?>
<h3>Öğrenci Güncelle</h3>
<div>
  <form action="ogrenci_guncelle.php?ogrNo=<?=$ogrenci['OgrNo'];?>" method="post" enctype="multipart/form-data">
    <label for="adi">Adı</label>
    <input type="text" id="adi" name="Adi" placeholder="Öğrencinin adı.." value="<?=isset($ogrenci['Adi'])? $ogrenci['Adi'] : 'Öğrencinin adı..'; ?>">

    <label for="soyadi">Soyadı</label>
    <input type="text" id="soyadi" name="Soyadi" placeholder="Öğrencinin soyadı.." value="<?=isset($ogrenci['Soyadi'])? $ogrenci['Soyadi'] : 'Öğrencinin soyadı..'; ?>">

    <label for="dogum_yeri">Doğum Yeri</label>
    <input type="text" id="dogum_yeri" name="DogumYeri" placeholder="Öğrencinin doğum yeri.." value="<?=isset($ogrenci['DogumYeri'])? $ogrenci['DogumYeri'] : 'Öğrencinin doğum yeri..'; ?>">

    <label for="dogum_tarihi">Doğum Tarihi</label>
    <input type="text" id="dogum_tarihi" name="DogumTarihi" placeholder="Öğrencinin doğum tarihi.." value="<?=isset($ogrenci['DogumTarihi'])? date_format(new DateTime($ogrenci['DogumTarihi']), 'd.m.Y') : 'Öğrencinin doğum tarihi..'; ?>">
	
	<?php
		$selected = isset($ogrenci['Sinifi'])? $ogrenci['Sinifi'] : '0'; ?>
    <label for="sinifi">Sınıfı</label>
    <select id="sinifi" name="Sinifi">
      <option value="0"<?php if($selected == '0') echo ' selected';?>>Seçiniz...</option>
      <option value="5A"<?php if($selected == '5A') echo ' selected';?>>5A</option>
      <option value="6A"<?php if($selected == '6A') echo ' selected';?>>6A</option>
      <option value="7A"<?php if($selected == '7A') echo ' selected';?>>7A</option>
      <option value="8A"<?php if($selected == '8A') echo ' selected';?>>8A</option>
    </select>
	
	
	<?php if(isset($ogrenci['Foto'])){ ?>
		<img src="foto/<?=$ogrenci['Foto']; ?>" width="200"/><br/>
	<?php } ?>
	<input type="file" name="Foto" accept="image/x-png,image/gif,image/jpeg" />
	<input type="hidden" name="OgrNo" value="<?=$ogrenci['OgrNo'];?>">
	<input type="hidden" name="KayitliFoto" value="<?=$ogrenci['Foto'];?>">
    <input type="submit" name="kaydet" value="Güncelle">
  </form>
</div>
<?php
include('sayfa_alti.php');
?>
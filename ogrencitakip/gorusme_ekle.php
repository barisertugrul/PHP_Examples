<?php
$sayfa="rehberlik";
include('baslik.php');
$ogrenciler = ogrenci_listesi_cek();
if($_POST["ekle"]){
	gorusme_ekle();
}
?>
<h3>Görüşme Ekle</h3>
<div>
  <form action="gorusme_ekle.php" method="post">

    <label for="OgrNo">Öğrenci</label>
    <select id="OgrNo" name="OgrNo">
      <option value="0">Seçiniz...</option>
	   <?php
		if($ogrenciler){
			foreach( $ogrenciler as $ogrenci ){
			?>
				<option value="<?=$ogrenci['OgrNo'];?>"><?=$ogrenci['OgrNo'];?>-<?=$ogrenci['Adi'];?> <?=$ogrenci['Soyadi'];?> (<?=$ogrenci['Sinifi'];?>)</option>
			<?php
			}
		}
		?>
    </select>
    <label for="gorusme_tarihi">Görüşme Tarihi</label>
    <input type="text" id="gorusme_tarihi" name="GelisTarihi" placeholder="Geliş tarihi..">
	
    <label for="rehber_ogretmen">Rehber Öğretmen</label>
    <input type="text" id="rehber_ogretmen" name="RehberOgretmen" placeholder="Rehber Öğretmen..">

    <label for="sorun">Öğrencinin Sorunu</label>
    <input type="text" id="sorun" name="Sorun" placeholder="Öğrencinin sorunu..">

    <label for="cozum">Çözüm Önerisi</label>
    <input type="text" id="cozum" name="Cozum" placeholder="Çözüm önerisi..">
  
    <input type="submit" name="ekle" value="Ekle">
  </form>
</div>
<?php
include('sayfa_alti.php');
?>
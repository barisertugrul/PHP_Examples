<?php
$sayfa="ogrenci";
include('baslik.php');
$ogrenciler = ogrenci_listesi_cek();
if($_POST["kaydet"]){
	ogrenci_ekle();
}
?>
<h3>Öğrenci Ekle</h3>
<div>
  <form action="ogrenci_ekle.php" method="post" enctype="multipart/form-data">
    <label for="adi">Adı</label>
    <input type="text" id="adi" name="Adi" placeholder="Öğrencinin adı..">

    <label for="soyadi">Soyadı</label>
    <input type="text" id="soyadi" name="Soyadi" placeholder="Öğrencinin soyadı..">

    <label for="dogum_yeri">Doğum Yeri</label>
    <input type="text" id="dogum_yeri" name="DogumYeri" placeholder="Öğrencinin doğum yeri..">

    <label for="dogum_tarihi">Doğum Tarihi</label>
    <input type="text" id="dogum_tarihi" name="DogumTarihi" placeholder="Öğrencinin doğum tarihi..">

    <label for="sinifi">Sınıfı</label>
    <select id="sinifi" name="Sinifi">
      <option value="0">Seçiniz...</option>
      <option value="5A">5A</option>
      <option value="6A">6A</option>
      <option value="7A">7A</option>
      <option value="8A">8A</option>
    </select>
	
	
	<!--Resim seçme işleminin düzenlenmesi gerekir -->
	<input type="file" name="Foto" accept="image/x-png,image/gif,image/jpeg" />
  
    <input type="submit" name="kaydet" value="Kaydet">
  </form>
</div>
<?php
include('sayfa_alti.php');
?>
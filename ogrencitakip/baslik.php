<?php
	include("fonksiyonlar.php");
?>
<!DOCTYPE html>
<html>
<head>
<link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<?php  ?>
<ul>
  <li><a <?php if($sayfa == 'anasayfa') echo 'class="active"' ?> href="index.php">Anasayfa</a></li>
  
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn<?php if($sayfa == 'ogrenci') echo ' active' ?>">Öğrenci İşlemleri</a>
    <div class="dropdown-content">
      <a href="ogrenci_listesi.php">Öğrenci Listesi</a>
      <a href="ogrenci_ekle.php">Öğrenci Ekleme</a>
    </div>
  </li>
  
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn<?php if($sayfa == 'ders') echo ' active' ?>">Ders İşlemleri</a>
    <div class="dropdown-content">
      <a href="#">Ders Listesi</a>
      <a href="#">Ders Ekleme</a>
    </div>
  </li>
  
  
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn<?php if($sayfa == 'rehberlik') echo ' active' ?>">Rehberlik İşlemleri</a>
    <div class="dropdown-content">
      <a href="ogrenci_gorusme_listesi.php">Görüşme Listesi</a>
      <a href="gorusme_ekle.php">Görüşme Ekleme</a>
    </div>
  </li>
</ul>
<?php

$baglanti;

function baglan(){
	global $baglanti;
	$host = "localhost";
	$veritabani = "okul";
	$kullanici = "localdemo";
	$sifre = "Local.Demo";
	
	try {
		$baglanti = new PDO('mysql:host='.$host.';dbname='.$veritabani, $kullanici, $sifre);
		$baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		print "Hata!: " . $e->getMessage() . "<br/>";
		die();
	}
}

function baglanti_kes(){
	global $baglanti;
	$baglanti = null;
}

function ogrenci_listesi_cek(){
	global $baglanti;
	baglan();
	
	$sorgu = $baglanti->query("SELECT * FROM kayit", PDO::FETCH_ASSOC);
	
	baglanti_kes();
	
	if ( $sorgu->rowCount() ){

		 return $sorgu;

	}
	
	return false;
}

function ogrenci_cek($ogrenciNo){
	global $baglanti;
	baglan();
	
	$sorgu = $baglanti-> query("SELECT * FROM kayit WHERE OgrNo = '{$ogrenciNo}'")->fetch(PDO::FETCH_ASSOC);

	baglanti_kes();
	
	if ( $sorgu ){

		return $sorgu;

	}
	return false;
}

function ogrenci_guncelle(){
	global $baglanti;

	if($_POST["kaydet"]) {
		if($_FILES["Foto"]["name"] != null) {
		//Fotoğraf yükleme
			$OgrenciFotosu = fotograf_yukle();
			
		}else{
			$OgrenciFotosu = $_POST["KayitliFoto"];
		}

	//Kayıt işlemi
		
		$ogrNo			= $_POST["OgrNo"];
		$adi			= $_POST["Adi"];
		$soyadi			= $_POST["Soyadi"];
		$dogum_yeri		= $_POST["DogumYeri"];
		$date			= strtotime($_POST['DogumTarihi']);
		$dogum_tarihi	= date('Y-m-d',$date);
		$sinifi			= $_POST["Sinifi"];
    

		if (empty($adi) || empty($soyadi) || empty($dogum_yeri) || empty($dogum_tarihi) || empty($sinifi)) {
			die("<p>Lütfen formu eksiksiz doldurun!</p>");
		}


		try {

			baglan();
		
			$sql = $baglanti->prepare("Update kayit set Adi=:adi, Soyadi=:soyadi, DogumYeri=:dogum_yeri, DogumTarihi=:dogum_tarihi, Sinifi=:sinifi, Foto=:foto where OgrNo=:ogrNo");
			$ekle = $sql->execute(array(
				"ogrNo"			=> $ogrNo,
				"adi"			=> $adi,
				"soyadi" 		=> $soyadi,
				"dogum_yeri" 	=> $dogum_yeri,
				"dogum_tarihi" 	=> $dogum_tarihi,
				"sinifi" 		=> $sinifi,
				"foto" 			=> $OgrenciFotosu
			));

			echo "<p>Bilgiler başarılı bir şekilde güncellendi.</p>";

		} catch (PDOException $e) {
			die($e->getMessage());
		}

		$baglanti = null;
	}
}

function ogrenci_ekle(){
	global $baglanti;

	if($_POST["kaydet"]) {
		if($_FILES["Foto"]["name"] != null) {
		//Fotoğraf yükleme
			$OgrenciFotosu = fotograf_yukle();
		}

	//Kayıt işlemi
		
		
		$adi				= $_POST["Adi"];
		$soyadi				= $_POST["Soyadi"];
		$dogum_yeri			= $_POST["DogumYeri"];
		$date				= strtotime($_POST['DogumTarihi']);
		$dogum_tarihi		= date('Y-m-d',$date);
		$sinifi				= $_POST["Sinifi"];
    

		if (empty($adi) || empty($soyadi) || empty($dogum_yeri) || empty($dogum_tarihi) || empty($sinifi)) {
			die("<p>Lütfen formu eksiksiz doldurun!</p>");
		}


		try {

			baglan();
		
			$sql = $baglanti->prepare("insert into kayit set Adi=:adi, Soyadi=:soyadi, DogumYeri=:dogum_yeri, DogumTarihi=:dogum_tarihi, Sinifi=:sinifi, Foto=:foto");
			$ekle = $sql->execute(array(
				"adi"			=> $adi,
				"soyadi"		=> $soyadi,
				"dogum_yeri"	=> $dogum_yeri,
				"dogum_tarihi"	=> $dogum_tarihi,
				"sinifi"		=> $sinifi,
				"foto"			=> $OgrenciFotosu
			));

			echo "<p>Bilgiler başarılı bir şekilde kaydedildi.</p>";

		} catch (PDOException $e) {
			die($e->getMessage());
		}

		$baglanti = null;
	}
}

function fotograf_yukle(){
	
			$hedef_klasor = "foto/";
			$foto = $hedef_klasor . basename($_FILES["Foto"]["name"]);
			$yukleme_onay = 1;
			$imageFileType = strtolower(pathinfo($foto,PATHINFO_EXTENSION));
			
			  $check = getimagesize($_FILES["Foto"]["tmp_name"]);
			  if($check !== false) {
				$yukleme_onay = 1;
			  } else {
				$yukleme_onay = 0;
			  }

			
			if (file_exists($foto)) {
			  echo "Bu isimde bir fotoğraf zaten yüklü.";
			  $yukleme_onay = 0;
			}

			
			if ($_FILES["foto"]["size"] > 500000) {
			  echo "Fotoğraf boyutu fazla.";
			  $yukleme_onay = 0;
			}

			
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			  echo "Sadece JPG, JPEG, PNG & GIF dosya formatlarına izin verilir.";
			  $yukleme_onay = 0;
			}

			
			if ($yukleme_onay == 0) {
			  echo "Fotoğraf yüklenemedi.";
			
			} else {
			  if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $foto)) {
				return htmlspecialchars( basename( $_FILES["Foto"]["name"]));
			  } else {
				echo "Fotoğraf yüklenirken bir hata oluştu.";
			  }
			}
			
			return false;
}


//Join örneği
//Öğrenci araması yapılmışsa, o öğrenciye ait görüşmeler gelir
function ogrenci_gorusmelerini_cek($ogrNo = null){
	global $baglanti;
	 baglan();
	 if($ogrNo){
		 $sorgu = $baglanti->prepare("SELECT * FROM rehberlik inner join kayit on kayit.OgrNo = rehberlik.OgrNo where rehberlik.OgrNo=:ogrNo");
		$sorgu->execute(array('ogrNo' => $ogrNo));
	 }else{
		$sorgu = $baglanti->prepare("SELECT * FROM rehberlik inner join kayit on kayit.OgrNo = rehberlik.OgrNo");
		$sorgu->execute();
	}
	$gorusmeler = $sorgu->fetchAll(PDO::FETCH_ASSOC);

	baglanti_kes();
	
	if ( $gorusmeler ){

		return $gorusmeler;

	}
	return false;

}

?>
<?php
	/* Selçuk SAYGILI */
	# değişken
	$q=@$_GET["q"];# q değişkenimizi aldık
	$q=@explode("/",$q);# q değişkenimizi parçaladık
	# / değişken
	# sistem ana dosyaları
	include "slck/ana.php";#fonksiyonlarımızın bulunduğu class ımızı include ettik
	include "system/libs/bilgecoder.php";#slck class
	include "system/libs/load.php";#yükleme class ımızı include ettik
	include "slck/tag.php";#tag class ı
	include "system/libs/controller.php";#yönlendirici class ımızı include ettik
	include "system/libs/model.php";#veritabanı işlemlerini yapacağımız class ımızı include ettik
	# / sistem ana dosyaları
	clk::baslangic();
	if($q[0]==""){
		include "apps/controller/anasayfa.php";
		$controller=new anasayfa(array("anasayfa"));
	}#eğer q değişkeni yoksa standart yönlendiricimizi çalıştırdık
	else{
		if(is_file("apps/controller/".$q[0].".php")){
			include "apps/controller/".$q[0].".php";
			$controller=new $q[0]($q);
		}#eğer yönlendirici mevcut ise çalıştırdık
		else{
			include "apps/controller/hata.php";
			$controller=new hata();
		}#eğer yönlendirici mevcut değilse standart hata sayfamızı çalıştırdık
	}
	clk::cacheOnlem(md5(implode(".",$q)).".php");
	/* Bu MVC Framework ün kodlaması tamamen Selçuk SAYGILI aittir. */
	/* bilgecoderMVC v1.0 */
	/* İletişim:selcuk.saygili@outlook.com */
?>
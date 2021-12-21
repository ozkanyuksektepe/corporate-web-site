SET NAMES utf8;DROP TABLE IF EXISTS ayarlar;

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `metatitle` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `metadesc` text COLLATE utf8_turkish_ci NOT NULL,
  `metakey` text COLLATE utf8_turkish_ci NOT NULL,
  `metaauthor` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `metaowner` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `metacopy` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `logoyazisi` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `twitter` varchar(70) COLLATE utf8_turkish_ci NOT NULL,
  `facebook` varchar(70) COLLATE utf8_turkish_ci NOT NULL,
  `instagram` varchar(70) COLLATE utf8_turkish_ci NOT NULL,
  `linkedin` varchar(70) COLLATE utf8_turkish_ci NOT NULL,
  `telefonno` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `mailadres` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `slogan_tr` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `slogan_en` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `referans_ustbaslik_tr` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `referans_ustbaslik_en` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `referansbaslik_tr` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `referansbaslik_en` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `filoustbaslik_tr` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `filoustbaslik_en` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `filobaslik_tr` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `filobaslik_en` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `yorumustbaslik_tr` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `yorumustbaslik_en` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `yorumbaslik_tr` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `yorumbaslik_en` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `iletisimustbaslik_tr` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `iletisimustbaslik_en` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `iletisimbaslik_tr` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `iletisimbaslik_en` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `hizmetustbaslik_tr` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `hizmetustbaslik_en` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `hizmetlerbaslik_tr` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `hizmetlerbaslik_en` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `mesajtercih` int(11) NOT NULL DEFAULT 1,
  `haritabilgi` text COLLATE utf8_turkish_ci NOT NULL,
  `footer` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `videoustbaslik_tr` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `videoustbaslik_en` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `videobaslik_tr` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `videobaslik_en` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `haberler_tr` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `haberler_en` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `bakimzaman` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `yedekzaman` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO ayarlar VALUES("1","Nakliyat Şirketi","Nakliyat  Şirketi","Uluslararası Nakliyat","nakliyat, taşıma, kamyon","Nakliyat Ltd.Şti.","Nakliyat Ltd.Şti.","2021","Nakliyat","https://twitter.com/?lang=tr","https://tr-tr.facebook.com/","https://www.instagram.com/?hl=tr","","+90 535 982 5652154","Evren mah. dünya sok.yer kabuğu apt. no:1 Üsküdar","info@nakliyat.com","Nakliyatta Güvenle Taşıyoruz","We Carry Safely in Transport","REFERANSLAR","REFERENCES","Referanslarımız aşağıda gözükmektedir.","Our references are shown below.","ARAÇLARIMIZ","VEHICLES","Sizleri daha iyi temsil etmek ve mutlu edebilmek için araçlar konusunda dikkatli davranıyoruz.","We are careful about tools in order to represent you better and make you happy.","MÜŞTERI YORUMLARI","COSTUMER COMMENTS","Sizlerin değerli yorumları bizim için çok önemlidir.","Your valuable comments are very important to us.","İLETİŞİM","CONTACT","Bize ulaşmak ve iletmek istediğiniz konular için aşağıdaki bilgilerden faydalanabilirsiniz.","You can use the information below for the issues you want to reach and convey to us.","HİZMETLERİMİZ","SERVICES","Sizlere hizmet verdiğimiz ve sizleri mutlu edebildiğimiz için çok mutluyuz.","We are very happy to serve you and make you happy.","3","https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96438.90502503663!2d29.085503632420107!3d40.94389585950251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cac4336e39827f%3A0x608e0ae971e8ddc2!2sMaltepe%2F%C4%B0stanbul!5e0!3m2!1str!2str!4v1631695515060!5m2!1str!2str","2021 © Copyright Nakliyat Şirketi","VİDEOLARIMIZ","VIDEOS","Şirketimize ait videolar aşağıda bulunmaktadır.","Below are the videos of our company.","BİZDEN HABERLER :","NEWS FROM US :","23/09/2021 - 12:33","","http://localhost/PHP%20Kurumsal");



DROP TABLE IF EXISTS bulten;

CREATE TABLE `bulten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO bulten VALUES("1","ruken@gmail.com");
INSERT INTO bulten VALUES("2","ozzy@gmail.com");
INSERT INTO bulten VALUES("6","samco@hotmail.com");
INSERT INTO bulten VALUES("7","ahmet@hotmail.com");
INSERT INTO bulten VALUES("11","yumço@gmail.com");
INSERT INTO bulten VALUES("15","ozkan@gmail.com");



DROP TABLE IF EXISTS filomuz;

CREATE TABLE `filomuz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resimyol` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO filomuz VALUES("1","img/filo/1.jpg");
INSERT INTO filomuz VALUES("2","img/filo/2.jpg");
INSERT INTO filomuz VALUES("3","img/filo/3.jpg");
INSERT INTO filomuz VALUES("4","img/filo/4.jpg");
INSERT INTO filomuz VALUES("5","img/filo/5.jpg");
INSERT INTO filomuz VALUES("6","img/filo/6.jpg");
INSERT INTO filomuz VALUES("7","img/filo/7.jpg");
INSERT INTO filomuz VALUES("8","img/filo/8.jpg");



DROP TABLE IF EXISTS gelenmail;

CREATE TABLE `gelenmail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `mailadres` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `konu` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `zaman` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO gelenmail VALUES("1","özkan","ozzy@gmail.com","deneme","deneme deneme deneme deneme deneme
deneme deneme deneme deneme deneme","11.09.2021","0");
INSERT INTO gelenmail VALUES("2","Rüken","ruken@gmail.com","deneme2","deneme 2 deneme 2 ","11.09.2021","2");
INSERT INTO gelenmail VALUES("4","Samed","samed@gmail.com","deneme 4","deneme 4 deneme 4 deneme 4 ","10.09.2021","2");
INSERT INTO gelenmail VALUES("5","Nursena","nunu@gmail.com","deneme 5","deneme 5 deneme 5 deneme 5 deneme 5
deneme 5 deneme 5 deneme 5 deneme 5","9.09.2021","2");
INSERT INTO gelenmail VALUES("11","Ozzy","oz@gmail.com","Rize","Seversun","15.09.2021/10:12","0");



DROP TABLE IF EXISTS gelenmailayar;

CREATE TABLE `gelenmailayar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `host` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `mailadres` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `port` int(11) NOT NULL,
  `aliciadres` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO gelenmailayar VALUES("1","host","mail","sifre","0","info@nakliyat.com ");



DROP TABLE IF EXISTS haberler;

CREATE TABLE `haberler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icerik_tr` text COLLATE utf8_turkish_ci NOT NULL,
  `icerik_en` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO haberler VALUES("1","haber 111","news 111","2021-09-22 11:16:01");
INSERT INTO haberler VALUES("2","haber 222","news 222","2021-09-22 11:17:04");
INSERT INTO haberler VALUES("3","haber 333","news 333","2021-09-22 11:17:11");
INSERT INTO haberler VALUES("4","haber 444","news 444","2021-09-22 11:17:20");
INSERT INTO haberler VALUES("7","<p>asdasdas</p>","<p>asdasdasd</p>","2021-09-24 09:28:00");



DROP TABLE IF EXISTS hakkimizda;

CREATE TABLE `hakkimizda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik_tr` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `baslik_en` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `icerik_tr` text COLLATE utf8_turkish_ci NOT NULL,
  `icerik_en` text COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO hakkimizda VALUES("1","HAKKIMIZDA","ABOUT US","<p><strong>Uluslararası</strong> nakliyat konusunda yıllardır vermiş olduğumuz hizmetler ile bir dünya markası olduk. Yaptığımız işi her zaman<i> </i>dikkatle ve severek yaptık. <strong>Sizlerin mutlu olabilmesi için elimizden gelenin fazlasını yapıyoruz ve yapmaya da devam edeceğiz.</strong> Sizler için çok çalışıyoruz. Uluslararası bir firma olmak için çok çalıştık ve bunun sonucunu da aldık. Bu sonucu mutlulukla sizlerle paylaşıyoruz.</p><p>&nbsp;</p>","<p>We have become a world brand with the services we have provided for years in international shipping. We have always done our work carefully and lovingly. We do our best to make you happy and we will continue to do so. We work hard for you. We worked hard to become an international company and we got the result. We happily share this result with you.</p>","img/hakkımızda.jpg");



DROP TABLE IF EXISTS hizmetler;

CREATE TABLE `hizmetler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik_tr` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `baslik_en` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `icerik_tr` text COLLATE utf8_turkish_ci NOT NULL,
  `icerik_en` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO hizmetler VALUES("1","İTHALAT","IMPORTS","Ürünlerinizi güvenle taşıyoruz.","We transport your products safely.");
INSERT INTO hizmetler VALUES("2","İHRACAT","EXPORT","Ülkemiz için elimizden geleni yapıyoruz. Dünyanın dört bir yanına ürünlerimizi iletiyoruz.","We are doing our best for our country. We deliver our products all over the world.");
INSERT INTO hizmetler VALUES("4","DEPOLAMA","STORAGE","Depolama alanlarımız da çok fazla ürün depolayabiliyoruz.","We can store a lot of products in our storage areas.");
INSERT INTO hizmetler VALUES("5","Zamanında Teslimat","On Time Delivery","<p>Ürünlerinizi <strong>zamanında teslim etmeye</strong> çok özen gösteriyoruz. Sizleri mağdur etmemek için çok çalışıyoruz.</p>","<p>We take great care to deliver your products on time. We are working hard not to make you suffer.</p>");



DROP TABLE IF EXISTS intro;

CREATE TABLE `intro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resimyol` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO intro VALUES("1","img/carousel/1.jpg");
INSERT INTO intro VALUES("2","img/carousel/2.jpg");
INSERT INTO intro VALUES("3","img/carousel/3.jpg");
INSERT INTO intro VALUES("4","img/carousel/4.jpg");
INSERT INTO intro VALUES("5","img/carousel/5.jpg");
INSERT INTO intro VALUES("12","img/carousel/ac512ff1508e6a23f8616dfb5c9df727.jpg");



DROP TABLE IF EXISTS linkler;

CREATE TABLE `linkler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_tr` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `ad_en` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `etiket` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `siralama` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO linkler VALUES("1","Anasayfa","Homepage","body","2");
INSERT INTO linkler VALUES("2","Hakkımızda","About us","hakkimizda","3");
INSERT INTO linkler VALUES("3","Hizmetlerimiz","Services","hizmetler","1");
INSERT INTO linkler VALUES("4","Araç Filomuz","Gallery","filo","4");
INSERT INTO linkler VALUES("5","İletişim","Contact","iletisim","6");
INSERT INTO linkler VALUES("9","Videolar","Videos","videolar","5");



DROP TABLE IF EXISTS referans;

CREATE TABLE `referans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resimyol` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO referans VALUES("1","img/referans/ref1.png");
INSERT INTO referans VALUES("2","img/referans/ref2.png");
INSERT INTO referans VALUES("3","img/referans/ref3.png");
INSERT INTO referans VALUES("4","img/referans/ref4.png");
INSERT INTO referans VALUES("5","img/referans/ref5.png");
INSERT INTO referans VALUES("6","img/referans/ref6.png");
INSERT INTO referans VALUES("7","img/referans/ref7.png");
INSERT INTO referans VALUES("8","img/referans/ref8.png");



DROP TABLE IF EXISTS tasarim;

CREATE TABLE `tasarim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hiztercih` int(11) NOT NULL DEFAULT 0,
  `reftercih` int(11) NOT NULL DEFAULT 0,
  `yorumtercih` int(11) NOT NULL DEFAULT 0,
  `videotercih` int(11) NOT NULL DEFAULT 0,
  `bultentercih` int(11) NOT NULL DEFAULT 0,
  `habertercih` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO tasarim VALUES("1","0","0","0","0","0","0");



DROP TABLE IF EXISTS tasarimbolumler;

CREATE TABLE `tasarimbolumler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `classAd` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `siralama` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO tasarimbolumler VALUES("1","HAKKIMIZDA","hakkimizda","2");
INSERT INTO tasarimbolumler VALUES("2","HİZMETLER","HizmettasarimDuzen","1");
INSERT INTO tasarimbolumler VALUES("3","REFERANS","ReferanstasarimDuzen","3");
INSERT INTO tasarimbolumler VALUES("4","FİLOMUZ","filomuz","4");
INSERT INTO tasarimbolumler VALUES("5","VİDEOLAR","VideotasarimDuzen","5");
INSERT INTO tasarimbolumler VALUES("6","YORUMLAR","YorumtasarimDuzen","6");



DROP TABLE IF EXISTS videolar;

CREATE TABLE `videolar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `siralama` int(11) NOT NULL,
  `durum` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO videolar VALUES("1","tfSS1e3kYeo","4","1");
INSERT INTO videolar VALUES("2","kI3LSxdM80w","3","1");
INSERT INTO videolar VALUES("3","fPO76Jlnz6c","2","1");
INSERT INTO videolar VALUES("8","-tFpdiJQ2mE","1","1");



DROP TABLE IF EXISTS yonetim;

CREATE TABLE `yonetim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kulad` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT 0,
  `genel_yetki` int(11) NOT NULL DEFAULT 0,
  `intro_yetki` int(11) NOT NULL DEFAULT 0,
  `arac_yetki` int(11) NOT NULL DEFAULT 0,
  `video_yetki` int(11) NOT NULL DEFAULT 0,
  `hakkimiz_yetki` int(11) NOT NULL DEFAULT 0,
  `hizmet_yetki` int(11) NOT NULL DEFAULT 0,
  `referans_yetki` int(11) NOT NULL DEFAULT 0,
  `tasarim_yetki` int(11) NOT NULL DEFAULT 0,
  `yorum_yetki` int(11) NOT NULL DEFAULT 0,
  `mesaj_yetki` int(11) NOT NULL DEFAULT 0,
  `bulten_yetki` int(11) NOT NULL DEFAULT 0,
  `haber_yetki` int(11) NOT NULL DEFAULT 0,
  `yonetici_yetki` int(11) NOT NULL DEFAULT 0,
  `ayar_yetki` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO yonetim VALUES("1","ÖZKAN","ab3b6c11d0babf2542db872ece1dd20d","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1");
INSERT INTO yonetim VALUES("5","mehmet","96de4eceb9a0c2b9b52c0b618819821b","0","2","1","1","1","0","0","0","0","1","1","1","1","0","0");
INSERT INTO yonetim VALUES("6","ruken","05642ea3745826bb100e668df4da3e80","0","3","0","0","0","0","1","1","0","1","1","1","1","0","0");
INSERT INTO yonetim VALUES("10","Mahmut","f149375226d69b690d1a3c59dccd95fe","0","2","0","1","1","1","1","0","0","1","1","1","1","0","0");
INSERT INTO yonetim VALUES("11","arif","96de4eceb9a0c2b9b52c0b618819821b","0","3","0","1","1","1","0","0","0","1","0","0","0","0","0");



DROP TABLE IF EXISTS yorumlar;

CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `isim` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO yorumlar VALUES("1","<p><strong>içerik 1</strong></p>","Emre");
INSERT INTO yorumlar VALUES("2","içerik 2","Samet");
INSERT INTO yorumlar VALUES("3","içerik 3","Enver");
INSERT INTO yorumlar VALUES("4","İçerik4","Mustafa");




<?php ob_start();
include_once('../config/genel.php');

class yonetim extends PDO {
    function __construct(){

        parent::__construct("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8",DB_KULAD,DB_SİFRE);
    }

private $veriler=array();

function dahilet($dosyalar= array()) {
   foreach($dosyalar as $key => $deger) :
       include_once (YONETİM_YOL."assets/".$key.".php");
   $this->$deger= new $deger;
   endforeach;
}

function sayfanavi($link,$ana,$metin) {
    echo '<span><a href="control.php?sayfa='.$link.'">'.$ana.'</a> / <a href="#">'.$metin.'</a></span>';
}

function sorgum($sorgu,$tercih=0) {
    $al=$this->prepare($sorgu);
    $al->execute();
    if ($tercih==1):
        return $al->fetch();
    elseif ($tercih==2):
        return $al;
        endif;
}

function siteayar() {
    $sonuc=$this->sorgum("SELECT * from ayarlar",1);

    if ($_POST) :
        $title=htmlspecialchars($_POST["title"]);
        $metatitle=htmlspecialchars($_POST["metatitle"]);
        $metadesc=htmlspecialchars($_POST["metadesc"]);
        $metakey=htmlspecialchars($_POST["metakey"]);
        $metaauthor=htmlspecialchars($_POST["metaauthor"]);
        $metaowner=htmlspecialchars($_POST["metaowner"]);
        $metacopy=htmlspecialchars($_POST["metacopy"]);
        $logoyazi=htmlspecialchars($_POST["logoyazi"]);
        $twitter=htmlspecialchars($_POST["twitter"]);
        $facebook=htmlspecialchars($_POST["facebook"]);
        $instagram=htmlspecialchars($_POST["instagram"]);
        $linkedin=htmlspecialchars($_POST["linkedin"]);
        $telno=htmlspecialchars($_POST["telno"]);
        $adres=htmlspecialchars($_POST["adres"]);
        $mailadres=htmlspecialchars($_POST["mailadres"]);
        $url=htmlspecialchars($_POST["url"]);

        $slogan_tr=htmlspecialchars($_POST["slogan_tr"]);
        $slogan_en=htmlspecialchars($_POST["slogan_en"]);

        $referanssayfaustbas_tr=htmlspecialchars($_POST["referanssayfaustbas_tr"]);
        $referanssayfaustbas_en=htmlspecialchars($_POST["referanssayfaustbas_en"]);
        $referanssayfabas_tr=htmlspecialchars($_POST["referanssayfabas_tr"]);
        $referanssayfabas_en=htmlspecialchars($_POST["referanssayfabas_en"]);

        $filosayfaustbas_tr=htmlspecialchars($_POST["filosayfaustbas_tr"]);
        $filosayfaustbas_en=htmlspecialchars($_POST["filosayfaustbas_en"]);
        $filosayfabas_tr=htmlspecialchars($_POST["filosayfabas_tr"]);
        $filosayfabas_en=htmlspecialchars($_POST["filosayfabas_en"]);

        $yorumsayfaustbas_tr=htmlspecialchars($_POST["yorumsayfaustbas_tr"]);
        $yorumsayfaustbas_en=htmlspecialchars($_POST["yorumsayfaustbas_en"]);
        $yorumsayfabas_tr=htmlspecialchars($_POST["yorumsayfabas_tr"]);
        $yorumsayfabas_en=htmlspecialchars($_POST["yorumsayfabas_en"]);

        $iletisimsayfaustbas_tr=htmlspecialchars($_POST["iletisimsayfaustbas_tr"]);
        $iletisimsayfaustbas_en=htmlspecialchars($_POST["iletisimsayfaustbas_en"]);
        $iletisimsayfabas_tr=htmlspecialchars($_POST["iletisimsayfabas_tr"]);
        $iletisimsayfabas_en=htmlspecialchars($_POST["iletisimsayfabas_en"]);

        $hizmetlersayfaustbas_tr=htmlspecialchars($_POST["hizmetlersayfaustbas_tr"]);
        $hizmetlersayfaustbas_en=htmlspecialchars($_POST["hizmetlersayfaustbas_en"]);
        $hizmetlersayfabas_tr=htmlspecialchars($_POST["hizmetlersayfabas_tr"]);
        $hizmetlersayfabas_en=htmlspecialchars($_POST["hizmetlersayfabas_en"]);

        $mesajtercih=htmlspecialchars($_POST["mesajtercih"]);
        $haritabilgi=htmlspecialchars($_POST["haritabilgi"]);
        $footer=htmlspecialchars($_POST["footer"]);
    // burda bunların boş yada doluluk kontrolü yapılabilir.
    $guncelleme=$this->prepare("UPDATE ayarlar set title=?,metatitle=?,metadesc=?,metakey=?,metaauthor=?,metaowner=?,metacopy=?,
                   logoyazisi=?,twitter=?,facebook=?,instagram=?,linkedin=?,telefonno=?,adres=?,mailadres=?,slogan_tr=?,slogan_en=?,referans_ustbaslik_tr=?,
            referans_ustbaslik_en=?,referansbaslik_tr=?,referansbaslik_en=?,filoustbaslik_tr=?,filoustbaslik_en=?,filobaslik_tr=?,filobaslik_en=?,
            yorumustbaslik_tr=?,yorumustbaslik_en=?,yorumbaslik_tr=?,yorumbaslik_en=?,iletisimustbaslik_tr=?,iletisimustbaslik_en=?,iletisimbaslik_tr=?,iletisimbaslik_en=?,
            hizmetustbaslik_tr=?,hizmetustbaslik_en=?,hizmetlerbaslik_tr=?,hizmetlerbaslik_en=?,mesajtercih=?,haritabilgi=?,footer=?,url=?");

    $guncelleme->bindParam(1,$title,PDO::PARAM_STR);
    $guncelleme->bindParam(2,$metatitle,PDO::PARAM_STR);
    $guncelleme->bindParam(3,$metadesc,PDO::PARAM_STR);
    $guncelleme->bindParam(4,$metakey,PDO::PARAM_STR);
    $guncelleme->bindParam(5,$metaauthor,PDO::PARAM_STR);
    $guncelleme->bindParam(6,$metaowner,PDO::PARAM_STR);
    $guncelleme->bindParam(7,$metacopy,PDO::PARAM_STR);
    $guncelleme->bindParam(8,$logoyazi,PDO::PARAM_STR);
    $guncelleme->bindParam(9,$twitter,PDO::PARAM_STR);
    $guncelleme->bindParam(10,$facebook,PDO::PARAM_STR);
    $guncelleme->bindParam(11,$instagram,PDO::PARAM_STR);
    $guncelleme->bindParam(12,$linkedin,PDO::PARAM_STR);
    $guncelleme->bindParam(13,$telno,PDO::PARAM_STR);
    $guncelleme->bindParam(14,$adres,PDO::PARAM_STR);
    $guncelleme->bindParam(15,$mailadres,PDO::PARAM_STR);
    $guncelleme->bindParam(16,$slogan_tr,PDO::PARAM_STR);
    $guncelleme->bindParam(17,$slogan_en,PDO::PARAM_STR);
    $guncelleme->bindParam(18,$referanssayfaustbas_tr,PDO::PARAM_STR);
    $guncelleme->bindParam(19,$referanssayfaustbas_en,PDO::PARAM_STR);
    $guncelleme->bindParam(20,$referanssayfabas_tr,PDO::PARAM_STR);
    $guncelleme->bindParam(21,$referanssayfabas_en,PDO::PARAM_STR);
    $guncelleme->bindParam(22,$filosayfaustbas_tr,PDO::PARAM_STR);
    $guncelleme->bindParam(23,$filosayfaustbas_en,PDO::PARAM_STR);
    $guncelleme->bindParam(24,$filosayfabas_tr,PDO::PARAM_STR);
    $guncelleme->bindParam(25,$filosayfabas_en,PDO::PARAM_STR);
    $guncelleme->bindParam(26,$yorumsayfaustbas_tr,PDO::PARAM_STR);
    $guncelleme->bindParam(27,$yorumsayfaustbas_en,PDO::PARAM_STR);
    $guncelleme->bindParam(28,$yorumsayfabas_tr,PDO::PARAM_STR);
    $guncelleme->bindParam(29,$yorumsayfabas_en,PDO::PARAM_STR);
    $guncelleme->bindParam(30,$iletisimsayfaustbas_tr,PDO::PARAM_STR);
    $guncelleme->bindParam(31,$iletisimsayfaustbas_en,PDO::PARAM_STR);
    $guncelleme->bindParam(32,$iletisimsayfabas_tr,PDO::PARAM_STR);
    $guncelleme->bindParam(33,$iletisimsayfabas_en,PDO::PARAM_STR);
    $guncelleme->bindParam(34,$hizmetlersayfaustbas_tr,PDO::PARAM_STR);
    $guncelleme->bindParam(35,$hizmetlersayfaustbas_en,PDO::PARAM_STR);
    $guncelleme->bindParam(36,$hizmetlersayfabas_tr,PDO::PARAM_STR);
    $guncelleme->bindParam(37,$hizmetlersayfabas_en,PDO::PARAM_STR);
    $guncelleme->bindParam(38,$mesajtercih,PDO::PARAM_INT);
    $guncelleme->bindParam(39,$haritabilgi,PDO::PARAM_STR);
    $guncelleme->bindParam(40,$footer,PDO::PARAM_STR);
    $guncelleme->bindParam(41,$url,PDO::PARAM_STR);
    $guncelleme->execute();

    echo '<div class="alert alert-success mt-5">
     <strong>Site ayarları başarıyla güncellendi.</strong>
    </div>';
    header("refresh:2,url=control.php?sayfa=siteayar");
    // burada veritabanı işlemleri.
        else:
        ?>
            <form action="control.php?sayfa=siteayar" method="post">
                <div class="row">
                    <div class="col-lg-7 mx-auto mt-2">
                        <h3 class="text-info">SİTE AYARLARI</h3>
                    </div>

                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span> URL</span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="url" class="form-control" value="<?php echo $sonuc["url"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto mt-2 border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Title</span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="title" class="form-control" value="<?php echo $sonuc["title"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Meta Title</span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="metatitle" class="form-control" value="<?php echo $sonuc["metatitle"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Sayfa Açıklama</span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="metadesc" class="form-control" value="<?php echo $sonuc["metadesc"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Anahtar Kelimeler</span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="metakey" class="form-control" value="<?php echo $sonuc["metakey"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Yapımcı</span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="metaauthor" class="form-control" value="<?php echo $sonuc["metaauthor"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Firma</span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="metaowner" class="form-control" value="<?php echo $sonuc["metaowner"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Copyright</span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="metacopy" class="form-control" value="<?php echo $sonuc["metacopy"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Logo Yazısı</span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="logoyazi" class="form-control" value="<?php echo $sonuc["logoyazisi"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Twitter</span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="twitter" class="form-control" value="<?php echo $sonuc["twitter"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Facebook</span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="facebook" class="form-control" value="<?php echo $sonuc["facebook"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>İnstagram</span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="instagram" class="form-control" value="<?php echo $sonuc["instagram"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Linkedin</span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="linkedin" class="form-control" value="<?php echo $sonuc["linkedin"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Telefon Numarası</span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="telno" class="form-control" value="<?php echo $sonuc["telefonno"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Adres</span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="adres" class="form-control" value="<?php echo $sonuc["adres"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Mail Adres</span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="mailadres" class="form-control" value="<?php echo $sonuc["mailadres"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Slogan <b style="color: red">(TR)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="slogan_tr" class="form-control" value="<?php echo $sonuc["slogan_tr"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Slogan <b style="color: blue">(EN)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="slogan_en" class="form-control" value="<?php echo $sonuc["slogan_en"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Referans Sayfası Üst Başlık <b style="color: red">(TR)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="referanssayfaustbas_tr" class="form-control" value="<?php echo $sonuc["referans_ustbaslik_tr"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Referans Sayfası Üst Başlık <b style="color: blue">(EN)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="referanssayfaustbas_en" class="form-control" value="<?php echo $sonuc["referans_ustbaslik_en"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Referans Sayfası Başlık <b style="color: red">(TR)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="referanssayfabas_tr" class="form-control" value="<?php echo $sonuc["referansbaslik_tr"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Referans Sayfası Başlık <b style="color: blue">(EN)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="referanssayfabas_en" class="form-control" value="<?php echo $sonuc["referansbaslik_en"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Filo Sayfası Üst Başlık <b style="color: red">(TR)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="filosayfaustbas_tr" class="form-control" value="<?php echo $sonuc["filoustbaslik_tr"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Filo Sayfası Üst Başlık <b style="color: blue">(EN)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="filosayfaustbas_en" class="form-control" value="<?php echo $sonuc["filoustbaslik_en"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Filo Sayfası Başlık <b style="color: red">(TR)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="filosayfabas_tr" class="form-control" value="<?php echo $sonuc["filobaslik_tr"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Filo Sayfası Başlık <b style="color: blue">(EN)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="filosayfabas_en" class="form-control" value="<?php echo $sonuc["filobaslik_en"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Yorum Sayfası Üst Başlık <b style="color: red">(TR)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="yorumsayfaustbas_tr" class="form-control" value="<?php echo $sonuc["yorumustbaslik_tr"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Yorum Sayfası Üst Başlık <b style="color: blue">(EN)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="yorumsayfaustbas_en" class="form-control" value="<?php echo $sonuc["yorumustbaslik_en"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Yorum Sayfası Başlık <b style="color: red">(TR)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="yorumsayfabas_tr" class="form-control" value="<?php echo $sonuc["yorumbaslik_tr"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Yorum Sayfası Başlık <b style="color: blue">(EN)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="yorumsayfabas_en" class="form-control" value="<?php echo $sonuc["yorumbaslik_en"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>İletişim Sayfası Üst Başlık <b style="color: red">(TR)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="iletisimsayfaustbas_tr" class="form-control" value="<?php echo $sonuc["iletisimustbaslik_tr"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>İletişim Sayfası Üst Başlık <b style="color: blue">(EN)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="iletisimsayfaustbas_en" class="form-control" value="<?php echo $sonuc["iletisimustbaslik_en"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>İletişim Sayfası Başlık <b style="color: red">(TR)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="iletisimsayfabas_tr" class="form-control" value="<?php echo $sonuc["iletisimbaslik_tr"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>İletişim Sayfası Başlık <b style="color: blue">(EN)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="iletisimsayfabas_en" class="form-control" value="<?php echo $sonuc["iletisimbaslik_en"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Hizmetler Sayfası Üst Başlık <b style="color: red">(TR)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="hizmetlersayfaustbas_tr" class="form-control" value="<?php echo $sonuc["hizmetustbaslik_tr"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Hizmetler Sayfası Üst Başlık <b style="color: blue">(EN)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="hizmetlersayfaustbas_en" class="form-control" value="<?php echo $sonuc["hizmetustbaslik_en"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Hizmetler Sayfası Başlık <b style="color: red">(TR)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="hizmetlersayfabas_tr" class="form-control" value="<?php echo $sonuc["hizmetlerbaslik_tr"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Hizmetler Sayfası Başlık <b style="color: blue">(EN)</b></span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="hizmetlersayfabas_en" class="form-control" value="<?php echo $sonuc["hizmetlerbaslik_en"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Harita Bilgisi</span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="haritabilgi" class="form-control" value="<?php echo $sonuc["haritabilgi"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Footer Bilgisi</span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <input type="text" name="footer" class="form-control" value="<?php echo $sonuc["footer"]; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- ***************** -->
                    <div class="col-lg-7 mx-auto border">
                        <div class="row">
                            <div class="col-lg-3 border-right pt-3">
                                <span>Gelen Mesaj Tercihi</span>
                            </div>
                            <div class="col-lg-9 p-1">
                                <div class="row">
                                    <div class="col-lg-4  text-danger border-right">
                                        Sadece Mail
                                        <input type="radio" name="mesajtercih" value=1" class="mt-2" <?php echo ($sonuc["mesajtercih"]==1) ? "checked='checked'": "" ?>>
                                    </div>
                                    <div class="col-lg-4 text-danger border-right">
                                        Hem Mail Hem Mesaj
                                        <input type="radio" name="mesajtercih" value="2" class="mt-2" <?php echo ($sonuc["mesajtercih"]==2) ? "checked='checked'": "" ?> >
                                    </div>
                                    <div class="col-lg-4 text-danger">
                                        Sadece Mesaj
                                        <input type="radio" name="mesajtercih" value="3" class="mt-2" <?php echo ($sonuc["mesajtercih"]==3) ? "checked='checked'": "" ?> >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 mx-auto mt-2 border-bottom">
                        <input type="submit" name="button" class="btn btn-info m-1" value="GÜNCELLE">
                    </div>
                </div>
            </form>
        <?php
        endif;
}

function sifrele($veri) {
    return base64_encode(gzdeflate(gzcompress(serialize($veri))));
}

function coz($veri) {
    return unserialize(gzuncompress(gzinflate(base64_decode($veri))));
}

function kuladial() {
    $cookid=$_COOKIE["kulbilgi"];
    $cozduk=self::coz($cookid);
    $sorgusonuc=self::sorgum("select * from yonetim where id=$cozduk",1);
    return $sorgusonuc["kulad"];
}

function giriskontrol($kulad,$sifre) {
    $sifrelihal=md5(sha1(md5($sifre)));
    $sor=$this->prepare("select * from yonetim where kulad='$kulad' and sifre='$sifrelihal'");
    $sor->execute();
    if ($sor->rowCount()==0) :
        echo '
             <div class=container-fluid bg-white>
             <div class="alert alert-danger border border-dark mt-5 col-md-5 mx-auto p-3 text-dark font-14 font-weight-bold">
              <img src="load.gif" class="mr-3">BİLGİLER HATALI !</div>';
        header("refresh:2,url=index.php");
    else:
        $gelendeger=$sor->fetch();
        $sor=$this->prepare("update yonetim set aktif=1 where kulad='$kulad' and sifre='$sifrelihal'");
        $sor->execute();
        echo '
             <div class=container-fluid bg-white>
             <div class="alert alert-success border border-dark mt-5 col-md-5 mx-auto p-3 text-dark font-14 font-weight-bold">
              <img src="load.gif" class="mr-3">Giriş Yapılıyor</div>';
        header("refresh:2,url=control.php");
        // cookie
        $id=self::sifrele($gelendeger["id"]);
        setcookie("kulbilgi",$id, time() + 60*60*24);
    endif;
}

function cikis() {
    $cookid=$_COOKIE["kulbilgi"];
    $cozduk=self::coz($cookid);
    self::sorgum("update yonetim set aktif=0 where id=$cozduk",0);
    setcookie("kulbilgi",$cookid, time() - 5);
    echo '
             <div class=container-fluid bg-white>
             <div class="alert alert-danger border border-dark mt-5 col-md-5 mx-auto p-3 text-dark font-14 font-weight-bold">
              <img src="load.gif" class="mr-3">Çıkış Yapılıyor.</div>';
    header("refresh:2,url=index.php");
}

function kontrolet($sayfa) {
    if (isset($_COOKIE["kulbilgi"])):
    /*
            (2.bir yöntem)
     - Giriş yapan kullanıcının bilgilerini teyit etmek için db ye bağlanabilirsin
     - O bilgiler ile sağlama yaparak daha fazla kontrol yapabilirsin.
   */
        if ($sayfa=="ind") :  header("Location:control.php"); endif;
    else:
        if ($sayfa=="cot") :  header("Location:index.php"); endif;
    endif;
}

// ---------------------- INTRO ---------------------------------

function introayar() {
    echo '<div class="row text-center">
     <div class="col-lg-12 border-bottom"><h4 class="float-left mt-3 text-dark mb-2">
     <a href="control.php?sayfa=introresimekle" class="ti-plus bg-dark p-1 text-white mr-2 mt-3"></a>
     İNTRO RESİMLERİ</h4></div>';
    $introbilgiler=self::sorgum( "select * from intro",2);
    while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)) :
        echo '<div class="col-lg-4">
               
             <div class="row p-1 m-1">
                 <div class="col-lg-12 ">
                 <img src="../'.$sonbilgi['resimyol'].'">
                 <kbd class="bg-white p-2" style="position:absolute; bottom:10px; right:10px;">
                  <a href="control.php?sayfa=introresimguncelle&id='.$sonbilgi['id'].'" class="ti-reload m-2 
                  text-success" style="font-size:20px;"></a>'; ?>
                  <a onclick="silmedenSor('control.php?sayfa=introresimsil&id=<?php echo $sonbilgi['id']; ?>'); return false" class="ti-trash m-2
                  text-danger" style="font-size:20px;"></a>
              <?php   echo '
                 </kbd>
            </div>             
            </div>            
            </div>';
    endwhile;
    echo '</div>';
}

function introresimekle() {
        echo '<div class="row text-center">
              <div class="col-lg-12">';
        if ($_POST) :
            // ilk dosyanın boş olup olmadığına bakıcaz.
            // dosyanın boyutuna bakıcaz.
            // dosyanın uzantısına bakıcaz.
            // sonn.
            if ($_FILES["dosya"]["name"]=="") :
              ?>  <script>
                 BilgiPenceresi("control.php?sayfa=introresimekle","BAŞARISIZ","DOSYA YÜKLENMEDİ(BOŞ OLAMAZ)","warning");
                </script> <?php
            else : // boş değilse.
                if ($_FILES["dosya"]["size"]> (1024*1024*5)) :
                    ?>  <script>
                    BilgiPenceresi("control.php?sayfa=introresimekle","BAŞARISIZ","DOSYA BOYUTU FAZLA","warning");
                </script> <?php
                else : // boyutta bir problem yok ise.
                    $izinverilen=array("image/png","image/jpg","image/jpeg");
                endif;
                if (!in_array($_FILES["dosya"]["type"],$izinverilen)) :
                    ?>  <script>
                    BilgiPenceresi("control.php?sayfa=introresimekle","BAŞARISIZ","İZİN VERİLEN UZANTI DEĞİL","warning");
                </script> <?php
                else : // artık herşey tamam
                    $uzanti=explode(".",$_FILES["dosya"]["name"]);
                    $randdeger=md5(mt_rand(0,9995499));
                    $yeniisim =$randdeger.".".end($uzanti);
                    $dosyaminyolu='../img/carousel/'.$yeniisim;
                    move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
                    ?>  <script>
                    BilgiPenceresi("control.php?sayfa=introayar","BAŞARILI","RESİM BAŞARIYLA YÜKLENDİ","success");
                    </script> <?php
                    // dosya yüklendikten sonra veritabanına'da bu kaydı eklemem lazım.
                    $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
                    $kayitekle=self::sorgum("insert into intro (resimyol) VALUES('$dosyaminyolu2')",0);
                endif;
            endif;
        else:
            ?>
            <div class="col-lg-12 p-2 text-left bg-light"><?php $this->sayfanavi("introayar","İntrolar","İntro Ekle"); ?></div>
            <div class="col-lg-4 mx-auto mt-2">
                <div class="card card-bordered">
                    <div class="card-body">
                        <h5 class="title border-bottom">İntro Resim Yükleme Formu</h5>
                        <form action="" method="post" enctype="multipart/form-data">
                            <p class="card-text"><input type="file" name="dosya"></p>
                            <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1">
                        </form>
                        <p class="card-text text-left text-danger border-top">
                            * İzin verilen formatlar : jpg-png-jpeg<br />
                            * İzin verilen max.boyut : 5MB
                        </p>
                    </div>
                </div>
            </div>
        <?php
        endif;
        echo '</div></div></div>';
    }

function introsil() {
    $introid=$_GET["id"];
    $verial=self::sorgum("select * from intro where id=$introid",1);
    echo '<div class="row text-center">
       <div class="col-lg-12">';
    // veritabanı veri silme
    self::sorgum("delete from intro where id=$introid",0);
    //dosyayı silme
    unlink("../".$verial["resimyol"]);
    ?>  <script>
        BilgiPenceresi("control.php?sayfa=introayar","BAŞARILI","RESİM BAŞARIYLA SİLİNDİ","success");
    </script> <?php
}

function introresimguncelle() {

    $gelenintroid=$_GET["id"];
    echo '<div class="row text-center">
            <div class="col-lg-12">';
    if ($_POST) :
        $formdangelenid=$_POST["introid"];
        if ($_FILES["dosya"]["name"]=="") :
            ?>  <script>
            BilgiPenceresi("control.php?sayfa=introayar","BAŞARISIZ","DOSYA YÜKLENMEDİ(BOŞ OLAMAZ)","warning");
        </script> <?php
        else : // boş değilse.
            if ($_FILES["dosya"]["size"]> (1024*1024*5)) :
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=introayar","BAŞARISIZ","DOSYA BOYUTU FAZLA","warning");
            </script> <?php
            else : // boyutta bir problem yok ise.
                $izinverilen=array("image/png","image/jpg","image/jpeg");
            endif;
            if (!in_array($_FILES["dosya"]["type"],$izinverilen)) :
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=introayar","BAŞARISIZ","İZİN VERİLEN UZANTI DEĞİL","warning");
            </script> <?php
            else : // artık herşey tamam
                // veritabanında gelen veriyi çektik ve dosyayı sildik.
                $resimyolunabak=self::sorgum("select * from intro where id=$gelenintroid",1);
                  $dbgelenyol='../'.$resimyolunabak["resimyol"];
                  unlink($dbgelenyol);
                // veritabanında gelen veriyi çektik ve dosyayı sildik.
                $dosyaminyolu='../img/carousel/'.$_FILES["dosya"]["name"];
                move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
                $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
                self::sorgum("update intro set resimyol='$dosyaminyolu2' where id=$gelenintroid",0);
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=introayar","BAŞARILI","RESİM BAŞARIYLA GÜNCELLENDİ","success");
            </script> <?php
            endif;
        endif;
    else:
        ?>
        <div class="col-lg-12 p-2 text-left bg-light"><?php $this->sayfanavi("introayar","İntrolar","İntro Güncelle"); ?></div>
        <div class="col-lg-4 mx-auto mt-2">
            <div class="card card-bordered">
                <div class="card-body">
                    <h5 class="title border-bottom">İntro Resim Güncelleme Formu</h5>
                    <form action="" method="post" enctype="multipart/form-data">
                        <p class="card-text"><input type="file" name="dosya"></p>
                        <p class="card-text"><input type="hidden" name="introid" value="<?php echo $gelenintroid; ?>"></p>
                        <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1">
                    </form>
                    <p class="card-text text-left text-danger border-top">
                        * İzin verilen formatlar : jpg-png-jpeg<br />
                        * İzin verilen max.boyut : 5MB
                    </p>
                </div>
            </div>
        </div>
    <?php
    endif;
    echo '</div></div></div>';
}


// ---------------------- ARAÇ FİLO ---------------------------------

function aracfilo() {

        echo '<div class="row text-center">
     <div class="col-lg-12 border-bottom"><h4 class="float-left mt-3 text-dark mb-2"><a href="control.php?sayfa=aracfiloekle" class="ti-plus bg-dark p-1 text-white mr-2 mt-3"></a>
     ARAÇ FİLO RESİMLERİ</h4>
     </div>';


        $introbilgiler=self::sorgum( "select * from filomuz",2);

        while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)) :

            echo '<div class="col-lg-4">
               
             <div class="row p-1 m-1">
                 <div class="col-lg-12">
                 <img src="../'.$sonbilgi['resimyol'].'">
                 <kbd class="bg-white p-2" style="position:absolute; bottom:10px; right:10px;">
                  <a href="control.php?sayfa=aracfiloguncelle&id='.$sonbilgi['id'].'" class="ti-reload m-2 
                  text-success" style="font-size:20px;"></a>'; ?>
                  
                  <a onclick="silmedenSor('control.php?sayfa=aracfilosil&id=<?php echo $sonbilgi['id']; ?>'); return false" class="ti-trash m-2
                  text-danger" style="font-size:20px;"></a>
                  <?php echo '
                 </kbd>
                 </div>
             
              </div>  
            
            </div>';

        endwhile;

        echo '</div>';

    }

function aracfiloekle() {
        echo '<div class="row text-center">
<div class="col-lg-12">
';

        if ($_POST) :
            // ilk dosyanın boş olup olmadığına bakıcaz.
            // dosyanın boyutuna bakıcaz.
            // dosyanın uzantısına bakıcaz.
            // sonn.

            if ($_FILES["dosya"]["name"]=="") :
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=aracfiloekle","BAŞARISIZ","DOSYA YÜKLENMEDİ(BOŞ OLAMAZ)","warning");
            </script> <?php
            else : // boş değilse.
                if ($_FILES["dosya"]["size"]> (1024*1024*5)) :
                    ?>  <script>
                    BilgiPenceresi("control.php?sayfa=aracfiloekle","BAŞARISIZ","DOSYA BOYUTU FAZLA","warning");
                </script> <?php
                else : // boyutta bir problem yok ise.
                    $izinverilen=array("image/png","image/jpg","image/jpeg");
                endif;
                if (!in_array($_FILES["dosya"]["type"],$izinverilen)) :
                    ?>  <script>
                    BilgiPenceresi("control.php?sayfa=aracfiloekle","BAŞARISIZ","İZİN VERİLEN UZANTI DEĞİL","warning");
                </script> <?php
                else : // artık herşey tamam

                    $uzanti=explode(".",$_FILES["dosya"]["name"]);
                    $randdeger=md5(mt_rand(0,9995499));
                    $yeniisim =$randdeger.".".end($uzanti);

                    $dosyaminyolu='../img/filo/'.$yeniisim;

                    move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
                    ?>  <script>
                    BilgiPenceresi("control.php?sayfa=aracfilo","BAŞARILI","RESİM BAŞARIYLA YÜKLENDİ","success");
                </script> <?php
                    // dosya yüklendikten sonra veritabanına'da bu kaydı eklemem lazım.
                    $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
                    self::sorgum("insert into filomuz (resimyol) VALUES('$dosyaminyolu2')",0);
                endif;

            endif;



        else:
            ?>
            <div class="col-lg-12 p-2 text-left bg-light"><?php $this->sayfanavi("aracfilo","Araç Filo","Araç Filo Ekle"); ?></div>
            <div class="col-lg-4 mx-auto mt-2">
                <div class="card card-bordered">
                    <div class="card-body">
                        <h5 class="title border-bottom">Araç Filo Resim Yükleme Formu</h5>
                        <form action="" method="post" enctype="multipart/form-data">
                            <p class="card-text"><input type="file" name="dosya"></p>
                            <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1">
                        </form>
                        <p class="card-text text-left text-danger border-top">
                            * İzin verilen formatlar : jpg-png-jpeg<br />
                            * İzin verilen max.boyut : 5MB
                        </p>
                    </div>
                </div>
            </div>

        <?php

        endif;
        echo '</div></div></div>';

    }

function aracfilosil() {
        $introid=$_GET["id"];

        $verial=self::sorgum("select * from filomuz where id=$introid",1);

        echo '<div class="row text-center">
       <div class="col-lg-12">';

        // veritabanı veri silme
        self::sorgum("delete from filomuz where id=$introid",0);

        //dosyayı silme
        unlink("../".$verial["resimyol"]);
    ?>  <script>
        BilgiPenceresi("control.php?sayfa=aracfilo","BAŞARILI","RESİM BAŞARIYLA SİLİNDİ","success");
    </script> <?php

    }

function aracfiloguncelle() {

        $gelenintroid=$_GET["id"];

        echo '<div class="row text-center">
<div class="col-lg-12">
';

        if ($_POST) :
            // ilk dosyanın boş olup olmadığına bakıcaz.
            // dosyanın boyutuna bakıcaz.
            // dosyanın uzantısına bakıcaz.
            // sonn.

            $formdangelenid=$_POST["introid"];

            if ($_FILES["dosya"]["name"]=="") :
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=aracfilo","BAŞARISIZ","DOSYA YÜKLENMEDİ(BOŞ OLAMAZ)","warning");
            </script> <?php
            else : // boş değilse.
                if ($_FILES["dosya"]["size"]> (1024*1024*5)) :
                    ?>  <script>
                    BilgiPenceresi("control.php?sayfa=aracfilo","BAŞARISIZ","DOSYA BOYUTU FAZLA","warning");
                </script> <?php
                else : // boyutta bir problem yok ise.
                    $izinverilen=array("image/png","image/jpg","image/jpeg");
                endif;
                if (!in_array($_FILES["dosya"]["type"],$izinverilen)) :
                    ?>  <script>
                    BilgiPenceresi("control.php?sayfa=aracfilo","BAŞARISIZ","İZİN VERİLEN UZANTI DEĞİL","warning");
                </script> <?php
                else : // artık herşey tamam
                    // veritabanında gelen veriyi çektik ve dosyayı sildik.
                    $resimyolunabak=self::sorgum("select * from filomuz where id=$gelenintroid",1);
                    $dbgelenyol='../'.$resimyolunabak["resimyol"];
                    unlink($dbgelenyol);
                    // veritabanında gelen veriyi çektik ve dosyayı sildik.


                    $dosyaminyolu='../img/filo/'.$_FILES["dosya"]["name"];
                    move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);

                    $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
                    self::sorgum("update filomuz set resimyol='$dosyaminyolu2' where id=$gelenintroid",0);
                    ?>  <script>
                    BilgiPenceresi("control.php?sayfa=aracfilo","BAŞARILI","RESİM BAŞARIYLA GÜNCELLENDİ","success);
                </script> <?php

                endif;

            endif;



        else:
            ?>
            <div class="col-lg-12 p-2 text-left bg-light"><?php $this->sayfanavi("aracfilo","Araç Filo","Araç Filo Güncelle"); ?></div>
            <div class="col-lg-4 mx-auto mt-2">
                <div class="card card-bordered">
                    <div class="card-body">
                        <h5 class="title border-bottom">Araç Filo Resim Güncelleme Formu</h5>
                        <form action="" method="post" enctype="multipart/form-data">
                            <p class="card-text"><input type="file" name="dosya"></p>
                            <p class="card-text"><input type="hidden" name="introid" value="<?php echo $gelenintroid; ?>"></p>
                            <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1">
                        </form>
                        <p class="card-text text-left text-danger border-top">
                            * İzin verilen formatlar : jpg-png-jpeg<br />
                            * İzin verilen max.boyut : 5MB
                        </p>
                    </div>
                </div>
            </div>

        <?php

        endif;
        echo '</div></div></div>';

    }

// ---------------------- GELEN MESAJLAR ---------------------------------

private function mailgetir($veriler) {
    $sor=$this->prepare("select * from $veriler[0] where durum=$veriler[1]");
    $sor->execute();
    return $sor;
}

function gelenmesajlar() {
    echo '<div class="row">
             <div class="col-lg-12 mt-2">
               <div class="card">
                  <div class="card-body">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                  
                  <li class="nav-item">
                  <a class="nav-link active" id="gelen-tab" data-toggle="tab" href="#gelen" role="tab" 
                    aria-control="gelen" aria-selected="true"> <kbd>'.self::mailgetir(array("gelenmail",0))->rowCount().'</kbd> GELEN MESAJLAR</a>                 
                  </li>
                  
                  <li class="nav-item">
                  <a class="nav-link" id="okunmus-tab" data-toggle="tab" href="#okunmus" role="tab" 
                    aria-control="okunmus" aria-selected="false"> <kbd>'.self::mailgetir(array("gelenmail",1))->rowCount().'</kbd> OKUNMUŞ MESAJLAR</a>                 
                  </li>
                  
                  <li class="nav-item">
                  <a class="nav-link" id="arisv-tab" data-toggle="tab" href="#arsiv" role="tab" 
                    aria-control="arsiv" aria-selected="false"> <kbd>'.self::mailgetir(array("gelenmail",2))->rowCount().'</kbd> ARŞİVLENEN MESAJLAR</a>                 
                  </li>
                 
                  </ul>
                  
                  <div class="tab-content mt-3" id="benimtab">
                    <div class="tab-pane fade show active" id="gelen" role="tabpanel" aria-labelledby="gelen-tab">';

                    $sonuc=self::mailgetir(array("gelenmail",0));

                    if ($sonuc->rowCount()!=0) :

                        while ($sonucson=$sonuc->fetch(PDO::FETCH_ASSOC)) :

                            echo '<div class="row">
                                   <div class="col-lg-12 bg-light mt-2 font-weight-bold" style="border-radius:5px; border:1px solid #eeeeee;">
                                   
                                   <div class=" row border-bottom">
                                    
                                     <div class="col-lg-1 p-1">Ad & Ünvan</div>
                                     <div class="col-lg-2 p-1 text-primary">'.$sonucson["ad"].'</div>
                                     <div class="col-lg-1 p-1">Mail Adresi</div>
                                     <div class="col-lg-2 p-1 text-primary">'.$sonucson["mailadres"].'</div>
                                     <div class="col-lg-1 p-1">Konu</div>
                                     <div class="col-lg-2 p-1 text-primary">'.$sonucson["konu"].'</div>
                                     <div class="col-lg-1 p-1">Tarih</div>
                                     <div class="col-lg-1 p-1 text-primary">'.$sonucson["zaman"].'</div>
                                     <div class="col-lg-1 p-1">
                                 <a href="control.php?sayfa=mesajoku&id='.$sonucson["id"].'"> <i class="fa fa-folder-open border-right pr-2 text-dark" style="font-size: 20px;"></i></a>   
                                 <a href="control.php?sayfa=mesajarsivle&id='.$sonucson["id"].'">    <i class="fa fa-share pr-2 text-dark" style="font-size: 20px;"></i></a>
                                 <a href="control.php?sayfa=mesajsil&id='.$sonucson["id"].'">    <i class="fa fa-close pr-2 text-dark" style="font-size: 20px;"></i></a>
                                     </div>
                                     
                            </div>
                            </div>
                            </div>
                            
                            ';

                    endwhile;

                    else :

                        echo '<div class="alert alert-info">GELEN MESAJ YOK</div>';


                    endif;

                    echo'</div> 
                    
    <div class="tab-pane fade show-active" id="okunmus" role="tabpanel" aria-labelledby="okunmus-tab">';

    $sonuc=self::mailgetir(array("gelenmail",1));

    if ($sonuc->rowCount()!=0) :

        while ($sonucson=$sonuc->fetch(PDO::FETCH_ASSOC)) :

            echo '<div class="row">
                                   <div class="col-lg-12 bg-light mt-2 font-weight-bold" style="border-radius:5px; border:1px solid #eeeeee;">
                                   
                                   <div class=" row border-bottom">
                                    
                                     <div class="col-lg-1 p-1">Ad & Ünvan</div>
                                     <div class="col-lg-2 p-1 text-primary">'.$sonucson["ad"].'</div>
                                     <div class="col-lg-1 p-1">Mail Adresi</div>
                                     <div class="col-lg-2 p-1 text-primary">'.$sonucson["mailadres"].'</div>
                                     <div class="col-lg-1 p-1">Konu</div>
                                     <div class="col-lg-2 p-1 text-primary">'.$sonucson["konu"].'</div>
                                     <div class="col-lg-1 p-1">Tarih</div>
                                     <div class="col-lg-1 p-1 text-primary">'.$sonucson["zaman"].'</div>
                                     <div class="col-lg-1 p-1">
                                 <a href="control.php?sayfa=mesajoku&id='.$sonucson["id"].'"> <i class="fa fa-folder-open border-right pr-2 text-dark" style="font-size: 20px;"></i></a>   
                                 <a href="control.php?sayfa=mesajarsivle&id='.$sonucson["id"].'">    <i class="fa fa-share pr-2 text-dark" style="font-size: 20px;"></i></a>
                                 <a href="control.php?sayfa=mesajsil&id='.$sonucson["id"].'">    <i class="fa fa-close pr-2 text-dark" style="font-size: 20px;"></i></a>
                                     </div>
                                     
                            </div>
                            </div>
                            </div>
                            
                            ';

        endwhile;

    else :

        echo '<div class="alert alert-info">OKUNMUŞ MESAJ YOK</div>';


    endif;

    echo'</div> 
                    
                    
    <div class="tab-pane fade show-active" id="arsiv" role="tabpanel" aria-labelledby="arsiv-tab">';

    $sonuc=self::mailgetir(array("gelenmail",2));

    if ($sonuc->rowCount()!=0) :

        while ($sonucson=$sonuc->fetch(PDO::FETCH_ASSOC)) :

            echo '<div class="row">
                                   <div class="col-lg-12 bg-light mt-2 font-weight-bold" style="border-radius:5px; border:1px solid #eeeeee;">
                                   
                                   <div class=" row border-bottom">
                                    
                                     <div class="col-lg-1 p-1">Ad & Ünvan</div>
                                     <div class="col-lg-2 p-1 text-primary">'.$sonucson["ad"].'</div>
                                     <div class="col-lg-1 p-1">Mail Adresi</div>
                                     <div class="col-lg-2 p-1 text-primary">'.$sonucson["mailadres"].'</div>
                                     <div class="col-lg-1 p-1">Konu</div>
                                     <div class="col-lg-2 p-1 text-primary">'.$sonucson["konu"].'</div>
                                     <div class="col-lg-1 p-1">Tarih</div>
                                     <div class="col-lg-1 p-1 text-primary">'.$sonucson["zaman"].'</div>
                                     <div class="col-lg-1 p-1">
                                 <a href="control.php?sayfa=mesajoku&id='.$sonucson["id"].'"> <i class="fa fa-folder-open border-right pr-2 text-dark" style="font-size: 20px;"></i></a>   
                                 <a href="control.php?sayfa=mesajarsivle&id='.$sonucson["id"].'">    <i class="fa fa-share pr-2 text-dark" style="font-size: 20px;"></i></a>
                                 <a href="control.php?sayfa=mesajsil&id='.$sonucson["id"].'">    <i class="fa fa-close pr-2 text-dark" style="font-size: 20px;"></i></a>
                                     </div>
                                     
                            </div>
                            </div>
                            </div>
                            
                            ';

        endwhile;

    else :

        echo '<div class="alert alert-info">ARŞİVLENMİŞ MESAJ YOK</div>';


    endif;

    echo'</div> 
                   
                  </div>
                  
                    </div>
                  </div>
                 </div>
               </div>';


}

function mesajdetay($id) {

$mesajbilgi=self::sorgum("select * from gelenmail where id=$id",1);

            echo '<div class="row m-2">
                                   <div class="col-lg-12 bg-light mt-2 font-weight-bold" style="border-radius:5px; border:1px solid #eeeeee;">
                                   
                                   <div class=" row border-bottom">
                                    
                                     <div class="col-lg-1 p-1">Ad & Ünvan</div>
                                     <div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["ad"].'</div>
                                     <div class="col-lg-1 p-1">Mail Adresi</div>
                                     <div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["mailadres"].'</div>
                                     <div class="col-lg-1 p-1">Konu</div>
                                     <div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["konu"].'</div>
                                     <div class="col-lg-1 p-1">Tarih</div>
                                     <div class="col-lg-1 p-1 text-primary">'.$mesajbilgi["zaman"].'</div>
                                     <div class="col-lg-1 p-1">
                                 <a href="control.php?sayfa=mesajarsivle&id='.$mesajbilgi["id"].'">    <i class="fa fa-share pr-2 text-dark" style="font-size: 20px;"></i></a>
                                 <a href="control.php?sayfa=mesajsil&id='.$mesajbilgi["id"].'">    <i class="fa fa-close pr-2 text-dark" style="font-size: 20px;"></i></a>
                                     </div>
                                     
                                      </div>
                                     
                                      <div class="row text-left p-2">
                                         <div class="col-lg-12">
                                          '.$mesajbilgi["mesaj"].'
                                         </div>
                                      
                                       </div>
                               
                            </div>
                            </div>
                            
                          </div>';

// mesajın durumunu güncelliyorum.
    self::sorgum("update gelenmail set durum=1 where id=$id",0);

}

function mesajarsivle($id) {


        echo '<div class="row m-2">
             <div class="col-lg-12 mt-2" style="border-radius:5px; border:1px solid #eeeeee;">
             
             <div class="alert alert-info mt-2 mb-2">MESAJ ARŞİVLENDİ</div>
   
                            </div>
                            
                          </div>';
     header("refresh:2,url=control.php?sayfa=gelenmesaj");

        self::sorgum("update gelenmail set durum=2 where id=$id",0);

    }

function mesajsil($id) {

        echo '<div class="row m-2">
             <div class="col-lg-12 mt-2" style="border-radius:5px; border:1px solid #eeeeee;">
             
             <div class="alert alert-info mt-2 mb-2">MESAJ SİLNDİ</div>
   
                            </div>
                            
                          </div>';
        header("refresh:2,url=control.php?sayfa=gelenmesaj");

        self::sorgum("delete from gelenmail where id=$id",0);

    }






















}




?>
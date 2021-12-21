<?php

class yetkiKontrol extends yonetim {


// ---------------------- MEVCUT YETKİLERİNİN DURUMUNA BAKILIYOR ---------------------------------

function __construct() {

    parent::__construct();

    $cookid=$_COOKIE["kulbilgi"];

    $cozduk=parent::coz($cookid);

    $yetkibak=parent::sorgum( "select * from yonetim where id=".$cozduk,1);

    $this->genel_yetki=$yetkibak["genel_yetki"];
    $this->intro_yetki=$yetkibak["intro_yetki"];
    $this->arac_yetki=$yetkibak["arac_yetki"];
    $this->video_yetki=$yetkibak["video_yetki"];
    $this->hakkimiz_yetki=$yetkibak["hakkimiz_yetki"];
    $this->hizmet_yetki=$yetkibak["hizmet_yetki"];
    $this->referans_yetki=$yetkibak["referans_yetki"];
    $this->tasarim_yetki=$yetkibak["tasarim_yetki"];
    $this->yorum_yetki=$yetkibak["yorum_yetki"];
    $this->mesaj_yetki=$yetkibak["mesaj_yetki"];
    $this->bulten_yetki=$yetkibak["bulten_yetki"];
    $this->haber_yetki=$yetkibak["haber_yetki"];
    $this->yonetici_yetki=$yetkibak["yonetici_yetki"];
    $this->ayar_yetki=$yetkibak["ayar_yetki"];

}

function bolumkontrol($mevcutyetki) {
    if ($this->$mevcutyetki!=1) :
        header("Location:control.php");
    exit();
    endif;
}

function linkkontrol() {

if ($this->intro_yetki==1) :
   echo '<li><a href="control.php?sayfa=introayar"><i class="ti-image"></i> <span>İntro Ayarları</span></a></li>';
endif;

    if ($this->arac_yetki==1) :
       echo '<li><a href="control.php?sayfa=aracfilo"><i class="ti-car"></i> <span>Araç Filosu</span></a></li>';
    endif;

    if ($this->video_yetki==1) :
        echo '<li><a href="control.php?sayfa=videolar"><i class="ti-video-clapper"></i> <span>Video Yönetimi</span></a></li>';
    endif;

    if ($this->hakkimiz_yetki==1) :
        echo '<li><a href="control.php?sayfa=hakkimizda"><i class="ti-flag"></i> <span>Hakkımızda Ayarları</span></a></li>';
    endif;

    if ($this->hizmet_yetki==1) :
        echo '<li><a href="control.php?sayfa=hizmet"><i class="ti-medall"></i> <span>Hizmet Ayarları</span></a></li>';
    endif;

    if ($this->referans_yetki==1) :
        echo '<li><a href="control.php?sayfa=referans"><i class="ti-eye"></i> <span>Referans Ayarları</span></a></li>';
    endif;

    if ($this->tasarim_yetki==1) :
        echo '<li><a href="control.php?sayfa=tas"><i class="ti-pencil-alt"></i> <span>Tasarım Ayarları</span></a></li>';
    endif;

    if ($this->yorum_yetki==1) :
        echo '<li><a href="control.php?sayfa=yorumlar"><i class="ti-comment-alt"></i> <span>Müşteri Yorumları</span></a></li>';
    endif;

    if ($this->mesaj_yetki==1) :
        echo '<li><a href="control.php?sayfa=gelenmesaj"><i class="fa fa-envelope"></i> <span>Gelen Mesajlar</span></a></li>';
    endif;

    if ($this->bulten_yetki==1) :
        echo ' <li><a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-cog"></i> <span>İletişim Yönetimi</span></a>
                           <ul class="collapse">
                               <li><a href="control.php?sayfa=bulten"><i class="ti-blackboard"></i> <span>Bülten Ayarları</span></a></li>                       
                               <li><a href="control.php?sayfa=mailgonderme"><i class="ti-pencil-alt"></i> <span>Mail Gönderme Ayarları</span></a></li>
                           </ul>
                        </li>';
    endif;

    if ($this->haber_yetki==1) :
        echo '<li><a href="control.php?sayfa=haberler"><i class="ti-agenda"></i> <span>Haber Ayarları</span></a></li>';
    endif;

    if ($this->yonetici_yetki==1) :
        echo '<li><a href="control.php?sayfa=kulayar"><i class="ti-user"></i> <span>Kullanıcı Ayarları</span></a></li>';
    endif;

    if ($this->ayar_yetki==1) :
        echo ' <li><a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-cog"></i> <span>Ayarlar</span></a>
                           <ul class="collapse">
                               <li><a href="control.php?sayfa=siteayar"><i class="ti-pencil"></i> <span>Site Ayarları</span></a></li>
                               <li><a href="control.php?sayfa=mailayar"><i class="fa fa-at"></i> <span>Mail Ayarları</span></a></li>
                               <li><a href="control.php?sayfa=linkayar"><i class="fa fa-link"></i> <span>Link Ayarları</span></a></li>
                               <li><a href="control.php?sayfa=bakim"><i class="ti-server"></i> <span>Veritabanı Bakım</span></a></li>
                               <li><a href="control.php?sayfa=yedek"><i class="ti-archive"></i> <span>Veritabanı Yedek</span></a></li>
                           </ul>
                        </li>';
    endif;

}

}


?>
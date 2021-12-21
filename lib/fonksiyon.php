<?php


class kurumsal extends PDO {
    public $normaltitle,$metatitle,$metadesc,$metakey,$metaauthor,$metaown,$metacopy,
        $logoyazi,$twit,$face,$inst,$link,$telno,$mailadres,$normaladres,$slogan,
        $referansbaslik,$referans_ustbaslik,$filobaslik,$filoustbaslik,$yorumbaslik,$yorumustbaslik,
        $iletisimbaslik,$iletisimustbaslik,$hizmetlerbaslik,$hizmetustbaslik,$videoustbaslik,$videobaslik,$haberlermetin,$haritabilgi,$footer;

public $adresbilgi,$telefonbilgi,$adbilgi,$mailbilgi,$konubilgi,$butonbilgi;

protected $linkidleri=array();

    function __construct() {
        parent::__construct("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8",DB_KULAD,DB_SİFRE);



        $ayarcek=$this->prepare("SELECT * from ayarlar");
        $ayarcek->execute();
        $sorguson=$ayarcek->fetch();
        $this->normaltitle=$sorguson["title"];
        $this->metatitle=$sorguson["metatitle"];
        $this->metadesc=$sorguson["metadesc"];
        $this->metakey=$sorguson["metakey"];
        $this->metaauthor=$sorguson["metaauthor"];
        $this->metaown=$sorguson["metaowner"];
        $this->metacopy=$sorguson["metacopy"];
        $this->logoyazi=$sorguson["logoyazisi"];
        $this->twit=$sorguson["twitter"];
        $this->face=$sorguson["facebook"];
        $this->inst=$sorguson["instagram"];
        $this->link=$sorguson["linkedin"];
        $this->telno=$sorguson["telefonno"];
        $this->mailadres=$sorguson["mailadres"];
        $this->normaladres=$sorguson["adres"];
        $this->haritabilgi=$sorguson["haritabilgi"];
        $this->footer=$sorguson["footer"];
        $this->URL=$sorguson["url"];

        if (@$_SESSION["dil"]=="tr") :
            $this->slogan=$sorguson["slogan_tr"];
           //------------------------------------------------------------------
            $this->referansbaslik=$sorguson["referansbaslik_tr"];
            $this->referans_ustbaslik=$sorguson["referans_ustbaslik_tr"];
            //-------------------------------------------------------------
            $this->filobaslik=$sorguson["filobaslik_tr"];
            $this->filoustbaslik=$sorguson["filoustbaslik_tr"];
            //----------------------------------------------------------------
            $this->yorumbaslik=$sorguson["yorumbaslik_tr"];
            $this->yorumustbaslik=$sorguson["yorumustbaslik_tr"];
            //----------------------------------------------------------------
            $this->iletisimbaslik=$sorguson["iletisimbaslik_tr"];
            $this->iletisimustbaslik=$sorguson["iletisimustbaslik_tr"];
            //----------------------------------------------------------------
            $this->videobaslik=$sorguson["videobaslik_tr"];
            $this->videoustbaslik=$sorguson["videoustbaslik_tr"];
            //----------------------------------------------------------------
            $this->haberlermetin=$sorguson["haberler_tr"];
            //----------------------------------------------------------------
            $this->hizmetlerbaslik=$sorguson["hizmetlerbaslik_tr"];
            $this->hizmetustbaslik=$sorguson["hizmetustbaslik_tr"];
            //----------------------------------------------------------------


            $this->adresbilgi="ADRESİMİZ";
            $this->telefonbilgi="TELEFON NUMARAMIZ";
            $this->adbilgi="Adınız";
            $this->mailbilgi="Email Adresiniz";
            $this->konubilgi="Konuyu Yazınız";
            $this->guvenlikbilgi="Güvenlik Kodunu Girin";
            $this->butonbilgi="Gönder";




        elseif (@$_SESSION["dil"]=="en") :
            $this->slogan=$sorguson["slogan_en"];
        //----------------------------------------------------------------------
            $this->referansbaslik=$sorguson["referansbaslik_en"];
            $this->referans_ustbaslik=$sorguson["referans_ustbaslik_en"];
            //--------------------------------------------------------------------
            $this->filobaslik=$sorguson["filobaslik_en"];
            $this->filoustbaslik=$sorguson["filoustbaslik_en"];
            //---------------------------------------------------------------------
            $this->yorumbaslik=$sorguson["yorumbaslik_en"];
            $this->yorumustbaslik=$sorguson["yorumustbaslik_en"];
            //---------------------------------------------------------------------
            $this->iletisimbaslik=$sorguson["iletisimbaslik_en"];
            $this->iletisimustbaslik=$sorguson["iletisimustbaslik_en"];
            //---------------------------------------------------------------------
            $this->videobaslik=$sorguson["videobaslik_en"];
            $this->videoustbaslik=$sorguson["videoustbaslik_en"];
            //---------------------------------------------------------------------
            $this->haberlermetin=$sorguson["haberler_en"];
            //---------------------------------------------------------------------
            $this->hizmetlerbaslik=$sorguson["hizmetlerbaslik_en"];
            $this->hizmetustbaslik=$sorguson["hizmetustbaslik_en"];
            //---------------------------------------------------------------------


            $this->adresbilgi="ADDRESS";
            $this->telefonbilgi="PHONE NUMBER";
            $this->adbilgi="Name";
            $this->mailbilgi="Your e-mail Address";
            $this->konubilgi="Message subject";
            $this->guvenlikbilgi="Enter security code";
            $this->butonbilgi="Send";

        endif;

    }

    function introbak() {

        $introal=$this->prepare("SELECT * from intro");
        $introal->execute();

        while ($sonucum=$introal->fetch(PDO::FETCH_ASSOC)) :
        echo '<div class="item" style="background-image:url('.$this->URL.'/php-offical/'.$sonucum["resimyol"].');"></div>';
       
        endwhile;
    }

    function hakkimizda() {

        $introal=$this->prepare("SELECT * from hakkimizda");
        $introal->execute();

        $sonucum=$introal->fetch();

        echo '<section id="hakkimizda" class="wow fadeInUp">

              <div class="container">

             <div class="row">
            <div class="col-lg-6 hakkimizda-img">
                <img src="'.$this->URL.'/php-offical/'.$sonucum["resim"].'" alt="'.$this->URL.'/php-offical/'.$sonucum["resim"].'-Hakkında">
            </div>

    <div class="col-lg-6 content">
        <h2>'.$sonucum["baslik_".$_SESSION["dil"]].'</h2>
        <h3>'.$sonucum["icerik_".$_SESSION["dil"]].'</h3>
    </div>

    </div>
    </div>

    </section>';
    }

    function hizmetler($baslik=false) {

        $introal=$this->prepare("SELECT * from hizmetler");
        $introal->execute();


        echo '<div class="section-header">
            <h2>'.$this->hizmetustbaslik.'</h2>
            <p>'.$this->hizmetlerbaslik.'</p>
        </div>
        <div class="row">';
        while($sonucum=$introal->fetch(PDO::FETCH_ASSOC)) :

            echo '<div class="col-lg-6">
                <div class="box wow fadeInDown">
                    <div class="icon"><i class="fa fa-certificate"></i></div>
                    <h4 class="title"><a href="#">'.$sonucum["baslik_".$_SESSION["dil"]].'</a></h4>
                    <p class="description">'.$sonucum["icerik_".$_SESSION["dil"]].'</p>
                </div>
            </div>';


        endwhile;


         echo '</div>';
    }

    function referans($baslik=false) {

        $introal=$this->prepare("SELECT * from referans");
        $introal->execute();

       echo '<div class="section-header">
            <h2>'.$this->referans_ustbaslik.'</h2>
            <p>'.$baslik.'</p>
        </div>

        <div class="owl-carousel clients-carousel">';



       
        while ($sonucum=$introal->fetch(PDO::FETCH_ASSOC)) :

            echo '<img src="'.$this->URL.'/php-offical/'.$sonucum["resimyol"].'" alt="'.$this->URL.'/php-offical/'.$sonucum["id"].'">';

        endwhile;
        
        echo '</div>';
    }

    function filomuz() {

        $introal=$this->prepare("SELECT * from filomuz");
        $introal->execute();

        echo '<section id="filo" class="fadeInUp">

        <div class="container">
      <div class="section-header">
          <h2>'.$this->filoustbaslik.'</h2>
          <p>'; echo $this->filobaslik; echo '</p>
      </div>
  </div>
          <div class="container-fluid">
          <div class="row no-gutters">';
        while ($sonucum=$introal->fetch(PDO::FETCH_ASSOC)) :

            echo ' <div class="col-lg-3 col-md-4">
          <div class="filo-item wow fadeInUp">
          <a href="'.$sonucum["resimyol"].'" class="filo-popup">
              <img src="'.$this->URL.'/php-offical/'.$sonucum["resimyol"].'" alt="'.$this->URL.'/php-offical/'.$sonucum["id"].'">
              <div class="filo-overlay">
          </div>
              </a>
          </div>
          </div>';

        endwhile;
          
        echo '</div></div></section>';
    }

    function yorumlar($baslik=false) {

        $introal=$this->prepare("SELECT * from yorumlar");
        $introal->execute();

        echo '<div class="section-header">
            <h2>'.$this->yorumustbaslik.'</h2>
            <p>'.$baslik.'</p>
        </div>

        <div class="owl-carousel testimonials-carousel">';

        while ($sonucum=$introal->fetch(PDO::FETCH_ASSOC)) :

            echo '<div class="testimonial-item">

                <p>
                    <img src="'.$this->URL.'/php-offical/img/sol.png" class="quote-sign-left" />
                    '.$sonucum["icerik"].'
                    <img src="'.$this->URL.'/php-offical/img/sag.png" class="quote-sign-right" />
                </p>
                <img src="'.$this->URL.'/php-offical/img/yorum.jpg" class="testimonial-img" alt="Müşteri Yorum-'.$sonucum["id"].'" />
                <h3>'.$sonucum["isim"].'</h3>
          </div>';

        endwhile;

        echo '</div></div>';
    }

    function linkler() {

        $tercihbak=$this->prepare("SELECT hiztercih,videotercih from tasarim");
        $tercihbak->execute();
        $gelen=$tercihbak->fetch();

        $arama=$this->prepare("SELECT * from linkler where ad_tr LIKE ? or ad_tr LIKE ?");
        $arama->execute(array('hizmet%','video%'));

        while ($d=$arama->fetch()):
            $this->linkidleri[]=$d["id"];
        endwhile;

        $linkal=$this->prepare("SELECT * from linkler order by siralama ASC");
        $linkal->execute();

        $sayi=0;
        while ($linkson=$linkal->fetch(PDO::FETCH_ASSOC)) :
           if ($sayi==0) :
              echo '<li class="menu-active"><a href="#'.$linkson["etiket"].'">'.$linkson["ad_".$_SESSION["dil"]].'</a></li>';
              $sayi=1;
           else:
               if ($linkson["id"]==$this->linkidleri[0]) :
                   if ($gelen["hiztercih"]==0) :
                       echo '<li><a href="#'.$linkson["etiket"].'">'.$linkson["ad_".$_SESSION["dil"]].'</a></li>';
                   else :
                       continue; // bunun yazıldığı yerden döngü başa döndürülür.


                   endif;
                   elseif ($linkson["id"]==$this->linkidleri[1]) :
                       if ($gelen["videotercih"]==0) :
                           echo '<li><a href="#'.$linkson["etiket"].'">'.$linkson["ad_".$_SESSION["dil"]].'</a></li>';
                       else :
                           continue; // bunun yazıldığı yerden döngü başa döndürülür.


                       endif;

                   else :

                       echo '<li><a href="#'.$linkson["etiket"].'">'.$linkson["ad_".$_SESSION["dil"]].'</a></li>';

               endif;

           endif;

       endwhile;
    }

    function videolar() {

       $videoal=$this->prepare("SELECT * from videolar where durum=1 order by siralama asc");
        $videoal->execute();

        echo ' <div class="container">
      <div class="section-header">
          <h2>'.$this->videoustbaslik.'</h2>
          <p>'; echo $this->videobaslik; echo '</p>
      </div>
  </div>
          <div class="container">
          <div class="row no-gutters">';
         while ($sonucum=$videoal->fetch(PDO::FETCH_ASSOC)) :

        echo ' <div class="col-lg-4 col-md-4 p-1"> 
          <div class="embed-responsive embed-responsive-16by9">
             <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$sonucum["link"].'" allowfullscreen></iframe>
          </div>
          </div>';


        endwhile;

        echo '</div></div>';
    }

    function haberler($baslik=false) {

        $haberal=$this->prepare("SELECT * from haberler");
        $haberal->execute();

       echo '<div class="container wow fadeInUp">

        <div class="row mt-2  pt-3  border-secondary  border-bottom" >

            <div class="col-lg-3 col-md-3 text-right "><h5 >'.$this->haberlermetin.'</h5></div>

<div class="col-lg-9 col-md-9 text-info text-left" id="news-container1">
    <ul style="list-style-type:none;">';
        while($sonucum=$haberal->fetch(PDO::FETCH_ASSOC)) :
            echo' <li>'.$sonucum["icerik_".$_SESSION["dil"]].' </li>';
        endwhile;

    echo'</ul>

</div>
</div>
</div>';
 
    }








}




?>
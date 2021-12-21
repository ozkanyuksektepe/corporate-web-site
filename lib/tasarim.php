<?php
include_once ("fonksiyon.php");

class tasarim extends kurumsal {

    public $hiztercih,$reftercih,$yorumtercih,$videotercih,$bultentercih,$habertercih;

    function __construct() {
        parent::__construct();

        $introal=$this->prepare("SELECT * from tasarim");
        $introal->execute();
        $gelen=$introal->fetch();

        $this->hiztercih=$gelen["hiztercih"];
        $this->reftercih=$gelen["reftercih"];
        $this->yorumtercih=$gelen["yorumtercih"];
        $this->videotercih=$gelen["videotercih"];
        $this->bultentercih=$gelen["bultentercih"];
        $this->habertercih=$gelen["habertercih"];



    }

    function HizmettasarimDuzen() {
        if ($this->hiztercih==0) :
       echo '<section id="hizmetler">
                <div class="container">';
                     parent::hizmetler($this->hizmetlerbaslik);
              echo '</div>
             </section>';

       endif;


    }

    function ReferanstasarimDuzen() {


        if ($this->reftercih==0) :
     echo'<section id="referanslar" class="wow fadeInUp">
      <div class="container">';

        parent::referans($this->referansbaslik);
          echo'</div>

      </section>';
        endif;

    }

    function YorumtasarimDuzen() {


        if ($this->yorumtercih==0) :
         echo'<section id="yorumlar" class="wow fadeInUp">
         <div class="container">';
        parent::yorumlar($this->yorumbaslik);
            echo'</div>
         </section>';

        endif;
    }

    function VideotasarimDuzen() {


        if ($this->videotercih==0) :
           echo'<section id="videolar" class="fadeInUp">';
            parent::videolar();
        echo '</section>';

        endif;
    }

    function bultentasarimDuzen() {


        if ($this->bultentercih==0) :
            echo '<div id="bultentutucu">
                <div class="col-lg-12"><h4 class="pt-2 border bottom">Bültenimize Kayıt Olun</h4></div>
                <form id="bultenform">
                <div class="row">
                <div class="col-lg-6"><input type="text" name="mail" class="form-control" placeholder="Mail adresi" required="required"></div>

                <div class="col-lg-6"><input type="button" name="buton" id="bultenbtn" value="KAYIT OL" class="btn btn-info"></form></div>
            </div>
            </div>
             <div id="bultensonuc"></div>';

        endif;
    }

    function HabertasarimDuzen() {
        if ($this->habertercih==0) :
            parent::haberler($this->haberlermetin);
        endif;
    }

    function tasarimbolumleri() {
        $bolumler=$this->prepare("SELECT * from tasarimbolumler order by siralama ASC");
        $bolumler->execute();

        while($bolumlerson=$bolumler->fetch(PDO::FETCH_ASSOC)):
          $class=$bolumlerson["classAd"];

        $this->$class();

        endwhile;
    }


}
?>
<?php

class yonetim3 extends yonetim {

    protected $idler=array();

    public $IM_PUBLIC_KEY,$IM_SECRET_KEY,$IM_SENDER;

    function __construct () {
        parent::__construct();

    $apiayarlaricek=parent::sorgum( "select * from smsayar",1);

        $this->IM_PUBLIC_KEY = $apiayarlaricek["apikey"];
        $this->IM_SECRET_KEY = $apiayarlaricek["guvenlikkey"];
        $this->IM_SENDER     = $apiayarlaricek["baslik"];
    }

// ---------------------- LİNK AYARLARI ---------------------------------

    function linkayar() {

        echo '<div class="row text-center">
     <div class="col-lg-12 border-bottom"><h4 class="float-left mt-3 text-dark mb-2"><a href="control.php?sayfa=linkekle" class="ti-plus bg-dark p-1 text-white mr-2 mt-3" ></a>
     LİNK KONTROL</h4>
     </div>';


        $introbilgiler=parent::sorgum( "select * from linkler",2);

        while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)) :

            echo '<div class="col-lg-6">
               
             <div class="row card-bordered p-1 m-1 bg-light">
                 <div class="col-lg-10 pt-1 pb-1">
                 <h5><kbd class="float-left">Sıra: '.$sonbilgi['siralama'].'</kbd> '.$sonbilgi['ad_tr'].' - '.$sonbilgi['ad_en'].'</h5>
                 </div>
                 <div class="col-lg-2 text-right">
                 <a href="control.php?sayfa=linkguncelle&id='.$sonbilgi['id'].'" class="ti-reload 
                  text-success" style="font-size:20px;"></a>'; ?>

            <a onclick="silmedenSor('control.php?sayfa=linksil&id=<?php echo $sonbilgi['id']; ?>'); return false" class="ti-trash m-2
                   text-danger" style="font-size:20px;"></a>
            <?php echo'
                 </div>
                 <div class="col-lg-12 border-top text-secondary text-left bg-white">
                 '.$sonbilgi['etiket'].'
                 </div>
                
               </div>  
            
            </div>';

        endwhile;

        echo '</div>';
        // mevcut introlar getiriliyor.
    }

    function linkekle() {

        $introbilgiler = parent::sorgum( "select * from linkler order by siralama desc LIMIT 1", 2);

        $sonbilgi = $introbilgiler->fetch(PDO::FETCH_ASSOC);

        $sayi = $sonbilgi["siralama"] +1;

            echo '<div class="row text-center">
           <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info">LİNK EKLE</h3></div>';

            if (!$_POST) :

                echo '<div class="col-lg-6 mx-auto">
               
             <div class="row card-bordered p-1 m-1 bg-light">
                <div class="col-lg-2 pt-3">
                  LİNK (TR)
                 </div>
                 <div class="col-lg-10 p-2">
                 <form action="" method="post">
                 <input type="text" name="ad_tr" class="form-control"> 
                 </div>
                 
                 <div class="col-lg-2 pt-3">
                  LİNK (EN)
                 </div>
                 <div class="col-lg-10 p-2">
                 <input type="text" name="ad_en" class="form-control"> 
                 </div>
                 
                 <div class="col-lg-2 pt-3">
                  ETİKET
                 </div>
                 <div class="col-lg-10 p-2">
                 <input type="text" name="etiket" class="form-control"> 
                 </div>
                 
                 <div class="col-lg-2 pt-3">
                  Link sırası
                 </div>
                 <div class="col-lg-10 p-2">
                 <select name="sira" class="form-control">
                  <option value="'.$sayi.'">'.$sayi.'</option>
                 </select> 
                 </div>
                
                  <div class="col-lg-12 border-top p-2">
                 <input type="submit" name="buton" value="LİNK EKLE" class="btn btn-primary btn-sm">
                 </form>
                 </div>
              
               </div>  
            
            </div>';


            else :
                $ad_tr = htmlspecialchars($_POST["ad_tr"]);
                $ad_en = htmlspecialchars($_POST["ad_en"]);
                $etiket = htmlspecialchars($_POST["etiket"]);
                $sira = htmlspecialchars($_POST["sira"]);


                if ($ad_tr == "" && $ad_en == "" && $etiket == "") :
                    ?>  <script>
                    BilgiPenceresi("control.php?sayfa=linkekle","BAŞARISIZ","VERİLER BOŞ OLAMAZ","warning");
                </script> <?php
                else :
                    parent::sorgum("insert into linkler (ad_tr,ad_en,etiket,siralama) VALUES('$ad_tr','$ad_en','$etiket',$sira)", 0);
                    ?>  <script>
                    BilgiPenceresi("control.php?sayfa=linkayar","BAŞARILI","EKLEME BAŞARILI","success");
                </script> <?php
                endif;

            endif;

            echo '</div>';

    }

    function linkguncelle() {

        $linklerebak = parent::sorgum( "select * from linkler ", 2);

        echo '<div class="row text-center">
     <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info">LİNK GÜNCELLEME</h3></div>';

        $kayitid=$_GET["id"];

        $kayitbilgial=parent::sorgum("select * from linkler where id=$kayitid",1);

        if (!$_POST) :


            echo '<div class="col-lg-6 mx-auto">
               
             <div class="row card-bordered p-1 m-1 bg-light">
                 <div class="col-lg-2 pt-3">
                  LİNK (TR)
                 </div>
                 <div class="col-lg-10 p-2">
                 <form action="" method="post">
                 <input type="text" name="ad_tr" class="form-control" value="'.$kayitbilgial["ad_tr"].'"> 
                 </div>
                 
                 <div class="col-lg-2 pt-3">
                  LİNK (EN)
                 </div>
                 <div class="col-lg-10 p-2">
                 <input type="text" name="ad_en" class="form-control" value="'.$kayitbilgial["ad_en"].'"> 
                 </div>
                 
                  <div class="col-lg-2 pt-3">
                  ETİKET
                 </div>
                 <div class="col-lg-10 p-2">
                 <input type="text" name="etiket" class="form-control" value="'.$kayitbilgial["etiket"].'"> 
                 </div>
                 
                 <div class="col-lg-2 pt-3">
                  Link sırası: <b>'.$kayitbilgial["siralama"].'</b>
                 </div>
                 <div class="col-lg-10 p-2">
                 <select name="gideceksira" class="form-control">';
                   while($sonbilgi=$linklerebak->fetch(PDO::FETCH_ASSOC)) :
                       if ($sonbilgi["siralama"]!=$kayitbilgial["siralama"] ) :
                            echo '<option value="'.$sonbilgi["siralama"].'">'.$sonbilgi["siralama"].'-'.$sonbilgi["ad_tr"].'</option>';
                       endif;
                   endwhile;

                 echo'</select> 
                 </div>
                
                  <div class="col-lg-12 border-top p-2">
                  <input type="hidden" name="kayitidsi" value="'.$kayitbilgial["id"].'">
                  <input type="hidden" name="mevcutsira" value="'.$kayitbilgial["siralama"].'">
                 <input type="submit" name="buton" value="LİNK GÜNCELLE" class="btn btn-primary btn-sm">
                 </form>
                 </div>
              
               </div>  
            
            </div>';


        else :
            $ad_tr=htmlspecialchars($_POST["ad_tr"]);
            $ad_en=htmlspecialchars($_POST["ad_en"]);
            $etiket=htmlspecialchars($_POST["etiket"]);


            $gideceksira=htmlspecialchars($_POST["gideceksira"]);
            $mevcutsira=htmlspecialchars($_POST["mevcutsira"]);


            $kayitidsi=htmlspecialchars($_POST["kayitidsi"]);

            if ($ad_tr=="" && $ad_en=="" && $etiket=="") :
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=linkekle","BAŞARISIZ","VERİLER BOŞ OLAMAZ","warning");
            </script> <?php

            else :

                parent::sorgum("update linkler set siralama=$mevcutsira  where siralama=$gideceksira ",0);


                parent::sorgum("update linkler set ad_tr='$ad_tr',ad_en='$ad_en',etiket='$etiket',siralama=$gideceksira where id=$kayitidsi ",0);
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=linkayar","BAŞARILI","GÜNCELLEME BAŞARILI","success");
            </script> <?php

            endif;

        endif;

        echo '</div>';
    }

    function linksil() {
        $kayitid=$_GET["id"];

        echo '<div class="row text-center">
       <div class="col-lg-12">';

        // veritabanı veri silme
        parent::sorgum("delete from linkler where id=$kayitid",0);
        ?>  <script>
            BilgiPenceresi("control.php?sayfa=linkayar","BAŞARILI","BAŞARIYLA SİLİNDİ","success");
        </script> <?php

    }

// ---------------------- VİDEOLAR ---------------------------------

    function videolar() {

        echo '<div class="row text-center">
     <div class="col-lg-12 border-bottom"><h4 class="float-left mt-3 text-dark mb-2"><a href="control.php?sayfa=videoekle" class="ti-plus bg-dark p-1 text-white mr-2 mt-3"></a>
     VİDEO YÖNETİMİ</h4>
    <h6 class="float-right mt-3 text-dark mb-2"><a href="control.php?sayfa=videolar&tercih=1" class="bg-success p-1 text-white mr-2 mt-3">Aktif</a>
    <a href="control.php?sayfa=videolar&tercih=0" class=" bg-danger p-1 text-white mr-2 mt-3">Pasif</a></h6>
     </div>';


        if (@$_GET["tercih"] !="") :

            $introbilgiler=parent::sorgum( "select * from videolar where durum=".$_GET["tercih"],2);
            
        else:
            $introbilgiler=parent::sorgum( "select * from videolar",2);

        endif;


        while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)) :

            echo ' <div class="col-lg-4 col-md-4 p-1"> 
                <div class="row p-1 m-1">
                   <div class="col-lg-12">
                  <div class="embed-responsive embed-responsive-16by9">
                   <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$sonbilgi["link"].'" 
                     allowfullscreen></iframe>
                   </div>
                 <kbd class="bg-white p-2 text-dark" style="position:absolute; bottom:30px; right:10px;">
                 Sıra:'.$sonbilgi["siralama"].'  Durum:'.$sonbilgi["durum"].'
                  <a href="control.php?sayfa=videoguncelle&id='.$sonbilgi['id'].'" class="ti-reload m-2 
                  text-success" style="font-size:20px;"></a>'; ?>
                  
                  <a onclick="silmedenSor('control.php?sayfa=videosil&id=<?php echo $sonbilgi['id']; ?>'); return false" class="ti-trash m-2
                   text-danger" style="font-size:20px;"></a>
           <?php echo'
                 </kbd>
                  </div>
                 </div>
            </div>';

        endwhile;

        echo '</div>';

    }

    function videoekle() {
        echo '<div class="row text-center">
              <div class="col-lg-12">';

        if ($_POST) :
            $videoyol=htmlspecialchars(strip_tags($_POST["videoyol"]));
            $siralama=htmlspecialchars(strip_tags($_POST["siralama"]));
            $durum=htmlspecialchars(strip_tags($_POST["durum"]));

            if (empty($videoyol) || empty($siralama)) :
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=videolar","BAŞARISIZ","ALANLAR BOŞ OLAMAZ","warning");
            </script> <?php
            else:
                parent::sorgum("insert into videolar (link,siralama,durum) VALUES('$videoyol','$siralama','$durum')",0);
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=videolar","BAŞARILI","VİDEO EKLENDİ","success");
            </script> <?php
            endif;

        else:
            ?>
            <div class="col-lg-12 p-2 text-left bg-light"><?php $this->sayfanavi("videolar","Videolar","Video Ekle"); ?></div>
            <div class="col-lg-4 mx-auto mt-2">
                <div class="card card-bordered">
                    <div class="card-body">
                        <h5 class="title border-bottom">Video Ekleme Formu</h5>
                        <form action="" method="post">
                            <p class="card-text"><input type="text" name="videoyol" class="form-control" placeholder="Video yolu" required="required"></p>
                            <p class="card-text"><input type="text" name="siralama" class="form-control" placeholder="Video sırası" required="required"></p>
                            <p class="card-text">
                                <select name="durum" class="form-control">
                                    <option value="1">Aktif</option>
                                    <option value="0">Pasif</option>
                                </select>
                            </p>
                            <input type="submit" name="buton" value="EKLE" class="btn btn-primary mb-1">
                        </form>

                    </div>
                </div>
            </div>

        <?php

        endif;
        echo '</div></div></div>';

    }

    function videosil() {
        $videoid=$_GET["id"];

        echo '<div class="row text-center">
       <div class="col-lg-12">';

        parent::sorgum("delete from videolar where id=$videoid",0);
        ?>  <script>
            BilgiPenceresi("control.php?sayfa=videolar","BAŞARISIZ","VİDEO BAŞARIYLA SİLİNDİ","warning");
        </script> <?php
    }

    function videoguncelle() {
      $gelenvideoid=$_GET["id"];

      $introbilgiler=parent::sorgum( "select * from videolar where id=$gelenvideoid",2);

      $sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC);

      $tumvideolar=parent::sorgum("select * from videolar",2);



        echo '<div class="row text-center">
               <div class="col-lg-12">';

        if ($_POST) :
            $videoyol=htmlspecialchars(strip_tags($_POST["videoyol"]));
            $siralama=htmlspecialchars(strip_tags($_POST["siralama"]));
            $mevcutsira=htmlspecialchars(strip_tags($_POST["mevcutsira"]));
            $durum=htmlspecialchars(strip_tags($_POST["durum"]));

            if (empty($videoyol) || empty($siralama)) :
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=videolar","BAŞARISIZ","ALANLAR BOŞ OLAMAZ","warning");
            </script> <?php
            else:
                self::sorgum("update videolar set siralama=$mevcutsira where siralama=$siralama",0);
                self::sorgum("update videolar set link='$videoyol',siralama='$siralama',durum='$durum' where id=$gelenvideoid",0);
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=videolar","BAŞARILI","VİDEO GÜNCELLENDİ","success");
            </script> <?php
            endif;
        else:
            ?>
            <div class="col-lg-12 p-2 text-left bg-light"><?php $this->sayfanavi("videolar","Videolar","Video Güncelle"); ?></div>
            <div class="col-lg-4 mx-auto mt-2">
                <div class="card card-bordered">
                    <div class="card-body">
                        <h5 class="title border-bottom">Video Güncelleme Formu</h5>
                        <form action="" method="post">
                            <p class="card-text text-danger">Video Linki<input type="text" name="videoyol" class="form-control" value="<?php echo $sonbilgi["link"]; ?>"></p>
                            <p class="card-text text-danger">Video Sırası <?php echo $sonbilgi["siralama"]; ?>
                                <select name="siralama" class="form-control">
                                <?php while($tumvideolarson=$tumvideolar->fetch(PDO::FETCH_ASSOC)) :
                                         if ($tumvideolarson["siralama"] !=$sonbilgi["siralama"]) :
                                             echo  '<option value="'.$tumvideolarson["siralama"].'">'.$tumvideolarson["siralama"].'</option>';
                                         else:
                                         endif;



                                     endwhile;
                                 ?>
                                </select>
                            <p class="card-text text-danger">Video Durumu
                                <select name="durum" class="form-control">
                                    <?php
                                    if ($sonbilgi["durum"]=="0") :
                                      echo  '<option value="1">Aktif</option>
                                             <option value="0" selected="selected">Pasif</option>';
                                    else:
                                        echo  '<option value="1" selected="selected">Aktif</option>
                                             <option value="0" >Pasif</option>';
                                    endif;

                                    ?>
                                    

                                </select>
                            </p>
                            <input type="hidden" name="mevcutsira" value="<?php echo $sonbilgi["siralama"]; ?>" class="btn btn-primary mb-1">
                            <input type="submit" name="buton" value="GÜNCELLE" class="btn btn-primary mb-1">
                        </form>

                    </div>
                </div>
            </div>

        <?php

        endif;
        echo '</div></div></div>';


    }

// ---------------------- BÜLTEN ---------------------------------

    function satirsayisi() {
    return parent::sorgum("select * from bulten",2)->rowCount();
}

    function aramaformu() {
        $mail=$_POST["mail"];
        if ($mail=="") :
            echo '<div class="col-lg-12 mt-5 mb-5 text-center">
                <div class="alert alert-danger">Mail Adresi Girilmeli</div>
               </div>';
        header("refresh:2,url=control.php?sayfa=bulten");
        else:

        $sorgusonuc=parent::sorgum("select * from bulten where mail LIKE '%$mail%'",2);
        while ($sonuclar=$sorgusonuc->fetch(PDO::FETCH_ASSOC)) :
            echo '<div class="col-lg-2">
                <div class="row border font-weight-bold p-2">
                   <div class="col-lg-8">'.$sonuclar["mail"].'</div>
                   <div class="col-lg-4 p-0 text-right"><a href="control.php?sayfa=bulten&icislem=guncelle&id='.$sonuclar['id'].'" class="ti-reload 
                  text-success mr-1" style="font-size:15px;"></a> 
                  <a href="control.php?sayfa=bulten&icislem=sil&id='.$sonuclar['id'].'" class="ti-trash 
                  text-danger" style="font-size:15px;"></a></div>
                  
                  </div>
                </div>';

        endwhile;

        endif;
    }

    function mailsil() {
     parent::sorgum("delete from bulten where id=".$_GET["id"],0);
        ?>  <script>
            BilgiPenceresi("control.php?sayfa=bulten","BAŞARILI","BAŞARIYLA SİLİNDİ","success");
        </script> <?php
    }

    function mailguncelle() {


        $gelenbilgi=parent::sorgum("select * from bulten where id=".$_GET["id"],2);
        $mevcutkayit=$gelenbilgi->fetch(PDO::FETCH_ASSOC);

        if (!$_POST) :

            echo '<div class="row card-bordered p-1 m-1 col-lg-4 mx-auto bg-white">

                 <div class="col-lg-4 pt-3 border-right text-danger font-weight-bold">
                  Mail Adresi
                 </div>
                 <div class="col-lg-8 p-2">
                 <form action="" method="post">
                 <input type="text" name="mail" class="form-control" value="'.$mevcutkayit["mail"].'">
                 </div>

                  <div class="col-lg-12 border-top p-2">
                  <input type="hidden" name="kayitidsi" value="'.$_GET["id"].'">
                 <input type="submit" name="buton" value="MAİL GÜNCELLE" class="btn btn-primary btn-sm">
                 </form>
                 </div>
              
               </div>

            </div>';


        else :
            $mail=htmlspecialchars($_POST["mail"]);
            $kayitidsi=htmlspecialchars($_POST["kayitidsi"]);

            if ($mail=="") :
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=bulten","BAŞARISIZ","MAİL BOŞ OLAMAZ","warning");
            </script> <?php
            else :
                parent::sorgum("update bulten set mail='$mail' where id=$kayitidsi ",0);
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=bulten","BAŞARILI","GÜNCELLEME BAŞARILI","success");
            </script> <?php
            endif;
        endif;
        echo '</div>';
    }

    function bakim() {
        $deger=parent::sorgum("select max(id) as id from bulten GROUP BY mail HAVING COUNT(*) > 1",2);

        if ($deger->rowCount() !=0) :
            while ($d=$deger->fetch(PDO::FETCH_ASSOC)) :
              $this->idler[]=$d["id"];
            endwhile;
            parent::sorgum("Delete from bulten where ID IN(".implode(",",$this->idler).")");
            echo '<div class="col-lg-6 mx-auto"> 
            <div class="alert alert-success mt-5 mb-5">
            Toplam tekrar eden mail: '. $deger->rowCount().'<br>
            Tekrar Eden Mailler Silindi</div>
            </div>';
            header("refresh:2,url=control.php?sayfa=bulten");

        else :
            echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-info mt-5 mb-5">Tekrar Eden Mailler Yok</div>
            </div>';
            header("refresh:2,url=control.php?sayfa=bulten");

        endif;


    }

    function bulten() {

        echo '<div class="row text-center">
     <div class="col-lg-12 border-bottom"><h4 class="float-left mt-3 text-dark mb-2">
     BÜLTEN AYARLARI</h4>
     </div>

            <div class="col-lg-12">
               <div class="row bg-light p-3 border-dart mt-1 text-center">
                  <div class="col-lg-2">
                    <form action="control.php?sayfa=bulten&icislem=ara" method="post">
                     <input type="text" name="mail" class="form-control" placeholder="Aranacak Mail Adresi" required="required">
                  </div>
                  <div class="col-lg-1 border-right border-right">
                  <input type="submit" name="btn" value="ARA" class="btn btn-success">
                  </form>
                  </div>
                 
                 <div class="col-lg-3">
                    <form action="cikti.php" method="post">
                    <h5 class="border-bottom">Çıktı Formatı</h5> 
                 <label class="text-danger font-weight-bold">Excel </label><input type="radio" name="tercih" class="m-2" value="excel">
                  <label class="text-danger font-weight-bold">Txt </label><input type="radio" name="tercih" class="m-2" value="txt" checked="checked">
                  </div>
                  <div class="col-lg-1">
                  <input type="submit" name="btn" value="ÇIKTI AL" class="btn btn-success">
                  </form>
                  </div>
                  
                  <div class="col-lg-3 border-right">
                  <h5 class="pt-3">Toplam Kayıt : <label class="text-danger">'.self::satirsayisi().'</label></h5>
                  </div>
                  
                  <div class="col-lg-1 text-center mx-auto">
                  <form action="control.php?sayfa=bulten&icislem=bakim" method="post">
                  <input type="submit" name="btn" value="BAKIM" class="btn btn-warning">
                  </form>
                  </div>
               </div>
            </div>';




        // burası sonuçları döndürecek.
        echo '<div class="col-lg-12">
               <div class="row bg-light pt-2 border-dark mt-1 text-center">';

        @$icislem=$_GET["icislem"];
        switch ($icislem) :
            case "ara";
                self::aramaformu($vt);
                break;
            case "sil";
                self::mailsil($vt);
                break;
            case "guncelle";
                self::mailguncelle($vt);
                break;

            case "bakim";
                self::bakim($vt);
                break;
        endswitch;

        echo'</div></div></div>';
    }


// ---------------------- İSTATİSTİK BAR ---------------------------------

    function istatistikbar () {


        echo '<div class="row w-100">


					<div class="col-lg-3 col-md-6  mt-2">
					<div class="card text-center border border-dark" >
					<div class="card-body">
					<h5 class="card-title  p-2 bg-dark text-white "> İNTRO</h5>	
					<p class="card-text"><h3><kbd class="text-warning">'.parent::sorgum("select * from intro",2)->rowCount().'</kbd></h3></p>   
					</div>
					</div>
					</div>
					
					<div class="col-lg-3 col-md-6  mt-2">
					<div class="card text-center border border-dark" >
					<div class="card-body">
					<h5 class="card-title  p-2 bg-dark text-white "> ARAÇ FİLO</h5>	
					<p class="card-text"><h3><kbd class="text-warning">'.parent::sorgum("select * from filomuz",2)->rowCount().'</kbd></h3></p>   
					</div>
					</div>
					</div>
					
					<div class="col-lg-3 col-md-6  mt-2">
					<div class="card text-center border border-dark" >
					<div class="card-body">
					<h5 class="card-title  p-2 bg-dark text-white "> VİDEOLAR</h5>	
					<p class="card-text"><h3><kbd class="text-warning">'.parent::sorgum("select * from videolar",2)->rowCount().'</kbd></h3></p>   
					</div>
					</div>
					</div>
					
					<div class="col-lg-3 col-md-6  mt-2">
					<div class="card text-center border border-dark" >
					<div class="card-body">
					<h5 class="card-title  p-2 bg-dark text-white "> REFERANS</h5>	
					<p class="card-text"><h3><kbd class="text-warning">'.parent::sorgum("select * from referans",2)->rowCount().'</kbd></h3></p>   
					</div>
					</div>
					</div>
					
					<div class="col-lg-3 col-md-6  mt-2">
					<div class="card text-center border border-dark" >
					<div class="card-body">
					<h5 class="card-title  p-2 bg-dark text-white ">YORUMLAR</h5>	
					<p class="card-text"><h3><kbd class="text-warning">'.parent::sorgum("select * from yorumlar",2)->rowCount().'</kbd></h3></p>   
					</div>
					</div>
					</div>
					
					<div class="col-lg-3 col-md-6  mt-2">
					<div class="card text-center border border-dark" >
					<div class="card-body">
					<h5 class="card-title  p-2 bg-dark text-white "> BÜLTEN</h5>	
					<p class="card-text"><h3><kbd class="text-warning">'.parent::sorgum("select * from bulten",2)->rowCount().'</kbd></h3></p>   
					</div>
					</div>
					</div>
					
					<div class="col-lg-3 col-md-6  mt-2">
					<div class="card text-center border border-dark" >
					<div class="card-body">
					<h5 class="card-title  p-2 bg-dark text-white "> HABERLER</h5>	
					<p class="card-text"><h3><kbd class="text-warning">'.parent::sorgum("select * from haberler",2)->rowCount().'</kbd></h3></p>   
					</div>
					</div>
					</div>
					
					<div class="col-lg-3 col-md-6  mt-2">
					<div class="card text-center border border-dark" >
					<div class="card-body">
					<h5 class="card-title  p-2 bg-dark text-white "> KULLANICILAR</h5>	
					<p class="card-text"><h3><kbd class="text-warning">'.parent::sorgum("select * from yonetim",2)->rowCount().'</kbd></h3></p>   
					</div>
					</div>
					</div>
		
		</div>';

    }


// ---------------------- MAİL ---------------------------------

    function mailgonderme() {

        $sablonlar=parent::sorgum("select * from mailsablonlar",2);
        while ($sonsablonlar = $sablonlar->fetch(PDO::FETCH_ASSOC)) :
            @$sablonsecenekler.='<option value="'.$sonsablonlar["id"].'" data-baslik="'.$sonsablonlar["baslik"].'" data-icerik="'.$sonsablonlar["icerik"].'">'.$sonsablonlar["baslik"].'</option>';
        endwhile;
        ?>
        <div class="row text-center">
            <div class="col-lg-12 border-bottom sayfabasliklari"><h5 class="float-left mt-3 mb-2">MAİL İŞLEMLERİ</h5></div>
        </div>
        <div class="row text-center">
            <div class="col-xl-10 col-lg-10 col-md-10 mx-auto col-sm-12 mailincercevesi mt-2">
                <div class="row text-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-sm-12 baslik">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 mx-auto col-sm-12 text-left borderright">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-5 col-md-5 mx-auto col-sm-12 p-2 pt-3">
                                        <i class="ti-plus mr-2 text-success font-weight-bold"></i><span class="baslikrenk">ŞABLONLAR</span>
                                    </div>
                                    <div class="col-xl-7 col-lg-7 col-md-7 mx-auto col-sm-12" id="sablonduzensecme">
                                        <select name="sablonduzen" class="form-control p-0 mt-2">
                                            <option value="0"> Düzen Seç</option>
                                            <?php
                                            echo $sablonsecenekler;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 mx-auto col-sm-12 borderright">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-5 col-md-5 mx-auto col-sm-12 p-2 pt-3  baslikrenk">ŞABLON SEÇ
                                    </div>
                                    <div class="col-xl-7 col-lg-7 col-md-7 mx-auto col-sm-12">
                                        <select name="sablonsec" class="form-control p-0 mt-2">
                                            <option value="0">Seç</option>
                                            <?php
                                            echo $sablonsecenekler;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 mx-auto col-sm-12 ">
                                <div class="row text-right">
                                    <div class="col-xl-6 col-lg-6 col-md-6 mx-auto col-sm-12 p-2 m-1"><input type="file" name="dosya">
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 mx-auto col-sm-12 ">
                                        <input type="button" class="btn btn-success btn-sm mt-2" value="YÜKLE" id ="mailyukle">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-sm-12 borderbot text-center" id="sablonduzenleme"></div>
                    <div class="col-xl-6 col-lg-6 col-md-6 mx-auto col-sm-12 borderright borderbot">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-sm-12 text-center p-2 borderbot">
                                <span class="baslikrenk">MAİLLER</span>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-sm-12 text-center">
                                <textarea name="mailler" rows="10" class="form-control p-2 mb-1 mt-1" placeholder="Mailleri giriniz"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 mx-auto col-sm-12 borderbot">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-sm-12 text-center p-2 borderbot">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-4 mx-auto col-sm-12 pt-2">
                                        <span class="baslikrenk">MAİL BAŞLIK</span>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 mx-auto col-sm-12 ">
                                        <input type="text" class="form-control" name="baslik p-2" placeholder="Mail Başlığını giriniz" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-sm-12 text-center p-2 borderbot">
                                <span class="baslikrenk">MAİL İÇERİK</span>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-sm-12 text-center">
                                <textarea name="mail" rows="7" class="form-control p-2 mb-1 mt-1" placeholder="Mail içeriğini yazınız"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-sm-12 text-center ">
                        <input type="button" class="btn btn-primary mt-1 mb-1" value="GÖNDER">
                    </div>
                </div>
            </div>
        <?php
    }







}


?>
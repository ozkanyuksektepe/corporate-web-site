<?php



class yonetim2 extends yonetim {

    function __construct(){

        parent::__construct();
    }

    protected $tercihArray=array("Açık","Kapalı");

// ---------------------- REFERANSLAR ---------------------------------

    function referanslarhepsi() {

        echo '<div class="row text-center">
     <div class="col-lg-12 border-bottom"><h4 class="float-left mt-3 text-dark mb-2"><a href="control.php?sayfa=referansekle" class="ti-plus bg-dark p-1 text-white mr-2 mt-3" ></a>
     REFERANSLAR</h4>
     </div>';


        $introbilgiler=self::sorgum( "select * from referans",2);

        while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)) :

            echo '<div class="col-lg-2">
               
             <div class="row card-bordered p-1 m-1">
                 <div class="col-lg-12">
                 <img src="../'.$sonbilgi['resimyol'].'">'; ?>
              <a onclick="silmedenSor('control.php?sayfa=referanssil&id=<?php echo $sonbilgi['id']; ?>'); return false" class="ti-trash m-2
                  text-danger" style="font-size:20px;"></a>
                  <?php echo'
                 </div>

               </div>  
            
            </div>';

        endwhile;

        echo '</div>';

    }

    function referansekle() {
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
                BilgiPenceresi("control.php?sayfa=referansekle","BAŞARISIZ","DOSYA YÜKLENMEDİ(BOŞ OLAMAZ)","warning");
            </script> <?php
            else : // boş değilse.
                if ($_FILES["dosya"]["size"]> (1024*1024*5)) :
                    ?>  <script>
                    BilgiPenceresi("control.php?sayfa=referansekle","BAŞARISIZ","DOSYA BOYUTU FAZLA","warning");
                </script> <?php
                else : // boyutta bir problem yok ise.
                    $izinverilen=array("image/png","image/jpg","image/jpeg");
                endif;
                if (!in_array($_FILES["dosya"]["type"],$izinverilen)) :
                    ?>  <script>
                    BilgiPenceresi("control.php?sayfa=referansekle","BAŞARISIZ","İZİN VERİLEN UZANTI DEĞİL","warning");
                </script> <?php
                else : // artık herşey tamam

                    $uzanti=explode(".",$_FILES["dosya"]["name"]);
                    $randdeger=md5(mt_rand(0,9995499));
                    $yeniisim =$randdeger.".".end($uzanti);

                    $dosyaminyolu='../img/referans/'.$yeniisim;

                    move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
                    ?>  <script>
                    BilgiPenceresi("control.php?sayfa=referansekle","BAŞARILI","REFERANS BAŞARIYLA YÜKLENDİ","success");
                </script> <?php
                    // dosya yüklendikten sonra veritabanına'da bu kaydı eklemem lazım.
                    $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
                    self::sorgum("insert into referans (resimyol) VALUES('$dosyaminyolu2')",0);
                endif;

            endif;



        else:
            ?>
            <div class="col-lg-12 p-2 text-left bg-light"><?php $this->sayfanavi("referans","Referanslar","Referans Ekle"); ?></div>
            <div class="col-lg-4 mx-auto mt-2">
                <div class="card card-bordered">
                    <div class="card-body">
                        <h5 class="title border-bottom">REFERANS EKLE</h5>
                        <form action="" method="post" enctype="multipart/form-data">
                            <p class="card-text"><input type="file" name="dosya"></p>
                            <input type="submit" name="buton" value="EKLE" class="btn btn-primary mb-1">
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

    function referanssil() {
        $refid=$_GET["id"];

        $verial=self::sorgum("select * from referans where id=$refid",1);

        echo '<div class="row text-center">
       <div class="col-lg-12">';

        // veritabanı veri silme
        self::sorgum("delete from referans where id=$refid",0);

        //dosyayı silme
        unlink("../".$verial["resimyol"]);
        ?>  <script>
            BilgiPenceresi("control.php?sayfa=referans","BAŞARILI","BAŞARIYLA SİLİNDİ","success");
        </script> <?php
        echo '<div class="alert alert-success mt-1">BAŞARIYLA SİLİNDİ</div>';
        echo '</div></div>';

        header("refresh:2,url=control.php?sayfa=referans");
    }

// ---------------------- MÜŞTERİ YORUMLARI ---------------------------------

    function yorumlar() {

        echo '<div class="row text-center">
     <div class="col-lg-12 border-bottom"><h4 class="float-left mt-3 text-dark mb-2"><a href="control.php?sayfa=yorumlarekle" class="ti-plus bg-dark p-1 text-white mr-2 mt-3"></a>
     MÜŞTERİ YORUMLARI</h4>
     </div>';


        $introbilgiler=self::sorgum( "select * from yorumlar",2);

        while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)) :

            echo '<div class="col-lg-3">
               
             <div class="row card-bordered p-1 m-1 bg-light" style="border-radius: 10px;">
                 <div class="col-lg-9 pt-1 text-left">
                 <h5>İsim : '.$sonbilgi['isim'].'</h5>
                 </div>
                 <div class="col-lg-3 text-right p-2">
                 <a href="control.php?sayfa=yorumlarguncelle&id='.$sonbilgi['id'].'" class="ti-reload 
                  text-success" style="font-size:20px;"></a>'; ?>
                  
                 <a onclick="silmedenSor('control.php?sayfa=yorumlarsil&id=<?php echo $sonbilgi['id']; ?>'); return false" class="ti-trash m-2
                  text-danger" style="font-size:20px;"></a>
               <?php echo'
                 </div>
                 <div class="col-lg-12 border-top text-secondary text-left bg-white">
                 '.$sonbilgi['icerik'].'
                 </div>
              
               </div>  
            
            </div>';

        endwhile;

        echo '</div>';

    }

    function yorumekle() {

        echo '<div class="row text-center">
     <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info">YORUM EKLE</h3></div>';

        if (!$_POST) :




            echo '<div class="col-lg-6 mx-auto">
               
             <div class="row card-bordered p-1 m-1 bg-light">
                 <div class="col-lg-2 pt-3">
                  İSİM
                 </div>
                 <div class="col-lg-10 p-2">
                 <form action="" method="post">
                 <input type="text" name="isim" class="form-control"> 
                 </div>
                
                 <div class="col-lg-12 border-top p-2">
                  MESAJ
                 </div>
                 <div class="col-lg-12 border-top p-2">
                 <textarea name="icerik" rows="5" class="form-control" id="editor11"></textarea>'; ?>

            <script>
                ClassicEditor
                    .create( document.querySelector( '#editor11' ) )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>
            <?php
            echo '
                 </div>
                 
                  <div class="col-lg-12 border-top p-2">
                 <input type="submit" name="buton" value="YORUM EKLE" class="btn btn-primary btn-sm">
                 </form>
                 </div>
              
               </div>  
            
            </div>';


        else :
            $isim=htmlspecialchars($_POST["isim"]);
            $icerik=$_POST["icerik"];

            if ($isim=="" && $icerik=="") :
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=yorumlarekle","BAŞARISIZ","VERİLER BOŞ OLAMAZ","warning");
            </script> <?php
            else :
                self::sorgum("insert into yorumlar (icerik,isim) VALUES('$icerik','$isim')",0);
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=yorumlar","BAŞARILI","YORUM BAŞARIYLA EKLENDİ","success");
            </script> <?php
            endif;
        endif;
        echo '</div>';
    }

    function yorumguncelle() {

        echo '<div class="row text-center">
     <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info">YORUM GÜNCELLE</h3></div>';

        // - ilk gelen id alınacak
        // - id ile veritabanına çıkılıp verinin bilgileri gelecek
        // - inputlara o veriler yazılacak
        // - hidden ile id post için taşınacak

        $kayitid=$_GET["id"];

        $kayitbilgial=self::sorgum("select * from yorumlar where id=$kayitid",1);

        if (!$_POST) :


            echo '<div class="col-lg-6 mx-auto">
               
             <div class="row card-bordered p-1 m-1 bg-light">
                 <div class="col-lg-2 pt-3">
                  BAŞLIK
                 </div>
                 <div class="col-lg-10 p-2">
                 <form action="" method="post">
                 <input type="text" name="isim" class="form-control" value="'.$kayitbilgial["isim"].'"> 
                 </div>
                
                 <div class="col-lg-12 border-top p-2">
                  İÇERİK
                 </div>
                 <div class="col-lg-12 border-top p-2">
                 <textarea name="icerik" rows="5" class="form-control" id="editor12">'.$kayitbilgial["icerik"].'</textarea>'; ?>

            <script>
                ClassicEditor
                    .create( document.querySelector( '#editor12' ) )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>
            <?php
            echo '
                 </div>
                 
                  <div class="col-lg-12 border-top p-2">
                  <input type="hidden" name="kayitidsi" value="'.$kayitbilgial["id"].'">
                 <input type="submit" name="buton" value="HİZMET GÜNCELLE" class="btn btn-primary btn-sm">
                 </form>
                 </div>
              
               </div>  
            
            </div>';


        else :
            $isim=htmlspecialchars($_POST["isim"]);
            $icerik=$_POST["icerik"];
            $kayitidsi=htmlspecialchars($_POST["kayitidsi"]);

            if ($isim=="" && $icerik=="") :
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=yorumlarekle","BAŞARISIZ","VERİLER BOŞ OLAMAZ","warning");
            </script> <?php
            else :
                self::sorgum("update yorumlar set icerik='$icerik',isim='$isim' where id=$kayitidsi ",0);
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=yorumlar","BAŞARILI","GÜNCELLEME BAŞARILI","success");
            </script> <?php
            endif;
        endif;
        echo '</div>';
    }

    function yorumsil() {
        $kayitid=$_GET["id"];

        echo '<div class="row text-center">
       <div class="col-lg-12">';

        // veritabanı veri silme
        self::sorgum("delete from yorumlar where id=$kayitid",0);
        ?>  <script>
            BilgiPenceresi("control.php?sayfa=yorumlar","BAŞARILI","BAŞARIYLA SİLİNDİ","success");
        </script> <?php
    }

// ---------------------- MAİL AYARLARI -----------------------------------

    function mailayar() {
        $sonuc=self::sorgum("SELECT * from gelenmailayar",1);

        if ($_POST) :
            $host=htmlspecialchars($_POST["host"]);
            $mailadres=htmlspecialchars($_POST["mailadres"]);
            $sifre=htmlspecialchars($_POST["sifre"]);
            $port=htmlspecialchars($_POST["port"]);
            $aliciadres=htmlspecialchars($_POST["aliciadres"]);


            $guncelleme=$this->prepare("UPDATE gelenmailayar set host=?,mailadres=?,sifre=?,port=?,aliciadres=?");

            $guncelleme->bindParam(1,$host,PDO::PARAM_STR);
            $guncelleme->bindParam(2,$mailadres,PDO::PARAM_STR);
            $guncelleme->bindParam(3,$sifre,PDO::PARAM_STR);
            $guncelleme->bindParam(4,$port,PDO::PARAM_STR);
            $guncelleme->bindParam(5,$aliciadres,PDO::PARAM_STR);
            $guncelleme->execute();

            ?>  <script>
            BilgiPenceresi("control.php?sayfa=mailayar","BAŞARILI","MAİL AYARLARI BAŞARIYLA GÜNCELLENDİ","success");
        </script> <?php


        // burada veritabanı işlemleri.
        else:
            ?>
            <form action="control.php?sayfa=mailayar" method="post">
                <div class="row text-center">
                    <div class="col-lg-5 mx-auto">
                        <div class="col-lg-12 mx-auto mt-2">
                            <h3 class="text-info">MAİL AYARLARI</h3>
                        </div>

                        <div class="col-lg-12 mx-auto mt-2 border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>HOST</span>
                                </div>
                                <div class="col-lg-9 p-1">
                                    <input type="text" name="host" class="form-control" value="<?php echo $sonuc["host"]; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>MAİL ADRES</span>
                                </div>
                                <div class="col-lg-9 p-1">
                                    <input type="text" name="mailadres" class="form-control" value="<?php echo $sonuc["mailadres"]; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>HOST ŞİFRE</span>
                                </div>
                                <div class="col-lg-9 p-1">
                                    <input type="text" name="sifre" class="form-control" value="<?php echo $sonuc["sifre"]; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>PORT</span>
                                </div>
                                <div class="col-lg-9 p-1">
                                    <input type="text" name="port" class="form-control" value="<?php echo $sonuc["port"]; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>ALICI MAİL</span>
                                </div>
                                <div class="col-lg-9 p-1">
                                    <input type="text" name="aliciadres" class="form-control" value="<?php echo $sonuc["aliciadres"]; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mx-auto mt-2">
                            <input type="submit" name="button" class="btn btn-info m-1" value="GÜNCELLE">
                        </div>

                    </div>
                </div>

            </form>
        <?php
        endif;


    }


// ---------------------- KULLANICI AYARLARI -----------------------------------

    function ayarlar() {
        $id=self::coz($_COOKIE["kulbilgi"]);

        $sonuc=self::sorgum("SELECT * from yonetim where id=$id",1);


        if ($_POST) :
            @$kulad=htmlspecialchars($_POST["kulad"]);
            @$eskisifre=htmlspecialchars($_POST["eskisifre"]);
            @$yenisifre=htmlspecialchars($_POST["yenisifre"]);
            @$yenisifre2=htmlspecialchars($_POST["yenisifre2"]);

            // ilk yazılan şifre şifreleme algoritmamıza göre şifrelenerek db ile karşılaştırılacak.
            // girilen yeni şifrelerin birbiriyle aynı olup olmamasını kontrol edeceğiz.

            if (empty($kulad) || empty($eskisifre) || empty($yenisifre) || empty($yenisifre2) ) :
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=ayarlar","BAŞARISIZ","ALANLAR BOŞ BIRAKILAMAZ!","warning");
            </script> <?php
            else:

                $sifrelihal=md5(sha1(md5($eskisifre)));

                if ($sonuc["sifre"]!=$sifrelihal) :
                    ?>  <script>
                    BilgiPenceresi("control.php?sayfa=ayarlar","BAŞARISIZ","ESKİ ŞİFRE HATALI GİRİLDİ","warning");
                </script> <?php
                else:
                    if ($yenisifre!=$yenisifre2) :
                        ?>  <script>
                        BilgiPenceresi("control.php?sayfa=ayarlar","BAŞARISIZ","YENİ ŞİFRELER UYUMSUZ!","warning");
                    </script> <?php
                    else:
                        $yenisifreson=md5(sha1(md5($yenisifre)));

                        $guncelleme=$this->prepare("UPDATE yonetim set kulad=?,sifre=? where id=$id");

                        $guncelleme->bindParam(1,$kulad,PDO::PARAM_STR);
                        $guncelleme->bindParam(2,$yenisifreson,PDO::PARAM_STR);
                        $guncelleme->execute();
                        ?>  <script>
                        BilgiPenceresi("control.php?sayfa=ayarlar","BAŞARILI","KULLANICI AYARLARI BAŞARIYLA GÜNCELLENDİ","success");
                    </script> <?php
                    endif;
                endif;
            endif;
        else:
            ?>
            <form action="control.php?sayfa=ayarlar" method="post">
                <div class="row text-center">
                    <div class="col-lg-5 mx-auto">
                        <div class="col-lg-12 mx-auto mt-2">
                            <h3 class="text-info">KULLANICI AYARLARI</h3>
                        </div>

                        <div class="col-lg-12 mx-auto mt-2 border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Kullanıcı Adı</span>
                                </div>
                                <div class="col-lg-9 p-1">
                                    <input type="text" name="kulad" class="form-control" value="<?php echo $sonuc["kulad"]; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Şifre</span>
                                </div>
                                <div class="col-lg-9 p-1">
                                    <input type="password" name="eskisifre" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Yeni Şifre</span>
                                </div>
                                <div class="col-lg-9 p-1">
                                    <input type="text" name="yenisifre" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Yeni Şifre Tekrar</span>
                                </div>
                                <div class="col-lg-9 p-1">
                                    <input type="text" name="yenisifre2" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->

                        <div class="col-lg-12 mx-auto mt-2">
                            <input type="submit" name="button" class="btn btn-info m-1" value="DEĞİŞTİR">
                        </div>

                    </div>
                </div>

            </form>
        <?php
        endif;


    }

// ---------------------- KULLANICI EKLEME VE SİLME -----------------------------------

    function checkboxduzenle ($name) {
        if (isset($_POST[$name])) :
            return 1;
        else:
            return 0;
        endif;

    }

    function checkkontrol($isim,$mevcutyetki) {
        if ($mevcutyetki==1) :
            echo '<input type="checkbox" name="'.$isim.'" id="check" checked="checked" >';
        else:
            echo '<input type="checkbox" name="'.$isim.'" id="check">';
        endif;



    }

    function kullistele() {

        $al=self::sorgum("select * from yonetim",2);

        echo '<div class="row text-center">
               <div class="col-lg-6 mt-5 mx-auto">
                 <div class="card">
                   <div class="card-body">
                     <h4 class="header-title text-dark">
                     <a href="control.php?sayfa=yonekle" class="ti-plus bg-dark p-1 text-white mr-2 mt-3"></a>
                     
                     KULLANICILAR</h4>
                        <div class="single-table">
                          <div class="table-responsive">
                            <table class="table text-center border table-striped">
                              <thead>
                              <tr>
                              <th scope="col" class="border-right">AD</th>
                              <th scope="col" class="border-right">Genel Yetki</th>
                              <th scope="col">İŞLEM</th>
                              </th>
                              </thead>
                              <tbody>';

        while($yonson=$al->fetch(PDO::FETCH_ASSOC)) :
            echo '<tr>
                                       <th scope="row" class="border-right">'.$yonson["kulad"].'</th>
                                       <th scope="row" class="border-right">';
                                        switch ($yonson["genel_yetki"]) :
                                            case "1";
                                                echo "<span class='text-success'> Tam Yetki</span>";
                                                break;
                                            case "2";
                                                echo "<span class='text-danger'>Editör Yetki</span>";
                                                break;
                                            case "3";
                                                echo "<span class='text-primary'>Üye Yetki</span>";
                                                break;
                                        endswitch;

                                        echo'</th>
            <th scope="row"><a href="control.php?sayfa=yonguncelle&id='.$yonson['id'].'" class="ti-reload 
                  text-success" style="font-size:20px;"></a>'; ?>

          <a onclick="silmedenSor('control.php?sayfa=yonsil&id=<?php echo $yonson['id']; ?>'); return false" class="ti-trash m-2
                  text-danger" style="font-size:20px;"></a>
            <?php echo'</th>
                                  </tr>';

        endwhile;

        echo '</tbody> 
                              </table>
                            </div>   
                          </div>   
                        </div>   
                     </div>   
                   </div>   




';
    }

    function yonsil($id) {
        ?>  <script>
            BilgiPenceresi("control.php?sayfa=kulayar","BAŞARILI","YÖNETİCİ SİLİNDİ","warning");
        </script> <?php
        self::sorgum("delete from yonetim where id=$id",0);

    }

    function yonekle() {


        if ($_POST) :
            @$kulad=htmlspecialchars($_POST["kulad"]);
            @$yenisifre=htmlspecialchars($_POST["yenisifre"]);
            @$yenisifre2=htmlspecialchars($_POST["yenisifre2"]);

            $genel_yetki=htmlspecialchars($_POST["genel_yetki"]);

            $intro_yetki=$this->checkboxduzenle("intro_yetki");
            $arac_yetki=$this->checkboxduzenle("arac_yetki");
            $video_yetki=$this->checkboxduzenle("video_yetki");
            $hakkimiz_yetki=$this->checkboxduzenle("hakkimiz_yetki");
            $hizmet_yetki=$this->checkboxduzenle("hizmet_yetki");
            $referans_yetki=$this->checkboxduzenle("referans_yetki");
            $tasarim_yetki=$this->checkboxduzenle("tasarim_yetki");
            $yorum_yetki=$this->checkboxduzenle("yorum_yetki");
            $mesaj_yetki=$this->checkboxduzenle("mesaj_yetki");
            $bulten_yetki=$this->checkboxduzenle("bulten_yetki");
            $haber_yetki=$this->checkboxduzenle("haber_yetki");
            $yonetici_yetki=$this->checkboxduzenle("yonetici_yetki");
            $ayar_yetki=$this->checkboxduzenle("ayar_yetki");



            if (empty($kulad) || empty($yenisifre) || empty($yenisifre2) ) :
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=yonekle","BAŞARISIZ","ALANLAR BOŞ BIRAKILAMAZ!","warning");
            </script> <?php
            else:

                if ($yenisifre!=$yenisifre2) :
                    ?>  <script>
                    BilgiPenceresi("control.php?sayfa=yonekle","YENİ ŞİFRELER UYUMSUZ!","warning");
                </script> <?php
                else:
                    $yenisifreson=md5(sha1(md5($yenisifre)));

                    $ekle=$this->prepare("insert into yonetim (kulad,sifre,genel_yetki,intro_yetki,arac_yetki,video_yetki,hakkimiz_yetki
,hizmet_yetki,referans_yetki,tasarim_yetki,yorum_yetki,mesaj_yetki,bulten_yetki,haber_yetki,yonetici_yetki,ayar_yetki) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

                    $ekle->bindParam(1,$kulad,PDO::PARAM_STR);
                    $ekle->bindParam(2,$yenisifreson,PDO::PARAM_STR);
                    $ekle->bindParam(3,$genel_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(4,$intro_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(5,$arac_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(6,$video_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(7,$hakkimiz_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(8,$hizmet_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(9,$referans_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(10,$tasarim_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(11,$yorum_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(12,$mesaj_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(13,$bulten_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(14,$haber_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(15,$yonetici_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(16,$ayar_yetki,PDO::PARAM_INT);
                    $ekle->execute();

                    ?>  <script>
                    BilgiPenceresi("control.php?sayfa=kulayar","BAŞARILI","YÖNETİCİ BAŞARIYLA EKLENDİ","success");
                </script> <?php

                endif;

            endif;


        else:
            ?>
            <div class="col-lg-12 p-2 text-left bg-light"><?php $this->sayfanavi("kulayar","Yöneticiler","Yönetici Ekle"); ?></div>
            <form action="control.php?sayfa=yonekle" method="post">
                <div class="row text-center">
                    <div class="col-lg-6 mx-auto">
                        <div class="col-lg-12 mx-auto mt-2">
                            <h3 class="text-info">YÖNETİCİ EKLE</h3>
                        </div>

                        <div class="col-lg-12 mx-auto mt-2 border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Kullanıcı Adı</span>
                                </div>
                                <div class="col-lg-9 p-1">
                                    <input type="text" name="kulad" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Yeni Şifre</span>
                                </div>
                                <div class="col-lg-9 p-1">
                                    <input type="text" name="yenisifre" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Yeni Şifre(Tekrar)</span>
                                </div>
                                <div class="col-lg-9 p-1">
                                    <input type="text" name="yenisifre2" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Genel Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <select name="genel_yetki">
                                        <option value="1">Tam yetki</option>
                                        <option value="2">Editör Yetki</option>
                                        <option value="3">Üye Yetki</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>İntro Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <input type="checkbox" name="intro_yetki" id="check">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Araç Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <input type="checkbox" name="arac_yetki" id="check">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Video Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <input type="checkbox" name="video_yetki" id="check">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Hakkımızda Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <input type="checkbox" name="hakkimiz_yetki" id="check">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Hizmet Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <input type="checkbox" name="hizmet_yetki" id="check">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Referans Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <input type="checkbox" name="referans_yetki" id="check">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Tasarım Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <input type="checkbox" name="tasarim_yetki" id="check">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Yorum Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <input type="checkbox" name="yorum_yetki" id="check">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Mesaj Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <input type="checkbox" name="mesaj_yetki" id="check">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Bülten Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <input type="checkbox" name="bulten_yetki" id="check">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Haberler Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <input type="checkbox" name="haber_yetki" id="check">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Yönetici Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <input type="checkbox" name="yonetici_yetki" id="check">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Ayar Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <input type="checkbox" name="ayar_yetki" id="check">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->


                        <div class="col-lg-12 mx-auto mt-2">
                            <input type="submit" name="button" class="btn btn-info m-1" value="EKLE">
                        </div>

                    </div>
                </div>

            </form>
        <?php
        endif;


    }

    function yonguncelle() {


        if ($_POST) :
            $kulad=htmlspecialchars($_POST["kulad"]);
            $yonid=htmlspecialchars($_POST["yonid"]);
            $genel_yetki=htmlspecialchars($_POST["genel_yetki"]);

            $intro_yetki=$this->checkboxduzenle("intro_yetki");
            $arac_yetki=$this->checkboxduzenle("arac_yetki");
            $video_yetki=$this->checkboxduzenle("video_yetki");
            $hakkimiz_yetki=$this->checkboxduzenle("hakkimiz_yetki");
            $hizmet_yetki=$this->checkboxduzenle("hizmet_yetki");
            $referans_yetki=$this->checkboxduzenle("referans_yetki");
            $tasarim_yetki=$this->checkboxduzenle("tasarim_yetki");
            $yorum_yetki=$this->checkboxduzenle("yorum_yetki");
            $mesaj_yetki=$this->checkboxduzenle("mesaj_yetki");
            $bulten_yetki=$this->checkboxduzenle("bulten_yetki");
            $haber_yetki=$this->checkboxduzenle("haber_yetki");
            $yonetici_yetki=$this->checkboxduzenle("yonetici_yetki");
            $ayar_yetki=$this->checkboxduzenle("ayar_yetki");



            if (empty($kulad)) :
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=yonekle","BAŞARISIZ","ALANLAR BOŞ BIRAKILAMAZ!","warning");
            </script> <?php
            else:
                    $ekle=$this->prepare("update yonetim set 
                    kulad=?,
                    genel_yetki=?,
                    intro_yetki=?,
                    arac_yetki=?,
                    video_yetki=?,
                    hakkimiz_yetki=?,
                    hizmet_yetki=?,
                    referans_yetki=?,
                    tasarim_yetki=?,
                     yorum_yetki=?,
                    mesaj_yetki=?,
                     bulten_yetki=?,
                    haber_yetki=?,
                   yonetici_yetki=?,
                   ayar_yetki=? where id=".$yonid);

                    $ekle->bindParam(1,$kulad,PDO::PARAM_STR);
                    $ekle->bindParam(2,$genel_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(3,$intro_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(4,$arac_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(5,$video_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(6,$hakkimiz_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(7,$hizmet_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(8,$referans_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(9,$tasarim_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(10,$yorum_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(11,$mesaj_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(12,$bulten_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(13,$haber_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(14,$yonetici_yetki,PDO::PARAM_INT);
                    $ekle->bindParam(15,$ayar_yetki,PDO::PARAM_INT);
                    $ekle->execute();

                    ?>  <script>
                    BilgiPenceresi("control.php?sayfa=kulayar","BAŞARILI","YÖNETİCİ BAŞARIYLA GÜNCELLENDİ","success");
                </script> <?php

                endif;
        else:
            $al=self::sorgum("select * from yonetim where id=".$_GET["id"],2);
            $yonson=$al->fetch(PDO::FETCH_ASSOC);


            ?>
            <div class="col-lg-12 p-2 text-left bg-light"><?php $this->sayfanavi("kulayar","Yöneticiler","Yönetici Güncelle"); ?></div>
            <form action="control.php?sayfa=yonguncelle" method="post">
                <div class="row text-center">
                    <div class="col-lg-6 mx-auto">
                        <div class="col-lg-12 mx-auto mt-2">
                            <h3 class="text-info">YÖNETİCİ GÜNCELLE</h3>
                        </div>

                        <div class="col-lg-12 mx-auto mt-2 border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Kullanıcı Adı</span>
                                </div>
                                <div class="col-lg-9 p-1">
                                    <input type="text" name="kulad" class="form-control" value="<?php echo $yonson["kulad"]; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Genel Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <select name="genel_yetki" class="form-control"><?php
                                        $yetkiler=array(1 => "Tam yetki", 2 => "Editör Yetki", 3 => "Üye Yetki");
                                        foreach($yetkiler as  $key => $deger):
                                            if ($yonson["genel_yetki"]==$key):
                                                echo '<option value="'.$key.'" selected="selected">'.$deger.'</option>';
                                            else:
                                                echo '<option value="'.$key.'">'.$deger.'</option>';
                                            endif;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>İntro Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <?php echo $this->checkkontrol("intro_yetki",$yonson["intro_yetki"]); ?>
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Araç Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <?php echo $this->checkkontrol("arac_yetki",$yonson["arac_yetki"]); ?>

                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Video Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <?php echo $this->checkkontrol("video_yetki",$yonson["video_yetki"]); ?>
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Hakkımızda Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <?php echo $this->checkkontrol("hakkimiz_yetki",$yonson["hakkimiz_yetki"]); ?>
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Hizmet Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <?php echo $this->checkkontrol("hizmet_yetki",$yonson["hizmet_yetki"]); ?>
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Referans Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <?php echo $this->checkkontrol("referans_yetki",$yonson["referans_yetki"]); ?>
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Tasarım Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <?php echo $this->checkkontrol("tasarim_yetki",$yonson["tasarim_yetki"]); ?>
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Yorum Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <?php echo $this->checkkontrol("yorum_yetki",$yonson["yorum_yetki"]); ?>
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Mesaj Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <?php echo $this->checkkontrol("mesaj_yetki",$yonson["mesaj_yetki"]); ?>
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Bülten Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <?php echo $this->checkkontrol("bulten_yetki",$yonson["bulten_yetki"]); ?>
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Haberler Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <?php echo $this->checkkontrol("haber_yetki",$yonson["haber_yetki"]); ?>
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Yönetici Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <?php echo $this->checkkontrol("yonetici_yetki",$yonson["yonetici_yetki"]); ?>
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3">
                                    <span>Ayar Yetki</span>
                                </div>
                                <div class="col-lg-9 p-1 mt-2">
                                    <?php echo $this->checkkontrol("ayar_yetki",$yonson["ayar_yetki"]); ?>
                                </div>
                            </div>
                        </div>
                        <!-- ***************** -->


                        <div class="col-lg-12 mx-auto mt-2">
                            <input type="hidden" name="yonid" value="<?php echo $yonson["id"]; ?>">
                            <input type="submit" name="button" class="btn btn-info m-1" value="EKLE">
                        </div>

                    </div>
                </div>

            </form>
        <?php
        endif;


    }

// ---------------------- HAKKIMIZDA ---------------------------------

    function hakkimizda() {

        echo '<div class="row text-center">
     <div class="col-lg-12 border-bottom"><h4 class="mt-3 text-dark">HAKKIMIZDA AYARLARI</h4></div>';


        if (!$_POST) :



            $sonbilgi=self::sorgum( "select * from hakkimizda",1);

            echo '<div class="col-lg-6 mx-auto">
               
             <div class="row card-bordered p-1 m-1">
                 
                 <div class="col-lg-3 border-bottom bg-light" id="hakkimizdayazilar">
                 Resim
                 </div>
                 
                 <div class="col-lg-9 border-bottom">
                 <img src="../'.$sonbilgi['resim'].'"><br>
                 <form action="" method="post" enctype="multipart/form-data">
                 <input type="file" name="dosya">
                 </div>

                 <div class="col-lg-3 border-bottom bg-light pt-3" id="hakkimizdayazilarn">
                 Başlık (TR)
                 </div>
                 
                 <div class="col-lg-9 border-bottom">
                 <input type="text" name="baslik_tr" class="form-control m-2" value="'.$sonbilgi['baslik_tr'].'">
                 </div>
                 
                  <div class="col-lg-3 border-bottom bg-light pt-3" id="hakkimizdayazilarn">
                 Başlık (EN)
                 </div>
                 
                 <div class="col-lg-9 border-bottom">
                 <input type="text" name="baslik_en" class="form-control m-2" value="'.$sonbilgi['baslik_en'].'">
                 </div>
                 
                 <div class="col-lg-3 bg-light" id="hakkimizdayazilar">
                 İçerik (TR)
                 </div>
                 
                 <div class="col-lg-9 border-bottom">
                 <textarea name="icerik_tr" class="form-control" rows="8" id="editor1">'.$sonbilgi['icerik_tr'].'</textarea>'; ?>

                      <script>
        ClassicEditor
            .create( document.querySelector( '#editor1' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
        <?php
              echo '</div>
                 
                  <div class="col-lg-3 bg-light" id="hakkimizdayazilar">
                 İçerik (EN)
                 </div>
                 
                 <div class="col-lg-9 mt-5 border-bottom">
                 <textarea name="icerik_en" class="form-control" rows="8" id="editor2">'.$sonbilgi['icerik_en'].'</textarea>'; ?>

            <script>
                ClassicEditor
                    .create( document.querySelector( '#editor2' ) )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>

            <?php
               echo '</div>
                 
                 <div class="col-lg-12 border-top">
                 <input type="submit" name="guncel" value="GÜNCELLE" class="btn btn-sm btn-info m-2">
                 </form>
                 </div>

        </div>';


        else : // form basıldıysa.

            $baslik_tr=htmlspecialchars($_POST["baslik_tr"]);
            $icerik_tr=$_POST["icerik_tr"];
            $baslik_en=htmlspecialchars($_POST["baslik_en"]);
            $icerik_en=$_POST["icerik_en"];


            if (@$_FILES["dosya"]["name"]!="") :

                if ($_FILES["dosya"]["size"]< (1024*1024*5)) :

                    $izinverilen=array("image/png","image/jpg","image/jpeg");

                    if (in_array($_FILES["dosya"]["type"],$izinverilen)) :

                        $dosyaminyolu='../img/'.$_FILES["dosya"]["name"];

                        move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);


                        $veritabaniicin=str_replace('../','',$dosyaminyolu);

                    endif;

                endif;

            endif;

            if (@$_FILES["dosya"]["name"]!="") :
                self::sorgum("update hakkimizda set baslik_tr='$baslik_tr',baslik_en='$baslik_en',icerik_tr='$icerik_tr',icerik_en='$icerik_en',resim='$veritabaniicin'",0);
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=hakkimizda","BAŞARILI","BAŞARIYLA GÜNCELLENDİ","success");
            </script> <?php
            else:
                self::sorgum("update hakkimizda set baslik_tr='$baslik_tr',baslik_en='$baslik_en',icerik_tr='$icerik_tr',icerik_en='$icerik_en'",0);
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=hakkimizda","BAŞARILI","BAŞARIYLA GÜNCELLENDİ","success");
            </script> <?php
            endif;

            echo '</div>';

        endif;
    }


// ---------------------- HİZMETLER ---------------------------------

    function hizmetlerhepsi() {

        echo '<div class="row text-center">
     <div class="col-lg-12 border-bottom"><h4 class="float-left mt-3 text-dark mb-2"><a href="control.php?sayfa=hizmetekle" class="ti-plus bg-dark p-1 text-white mr-2 mt-3" ></a>
     HİZMETLERİMİZ</h4>
     </div>';


        $introbilgiler=self::sorgum( "select * from hizmetler",2);

        while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)) :

            echo '<div class="col-lg-6">
               
             <div class="row card-bordered p-1 m-1 bg-light">
                 <div class="col-lg-10 pt-1 pb-1">
                 <h5>'.$sonbilgi['baslik_tr'].' - '.$sonbilgi['baslik_en'].'</h5>
                 </div>
                 <div class="col-lg-2 text-right">
                 <a href="control.php?sayfa=hizmetguncelle&id='.$sonbilgi['id'].'" class="ti-reload 
                  text-success" style="font-size:20px;"></a>'; ?>
                  
                  <a onclick="silmedenSor('control.php?sayfa=hizmetsil&id=<?php echo $sonbilgi['id']; ?>'); return false" class="ti-trash m-2
                  text-danger" style="font-size:20px;"></a>
                  <?php echo'
                 </div>
                 <div class="col-lg-12 border-top text-secondary text-left bg-white">
                 '.$sonbilgi['icerik_tr'].'
                 </div>
                 <div class="col-lg-12 border-top text-secondary text-left bg-white">
                 '.$sonbilgi['icerik_en'].'
                 </div>
              
               </div>  
            
            </div>';

        endwhile;

        echo '</div>';
        // mevcut introlar getiriliyor.
    }

    function hizmetekle() {

        echo '<div class="row text-center">
     <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info">HİZMET EKLE</h3></div>';

        if (!$_POST) :




            echo '<div class="col-lg-6 mx-auto">
               
             <div class="row card-bordered p-1 m-1 bg-light">
                <div class="col-lg-2 pt-3">
                  BAŞLIK (TR)
                 </div>
                 <div class="col-lg-10 p-2">
                 <form action="" method="post">
                 <input type="text" name="baslik_tr" class="form-control"> 
                 </div>
                 
                 <div class="col-lg-2 pt-3">
                  BAŞLIK (EN)
                 </div>
                 <div class="col-lg-10 p-2">
                 <input type="text" name="baslik_en" class="form-control"> 
                 </div>
                
                 <div class="col-lg-12 border-top p-2">
                  İÇERİK (TR)
                 </div>
                 <div class="col-lg-12 border-top p-2">
                 <textarea name="icerik_tr" rows="5" class="form-control" id="editor3"></textarea>'; ?>

            <script>
                ClassicEditor
                    .create( document.querySelector( '#editor3' ) )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>
            <?php
            echo '
                 </div>
                 
                 <div class="col-lg-12 border-top p-2">
                  İÇERİK (EN)
                 </div>
                 <div class="col-lg-12 border-top p-2">
                 <textarea name="icerik_en" rows="5" class="form-control" id="editor4"></textarea>'; ?>

            <script>
                ClassicEditor
                    .create( document.querySelector( '#editor4' ) )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>
            <?php
            echo '
                 </div>
                 
                  <div class="col-lg-12 border-top p-2">
                 <input type="submit" name="buton" value="HİZMET EKLE" class="btn btn-primary btn-sm">
                 </form>
                 </div>
              
               </div>  
            
            </div>';


        else :
            $baslik_tr=htmlspecialchars($_POST["baslik_tr"]);
            $icerik_tr=$_POST["icerik_tr"];
            $baslik_en=htmlspecialchars($_POST["baslik_en"]);
            $icerik_en=$_POST["icerik_en"];

            if ($baslik_tr=="" && $icerik_tr=="" && $baslik_en=="" && $icerik_en=="") :
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=hizmetekle","BAŞARISIZ","VERİLER BOŞ OLAMAZ","warning");
            </script> <?php
            else :
                self::sorgum("insert into hizmetler (baslik_tr,baslik_en,icerik_tr,icerik_en) VALUES('$baslik_tr','$icerik_tr','$baslik_en','$icerik_en')",0);
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=hizmet","BAŞARILI","EKLEME BAŞARILI","success");
            </script> <?php
            endif;
        endif;
        echo '</div>';

    }

    function hizmetguncelle() {

        echo '<div class="row text-center">
     <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info">HİZMET EKLE</h3></div>';

        // - ilk gelen id alınacak
        // - id ile veritabanına çıkılıp verinin bilgileri gelecek
        // - inputlara o veriler yazılacak
        // - hidden ile id post için taşınacak

        $kayitid=$_GET["id"];

        $kayitbilgial=self::sorgum("select * from hizmetler where id=$kayitid",1);

        if (!$_POST) :


            echo '<div class="col-lg-6 mx-auto">
               
             <div class="row card-bordered p-1 m-1 bg-light">
                 <div class="col-lg-2 pt-3">
                  BAŞLIK (TR)
                 </div>
                 <div class="col-lg-10 p-2">
                 <form action="" method="post">
                 <input type="text" name="baslik_tr" class="form-control" value="'.$kayitbilgial["baslik_tr"].'"> 
                 </div>
                 
                 <div class="col-lg-2 pt-3">
                  BAŞLIK (EN)
                 </div>
                 <div class="col-lg-10 p-2">
                 <input type="text" name="baslik_en" class="form-control" value="'.$kayitbilgial["baslik_en"].'"> 
                 </div>
                
                 <div class="col-lg-12 border-top p-2">
                  İÇERİK (TR)
                 </div>
                 <div class="col-lg-12 border-top p-2">
                 <textarea name="icerik_tr" rows="5" class="form-control" id="editor5">'.$kayitbilgial["icerik_tr"].'</textarea>'; ?>

            <script>
                ClassicEditor
                    .create( document.querySelector( '#editor5' ) )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>
            <?php
            echo '
                 </div>
                 
                 <div class="col-lg-12 border-top p-2">
                  İÇERİK (EN)
                 </div>
                 <div class="col-lg-12 border-top p-2">
                 <textarea name="icerik_en" rows="5" class="form-control" id="editor6">'.$kayitbilgial["icerik_en"].'</textarea>'; ?>

            <script>
                ClassicEditor
                    .create( document.querySelector( '#editor6' ) )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>
            <?php
            echo '
                 </div>
                 
                  <div class="col-lg-12 border-top p-2">
                  <input type="hidden" name="kayitidsi" value="'.$kayitbilgial["id"].'">
                 <input type="submit" name="buton" value="HİZMET GÜNCELLE" class="btn btn-primary btn-sm">
                 </form>
                 </div>
              
               </div>  
            
            </div>';


        else :
            $baslik_tr=htmlspecialchars($_POST["baslik_tr"]);
            $icerik_tr=$_POST["icerik_tr"];
            $baslik_en=htmlspecialchars($_POST["baslik_en"]);
            $icerik_en=$_POST["icerik_en"];

            $kayitidsi=htmlspecialchars($_POST["kayitidsi"]);

            if ($baslik_tr=="" && $icerik_tr=="" && $baslik_en=="" && $icerik_en=="") :
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=hizmetekle","BAŞARISIZ","VERİLER BOŞ OLAMAZ","warning");
            </script> <?php
            else :
                self::sorgum("update hizmetler set baslik_tr='$baslik_tr',baslik_en='$baslik_en',icerik_tr='$icerik_tr',icerik_en='$icerik_en' where id=$kayitidsi ",0);
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=hizmet","BAŞARILI","GÜNCELLEME BAŞARILI","success");
            </script> <?php
            endif;
        endif;
        echo '</div>';

    }

    function hizmetsil() {
        $kayitid=$_GET["id"];

        echo '<div class="row text-center">
       <div class="col-lg-12">';

        // veritabanı veri silme
        self::sorgum("delete from hizmetler where id=$kayitid",0);
        ?>  <script>
            BilgiPenceresi("control.php?sayfa=hizmet","BAŞARILI","BAŞARIYLA SİLİNDİ","success");
        </script> <?php

    }

// ---------------------- TASARIM GÜNCELLEME ---------------------------------

private function tasarimgetir ($gelentercih,$radioName,$id1,$id2) {
    echo '<div class="switch-field">';
    foreach ($this->tercihArray as $key => $value) :
      if ($gelentercih==$key) :
		echo'<input type="radio" id="radio-'.$id1.'" name="'.$radioName.'" value="'.$key.'" checked="checked" data-value="'.$radioName.'" />
		<label for="radio-'.$id1.'"> '.$value.'</label>';
      else:
      echo'<input type="radio" id="radio-'.$id2.'" name="'.$radioName.'" value="'.$key.'" data-value="'.$radioName.'" />
		<label for="radio-'.$id2.'">'.$value.'</label>';
      endif;
  endforeach;
    echo'</div>';

}

    function tasarimyonetim() {

        echo '<div class="row text-center">
     <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info">TASARIM YÖNETİM</h3></div>';

         $kayitbilgial=self::sorgum("select * from tasarim",1);

        if (!$_POST) :


            echo '<div class="col-lg-4 mx-auto">
               
             <div class="row card-bordered p-1 m-1 bg-light">
             
             <div class="col-lg-12 p-2 border-bottom"><h4>AKTİF & PASİF YÖNETİMİ</h4></div>
             
                 <div class="col-lg-6 pt-3 text-danger ">
                  HİZMETLER
                 </div>
                 <div class="col-lg-6 p-2">';
                    self::tasarimgetir($kayitbilgial["hiztercih"],"hiztercih",1,2);
              echo '</div>
                  <div class="col-lg-6 pt-3  text-danger">
                  REFERANSLAR
                 </div>
                 <div class="col-lg-6 p-2 ">';
                   self::tasarimgetir($kayitbilgial["reftercih"],"reftercih",3,4);
              echo '</div>
                 
                 
                  <div class="col-lg-6 pt-3  text-danger ">
                  MÜŞTERİ YORUMLARI
                 </div>
                 <div class="col-lg-6 p-2">';
                    self::tasarimgetir($kayitbilgial["yorumtercih"],"yorumtercih",5,6);
                echo'</div>
                 
                  
                  <div class="col-lg-6 pt-3  text-danger">
                  VİDEOLAR
                   </div>
                  <div class="col-lg-6 p-2">';
                 self::tasarimgetir($kayitbilgial["videotercih"],"videotercih",7,8);
                 echo'</div>
                 
                  <div class="col-lg-6 pt-3 text-danger ">
                  BÜLTEN
                  </div>
                  <div class="col-lg-6 p-2 ">';
                       self::tasarimgetir($kayitbilgial["bultentercih"],"bultentercih",9,10);
                echo'</div>

                <div class="col-lg-6 pt-3 text-danger">
                  HABER VE DUYURU
                  </div>
                  <div class="col-lg-6 p-2">';
                 self::tasarimgetir($kayitbilgial["habertercih"],"habertercih",11,12);
                  echo'</div>
                  <div class="col-lg-12  p-2">
                  <input type="hidden" name="kayitidsi" value="'.$kayitbilgial["id"].'">
                 </div>
              
               </div>  
            
            </div>';

                  endif;
        $tasarimbilgial=self::sorgum("select * from tasarimbolumler order by siralama ASC",2);
            echo '<div class="col-lg-4 mx-auto">
                 <table class="table table-striped mt-1 table-bordered">
                  <tbody>
                   <tr>
                   <td colspan="3"><h4>BÖLÜM SIRALAMASI</h4></td>
                   </tr>';

            while ($bolumson=$tasarimbilgial->fetch(PDO::FETCH_ASSOC)) :
                echo '<tr>
                   <td>'.$bolumson["ad"].'</td>
                   <td>'.$bolumson["siralama"].'</td>
                   <td><a href="control.php?sayfa=tasarimguncelle&id='.$bolumson['id'].'" class="ti-reload 
                  text-success" style="font-size:20px;"></a></td>
                   </tr>';
            endwhile;


                echo '</tbody></table>
     
            </div>';

        echo '</div>';

    }

    function tasarimguncelle() {

        $linklerebak = parent::sorgum( "select * from tasarimbolumler ", 2);

        echo '<div class="row text-center">
     <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info">BÖLÜM GÜNCELLE</h3></div>';

        $kayitid=$_GET["id"];
        $kayitbilgial=parent::sorgum("select * from tasarimbolumler where id=$kayitid",1);

        if (!$_POST) :
            echo '<div class="col-lg-6 mx-auto">
             <div class="row card-bordered p-1 m-1 bg-light">
                 <div class="col-lg-2 pt-3">
                 <form action="" method="post">
                  Bölüm sırası: <b>'.$kayitbilgial["siralama"].'</b>
                 </div>
                 <div class="col-lg-10 p-2">
                 <select name="gideceksira" class="form-control">';
            while($sonbilgi=$linklerebak->fetch(PDO::FETCH_ASSOC)) :
                if ($sonbilgi["siralama"]!=$kayitbilgial["siralama"] ) :
                    echo '<option value="'.$sonbilgi["siralama"].'">'.$sonbilgi["siralama"].'-'.$sonbilgi["ad"].'</option>';
                endif;
            endwhile;
            echo'</select> 
                 </div>
                  <div class="col-lg-12 border-top p-2">
                  <input type="hidden" name="kayitidsi" value="'.$kayitbilgial["id"].'">
                  <input type="hidden" name="mevcutsira" value="'.$kayitbilgial["siralama"].'">
                 <input type="submit" name="buton" value="BÖLÜM GÜNCELLE" class="btn btn-primary btn-sm">
                 </form>
                 </div>
               </div>  
            </div>';
        else :
            $gideceksira=htmlspecialchars($_POST["gideceksira"]);
            $mevcutsira=htmlspecialchars($_POST["mevcutsira"]);
            $kayitidsi=htmlspecialchars($_POST["kayitidsi"]);

            if ($gideceksira=="") :
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=tas","BAŞARISIZ","VERİLER BOŞ OLAMAZ","warning");
            </script> <?php
            else :
                parent::sorgum("update tasarimbolumler set siralama=$mevcutsira  where siralama=$gideceksira ",0);
                parent::sorgum("update tasarimbolumler set siralama=$gideceksira where id=$kayitidsi ",0);
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=tas","BAŞARILI","GÜNCELLEME BAŞARILI","success");
            </script> <?php
            endif;
        endif;
        echo '</div>';
    }

// ---------------------- VERİTABANI BAKIM ---------------------------------

    function bakim () {

echo '<div class="row text-center">
<div class="col-lg-12 text-center">';

        if ($_POST) :
      // sabit tabloları yazarsam yeni tablo eklemede veya silmede sorun çıkar.
        $tablolar=self::sorgum("SHOW TABLES",2);
        while($tabloson=$tablolar->fetch(PDO::FETCH_ASSOC)) :
            $this->query("REPAIR TABLE ".$tabloson["Tables_in_kurumsal"]);
            $this->query("OPTIMIZE TABLE ".$tabloson["Tables_in_kurumsal"]);
            echo '<div class="alert alert-success mt-1 col-lg-3 mx-auto"><b>'.$tabloson["Tables_in_kurumsal"]."</b> tablosuna işlem yapıldı.</div>";
            header("refresh:4,url=control.php?sayfa=bakim");
        endwhile;
        echo '</div>';
        $zaman=date('d/m/Y - H:i');
            $tablolar=self::sorgum("update ayarlar set bakimzaman='$zaman'",0);
        else:
            ?>
            <div class="col-lg-4 mx-auto mt-2">
                <div class="card card-bordered">
                    <div class="card-body">
                        <h5 class="title border-bottom">VERİTABANI BAKIM</h5>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="submit" name="buton" value="BAKIMI BAŞLAT" class="btn btn-primary mb-1">
                        </form>
                        <?php
                        $zamanbak=self::sorgum("select bakimzaman from ayarlar",1);

                        echo '<div class="alert alert-warning mt-1 mx-auto"> En son bakım : <b>'.$zamanbak["bakimzaman"].'</b></div>';
                        ?>
                    </div>
                </div>
            </div>
        <?php
        endif;
        echo '</div>';
}

    function yedek () {

        echo '<div class="row text-center">
         <div class="col-lg-12 text-center">';

        if ($_POST) :
             $this->yedekal();
            echo '</div>';
        else:
            ?>
            <div class="col-lg-4 mx-auto mt-2">
                <div class="card card-bordered">
                    <div class="card-body">
                        <h5 class="title border-bottom">VERİTABANI YEDEK</h5>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="submit" name="buton" value="YEDEK AL" class="btn btn-primary mb-1">
                        </form>
                        <?php
                        $zamanbak=self::sorgum("select yedekzaman from ayarlar",1);
                        echo '<div class="alert alert-warning mt-1 mx-auto"> En son yedek : <b>'.$zamanbak["yedekzaman"].'</b></div>';
                        ?>
                    </div>
                </div>
            </div>
        <?php
        endif;
        echo '</div>';
    }

    function yedekal() {
        $tables=array();

        $result=self::sorgum("SHOW TABLES",2);
        while($tabloson=$result->fetch(PDO::FETCH_ASSOC)) :
            $tables[]=$tabloson["Tables_in_kurumsal"];
        endwhile;
        $return="SET NAMES utf8;";
        foreach($tables as $tablo) :
            $veriler=self::sorgum("SELECT * FROM $tablo",2);
            $numColumns=$veriler->columnCount();
            $return.="DROP TABLE IF EXISTS $tablo;";
            $olustur=self::sorgum("SHOW CREATE TABLE $tablo",2);
            $sonuc=$olustur->fetch(PDO::FETCH_ASSOC);
            $return.="\n\n".$sonuc["Create Table"].";\n\n";

            for ($i=0; $i<$numColumns; $i++):
               while ($row=$veriler->fetch(PDO::FETCH_NUM)):
                   $return.="INSERT INTO $tablo VALUES(";
                      for ($a=0; $a<$numColumns; $a++):
                          if (isset($row[$a])) :
                             $return.='"'.$row[$a].'"';
                          else:
                              $return.='""';
                          endif;
                          if($a<($numColumns-1)) :
                              $return.=',';
                          endif;
                      endfor;
                   $return.=");\n";
               endwhile;
            endfor;
            $return.="\n\n\n";
        endforeach;

        $dosyaolustur=fopen('Db Yedek/yedek-'.date('d.m.Y').'.sql','w+');
        fwrite($dosyaolustur,$return);
        fclose($dosyaolustur);

        $zaman=date('d/m/Y - H:i');
        self::sorgum("update ayarlar set yedekzaman='$zaman'",0);

        echo '<div class="alert alert-success mt-1 mx-auto">YEDEK BAŞARIYLA ALINDI</div>';
        header("refresh:2,url=control.php?sayfa=yedek");
    }

// ---------------------- DUYURU VE HABERLER ---------------------------------

    function haberler() {

        echo '<div class="row text-center">
     <div class="col-lg-12 border-bottom"><h4 class="float-left mt-3 text-dark mb-2"><a href="control.php?sayfa=haberekle" class="ti-plus bg-dark p-1 text-white mr-2 mt-3" ></a>
     HABER VE DUYURULAR</h4>
     </div>';


        $introbilgiler=self::sorgum( "select * from haberler",2);

        while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)) :

            echo '<div class="col-lg-6">
               
             <div class="row card-bordered p-1 m-1 bg-light">
                 <div class="col-lg-10 pt-1 pb-1 text-left text-danger">
                 <b class="text-dark"> TARİH : </b> '.$sonbilgi["tarih"].'
                 </div>
                 <div class="col-lg-2 text-right">
                 <a href="control.php?sayfa=haberguncelle&id='.$sonbilgi['id'].'" class="ti-reload 
                  text-success" style="font-size:20px;"></a>'; ?>

            <a onclick="silmedenSor('control.php?sayfa=habersil&id=<?php echo $sonbilgi['id']; ?>'); return false" class="ti-trash m-2
                  text-danger" style="font-size:20px;"></a>
            <?php echo'
                 </div>
                 <div class="col-lg-12 border-top text-secondary text-left bg-white text-info"><b class="text-dark">TR : </b>
                 '.$sonbilgi['icerik_tr'].'
                 </div>
                 <div class="col-lg-12 border-top text-secondary text-left bg-white text-info"><b class="text-dark">EN : </b>
                 '.$sonbilgi['icerik_en'].'
                 </div>
              
               </div>  
            
            </div>';

        endwhile;

        echo '</div>';
        // mevcut introlar getiriliyor.
    }

    function haberekle() {

        echo '<div class="row text-center">
     <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info">HABER EKLE</h3></div>';

        if (!$_POST) :

            echo '<div class="col-lg-6 mx-auto">
               
             <div class="row card-bordered p-1 m-1 bg-light">
               
                 <div class="col-lg-12 border-top p-2">
                 <form action="" method="post">
                  İÇERİK (TR)
                 </div>
                 <div class="col-lg-12 border-top p-2">
                 <textarea name="icerik_tr" rows="5" class="form-control" id="editor7"></textarea>'; ?>

            <script>
                ClassicEditor
                    .create( document.querySelector( '#editor7' ) )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>
            <?php
            echo '
                 </div>
                 
                 <div class="col-lg-12 border-top p-2">
                  İÇERİK (EN)
                 </div>
                 <div class="col-lg-12 border-top p-2">
                 <textarea name="icerik_en" rows="5" class="form-control" id="editor8"></textarea>'; ?>

            <script>
                ClassicEditor
                    .create( document.querySelector( '#editor8' ) )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>
            <?php
            echo '
                 </div>
                 
                  <div class="col-lg-12 border-top p-2">
                 <input type="submit" name="buton" value="HABER EKLE" class="btn btn-primary btn-sm">
                 </form>
                 </div>
              
               </div>  
            
            </div>';


        else :
            $icerik_tr=$_POST["icerik_tr"];
            $icerik_en=$_POST["icerik_en"];

            if ( $icerik_tr=="" &&  $icerik_en=="") :
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=haberekle","BAŞARISIZ","VERİLER BOŞ OLAMAZ","warning");
            </script> <?php
            else :
                self::sorgum("insert into haberler (icerik_tr,icerik_en) VALUES('$icerik_tr','$icerik_en')",0);
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=haberler","BAŞARILI","EKLEME BAŞARILI","success");
            </script> <?php

            endif;

            endif;


        echo '</div>';

    }

    function haberguncelle() {

        echo '<div class="row text-center">
     <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info">HABER GÜNCELLE</h3></div>';

        $kayitid=$_GET["id"];

        $kayitbilgial=self::sorgum("select * from haberler where id=$kayitid",1);

        if (!$_POST) :


            echo '<div class="col-lg-6 mx-auto">
               
             <div class="row card-bordered p-1 m-1 bg-light">
                 
                 <div class="col-lg-12 border-top p-2">
                 <form action="" method="post">
                  İÇERİK (TR)
                 </div>
                 <div class="col-lg-12 border-top p-2">
                 <textarea name="icerik_tr" rows="5" class="form-control" id="editor9">'.$kayitbilgial["icerik_tr"].'</textarea>'; ?>

            <script>
                ClassicEditor
                    .create( document.querySelector( '#editor9' ) )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>
            <?php
            echo '
                 </div>
                 
                 <div class="col-lg-12 border-top p-2">
                  İÇERİK (EN)
                 </div>
                 <div class="col-lg-12 border-top p-2">
                 <textarea name="icerik_en" rows="5" class="form-control" id="editor10">'.$kayitbilgial["icerik_en"].'</textarea>'; ?>

            <script>
                ClassicEditor
                    .create( document.querySelector( '#editor10' ) )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>
            <?php
            echo '
                 </div>
                 
                  <div class="col-lg-12 border-top p-2">
                  <input type="hidden" name="kayitidsi" value="'.$kayitbilgial["id"].'">
                 <input type="submit" name="buton" value="HABER GÜNCELLE" class="btn btn-primary btn-sm">
                 </form>
                 </div>
              
               </div>  
            
            </div>';


        else :
            $icerik_tr=$_POST["icerik_tr"];
            $icerik_en=$_POST["icerik_en"];

            $kayitidsi=htmlspecialchars($_POST["kayitidsi"]);

            if ( $icerik_tr=="" && $icerik_en=="") :
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=haberler","BAŞARISIZ","VERİLER BOŞ OLAMAZ","warning");
            </script> <?php
                echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-danger mt-1">VERİLER BOŞ OLAMAZ</div>
            </div>';
                header("refresh:2,url=control.php?sayfa=haberekle");

            else :
                self::sorgum("update haberler set icerik_tr='$icerik_tr',icerik_en='$icerik_en',tarih=CURRENT_TIMESTAMP() where id=$kayitidsi ",0);
                ?>  <script>
                BilgiPenceresi("control.php?sayfa=haberler","BAŞARILI","GÜNCELLEME BAŞARILI","success");
            </script> <?php
            endif;
        endif;


        echo '</div>';

    }

    function habersil() {
        $kayitid=$_GET["id"];

        echo '<div class="row text-center">
       <div class="col-lg-12">';

        self::sorgum("delete from haberler where id=$kayitid",0);
        ?>  <script>
            BilgiPenceresi("control.php?sayfa=haberler","BAŞARILI","BAŞARIYLA SİLİNDİ","success");
        </script> <?php

    }


}


?>
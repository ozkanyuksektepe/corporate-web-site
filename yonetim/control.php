<?php include_once ('../config/genel.php'); include_once (YONETİM_YOL.'assets/fonksiyon.php');
$yonetim= new yonetim;
$yonetim->dahilet(array("fonksiyon2"=>"yonetim2","fonksiyon3"=>"yonetim3","yetkikontrol"=>"yetkiKontrol"));
$yonetim->kontrolet("cot");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
   
    <title>Udemy Nakliyat-Yönetim Paneli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo YONETİM_URL; ?>assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/metisMenu.css">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/slicknav.min.css">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/typography.css">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/default-css.css">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/responsive.css">
    <script src="<?php echo YONETİM_URL; ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        function BilgiPenceresi(linkAdres,sonucbaslik,sonucmetin,sonuctur) {

            swal(sonucbaslik, sonucmetin, sonuctur, {
                buttons: {

                    catch: {
                        text: "KAPAT",
                        value: "tamam",
                    }
                },
            })
                .then((value) => {
                    if (value=="tamam") {
                        window.location.href =  linkAdres;
                    }

                });
        }

        function silmedenSor (gidilecekLink) {

            swal({
                title: "Silmek istediğine emin misin?",
                text: "Silinen kayıt geri alınamaz.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href =  gidilecekLink;
                    } else {
                        swal({title:"Silme işleminden vazgeçtiniz", icon: "warning",});
                    }
                });
        }

        $(document).ready(function() {
          $("#sablonduzensecme select").on("change",function() {
             var id=$(this).val();
             var baslik=$(this).children("option:selected").attr("data-baslik");
             var icerik=$(this).children("option:selected").attr("data-icerik");



              if (id != 0) {
                  $("#sablonduzenleme").html('<div class="row"><div class="col-xl-6 col-lg-6 col-md-6 mx-auto col-sm-12 borderbot">
                      <div class="row">
                      <div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-sm-12 text-center p-2 borderbot">
                          <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-4 mx-auto col-sm-12 pt-2">
                              <span>ŞABLON BAŞLIK</span>
                          </div>
                              <div class="col-xl-8 col-lg-8 col-md-8 mx-auto col-sm-12 ">
                                  <form id="sablonguncelle">
                                      <input type="text" class="form-control" name="baslik" value="'+ baslik+'">
                              </div>
                          </div>
                      </div>
                          <div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-sm-12 text-center p-2 borderbot">
                              <span>ŞABLON İÇERİK</span>
                          </div>
                          <div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-sm-12 text-center">
                              <textarea name="icerik" rows="7" class="form-control p-2 mb-1 mt-1" value="'+ icerik+'"></textarea>
                          </div>
                          <div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-sm-12 text-center">
                              <input type="hidden" class="form-control" name="sablonid" value="'+ id+'">
                                  <input type="button" class="btn btn-success btn-sm" value="GÜNCELLE" id="sablonguncellebtn">
                                      <input type="button" class="btn btn-danger btn-sm" value="SİL" id="sablonsilbtn">
                                      </form></div></div></div>');
                      }
                      else {
                          $("#sablonduzenleme").html('<div class="alert alert-danger mt-2">Geçerli bir değer seçiniz.</div>');
                      }
                      });
                      $(document).on("click","#sablonguncellebtn",function() {
                          alert("yakaladık");
                          );
              });
        });
    </script>
</head>

<body>


<!-- page container area start -->
<div class="page-container">
    <!-- sidebar menu area start -->
    <div class="sidebar-menu">
        <div class="sidebar-header">
            <div class="logo">
                <a href="control.php"><img src="assets/images/logo/logo.png" alt="logo"></a>
            </div>
        </div>
        <div class="main-menu">
            <div class="menu-inner">
                <nav>
                    <ul class="metismenu" id="menu">
                    <?php $yonetim->yetkiKontrol->linkkontrol(); ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- sidebar menu area end -->
    <!-- main content area start -->
    <div class="main-content">
        <!-- header area start -->
        <div class="header-area">
            <div class="row align-items-center" style="max-height: 30px;">
                <!-- nav and search button -->
                <div class="col-md-6 col-sm-8 clearfix">
                    <div class="nav-btn pull-left">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                </div>
                <!-- profile info & task notification -->
                <div class="col-sm-6 clearfix">
                    <div class="user-profile pull-right" style="height: 40px;">
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user mr-2"></i><?php echo $yonetim->kuladial(); ?> <i class="fa fa-angle-down"></i></h4>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="control.php?sayfa=ayarlar">Ayarlar</a>
                            <a class="dropdown-item" href="control.php?sayfa=cikis">Çıkış</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header area end -->
        <!-- page title area start -->

        <!-- page title area end -->
        <div class="main-content-inner">
            <!-- sales report area start -->
            <div class="row">
                <div class="col-lg-12 mt-2 bg-white text-center" style="min-height:500px;">


                    <?php

                    @$sayfa=$_GET["sayfa"];
                    switch ($sayfa) :

                        case "siteayar":
                            $yonetim->yetkiKontrol->bolumkontrol("genel_yetki");
                            $yonetim->siteayar();
                            break;

                        case "cikis":
                            $yonetim->cikis();
                            break;
                    //-----------------------------------------
                        case "introayar":
                            $yonetim->yetkiKontrol->bolumkontrol("intro_yetki");
                            $yonetim->introayar();
                            break;

                        case "introresimguncelle":
                            $yonetim->yetkiKontrol->bolumkontrol("intro_yetki");
                            $yonetim->introresimguncelle();
                            break;

                        case "introresimsil":
                            $yonetim->yetkiKontrol->bolumkontrol("intro_yetki");
                            $yonetim->introsil();
                            break;

                        case "introresimekle":
                            $yonetim->yetkiKontrol->bolumkontrol("intro_yetki");
                            $yonetim->introresimekle();
                            break;

                     //-----------------------------------------

                        case "aracfilo":
                            $yonetim->yetkiKontrol->bolumkontrol("arac_yetki");
                            $yonetim->aracfilo();
                            break;

                        case "aracfiloguncelle":
                            $yonetim->yetkiKontrol->bolumkontrol("arac_yetki");
                            $yonetim->aracfiloguncelle();
                            break;

                        case "aracfilosil":
                            $yonetim->yetkiKontrol->bolumkontrol("arac_yetki");
                            $yonetim->aracfilosil();
                            break;

                        case "aracfiloekle":
                            $yonetim->yetkiKontrol->bolumkontrol("arac_yetki");
                            $yonetim->aracfiloekle();
                            break;

                      //-----------------------------------------
                        case "hakkimizda":
                            $yonetim->yetkiKontrol->bolumkontrol("hakkimiz_yetki");
                            $yonetim->yonetim2->hakkimizda();
                            break;

                      //-----------------------------------------
                        case "hizmet":
                            $yonetim->yetkiKontrol->bolumkontrol("hizmet_yetki");
                            $yonetim->yonetim2->hizmetlerhepsi();
                            break;
                        case "hizmetguncelle":
                            $yonetim->yetkiKontrol->bolumkontrol("hizmet_yetki");
                            $yonetim->yonetim2->hizmetguncelle();
                            break;

                        case "hizmetsil":
                            $yonetim->yetkiKontrol->bolumkontrol("hizmet_yetki");
                            $yonetim->yonetim2->hizmetsil();
                            break;

                        case "hizmetekle":
                            $yonetim->yetkiKontrol->bolumkontrol("hizmet_yetki");
                            $yonetim->yonetim2->hizmetekle();
                            break;

                        //-----------------------------------------
                        case "referans":
                            $yonetim->yetkiKontrol->bolumkontrol("referans_yetki");
                            $yonetim->yonetim2->referanslarhepsi();
                            break;

                        case "referanssil":
                            $yonetim->yetkiKontrol->bolumkontrol("referans_yetki");
                            $yonetim->yonetim2->referanssil();
                            break;

                        case "referansekle":
                            $yonetim->yetkiKontrol->bolumkontrol("referans_yetki");
                            $yonetim->yonetim2->referansekle();
                            break;

                        //-----------------------------------------

                        case "yorumlar":
                            $yonetim->yetkiKontrol->bolumkontrol("yorum_yetki");
                            $yonetim->yonetim2->yorumlar();
                            break;
                        case "yorumlarguncelle":
                            $yonetim->yetkiKontrol->bolumkontrol("yorum_yetki");
                            $yonetim->yonetim2->yorumguncelle();
                            break;

                        case "yorumlarsil":
                            $yonetim->yetkiKontrol->bolumkontrol("yorum_yetki");
                            $yonetim->yonetim2->yorumsil();
                            break;

                        case "yorumlarekle":
                            $yonetim->yetkiKontrol->bolumkontrol("yorum_yetki");
                            $yonetim->yonetim2->yorumekle();
                            break;

                        //-----------------------------------------

                        case "gelenmesaj":
                            $yonetim->yetkiKontrol->bolumkontrol("mesaj_yetki");
                            $yonetim->gelenmesajlar();
                            break;

                        case "mesajoku":
                            $yonetim->yetkiKontrol->bolumkontrol("mesaj_yetki");
                            $yonetim->mesajdetay($_GET["id"]);
                            break;

                        case "mesajarsivle":
                            $yonetim->yetkiKontrol->bolumkontrol("mesaj_yetki");
                            $yonetim->mesajarsivle($_GET["id"]);
                            break;

                        case "mesajsil":
                            $yonetim->yetkiKontrol->bolumkontrol("mesaj_yetki");
                            $yonetim->mesajsil($_GET["id"]);
                            break;

                        //-----------------------------------------

                        case "mailayar":
                            $yonetim->yetkiKontrol->bolumkontrol("ayar_yetki");
                            $yonetim->yonetim2->mailayar();
                            break;

                        //-----------------------------------------

                        case "ayarlar":
                            $yonetim->yetkiKontrol->bolumkontrol("ayar_yetki");
                            $yonetim->yonetim2->ayarlar();
                            break;

                        //-----------------------------------------

                        case "kulayar":
                            $yonetim->yetkiKontrol->bolumkontrol("yonetici_yetki");
                            $yonetim->yonetim2->kullistele();
                            break;

                        case "yonsil":
                            $yonetim->yetkiKontrol->bolumkontrol("yonetici_yetki");
                            $yonetim->yonetim2->yonsil($_GET["id"]);
                            break;

                        case "yonekle":
                            $yonetim->yetkiKontrol->bolumkontrol("yonetici_yetki");
                            $yonetim->yonetim2->yonekle();
                            break;

                        case "yonguncelle":
                            $yonetim->yetkiKontrol->bolumkontrol("yonetici_yetki");
                            $yonetim->yonetim2->yonguncelle();
                            break;

                        //-----------------------------------------

                        case "tas":
                            $yonetim->yetkiKontrol->bolumkontrol("tasarim_yetki");
                            $yonetim->yonetim2->tasarimyonetim();
                            break;

                        case "tasarimguncelle":
                            $yonetim->yetkiKontrol->bolumkontrol("tasarim_yetki");
                            $yonetim->yonetim2->tasarimguncelle();
                            break;

                        //-----------------------------------------

                        case "bakim":
                            $yonetim->yetkiKontrol->bolumkontrol("ayar_yetki");
                            $yonetim->yonetim2->bakim();
                            break;
                        case "yedek":
                            $yonetim->yetkiKontrol->bolumkontrol("ayar_yetki");
                            $yonetim->yonetim2->yedek();
                            break;


                        //-----------------------------------------
                        case "linkayar":
                            $yonetim->yetkiKontrol->bolumkontrol("ayar_yetki");
                            $yonetim->yonetim3->linkayar();
                            break;
                        case "linkguncelle":
                            $yonetim->yetkiKontrol->bolumkontrol("ayar_yetki");
                            $yonetim->yonetim3->linkguncelle();
                            break;

                        case "linksil":
                            $yonetim->yetkiKontrol->bolumkontrol("ayar_yetki");
                            $yonetim->yonetim3->linksil();
                            break;

                        case "linkekle":
                            $yonetim->yetkiKontrol->bolumkontrol("ayar_yetki");
                            $yonetim->yonetim3->linkekle();
                            break;

                        //-----------------------------------------
                        case "videolar":
                            $yonetim->yetkiKontrol->bolumkontrol("video_yetki");
                            $yonetim->yonetim3->videolar();
                            break;
                        case "videoguncelle":
                            $yonetim->yetkiKontrol->bolumkontrol("video_yetki");
                            $yonetim->yonetim3->videoguncelle();
                            break;

                        case "videosil":
                            $yonetim->yetkiKontrol->bolumkontrol("video_yetki");
                            $yonetim->yonetim3->videosil();
                            break;

                        case "videoekle":
                            $yonetim->yetkiKontrol->bolumkontrol("video_yetki");
                            $yonetim->yonetim3->videoekle();
                            break;

                        //-----------------------------------------
                        case "haberler":
                            $yonetim->yetkiKontrol->bolumkontrol("haber_yetki");
                            $yonetim->yonetim2->haberler();
                            break;
                        case "haberguncelle":
                            $yonetim->yetkiKontrol->bolumkontrol("haber_yetki");
                            $yonetim->yonetim2->haberguncelle();
                            break;

                        case "habersil":
                            $yonetim->yetkiKontrol->bolumkontrol("haber_yetki");
                            $yonetim->yonetim2->habersil();
                            break;

                        case "haberekle":
                            $yonetim->yetkiKontrol->bolumkontrol("haber_yetki");
                            $yonetim->yonetim2->haberekle();
                            break;

                        //-----------------------------------------
                        case "bulten":
                            $yonetim->yetkiKontrol->bolumkontrol("bulten_yetki");
                            $yonetim->yonetim3->bulten();
                            break;

                        case "mailgonderme":
                            $yonetim->yetkiKontrol->bolumkontrol("bulten_yetki");
                            $yonetim->yonetim3->mailgonderme();
                            break;


                        //-----------------------------------------
                        default:
                            if ($yonetim->yetkiKontrol->genel_yetki==1) :
                                $yonetim->yonetim3->istatistikbar();

                            elseif ($yonetim->yetkiKontrol->genel_yetki==2) :
                                $yonetim->introayar();

                            elseif ($yonetim->yetkiKontrol->genel_yetki==3) :
                                $yonetim->yonetim2->yorumlar();

                            endif;
                    endswitch;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- main content area end -->
</div>
<!-- page container area end -->




    <script src="<?php echo YONETİM_URL; ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="<?php echo YONETİM_URL; ?>assets/js/popper.min.js"></script>
    <script src="<?php echo YONETİM_URL; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo YONETİM_URL; ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo YONETİM_URL; ?>assets/js/metisMenu.min.js"></script>
    <script src="<?php echo YONETİM_URL; ?>assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?php echo YONETİM_URL; ?>assets/js/jquery.slicknav.min.js"></script>
    <script src="<?php echo YONETİM_URL; ?>assets/js/plugins.js"></script>
    <script src="<?php echo YONETİM_URL; ?>assets/js/scripts.js"></script>
    <script src="<?php echo YONETİM_URL; ?>assets/js/notify.js"></script>
</body>

</html>

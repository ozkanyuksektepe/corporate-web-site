<?php session_start();
include_once("config/genel.php");
include_once(ARAYUZ_YOL."lib/teknikfonksiyon.php");
$teknik=new teknik;
$teknik->dilkontrol();
$teknik->cachekontrol(md5($_SERVER["REQUEST_URI"]),5);
ob_start();
include_once (ARAYUZ_YOL."lib/fonksiyon.php");
include_once (ARAYUZ_YOL."lib/tasarim.php");
$sinif= new kurumsal;
$tas= new tasarim;

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
  <title><?php echo $sinif->normaltitle; ?></title>
    <meta name="title" content="<?php echo $sinif->metatitle; ?>">
    <meta name="description" content="<?php echo $sinif->metadesc; ?>">
    <meta name="keywords" content="<?php echo $sinif->metakey; ?>">
    <meta name="author" content="<?php echo $sinif->metaauthor; ?>">
    <meta name="owner" content="<?php echo $sinif->metaown; ?>">
    <meta name="copyright" content="<?php echo $sinif->metacopy; ?>">

    <!-- Kütüphaneler -->
    <script src="<?php echo URL; ?>lib/jquery/jquery.min.js"></script>
    <script src="<?php echo URL; ?>lib/jquery/jquery-migrate.min.js"></script>
    <script src="<?php echo URL; ?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo URL; ?>lib/easing/easing.min.js"></script>
    <script src="<?php echo URL; ?>lib/superfish/hoverIntent.js"></script>
    <script src="<?php echo URL; ?>lib/superfish/superfish.min.js"></script>
    <script src="<?php echo URL; ?>lib/wow/wow.min.js"></script>
    <script src="<?php echo URL; ?>lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?php echo URL; ?>lib/magnific-popup/magnific-popup.min.js"></script>
    <script src="<?php echo URL; ?>lib/sticky/sticky.js"></script>
    <script src="<?php echo URL; ?>js/main.js"></script>


    <script type="text/javascript" src="<?php echo URL; ?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>js/jquery.vticker-min.js"></script>
    <script type="text/javascript">
        $(function(){

            $('#news-container1').vTicker({
                speed: 700,
                pause: 4000,
                animation: 'fade',
                mousePause: false,
                showItems: 1
            });
        });
    </script>


  <!-- Fontlar -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap stil dosyası -->
  <link href="<?php echo URL; ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- işimize yarayacak diğer kütüphane css dosyalarımız -->
  <link href="<?php echo URL; ?>lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo URL; ?>lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo URL; ?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo URL; ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo URL; ?>lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="<?php echo URL; ?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- bizim stil dosyamız -->
  <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">

<script>
    $(document).ready(function(e){
        $('#bultensonuc').hide();

        $("#gonderbtn").click(function() {

           var error=false;


           var form=$("#mailform").find('.form-group');
           form.children('input').each(function() {
               var i=$ (this);
               i.css("border-color","");
               if (i.val() =="") {
                   i.css("border-color", "red")
                   $('#mesajsonuc').text("Lütfen Tüm Alanları Doldurun");
                   error=true;
               }
               else {
                   error=false;
                   $('#mesajsonuc').text("");
               }

           });

            if (form.children('textarea').val() =="") {
                form.children('textarea').css("border-color", "red")
                $('#mesajsonuc').text("Lütfen Tüm Alanları Doldurun");
                error=true;
            }
            else {
                error=false;
                $('#mesajsonuc').text("");
            }

            if (!error) {
                $.ajax({
                    type:"POST",
                    url:'<?php echo URL; ?>lib/mail/gonder.php',
                    data:$('#mailform').serialize(),
                    success:function(donen) {
                        $('#mailform').trigger("reset");
                        $('#formtutucu').fadeOut(500);
                        $('#mesajsonuc').html(donen);
                    },

                });
            }
        });

            $("#bultenbtn").click(function() {
                $.ajax({
                    type:"POST",
                    url:'<?php echo URL; ?>lib/islem.php?islem=bultenislem',
                    data:$('#bultenform').serialize(),
                    success:function(donen) {
                        $('#bultenform').trigger("reset");
                        $('#bultentutucu').fadeOut();
                        $('#bultensonuc').html(donen).fadeIn();



                    },

                });
            });

    });
</script>

</head>

<body id="body">


<!-- ÜST BAR -->

<section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
        <div class="contact-info float-left">
            <i class="fa fa-envelope-o"></i><a href="mailto:<?php echo $sinif->mailadres; ?>"><?php echo $sinif->mailadres; ?></a>
            <i class="fa fa-phone"></i><?php echo $sinif->telno; ?>
        </div>

        <div class="social-links float-right">
            <a href="<?php echo $sinif->twit; ?>" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="<?php echo $sinif->face; ?>" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="<?php echo $sinif->inst; ?>" class="instagram"><i class="fa fa-instagram"></i></a>
            <a href="<?php echo $sinif->link; ?>" class="linkedin"><i class="fa fa-linkedin"></i></a>


            <a href="tr" class="twitter">TR</a>
            <a href="en" class="twitter">EN</a>


        </div>


    </div>

</section>


<!-- header -->

<header id="header">
    <div class="container">
        <div id="logo" class="pull-left">
            <h1><a href="#body" class="scrollto"><?php echo $sinif->logoyazi; ?></a></h1>
        </div>
        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <?php echo $sinif->linkler(); ?>
            </ul>
        </nav>
    </div>
</header>

<!-- INTRO -->

<section id="intro">

    <div class="intro-content">
        <h2><?php echo $sinif->slogan; ?></h2>
    </div>
    <div id="intro-carousel" class="owl-carousel">
        <?php $sinif->introbak(); ?>
    </div>

</section>


<main id="main">

    <!-- BİZDEN HABERLER BÖLÜMÜ -->
    <?php $tas->HabertasarimDuzen(); ?>
    <!-- BİZDEN HABERLER BÖLÜMÜ -->


    <!-- TÜM BÖLÜMLERİN SIRALAMA KODLARI -->
    <?php $tas->tasarimbolumleri(); ?>
<!-- TÜM BÖLÜMLERİN SIRALAMA KODLARI -->


<!-- İLETİŞİM -->

<section id="iletisim" class="wow fadeInUp">

    <div class="container">
        <div class="section-header">
            <h2><?php echo $sinif->iletisimustbaslik; ?></h2>
            <p><?php echo $sinif->iletisimbaslik; ?> </p>
        </div>

        <div class="row contact-info">
            <div class="col-md-4">
                <div class="contact-address">
                    <i class="ion-ios-location-outline"></i>
                    <h3><?php echo $sinif->adresbilgi; ?></h3>
                    <address><?php echo $sinif->normaladres; ?></address>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-phone">
                    <i class="ion-ios-telephone-outline"></i>
                    <h3><?php echo $sinif->telefonbilgi; ?></h3>
                    <p><a href="<?php echo $sinif->telno; ?>"><?php echo $sinif->telno; ?></a></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-email">
                    <i class="ion-ios-email-outline"></i>
                    <h3><?php echo $sinif->mailbilgi; ?></h3>
                    <p><a href="mailto:<?php echo $sinif->mailadres; ?>"><?php echo $sinif->mailadres; ?></a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-4">
        <iframe src="<?php echo $sinif->haritabilgi;?>"
                width="100%" height="380" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <div class="container">
        <div class="form">
            <div id="mesajsonuc"></div>
            <div id="formtutucu">
            <form id="mailform">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" name="ad" class="form-control" placeholder="<?php echo $sinif->adbilgi; ?>" required="required">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" name="mail" class="form-control" placeholder="<?php echo $sinif->mailbilgi; ?>" required="required">
                    </div>
                </div>

    <div class="form-group">
        <input type="text" name="konu" class="form-control" placeholder="<?php echo $sinif->konubilgi; ?>" required="required">
    </div>

    <div class="form-group">
        <textarea class="form-control" name="mesaj" rows="5"></textarea>
    </div>

      <div class="form-row">
          <div class="form-group col-md-6">
                  <div class="form-row">
                     <div class="form-group col-md-3">
                         <img src="<?php echo URL; ?>captcha.php">
                     </div>
                     <div class="form-group col-md-9">
                         <input type="text" name="guvenlik" class="form-control" placeholder="<?php echo $sinif->guvenlikbilgi; ?>" required="required">
                     </div>
                  </div>
          </div>
          <div class="form-group col-md-6">
              <?php
              $token=md5(mt_rand(0,9999999));
              $_SESSION["token"]=$token;

              ?>
              <input type="hidden" name="token" value="<?php echo $token; ?>">
          <input type="button" value="<?php echo $sinif->butonbilgi; ?>" id="gonderbtn" class="btn btn-info"
      </div>

      </div>

    </form>

            </div>
        </div>
    </div>

</section>

</main>


<!-- footer -->

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
           <?php $tas->bultentasarimDuzen(); ?>
            </div>

            <div class="col-lg-4">
                <div class="copyright">
                    <?php echo $sinif->footer; ?>
                </div>
                <div class="credits">
                    <?php echo $sinif->metaown; ?>
                </div>
            </div>
        </div>
    </div>

</footer>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

</body>
</html>
<?php
$teknik->cacheolustur(md5($_SERVER["REQUEST_URI"]));
?>
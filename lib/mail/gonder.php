<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';



$baglanti=new PDO("mysql:host=localhost;dbname=kurumsal;charset=utf8","root","");

$ayarlar=$baglanti->prepare("select * from gelenmailayar");
$ayarlar->execute();
$ayarson=$ayarlar->fetch();

//----------- TERCİHİ ALIYORUM -------------------------------
$ayarlar2=$baglanti->prepare("select mesajtercih from ayarlar");
$ayarlar2->execute();
$tercihgeldi=$ayarlar2->fetch();



$mail=new PHPMailer(true);
$mail->SMTPDebug=0;
$mail->isSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host =$ayarson["host"];
$mail->SMTPAuth=true;
$mail->Username=$ayarson["mailadres"];
$mail->Password=$ayarson["sifre"];
$mail->SMTPSecure="tls";
$mail->Port =$ayarson["port"];
$mail->isHTML(true);
$mail->addAddress($ayarson["aliciadres"]);


if ($_POST) :

    $ad=htmlspecialchars(strip_tags($_POST["ad"]));
    $konu=htmlspecialchars(strip_tags($_POST["konu"]));
    $mailadres=htmlspecialchars(strip_tags($_POST["mail"]));
    $mesaj=htmlspecialchars(strip_tags($_POST["mesaj"]));
    $guvenlik=htmlspecialchars(strip_tags($_POST["guvenlik"]));
    $token=htmlspecialchars(strip_tags($_POST["token"]));

    if ($token!=$_SESSION["token"]) :
        echo '<div class="alert alert-danger text-center mx-auto">Sistemsel Hata!</div>';

    elseif ($guvenlik!=$_SESSION["kod"]) :
        echo '<div class="alert alert-danger text-center mx-auto">Güvenlik kodunu yanlış girdiniz.</div>';
    else:

switch ($tercihgeldi["mesajtercih"]) :
    case 1:
        $mail->setFrom($mailadres,$ad);
        $mail->addReplyTo($mailadres,"Yanıt");
        $mail->Subject=$konu;
        $mail->Body=$mesaj;

        if ($mail->send()) :
          echo '<div class="alert alert-success text-center mx-auto">Mesaj Başarıyla Alındı.<br>TEŞEKKÜR EDERİZ</div>';
        else :
            $zaman=date("d.m.Y")."/".date("H:i");

        $kaydet=$baglanti->prepare("insert into gelenmail (ad,mailadres,konu,mesaj,zaman) VALUES(?,?,?,?,?)");

            $kaydet->bindParam(1,$ad,PDO::PARAM_STR);
        $kaydet->bindParam(2,$mailadres,PDO::PARAM_STR);
        $kaydet->bindParam(3,$konu,PDO::PARAM_STR);
        $kaydet->bindParam(4,$mesaj,PDO::PARAM_STR);
        $kaydet->bindParam(5,$zaman,PDO::PARAM_STR);
        $kaydet->execute();

            echo '<div class="alert alert-success text-center mx-auto">Mesaj Başarıyla Alındı.<br>TEŞEKKÜR EDERİZ</div>';


        endif;

     break;

    case 2:
        $mail->setFrom($mailadres,$ad);
        $mail->addReplyTo($mailadres,"Yanıt");
        $mail->Subject=$konu;
        $mail->Body=$mesaj;
        $mail->send();

        $zaman=date("d.m.Y")."/".date("H:i");

        $kaydet=$baglanti->prepare("insert into gelenmail (ad,mailadres,konu,mesaj,zaman) VALUES(?,?,?,?,?)");

        $kaydet->bindParam(1,$ad,PDO::PARAM_STR);
        $kaydet->bindParam(2,$mailadres,PDO::PARAM_STR);
        $kaydet->bindParam(3,$konu,PDO::PARAM_STR);
        $kaydet->bindParam(4,$mesaj,PDO::PARAM_STR);
        $kaydet->bindParam(5,$zaman,PDO::PARAM_STR);
        $kaydet->execute();

        echo '<div class="alert alert-success text-center mx-auto">Mesaj Başarıyla Alındı.<br>TEŞEKKÜR EDERİZ</div>';


        break;


        case 3:

        $zaman=date("d.m.Y")."/".date("H:i");

        $kaydet=$baglanti->prepare("insert into gelenmail (ad,mailadres,konu,mesaj,zaman) VALUES(?,?,?,?,?)");

        $kaydet->bindParam(1,$ad,PDO::PARAM_STR);
        $kaydet->bindParam(2,$mailadres,PDO::PARAM_STR);
        $kaydet->bindParam(3,$konu,PDO::PARAM_STR);
        $kaydet->bindParam(4,$mesaj,PDO::PARAM_STR);
        $kaydet->bindParam(5,$zaman,PDO::PARAM_STR);
        $kaydet->execute();

            echo '<div class="alert alert-success text-center mx-auto">Mesaj Başarıyla Alındı.<br>TEŞEKKÜR EDERİZ</div>';


            break;



endswitch;

    endif;


// buraya gelindiğinde veritabanındaki tercihe bakmam lazım.



endif;












?>
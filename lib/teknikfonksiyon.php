<?php


class teknik {

    function cachekontrol ($dosyaadi,$saniye) {

        $cachedosya="cache/".$dosyaadi.".html";

        if (file_exists($cachedosya) && (time() - $saniye < filemtime($cachedosya))) : // bu sayfanın daha önce kopyası alındıysa cachelendiyse.
            include ($cachedosya);
            exit();
        endif;


    }

    function cacheolustur ($dosyaadi) {

        $cachedosya="cache/".$dosyaadi.".html";

        $dosyam=fopen($cachedosya,"w");
        fwrite($dosyam,ob_get_contents());
        fclose($dosyam);
        ob_end_flush();

    }

    function dilkontrol () {
        @$dil = $_GET["dil"];
        if ($dil == "tr" || $dil == "en") :
            @$_SESSION["dil"] = $dil;
//header("location:index.php");
        elseif (!isset($_SESSION["dil"])) :
            @$_SESSION["dil"] = "tr";
        endif;

    }
}



?>
<?php
try {
    $baglanti=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8",DB_KULAD,DB_SİFRE);
    $baglanti->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e) {
    die($e->getMessage());

}

@$hareket=$_GET["islem"];

switch ($hareket) :
    case "bultenislem";
    $gelenmail=htmlspecialchars(strip_tags($_POST["mail"]));
    if (!$_POST) :
        echo "Posttan gelmiyor";
    else:
       $sunucu=substr($gelenmail,strpos($gelenmail,'@')+1);

    $error=array();
    getmxrr($sunucu,$error);

    if (count($error)>0) :
        // gelen mailin daha önce kayıt edilip edilmediğini kontrol edebiliriz.


        $kayitet=$baglanti->prepare("insert into bulten (mail) VALUES('$gelenmail')");
        $kayitet->execute();
        echo '<div class="alert alert-success mt-2">Teşekkür ederiz<br></div>';
    else:
        echo '<div class="alert alert-danger mt-2">Girilen Adres Geçersiz</div>';
    endif;

    endif;
    break;
    
endswitch;



?>
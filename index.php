<?php
if(isset($_POST['submit'])){
    $kod = intval(htmlspecialchars($_POST['kod']));
    $bosh = intval(htmlspecialchars($_POST['bosh']));
    $son = intval(htmlspecialchars($_POST['son']));
    if(empty($kod) || empty($bosh) || empty($son)){
        echo '<link rel="stylesheet" href="css/yon.css"><div class="notify top-left do-show rounded" data-notification-status="error"><p>  ⚠️ Xatolik! Siz ma\'lumot kiritmadingiz ❌ </p></div>';
    }else{
        if(filter_var($kod, FILTER_VALIDATE_INT) === 0 || !filter_var($kod, FILTER_VALIDATE_INT) === false || filter_var($bosh, FILTER_VALIDATE_INT) === 0 || !filter_var($bosh, FILTER_VALIDATE_INT) === false || filter_var($son, FILTER_VALIDATE_INT) === 0 || !filter_var($son, FILTER_VALIDATE_INT) === false){
            if($bosh>=100 && $bosh<1000){
                if($son>0 && $son<=200){
            echo '<link rel="stylesheet" href="css/yon.css"><div class="notify top-left do-show rounded" data-notification-status="success"><p>   Yuklab oling! '.$kod."-".$bosh."-".$son.' </p></div>';

$time=time();
$d="";
for($i=0;$i<=$son;$i++){
    $ter1 = rand(1000,9999);
    $d.="
BEGIN:VCARD
VERSION:2.1
N:;{$kod}_{$bosh}_{$i};;;
FN:{$kod}_{$bosh}_{$i}
TEL;CELL:+998{$kod}{$bosh}{$ter1}
END:VCARD";
}
$myfiles = fopen("files/$time.vcf", "w");
fwrite($myfiles, $d);
fclose($myfiles);

    $pos =  '<section class="page-section">
            <div class="container">
                <!-- About Section Heading-->
                <div class="text-center">
                    <h4 class="page-section-heading d-inline-block" style="margin-bottom: 10px">Faylni yuklab oling</h4>
                </div>
                 <div class="row" style="white-space: break-spaces;
    justify-content: space-evenly;">
                            <a href="files/'.$time.'.vcf" download="'.$kod."_".$bosh."_".$son.'.vcf">
  <button class="btn btn-primary" style="width:100%"><i class="fa fa-download"></i> Yuklab olish</button>
</a>
                          </div>
                          <div class="row" style="white-space: break-spaces;
    justify-content: space-evenly;">
                            <a href="#p" class="js-scroll-trigger">
  <button class="btn btn-primary " style="width:100%">Yana raqam yasash</button>
</a>
                          </div>
            </div>
</section>';

                }else{
                    echo '<link rel="stylesheet" href="css/yon.css"><div class="notify top-left do-show rounded" data-notification-status="error"><p>  ⚠️ Xatolik! Raqamlar soni haddan ortiq. Max => 200ta❌ </p></div>';
                }

            }else{
              echo '<link rel="stylesheet" href="css/yon.css"><div class="notify top-left do-show rounded" data-notification-status="error"><p>  ⚠️ Xatolik! Siz boshlanishiga uch xonali raqam kiriting❌ </p></div>';
            }
        }else{
            echo '<link rel="stylesheet" href="css/yon.css"><div class="notify top-left do-show rounded" data-notification-status="error"><p>  ⚠️ Xatolik! Siz raqam kiritmadingiz❌ </p></div>';
        }
    }
    }
?>


<!DOCTYPE html>
<html lang="uz">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="TELEFON RAQAM GENERATORI">
        <meta name="author" content="">
        <title>TELEFON RAQAM GENERATORI</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <link href="css/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="css/heading.css">
        <link rel="stylesheet" href="css/body.css">
    </head>
    <body id="page-top">

        <nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
            <div class="container"><a class="navbar-brand js-scroll-trigger" href="#page-top">RAQAMLAR GENERATORI</a>
                <button class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menyu <i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#p">Yasab ko'rish</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Izoh</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>


<?= $pos?>



        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <img class="masthead-avatar mb-5" src="assets/img/aa.png" alt="">
                <h1 class="masthead-heading mb-0">Telefon raqamlar generatori</h1>
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fa fa-mobile"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
            </div>
        </header>
        




        <section class="page-section" id="p">
            <div class="container">
                <div class="text-center">
                    <h2 class="page-section-heading d-inline-block" style="margin-bottom: 30px">Ma'lumotlarni kiriting</h2>
                    </div>
                        <form id="contact" action="" method="POST">
                          <div class="row">
                            <div class="col-lg-3 col-md-12 col-sm-12">
                              <label for="kod">Raqam kodi </label>
                                <select class="form-control form-select" id="kod" name="kod"><option value="90">90</option><option value="91">91</option><option value="93">93</option><option value="94">94</option><option value="97">97</option><option value="98">98</option><option value="99" selected="selected">99</option></select>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12">
                                <label for="bosh">Raqam boshlanishi </label>
                                <input name="bosh" type="text" class="form-control" id="bosh" placeholder="594" required="">
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12">
                                <label for="son">Nechta raqam kerak? </label>
                                <input name="son" type="text" class="form-control" id="son" placeholder="200" required="">
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12">
                            <label for="form-submit">&nbsp</label>
                                <button type="submit" id="form-submit" name="submit" class="form-control btn-primary">Yasab ko'rish</button>
                            </div>
                        </form>
            </div>
        </section>





        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="page-section-heading d-inline-block text-white">Izoh...</h2>
                </div>
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-question-circle-o"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto">
                        <p class="pre-wrap lead"><i class="fas fa-star"></i>Generatsiya qilingan raqamlar ayni vaqtda sotuvda bo'lishi mumkin</p>
                    </div>
                    <div class="col-lg-4 ml-auto">
                        <p class="pre-wrap lead"><i class="fas fa-star"></i>Generatsiya qilingan raqamlar bo'yicha sayt hech qanday javobgarlikni o'z zimmasiga olmaydi</p>
                    </div>
                    <div class="col-lg-4 mr-auto">
                        <p class="pre-wrap lead"><i class="fas fa-star"></i>Generatsiya qilishda eng ko'pi bilan 200ta raqam yasay olasiz</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="copyright py-4 text-center text-white">
            <div class="container"><small class="pre-wrap"><a href="https://t.me/shoxaonline" target="_blank">@shoxaonline</a></small></div>
        </section>
        <div class="scroll-to-top d-lg-none position-fixed"><a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a></div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
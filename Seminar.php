<?php
    session_start();
    if( isset($_SESSION["login"]))
    {
        header("Location: Home Masuk.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="./image/logo/Logo TFU.png">
<title>There For You | Counselling and Psychotherapy | </title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="Index.css">
<link rel="stylesheet" type="text/css" href="Style.css">
<link rel="stylesheet" type="text/css" href="Media.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<style>
</style>
</head>
<body>
    <div class="topbar fixed-top animate__animated animate__fadeInDown position-sticky">
        <nav class="navbar navbar-expand-lg navbar-light sticky-top">
            <div class="container">
                <div class="navbar-brand">
                    <a title="TFU" href="./Index.php"><img src="./image/logo/TFU Logo.png" alt="there for you home page" id="tfu"></a>
                </div>
                <button class="navbar-toggler animate__animated animate__fadeInRight" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <hr class="clearfix w-100 d-md-none margin animate__animated animate__fadeIn">
                    <div class="ml-auto">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                              <a class="nav-link" id="active"  href="./Index.php"><p class="navbar-link">Beranda</p></a>
                            </li>
                            <li class="nav-item dropdown d-none d-sm-none d-md-block">
                              <a class="nav-link dropdown-toggle" href="./Berita.php">
                                    <p class="navbar-link">Berita</p>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="./Artikel.php">Artikel</a>
                                <a class="dropdown-item" href="./Seminar.php">Seminar</a>
                              </div>
                            </li>
                            <li class="nav-item d-block d-sm-block d-md-none">
                                <a class="nav-link" href="./Artikel.php"><p class="navbar-link">Artikel</p></a>
                            </li>
                            <li class="nav-item d-block d-sm-block d-md-none">
                                <a class="nav-link" href="./Seminar.php"><p class="navbar-link">Seminar</p></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="./Konseling.php"><p class="navbar-link">Konseling</p></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="./Login.php">
                                    <p class="navbar-link">Masuk/Daftar</p>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="./Login.php">Masuk</a>
                                    <a class="dropdown-item" href="./Daftar.php">Daftar</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="layout2">
        <div class="container layer">
            <h2 class="title" data-aos="fade-down" data-aos-offset="200" data-aos-duration="800" id="TentangKami">Daftar Seminar</h2>
            <div class="row">
                <div class="col-md-6 d-none d-sm-none d-md-block text-right margin" data-aos="fade-right" data-aos-duration="800">
                    <img src="./image/seminar/Seminar-01.jpg" alt="National Mental Health" class="img">
                </div>
                <div class="col-md-6 d-none d-sm-none d-md-block margin text" data-aos="fade-left" data-aos-duration="800" style="text-align: justify;">
                    <b>Webinar National Mental Health</b><br><br>
                    <p>
                        Halo Semua!!<br><br>
                        Semoga semua dalam keadaan sehat yaa, kami dari Organisasi Sosial iCare ingin mengundang teman-teman untuk ikut bergabung dalam 
                        Webinar iCare yang bertemakan Mental Health "You Are Enough : Stop Doubting Yourself" yang akan dilaksanakan pada:
                    </p><hr>
                    <div class="text-right">
                        <a href="./Seminar1.php" class="link2"><b>Baca Selengkapnya</b></a>
                    </div>
                </div>
                <div class="col-md-6 d-block d-sm-block d-md-none text-center" data-aos="fade-up" data-aos-offset="200" data-aos-duration="800">
                    <img src="./image/seminar/Seminar-01.jpg" alt="National Mental Health" class="img">
                </div>
                <div class="col-md-6 d-block d-sm-block d-md-none" style="margin:20px; text-align: justify;" data-aos="fade-up" data-aos-offset="200" data-aos-duration="800">
                    <b>Webinar National Mental Health</b><br><br>
                    <p>
                        Halo Semua!!<br><br>
                        Semoga semua dalam keadaan sehat yaa, kami dari Organisasi Sosial iCare ingin mengundang teman-teman untuk ikut bergabung dalam 
                        Webinar iCare yang bertemakan Mental Health "You Are Enough : Stop Doubting Yourself" yang akan dilaksanakan pada:
                    </p><hr>
                    <div class="text-right">
                        <a href="./Seminar1.php" class="link2"><b>Baca Selengkapnya</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="layout1">
        <div class="container layer">
            <div class="row">
                <div class="col-md-6 d-none d-sm-none d-md-block text-right margin" data-aos="fade-right" data-aos-duration="800">
                    <img src="./image/seminar/Seminar-02.png" alt="Berdamai Dengan Masa Lalu" class="img">
                </div>
                <div class="col-md-6 d-none d-sm-none d-md-block margin text" data-aos="fade-left" data-aos-duration="800" style="text-align: justify;">
                    <b>Webinar Berdamai Dengan Masa Lalu</b><br><br>
                    <p>
                        Halo!!<br><br>
                        Student Advisory Center (SAC) Universitas Bunda Mulia akan menyelenggarakan Webinar yang berjudul "BERDAMAI DENGAN MASA LALU".<br><br>
                        Banyak dari antara kita yang mengalami kesulitan saat harus berdamai dengan masa lalu karena pengalaman-pengalaman yang tidak menyenangkan. 
                        Akibatnya, pengalaman-pengalaman itu terus membayangi dan mempengaruhi pola pikir dan perilaku kita.
                    </p><br>
                    <div class="text-right">
                        <a href="./Seminar2.php" class="link1"><b>Baca Selengkapnya</b></a>
                    </div>
                </div>
                <div class="col-md-6 d-block d-sm-block d-md-none text-center" data-aos="fade-up" data-aos-offset="200" data-aos-duration="800">
                    <img src="./image/seminar/Seminar-02.png" alt="Berdamai Dengan Masa Lalu" class="img">
                </div>
                <div class="col-md-6 d-block d-sm-block d-md-none" style="margin:20px; text-align: justify;" data-aos="fade-up" data-aos-offset="200" data-aos-duration="800">
                    <b>Webinar Berdamai Dengan Masa Lalu</b><br><br>
                    <p>
                        Halo!!<br><br>
                        Student Advisory Center (SAC) Universitas Bunda Mulia akan menyelenggarakan Webinar yang berjudul "BERDAMAI DENGAN MASA LALU".<br><br>
                        Banyak dari antara kita yang mengalami kesulitan saat harus berdamai dengan masa lalu karena pengalaman-pengalaman yang tidak menyenangkan. 
                        Akibatnya, pengalaman-pengalaman itu terus membayangi dan mempengaruhi pola pikir dan perilaku kita.
                    </p><br>
                    <div class="text-right">
                        <a href="./Seminar2.php" class="link1"><b>Baca Selengkapnya</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="page-footer font-small indigo">
        <div class="container text-center text-md-left">
            <div class="row">
                <div class="col-md-2 mx-auto">
                    <a href="./Index.php"><img src="./image/logo/TFU v2.png" width="120px" style="padding-top: 20px;" class="d-none d-md-block"></a>
                </div>
                <div class="col-md-2 mx-auto margin">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4 footer-title">Peta Situs</h5> 
                    <ul class="list-unstyled">
                        <li>
                            <a href="./Index.php" class="footer-link">Beranda</a>
                        </li>
                        <li>
                            <a href="./Berita.php" class="footer-link">Berita</a>
                        </li>
                        <li>
                            <a href="./Konseling.php" class="footer-link">Konseling</a>
                        </li>
                    </ul>
                </div>
                <hr class="clearfix w-100 d-md-none">
                <div class="col-md-2 mx-auto margin">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4 footer-title">Perusahaan</h5>
                    <ul class="list-unstyled">
                        <li>
                          <a href="./Index.php#TentangKami" class="footer-link">Tentang Kami</a>
                        </li>
                        <li>
                          <a href="./Contact.php" class="footer-link">Hubungi Kami</a>
                        </li>
                        <li>
                          <a href="./FAQ.php" class="footer-link">FAQ</a>
                        </li>
                    </ul>
                </div>
                <hr class="clearfix w-100 d-md-none">
                <div class="col-md-4 mx-auto margin d-none d-md-block">
                    <ul class="list-unstyled row">
                        <li>
                            <a href="#!" class="footer-link"><img title="Facebook" src="./image/icon/facebook.png" alt="Facebook" class="footer-media"></a>
                        </li>
                        <li>
                            <a href="#!" class="footer-link"><img title="Youtube" src="./image/icon/play button.png" alt="Youtube" class="footer-media"></a>
                        </li>
                        <li>
                            <a href="#!" class="footer-link"><img title="Twitter" src="./image/icon/twitter.png" alt="Twitter" class="footer-media"></a>
                        </li>
                        <li>
                            <a href="#!" class="footer-link"><img title="Instagram" src="./image/icon/instagram.png" alt="Instagram" class="footer-media"></a>
                        </li>
                        <li>
                            <a href="#!" class="footer-link"><img title="Email" src="./image/icon/gmail.png" alt="Email" class="footer-media"></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 mx-auto margin d-md-none">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4 footer-title">Media Social</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!" class="footer-link">Facebook</a>
                        </li>
                        <li>
                            <a href="#!" class="footer-link">Youtube</a>
                        </li>
                        <li>
                            <a href="#!" class="footer-link">Twitter</a>
                        </li>
                        <li>
                            <a href="#!" class="footer-link">Instargam</a>
                        </li>
                        <li>
                            <a href="#!" class="footer-link">Email</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright text-center py-3">© 2021 Copyright :
            <a href="./Index.php" style="color: white;"> There For You. All Rights Reserved</a>
        </div>  
    </footer>

    <button class="open-button animate__animated animate__fadeIn" onclick="openForm()">
        <img title="Punya Pertanyaan?" src="./image/icon/chat.png" alt="Chat" class="img">
    </button>

    <div class="form-popup" id="myForm">
        <form class="form-container">
            <button type="button" class="open-button line animate__animated animate__fadeInUp">
                <a href="#"><img title="Line" src="./image/icon/line.png" alt="Line" class="img"></a>
            </button>
            <button type="button" class="open-button messenger animate__animated animate__fadeInUp">
                <a href="#"><img title="Messenger" src="./image/icon/facebook messenger.png" alt="Messenger" class="img"></a>
            </button>
            <button type="button" class="open-button whatsapp animate__animated animate__fadeInUp">
                <a href="#"><img title="Whatsapp" src="./image/icon/whatsapp.png" alt="Whatsapp" class="img"></a>
            </button>
            <button type="button" class="open-button animate__animated animate__fadeIn" onclick="closeForm()">
                <img title="Punya Pertanyaan?" src="./image/icon/chat.png" alt="Chat" class="img">
            </button>
        </form>
    </div>
</body>
</html>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script>
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }
    
    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
</script>
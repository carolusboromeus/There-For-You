<?php 
    session_start();
    
    if( !isset($_SESSION["login"]))
    {
        header("Location: Login.php");
        exit;
    }

    require 'Functions.php';

    if( isset($_POST["submit"]))
    {
        // cek apakah data berhasil di tambahkan atau tidak
        if(konseling($_POST) > 0)
        {
            echo "
                <script>
                    alert('Konseling berhasil dibuat!');
                </script>
            ";
        }
        else
        {
            echo "
                <script>
                    alert('Konseling gagal dibuat!');
                </script>
            ";
        }
    }

    $noTelp = $_SESSION["noTelp"];
    $query = mysqli_query($conn, "SELECT SUBSTRING_INDEX(nama,' ',1)AS nama FROM tb_user WHERE nomor_telepon ='$noTelp'");
    $row = mysqli_fetch_assoc($query);
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<style>
    .image{
        height: 150px;
    }

    .frame{
        border: 1px solid black;
        padding: 20px;
        border-radius: 10px;
        margin-top: 10px;
    }

    .img-frame{
        border: 1px solid black;
        border-radius: 10px;
        padding-top: 20px;
        padding-bottom: 20px;
        margin-left: 3px;
        margin-right: 3px;
        margin-bottom: 3px;
        background-color: #dadce9;
    }

    .btn-radio{
        display: none;
    }

    .btn-pilih{
        padding-left: 50px;
        padding-right: 50px;
    }

    .psikolog-layer{
        padding-bottom: 10px;
        padding-top: 10px;
        border-bottom: 1px solid #bfc1cc;
        border-top: 1px solid #bfc1cc;
    }
</style>
</head>
<body>
    <div class="topbar fixed-top animate__animated animate__fadeInDown position-sticky">
        <nav class="navbar navbar-expand-lg navbar-light sticky-top">
            <div class="container">
                <div class="navbar-brand">
                    <a title="TFU" href="./Home Masuk.php"><img src="./image/logo/TFU Logo.png" alt="there for you home page" id="tfu"></a>
                </div>
                <button class="navbar-toggler animate__animated animate__fadeInRight" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="row text-profile">
                        <div class="col-3">
                            <img src="./image/icon/user.png" alt="Profile" class="img-profile" style="margin-right: -19px;">
                        </div>
                        <div class="col-9 margin">
                            <b class="margin"> Halo <?php echo $row["nama"]; ?>!</b>
                        </div>
                    </div>
                    
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <hr class="clearfix w-100 d-md-none margin animate__animated animate__fadeIn">
                    <div class="ml-auto">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                              <a class="nav-link" id="active"  href="./Home Masuk.php"><p class="navbar-link">Beranda</p></a>
                            </li>
                            <li class="nav-item dropdown d-none d-sm-none d-md-block">
                              <a class="nav-link dropdown-toggle" href="./Berita Masuk.php">
                                    <p class="navbar-link">Berita</p>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="./Artikel Masuk.php">Artikel</a>
                                <a class="dropdown-item" href="./Seminar Masuk.php">Seminar</a>
                              </div>
                            </li>
                            <li class="nav-item d-block d-sm-block d-md-none">
                                <a class="nav-link" href="./Artikel Masuk.php"><p class="navbar-link">Artikel</p></a>
                            </li>
                            <li class="nav-item d-block d-sm-block d-md-none">
                                <a class="nav-link" href="./Seminar Masuk.php"><p class="navbar-link">Seminar</p></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="./Konseling Masuk.php"><p class="navbar-link">Konseling</p></a>
                            </li>
                            <li class="nav-item dropdown d-none d-sm-none d-md-block">
                                <a class="nav-link dropdown-toggle" href="./Profil.php">
                                    <p class="navbar-link img-profile"><img src="./image/icon/user.png" alt="Profile" class="img-profile"> Halo <?php echo $row["nama"]; ?>!</p>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="./Profil.php">Profil</a>
                                    <a class="dropdown-item" href="./Logout.php">Keluar</a>
                                </div>
                            </li>
                            <li class="nav-item d-block d-sm-block d-md-none">
                                <a class="nav-link" href="./Profil.php"><p class="navbar-link">Profil</p></a>
                            </li>
                            <li class="nav-item d-block d-sm-block d-md-none">
                                <a class="nav-link" href="./Logout.php"><p class="navbar-link">Keluar</p></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    
    <form class="was-validated" action="" method="post">
        <div class="layout2">
            <div class="container layer">
                <div id="myTopik">
                    <h2 class="title" data-aos="fade-down" data-aos-offset="200" data-aos-duration="800">Apa yang menjadi permasalahan Anda?</h2>
                    <div class="form-row">
                        <div class="form-group col-md-3 text-center margin" data-aos="fade-up" data-aos-duration="800">
                            <div class="frame">
                                <div class="img-frame">
                                    <img src="./image/topik/Keluarga.png" alt="Keluarga" class="img image">
                                </div>
                                <b class="text">Keluarga</b><br>
                                <div style="margin-top: 7px;">
                                    <input type="radio" class="btn-check btn-radio" name="topik" id="topik1" autocomplete="off" value="Keluarga" required>
                                    <label class="btn button btn-pilih text" for="topik1" data-toggle="collapse" data-target=".paket-page" aria-expanded="false" onclick="closeTopik()">
                                        <b>Pilih</b>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center margin" data-aos="fade-up" data-aos-duration="800">
                            <div class="frame">
                                <div class="img-frame">
                                    <img src="./image/topik/Karier.png" alt="Karier" class="img image">
                                </div>
                                <b class="text">Karier</b>
                                <div style="margin-top: 7px;">
                                    <input type="radio" class="btn-check btn-radio" name="topik" id="topik2" autocomplete="off" value="Karier" required>
                                    <label class="btn button btn-pilih text collapsed" for="topik2" data-toggle="collapse" data-target=".paket-page" aria-expanded="false" onclick="closeTopik()">
                                        <b>Pilih</b>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center margin" data-aos="fade-up" data-aos-duration="800">
                            <div class="frame">
                                <div class="img-frame">
                                    <img src="./image/topik/Percintaan.png" alt="Percintaan" class="img image">
                                </div>
                                <b class="text">Percintaan</b>
                                <div style="margin-top: 7px;">
                                    <input type="radio" class="btn-check btn-radio" name="topik" id="topik3" autocomplete="off" value="Percintaan" required>
                                    <label class="btn button btn-pilih text" for="topik3" data-toggle="collapse" data-target=".paket-page" aria-expanded="false" onclick="closeTopik()">
                                        <b>Pilih</b>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center margin" data-aos="fade-up" data-aos-duration="800">
                            <div class="frame">
                                <div class="img-frame">
                                    <img src="./image/topik/Keuangan.png" alt="Keuangan" class="img image">
                                </div>
                                <b class="text">Keuangan</b>
                                <div style="margin-top: 7px;">
                                    <input type="radio" class="btn-check btn-radio" name="topik" id="topik4" autocomplete="off" value="Keuangan" required>
                                    <label class="btn button btn-pilih text" for="topik4" data-toggle="collapse" data-target=".paket-page" aria-expanded="false" onclick="closeTopik()">
                                        <b>Pilih</b>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse paket-page" id="myPaket">
                    <h2 class="title" data-aos="fade-down" data-aos-offset="200" data-aos-duration="800">Silakan pilih paket yang tersedia!</h2>
                    <div class="form-row">
                        <div class="form-group col-md-3 text-center margin" data-aos="fade-up" data-aos-duration="800">
                            <div class="frame">
                                <h2 class="title">Paket A</h2>
                                <div class="text-left">
                                    <b class="text" style="margin-left: 25px;">Keterangan:</b>
                                    <ul>
                                        <li>Waktu konseling 75 menit</li>
                                        <li>Dapat memilih psikolog</li>
                                    </ul>
                                    <b class="text" style="margin-left: 25px;">Harga: Rp.150.000,00</b>
                                </div>
                                <div style="margin-top: 7px;">
                                    <input type="radio" class="btn-check btn-radio" name="paket" id="paket1" autocomplete="off" value="A" required>
                                    <label class="btn button btn-pilih text" for="paket1" data-toggle="collapse" data-target=".psikolog-page" aria-expanded="false" onclick="closePaket()">
                                        <b>Pilih</b>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center margin" data-aos="fade-up" data-aos-duration="800">
                            <div class="frame">
                                <h2 class="title">Paket B</h2>
                                <div class="text-left">
                                    <b class="text" style="margin-left: 25px;">Keterangan:</b>
                                    <ul>
                                        <li>Waktu konseling 60 menit</li>
                                        <li>Dapat memilih psikolog</li>
                                    </ul>
                                    <b class="text" style="margin-left: 25px;">Harga: Rp.130.000,00</b>
                                </div>
                                <div style="margin-top: 7px;">
                                    <input type="radio" class="btn-check btn-radio" name="paket" id="paket2" autocomplete="off" value="B" required>
                                    <label class="btn button btn-pilih text collapsed" for="paket2" data-toggle="collapse" data-target=".psikolog-page" aria-expanded="false" onclick="closePaket()">
                                        <b>Pilih</b>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center margin" data-aos="fade-up" data-aos-duration="800">
                            <div class="frame">
                                <h2 class="title">Paket C</h2>
                                <div class="text-left">
                                    <b class="text" style="margin-left: 25px;">Keterangan:</b>
                                    <ul>
                                        <li>Waktu konseling 45 menit</li>
                                        <li>Dapat memilih psikolog</li>
                                    </ul>
                                    <b class="text" style="margin-left: 25px;">Harga: Rp.100.000,00</b>
                                </div>
                                <div style="margin-top: 7px;">
                                    <input type="radio" class="btn-check btn-radio" name="paket" id="paket3" autocomplete="off" value="C" required>
                                    <label class="btn button btn-pilih text" for="paket3" data-toggle="collapse" data-target=".psikolog-page" aria-expanded="false" onclick="closePaket()">
                                        <b>Pilih</b>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center margin" data-aos="fade-up" data-aos-duration="800">
                            <div class="frame">
                                <h2 class="title">Paket D</h2>
                                <div class="text-left">
                                    <b class="text" style="margin-left: 25px;">Keterangan:</b>
                                    <ul>
                                        <li>Waktu konseling 20 menit</li>
                                        <li>Dapat memilih psikolog</li>
                                    </ul>
                                    <b class="text" style="margin-left: 25px;">Harga: -</b>
                                </div>
                                <div style="margin-top: 7px;">
                                    <input type="radio" class="btn-check btn-radio" name="paket" id="paket4" autocomplete="off" value="D" required>
                                    <label class="btn button btn-pilih text" for="paket4" data-toggle="collapse" data-target=".psikolog-page" aria-expanded="false" onclick="closePaket()">
                                        <b>Pilih</b>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: 20px;">
                        <button class="button-danger" onclick="openTopik()">Kembali</button>
                    </div>
                </div>
                <div class="collapse psikolog-page" id="myPsikolog">
                    <h2 class="title" data-aos="fade-down" data-aos-offset="200" data-aos-duration="800">Silakan pilih psikolog yang Anda inginkan!</h2>
                    <div class="row psikolog-layer" data-aos="fade-up" data-aos-duration="800">
                        <div class="col-7 text-left">
                            <img src="./image/icon/female user black.png" alt="Psikolog" class="img" style="width: 55px;">
                            <b class="text" style="margin-left: 10px;">Angela Veronica</b>
                        </div>
                        <div class="col-5 margin text-right">
                            <input type="radio" class="btn-check btn-radio" name="psikolog" id="psikolog1" autocomplete="off" value="Angela Veronica" required>
                            <label class="btn button btn-pilih text" for="psikolog1" data-toggle="collapse" data-target=".jadwal-page" aria-expanded="false" onclick="closePsikolog()">
                                <b>Pilih</b>
                            </label>
                        </div>
                    </div>
                    <div class="row psikolog-layer" data-aos="fade-up" data-aos-duration="800">
                        <div class="col-7 text-left">
                            <img src="./image/icon/male user black.png" alt="Psikolog" style="width: 55px;">
                            <b class="text" style="margin-left: 10px;">Budiman Santoso</b>
                        </div>
                        <div class="col-5 margin text-right">
                            <input type="radio" class="btn-check btn-radio" name="psikolog" id="psikolog2" autocomplete="off" value="Budiman Santoso" required>
                            <label class="btn button btn-pilih text" for="psikolog2" data-toggle="collapse" data-target=".jadwal-page" aria-expanded="false" onclick="closePsikolog()">
                                <b>Pilih</b>
                            </label>
                        </div>
                    </div>
                    <div class="row psikolog-layer" data-aos="fade-up" data-aos-duration="800">
                        <div class="col-7 text-left">
                            <img src="./image/icon/male user black.png" alt="Psikolog" class="img" style="width: 55px;">
                            <b class="text" style="margin-left: 10px;">Danang Saputra</b>
                        </div>
                        <div class="col-5 margin text-right">
                            <input type="radio" class="btn-check btn-radio" name="psikolog" id="psikolog3" autocomplete="off" value="Danang Saputra" required>
                            <label class="btn button btn-pilih text" for="psikolog3" data-toggle="collapse" data-target=".jadwal-page" aria-expanded="false" onclick="closePsikolog()">
                                <b>Pilih</b>
                            </label>
                        </div>
                    </div>
                    <div class="row psikolog-layer" data-aos="fade-up" data-aos-duration="800">
                        <div class="col-7 text-left">
                            <img src="./image/icon/female user black.png" alt="Psikolog" class="img" style="width: 55px;">
                            <b class="text" style="margin-left: 10px;">Jenifer Aurelia</b>
                        </div>
                        <div class="col-5 margin text-right">
                            <input type="radio" class="btn-check btn-radio" name="psikolog" id="psikolog4" autocomplete="off" value="Jenifer Aurelia" required>
                            <label class="btn button btn-pilih text" for="psikolog4" data-toggle="collapse" data-target=".jadwal-page" aria-expanded="false" onclick="closePsikolog()">
                                <b>Pilih</b>
                            </label>
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: 20px;">
                        <button class="button-danger" onclick="openPaket()">Kembali</button>
                    </div>
                </div>
                <div class="collapse jadwal-page" id="myJadwal">
                    <h2 class="title" data-aos="fade-down" data-aos-offset="200" data-aos-duration="800">Atur jadwal ketersediaan Anda!</h2>
                    <div class="form-group row">
                        <label for="jadwal" class="col-sm-1 col-form-label text" style="text-align: left;">Tanggal:</label>
                        <div class="col-sm-11">
                            <input type="date" class="form-control text" id="jadwal" name="jadwal" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jam" class="col-sm-1 col-form-label text" style="text-align: left;">Jam:</label>
                        <div class="col-sm-11">
                            <input type="time" class="form-control text" id="jam" name="jam" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="button-danger" onclick="openPsikolog()">Kembali</button>
                        <button type="submit" name="submit" class="btn button">
                            Buat Jadwal Konseling
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <footer class="page-footer font-small indigo">
        <div class="container text-center text-md-left">
            <div class="row">
                <div class="col-md-2 mx-auto">
                    <a href="./Home Masuk.php"><img src="./image/logo/TFU v2.png" width="120px" style="padding-top: 20px;" class="d-none d-md-block"></a>
                </div>
                <div class="col-md-2 mx-auto margin">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4 footer-title">Peta Situs</h5> 
                    <ul class="list-unstyled">
                        <li>
                            <a href="./Home Masuk.php" class="footer-link">Beranda</a>
                        </li>
                        <li>
                            <a href="./Berita Masuk.php" class="footer-link">Berita</a>
                        </li>
                        <li>
                            <a href="./Konseling Masuk.php" class="footer-link">Konseling</a>
                        </li>
                    </ul>
                </div>
                <hr class="clearfix w-100 d-md-none">
                <div class="col-md-2 mx-auto margin">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4 footer-title">Perusahaan</h5>
                    <ul class="list-unstyled">
                        <li>
                          <a href="./Home Masuk.php#TentangKami" class="footer-link">Tentang Kami</a>
                        </li>
                        <li>
                          <a href="./Contact Masuk.php" class="footer-link">Hubungi Kami</a>
                        </li>
                        <li>
                          <a href="./FAQ Masuk.php" class="footer-link">FAQ</a>
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
            <a href="./Home Masuk.php" style="color: white;"> There For You. All Rights Reserved</a>
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

    function openTopik() {
        document.getElementById("myTopik").style.display = "block";
        document.getElementById("myPaket").style.display = "none";
    }

    function closeTopik() {
        document.getElementById("myTopik").style.display = "none";
        document.getElementById("myPaket").style.display = "block";
    }

    function openPaket() {
        document.getElementById("myPaket").style.display = "block";
        document.getElementById("myPsikolog").style.display = "none";
    }

    function closePaket() {
        document.getElementById("myPaket").style.display = "none";
        document.getElementById("myPsikolog").style.display = "block";
    }

    function openPsikolog() {
        document.getElementById("myPsikolog").style.display = "block";
        document.getElementById("myJadwal").style.display = "none";
    }

    function closePsikolog() {
        document.getElementById("myPsikolog").style.display = "none";
        document.getElementById("myJadwal").style.display = "block";
    }
</script>
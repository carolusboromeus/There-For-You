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
        if(poin($_POST) > 0)
        {
            echo "
                <script>
                    alert('Penukaran Poin Berhasil!');
                </script>
            ";
        }
        else
        {
            echo "
                <script>
                    alert('Penukaran Poin Gagal');
                </script>
            ";
        }
    }

    $noTelp = $_SESSION["noTelp"];
    $query = mysqli_query($conn, "SELECT SUBSTRING_INDEX(nama,' ',1)AS nama FROM tb_user WHERE nomor_telepon ='$noTelp'");
    $row = mysqli_fetch_assoc($query);

    $db = mysqli_query($conn, "SELECT * FROM tb_user WHERE nomor_telepon ='$noTelp'");
    $data = mysqli_fetch_assoc($db);
    $_SESSION["poin"] = $data["poin"];
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
        background-color: #F57488;
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

    #title {
        font-weight: bold;
        font-size: medium;
        margin-top: 10px;
        margin-bottom: 10px;
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
                <div class="text-center" style="border: #999 solid 1px; border-radius: 10px; margin-bottom: 20px;" data-aos="fade-down" data-aos-offset="200" data-aos-duration="800">
                    <h2 id="title">Poin:</h2>
                    <div style="margin: 10px; border-radius: 10px;" class="margin">
                        <p class="text margin point"><?php echo $data["poin"]; ?></p>
                    </div>
                </div>
                <div id="myPoin">
                    <h2 class="title" data-aos="fade-down" data-aos-offset="200" data-aos-duration="800">Apa yang menjadi permasalahan Anda?</h2>
                    <div class="form-row">
                        <div class="form-group col-md-3 text-center margin" data-aos="fade-up" data-aos-duration="800">
                            <div class="frame">
                                <div class="img-frame">
                                    <img src="./image/merchandise/Mug.png" alt="Mug" class="img image">
                                </div>
                                <div class="text-left" style="margin: 10px;">
                                    <b class="text">Mug</b><br>
                                    <p class="text">Poin:120</p>
                                </div>
                                <div style="margin-top: 7px;">
                                    <input type="radio" class="btn-check btn-radio" name="barang" id="barang1" autocomplete="off" value="Mug" required>
                                    <label class="btn button btn-pilih text" for="barang1" data-toggle="collapse" data-target=".pengiriman-page" aria-expanded="false" onclick="closePoin()">
                                        <b>Pilih</b>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center margin" data-aos="fade-up" data-aos-duration="800">
                            <div class="frame">
                                <div class="img-frame">
                                    <img src="./image/merchandise/Notebook.png" alt="Notebook" class="img image">
                                </div>
                                <div class="text-left" style="margin: 10px;">
                                    <b class="text">Buku Catatan</b><br>
                                    <p class="text">Poin:500</p>
                                </div>
                                <div style="margin-top: 7px;">
                                    <input type="radio" class="btn-check btn-radio" name="barang" id="barang2" autocomplete="off" value="Buku Catatan" required>
                                    <label class="btn button btn-pilih text collapsed" for="barang2" data-toggle="collapse" data-target=".pengiriman-page" aria-expanded="false" onclick="closePoin()">
                                        <b>Pilih</b>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center margin" data-aos="fade-up" data-aos-duration="800">
                            <div class="frame">
                                <div class="img-frame">
                                    <img src="./image/merchandise/Kaos.png" alt="Kaos" class="img image">
                                </div>
                                <div class="text-left" style="margin: 10px;">
                                    <b class="text">Kaos</b><br>
                                    <p class="text">Poin:1000</p>
                                </div>
                                <div style="margin-top: 7px;">
                                    <input type="radio" class="btn-check btn-radio" name="barang" id="barang3" autocomplete="off" value="Kaos" required>
                                    <label class="btn button btn-pilih text" for="barang3" data-toggle="collapse" data-target=".pengiriman-page" aria-expanded="false" onclick="closePoin()">
                                        <b>Pilih</b>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 text-center margin" data-aos="fade-up" data-aos-duration="800">
                            <div class="frame">
                                <div class="img-frame">
                                    <img src="./image/merchandise/Buku.png" alt="Buku" class="img image">
                                </div>
                                <div class="text-left" style="margin: 10px;">
                                    <b class="text">Buku</b><br>
                                    <p class="text">Poin:800</p>
                                </div>
                                <div style="margin-top: 7px;">
                                    <input type="radio" class="btn-check btn-radio" name="barang" id="barang4" autocomplete="off" value="Buku" required>
                                    <label class="btn button btn-pilih text" for="barang4" data-toggle="collapse" data-target=".pengiriman-page" aria-expanded="false" onclick="closePoin()">
                                        <b>Pilih</b>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse pengiriman-page" id="myPengiriman">
                    <h2 class="title" data-aos="fade-down" data-aos-offset="200" data-aos-duration="800">Formulir Pengiriman</h2>
                    <div class="form" data-aos="fade-up" data-aos-duration="800">
                        <div class="form-group">
                            <input type="text" class="form-control text" name="nama" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control text" name="nomorTelp" placeholder="Nomor Telepon" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control text" name="alamat" placeholder="Alamat Pengiriman" required>
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control text" name="keterangan" placeholder="Keterangan"></textarea>
                        </div>
                        <div class="text-right">
                            <button class="button-danger" onclick="openPoin()">Kembali</button>
                            <button type="submit" name="submit" class="button">Kirim</button>
                        </div>
                        
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

    function openPoin() {
        document.getElementById("myPoin").style.display = "block";
        document.getElementById("myPengiriman").style.display = "none";
    }

    function closePoin() {
        document.getElementById("myPoin").style.display = "none";
        document.getElementById("myPengiriman").style.display = "block";
    }

    function closePengiriman() {
        document.getElementById("myPengiriman").style.display = "none";
    }
</script>
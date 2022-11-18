<?php
    //Koneksi ke Database
    $conn = mysqli_connect("localhost", "root", "", "tfudb");

    function daftar($data)
    {
        global $conn; 

        // ambil data dari tial elemen dalam form
        $nama = htmlspecialchars($data["nama"]);
        $ttgLahir = htmlspecialchars($data["tggLahir"]);
        $jnsKelamin = htmlspecialchars($data["jnsKelamin"]);
        $noTelp = htmlspecialchars($data["noTelp"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $password = mysqli_real_escape_string($conn, $data["password"]);
        
        //cek nomor telepon sudah ada atau belum
        $result = mysqli_query($conn, "SELECT nomor_telepon FROM tb_user WHERE nomor_telepon = '$noTelp'");

        if(mysqli_fetch_assoc($result))
        {
            echo "<script> alert('Nomor Telepon Sudah Terdaftar!')</script>";
            return false;
        }
        else
        {
            // enkripsi password
            $password = password_hash($password, PASSWORD_DEFAULT);

            //$query insert data
            $query = "INSERT INTO tb_user 
                        VALUES 
                        ('', '$nama', '$ttgLahir', '$jnsKelamin', '$noTelp', '$alamat', '$password', 0)
                    ";
            mysqli_query($conn, $query);

            return mysqli_affected_rows($conn);
        }
    }

    function update($data)
    {
        global $conn; 

        // ambil data dari tiap elemen dalam form
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $ttgLahir = htmlspecialchars($data["tggLahir"]);
        $jnsKelamin = htmlspecialchars($data["jnsKelamin"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $noTelp = htmlspecialchars($data["noTelp"]);
        $password1 = mysqli_real_escape_string($conn, $data["password1"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        $noTelp = $_SESSION["noTelp"];
        $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE nomor_telepon ='$noTelp'");
        $row = mysqli_fetch_assoc($query);

        if(password_verify($password1, $row["password"]))
        {
            // enkripsi password
            $password2 = password_hash($password2, PASSWORD_DEFAULT);

            //query update data
            mysqli_query($conn, "UPDATE tb_user SET password = '$password2' WHERE id = $id");

            return mysqli_affected_rows($conn);
        }

        //$query update data
        $query = "UPDATE tb_user SET
                    nama = '$nama', 
                    tanggal_lahir = '$ttgLahir', 
                    jenis_kelamin = '$jnsKelamin', 
                    nomor_telepon = '$noTelp', 
                    alamat = '$alamat'
                    WHERE id = $id
                ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);  
    }

    function contact($data)
    {
        global $conn;

        // ambil data dari tial elemen dalam form
        $nama = htmlspecialchars($data["nama"]);
        $noTelp = htmlspecialchars($data["noTelp"]);
        $pesan = htmlspecialchars($data["pesan"]);

        //$query insert data
        $query = "INSERT INTO tb_contact 
                    VALUES 
                    ('', '$nama', '$noTelp', '$pesan')
                ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function konseling($data)
    {
        global $conn;

        // ambil data dari tial elemen dalam form
        $topik = htmlspecialchars($data["topik"]);
        $paket = htmlspecialchars($data["paket"]);
        $psikolog = htmlspecialchars($data["psikolog"]);
        $jadwal = htmlspecialchars($data["jadwal"]);
        $jam = htmlspecialchars($data["jam"]);
        
        $noTelp = $_SESSION["noTelp"];
        $query = mysqli_query($conn, "SELECT id FROM tb_user WHERE nomor_telepon ='$noTelp'");
        $row = mysqli_fetch_assoc($query);
        $id_user = $row["id"];

        //$query insert data
        $query = "INSERT INTO tb_konseling 
                    VALUES 
                    ('', '$topik', '$paket', '$psikolog', '$jadwal', '$jam', $id_user)
                ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function poin($data)
    {
        global $conn;

        // ambil data dari tiap elemen dalam form
        $barang = htmlspecialchars($data["barang"]);
        $nama = htmlspecialchars($data["nama"]);
        $nomorTelp = htmlspecialchars($data["nomorTelp"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $keterangan = htmlspecialchars($data["keterangan"]);
        $poin = $_SESSION["poin"];

        $result = mysqli_query($conn, "SELECT * FROM tb_barang WHERE nama = '$barang'");

        // cek barang
        if(mysqli_num_rows($result) === 1 )
        {
            $db_barang= mysqli_fetch_assoc($result);
            $id_barang= $db_barang["id"];
            
            //cek poin
            $poin_barang= (int)$db_barang["poin"];
            if($poin >= $poin_barang)
            {
                $user_poin = $poin - $poin_barang;

                $noTelp = $_SESSION["noTelp"];
                mysqli_query($conn, "UPDATE tb_user SET poin = '$user_poin' WHERE nomor_telepon ='$noTelp'");

                $query = mysqli_query($conn, "SELECT id FROM tb_user WHERE nomor_telepon ='$noTelp'");
                $db_user= mysqli_fetch_assoc($query);
                $id_user = $db_user["id"];
                
                //$query insert data
                $query = "INSERT INTO tb_pengiriman 
                            VALUES 
                            ('', '$nama', '$nomorTelp', '$alamat', '$keterangan', '$id_user', '$id_barang')
                        ";
                mysqli_query($conn, $query);

                return mysqli_affected_rows($conn);
            }
            else
            {
                echo "<script> alert('Poin tidak mencukupi!')</script>";
                return false;
            }
        }
        else
        {
            echo "<script> alert('Barang sudah tidak ada!')</script>";
            return false;
        }
    }
?>
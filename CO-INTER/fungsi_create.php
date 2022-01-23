<?php 
include("koneksi.php");

if(isset($_POST['submit'])){
    $nama  = stripslashes($_POST['nama']);
    //cara sederhana mengamankan dari sql injection
    $nama  = mysqli_real_escape_string($conn, $nama);
    $role = 0;
    $nik  = stripslashes($_POST['nik']);
    //cara sederhana mengamankan dari sql injection
    $nik  = mysqli_real_escape_string($conn, $nik);

    $email  = stripslashes($_POST['email']);

    //cara sederhana mengamankan dari sql injection
    $email  = mysqli_real_escape_string($conn, $email);

    $image = ".";

    $password  = stripslashes($_POST['password']);
    //cara sederhana mengamankan dari sql injection
    $password  = mysqli_real_escape_string($conn, $password);

    $query = "INSERT INTO tb_user (id,role,nik,nama,email,image,password) VALUES (NULL,'$role','$nik','$nama','$email','$image','$password')";
    $result   = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['nik'] = $nik;
        $_SESSION['password'] = $pass;

        echo '
            <script language="javascript">
                alert("Registrasi Berhasil");
                window.location="login2.php";
            </script>';
    } else {
        echo '
            <script language="javascript">
                alert("Registrasi Gagal");
                window.location="register.php";
            </script>';
    }
}

?>
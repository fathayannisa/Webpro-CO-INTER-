<?php 
include("koneksi.php");
if(isset($_POST['submit'])){
    $nik = stripslashes($_POST['nik']);
    $nik = mysqli_real_escape_string($conn, $nik);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE nik = '$nik'");
    // jika user terdaftar
    if( mysqli_num_rows($result) === 1){
        // verifikasi password
        $row = mysqli_fetch_assoc($result);
        if($password == $row["password"]){
            // buat Session
            if ($row["role"] == 0) {
                session_start();
                $_SESSION["users"] = $row;
                $_SESSION["id"] = $row["id"]; 
                $_SESSION["nik"] = $row["nik"];
                
                // login sukses, alihkan ke halaman index.php
                setcookie('nik', $_POST['nik'], time()+60);
                setcookie('password', $_POST['password'], time()+60);
                
                echo '
                <script language="javascript">
                    alert("Login Berhasil");
                    window.location="index.php";
                </script>';
            } else if ($row["role"] == 1) {
                session_start();
                $_SESSION["admin"] = $row;
                $_SESSION["id"] = $row["id"]; 
                $_SESSION["nik"] = $row["nik"];
                
                // login sukses, alihkan ke halaman index.php
                setcookie('nik', $_POST['nik'], time()+60);
                setcookie('password', $_POST['password'], time()+60);
                
                echo '
                <script language="javascript">
                    alert("Login Berhasil");
                    window.location="adminScreen.php";
                </script>';
            }   
            
        } else {
            echo 
            '<script language="javascript">
                alert("Login Gagal");
                window.location="login2.php";
            </script>';
        }
    } else {
        echo 
            '<script language="javascript">
                alert("Kegagalan pembca");
                window.location="login2.php";
            </script>';
    }
}

?>
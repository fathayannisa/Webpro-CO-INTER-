<?php 
include("koneksi.php");

if(isset($_POST['submit'])){
    $id_user = $_POST['id'];
    $nama  = stripslashes($_POST['nama']);
    //cara sederhana mengamankan dari sql injection
    $nama  = mysqli_real_escape_string($conn, $nama);

    $email  = stripslashes($_POST['email']);
    //cara sederhana mengamankan dari sql injection
    $email  = mysqli_real_escape_string($conn, $email);

    $password  = stripslashes($_POST['password']);
    //cara sederhana mengamankan dari sql injection
    $password  = mysqli_real_escape_string($conn, $password);

    $ekstensi =  array('png','jpg','jpeg','gif');
    $filename= $_FILES['gambar']['name'];
    echo $filename;
    $ukuran = $_FILES['gambar']['size'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array($ext,$ekstensi) ) {
        echo '
            <script language="javascript">
                alert("gagal upload");
                window.location="adminScreen.php";
            </script>';
    }else{
        if($ukuran < 1044070){		
            $baru = $filename;
            move_uploaded_file($tmp_file, 'foto/'.$filename);
            $sql = "UPDATE tb_user SET nama ='$nama', email ='$email', image='$baru', password='$password' WHERE id = '$id_user'";
            $result   = mysqli_query($conn, $sql);
            $_SESSION["users"] = $result;
            if ($result) {
                
                echo '
                    <script language="javascript">
                        alert("Update Data User Berhasil");
                        window.location="index.php";
                    </script>';
            } else {
                echo '
                    <script language="javascript">
                        alert("Update Data Gagal");
                        window.location="index.php";
                    </script>';
            }
        }
    }
    
}

?>
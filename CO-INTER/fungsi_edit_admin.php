<?php 
include("koneksi.php");

if(isset($_POST['submit'])){
    $id  = $_POST['id'];
    $nama  = stripslashes($_POST['nama']);
    //cara sederhana mengamankan dari sql injection
    $nama  = mysqli_real_escape_string($conn, $nama);
    $role  = stripslashes($_POST['role']);
    //cara sederhana mengamankan dari sql injection
    $role  = mysqli_real_escape_string($conn, $role);
    $nik  = stripslashes($_POST['nik']);
    //cara sederhana mengamankan dari sql injection
    $nik  = mysqli_real_escape_string($conn, $nik);

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
                alert("gagal");
                window.location="adminScreen.php";
            </script>';
    }else{
        if($ukuran < 1044070){		
            $baru = $filename;
            move_uploaded_file($tmp_file, 'foto/'.$filename);
            $sql = "UPDATE tb_user SET email ='$email', nama ='$nama', password ='$password', role ='$role', nik ='$nik', image ='$baru' WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '
                    <script language="javascript">
                        alert("Edit Data User Berhasil");
                        window.location="adminScreen.php";
                    </script>';
            } else {
                echo '
                    <script language="javascript">
                        alert("Edit Data Gagal");
                        window.location="adminScreen.php";
                    </script>';
            }
        }
    }
    
}

?>
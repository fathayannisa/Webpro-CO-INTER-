<?php
include 'koneksi.php';
session_start();


if(isset($_POST['hapus'])){
    $id = $_GET['id'];
    $user_id = $_SESSION['id'];
    
   
    $delete = "DELETE FROM tb_user WHERE id = '$id'";
    $tampil = mysqli_query($conn , $delete);
    if ($tampil) {
        echo '<script language="javascript">
                alert("Berhasil Menghapus Data User");
                window.location="adminScreen.php";
                </script>';
    //jika gagal maka akan menampilkan pesan error
    } else {
        echo '<script language="javascript">
        alert("Gagal Hapus");
        window.location="adminScreen.php";
        </script>';
    }

}
?>


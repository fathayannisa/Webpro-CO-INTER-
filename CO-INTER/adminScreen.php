<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="css/adminScreen.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php 
    require_once("authadmin.php"); 
    include 'koneksi.php';
    $select = mysqli_query($conn, "SELECT * FROM tb_user");
    $query = mysqli_num_rows($select);
    $no = 0;
    ?>
    <div id="side-nav">

        <div class= "judul">
            <h1 style="font-size:30px;font-weight:700;">CO-INTER</h1>
        </div>

        <div class="informasi text-center">
        	<img width="100" src="img/<?php echo  $_SESSION["admin"]["image"] ?>">
        	<h4><?php echo  $_SESSION["admin"]["nama"] ?></h4>
        	<h5><?php echo  $_SESSION["admin"]["nik"] ?></h5>
        	
        </div>

        <div class="content text-center">
            <ul>
                <li><h5>Tampil Data User</h5></li>
                <li><h5>Tampil Data Berita</h5></li>
                <li><a href="fungsi_logout.php"><h5>Logout</h5></a></li>
            </ul>
        </div>

        

    </div>

    <div id="content">
        <div style="padding-left:2em;padding-right:2em;" class="row">
            <h1 class="text-center" style="padding-top:1em;padding-bottom:0.5em;">Tampil Data User</h1>
            <div class="col-sm-6 inputData">
                <a href="admin_input.php"><button class="btn btn-primary">Input User</button></a>
            </div>
            <div class="col-sm-6 cariData">
                <form action="adminScreen_cari.php" method="get">
                    <ul style="display:flex;list-style:none;justify-content:flex-end;">
                        <li style="margin-right:20px;"><input type="text" class="form-control" name="cari" id="cari" placeholder="Masukan Nik User"/></li>
                        <li><input style="width:100px;" type="cari" name="cari" value="cari" class="btn btn-primary"></input></li>
                    </ul>
                </form> 
            </div>
            <div class="col-sm-12 text-center">
                
                <table class="table">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">No</th>
                            <th scope="col">Role</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nik</th>
                            <th scope="col">Email</th>
                            <th scope="col">Image</th>
                            <th colspan="2" scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($select as $isi) :?>
                        <?php $no = $no + 1; ?>    
                        <tr>
                            <th scope="row"><?php echo $no?></th>
                            <th>
                                <?php
                                    if ($isi["role"] == 0) {
                                        echo "User";
                                    } else {
                                        echo "Admin";
                                    }
                                ?>
                            </th>
                            <td><?php echo $isi["nama"]?></td>
                            <td><?php echo $isi["nik"]?></td>
                            <td><?php echo $isi["email"]?></td>
                            <td><?php echo $isi["image"]?></td>
                            <td>
                                <form action="admin_edit.php?id=<?= $isi['id']; ?>" method='post'>
                                    <input type='submit' name='edit' class='btn btn-warning' value='edit'>
                                </form>
                            </td>
                            <td>
                                <form action="fungsi_hapus_user.php?id=<?= $isi['id']; ?>" method='post'>
                                    <input type='submit' name='hapus' class='btn btn-danger' value='hapus'>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>
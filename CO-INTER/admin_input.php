<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="css/adminScreen.css">
    <link rel = "stylesheet" href="css/inputAdmin.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php 
    require_once("authadmin.php"); 
    include 'koneksi.php';
    ?>
    <div id="side-nav">

        <div class= "judul">
            <h1 style="font-size:30px;font-weight:700;">CO-INTER</h1>
        </div>

        <div class="informasi text-center">
        	<img width="100" src="img/<?php echo $_SESSION["admin"]["image"] ?>">
        	<h4><?php echo  $_SESSION["admin"]["nama"] ?></h4>
        	<h5><?php echo  $_SESSION["admin"]["nik"] ?></h5>
        	
        </div>

        <div class="content text-center">
            <ul>
                <a href="adminScreen.php"><li><h5>Tampil Data User</h5></li></a>
                <li><h5>Tampil Data Berita</h5></li>
                <li><a href="fungsi_logout.php"><h5>Logout</h5></a></li>
            </ul>
        </div>

        

    </div>

    <div id="content">
        <div style="padding-left:2em;padding-right:2em;" class="row">
            <h1 class="text-center" style="padding-top:1em;padding-bottom:0.5em;">Input Data User</h1>
            
            <form action="fungsi_input_admin.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Nama</label>
                        <input class="form-control" type="text" name="nama" placeholder="masukan nama"/>
                    </div>
                    <div class="col-sm-6">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" placeholder="masukan email"/>
                    </div>
                    <div class="col-sm-6">
                        <label>Nik</label>
                        <input class="form-control" type="nik" name="nik" placeholder="masukan nik"/>
                    </div>
                    <div class="col-sm-6">
                        <label>Role</label>
                        <select class="form-select" name="role" id="role" onchange="document.getElementById('text_content').value=this.options[this.selectedIndex].text">
                            <option selected value="1">admin</option>
                            <option value="0">user</option>
                        </select>
                    </div>
                    
                    <div class="col-sm-12 custom-file">
                        <input class="custom-file-input form-control" type="file" id="gambar" name="gambar">
                    </div>

                    <div class="col-sm-12">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" placeholder="masukan password"/>
                    </div>
                    <div class="col-sm-12">
                        <input id="text_content" type="submit" name="submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
        
        </div>
    </div>
    
</body>
</html>
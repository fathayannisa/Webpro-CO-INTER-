<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="css/userScreen.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php require_once("auth.php"); 
    include 'koneksi.php';
    // buat ambil idforum untuk nampilin detail forum
    $id_forum = $_GET['id_forum'];
    $select = mysqli_query($conn, "SELECT * from tb_forum where id_forum = $id_forum");
    $query = mysqli_num_rows($select);
    $list = mysqli_fetch_array($select);
    $mydate = strtotime($list["tanggal"]);
    
     
    // buat nampilin komentar
    $komentar = mysqli_query($conn, "SELECT * from tb_komentar where id_forum = 3");
    $isikomentar = mysqli_fetch_array($komentar);
    // buat nampilin foto
    $id_user=$isikomentar['id_user'];
    $user = mysqli_query($conn, "SELECT * from tb_user where id = 15");
    $isiuser=mysqli_fetch_array($komentar);


    ?>
    
    <div id="side-nav">

        <div class= "judul">
            <h1>CO-INTER</h1>
        </div>

        <div class="informasi text-center">
        	<img src="img/profile.png">
        	<h4><?php echo  $_SESSION["users"]["nama"] ?></h4>
        	<h5><?php echo  $_SESSION["users"]["nik"] ?></h5>
        	
        </div>

        <div class="content text-center">
            <ul>
            	<li>
            		<span><img src="img/home.png" width="20"></span>
            		<a href="index.php" style="text-decoration:none;color:black;">
                        <span style="font-size: 20px;">Home</span>
                    </a>
            	</li>
                <li>
            		<span><img src="img/home.png" width="20"></span>
                    <a href="editProfile.php" style="text-decoration:none;color:black;">
                        <span style="font-size: 20px;">Edit Profile</span>
                    </a>
            	</li>
            	<li>
                	<span><img src="img/profile2.png" width="20"></span>
            		<a href="fungsi_logout.php" style="text-decoration:none;color:black;">
                        <span style="font-size: 20px;">Logout
                        </span>
                    </a>
            	</li>
                
            </ul>
        </div>
        <div class="contact text-center">
        	<h4>Contact</h4>
        	<h5>+62099069009</h5>
        	<h5>Connect With Us</h5>

        	<ul>
        		<li><img src="img/Fb Black 1.png" width="35"></li>
        		<li><img src="img/IG Black 1.png" width="35"></li>
        		<li><img src="img/Twitter Black 1.png" width="35"></li>
            </ul>
        </div>
    </div>

    <div id="content">
        <div class="row">
            <div class="col-sm-12 text-left">
                <div style="padding:1.5em;width:100%;height: 100px;padding-right:2.5em; border-radius:10px; background-color:#B6E4F3" class="box">
                    <h1><?php echo $list["topik"] ?></h1>
                </div>
                <p style="padding-left:1em;padding-top:1em;">
                    <?php echo $list["deksripi"] ?>
                </p>
                <h5 style="padding-left:1em;font-size:13px;font-weight:300;font-style:italic;"><?php echo date('F jS Y', $mydate) ?></h5>
                <hr>
                <ul style="list-style:none;padding:0;">
                    
                    <?php foreach($komentar as $komentarisi) :?>
                    <li>
                        <span>
                            <img src="img/<?php echo $isiuser['image']?>"></img>
                            <h5><?php echo $isikomentar['nama']?></h5>
                        </span>
                        <h6 style="font-size:14px;font-weight:300;font-style:italic;"><?php echo $isikomentar['tanggal']?></h6>
                        <p><?php echo $isikomentar['komentar']?></p>
                        <hr>
                    </li>
                    <?php endforeach;?>
                </ul>
                
            </div>
        </div>
        
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
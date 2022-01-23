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
    $id_berita = $_GET['id_berita'];
    $select = mysqli_query($conn, "SELECT * from berita where id_berita = $id_berita");
    $query = mysqli_num_rows($select);
    $list = mysqli_fetch_array($select);
    $mydate = strtotime($list["tanggal"]);
    
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
            <div class="col-sm-12 text-center">
                <h1><?php echo $list["judul"] ?></h1>
                <img style ="padding-top:1em" src="<?php echo $list["gambar"] ?>" width="500">
                <h6 style="padding-top:1em;font-style:italic;font-weight:300;"><?php echo $list["nama_pemosting"].", ". date('F jS Y', $mydate); ?></h6>
                <p style="padding-right:10em;padding-left:10em;padding-top:1em;">
                    <?php echo $list["deskripsi"] ?>
                </p>
            </div>
        </div>
        
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
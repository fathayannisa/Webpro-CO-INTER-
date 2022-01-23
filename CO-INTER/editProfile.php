<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="css/userScreen.css">
    <link rel = "stylesheet" href="css/editProfile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php require_once("auth.php"); 
    include 'koneksi.php';
    
    $id_user = $_SESSION["users"]["id"];
    $select = mysqli_query($conn, "SELECT * from tb_user where id = $id_user");
    $list = mysqli_fetch_array($select);
    
    ?>
    <div id="side-nav">

        <div class= "judul">
            <h1>CO-INTER</h1>
        </div>

        <div class="informasi text-center">
        	<img width="100" src="img/<?php echo $list['image'];?>">
        	<h4><?php echo $list['nama']; ?></h4>
        	<h5><?php echo $list['nik']; ?></h5>
        	
        </div>

        <div class="content text-center">
            <ul>
            	<li>
            		<span><img src="img/home.png" width="20"></span>
            		<span style="font-size: 20px;">Home</span>
            	</li>
                <li>
            		<span><img src="img/home.png" width="20"></span>
            		<span style="font-size: 20px;">Edit Profile</span>
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
        <div class ="editProfile">
            <div class="row">
                <div class="col-sm-12">
                    <h2> Edit Profile</h2>
                    <form action="fungsi_editProfile.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>NIK</label>
                                <input hidden class="form-control" type="text" value="<?php echo $_SESSION["users"]["id"] ?>" name="id"/>
                                <input class="form-control" type="text" value="<?php echo $list['nik']; ?>" name="NIK" placeholder="masukan nama" disabled/>
                            </div> 
                            <div class="col-sm-12">
                                <label>Nama</label>
                                <input class="form-control" type="text" value="<?php echo $list['nama']; ?>" name="nama" placeholder="masukan nama"/>
                            </div> 
                            <div class="col-sm-12">
                                <label>Email</label>
                                <input class="form-control" type="text" value="<?php echo $list['email']; ?>" name="email" placeholder="masukan nama"/>
                            </div>
                            <div class="col-sm-12 custom-file">
                                <label>Gambar</label>
                                <input class="custom-file-input form-control" type="file" id="gambar" name="gambar">
                            </div>
                            <div class="col-sm-12">
                                <label>Password</label>
                                <input class="form-control" value="<?php echo $list['password']; ?>" type="password" name="password" placeholder="masukan password"/>
                            </div>
                            <div style="padding-top:1em;" class="col-sm-12">
                                <input id="text_content" type="submit" name="submit" class="btn btn-primary">
                            </div>    
                        </div>                
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="coba">
        <button style="margin-left:10em">Submit</button>;
    </div>

</body>
</html>
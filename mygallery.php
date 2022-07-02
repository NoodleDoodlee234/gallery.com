<?php
session_start();
if(isset($_FILES["imgupload"]["name"])){
$kapcsolat=new mysqli("localhost","root","","felhasznalok");
if(!$kapcsolat->errno){
    $target_dir = "kepek/";
    $target_file = $target_dir . basename($_FILES["imgupload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $ID=$_SESSION["ID"];
    $imgnev=$_FILES["imgupload"]["name"];
    
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imgupload"]["tmp_name"]);
    if($check !== false) {
        //echo "fájl egy kép";
        $uploadOk = 1;
    } else {
        //echo "Nem kép";
        $uploadOk = 0;
    }
    }

    
    if (file_exists($target_file)) {
    //echo "A jájl már létezik";
    $uploadOk = 0;
    }

    
    if ($_FILES["imgupload"]["size"] > 5000000) {
    echo "<script>alert('Túl nagy kép');</script>";
    $uploadOk = 0;
    }

    
    if($imageFileType != "jpg" && $imageFileType != "png") {
    echo "<script>alert('Csak jpg és png');</script>";
    $uploadOk = 0;
    }

    
    if ($uploadOk == 0) {
    echo "<script>alert('Nem sikerült');</script>";
    
    } else {
    if (move_uploaded_file($_FILES["imgupload"]["tmp_name"], $target_file)) {
        echo "<script>alert('Sikeres feltöltés');</script>";
        $sql="Insert into kepek(ImageNev,felhID) values('$imgnev','$ID')";
        
        $sqlquery=$kapcsolat->query($sql);
    } else {
        echo "<script>alert('Nem sikerült');</script>";
    }

    
}
}
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="gallery.css" rel="stylesheet">
    <script src="jquery-3.5.1.js"></script>
    <title>Document</title>
</head>
<body onload="mykepek()">
<div id="letakar2" onclick="megjelenitclose()"></div>
    <div class="keret">
        
            <div class="header">
                <div class="cim">
                    <h1 onclick="backToLogin()" class="myGallery">Gallery</h1>
                    <h3 onclick="toPrivate()" class="myGallery">Private</h3>
                </div>
                <div class="mygallery">
                    <h1>My Gallery</h1>                    
                    <form action="mygallery.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="imgupload" id="imgupload" accept="image/jpg, image/png">
                    <input type="submit" value="Feltöltés" name="submit">
                    
                    </form>
                    
                </div>
                <div class="bejelentkezes">
                    <div class="felhnevv">Üdv, 
                    <?php
                    echo($_SESSION["felhasznalonev"]);
                    
                    ?>
                    
                    </div>
                    <br>
                    <div class="buttons">
                        <button onclick="kijelentkezes()">Kijelentkezés</button>
                    </div>
                </div>
            </div>
            <div class="contentss" id="contents">

            </div>
            <div class="footer">

            </div>
        
    



    <script>
        function toPrivate(){
            window.location.href="private.php";
        }
        function backToLogin(){
            window.location.href="login.php";
        }
        function megjelenit(){
            document.getElementById("letakar2").style.setProperty("display","flex");
            

            let div = document.createElement('div');
            div.id = "kepablak";
            let nev=document.getElementById(event.target.id).getAttribute('src');
            div.innerHTML="<img class='nagykep' src="+nev+">";
            document.getElementById("letakar2").appendChild(div);
            document.getElementById("keret").style.setProperty("overflow-y","hidden");
            
            
        }

        function megjelenitclose(){
            document.getElementById("letakar2").style.setProperty("display","none");
            
            document.getElementById("letakar2").removeChild(document.getElementById("kepablak"));
            document.getElementById("keret").style.setProperty("overflow-y","auto");
        }

        function letakarbe(){
            document.getElementById("letakar").style.setProperty("display","flex");
        }
        function letakarki(){
            document.getElementById("letakar").style.setProperty("display","none");
        }
        function kijelentkezes(){
            $.ajax({
                url:"logout.php",
                method:"POST",
                type:"json",
                success: function(){
                    window.location.href='gallery.php';
                }
                
            })

           
        }
        
        
        function mykepek(){
        
    
        $.ajax({
            url:"mykepek.php",
            method:"POST",
            dataType:"json",
            data:{},
            success: function(vissza){
                console.log(vissza);
                for(let i=0;i<vissza.kep.length;i++){
                    if(vissza.kep[i].ImageNev!=null){
                        let div=document.createElement('div');
                        div.className="kartyaa";
                        let nev = vissza.kep[i].ImageNev;
                        div.id="kartyaa"+i;
                        div.onclick=function(){
                            megjelenit();
                        }
                        div.innerHTML="<img class='img1' id="+i+" src="+"kepek/"+nev+">"
                    
                        document.getElementById("contents").appendChild(div);
                        
                        
                    }
                }
                
                
            },
            error: function(a,b){
                console.log(a.responseText);
            }
        })
}
    </script>
    
</body>
</html>
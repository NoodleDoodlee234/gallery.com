<?php

if(isset($_POST["felhnev"]) && isset($_POST["jelszo"]) && isset($_POST["email"])){

    $felhnev=$_POST["felhnev"];
    $jelszo=$_POST["jelszo"];
    $email=$_POST["email"];


    $kapcsolat=new mysqli("localhost","root","","felhasznalok");
    if(!$kapcsolat->errno){

        $sql="select * from felhasznalok where felhasznalonev='$felhnev' or  email='$email'";
        $sqlquery=$kapcsolat->query($sql);
        $adat = $sqlquery->fetch_all(MYSQLI_ASSOC);
        if(count($adat)==0){
            $sql="Insert into felhasznalok(felhasznalonev,jelszo,email) values('$felhnev','$jelszo','$email')";
            $sqlquery=$kapcsolat->query($sql);
           
            
            
            $vissza=['Hibakod'=>0,"hibaszöveg"=>"Sikeres regisztráció"];
            
        }
        else{
            $vissza=["hibakod"=>1,"hibaszöveg"=>"Felhasználónév vagy email már foglalt"];
        }



        
    }
    $kapcsolat->close();
}
else{
    $vissza=["hibakod"=>2,"hibaszöveg"=>"Hibás adat"];
}
print (json_encode($vissza));
?>
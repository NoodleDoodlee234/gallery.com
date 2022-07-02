<?php
session_start();
if(isset($_SESSION["belepett"])&&$_SESSION["belepett"]==true){
    $sikeres = ["hibakód"=>3,"hibaszoveg"=> "bejelentkezve"];
}
else{
    $sikeres = ["hibakód"=>1,"hibaszoveg"=> "sikertelen bejelentkezés"];
    if(isset($_POST["felhnev"]) && isset($_POST["jelszo"])){

        $felhnev=$_POST["felhnev"];
        $jelszo=$_POST["jelszo"];
        $kapcsolat=new mysqli("localhost","root","","felhasznalok");
        if(!$kapcsolat->errno){
            $sql="select felhasznalonev,ID from felhasznalok where felhasznalonev='$felhnev' and jelszo='$jelszo'";
            $sqlquery=$kapcsolat->query($sql);
            $adat = $sqlquery->fetch_all(MYSQLI_ASSOC);
            if(count($adat)==1){
                $sikeres=["hibakód"=>0,"nev"=>$adat[0]["felhasznalonev"]];
                $_SESSION["belepett"]=true;
                $_SESSION["ID"]=$adat[0]["ID"];
                $_SESSION["felhasznalonev"]=$adat[0]["felhasznalonev"];
            }
            else{
                $sikeres=["hibakód"=>2,"hibaszoveg"=>"Hibás felhasználónév vagy jelszó"];
            }
        }
        $kapcsolat->close();
            
    }
    print json_encode($sikeres);
    
}

?>
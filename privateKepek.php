<?php
session_start();
$kapcsolat=new mysqli("localhost","root","","felhasznalok");
$id=$_SESSION['ID'];
$vissza=[];
    if(!$kapcsolat->errno){
        $sql="select private.ImageNev from private,felhasznalok where private.felhID=felhasznalok.ID AND private.felhID='$id'";
        $sqlquery=$kapcsolat->query($sql);
        $adatkep=$sqlquery->fetch_all(MYSQLI_ASSOC);
        if(count($adatkep)>0){
            $vissza=["kep"=>$adatkep];
        }
        
        
    }

print(json_encode($vissza));
?>
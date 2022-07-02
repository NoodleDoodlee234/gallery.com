<?php
session_start();
$kapcsolat=new mysqli("localhost","root","","felhasznalok");
$id=$_SESSION['ID'];
$vissza=[];
    if(!$kapcsolat->errno){
        $sql="select kepek.ImageNev from kepek,felhasznalok where kepek.felhID=felhasznalok.ID AND kepek.felhID='$id'";
        $sqlquery=$kapcsolat->query($sql);
        $adatkep=$sqlquery->fetch_all(MYSQLI_ASSOC);
        if(count($adatkep)>0){
            $vissza=["kep"=>$adatkep];
        }
        
        
    }

print(json_encode($vissza));
?>
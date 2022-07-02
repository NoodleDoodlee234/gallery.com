<?php
$kapcsolat=new mysqli("localhost","root","","felhasznalok");
$vissza=[];
    if(!$kapcsolat->errno){
        $sql="select ImageNev from kepek order by imgID";
        $sqlquery=$kapcsolat->query($sql);
        $adatkep=$sqlquery->fetch_all(MYSQLI_ASSOC);
        
        $sql="SELECT felhasznalok.felhasznalonev as felhnev from felhasznalok,kepek WHERE felhasznalok.ID = kepek.felhID order by imgID";
        $sqlquery=$kapcsolat->query($sql);
        $adatnev=$sqlquery->fetch_all(MYSQLI_ASSOC);
        if(count($adatnev)>0 && count($adatkep)>0){
            $vissza=["kep"=>$adatkep,"felhasznalonev"=>$adatnev];
        }
    }

print(json_encode($vissza));
?>
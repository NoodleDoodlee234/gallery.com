<?php
$kapcsolat=new mysqli("localhost","root","","felhasznalok");
$vissza=[];
    if(!$kapcsolat->errno){
        $sql="select ImageNev from kepek";
        $sqlquery=$kapcsolat->query($sql);
        $adat=$sqlquery->fetch_all(MYSQLI_ASSOC);
        if(count($adat)>0){
            $vissza=["kep"=>$adat];
        }
        
    }

print(json_encode($vissza));
?>
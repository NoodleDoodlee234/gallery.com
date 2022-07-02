<?php

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="felhasznalok";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){
    die("nem sikerült létrehozni a kapcsolatot");
}

?>
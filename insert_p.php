<?php
require 'sqlcon.php';
$name=$_POST['name'];
$vorname=$_POST['vorname'];
$amtr=$_POST['amtr'];
$fach=$_POST['fach'];
$amt1=$_POST['amt1'];
$grem=$_POST['grem'];
$amt2=$_POST['amt2'];
$status=$_POST['status'];
$begrund=$_POST['begrund'];
$wann=$_POST['wann'];
$username=$_POST['username'];
$password=$_POST['password'];
if(1==$status){
    $begrund="";
    $wann="";
}
else{
    if(""==$begrund){
        echo "Keine Begrund oder Zeit geben";
        return;
    }
}

$query="INSERT INTO Nutzer VALUES (null,'".$username."', '".$password."',1)";
mysql_query($query);
$id=mysql_insert_id();
if(0==$id){
    die("cant insert username!");
}


$query="INSERT INTO Person VALUES (null,'".$id."', '".$name."', '".$vorname."', '".$amtr."', '".$fach."', '".$amt1."', '".$grem."', '".$amt2."', '".$status."', '".$begrund."', '".$wann."')";
mysql_query($query);
if(0==mysql_errno($con)){
    echo "Erfolgreich hinzugefügt!";
}
else{
//    echo $query;
    echo mysql_error($con);
}

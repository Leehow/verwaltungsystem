<?php
require 'sqlcon.php';


$name=$_POST['name'];
$vorname=$_POST['vorname'];
$fach=$_POST['fach'];
$amt=$_POST['amt'];
$gremin=$_POST['gremin'];


if($name){
    $name=" AND Name like '".$name."'";
}
if($vorname){
    $vorname=" AND Vorname like '".$vorname."'";
}
if($fach && $fach!=0){
    $fach=" AND F_id ='".$fach."'";
}
elseif($fach==0){
    $fach="";
}
if($amt && $amt!=0){
    $amt=" AND (F_vonbis = '".$amt."' OR G_vonbis = '".$amt."')";
}
elseif($amt==0){
    $amt="";
}
if($gremin && $gremin!=0){
    $gremin=" AND G_id = '".$gremin."'";
}
elseif($gremin==0){
    $gremin="";
}

if(!$name && !$vorname && !$fach && !$amt && !$gremin){
    $query="SELECT * FROM Person";   
}
else{
    $query="SELECT * FROM Person where 1=1".$name.$vorname.$fach.$amt.$gremin;
}


//echo json_encode($query);
//return;



$get=  mysql_query($query);
while($row = mysql_fetch_array($get)){
    $fid=$row["F_id"];
    $queryf="SELECT * FROM Fachschaft where F_id='".$fid."'";
    $getf=  mysql_query($queryf);
    while($rowf = mysql_fetch_array($getf)){
        $row["fach"]=$rowf["Bezeichnung"];
    }
    $gid=$row["G_id"];
    $queryg="SELECT * FROM Gremium where G_id='".$gid."'";
    $getg=  mysql_query($queryg);
    while($rowg = mysql_fetch_array($getg)){
        $row["gremin"]=$rowg["Bezeichnung"];
    }
    $famt=$row["F_vonbis"];
    $queryfa="SELECT * FROM Amtsperiode where A_id='".$famt."'";
    $getfa=  mysql_query($queryfa);
    while($rowfa = mysql_fetch_array($getfa)){
        $row["fachzeitbeginn"]=$rowfa["Beginn"];
        $row["fachzeitende"]=$rowfa["Ende"];
    }
    $gamt=$row["G_vonbis"];
    $queryga="SELECT * FROM Amtsperiode where A_id='".$gamt."'";
    $getga=  mysql_query($queryga);
    while($rowga = mysql_fetch_array($getga)){
        $row["greminzeitbeginn"]=$rowga["Beginn"];
        $row["greminzeitende"]=$rowga["Ende"];
    }
    
    
    
    $result[]=$row;
}
echo json_encode($result);
<?php
require 'sqlcon.php';

session_start();
if($_SESSION['zugriff']!=2){
    die("Error! Kein Zugriff!");
}

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
//$query="SELECT * FROM Person";

$get=  mysql_query($query);
while($row = mysql_fetch_array($get)){
    $uid=$row["Nutzer_id"];
    $query2="SELECT * FROM Nutzer where Nutzer_id=".$uid;
    $get2=  mysql_query($query2);
    while ($row2 = mysql_fetch_array($get2)){
        $row = array_merge($row, $row2);
    }
    $result[]=$row;
}
echo json_encode($result);
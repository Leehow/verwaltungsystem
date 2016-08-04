<?php
require 'sqlcon.php';
$id=$_POST['id'];
$method=$_POST['method'];
$bezeichnung=$_POST['bezeichnung'];
$beschreiben=$_POST['beschreben'];
$beginn=$_POST['beginn'];
$ende=$_POST['ende'];

if($method=="fach"){
    $query="INSERT INTO Fachschaft VALUES ('".$id."', '".$bezeichnung."')";
}
elseif($method=="gremien"){
    $query="INSERT INTO Gremium VALUES ('".$id."', '".$bezeichnung."','".$beschreiben."')";
}
elseif($method=="amtsper"){
    $query="INSERT INTO Amtsperiode VALUES ('".$id."', '".$beginn."', '".$ende."')";
}
mysql_query($query);
if(0==mysql_errno($con)){
    echo "Erfolgreich hinzufügen!";
}
else{
    echo mysql_error($con);
}



?>
<?php
require 'sqlcon.php';
$method=$_POST['method'];

if($method=="fach"){
    $query="SELECT * FROM Fachschaft";
}
elseif($method=="gremien"){
    $query="SELECT * FROM Gremium";
}
elseif($method=="amtsper"){
    $query="SELECT * FROM Amtsperiode";
}
elseif($method=="admin"){
    $query="SELECT * FROM Nutzer where zugriff=2";
}

$get=  mysql_query($query);
while($row = mysql_fetch_array($get)){
    $result[]=$row;
}
echo json_encode($result);
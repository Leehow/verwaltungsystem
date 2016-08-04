<?php
require 'sqlcon.php';

$query="SELECT * FROM Person";

$get=  mysql_query($query);
while($row = mysql_fetch_array($get)){
    $uid=$row["Nuter_id"];
    $query2="SELECT * FROM Nutzer where Nuter_id=".$uid;
    $get2=  mysql_query($query2);
    while ($row2 = mysql_fetch_array($get2)){
        $row = array_merge($row, $row2);
    }
    $result[]=$row;
}
echo json_encode($result);
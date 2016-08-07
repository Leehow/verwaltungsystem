<?php
require 'sqlcon.php';
$id=$_POST['id'];
$method=$_POST['method'];
$name=$_POST['name'];
$value=$_POST['value'];


if("fachdelet"==$method){
    $query="DELETE FROM Fachschaft where F_id=".$id;
}
elseif ("amtdelet"==$method) {
    $query="DELETE FROM Amtsperiode where A_id=".$id;
}
elseif ("gremdelet"==$method) {
    $query="DELETE FROM Gremium where G_id=".$id;
}
elseif ("persondelet"==$method) {
    $query="DELETE FROM Person where P_id=".$id;
}
elseif ("admindelet"==$method) {
    $query="DELETE FROM Nutzer where Nutzer_id=".$id;
}
elseif("fachchange"==$method){
    $query="UPDATE Fachschaft SET ".$name." = '".$value."' WHERE F_id = ".$id;
}
elseif("amtchange"==$method){
    $query="UPDATE Amtsperiode SET ".$name." = '".$value."' WHERE A_id = ".$id;
}
elseif("gremchange"==$method){
    $query="UPDATE Gremium SET ".$name." = '".$value."' WHERE G_id = ".$id;
}
elseif("personchange"==$method){
    $query="UPDATE Person SET ".$name." = '".$value."' WHERE P_id = ".$id;
}
elseif("nutzerchange"==$method){
    $query="UPDATE Nutzer SET ".$name." = '".$value."' WHERE Nutzer_id = ".$id;
}

mysql_query($query);
//echo $query;
if(0==mysql_errno($con)){
    echo 1;
}
else{
    echo $query."||".mysql_error($con);
}

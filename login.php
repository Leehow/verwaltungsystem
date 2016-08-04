<?php
require 'sqlcon.php';
$usr=$_POST['username'];
$psw=$_POST['password'];
//转义
$usr=addslashes($usr);
$psw=addslashes($psw);

$result=mysql_query("select * from Nutzer where username='".$usr."' and password='".$psw."'");
while($row = mysql_fetch_array($result))
  {
  $id= $row['Nuter_id'];
  session_start();
  $_SESSION['id']=$id;
  echo "Erfolgreich!";
  mysql_close($con);
  return true;
  }

mysql_close($con);
echo "Falsch Nutzername oder Geheimniszahle!";
return false;
?>
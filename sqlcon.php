<?php

$con = mysql_connect("localhost","root","Leehow@9x.com");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("Verwaltung_system", $con);
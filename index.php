<?php
session_start();
if(!$_SESSION['id']){
    include 'templates/login.html';
}
elseif(1==$_SESSION['id']){
    include 'templates/admin.html';
}
else{
    include 'templates/suchen.html';
}

?>
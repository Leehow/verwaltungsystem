<?php
session_start();
if(!$_SESSION['id']){
    include 'templates/login.html';
}
elseif(2==$_SESSION['zugriff']){
    include 'templates/admin.html';
}
else{
    include 'templates/suchen.html';
}

?>
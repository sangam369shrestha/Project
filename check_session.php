<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:admin_login.php?msg=1');
    
}


?>
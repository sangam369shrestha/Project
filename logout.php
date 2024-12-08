<?php 
    session_start();
    session_unset();
    session_destroy();
    // setcookie('mobile',null,time()-1);
    // setcookie('name',null,time()-1);
    // // Redirect to login page
    header('Location:admin_login.php?msg=1');
    exit();
  
?>
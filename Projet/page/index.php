<?php ob_start(); ?>

<?php
 
    // On démarre la session
    session_start();
    if (isset($_SESSION['id'])) { 
        $_SESSION = array();
        session_destroy();
 
        setcookie('login', '');
        setcookie('pass_hache', '');
         
        header('Location: ../');
 
    }
 
         
 
?>



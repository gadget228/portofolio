<?php
    include '/Functions.php';
    /*
    Get the info from the form with validating html info also encrypts Password in md5
    */
    $Email = htmlspecialchars($_POST['email']);
    $Pass  = hash('sha512', $_POST['pass']);
    
     /*
     Execute function check email
     */
    $check = checkEmail($Email);
    if ( $check ) {
        //Execute function login
        $Login = login($Email, $Pass);
    }

?>
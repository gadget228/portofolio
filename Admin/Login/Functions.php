<?php
include '../Includes/db.php';
//header("Location:../Includes/db.php");

session_start();

/*
    Function to if email is a real email
    */
    function checkEmail($Email) {
        if ( strpos($Email, '@') !== false ) {
           $split = explode('@', $Email);
           return (strpos($split['1'], '.') !== false ? true : false);
        }
        else {
           return false;
        }
     }

     function Login($Email, $Pass){

        global $db;
        global $database;

        $SQL = "SELECT * FROM Users WHERE Name ='$Email' AND Pass = '$Pass'";

        mysqli_select_db($db, $database);
        $result = mysqli_query($db, $SQL);
        $count = mysqli_num_rows($result);
            mysqli_fetch_assoc($result);
            
            if ($count == "1")
            {
                $_SESSION['Email'] = $Email;
                header("Location:../Pages/index.html");
            }
            if ($count != "1")
            {
                $_SESSION['Bad_Login'] = "1";
                header("Location:index.php");
            }
        if (!$result)
        {
            printf("Error: %s\n", mysqli_error($db));
            exit();
        }
    }

    function checkBrute(){
        global $db;
        global $database;

        $SQL = "SELECT * FROM Last_login";
        if($loginattempt = 5){
            $timeout = 600;
            $_SESSION['Timeout'] = "1";
        }
    }
?>
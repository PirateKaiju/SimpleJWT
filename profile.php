<?php

    require_once("JWT.php");

    echo "Cookies: ";
    var_dump($_COOKIE);
    
    //Verification using the JWT

    if(isset($_COOKIE["jwt"])){
        //Get verification information from server context

        $header = [
            "typ" => "JWT",
            "alg" => "HS256"
        ];

        $payload = [
            "uid" => 1,
            "email" => "teste"
        ];

        echo("DECODED: ". ($_COOKIE["jwt"]));

    
        $user_token = explode(".", $_COOKIE["jwt"]);

        $verification = explode(".", JWT::encode($header, $payload));

        /*echo "Verification: ";
        var_dump($verification[2]);*/

        if($user_token[2] == $verification[2]){
            echo "Verification successful! This is a valid user!";
        }else{
            echo "An error! The signature is invalid";
        }

    }else{
        echo "Please login to access this demonstration!";
    }



?>
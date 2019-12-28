<?php

    require_once("JWT.php");


    //TODO: LOGIN PAGE
    //TODO: PAGE TO TEST IF AUTH WORKS
    //TODO: JWT STUFF

    //FOR DEMONSTRATION PURPOSES ONLY
    
    //$data = file_get_contents('php://input');
    //var_dump($data->email);

    $data = $_POST;
    var_dump($data);

    var_dump($_COOKIE);

    //This will emulate a simple login validation
    if($data["email"] == "teste" && $data["password"] == "1234"){

        //Store the jwt


        //Token can be composed from server, e.g.: retrieving data from a database
        //The information will be hardcoded for simplicity
        $header = [
            "typ" => "JWT",
            "alg" => "HS256"
        ];

        $payload = [
            "uid" => 1,
            "email" => "teste"
        ];

        $token = JWT::encode($header, $payload);

        header("Set-Cookie: jwt=".$token."; httpOnly");

        header("Location: profile.php");
        exit();

    }else{
        echo "Login inválido";
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="email">
        <input type="password" name="password">

        <button type="submit">Login</button>
    </form>
</body>
</html>
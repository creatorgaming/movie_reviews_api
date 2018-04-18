<?php
    include 'connect.php';
    include "jwt.php";

    $data = file_get_contents('php://input');
    $decoded = json_decode($data);
    $email = $decoded->email;
    $password = $decoded->password;
    $name = $decoded->name;
    $jwt = NULL;

    $encodedInfo = array('name' => $name, 'email' => $email);
    
    //  Find if the email is valid or not
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(NULL);
    }else {
        $duplicateCheckQuery = "SELECT * FROM userLoginInfo WHERE
                                 email = '$email'";
        $duplicateCheckQueryRun = mysqli_query($conn,$duplicateCheckQuery);
        $duplicateCheckQueryResult = mysqli_fetch_assoc($duplicateCheckQueryRun);
        if(!$duplicateCheckQueryResult){
            GLOBAL $jwt;
            $jwt = jwtGenerator($encodedInfo);
            $query = "INSERT INTO userLoginInfo (`name`, `email`,`password`, `jwt`)
                        VALUES ('$name','$email','$password','$jwt')";
            mysqli_query($conn, $query);
        }
    }
    include "disconnect.php"
?>

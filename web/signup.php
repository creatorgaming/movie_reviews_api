<?php  
    include 'connect.php';
    
    $data = file_get_contents('php://input');
    $decoded = json_decode($data);
    $email = $decoded->email;
    $password = $decoded->password;
    $name = $decoded->name;

    $encodedInfo = array('name' => $name, 'email' => $email);
    include "jwt.php";
    $jwt;

    //  Find if the email is valid or not
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(NULL);
    }else {
        GLOBAL $jwt;
        $jwt = jwtGenerator($encodedInfo);
        $duplicateCheckQuery = "SELECT * FROM userLoginInfo WHERE 
                                 email = '$email' ";
        $duplicateCheckQueryResult = mysqli_fetch_assoc(mysqli_query($conn,
                                           $duplicateCheckQuery));
        if(!$duplicateCheckQueryResult){
            $query = "INSERT INTO userLoginInfo (`name`, `email`,`password`, `jwt`) 
                        VALUES ('$name','$email','$password','$jwt')";
            
            mysqli_query($conn, $query);
        }else{
            $jwt = NULL;
        }
    }
    echo json_encode($jwt);
?>
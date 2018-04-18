<?php
    $data = file_get_contents('php://input');
    $decoded = json_decode($data);

    if($decoded){
        include 'connect.php';

        $email = $decoded->email;
        $password = $decoded->password;    
        
        $duplicateCheckQuery = "SELECT * FROM userLoginInfo WHERE
                                 email = '$email'";
        $duplicateCheckQueryResult = mysqli_fetch_assoc(mysqli_query($conn,
                                           $duplicateCheckQuery));
        if(!$duplicateCheckQueryResult){                                           
            $query = "SELECT * FROM userLoginInfo WHERE
                    email = '$email' AND password = '$password'";
            $records = mysqli_query($conn, $query);
            $result = mysqli_fetch_assoc($records);

            if($result){
                echo json_encode($result['jwt']);
            }else {
                echo json_encode(NULL);
            }
        }   
            include "disconnect.php";
    }
?>

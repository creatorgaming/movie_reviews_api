<?php
    $data = file_get_contents('php://input');
    $decoded = json_decode($data);
    $email = $decoded->email;
    $password = $decoded->password;

    if($decoded){
        include 'connect.php';
        $query = "SELECT * FROM userlogininfo WHERE
                email = '$email' AND password = '$password'";
        $records = mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($records);

        if($result){
            echo json_encode($result['jwt']);
        }else {
            echo json_encode(NULL);
        }
		include "disconnect.php";
    }
?>

<?php 
    $data = file_get_contents('php://input');
    $decoded = json_decode($data);
<<<<<<< HEAD
    $email = $decoded->email;
    $password = $decoded->password;
    
    //MySQL Database Connect 
    include 'connect.php'; 
    $query = "SELECT * FROM userLoginInfo WHERE 
                email = '$email' AND password = '$password'";
    $records = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($records);
     
    if($result){
        echo json_encode($result['hash']);
    }else {
        echo json_encode("NULL");
=======
    // echo $decoded->email;
    $email = $decoded->email;
    $password = $decoded->password;

    //MySQL Database Connect 
    include 'connect.php'; 
    $query = "SELECT * FROM userLoginInfo where email = '$email' password = '$password' ";
    $records = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($records);
    if($result){
        echo $result['hash'];
    }else {
        echo "NULL";
        //header('Location: signup.php');
>>>>>>> heroku/master
    }    
?>